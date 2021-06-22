<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('programBerita.program_donasi_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="program_donasi">Program Donasi</label>
        <x-select-list class="form-control" required id="program_donasi" name="program_donasi" :options="$this->listsForFields['program_donasi']" wire:model="programBerita.program_donasi_id" />
        <div class="validation-message">
            {{ $errors->first('programBerita.program_donasi_id') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('programBerita.berita') ? 'invalid' : '' }}">
        <label class="form-label required" for="berita">Berita</label>
        <textarea class="form-control" name="berita" id="berita" required wire:model.defer="programBerita.berita" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('programBerita.berita') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            Simpan
        </button>
        <a href="{{ route('admin.program-berita.index') }}" class="btn btn-secondary">
            Batal
        </a>
    </div>
</form>
