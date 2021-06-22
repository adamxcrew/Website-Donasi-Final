@extends('layouts.admin')
@section('content')

<div class="card bg-blueGray-100">
    <div class="card-header">
        <div class="card-header-container">
            <h6 class="card-title">
                {{ trans('global.view') }}
                {{ trans('cruds.bank.title_singular') }}:
                {{ trans('cruds.bank.fields.id') }}
                {{ $bank->id }}
            </h6>
        </div>
    </div>

    <div class="card-body">
        <div class="pt-3">
            <table class="table table-view">
                <tbody class="bg-white">
                    <tr>
                        <th>
                            ID
                        </th>
                        <td>
                            {{ $bank->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Nama Bank
                        </th>
                        <td>
                            {{ $bank->nama }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Kode Bank
                        </th>
                        <td>
                            {{ $bank->kode_bank }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="form-group">
            <a href="{{ url()->previous() }}" class="btn btn-secondary">
                Kembali
            </a>
        </div>
    </div>
</div>
@endsection
