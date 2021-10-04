<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Vanthao03596\HCVN\Models\Province;
use Vanthao03596\HCVN\Models\District;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Rules\ValidTelephone;
use App\Rules\ValidReligion;
use App\Rules\ValidProvince;
use App\Rules\ValidDistrict;
use App\Rules\ValidWard;
use Illuminate\Support\Facades\Log;

/**
 *
 */
class InputInfoController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $ProfileController = new ProfileController;
        $params = [
            'city' => $this->getProvince('province'),
            'current_city' => $this->getProvince('current_province'),
            'nation' => $ProfileController->getNation('dan_toc'),
            'religion' => $this->getReligion('religion')
        ];
        return view('users.info', $params);
    }

    /**
     * @param null $attribute
     * @return string
     */
    public function getProvince($attribute = NULL): string
    {
        $html = '<option selected disabled value="">Chọn tỉnh, thành phố</option>';
        $cities = Province::get()->sortBy('name');
        foreach ($cities as $city)
            $html .= '<option ' . (old($attribute) == $city->id ? "selected" : ((auth()->user()->$attribute == $city->id) ? "selected" : "")) . ' value="' . $city->id . '">' . $city->name . '</option>';
        return $html;
    }

    /**
     * @param Request $request
     * @param null $attribute
     * @return JsonResponse
     */
    public function getDistrictByIdProvince(Request $request, $attribute = NULL): JsonResponse
    {
        $html = '<option selected disabled value="">Chọn huyện, quận, thị xã</option>';
        if ($request->idProvince) {
            $idProvince = $request->idProvince;
            $citie = Province::where('id', $idProvince)->first();
            $districts = $citie->districts()->orderBy('name', 'asc')->get();
            foreach ($districts as $district) {
                $html .= '<option ' . (old($attribute) == $district->id ? "selected" : ((auth()->user()->$attribute == $district->id) ? "selected" : "")) . ' value="' . $district->id . '">' . $district->name . '</option>';
            }
        }
        return response()->json(['html' => $html]);
    }

    /**
     * @param Request $request
     * @param null $attribute
     * @return JsonResponse
     */
    public function getWardByIdDistrict(Request $request, $attribute = NULL): JsonResponse
    {
        $html = '<option selected disabled value="">Chọn xã, phường, thị trấn</option>';
        if ($request->idDistrict) {
            $idDistrict = $request->idDistrict;
            $district = District::where('id', $idDistrict)->first();
            $wards = $district->wards()->orderBy('name', 'asc')->get();
            foreach ($wards as $ward) {
                $html .= '<option ' . (old($attribute) == $ward->id ? "selected" : ((auth()->user()->$attribute == $ward->id) ? "selected" : "")) . ' value="' . $ward->id . '">' . $ward->name . '</option>';
            }
        }
        return response()->json(['html' => $html]);
    }

    /**
     * @param null $attribute
     * @return string
     */
    public function getReligion($attribute = NULL): string
    {
        $html = '<option selected disabled value="">Chọn tôn giáo</option>';
        $religions = DB::table('religion')->orderBy('name', 'asc')->get();
        foreach ($religions as $religion)
            $html .= '<option ' . (old($attribute) == $religion->id ? "selected" : ((auth()->user()->$attribute == $religion->id) ? "selected" : "")) . ' value="' . $religion->id . '">' . $religion->name . '</option>';
        return $html;
    }

    /**
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator|\Illuminate\Validation\Validator
     */
    public function validator(array $data)
    {
        return Validator::make($data, [
            'sdt' => ['required', 'string', 'between:10,11', 'regex:/^[0-9]{10,11}+$/'],
            'gender' => ['required', 'between:0,1'],
            'dan_toc' => ['required', 'between:1,55'],
            'religion' => ['required', new ValidReligion],
            'province' => ['required', new ValidProvince],
            'district' => ['required', 'max:255', new ValidDistrict],
            'ward' => ['required', new ValidWard],
            'street' => ['required', 'string'],
            'current_province' => ['required', new ValidProvince],
            'current_district' => ['required', new ValidDistrict],
            'current_ward' => ['required', new ValidWard],
            'current_street' => ['required', 'max:255', 'string']
        ]);
    }

    /**
     *
     */
    public function submitInfo(Request $request)
    {
        $this->validator($request->all())->validate();
        $user = User::find(auth()->user()->id);
        $user->telephone = $request->sdt;
        $user->gender = $request->gender;
        $user->nation = $request->dan_toc;
        $user->id_religion = $request->religion;
        $user->id_province = $request->province;
        $user->id_district = $request->district;
        $user->id_ward = $request->ward;
        $user->street = $request->street;
        $user->id_current_province = $request->current_province;
        $user->id_current_district = $request->current_district;
        $user->id_current_ward = $request->current_ward;
        $user->current_street = $request->current_street;
        $user->save();
        return redirect('/');
    }
}
