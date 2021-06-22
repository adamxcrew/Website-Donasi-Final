<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Saran;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SaranController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('saran_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.saran.index');
    }

    public function create()
    {
        abort_if(Gate::denies('saran_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.saran.create');
    }

    public function show(Saran $saran)
    {
        abort_if(Gate::denies('saran_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.saran.show', compact('saran'));
    }
}
