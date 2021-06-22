@extends('layouts.admin')
@section('content')
<div class="card bg-white">
    <div class="card-header border-b border-blueGray-200">
        <div class="card-header-container">
            <h6 class="card-title">
                Daftar Peran
            </h6>

            @can('role_create')
                <a class="btn btn-indigo" href="{{ route('admin.peran.create') }}">
                    Tambah Peran
                </a>
            @endcan
        </div>
    </div>
    @livewire('admin.role.index')

</div>
@endsection
