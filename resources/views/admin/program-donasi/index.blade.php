@extends('layouts.admin')
@section('content')
<div class="card bg-white">
    <div class="card-header border-b border-blueGray-200">
        <div class="card-header-container">
            <h6 class="card-title">
                Daftar Program Donasi
            </h6>

            @can('program_donasi_create')
                <a class="btn btn-indigo" href="{{ route('admin.program-donasi.create') }}">
                    Tambah Program Donasi
                </a>
            @endcan
        </div>
    </div>
    @livewire('admin.program-donasi.index')

</div>
@endsection
