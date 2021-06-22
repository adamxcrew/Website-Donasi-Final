<div>
    @include('components.navbar-guest')
    <div class="min-w-full border-b border-b-4 shadow"></div>
    <div class="flex justify-center min-h-screen bg-gray-200 dark:bg-gray-900 bg-contain bg-right bg-no-repeat" style="background-image: url({{ asset('bg_guest.png') }})">
        <div class="z-10 min-w-min w-2/4 mx-auto m-auto my-auto">
            @if ($step == 4)
            <div>
                <div class="bg-white rounded-lg p-10 shadow">
                    <div class="flex items-center justify-center flex-col">
                        <svg class="mb-4 h-20 w-20 text-green-500 mx-auto" viewBox="0 0 20 20" fill="currentColor">  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>

                        <h2 class="text-2xl mb-4 text-gray-800 text-center font-bold">Konfrimasi Berhasil</h2>

                        <div class="text-gray-500 my-1">
                            Terima kasih telah berpartisipasi pada program donasi
                        </div>
                        <div class="text-gray-700 my-1 text-lg text-bold">
                            {{ $donasi->ProgramDonasi->judul }}
                        </div>
                        <div class="text-gray-500 mt-1 mb-8">
                            Semoga kebaikan Anda diganti oleh Tuhan dengan yang lebih baik.
                        </div>

                        <a href="{{ route('index') }}" class="w-min-w block mx-auto focus:outline-none py-2 px-5 rounded-lg shadow-sm text-center text-gray-600 bg-white hover:bg-gray-100 font-medium border">Kembali ke Beranda</a>
                    </div>
                </div>
            </div>
            @endif

            @if ($step != 4)
            <div class="bg-white shadow-lg rounded-lg px-4 pt-2 ">
                <!-- Top Navigation -->
                <div class="border-b-2 py-2">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                        <div class="flex-1">

                            @if ($step == 1)
                            <div>
                                <div class="text-lg font-bold text-gray-700 leading-tight">Masukkan Kode Donasi</div>
                            </div>
                            @endif

                            @if ($step == 2)
                            <div>
                                <div class="text-lg font-bold text-gray-700 leading-tight">Unggah bukti transfer</div>
                            </div>
                            @endif

                            @if ($step == 3)
                            <div>
                                <div class="text-lg font-bold text-gray-700 leading-tight">Review Donasi</div>
                            </div>
                            @endif

                        </div>

                        <div class="flex items-center md:w-64">
                            <div class="w-full bg-green-100 rounded-full mr-2">
                                <div class="rounded-full bg-green-500 text-xs leading-none h-2 text-center text-white" style="width: @if($step == 1) 0% @elseif($step == 2) 33% @elseif($step == 3) 66% @endif"></div>
                            </div>
                            <div class="text-xs w-10 text-gray-600">@if($step == 1) 0% @elseif($step == 2) 33% @elseif($step == 3) 66% @endif</div>
                        </div>
                    </div>
                </div>

                <div class="py-4">

                    @if ($step == 1)
                    <div>
                        <div class="mb-5">
                            <div class="text-gray-600 mt-2 mb-4 text-center">Masukkan kode donasi yang anda terima saat mengisi formulir donasi.</div>
                            <div class="flex mb-4 h-16 justify-items-center justify-center">
                                <span class="flex items-center leading-normal bg-grey-lighter rounded-lg rounded-r-none border border-r-0 border-grey-light px-3 text-gray-500 text-lg text-medium">DN-</span>
                                <input wire:model="kode" id="kode" name="kode" type="text" class="flex items-center leading-normal border border-grey-light  rounded-lg rounded-l-none px-3 text-indigo-800 text-lg text-medium" placeholder="Kode Unik">
                            </div>
                        </div>
                    </div>
                    @endif

                    @if ($step == 2)
                    <div>
                        <div class="text-gray-600 mt-2 mb-4 text-center">Unggah foto bukti transfer.</div>
                        <div class="form-group flex flex-col justify-center">
                            <input class="border-gray-300 focus:ring-blue-600 block w-full overflow-hidden cursor-pointer border text-gray-800 bg-white rounded-md shadow-sm focus:outline-none focus:ring-2 focus:border-transparent"
                            id="view_model_avatar" name="view_model[avatar]" type="file" wire:model="image">
                            @error('image') <span class="error">{{ $message }}</span> @enderror
                            @if ($image)
                                <img class="max-h-60 shadow mt-5" src="{{ $image->temporaryUrl() }}">
                            @endif
                        </div>
                    </div>
                    @endif

                    @if ($step == 3)
                    <div>
                        <div class="mb-5">

                            <table class="table table-view">
                                <tbody class="bg-white">
                                    <tr>
                                        <th>
                                            Program Donasi
                                        </th>
                                        <td>
                                            @if($donasi->ProgramDonasi)
                                                <span class="badge badge-relationship">{{ $donasi->ProgramDonasi->judul ?? '' }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Nama Donatur
                                        </th>
                                        <td>
                                            @if ($donasi->nama_donatur != "")
                                                {{ $donasi->nama_donatur }}
                                            @else
                                                Anonim
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Email Donatur
                                        </th>
                                        <td>
                                            @if ($donasi->email_donatur != "")
                                                {{ $donasi->email_donatur }}
                                            @else
                                                Anonim
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Nomor Rekening Donatur
                                        </th>
                                        <td>
                                            {{ $donasi->rekening }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Atas Nama Rekening
                                        </th>
                                        <td>
                                            {{ $donasi->atas_nama }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Nominal Donasi
                                        </th>
                                        <td>
                                            @currency($donasi->nominal)
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Pesan
                                        </th>
                                        <td>
                                            {{ $donasi->pesan }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Kode Donasi
                                        </th>
                                        <td>
                                            {{ $donasi->kode_donasi }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Bukti Donasi
                                        </th>
                                        <td>
                                            <img class="max-h-60 shadow mt-5" src="{{ $image->temporaryUrl() }}">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @endif

                </div>
                <hr>
                <!-- / Step Content -->
                <div class="flex @if ($step == 1) justify-end @else justify-between @endif pb-5 pt-3">
                    @if ($step > 1)
                    <div>
                        <button wire:click.prevent="back" class="w-32 focus:outline-none py-2 px-5 rounded-lg shadow-sm text-center text-gray-600 bg-white active:bg-gray-200 focus:ring-indigo-200 font-medium border">Kembali</button>
                    </div>
                    @endif

                    <div class="flex justify-end">
                        @if ($step == 1)
                        <button wire:click.prevent="cekKode" class="btn w-32 focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-indigo-500 active:bg-indigo-600 focus:ring-indigo-500 font-medium">Selanjutnya</button>
                        @endif
                        @if ($step == 2)
                        <button wire:click.prevent="cekBukti" class="btn w-32 focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-indigo-500 active:bg-indigo-600 focus:ring-indigo-500 font-medium">Selanjutnya</button>
                        @endif
                        @if ($step == 3)
                        <button wire:click.prevent="uploadBukti" class="btn w-32 focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-indigo-500 active:bg-indigo-600 focus:ring-indigo-500 font-medium">Konfirmasi</button>
                        @endif
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

