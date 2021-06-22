<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per Halaman:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('saran_delete')
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
                            Subjek
                            @include('components.table.sort', ['field' => 'subjek'])
                        </th>
                        <th>
                            Nama Pengirim
                            @include('components.table.sort', ['field' => 'pengirim'])
                        </th>
                        <th>
                            Email Pengirim
                            @include('components.table.sort', ['field' => 'email'])
                        </th>
                        <th>
                            Saran
                            @include('components.table.sort', ['field' => 'isi'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($sarans as $saran)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $saran->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $saran->id }}
                            </td>
                            <td>
                                {{ $saran->subjek }}
                            </td>
                            <td>
                                {{ $saran->pengirim }}
                            </td>
                            <td>
                                <a class="link-light-blue" href="mailto:{{ $saran->email }}">
                                    <i class="far fa-envelope fa-fw">
                                    </i>
                                    {{ $saran->email }}
                                </a>
                            </td>
                            <td>
                                {{ $saran->isi }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('saran_show')
                                    <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.saran.show', $saran) }}">
                                        Lihat
                                    </a>
                                    @endcan
                                    @can('saran_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $saran->id }})" wire:loading.attr="disabled">
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
            {{ $sarans->links() }}
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
