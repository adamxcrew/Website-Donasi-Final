@extends('layouts.admin')
@section('content')
<div class="card bg-white">
    <div class="card-header border-b border-blueGray-200">
        <div class="card-header-container">
            <h6 class="card-title">
                Daftar Provinsi
            </h6>

            @can('provinsi_create')
                <a class="btn btn-indigo" href="{{ route('admin.provinsi.create') }}">
                    Tambah Provinsi
                </a>
            @endcan
        </div>
    </div>
    @livewire('admin.provinsi.index')

</div>
@endsection
