<?php

namespace App\Http\Controllers\Admin;

use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HomeController
{
    public function index()
    {
        abort_if(Gate::denies('isAdmin'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.home');
    }
}
