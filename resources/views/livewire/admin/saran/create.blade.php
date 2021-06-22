<form wire:submit.prevent="submit" class="pt-8">

    <div class="form-group {{ $errors->has('saran.subjek') ? 'invalid' : '' }}">
        <label class="form-label required" for="subjek">Subjek</label>
        <input class="form-control" type="text" name="subjek" id="subjek" required wire:model.defer="saran.subjek">
        <div class="validation-message">
            {{ $errors->first('saran.subjek') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('saran.pengirim') ? 'invalid' : '' }}">
        <label class="form-label" for="pengirim">Nama Pengirim</label>
        <input class="form-control" type="text" name="pengirim" id="pengirim" wire:model.defer="saran.pengirim">
        <div class="validation-message">
            {{ $errors->first('saran.pengirim') }}
        </div>
        <div class="help-block">
            Tidak wajib diisi
        </div>
    </div>
    <div class="form-group {{ $errors->has('saran.email') ? 'invalid' : '' }}">
        <label class="form-label" for="email">Email Pengirim</label>
        <input class="form-control" type="email" name="email" id="email" wire:model.defer="saran.email">
        <div class="validation-message">
            {{ $errors->first('saran.email') }}
        </div>
        <div class="help-block">
            Tidak wajib diisi
        </div>
    </div>
    <div class="form-group {{ $errors->has('saran.isi') ? 'invalid' : '' }}">
        <label class="form-label required" for="isi">Saran</label>
        <textarea class="form-control" name="isi" id="isi" required wire:model.defer="saran.isi" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('saran.isi') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            Kirim
        </button>
        <a href="{{ route('admin.saran.index') }}" class="btn btn-secondary">
            Batal
        </a>
    </div>
</form>
