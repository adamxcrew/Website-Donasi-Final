<form wire:submit.prevent="submit" class="pt-8">

    <div class="form-group {{ $errors->has('user.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">Nama</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="user.name">
        <div class="validation-message">
            {{ $errors->first('user.name') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('roles') ? 'invalid' : '' }}">
        <label class="form-label required" for="roles">Peran</label>
        <x-select-list class="form-control" required id="roles" name="roles" wire:model="roles" :options="$this->listsForFields['roles']" multiple />
        <div class="validation-message">
            {{ $errors->first('roles') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.email') ? 'invalid' : '' }}">
        <label class="form-label required" for="email">Email</label>
        <input class="form-control" type="email" name="email" id="email" required wire:model.defer="user.email">
        <div class="validation-message">
            {{ $errors->first('user.email') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.telepon') ? 'invalid' : '' }}">
        <label class="form-label required" for="telepon">Nomor Telepon</label>
        <input class="form-control" type="text" name="telepon" id="telepon" required wire:model.defer="user.telepon">
        <div class="validation-message">
            {{ $errors->first('user.telepon') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.alamat') ? 'invalid' : '' }}">
        <label class="form-label required" for="alamat">Alamat Lengkap</label>
        <input class="form-control" type="text" name="alamat" id="alamat" required wire:model.defer="user.alamat">
        <div class="validation-message">
            {{ $errors->first('user.alamat') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.provinsi_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="provinsi">Provinsi</label>
        <x-select-list class="form-control" required id="provinsi" name="provinsi" :options="$this->listsForFields['provinsi']" wire:model="user.provinsi_id" />
        <div class="validation-message">
            {{ $errors->first('user.provinsi_id') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.kabupaten_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="kabupaten">Kabupaten/Kota</label>
        <x-select-list class="form-control" required id="kabupaten" name="kabupaten" :options="$this->listsForFields['kabupaten']" wire:model="user.kabupaten_id" />
        <div class="validation-message">
            {{ $errors->first('user.kabupaten_id') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.kecamatan_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="kecamatan">Kecamatan</label>
        <x-select-list class="form-control" required id="kecamatan" name="kecamatan" :options="$this->listsForFields['kecamatan']" wire:model="user.kecamatan_id" />
        <div class="validation-message">
            {{ $errors->first('user.kecamatan_id') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.kelurahan_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="kelurahan">Kelurahan</label>
        <x-select-list class="form-control" required id="kelurahan" name="kelurahan" :options="$this->listsForFields['kelurahan']" wire:model="user.kelurahan_id" />
        <div class="validation-message">
            {{ $errors->first('user.kelurahan_id') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.agama_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="agama">Agama</label>
        <x-select-list class="form-control" required id="agama" name="agama" :options="$this->listsForFields['agama']" wire:model="user.agama_id" />
        <div class="validation-message">
            {{ $errors->first('user.agama_id') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.profesi_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="profesi">Profesi</label>
        <x-select-list class="form-control" required id="profesi" name="profesi" :options="$this->listsForFields['profesi']" wire:model="user.profesi_id" />
        <div class="validation-message">
            {{ $errors->first('user.profesi_id') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.password') ? 'invalid' : '' }}">
        <label class="form-label required" for="password">Password</label>
        <input class="form-control" type="password" name="password" id="password" required wire:model.defer="password">
        <div class="validation-message">
            {{ $errors->first('user.password') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            Simpan
        </button>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
            Batal
        </a>
    </div>
</form>
