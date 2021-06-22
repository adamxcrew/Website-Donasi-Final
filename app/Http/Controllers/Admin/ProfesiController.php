<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profesi;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProfesiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('profesi_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.profesi.index');
    }

    public function create()
    {
        abort_if(Gate::denies('profesi_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.profesi.create');
    }

    public function edit(Profesi $profesi)
    {
        abort_if(Gate::denies('profesi_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.profesi.edit', compact('profesi'));
    }
}
