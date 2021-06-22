<form wire:submit.prevent="submit" class="pt-8">

    <div class="form-group {{ $errors->has('donasi.program_donasi_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="program_donasi">Program Donasi</label>
        <x-select-list class="form-control" required id="program_donasi" name="program_donasi" :options="$this->listsForFields['program_donasi']" wire:model="donasi.program_donasi_id" disabled/>
        <div class="validation-message">
            {{ $errors->first('donasi.program_donasi_id') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('donasi.nama_donatur') ? 'invalid' : '' }}">
        <label class="form-label" for="nama_donatur">Nama Donatur</label>
        <input class="form-control" type="text" name="nama_donatur" id="nama_donatur" wire:model.defer="donasi.nama_donatur" readonly>
        <div class="validation-message">
            {{ $errors->first('donasi.nama_donatur') }}
        </div>
        <div class="help-block">
            Tidak wajib diiisi
        </div>
    </div>
    <div class="form-group {{ $errors->has('donasi.email_donatur') ? 'invalid' : '' }}">
        <label class="form-label" for="email_donatur">Email Donatur</label>
        <input class="form-control" type="email" name="email_donatur" id="email_donatur" wire:model.defer="donasi.email_donatur" readonly>
        <div class="validation-message">
            {{ $errors->first('donasi.email_donatur') }}
        </div>
        <div class="help-block">
            Tidak wajib diiisi
        </div>
    </div>
    <div class="form-group {{ $errors->has('donasi.rekening') ? 'invalid' : '' }}">
        <label class="form-label required" for="rekening">Nomor Rekening Donatur</label>
        <input class="form-control" type="text" name="rekening" id="rekening" required wire:model.defer="donasi.rekening" readonly>
        <div class="validation-message">
            {{ $errors->first('donasi.rekening') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('donasi.atas_nama') ? 'invalid' : '' }}">
        <label class="form-label required" for="atas_nama">Atas Nama Rekening</label>
        <input class="form-control" type="text" name="atas_nama" id="atas_nama" required wire:model.defer="donasi.atas_nama" readonly>
        <div class="validation-message">
            {{ $errors->first('donasi.atas_nama') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('donasi.nominal') ? 'invalid' : '' }}">
        <label class="form-label required" for="nominal">Nominal Donasi</label>
        <input class="form-control" type="number" name="nominal" id="nominal" required wire:model.defer="donasi.nominal" step="1" readonly>
        <div class="validation-message">
            {{ $errors->first('donasi.nominal') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('donasi.pesan') ? 'invalid' : '' }}">
        <label class="form-label" for="pesan">Pesan</label>
        <textarea class="form-control" name="pesan" id="pesan" wire:model.defer="donasi.pesan" rows="4" readonly></textarea>
        <div class="validation-message">
            {{ $errors->first('donasi.pesan') }}
        </div>
        <div class="help-block">
            Tidak wajib diiisi
        </div>
    </div>
    <div class="form-group {{ $errors->has('donasi.status_donasi') ? 'invalid' : '' }}">
        <label class="form-label" for="status_donasi">Bukti Donasi</label>
        <img class="max-h-60 shadow mt-5" src="{{asset($donasi->bukti_donasi)}}">
    </div>
    <div class="form-group {{ $errors->has('donasi.status_donasi') ? 'invalid' : '' }}">
        <label class="form-label" for="status_donasi">Status Bukti Donasi</label>
        <input class="form-control" type="checkbox" name="status_donasi" id="status_donasi" wire:model.defer="donasi.status_donasi">
        <div class="validation-message">
            {{ $errors->first('donasi.status_donasi') }}
        </div>
        <div class="help-block">
            Bukti donasi telah ada?
        </div>
    </div>
    <div class="form-group {{ $errors->has('donasi.status_verifikasi') ? 'invalid' : '' }}">
        <label class="form-label" for="status_verifikasi">Status Verifikasi</label>
        <input class="form-control" type="checkbox" name="status_verifikasi" id="status_verifikasi" wire:model.defer="donasi.status_verifikasi">
        <div class="validation-message">
            {{ $errors->first('donasi.status_verifikasi') }}
        </div>
        <div class="help-block">
            Bukti donasi telah diverifikasi?
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            Simpan
        </button>
        <a href="{{ route('admin.donasi.index') }}" class="btn btn-secondary">
            Batal
        </a>
    </div>
</form>
