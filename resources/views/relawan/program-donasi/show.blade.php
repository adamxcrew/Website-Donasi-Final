@extends('layouts.relawan')
@section('content')

<div class="card bg-blueGray-100">
    <div class="card-header">
        <div class="card-header-container">
            <h6 class="card-title">
                Lihat Program Donasi: ID
                {{ $programDonasi->id }}
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
                            {{ $programDonasi->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            User
                        </th>
                        <td>
                            @if($programDonasi->User)
                                <span class="badge badge-relationship">{{ $programDonasi->User->email ?? '' }}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Rekening Program
                        </th>
                        <td>
                            @if($programDonasi->Rekening)
                                <span class="badge badge-relationship">{{ $programDonasi->Rekening->nomor_rekening ?? '' }}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Judul
                        </th>
                        <td>
                            {{ $programDonasi->judul }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Deskripsi
                        </th>
                        <td>
                            {{ $programDonasi->deskripsi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Konten
                        </th>
                        <td>
                            {!! $programDonasi->konten !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Target
                        </th>
                        <td>
                            @currency($programDonasi->target)
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Terkumpul
                        </th>
                        <td>
                            @currency($programDonasi->donasi->where('status_donasi', '1')->sum('nominal'))
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Batas Akhir
                        </th>
                        <td>
                            {{ $programDonasi->batas_akhir }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Status Verifikasi
                        </th>
                        <td>
                            <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $programDonasi->status_verifikasi ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Status Selesai
                        </th>
                        <td>
                            <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $programDonasi->status_selesai ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="form-group">
            <a href="{{ url()->previous() }}" class="btn btn-secondary">
                Kembali
            </a>
        </div>
    </div>
</div>
@endsection
