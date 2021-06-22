@extends('layouts.admin')
@section('content')
<div class="card bg-white">
    <div class="card-header border-b border-blueGray-200">
        <div class="card-header-container">
            <h6 class="card-title">
                Daftar Pengguna
            </h6>

            @can('user_create')
                <a class="btn btn-indigo" href="{{ route('admin.users.create') }}">
                    Tambah Pengguna
                </a>
            @endcan
        </div>
    </div>
    @livewire('admin.user.index')

</div>
@endsection
