<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 *
 */

class SelectTitleController extends Controller
{
    /**
     * return viwe select title
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index() {
        return view('users.select-title');
    }
}
