<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

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
        return view('profile.edit', ['tieuchis' => $tieuchis]);
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
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
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        if (auth()->user()->id == 1) {
            return back()->withErrors(['not_allow_password' => __('You are not allowed to change the password for a default user.')]);
        }

        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('Password successfully updated.'));
    }
}
