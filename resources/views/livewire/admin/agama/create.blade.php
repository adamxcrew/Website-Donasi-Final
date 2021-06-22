<form wire:submit.prevent="submit" class="pt-8">

    <div class="form-group {{ $errors->has('agama.nama') ? 'invalid' : '' }}">
        <label class="form-label required" for="nama">Agama</label>
        <input class="form-control" type="text" name="nama" id="nama" required wire:model.defer="agama.nama">
        <div class="validation-message">
            {{ $errors->first('agama.nama') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            Simpan
        </button>
        <a href="{{ route('admin.agama.index') }}" class="btn btn-secondary">
            Batal
        </a>
    </div>
</form>
