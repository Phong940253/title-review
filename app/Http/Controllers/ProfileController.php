<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordRequest;
use App\Http\Requests\ProfileRequest;
use App\Models\User;
use App\Rules\ValidDistrict;
use App\Rules\ValidProvince;
use App\Rules\ValidReligion;
use App\Rules\ValidWard;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

/**
 *
 */
class ProfileController extends Controller
{
    /**
     * @var string[]
     */
    public $year = ['nhất', 'hai', 'ba', 'tư', 'năm', 'sáu', 'bảy', 'tám', 'mới tốt nghiệp'];

    /**
     * Show the form for editing the profile.
     *
     * @return View
     */
    public function edit(Request $request): View
    {
        $InputInfoController = new InputInfoController;
        $id_title = $request->session()->get('id_title');
        $id_object = $request->session()->get('id_object');
        $params = [
            'tieuchis' => $this->getTieuChuanTieuChi($id_title, $id_object),
            'nation' => $this->getNation('nation'),
            'religion' => $InputInfoController->getReligion('id_religion'),
            'city' => $InputInfoController->getProvince('id_province'),
            'current_city' => $InputInfoController->getProvince('id_current_province'),
            'unit' => $this->getUnit('id_unit'),
            'year' => $this->getYear('year'),
        ];
        return view('profile.edit', $params);
    }

    /**
     * @param Request $request
     * @return array|Collection
     */
    public function getTieuChuanTieuChi($id_title, $id_object, $id_danhhieu_doituong = false)
    {
        $tieuchis = [];
        if ((!is_null($id_title) && !(is_null($id_object))) || $id_danhhieu_doituong) {
            $tieuchis = $this->getIdTieuChi($id_title, $id_object, $id_danhhieu_doituong);
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
     * @param $id_title
     * @param $id_object
     * @return Collection
     */
    public function getIdTieuChi($id_title, $id_object, $id_danhhieu_doituong = false): Collection
    {
        if ($id_danhhieu_doituong) {
            return DB::table('tieuchi')
                ->select('name', 'tieuchi.id')
                ->where('tieuchi.id_danhhieu_doituong', '=', $id_danhhieu_doituong)
                ->get();
        } else {
            return DB::table('tieuchi')
                ->select('name', 'tieuchi.id')
                ->join('danhhieu_doituong', 'tieuchi.id_danhhieu_doituong', '=', 'danhhieu_doituong.id')
                ->where('id_danhhieu', '=', $id_title)
                ->where('id_doituong', '=', $id_object)
                ->get();
        }
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

        $this->validator($request->all())->validate();
        auth()->user()->update($request->all());

        return back()->withStatus(__('Cập nhật thông tin thành công.'));
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
            return back()->withErrors(['not_allow_password' => __('Bạn không có quyền thay đổi tài khoản mặc định.')]);
        }

        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('Cập nhật mật khẩu thành công.'));
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
            $deleteFile = Storage::disk('public')->delete(Str::after(auth()->user()->url_image, "storage/"));

            // Save file
            $file = $request->file('image');
            $tempPath = $file->store("public/images/users-image", 'public');
            $storedPath = 'storage/' . $tempPath;
//            Log::debug($storedPath);
//            Log::debug($tempPath);
//            Log::debug(asset($tempPath));

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
            # not
        }
        $response = [
            'success' => false,
            'msg' => "Cập nhật thất bại. Có lỗi xảy ra!"
        ];
        return Response::json($response, 200);
    }

    /**
     * @param null $attribute
     * @return string
     */
    public function getNation($attribute = NULL): string
    {
        $nations = '<option value="" selected disabled>Chọn dân tộc</option>';
        for ($i = 1; $i <= 55; $i++) {
            $nations .= '<option ' . (old($attribute) == $i ? "selected" : ((auth()->user()->$attribute == $i) ? "selected" : "")) . ' value="' . $i . '">' . Setting('nation' . $i) . '</option>';
        }
        return $nations;
    }

    /**
     * @param null $attribute
     * @return string
     */
    public function getUnit($attribute = NULL) : string
    {
        $html = '<option value="" selected disabled>Chọn đơn vị</option>';
        $units = DB::table('unit')->orderBy('name', 'asc')->get();
        foreach ($units as $unit) {
            $html .= '<option ' . (old($attribute) == $unit->id ? "selected" : ((auth()->user()->$attribute == $unit->id) ? "selected" : "")) . ' value="' . $unit->id . '">' . $unit->name . '</option>';
        }
        return $html;
    }

    /**
     * @param null $attribute
     * @return string
     */
    public function getYear($attribute = NULL) : string {
        $html = '<option value="" selected disabled>Chọn năm</option>';
        foreach ($this->year as $y) {
            $html .= '<option ' . (old($attribute) == $y ? "selected" : ((auth()->user()->$attribute == $y) ? "selected" : "")) . ' value="' . $y . '">' . $y . '</option>';
        }
        return $html;
    }

    /**
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator|\Illuminate\Validation\Validator
     */
    public function validator(array $data)
    {
        return Validator::make($data, [
            'ms' => ['nullable', 'string'],
            'name' => ['nullable', 'string'],
            'email' => ['nullable', 'email'],
            'telephone' => ['nullable', 'string', 'between:10,11', 'regex:/^[0-9]{10,11}+$/'],
            'gender' => ['nullable', 'between:0,1'],
            'nation' => ['nullable', 'between:1,55'],
            'id_religion' => ['nullable', new ValidReligion],
            'id_province' => ['nullable', new ValidProvince],
            'id_district' => ['nullable', 'max:255', new ValidDistrict],
            'id_ward' => ['nullable', new ValidWard],
            'street' => ['nullable', 'string'],
            'id_current_province' => ['nullable', new ValidProvince],
            'id_current_district' => ['nullable', new ValidDistrict],
            'id_current_ward' => ['nullable', new ValidWard],
            'current_street' => ['nullable', 'max:255', 'string'],
            'birthDay' => ['nullable', 'date_format:Y-m-d', 'before:now'],
            'date_admission_doan' => ['nullable', 'date_format:Y-m-d', 'before:now'],
            'date_admission_dang_reserve' => ['nullable', 'date_format:Y-m-d', 'before:now'],
            'date_admission_dang_official' => ['nullable', 'date_format:Y-m-d', 'before:now'],
            'current_position' => ['nullable', 'string'],
            'highest_position' => ['nullable', 'string'],
            'year' => ['nullable', 'string', Rule::in($this->year)],
        ]);
    }
}
