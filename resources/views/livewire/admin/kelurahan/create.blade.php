<form wire:submit.prevent="submit" class="pt-8">

    <div class="form-group {{ $errors->has('kelurahan.kecamatan_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="kecamatan">Kecamatan</label>
        <x-select-list class="form-control" required id="kecamatan" name="kecamatan" :options="$this->listsForFields['kecamatan']" wire:model="kelurahan.kecamatan_id" />
        <div class="validation-message">
            {{ $errors->first('kelurahan.kecamatan_id') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('kelurahan.nama') ? 'invalid' : '' }}">
        <label class="form-label required" for="nama">Kelurahan</label>
        <input class="form-control" type="text" name="nama" id="nama" required wire:model.defer="kelurahan.nama">
        <div class="validation-message">
            {{ $errors->first('kelurahan.nama') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            Simpan
        </button>
        <a href="{{ route('admin.kelurahan.index') }}" class="btn btn-secondary">
            Batal
        </a>
    </div>
</form>
