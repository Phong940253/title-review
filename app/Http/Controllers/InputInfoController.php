<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Vanthao03596\HCVN\Models\Province;
use Vanthao03596\HCVN\Models\District;
use Illuminate\Support\Facades\DB;
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
        $params = [
            'city' => $this->getProvince(),
            'nation' => ProfileController::getNation(),
            'religion' => $this->getReligion()
        ];
        return view('users.info', $params);
    }

    /**
     * @return string
     */
    public function getProvince(): string
    {
        $html = '<option value="">Chọn tỉnh, thành phố</option>';
        $cities = Province::get()->sortBy('name');
        foreach ($cities as $city)
            $html .= '<option value="' . $city->id . '">' . $city->name . '</option>';
        return $html;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function getDistrictByIdProvince(Request $request): JsonResponse
    {
        $html = '<option value="">Chọn huyện, quận, thị xã</option>';
        if ($request->idProvince) {
            $idProvince = $request->idProvince;
            $citie = Province::where('id', $idProvince)->first();
            $districts = $citie->districts()->orderBy('name', 'asc')->get();
            foreach ($districts as $district) {
                $html .= '<option value="' . $district->id . '">' . $district->name . '</option>';
            }
        }
        return response()->json(['html' => $html]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function getWardByIdDistrict(Request $request): JsonResponse
    {
        $html = '<option value="">Chọn xã, phường, thị trấn</option>';
        if ($request->idDistrict) {
            $idDistrict = $request->idDistrict;
            $district = District::where('id', $idDistrict)->first();
            $wards = $district->wards()->orderBy('name', 'asc')->get();
            foreach ($wards as $ward) {
                $html .= '<option value="' . $ward->id . '">' . $ward->name . '</option>';
            }
        }
        return response()->json(['html' => $html]);
    }

    public function getReligion() {
        $html = '<option value="">Chọn tôn giáo</option>';
        $religions = DB::table('religion')->orderBy('name', 'asc')->get();
        foreach ($religions as $religion)
            $html .= '<option value="' . $religion->id . '">' . $religion->name . '</option>';
        return $html;
    }

    public function submitInfo() {

    }
}
