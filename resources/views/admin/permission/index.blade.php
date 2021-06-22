@extends('layouts.admin')
@section('content')
<div class="card bg-white">
    <div class="card-header border-b border-blueGray-200">
        <div class="card-header-container">
            <h6 class="card-title">
                Daftar Perizinan
            </h6>

            @can('permission_create')
                <a class="btn btn-indigo" href="{{ route('admin.perizinan.create') }}">
                    Tambah Perizinan
                </a>
            @endcan
        </div>
    </div>
    @livewire('admin.permission.index')

</div>
@endsection
