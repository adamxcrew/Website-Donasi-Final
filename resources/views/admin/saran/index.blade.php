@extends('layouts.admin')
@section('content')
<div class="card bg-white">
    <div class="card-header border-b border-blueGray-200">
        <div class="card-header-container">
            <h6 class="card-title">
                Daftar Saran
            </h6>

            @can('saran_create')
                <a class="btn btn-indigo" href="{{ route('admin.saran.create') }}">
                    Tambah Saran
                </a>
            @endcan
        </div>
    </div>
    @livewire('admin.saran.index')

</div>
@endsection
