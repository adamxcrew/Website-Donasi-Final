<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per Halaman:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('program_donasi_delete')
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
                            User
                            @include('components.table.sort', ['field' => 'user.email'])
                        </th>
                        <th>
                            Rekening Program
                            @include('components.table.sort', ['field' => 'rekening.nomor_rekening'])
                        </th>
                        <th>
                            Judul
                            @include('components.table.sort', ['field' => 'judul'])
                        </th>
                        <th>
                            Deskripsi
                            @include('components.table.sort', ['field' => 'deskripsi'])
                        </th>
                        <th>
                            Gambar Pratinjau
                        </th>
                        <th>
                            Target
                            @include('components.table.sort', ['field' => 'target'])
                        </th>
                        <th>
                            Terkumpul
                        </th>
                        <th>
                            Batas Akhir
                            @include('components.table.sort', ['field' => 'batas_akhir'])
                        </th>
                        <th>
                            Status Verifikasi
                            @include('components.table.sort', ['field' => 'status_verifikasi'])
                        </th>
                        <th>
                            Status Selesai
                            @include('components.table.sort', ['field' => 'status_selesai'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($programDonasis as $programDonasi)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $programDonasi->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $programDonasi->id }}
                            </td>
                            <td>
                                @if($programDonasi->User)
                                    <a href="{{ route('admin.users.show', $programDonasi->User->id) }}" class="badge badge-relationship">{{ $programDonasi->User->email ?? '' }}</a>
                                @endif
                            </td>
                            <td>
                                @if($programDonasi->Rekening)
                                    <a href="{{ route('admin.rekening.show', $programDonasi->Rekening->id) }}" class="badge badge-relationship">{{ $programDonasi->Rekening->nomor_rekening ?? '' }}</a>
                                @endif
                            </td>
                            <td>
                                {{ $programDonasi->judul }}
                            </td>
                            <td>
                                {{ $programDonasi->deskripsi }}
                            </td>
                            <td>
                                @if ($programDonasi->thumbnail == "")
                                    Tidak ada
                                @else
                                    <img class="max-h-48 shadow" src="{{$programDonasi->getThumbnail()}}">
                                @endif
                            </td>
                            <td>
                                @currency($programDonasi->target)
                            </td>
                            <td>
                                @currency($programDonasi->donasi->where('status_donasi', '1')->sum('nominal'))
                            </td>
                            <td>
                                {{ $programDonasi->batas_akhir }}
                            </td>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $programDonasi->status_verifikasi ? 'checked' : '' }}>
                            </td>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $programDonasi->status_selesai ? 'checked' : '' }}>
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('program_donasi_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.program-donasi.show', $programDonasi) }}">
                                            Lihat
                                        </a>
                                    @endcan
                                    @can('program_donasi_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.program-donasi.edit', $programDonasi) }}">
                                            Ubah
                                        </a>
                                    @endcan
                                    @can('program_donasi_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $programDonasi->id }})" wire:loading.attr="disabled">
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
            {{ $programDonasis->links() }}
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
