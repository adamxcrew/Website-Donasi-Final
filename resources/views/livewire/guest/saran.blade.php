<div>
    @include('components.navbar-guest')
    <div class="min-w-full border-b border-b-4 shadow"></div>
    <div class="z-0 relative min-h-screen bg-gray-200 dark:bg-gray-900">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 items-top min-h-screen py-4 sm:pt-8">
            <div class="mt-4">
                <label class="form-label required" for="subjek">Subjek</label>
                <input class="form-control" type="text" name="subjek" id="subjek" required wire:model="subjek">
                @error('subjek') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <label class="form-label" for="pengirim">Nama Pengirim</label>
                <input class="form-control" type="text" name="pengirim" id="pengirim" wire:model="pengirim">
                <div class="help-block">
                    Tidak wajib diisi.
                </div>
            </div>
            <div class="mt-4">
                <label class="form-label" for="email">Email Pengirim</label>
                <input class="form-control" type="email" name="email" id="email" wire:model="email">
                @error('email') <span class="error">{{ $message }}</span> @enderror
                <div class="help-block">
                    Tidak wajib diisi.
                </div>
            </div>
            <div class="mt-4">
                <label class="form-label required" for="isi">Saran</label>
                <textarea class="form-control" name="isi" id="isi" required wire:model="isi" rows="10"></textarea>
                @error('isi') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <button wire:click.prevent="store" class="btn btn-indigo mr-2">
                    Kirim
                </button>
                <button wire:click.prevent="resetFields" class="btn btn-rose mr-2">
                    Hapus
                </button>
            </div>
        </div>
    </div>
</div>
