<x-auth-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            Terimakasih telah mendaftar. Sebelum melanjutkan, harap konfirmasi email verifikasi yang telah kami kirimkan!
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                Email verifikasi telah dikirim ke alamat email Anda. Jika Anda belum menerima, tekan tombol dibawah ini!
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-button>
                        Kirim Ulang
                    </x-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    Keluar
                </button>
            </form>
        </div>
    </x-auth-card>
</x-auth-layout>
