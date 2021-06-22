<form wire:submit.prevent="submit" class="pt-8">

    <div class="form-group {{ $errors->has('rekening.bank_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="bank">Bank</label>
        <x-select-list class="form-control" required id="bank" name="bank" :options="$this->listsForFields['bank']" wire:model="rekening.bank_id" />
        <div class="validation-message">
            {{ $errors->first('rekening.bank_id') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('rekening.atas_nama') ? 'invalid' : '' }}">
        <label class="form-label required" for="atas_nama">Atas Nama</label>
        <input class="form-control" type="text" name="atas_nama" id="atas_nama" required wire:model.defer="rekening.atas_nama">
        <div class="validation-message">
            {{ $errors->first('rekening.atas_nama') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('rekening.nomor_rekening') ? 'invalid' : '' }}">
        <label class="form-label required" for="nomor_rekening">Nomor Rekening</label>
        <input class="form-control" type="text" name="nomor_rekening" id="nomor_rekening" required wire:model.defer="rekening.nomor_rekening">
        <div class="validation-message">
            {{ $errors->first('rekening.nomor_rekening') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            Simpan
        </button>
        <a href="{{ route('admin.rekening.index') }}" class="btn btn-secondary">
            Batal
        </a>
    </div>
</form>
