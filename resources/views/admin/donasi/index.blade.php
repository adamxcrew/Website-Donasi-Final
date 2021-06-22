@extends('layouts.admin')
@section('content')
<div class="card bg-white">
    <div class="card-header border-b border-blueGray-200">
        <div class="card-header-container">
            <h6 class="card-title">
                Daftar Donasi
            </h6>

            @can('donasi_create')
                <a class="btn btn-indigo" href="{{ route('admin.donasi.create') }}">
                    Tambah Donasi
                </a>
            @endcan
        </div>
    </div>
    @livewire('admin.donasi.index')

</div>
@endsection
