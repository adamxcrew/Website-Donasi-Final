<div {{ $attributes->merge(['class' => 'max-w-sm w-full py-6']) }}>
        <div class="bg-white shadow-lg rounded-lg overflow-hidden transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105 ">
            <div class="bg-cover bg-center h-56 p-4" style="background-image: url({{ $thumbnail }})">
                <button class="animate-bounce">
                    <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#ffffff"><g><path d="M0,0h24v24H0V0z" fill="none"/></g><g><polygon points="6.23,20.23 8,22 18,12 8,2 6.23,3.77 14.46,12"/></g></svg>
                </button>
            </div>
            <div class="p-4">
                <p class="uppercase text-lg font-semibold text-gray-700">{{ $judul }} </p>
                <p class="mt-1 text-base text-green-400">Rp.{{ $terkumpul }}</p>
                <p class="text-sm text-gray-700">terkumpul dari Rp.{{ $target }}</p>
                <p class="mt-2 text-sm text-red-500 font-light"> · {{ $deadline }}</p>
            </div>
            <div class="flex p-4 border-t border-gray-300 text-gray-700 text-sm">
                {{ $deskripsi }}
            </div>
            <div class="px-4 pt-3 pb-4 border-t border-gray-300 bg-gray-100">
                <div class="text-xs uppercase font-semibold text-gray-600 tracking-wide">Relawan</div>
                <div class="flex items-center pt-2">
                    <div class="bg-cover bg-center w-10 h-10 rounded-full mr-3" style="background-image: url({{ $avatar }})">
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-900">{{ $nama }}</p>
                        <p class="text-xs text-gray-700">{{ $email }}</p>
                    </div>
                </div>
            </div>
        </div>
</div>
