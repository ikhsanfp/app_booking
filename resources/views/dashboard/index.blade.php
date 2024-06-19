@extends('dashboard.layouts.main')

@section('container')
<h3 class="font-semibold text-center mt-16">Jadwal Pemakaian Lapangan</h3>
<div class="sm:flex">
    <div class="container ">
        <div class="lapangan block place-content-end mt-10  lg:flex">
            <div class="">
                <h4 class="font-semibold text-center">Lapangan Basket</h4>
                <div class="flex justify-center">
                    <div><img src="./img/basket.png" alt="" class="mt-4" /></div>
                </div>
            </div>
            <div class= "flex justify-center">
            <div class="wrapper mt-7 lg:mt-10 lg:mr-5 lg:ml-5">
                <table class="justify-center ">
                    <thead class="bg-gray-400">
                        <tr>
                            <th class="h-8 w-40 border border-gray-500">Nama Pemain</th>
                            <th class="h-8 w-40 border border-gray-500">Waktu Main</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($pesan_basket->count() > 0)
                        @foreach ($pesan_basket as $post)
                            @php
                                $today = date('Y-m-d');
                                $tglmain = date('Y-m-d', strtotime($post->tglmain));
                                $startFormatted = number_format($post->start, 2);
                                $endFormatted = number_format($post->end, 2);
                            @endphp
                            @if ($tglmain >= $today)
                                <tr>
                                    <th class="font-semibold h-8 w-40 border border-gray-500">{{ $post->profile->namapemain }}</th>
                                    <th class="font-semibold h-8 w-40 border border-gray-500">{{ date('d/m', strtotime($post->tglmain)) }} {{ $startFormatted }} - {{ $endFormatted }}</th>
                                </tr>
                            @endif
                        @endforeach
                        @else
                            <tr>
                                 <td colspan="6" class="font-semibold h-8 w-20 border border-gray-500 text-center">Tidak ada pesanan yang ditemukan.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </div>
    <div class="container">
        <div class="lapangan block place-content-start mt-10  lg:flex">
            <div class="">
                <h4 class="font-semibold text-center">Lapangan Futsal</h4>
                <div class="flex justify-center lg:ml-5">
                    <div><img src="./img/futsal.png" alt="" class="mt-4" /></div>
                </div>
            </div>
            <div class=" flex justify-center">
                <div class="wrapper mt-7 lg:mt-10 lg:ml-5">
                <table class="justify-center ">
                    <thead class="bg-gray-400">
                        <tr>
                            <th class="h-8 w-40 border border-gray-500">Nama Pemain</th>
                            <th class="h-8 w-40 border border-gray-500">Waktu Main</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($pesan_futsal->count() > 0)
                        @foreach ($pesan_futsal as $post)
                            @php
                                $today = date('Y-m-d');
                                $tglmain = date('Y-m-d', strtotime($post->tglmain));
                                $startFormatted = number_format($post->start, 2);
                                $endFormatted = number_format($post->end, 2);
                            @endphp
                            @if ($tglmain >= $today)
                                <tr>
                                    <th class="font-semibold h-8 w-40 border border-gray-500">{{ $post->profile->namapemain }}</th>
                                    <th class="font-semibold h-8 w-40 border border-gray-500">{{ date('d/m', strtotime($post->tglmain)) }}  {{ $startFormatted }} - {{ $endFormatted }}</th>
                                </tr>
                            @endif
                        @endforeach
                        @else
                            <tr>
                                <td colspan="6" class="font-semibold h-8 w-20 border border-gray-500 text-center">Tidak ada pesanan yang ditemukan.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
