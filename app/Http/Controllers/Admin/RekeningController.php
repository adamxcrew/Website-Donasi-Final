<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rekening;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RekeningController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('rekening_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.rekening.index');
    }

    public function create()
    {
        abort_if(Gate::denies('rekening_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.rekening.create');
    }

    public function edit(Rekening $rekening)
    {
        abort_if(Gate::denies('rekening_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.rekening.edit', compact('rekening'));
    }

    public function show(Rekening $rekening)
    {
        abort_if(Gate::denies('rekening_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rekening->load('user', 'bank');

        return view('admin.rekening.show', compact('rekening'));
    }
}
