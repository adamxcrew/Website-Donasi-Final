@extends('layouts.admin')
@section('content')

<div class="card bg-blueGray-100">
    <div class="card-header">
        <div class="card-header-container">
            <h6 class="card-title">
                Ubah Data Kecamatan: ID
                {{ $kecamatan->id }}
            </h6>
        </div>
    </div>

    <div class="card-body">
        @livewire('admin.kecamatan.edit', [$kecamatan])
    </div>
</div>
@endsection
