<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per Halaman:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('rekening_delete')
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
                            Bank
                            @include('components.table.sort', ['field' => 'bank.nama'])
                        </th>
                        <th>
                            Atas Nama
                            @include('components.table.sort', ['field' => 'atas_nama'])
                        </th>
                        <th>
                            Nomor Rekening
                            @include('components.table.sort', ['field' => 'nomor_rekening'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($rekenings as $rekening)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $rekening->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $rekening->id }}
                            </td>
                            <td>
                                @if($rekening->User)
                                    <a href="{{ route('admin.users.show', $rekening->User->id) }}" class="badge badge-relationship">{{ $rekening->User->email ?? '' }}</a>
                                @endif
                            </td>
                            <td>
                                @if($rekening->Bank)
                                    <a href="{{ route('admin.bank.show', $rekening->Bank->id) }}" class="badge badge-relationship">{{ $rekening->Bank->nama ?? '' }}</a>
                                @endif
                            </td>
                            <td>
                                {{ $rekening->atas_nama }}
                            </td>
                            <td>
                                {{ $rekening->nomor_rekening }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('rekening_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.rekening.show', $rekening) }}">
                                            Lihat
                                        </a>
                                    @endcan
                                    @can('rekening_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.rekening.edit', $rekening) }}">
                                            Ubah
                                        </a>
                                    @endcan
                                    @can('rekening_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $rekening->id }})" wire:loading.attr="disabled">
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
            {{ $rekenings->links() }}
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
