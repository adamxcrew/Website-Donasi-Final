@extends('layouts.admin')
@section('content')
<div class="card bg-white">
    <div class="card-header border-b border-blueGray-200">
        <div class="card-header-container">
            <h6 class="card-title">
                Daftar Bank
            </h6>

            @can('bank_create')
                <a class="btn btn-indigo" href="{{ route('admin.bank.create') }}">
                Tambah Bank
                </a>
            @endcan
        </div>
    </div>
    @livewire('admin.bank.index')

</div>
@endsection
