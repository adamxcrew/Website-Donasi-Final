<div>
    @include('components.navbar-guest')
    <div class="min-w-full border-b border-b-4 shadow"></div>
    <div class="flex justify-center min-h-screen bg-gray-200 dark:bg-gray-900 bg-contain bg-right bg-no-repeat" style="background-image: url({{ asset('bg_guest.png') }})">
        <div class="z-10 min-w-min w-2/4 mx-auto m-auto my-auto py-10">

            @if ($step != 4)
            <div class="bg-white shadow-lg rounded-lg px-4 pt-2 ">
                <!-- Top Navigation -->
                <div class="border-b-2 py-2">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                        <div class="flex-1">
                            @if ($step == 1)
                            <div>
                                <div class="text-lg font-bold text-gray-700 leading-tight">Mulai Berdonasi</div>
                            </div>
                            @endif

                            @if ($step == 2)
                            <div>
                                <div class="text-lg font-bold text-gray-700 leading-tight">Isi Formulir Donasi</div>
                            </div>
                            @endif

                            @if ($step == 3)
                            <div>
                                <div class="text-lg font-bold text-gray-700 leading-tight">Selesai</div>
                            </div>
                            @endif

                        </div>

                        <div class="flex items-center md:w-64">
                            <div class="w-full bg-green-100 rounded-full mr-2">
                                <div class="rounded-full bg-green-500 text-xs leading-none h-2 text-center text-white" style="width: @if($step == 1) 33% @elseif($step == 2) 66% @elseif($step == 3) 99% @endif"></div>
                            </div>
                            <div class="text-xs w-10 text-gray-600">@if($step == 1) 33% @elseif($step == 2) 66% @elseif($step == 3) 99% @endif</div>
                        </div>
                    </div>
                </div>

                <div class="py-4">


                    <div @if ($step != 1)class="hidden" @endif>
                        <div class="mb-4">
                            <div class="text-gray-600 mt-2 mb-4 text-center">Anda akan berdonasi untuk program</div>
                            <div class="text-gray-700 my-1 text-2xl text-bold text-center">
                                {{ $programDonasi->judul }}
                            </div>
                            @if ($programDonasi->thumbnail != "")
                            <img class="max-h-48 shadow mx-auto" src="{{$programDonasi->getThumbnail()}}">
                            @endif
                        </div>
                    </div>


                    <div @if ($step != 2)class="hidden" @endif>
                        <form wire:submit.prevent="submit" >
                        <div class="mb-1">
                            <div class="form-group {{ $errors->has('nama_donatur') ? 'invalid' : '' }}">
                                <label class="form-label" for="nama_donatur">Nama Donatur</label>
                                <input class="form-control" type="text" name="program_donasi_id" id="program_donasi_id" hidden wire:model.defer="program_donasi_id">
                                <input class="form-control" type="text" name="nama_donatur" id="nama_donatur" wire:model.defer="nama_donatur">
                                <div class="validation-message">
                                    {{ $errors->first('nama_donatur') }}
                                </div>
                                <div class="help-block">
                                    Tidak wajib diisi.
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('email_donatur') ? 'invalid' : '' }}">
                                <label class="form-label" for="email_donatur">Email Donatur</label>
                                <input class="form-control" type="email" name="email_donatur" id="email_donatur" wire:model.defer="email_donatur">
                                <div class="validation-message">
                                    {{ $errors->first('email_donatur') }}
                                </div>
                                <div class="help-block">
                                    Tidak wajib diisi.
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('rekening') ? 'invalid' : '' }}">
                                <label class="form-label required" for="rekening">Nomor Rekening Donatur</label>
                                <input class="form-control" type="text" name="rekening" id="rekening" required wire:model.defer="rekening">
                                <div class="validation-message">
                                    {{ $errors->first('rekening') }}
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('atas_nama') ? 'invalid' : '' }}">
                                <label class="form-label required" for="atas_nama">Atas Nama Rekening</label>
                                <input class="form-control" type="text" name="atas_nama" id="atas_nama" required wire:model.defer="atas_nama">
                                <div class="validation-message">
                                    {{ $errors->first('atas_nama') }}
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('nominal') ? 'invalid' : '' }}">
                                <label class="form-label required" for="nominal">Nominal Donasi</label>
                                <input class="form-control" type="number" name="nominal" id="nominal" required wire:model.defer="nominal" step="1">
                                <div class="validation-message">
                                    {{ $errors->first('nominal') }}
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('pesan') ? 'invalid' : '' }}">
                                <label class="form-label" for="pesan">Pesan</label>
                                <textarea class="form-control" name="pesan" id="pesan" wire:model.defer="pesan" rows="4"></textarea>
                                <div class="validation-message">
                                    {{ $errors->first('pesan') }}
                                </div>
                                <div class="help-block">
                                    Tidak wajib diisi.
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>

                    @if ($step == 3)
                    <div>
                        <div class="mb-4">
                            <div class="text-gray-500 my-1 text-center">
                                Terima kasih telah berpartisipasi pada program donasi
                            </div>
                            <div class="text-gray-700 my-1 text-lg text-bold text-center">
                                {{ $programDonasi->judul }}
                            </div>
                            <div class="text-gray-500 mt-1 mb-8 text-center">
                               Segera lakukan pembayaran lalu konfirmasi dengan kode berikut
                            </div>
                            <div class="text-green-500 my-1 text-3xl text-bold text-center">
                                {{ $kode_donasi }}
                            </div>
                        </div>
                    </div>
                    @endif

                </div>
                <hr>
                <!-- / Step Content -->
                <div class="flex justify-between pb-5 pt-3">
                    @if ($step > 1 && $step <3)
                    <div>
                        <button wire:click.prevent="back" class="w-32 focus:outline-none py-2 px-5 rounded-lg shadow-sm text-center text-gray-600 bg-white active:bg-gray-200 focus:ring-indigo-200 font-medium border">Kembali</button>
                    </div>
                    @endif
                    @if ($step == 1)
                    <div>
                        <a href="{{ url()->previous() }}" class="btn focus:outline-none mt-1 px-5 rounded-lg shadow-sm text-center text-gray-600 bg-white active:bg-gray-200 focus:ring-indigo-200 font-medium border">
                            Kembali
                        </a>
                    </div>
                    @endif

                    <div class="flex justify-end">
                        @if ($step == 1)
                        <button wire:click.prevent="next" class="btn w-48 focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-indigo-500 active:bg-indigo-600 focus:ring-indigo-500 font-medium">Selanjutnya</button>
                        @endif
                        @if ($step == 2)
                        <button wire:click.prevent="submit" class="btn w-48 focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-indigo-500 active:bg-indigo-600 focus:ring-indigo-500 font-medium">Donasi Sekarang</button>
                        @endif
                        @if ($step == 3)
                        <button wire:click.prevent="close" class="btn w-48 focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-indigo-500 active:bg-indigo-600 focus:ring-indigo-500 font-medium">Selesai</button>
                        @endif
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

