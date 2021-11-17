<?php

namespace App\Http\Controllers;

use App\Exports\RecordUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class ExportRecordController extends Controller
{
//    use Excel;

    public function export(Request $request)
    {
        $id_title = $request->input('id_title');
        $id_object = $request->input('id_object');
        $id_unit = $request->input('id_unit');
        return Excel::download(new RecordUsers($id_title, $id_object, $id_unit), 'export.xlsx');
    }
}
