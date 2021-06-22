<div>
    @include('components.navbar-guest')
    <div class="mt-0 md:mt-5 pt-24 md:pt-0" id="components">
		<div class="max-w-screen-xl mx-auto px-4 sm:px-4 lg:px-8 py-5 bg-gray">
			<div class="grid grid-cols-1 md:grid-cols-6">
				<div class="col-span-4">
					<main>
						<article class="xl:divide-y xl:divide-gray-200 shadow-lg bg-white rounded-lg">
							<header class="pt-5 xl:pb-2 relative">
                                <div class="absolute left-0 top-0 mt-4 ml-4 hover:animate-bounce">
                                    <a href="{{route('penggalangan-dana')}}" >
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#3d38ca"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"/></svg>
                                    </a>
                                </div>
								<div class="space-y-1 text-center">
									<dl class="space-y-10">
										<div>
											<dd class="text-base leading-6 font-medium text-gray-500">
												{{ $programDonasi->updated_at }}
											</dd>
										</div>
									</dl>
									<div>
										<h1 class="text-2xl leading-9 font-bold text-indigo-900 tracking-tight px-2 sm:leading-10 md:leading-14">{{ $programDonasi->judul }}</h1>
									</div>
									<div class="mt-1 hidden">
										<a href="https://blog.you-tang.com/tag/vapor-25"><span class="inline-block bg-gray-200 rounded-full px-3 py-2 my-1 text-sm font-semibold text-gray-700">tag1</span></a>
										<a href="https://blog.you-tang.com/tag/laravel-vapor-26"><span class="inline-block bg-gray-200 rounded-full px-3 py-2 my-1 text-sm font-semibold text-gray-700">tag2</span></a>
									</div>
								</div>
							</header>
							<div class="divide-y xl:divide-y-0 divide-gray-200" style="grid-template-rows:auto 1fr">
								<div class="divide-y divide-gray-200 xl:pb-0">
									<div class="prose max-w-none py-3 px-5">
                                        {!! $programDonasi->konten !!}
									</div>
								</div>
							</div>
							<div class="px-4 pt-3 pb-4 border-t border-gray-300 bg-gray-100 mt-6 rounded-b-lg">
                                <div class="text-xs uppercase font-semibold text-gray-500 tracking-wide">Relawan</div>
                                <div class="flex items-center pt-2">
                                    <div class="bg-cover bg-center w-10 h-10 mr-3" style="background-image: url({{ 'https://ui-avatars.com/api/?name='.str_replace(' ', '+', $programDonasi->user->name).'&color=7F9CF5&background=EBF4FF' }})">
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">{{ $programDonasi->user->name}}</p>
                                        <a class="badge badge-relationship mt-2" href="mailto:{{ $programDonasi->user->email}}">{{ $programDonasi->user->email}}</a>
                                    </div>
                                </div>
                            </div>
						</article>
						<div class="xl:divide-y xl:divide-gray-200 shadow-lg mt-5 py-3 bg-white x-3 lg:px-3 rounded-lg">
							<div>
                                <h1 class="text-lg leading-9 font-bold text-indigo-900 tracking-tight px-2 ">Berita</h1>
                            </div>
                            @forelse($programDonasi->programBeritas as $berita)
                            <div class="p-2">
                                <div class="inline-flex items-center bg-white leading-none text-purple-600 rounded-full p-2 shadow text-teal text-sm">
                                  <span class="inline-flex bg-indigo-600 text-white rounded-full h-6 px-3 justify-center items-center">{{$berita->updated_at}}</span>
                                  <span class="inline-flex px-2">{{$berita->berita}} </span>
                                </div>
                            </div>
                            @empty
                            <div>Belum ada berita lebih lanjut</div>
                            @endforelse
						</div>
						<div class="hidden shadow-lg bg-white mt-5  py-3 px-3 lg:py-5 lg:px-5 rounded-lg">
						</div>
					</main>
				</div>
				<div id="sidebar" class="col-span-2 bg-gray md:ml-10 mt-5 md:mt-0 sticky top-0">
					<div class="bg-white ml-0 py-5 px-5 shadow-lg rounded-lg">
						<div class="flex justify-center items-center">
							<a href="{{ route('penggalangan-dana.donasi', $programDonasi) }}" class="btn bg-green-400 text-white font-xl w-full h-8 hover:ring hover:ring-green-500 hover:ring-offset-1 focus:bg-green-600 hover:ring-green-200 text-center">Donasi Sekarang</a>
						</div>
						<div class="py-3 content-center">
							<img class="m-auto rounded-lg w-full h-auto flex-shrink-0" src="{{$programDonasi->getThumbnail()}}">
                            <div class="mt-3 text-center text-indigo-700 font-xl font-bold">{{ $programDonasi->judul }}</div>
						</div>
                        <table class="table table-view w-full">
                            <tbody class="bg-white">
                                <tr>
                                    <th>
                                        No Telepon
                                    </th>

                                </tr>
                                <tr>
                                    <td>
                                        @if($programDonasi->user->telepon != '')
                                            <span class="badge badge-relationship">{{ $programDonasi->user->telepon}}</span>
                                        @else
                                        <span class="badge badge-relationship">Tidak tercantum</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Rekening Program
                                    </th>

                                </tr>
                                <tr>
                                    <td>
                                        @if($programDonasi->Rekening)
                                            <span class="badge badge-relationship">{{ $programDonasi->Rekening->nomor_rekening ?? '' }}</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Target
                                    </th>

                                </tr>
                                <tr>
                                    <td>
                                        @currency($programDonasi->target)
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Terkumpul
                                    </th>

                                </tr>
                                <tr>
                                    <td>
                                        @currency($programDonasi->donasi->where('status_donasi', '1')->sum('nominal'))
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Batas Akhir
                                    </th>

                                </tr>
                                <tr>
                                    <td>
                                        {{ $programDonasi->batas_akhir }}
                                    </td>
                                </tr>

                            </tbody>
                        </table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
