<div>
    @include('components.navbar-guest')
    <div class="mt-8 px-8">
        <div class="px-24">
            <div class="card-controls sm:flex items-center justify-center">
                <div class="w-full sm:w-2/12">
                    <span class="text-gray-500">Tampilkan:</span>
                    <select wire:model="perPage" class="w-full sm:w-3/6 shadow-inner w-full pl-3 pr-10 py-2 border-2 border-gray-200 rounded-xl hover:border-gray-300 focus:outline-none focus:border-blue-500 transition-colors">
                        <option value="6">6</option>
                        <option value="12">12</option>
                        <option value="18">18</option>
                        <option value="24">24</option>
                    </select>

                </div>
                <div class="w-full sm:w-4/12 hidden">
                    <span class="text-gray-500">Urutkan:</span>
                    <select class="w-full sm:w-4/6 shadow-inner w-full pl-3 pr-10 py-2 border-2 border-gray-200 rounded-xl hover:border-gray-300 focus:outline-none focus:border-blue-500 transition-colors">
                        <option wire:click="sortBy('judul')" value="judul">Judul</option>
                        <option wire:click="sortBy('batas_akhir')" value="batas_akhir">Batas Akhir</option>
                    </select>

                </div>
                <div class="w-full sm:w-6/12 sm:text-right">
                    <div class="relative">
                        <input type="text" wire:model.debounce.300ms="search" class="shadow-inner w-full pl-3 pr-10 py-2 border-2 border-gray-200 rounded-xl hover:border-gray-300 focus:outline-none focus:border-blue-500 transition-colors" placeholder="Cari...">
                        <button class="block w-7 h-7 text-center text-xl leading-0 absolute top-2 right-2 text-gray-400 focus:outline-none hover:text-gray-900 transition-colors"><i class="mdi mdi-magnify"></i></button>
                    </div>
                </div>
                <div>

                </div>
            </div>
        </div>
        <div wire:loading.delay>
            Memuat...
        </div>
        <div class="grid px-6 my-8 gap-8 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 justify-center items-top">
            @forelse($programDonasis as $programDonasi)
            <a href="{{ route('penggalangan-dana.program', $programDonasi) }}" class="animate-none focus:animate-pulse transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105 ">
                <div class="max-w-sm w-full py-6">
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden ">
                        <div class="bg-cover bg-center h-56 p-4" style="background-image: url({{$programDonasi->getThumbnail()}})">

                                @if ($programDonasi->donasi->where('status_donasi', '1')->sum('nominal')> $programDonasi->target)
                                <button class="animate-bounce bg-green-300 rounded text-white px-1 py-1 bg-opacity-60">
                                    Terpenuhi
                                </button>
                                @endif


                        </div>
                        <div class="p-4">
                            <p class="uppercase text-lg font-semibold text-gray-700">{{ $programDonasi->judul }}</p>
                            <p class="mt-1 text-base text-green-400">@currency($programDonasi->donasi->where('status_donasi', '1')->sum('nominal'))</p>
                            <p class="text-sm text-gray-700">terkumpul dari @currency($programDonasi->target)</p>
                            <p class="mt-2 text-sm text-red-500 font-light"> · Batas akhir {{ $programDonasi->batas_akhir }}</p>
                        </div>
                        <div class="flex p-4 border-t border-gray-300 text-gray-700 text-sm">
                            {{ $programDonasi->deskripsi }}
                        </div>
                        <div class="px-4 pt-3 pb-4 border-t border-gray-300 bg-gray-100">
                            <div class="text-xs uppercase font-semibold text-gray-600 tracking-wide">Relawan</div>
                            <div class="flex items-center pt-2">
                                <div class="bg-cover bg-center w-10 h-10 rounded-full mr-3" style="background-image: url({{ 'https://ui-avatars.com/api/?name='.str_replace(' ', '+', $programDonasi->user->name).'&color=7F9CF5&background=EBF4FF' }})">
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-900">{{ $programDonasi->user->name}}</p>
                                    <p class="text-xs text-gray-700">{{ $programDonasi->user->email}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            @empty
            @if ($search != '')
            <div class="alert flex flex-row items-center bg-blue-200 p-5 rounded border-b-2 border-blue-300 col-span-3 m-32">
                <div class="alert-icon flex items-center bg-blue-100 border-2 border-blue-500 justify-center h-10 w-10 flex-shrink-0 rounded-full">
                    <span class="text-blue-500">
                        <svg fill="currentColor"
                             viewBox="0 0 20 20"
                             class="h-6 w-6">
                            <path fill-rule="evenodd"
                                  d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                  clip-rule="evenodd"></path>
                        </svg>
                    </span>
                </div>
                <div class="alert-content ml-4">
                    <div class="alert-title font-semibold text-lg text-blue-800">
                        Info
                    </div>
                    <div class="alert-description text-sm text-blue-600">
                        Tidak ditemukan entri yang sesuai!
                    </div>
                </div>
            </div>
            @else
            <div class="alert flex flex-row items-center bg-blue-200 p-5 rounded border-b-2 border-blue-300 col-span-3 m-32">
                <div class="alert-icon flex items-center bg-blue-100 border-2 border-blue-500 justify-center h-10 w-10 flex-shrink-0 rounded-full">
                    <span class="text-blue-500">
                        <svg fill="currentColor"
                             viewBox="0 0 20 20"
                             class="h-6 w-6">
                            <path fill-rule="evenodd"
                                  d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                  clip-rule="evenodd"></path>
                        </svg>
                    </span>
                </div>
                <div class="alert-content ml-4">
                    <div class="alert-title font-semibold text-lg text-blue-800">
                        Info
                    </div>
                    <div class="alert-description text-sm text-blue-600">
                        Belum ada program penggalangan dana!
                    </div>
                </div>
            </div>
            @endif
            @endforelse
        </div>
    </div>
</div>
@push('styles')
<style>@import url(https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css);</style>
@endpush
