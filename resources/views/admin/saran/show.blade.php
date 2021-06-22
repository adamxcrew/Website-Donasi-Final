@extends('layouts.admin')
@section('content')

<div class="card bg-blueGray-100">
    <div class="card-header">
        <div class="card-header-container">
            <h6 class="card-title">
                Lihat Saran: ID
                {{ $saran->id }}
            </h6>
        </div>
    </div>

    <div class="card-body">
        <div class="pt-3">
            <table class="table table-view">
                <tbody class="bg-white">
                    <tr>
                        <th>
                            {{ trans('cruds.saran.fields.id') }}
                        </th>
                        <td>
                            {{ $saran->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Subjek
                        </th>
                        <td>
                            {{ $saran->subjek }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Nama Pengirim
                        </th>
                        <td>
                            {{ $saran->pengirim }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Email Pengirim
                        </th>
                        <td>
                            <a class="link-light-blue" href="mailto:{{ $saran->email }}">
                                <i class="far fa-envelope fa-fw">
                                </i>
                                {{ $saran->email }}
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Saran
                        </th>
                        <td>
                            {{ $saran->isi }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="form-group">
            <a href="{{ route('admin.saran.index') }}" class="btn btn-secondary">
                Kembali
            </a>
        </div>
    </div>
</div>
@endsection
