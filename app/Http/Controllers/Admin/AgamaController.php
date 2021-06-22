<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agama;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AgamaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('agama_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.agama.index');
    }

    public function create()
    {
        abort_if(Gate::denies('agama_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.agama.create');
    }

    public function edit(Agama $agama)
    {
        abort_if(Gate::denies('agama_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.agama.edit', compact('agama'));
    }
}
