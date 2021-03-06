<?php

namespace App\Http\Controllers;

use anlutro\LaravelSettings\Facade as Setting;
use App\Http\Controllers\ProfileController;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\ManagerController;

/**
 *
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request): \Illuminate\Contracts\View\View
    {
        $ProfileController = new ProfileController;
        $InputInfoController = new InputInfoController;
        if (auth()->user()->hasRole('user')) {
            return $ProfileController->edit($request);
        }
        if (auth()->user()->hasRole('khoa')) {
            $KhoaManagerController = new ManagerController;
            return $KhoaManagerController->index();
        }
        if (auth()->user()->hasRole('truong')) {
            $truongManagerController = new ManagerController;
            return $truongManagerController->index();
        }
        if (auth()->user()->hasRole('admin')) {
            $adminManagerController = new ManagerTitlesController;
            return $adminManagerController->Title($request);
        }
        return $ProfileController->edit($request);
    }
}
