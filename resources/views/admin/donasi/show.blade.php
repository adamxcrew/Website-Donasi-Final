@extends('layouts.admin')
@section('content')

<div class="card bg-blueGray-100">
    <div class="card-header">
        <div class="card-header-container">
            <h6 class="card-title">
                Lihat Pengguna: ID
                {{ $donasi->id }}
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
                            {{ $donasi->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Program Donasi
                        </th>
                        <td>
                            @if($donasi->ProgramDonasi)
                                <span class="badge badge-relationship">{{ $donasi->ProgramDonasi->judul ?? '' }}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Nama Donatur
                        </th>
                        <td>
                            {{ $donasi->nama_donatur }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Email Donatur
                        </th>
                        <td>
                            <a class="link-light-blue" href="mailto:{{ $donasi->email_donatur }}">
                                <i class="far fa-envelope fa-fw">
                                </i>
                                {{ $donasi->email_donatur }}
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Nomor Rekening Donatur
                        </th>
                        <td>
                            {{ $donasi->rekening }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Atas Nama Rekening
                        </th>
                        <td>
                            {{ $donasi->atas_nama }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Nominal Donasi
                        </th>
                        <td>
                            @currency($donasi->nominal)
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Pesan
                        </th>
                        <td>
                            {{ $donasi->pesan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Kode Donasi
                        </th>
                        <td>
                            {{ $donasi->kode_donasi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Bukti Donasi
                        </th>
                        @if ($donasi->status_donasi == true)
                        <td>
                            <img class="max-h-60 shadow mt-5" src="{{asset($donasi->bukti_donasi)}}">
                        </td>
                        @else
                        <td>
                            Belum Diupload
                        </td>
                        @endif
                    </tr>
                    <tr>
                        <th>
                            Status Bukti Donasi
                        </th>
                        <td>
                            <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $donasi->status_donasi ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Status Verifikasi
                        </th>
                        <td>
                            <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $donasi->status_verifikasi ? 'checked' : '' }}>
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
