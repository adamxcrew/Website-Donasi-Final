<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProgramBerita;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProgramBeritaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('program_berita_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.program-berita.index');
    }

    public function create()
    {
        abort_if(Gate::denies('program_berita_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.program-berita.create');
    }

    public function edit(ProgramBerita $programBerita)
    {
        abort_if(Gate::denies('program_berita_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.program-berita.edit', compact('programBerita'));
    }

    public function show(ProgramBerita $programBerita)
    {
        abort_if(Gate::denies('program_berita_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $programBerita->load('programDonasi');

        return view('admin.program-berita.show', compact('programBerita'));
    }
}
