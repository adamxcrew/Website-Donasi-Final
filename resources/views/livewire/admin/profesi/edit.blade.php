<form wire:submit.prevent="submit" class="pt-8">

    <div class="form-group {{ $errors->has('profesi.nama') ? 'invalid' : '' }}">
        <label class="form-label required" for="nama">Profesi</label>
        <input class="form-control" type="text" name="nama" id="nama" required wire:model.defer="profesi.nama">
        <div class="validation-message">
            {{ $errors->first('profesi.nama') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            Simpan
        </button>
        <a href="{{ route('admin.profesi.index') }}" class="btn btn-secondary">
            Batal
        </a>
    </div>
</form>
