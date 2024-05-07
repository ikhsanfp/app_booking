@extends('dashboard.layouts.main')

@section('container')
<div>
    <h3 class="font-semibold text-center mt-16">Jadwal Pemakaian Lapangan</h3>
</div>
<div class="flex justify-center">
    <div class="mx-2  flex justify-center w-1/2 place-content-center mt-10">
        <div>
            <h4 class="font-semibold text-center">Lapangan Basket</h4>
            <div class="flex justify-center">
                <div><img src="./img/basket.png" alt="" class="mt-4" /></div>
            </div>
        </div>
        <div class="my-6 ml-5">
            <table class="mt-5">
                <thead class="bg-gray-400">
                    <tr>
                        <th class="h-8 w-40 border border-gray-500">Nama Pemain</th>
                        <th class="h-8 w-40 border border-gray-500">Waktu Main</th>
                    </tr>
                </thead>
                <tbody class="">
                    @foreach ($pesan_basket as $post)
                        @php
                            $today = date('Y-m-d');
                            $tglmain = date('Y-m-d', strtotime($post->tglmain));
                        @endphp
                        @if ($tglmain >= $today)
                            <tr>
                                <th class="font-semibold h-8 w-40 border border-gray-500">{{ $post->profile->namapemain }}</th>
                                <th class="font-semibold h-8 w-40 border border-gray-500">{{ date('d/m', strtotime($post->tglmain)) }} {{ $post->start }} - {{ $post->end }}</th>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="mx-2  flex w-1/2 place-content-center mt-10">
        <div>
            <h4 class="font-semibold text-center">Lapangan Futsal</h4>
            <div class="flex justify-center">
                <div><img src="./img/futsal.png" alt="" class="mt-4" /></div>
            </div>
        </div>
        <div class="mt-6 ml-5">
            <table class="mt-5">
                <thead class="bg-gray-400">
                    <tr>
                        <th class="h-8 w-40 border border-gray-500">Nama Pemain</th>
                        <th class="h-8 w-40 border border-gray-500">Waktu Main</th>
                    </tr>
                </thead>
                <tbody class="">
                    @foreach ($pesan_futsal as $post)
                        @php
                            $today = date('Y-m-d');
                            $tglmain = date('Y-m-d', strtotime($post->tglmain));
                        @endphp
                        @if ($tglmain >= $today)
                            <tr>
                                <th class="font-semibold h-8 w-40 border border-gray-500">{{ $post->profile->namapemain }}</th>
                                <th class="font-semibold h-8 w-40 border border-gray-500">{{ date('d/m', strtotime($post->tglmain)) }}  {{ $post->start }} - {{ $post->end }}</th>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        <div></div>
    </div>
@endsection
