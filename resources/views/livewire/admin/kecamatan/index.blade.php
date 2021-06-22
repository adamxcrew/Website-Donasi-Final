<div>
    <div class="card-controls sm:flex">
        <div class="w-full">
            Per Halaman:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('kecamatan_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    Hapus Terpilih
                </button>
            @endcan



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
                            Kabupaten
                            @include('components.table.sort', ['field' => 'kabupaten.nama'])
                        </th>
                        <th>
                            Kecamatan
                            @include('components.table.sort', ['field' => 'nama'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kecamatans as $kecamatan)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $kecamatan->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $kecamatan->id }}
                            </td>
                            <td>
                                @if($kecamatan->Kabupaten)
                                    <span class="badge badge-relationship">{{ $kecamatan->Kabupaten->nama ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $kecamatan->nama }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('kecamatan_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.kecamatan.edit', $kecamatan) }}">
                                            Ubah
                                        </a>
                                    @endcan
                                    @can('kecamatan_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $kecamatan->id }})" wire:loading.attr="disabled">
                                            Hapus
                                        </button>
                                    @endcan
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
            {{ $kecamatans->links() }}
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
