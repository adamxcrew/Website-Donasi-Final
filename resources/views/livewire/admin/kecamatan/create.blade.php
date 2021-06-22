<form wire:submit.prevent="submit" class="pt-8">

    <div class="form-group {{ $errors->has('kecamatan.kabupaten_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="kabupaten">Kabupaten</label>
        <x-select-list class="form-control" required id="kabupaten" name="kabupaten" :options="$this->listsForFields['kabupaten']" wire:model="kecamatan.kabupaten_id" />
        <div class="validation-message">
            {{ $errors->first('kecamatan.kabupaten_id') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('kecamatan.nama') ? 'invalid' : '' }}">
        <label class="form-label required" for="nama">Kecamatan</label>
        <input class="form-control" type="text" name="nama" id="nama" required wire:model.defer="kecamatan.nama">
        <div class="validation-message">
            {{ $errors->first('kecamatan.nama') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            Simpan
        </button>
        <a href="{{ route('admin.kecamatan.index') }}" class="btn btn-secondary">
            Batal
        </a>
    </div>
</form>
