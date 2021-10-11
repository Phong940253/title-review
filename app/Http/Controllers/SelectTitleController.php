<?php

namespace App\Http\Controllers;

use App\Rules\ValidIdObject;
use App\Rules\ValidIdTitle;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

/**
 *
 */
class SelectTitleController extends Controller
{
    /**
     * return viwe select title
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $titles = DB::table('danhhieu')->select('name', 'id')->get();
        return view('users.select-title', ['titles' => $titles]);
    }

    /**
     * return object by title id
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function get_by_title(Request $request): JsonResponse
    {
        $html = '<option selected disabled value="">Chọn đối tượng</option>';
        if ($request->id_title) {
            $html = '<option value="" disabled selected>Chọn đối tượng</option>';
            $objects = DB::table('doituong')
                ->join('danhhieu_doituong', 'doituong.id', '=', 'danhhieu_doituong.id_doituong')
                ->where('id_danhhieu', '=', $request->id_title)
                ->get();
            foreach ($objects as $object) {
                $html .= '<option value="' . $object->id_doituong . '">' . $object->name . '</option>';
            }
        }
        return response()->json(['html' => $html]);
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function submitSelect(Request $request)
    {
        Validator::make($request->all(), [
            'id_title' => ['string', 'required', new ValidIdTitle],
            'id_object' => ['string', 'required', new ValidIdObject]
            ])->validate();
        $request->session()->put('id_title', $request->input('id_title'));
        $request->session()->put('id_object', $request->input('id_object'));
        return redirect('/');
    }
}
