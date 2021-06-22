<form wire:submit.prevent="submit" class="pt-8">

    <div class="form-group {{ $errors->has('programDonasi.rekening_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="rekening">Rekening Program</label>
        <x-select-list class="form-control" required id="rekening" name="rekening" :options="$this->listsForFields['rekening']" wire:model="programDonasi.rekening_id" />
        <div class="validation-message">
            {{ $errors->first('programDonasi.rekening_id') }}
        </div>
        <div class="help-block">
            Masukkan rekening untuk menerima donasi
        </div>
    </div>
    <div class="form-group {{ $errors->has('programDonasi.judul') ? 'invalid' : '' }}">
        <label class="form-label required" for="judul">Judul</label>
        <input class="form-control" type="text" name="judul" id="judul" required wire:model.defer="programDonasi.judul">
        <div class="validation-message">
            {{ $errors->first('programDonasi.judul') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('programDonasi.deskripsi') ? 'invalid' : '' }}">
        <label class="form-label required" for="deskripsi">Deskripsi</label>
        <input class="form-control" type="text" name="deskripsi" id="deskripsi" required wire:model.defer="programDonasi.deskripsi">
        <div class="validation-message">
            {{ $errors->first('programDonasi.deskripsi') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('thumbnail') ? 'invalid' : '' }}">
        <label class="form-label required" for="thumbnail">Gambar Pratinjau</label>
        <input class="border-gray-300 focus:ring-blue-600 block w-full overflow-hidden cursor-pointer border text-gray-800 bg-white rounded-md shadow-sm focus:outline-none focus:ring-2 focus:border-transparent"
        id="thumbnail" name="thumbnail" type="file" wire:model="thumbnail">
        @error('thumbnail') <span class="error">{{ $message }}</span> @enderror
        @if ($thumbnail)
            <img class="max-h-48 shadow mt-5" src="{{ $thumbnail->temporaryUrl() }}">
        @endif
    </div>
    <div wire:ignore class="form-group {{ $errors->has('programDonasi.konten') ? 'invalid' : '' }}">
        <label class="form-label required" for="konten">Tuliskan konten mengenai program penggalangan dana</label>
        <div>
            <textarea wire:model="programDonasi.konten" class="form-control" required name="aa" id="aa"></textarea>
        </div>
        <div class="validation-message">
            {{ $errors->first('programDonasi.konten') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('programDonasi.target') ? 'invalid' : '' }}">
        <label class="form-label required" for="target">Target</label>
        <input class="form-control" type="number" name="target" id="target" required wire:model.defer="programDonasi.target" step="1">
        <div class="validation-message">
            {{ $errors->first('programDonasi.target') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('programDonasi.batas_akhir') ? 'invalid' : '' }}">
        <label class="form-label required" for="batas_akhir">Batas Akhir</label>
        <x-date-picker class="form-control" required wire:model="programDonasi.batas_akhir" id="batas_akhir" name="batas_akhir" />
        <div class="validation-message">
            {{ $errors->first('programDonasi.batas_akhir') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            Simpan
        </button>
        <a href="{{ route('admin.program-donasi.index') }}" class="btn btn-secondary">
            Batal
        </a>
    </div>
</form>

@push('scripts')
<script src="//cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
<script>
    var options = {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    };
    const editor = CKEDITOR.replace('aa', options);
    editor.on('change', function(event){
        console.log(event.editor.getData())
        @this.set('programDonasi.konten', event.editor.getData());
    });
</script>
@endpush
