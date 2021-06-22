@extends('layouts.guest')
@section('content')
<div class="relative w-full py-20 h-full items-top justify-between min-h-screen bg-gray-200 dark:bg-gray-900 sm:items-center py-20 sm:pt-0">
    <div class="bg-contain bg-left  px-20 py-20  bg-no-repeat" style="background-image: url({{ asset('bg_index.png') }})">
    <div class="absolute left-0 container mx-auto right-20 flex flex-col-reverse sm:flex-row relative">

        <div class="sm:w-5/12 xl:w-4/12 flex flex-col items-start sm:items-end sm:text-right ml-auto mt-8 sm:mt-0 relative z-10 xl:pt-20 mb-16 sm:mb-0">
            <h1 class="text-4xl lg:text-5xl text-blue-900 leading-none mb-4 font-black">Daftar Jadi Relawan</h1>
            <p class="w-full lg:text-lg mb-4 sm:mb-12 text-blue-900">Menghubungkan #OrangBaik, Bergotong Royong Ciptakan Kebaikan.</p>
            <a href="/register" class="font-semibold text-lg bg-purple-600 hover:bg-blue-400 text-white py-3 px-12 rounded-full">Lanjut</a>
        </div>

    </div>
</div>
@stop

