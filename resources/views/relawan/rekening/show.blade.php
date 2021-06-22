@extends('layouts.relawan')
@section('content')

<div class="card bg-blueGray-100">
    <div class="card-header">
        <div class="card-header-container">
            <h6 class="card-title">
                Lihat Rekening: ID
                {{ $rekening->id }}
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
                            {{ $rekening->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Bank
                        </th>
                        <td>
                            @if($rekening->Bank)
                                <span class="badge badge-relationship">{{ $rekening->Bank->nama ?? '' }}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Atas Nama
                        </th>
                        <td>
                            {{ $rekening->atas_nama }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Nomor Rekening
                        </th>
                        <td>
                            {{ $rekening->nomor_rekening }}
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
