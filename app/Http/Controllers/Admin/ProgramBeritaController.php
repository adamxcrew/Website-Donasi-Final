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
        return view('admin.program-berita.index');
    }

    public function create()
    {
        return view('admin.program-berita.create');
    }

    public function edit(ProgramBerita $programBerita)
    {
        return view('admin.program-berita.edit', compact('programBerita'));
    }

    public function show(ProgramBerita $programBerita)
    {
        $programBerita->load('programDonasi');

        return view('admin.program-berita.show', compact('programBerita'));
    }
}
