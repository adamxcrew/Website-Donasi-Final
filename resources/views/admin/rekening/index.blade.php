@extends('layouts.admin')
@section('content')
<div class="card bg-white">
    <div class="card-header border-b border-blueGray-200">
        <div class="card-header-container">
            <h6 class="card-title">
                Daftar Rekening
            </h6>

            @can('rekening_create')
                <a class="btn btn-indigo" href="{{ route('admin.rekening.create') }}">
                    Tambah Rekening
                </a>
            @endcan
        </div>
    </div>
    @livewire('admin.rekening.index')

</div>
@endsection
