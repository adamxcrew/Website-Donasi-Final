<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per Halaman:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('user_delete')
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
                            Nama
                            @include('components.table.sort', ['field' => 'name'])
                        </th>
                        <th>
                            Peran
                        </th>
                        <th>
                            Email
                            @include('components.table.sort', ['field' => 'email'])
                        </th>
                        <th>
                            Nomor Telepon
                            @include('components.table.sort', ['field' => 'telepon'])
                        </th>
                        <th>
                            Alamat Lengkap
                            @include('components.table.sort', ['field' => 'alamat'])
                        </th>
                        <th>
                            Provinsi
                            @include('components.table.sort', ['field' => 'provinsi.nama'])
                        </th>
                        <th>
                            Kabupaten/Kota
                            @include('components.table.sort', ['field' => 'kabupaten.nama'])
                        </th>
                        <th>
                            Kecamatan
                            @include('components.table.sort', ['field' => 'kecamatan.nama'])
                        </th>
                        <th>
                            Kelurahan
                            @include('components.table.sort', ['field' => 'kelurahan.nama'])
                        </th>
                        <th>
                            Agama
                            @include('components.table.sort', ['field' => 'agama.nama'])
                        </th>
                        <th>
                            Profesi
                            @include('components.table.sort', ['field' => 'profesi.nama'])
                        </th>
                        <th>
                            Terverifikasi Pada
                            @include('components.table.sort', ['field' => 'email_verified_at'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $user->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $user->id }}
                            </td>
                            <td>
                                {{ $user->name }}
                            </td>
                            <td>
                                @foreach($user->roles as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->title }}</span>
                                @endforeach
                            </td>
                            <td>
                                <a class="link-light-blue" href="mailto:{{ $user->email }}">
                                    <i class="far fa-envelope fa-fw">
                                    </i>
                                    {{ $user->email }}
                                </a>
                            </td>
                            <td>
                                {{ $user->telepon }}
                            </td>
                            <td>
                                {{ $user->alamat }}
                            </td>
                            <td>
                                @if($user->Provinsi)
                                    <span class="badge badge-relationship">{{ $user->Provinsi->nama ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($user->Kabupaten)
                                    <span class="badge badge-relationship">{{ $user->Kabupaten->nama ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($user->Kecamatan)
                                    <span class="badge badge-relationship">{{ $user->Kecamatan->nama ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($user->Kelurahan)
                                    <span class="badge badge-relationship">{{ $user->Kelurahan->nama ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($user->Agama)
                                    <span class="badge badge-relationship">{{ $user->Agama->nama ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($user->Profesi)
                                    <span class="badge badge-relationship">{{ $user->Profesi->nama ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $user->email_verified_at }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('user_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.users.show', $user) }}">
                                            Lihat
                                        </a>
                                    @endcan
                                    @can('user_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.users.edit', $user) }}">
                                            Ubah
                                        </a>
                                    @endcan
                                    @can('user_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $user->id }})" wire:loading.attr="disabled">
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
            {{ $users->links() }}
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
