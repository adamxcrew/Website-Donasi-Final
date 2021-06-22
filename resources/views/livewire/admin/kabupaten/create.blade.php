<form wire:submit.prevent="submit" class="pt-8">

    <div class="form-group {{ $errors->has('kabupaten.provinsi_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="provinsi">Provinsi</label>
        <x-select-list class="form-control" required id="provinsi" name="provinsi" :options="$this->listsForFields['provinsi']" wire:model="kabupaten.provinsi_id" />
        <div class="validation-message">
            {{ $errors->first('kabupaten.provinsi_id') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('kabupaten.nama') ? 'invalid' : '' }}">
        <label class="form-label required" for="nama">Kabupaten</label>
        <input class="form-control" type="text" name="nama" id="nama" required wire:model.defer="kabupaten.nama">
        <div class="validation-message">
            {{ $errors->first('kabupaten.nama') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            Simpan
        </button>
        <a href="{{ route('admin.kabupaten.index') }}" class="btn btn-secondary">
            Batal
        </a>
    </div>
</form>
