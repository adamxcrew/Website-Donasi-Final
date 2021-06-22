<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Donasi;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::where('id', Auth::id())->first();

        if ($user->getIsAdminAttribute()) {
            return redirect('/admin');
        }
        else {
            return redirect('/relawan');
        }
    }

}
