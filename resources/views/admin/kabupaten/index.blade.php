@extends('layouts.admin')
@section('content')
<div class="card bg-white">
    <div class="card-header border-b border-blueGray-200">
        <div class="card-header-container">
            <h6 class="card-title">
                Daftar Kabupaten/Kota
            </h6>

            @can('kabupaten_create')
                <a class="btn btn-indigo" href="{{ route('admin.kabupaten.create') }}">
                    Tambah Kabupaten
                </a>
            @endcan
        </div>
    </div>
    @livewire('admin.kabupaten.index')

</div>
@endsection
