@extends('layouts.admin')
@section('content')

<div class="card bg-blueGray-100">
    <div class="card-header">
        <div class="card-header-container">
            <h6 class="card-title">
                Ubah
                Berita:
                ID
                {{ $programBerita->id }}
            </h6>
        </div>
    </div>

    <div class="card-body">
        @livewire('admin.program-berita.edit', [$programBerita])
    </div>
</div>
@endsection
