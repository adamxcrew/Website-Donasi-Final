@extends('layouts.admin')
@section('content')
<div class="card bg-white">
    <div class="card-header border-b border-blueGray-200">
        <div class="card-header-container">
            <h6 class="card-title">
                Berita
                Daftar
            </h6>

            @can('program_berita_create')
                <a class="btn btn-indigo" href="{{ route('admin.program-berita.create') }}">
                    Tambah Berita
                </a>
            @endcan
        </div>
    </div>
    @livewire('admin.program-berita.index')

</div>
@endsection
