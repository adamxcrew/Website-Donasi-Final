@extends('layouts.relawan')
@section('header')
<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 font-semibold">
        Donasi
    </div>
</header>
@stop
@section('content')
<div class="card bg-white">
    <div class="card-header border-b border-blueGray-200">
        <div class="card-header-container">
            <h6 class="card-title">
                Daftar Donasi
            </h6>

                <a class="btn btn-indigo" href="{{ route('relawan.donasi.create') }}">
                    Tambah Donasi
                </a>
        </div>
    </div>
    @livewire('relawan.donasi.index')

</div>
@endsection
