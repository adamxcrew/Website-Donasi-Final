@extends('layouts.admin')
@section('content')
<div class="card bg-white">
    <div class="card-header border-b border-blueGray-200">
        <div class="card-header-container">
            <h6 class="card-title">
                Daftar Kecamatan
            </h6>

            @can('kecamatan_create')
                <a class="btn btn-indigo" href="{{ route('admin.kecamatan.create') }}">
                    Tambah Kecamatan
                </a>
            @endcan
        </div>
    </div>
    @livewire('admin.kecamatan.index')

</div>
@endsection
