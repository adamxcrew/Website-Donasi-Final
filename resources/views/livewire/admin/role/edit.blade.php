<form wire:submit.prevent="submit" class="pt-8">

    <div class="form-group {{ $errors->has('role.title') ? 'invalid' : '' }}">
        <label class="form-label required" for="title">Peran</label>
        <input class="form-control" type="text" name="title" id="title" required wire:model.defer="role.title">
        <div class="validation-message">
            {{ $errors->first('role.title') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('permissions') ? 'invalid' : '' }}">
        <label class="form-label required" for="permissions">Perizinan</label>
        <x-select-list class="form-control" required id="permissions" name="permissions" wire:model="permissions" :options="$this->listsForFields['permissions']" multiple />
        <div class="validation-message">
            {{ $errors->first('permissions') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            Simpan
        </button>
        <a href="{{ route('admin.peran.index') }}" class="btn btn-secondary">
            Batal
        </a>
    </div>
</form>
