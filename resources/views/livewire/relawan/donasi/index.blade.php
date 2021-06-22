<div>
    <div class="card-controls sm:flex">
        <div class="w-full">
            Per Halaman:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                Hapus Terpilih
            </button>

        </div>
        <div class="w-full sm:w-1/2 sm:text-right">
            Cari:
            <input type="text" wire:model.debounce.300ms="search" class="w-full sm:w-1/3 inline-block rounded-md" />
        </div>
    </div>
    <div wire:loading.delay>
        Memuat...
    </div>

    <div class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table table-index w-full">
                <thead>
                    <tr>
                        <th class="w-9">
                        </th>
                        <th class="w-28">
                            ID
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            Program Donasi
                            @include('components.table.sort', ['field' => 'program_donasi.judul'])
                        </th>
                        <th>
                            Nama Donatur
                            @include('components.table.sort', ['field' => 'nama_donatur'])
                        </th>
                        <th>
                            Email Donatur
                            @include('components.table.sort', ['field' => 'email_donatur'])
                        </th>
                        <th>
                            Nomor Rekening Donatur
                            @include('components.table.sort', ['field' => 'rekening'])
                        </th>
                        <th>
                            Atas Nama Rekening
                            @include('components.table.sort', ['field' => 'atas_nama'])
                        </th>
                        <th>
                            Nominal Donasi
                            @include('components.table.sort', ['field' => 'nominal'])
                        </th>
                        <th>
                            Pesan
                            @include('components.table.sort', ['field' => 'pesan'])
                        </th>
                        <th>
                            Kode Donasi
                            @include('components.table.sort', ['field' => 'kode_donasi'])
                        </th>
                        <th>
                            Bukti Donasi
                        </th>
                        <th>
                            Status Bukti Donasi
                            @include('components.table.sort', ['field' => 'status_donasi'])
                        </th>
                        <th>
                            Status Verifikasi
                            @include('components.table.sort', ['field' => 'status_verifikasi'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($donasis as $donasi)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $donasi->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $donasi->id }}
                            </td>
                            <td>
                                @if($donasi->ProgramDonasi)
                                    <a href="{{ route('relawan.program-donasi.show', $donasi->ProgramDonasi->id) }}" class="badge badge-relationship">{{ $donasi->ProgramDonasi->judul ?? '' }}</a>
                                @endif
                            </td>
                            <td>
                                {{ $donasi->nama_donatur }}
                            </td>
                            <td>
                                <a class="link-light-blue" href="mailto:{{ $donasi->email_donatur }}">
                                    <i class="far fa-envelope fa-fw">
                                    </i>
                                    {{ $donasi->email_donatur }}
                                </a>
                            </td>
                            <td>
                                {{ $donasi->rekening }}
                            </td>
                            <td>
                                {{ $donasi->atas_nama }}
                            </td>
                            <td>
                                @currency($donasi->nominal)
                            </td>
                            <td>
                                {{ $donasi->pesan }}
                            </td>
                            <td>
                                {{ $donasi->kode_donasi }}
                            </td>
                            <td>
                                @if ($donasi->bukti_donasi != "")
                                <a href="{{asset($donasi->bukti_donasi)}}" class="badge badge-relationship">{{asset($donasi->bukti_donasi)}}</a>
                                @else
                                Belum Diupload
                                @endif
                            </td>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $donasi->status_donasi ? 'checked' : '' }}>
                            </td>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $donasi->status_verifikasi ? 'checked' : '' }}>
                            </td>
                            <td>
                                <div class="flex justify-end">
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('relawan.donasi.show', $donasi) }}">
                                            Lihat
                                        </a>
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('relawan.donasi.edit', $donasi) }}">
                                            Ubah
                                        </a>
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $donasi->id }})" wire:loading.attr="disabled">
                                            Hapus
                                        </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10">Tidak ada entri yang ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-body">
        <div class="pt-3">
            @if($this->selectedCount)
                <p class="text-sm leading-5">
                    <span class="font-medium">
                        {{ $this->selectedCount }}
                    </span>
                    Entri terpilih
                </p>
            @endif
            {{ $donasis->links() }}
        </div>
    </div>
</div>

@push('scripts')
    <script>
        Livewire.on('confirm', e => {
    if (!confirm("Apakah Anda yakin?")) {
        return
    }
@this[e.callback](...e.argv)
})
    </script>
@endpush
