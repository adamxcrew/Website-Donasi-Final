<?php

namespace App\Http\Controllers\Relawan;

use App\Http\Controllers\Controller;
use App\Models\Rekening;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RelawanRekeningController extends Controller
{
    public function index()
    {
        return view('relawan.rekening.index');
    }

    public function create()
    {
        return view('relawan.rekening.create');
    }

    public function edit(Rekening $rekening)
    {
        return view('relawan.rekening.edit', compact('rekening'));
    }

    public function show(Rekening $rekening)
    {
        $rekening->load('user', 'bank');
        return view('relawan.rekening.show', compact('rekening'));
    }
}
