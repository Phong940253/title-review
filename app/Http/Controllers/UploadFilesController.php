<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;

class UploadFilesController extends Controller
{
    public function store(Request $request)
    {
        Log::debug('get request');
        if ($request->hasFile('file') && $request->noi_dung && DB::table('noidung')->where('id', $request->noi_dung)->exists()) {
            Log::debug('receive file');
            $files = $request->file('file');
            foreach ($files as $file) {
                $name = sha1(date('YmdHis') . Str::random(30));
                $save_name = $name . '.' . $file->getClientOriginalExtension();
//                $resize_name = $name . Str::random(2) . '.' . $file->getClientOriginalExtension();
                Log::debug('saving file');
                $storedPath = $file->move('images/minhchung/' . auth()->user()->id . '/', $save_name);
                Log::debug('saved file');

                $upload = new Upload();
                $upload->filename = $save_name;
                $upload->original_name = basename($file->getClientOriginalName());
                $upload->id_noidung = $request->noi_dung;
                $upload->id_users = auth()->user()->id;
                $upload->url = $storedPath;
                Log::debug('update database file');
                $upload->save();
                Log::debug('updated database file');

                return Response::json([
                    'success' => true,
                    'message' => 'Lưu thành công'
                ], 200);
            }
        }
        return Response::json([
            'success' => false,
            'message' => 'Có lỗi xảy ra'
        ], 400);
    }
}
