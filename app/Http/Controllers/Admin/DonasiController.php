<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donasi;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DonasiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('donasi_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.donasi.index');
    }

    public function create()
    {
        abort_if(Gate::denies('donasi_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.donasi.create');
    }

    public function edit(Donasi $donasi)
    {
        abort_if(Gate::denies('donasi_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.donasi.edit', compact('donasi'));
    }

    public function show(Donasi $donasi)
    {
        abort_if(Gate::denies('donasi_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $donasi->load('programDonasi');

        return view('admin.donasi.show', compact('donasi'));
    }
}
