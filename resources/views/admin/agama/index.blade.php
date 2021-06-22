@extends('layouts.admin')
@section('content')
<div class="card bg-white">
    <div class="card-header border-b border-blueGray-200">
        <div class="card-header-container">
            <h6 class="card-title">
                Daftar Agama
            </h6>

            @can('agama_create')
                <a class="btn btn-indigo" href="{{ route('admin.agama.create') }}">
                   Tambah Agama
                </a>
            @endcan
        </div>
    </div>
    @livewire('admin.agama.index')

</div>
@endsection
