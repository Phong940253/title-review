<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use anlutro\LaravelSettings\Facade as Setting;

/**
 *
 */
class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit(Request $request)
    {
        $tieuchis = $this->getTieuChuanTieuChi($request);
        $nations = $this->getNation();
        return view('profile.edit', ['tieuchis' => $tieuchis, 'nations' => $nations]);
    }

    /**
     * @param Request $request
     * @return array|\Illuminate\Support\Collection
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
     * @param \App\Http\Requests\ProfileRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public
    function update(ProfileRequest $request)
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
     * @param \App\Http\Requests\PasswordRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public
    function password(PasswordRequest $request)
    {
        if (auth()->user()->id == 1) {
            return back()->withErrors(['not_allow_password' => __('You are not allowed to change the password for a default user.')]);
        }

        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('Password successfully updated.'));
    }

    /**
     * @param Request $request
     * @return string
     */
    public
    function uploadImage(Request $request)
    {
        if ($request->hasFile('image')) {
            //  Let's do everything here
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $imageName = time() . '.' . auth()->user()->id;
            $request->file('image')->move(public_path('user-image'), $imageName);

            $update = DB::table('user')
                ->where('id', auth()->user()->id)
                ->limit(1)
                ->update(['image' => $imageName]);

            $image = '<img src="{asset("user-image")}/{$imageName}" alt="icon" class="rounded-circle">';
            $response = [
                'success' => true,
                'image' => $image,
                'msg' => "Cập nhật hình đại diện thành công"
            ];
            return $response;
        }
        $response = [
            'success' => false,
            'msg' => "Cập nhật thất bại. Ảnh chưa được tải lên thành công!"
        ];
        return $response;
    }

    public static function getNation() {
        $nations = '<option value="" selected>Chọn dân tộc</option>';
        for ($i = 1; $i <= 55; $i++) {
            $nations .= '<option value="' . $i . '">' . Setting('nation' . $i) . '</option>';
        }
        return $nations;
    }
}
