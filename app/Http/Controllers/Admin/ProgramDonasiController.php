<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProgramDonasi;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProgramDonasiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('program_donasi_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.program-donasi.index');
    }

    public function create()
    {
        abort_if(Gate::denies('program_donasi_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.program-donasi.create');
    }

    public function edit(ProgramDonasi $programDonasi)
    {
        abort_if(Gate::denies('program_donasi_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.program-donasi.edit', compact('programDonasi'));
    }

    public function show(ProgramDonasi $programDonasi)
    {
        abort_if(Gate::denies('program_donasi_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $programDonasi->load('user', 'rekening');

        return view('admin.program-donasi.show', compact('programDonasi'));
    }
}
