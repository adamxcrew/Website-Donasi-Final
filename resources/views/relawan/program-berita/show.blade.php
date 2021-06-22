@extends('layouts.relawan')
@section('content')

<div class="card bg-blueGray-100">
    <div class="card-header">
        <div class="card-header-container">
            <h6 class="card-title">
                Data
                Berita:
                ID
                {{ $programBerita->id }}
            </h6>
        </div>
    </div>

    <div class="card-body">
        <div class="pt-3">
            <table class="table table-view">
                <tbody class="bg-white">
                    <tr>
                        <th>
                            ID
                        </th>
                        <td>
                            {{ $programBerita->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                           Program Donasi
                        </th>
                        <td>
                            @if($programBerita->ProgramDonasi)
                                <span class="badge badge-relationship">{{ $programBerita->ProgramDonasi->judul ?? '' }}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Berita
                        </th>
                        <td>
                            {{ $programBerita->berita }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="form-group">
            <a href="{{ route('relawan.program-berita.index') }}" class="btn btn-secondary">
                Kembali
            </a>
        </div>
    </div>
</div>
@endsection
