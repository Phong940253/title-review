<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use anlutro\LaravelSettings\Facade as Setting;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Intervention\Image\Facades\Image;

/**
 *
 */
class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return View
     */
    public function edit(Request $request): View
    {
        $tieuchis = $this->getTieuChuanTieuChi($request);
        $nations = $this->getNation();
        return view('profile.edit', ['tieuchis' => $tieuchis, 'nations' => $nations]);
    }

    /**
     * @param Request $request
     * @return array|Collection
     */
    public static function getTieuChuanTieuChi(Request $request)
    {
        $id_title = $request->session()->get('id_title');
        $id_object = $request->session()->get('id_object');
        $tieuchis = [];
        if (!is_null($id_title) && !(is_null($id_object))) {
            $tieuchis = DB::table('tieuchi')
                ->select('name', 'tieuchi.id')
                ->join('danhhieu_doituong', 'tieuchi.id_danhhieu_doituong', '=', 'danhhieu_doituong.id')
                ->where('id_danhhieu', '=', $id_title)
                ->where('id_doituong', '=', $id_object)
                ->get();
            foreach ($tieuchis as $tieuchi) {
                $tieuchuan = DB::table('tieuchuan')
                    ->select('name', 'id')
                    ->where('id_tieuchi', '=', $tieuchi->id)
                    ->get();
                $tieuchi->tieuchuans = $tieuchuan;
            }
        }
        return $tieuchis;
    }

    /**
     * Update the profile
     *
     * @param ProfileRequest $request
     * @return RedirectResponse
     */
    public
    function update(ProfileRequest $request): RedirectResponse
    {
        if (auth()->user()->id == 1) {
            return back()->withErrors(['not_allow_profile' => __('You are not allowed to change data for a default user.')]);
        }

        auth()->user()->update($request->all());

        return back()->withStatus(__('Profile successfully updated.'));
    }

    /**
     * Change the password
     *
     * @param PasswordRequest $request
     * @return RedirectResponse
     */
    public
    function password(PasswordRequest $request): RedirectResponse
    {
        if (auth()->user()->id == 1) {
            return back()->withErrors(['not_allow_password' => __('You are not allowed to change the password for a default user.')]);
        }

        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('Password successfully updated.'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public
    function uploadImage(Request $request): \Illuminate\Http\JsonResponse
    {
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            // Delete old avatar
            $deleteFile = Storage::delete("public/" . Str::after(auth()->user()->url_image, "storage/"));

            // Save file
            $file = $request->file('image');
            $storedPath = "storage/" . Str::after($file->store("public/images/users-image"), "public/");
            Log::debug($storedPath);

            // Save database
            $user = User::find(auth()->user()->id);
            $user->url_image = $storedPath;
            $user->save();
            $image = asset($storedPath);
            $response = [
                'success' => true,
                'image' => $image,
                'msg' => "Cập nhật hình đại diện thành công"
            ];
            return Response::json($response, 200);
        } else {
        }
        $response = [
            'success' => false,
            'msg' => "Cập nhật thất bại. Có lỗi xảy ra!"
        ];
        return Response::json($response, 200);
    }

    public static function getNation($attribute = NULL): string
    {
        $nations = '<option value="" selected disabled>Chọn dân tộc</option>';
        for ($i = 1; $i <= 55; $i++) {
            $nations .= '<option ' . (old($attribute) == $i ? "selected" : "") . ' value="' . $i . '">' . Setting('nation' . $i) . '</option>';
        }
        return $nations;
    }
}
