<?php

namespace App\Http\Controllers\Relawan;

use App\Http\Controllers\Controller;
use App\Models\ProgramBerita;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RelawanProgramBeritaController extends Controller
{
    public function index()
    {
        return view('relawan.program-berita.index');
    }

    public function create()
    {
        return view('relawan.program-berita.create');
    }

    public function edit(ProgramBerita $programBerita)
    {
        return view('relawan.program-berita.edit', compact('programBerita'));
    }

    public function show(ProgramBerita $programBerita)
    {
        $programBerita->load('programDonasi');

        return view('relawan.program-berita.show', compact('programBerita'));
    }
}
