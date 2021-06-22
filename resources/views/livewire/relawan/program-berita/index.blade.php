<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per Halaman:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('program_berita_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    Hapus Terpilih
                </button>
            @endcan



        </div>
        <div class="w-full sm:w-1/2 sm:text-right">
            Cari:
            <input type="text" wire:model.debounce.300ms="search" class="w-full sm:w-1/3 inline-block" />
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
                            Berita
                            @include('components.table.sort', ['field' => 'berita'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($programBeritas as $programBerita)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $programBerita->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $programBerita->id }}
                            </td>
                            <td>
                                @if($programBerita->ProgramDonasi)
                                    <span class="badge badge-relationship">{{ $programBerita->ProgramDonasi->judul ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $programBerita->berita }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('program_berita_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('relawanprogram-berita.show', $programBerita) }}">
                                            Lihat
                                        </a>
                                    @endcan
                                    @can('program_berita_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('relawanprogram-berita.edit', $programBerita) }}">
                                            Ubah
                                        </a>
                                    @endcan
                                    @can('program_berita_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $programBerita->id }})" wire:loading.attr="disabled">
                                            Hapus
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10">Tidak ada entri.</td>
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
                    {{ __('Entries selected') }}
                </p>
            @endif
            {{ $programBeritas->links() }}
        </div>
    </div>
</div>

@push('scripts')
    <script>
        Livewire.on('confirm', e => {
    if (!confirm("Anda yakin?")) {
        return
    }
@this[e.callback](...e.argv)
})
    </script>
@endpush
