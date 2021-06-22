<x-auth-card>
    <x-slot name="logo">
        <a href="/">
            <x-application-logo class="w-20 h-20 fill-current text-gray-300" />
        </a>
    </x-slot>
    <form>
        <div @if($next) style="display:none"@endif >
            <div>
                <label for="nama" class="font-medium text-sm text-gray-700">Nama</label>
                <input wire:model="nama" class="form-control" id="nama" name="nama" type="text" placeholder="Masukkan nama lengkap" autofocus="autofocus" >
                @error('nama') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <label for="email" class="font-medium text-sm text-gray-700">Email</label>
                <input wire:model="email" class="form-control" id="email" name="email" type="email" placeholder="Masukkan alamat email">
                @error('email') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <label class="font-medium text-sm text-gray-700">Nomor Telepon</label>
                <input wire:model="nomor_telepon" type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" placeholder="Masukkan nomor telepon">
                @error('nomor_telepon') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <label for="password" class="font-medium text-sm text-gray-700">Kata Sandi</label>
                <input wire:model="password" class="form-control" id="password" name="password" type="password" autocomplete="new-password" placeholder="Masukkan kata sandi">
                @error('password') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <label for="konfirmasi_password" class="font-medium text-sm text-gray-700">Konfirmasi Kata Sandi</label>
                <input wire:model="konfirmasi_password" class="form-control" id="konfirmasi_password" name="konfirmasi_password" type="password" placeholder="Masukkan ulang kata sandi">
                @error('konfirmasi_password') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-6">
                <div class="flex items-center justify-between">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">Pernah mendaftar?</a>
                    <button wire:click.prevent="next()" class="btn btn-indigo mr-2">Selanjutnya</button>
                </div>
            </div>
        </div>

        <div @if(!$next) style="display:none"@endif>
            <div class="flex flex-row gap-x-4">
                <div class="flex-1">
                    <label class="font-medium text-sm text-gray-700">Provinsi</label>
                    <select wire:model="provinsi" class="select-box" id="provinsi" name="provinsi">
                        <option value="" selected>Pilih provinsi</option>
                        @foreach($semuaProvinsi as $prov)
                            <option value="{{ $prov->id }}">{{ $prov->nama }}</option>
                        @endforeach
                    </select>
                    @error('provinsi') <span class="error">{{ $message }}</span> @enderror
                </div>

                @if ($provinsi != null)
                    <div class="flex-1">
                        <label class="font-medium text-sm text-gray-700">Kota/Kabupaten</label>
                        <select wire:model="kota" class="select-box" id="kota" name="kota">
                            <option value="" selected>Pilih kota/kabupaten</option>
                            @foreach($semuaKabupaten as $kab)
                                <option value="{{ $kab->id }}">{{ $kab->nama }}</option>
                            @endforeach
                        </select>
                        @error('kota') <span class="error">{{ $message }}</span> @enderror
                    </div>
                @endif
            </div>

            <div class="flex flex-row gap-x-4">
                @if ($kota != null && $provinsi != null)
                    <div class="flex-1  mt-4">
                        <label class="font-medium text-sm text-gray-700">Kecamatan</label>
                        <select wire:model="kecamatan" class="select-box" id="kecamatan" name="kecamatan">
                            <option value="" selected>Pilih kecamatan</option>
                            @foreach($semuaKecamatan as $kec)
                                <option value="{{ $kec->id }}">{{ $kec->nama }}</option>
                            @endforeach
                        </select>
                        @error('kecamatan') <span class="error">{{ $message }}</span> @enderror
                    </div>
                @endif

                @if ($kecamatan != null && $kota != null && $provinsi != null)
                    <div class="flex-1  mt-4">
                        <label class="font-medium text-sm text-gray-700">Kelurahan</label>
                        <select wire:model="kelurahan" class="select-box" id="kelurahan" name="kelurahan">
                            <option value="" selected>Pilih kelurahan</option>
                            @foreach($semuaKelurahan as $kel)
                                <option value="{{ $kel->id }}">{{ $kel->nama }}</option>
                            @endforeach
                        </select>
                        @error('kelurahan') <span class="error">{{ $message }}</span> @enderror
                    </div>
                @endif
            </div>

            <div class="mt-4">
                <label class="font-medium text-sm text-gray-700">Alamat Lengkap</label>
                <input wire:model="alamat_lengkap" type="text" class="form-control" placeholder="Masukkan alamat lengkap" id="alamat_lengkap" name="alamat_lengkap">
                @error('alamat_lengkap') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4 grid gap-4 grid-cols-2">
                <div>
                    <label class="font-medium text-sm text-gray-700">Profesi</label>
                    <select wire:model="profesi" class="select-box" id="profesi" name="profesi">
                        <option value="" selected>Pilih profesi...</option>
                        @foreach($semuaProfesi as $profesi)
                            <option value="{{ $profesi->id }}">{{ $profesi->nama }}</option>
                        @endforeach
                    </select>
                    @error('profesi') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="font-medium text-sm text-gray-700">Agama</label>
                    <select wire:model="agama" class="select-box" id="agama" name="agama">
                        <option value="" selected>Pilih agama...</option>
                        @foreach($semuaAgama as $agama)
                            <option value="{{ $agama->id }}">{{ $agama->nama }}</option>
                        @endforeach
                    </select>
                    @error('agama') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="mt-6">
                <div class="flex">
                    <button wire:click.prevent="back()" type="button" class="flex-grow-0 btn btn-secondary">Kembali</button>
                    <div class="flex-grow"></div>
                    <button wire:click.prevent="store()" type="button" class="flex-grow-0 btn btn-indigo mr-2">Daftar</button>
                </div>
            </div>
        </div>
    </form>
</x-auth-card>
