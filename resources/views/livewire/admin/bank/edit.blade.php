<form wire:submit.prevent="submit" class="pt-8">

    <div class="form-group {{ $errors->has('bank.nama') ? 'invalid' : '' }}">
        <label class="form-label required" for="nama">Nama Bank</label>
        <input class="form-control" type="text" name="nama" id="nama" required wire:model.defer="bank.nama">
        <div class="validation-message">
            {{ $errors->first('bank.nama') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('bank.kode_bank') ? 'invalid' : '' }}">
        <label class="form-label required" for="kode_bank">Kode Bank</label>
        <input class="form-control" type="text" name="kode_bank" id="kode_bank" required wire:model.defer="bank.kode_bank">
        <div class="validation-message">
            {{ $errors->first('bank.kode_bank') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            Simpan
        </button>
        <a href="{{ route('admin.bank.index') }}" class="btn btn-secondary">
            Batal
        </a>
    </div>
</form>
