<?php

namespace App\Http\Controllers\Relawan;

use App\Http\Controllers\Controller;
use App\Models\ProgramDonasi;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RelawanProgramDonasiController extends Controller
{
    public function index()
    {
        return view('relawan.program-donasi.index');
    }

    public function create()
    {
        return view('relawan.program-donasi.create');
    }

    public function edit(ProgramDonasi $programDonasi)
    {
        return view('relawan.program-donasi.edit', compact('programDonasi'));
    }

    public function show(ProgramDonasi $programDonasi)
    {
        $programDonasi->load('user', 'rekening');
        return view('relawan.program-donasi.show', compact('programDonasi'));
    }
}
