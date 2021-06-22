@extends('layouts.admin')
@section('content')
<div class="card bg-white">
    <div class="card-header border-b border-blueGray-200">
        <div class="card-header-container">
            <h6 class="card-title">
                Daftar Profesi
            </h6>

            @can('profesi_create')
                <a class="btn btn-indigo" href="{{ route('admin.profesi.create') }}">
                    Tambah Profesi
                </a>
            @endcan
        </div>
    </div>
    @livewire('admin.profesi.index')

</div>
@endsection
