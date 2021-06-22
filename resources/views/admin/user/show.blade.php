@extends('layouts.admin')
@section('content')

<div class="card bg-blueGray-100">
    <div class="card-header">
        <div class="card-header-container">
            <h6 class="card-title">
                Lihat Pengguna: ID
                {{ $user->id }}
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
                            {{ $user->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Nama
                        </th>
                        <td>
                            {{ $user->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Peran
                        </th>
                        <td>
                            @foreach($user->roles as $key => $entry)
                                <span class="badge badge-relationship">{{ $entry->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Email
                        </th>
                        <td>
                            <a class="link-light-blue" href="mailto:{{ $user->email }}">
                                <i class="far fa-envelope fa-fw">
                                </i>
                                {{ $user->email }}
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Nomor Telepon
                        </th>
                        <td>
                            {{ $user->telepon }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Alamat Lengkap
                        </th>
                        <td>
                            {{ $user->alamat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Provinsi
                        </th>
                        <td>
                            @if($user->Provinsi)
                                <span class="badge badge-relationship">{{ $user->Provinsi->nama ?? '' }}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Kabupaten/Kota
                        </th>
                        <td>
                            @if($user->Kabupaten)
                                <span class="badge badge-relationship">{{ $user->Kabupaten->nama ?? '' }}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Kecamatan
                        </th>
                        <td>
                            @if($user->Kecamatan)
                                <span class="badge badge-relationship">{{ $user->Kecamatan->nama ?? '' }}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Kelurahan
                        </th>
                        <td>
                            @if($user->Kelurahan)
                                <span class="badge badge-relationship">{{ $user->Kelurahan->nama ?? '' }}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Agama
                        </th>
                        <td>
                            @if($user->Agama)
                                <span class="badge badge-relationship">{{ $user->Agama->nama ?? '' }}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Profesi
                        </th>
                        <td>
                            @if($user->Profesi)
                                <span class="badge badge-relationship">{{ $user->Profesi->nama ?? '' }}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Terverifikasi Pada
                        </th>
                        <td>
                            {{ $user->email_verified_at }}
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
