<?php

namespace App\Http\Controllers\Relawan;

use App\Http\Controllers\Controller;
use App\Models\Donasi;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RelawanDonasiController extends Controller
{
    public function index()
    {
        return view('relawan.donasi.index');
    }

    public function create()
    {
        return view('relawan.donasi.create');
    }

    public function edit(Donasi $donasi)
    {
        return view('relawan.donasi.edit', compact('donasi'));
    }

    public function show(Donasi $donasi)
    {
        $donasi->load('programDonasi');
        return view('relawan.donasi.show', compact('donasi'));
    }
}
