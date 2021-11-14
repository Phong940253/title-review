<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

/**
 *
 */
class UploadFilesController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
//        Log::debug('get request');
        if ($request->hasFile('file') && $request->noi_dung && DB::table('noidung')->where('id', $request->noi_dung)->exists()) {
//            Log::debug('receive file');
            $files = $request->file('file');
            foreach ($files as $file) {
                Validator::make(['file' => $file], [
                    'file' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
                ]);
                $size = round($file->getSize(), 0);

//                Log::debug('saving file');
                $id_users = auth()->user()->id;
                $storedPath = "storage/" . $file->store("public/images/minhchung/{$id_users}", 'public');
//                Log::debug('saved file');

                $upload = new Upload();
                $upload->filename = Str::after($storedPath, $id_users . "/");
                $upload->original_name = basename($file->getClientOriginalName());
                $upload->id_noidung = $request->noi_dung;
                $upload->id_users = auth()->user()->id;
                $upload->size = $size;
                $upload->url = $storedPath;

//                Log::debug('update database file');
                $upload->save();
//                Log::debug('updated database file');
            }
            return Response::json([
                'success' => true,
                'message' => 'Tải lên file thành công!'
            ], 200);
        }
        return Response::json([
            'success' => false,
            'message' => 'Có lỗi xảy ra!'
        ], 200);
    }

    /**
     *
     */
    public function drop(Request $request): JsonResponse
    {
        if ($request->input('id') && DB::table('noidung')->where('id', '=', $request->input('id'))->exists()) {
            $upload = Upload::where('id_users', '=', auth()->user()->id)
                ->where('id_noidung', '=', $request->input('id'))
                ->where('original_name', '=', $request->input('name'))
                ->first();

            $deleteFile = Storage::disk('public')->delete(Str::after($upload->url, "storage/"));
            if ($deleteFile) {
                $upload->delete();
                return Response::json([
                    'success' => true,
                    'message' => 'Xoá thành công!'
                ], 200);
            }
            return Response::json([
                'success' => false,
                'message' => 'Có lỗi xảy ra!'
            ], 400);
        }
        return Response::json([
            'success' => false,
            'message' => 'Xóa thất bại, sai tham số!'
        ], 200);
    }
}
