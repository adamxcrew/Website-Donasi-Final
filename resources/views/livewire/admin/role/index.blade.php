<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per Halaman:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('role_delete')
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
                            Peran
                            @include('components.table.sort', ['field' => 'title'])
                        </th>
                        <th>
                            Perizinan
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($roles as $role)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $role->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $role->id }}
                            </td>
                            <td>
                                {{ $role->title }}
                            </td>
                            <td>
                                @foreach($role->permissions as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->title }}</span>
                                @endforeach
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('role_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.peran.show', $role) }}">
                                            Lihat
                                        </a>
                                    @endcan
                                    @can('role_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.peran.edit', $role) }}">
                                            Ubah
                                        </a>
                                    @endcan
                                    @can('role_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $role->id }})" wire:loading.attr="disabled">
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
            {{ $roles->links() }}
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
