@extends('layouts.relawan')
@section('header')
<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 font-semibold">
        Program Berita
    </div>
</header>
@stop
@section('content')
<div class="card bg-white">
    <div class="card-header border-b border-blueGray-200">
        <div class="card-header-container">
            <h6 class="card-title">
                Berita
                Daftar
            </h6>

                <a class="btn btn-indigo" href="{{ route('relawan.program-berita.create') }}">
                    Tambah Berita
                </a>
        </div>
    </div>
    @livewire('relawan.program-berita.index')

</div>
@endsection
