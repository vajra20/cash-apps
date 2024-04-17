@extends('layout.sidebar.sidebar')
@section('title', 'Dashboard User')

@section('content-web')
    @include('components.preloader')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <div class="flex w-full justify-center text-center items-center flex-col gap-y-10">
            <span class="text-3xl font-semibold text-white">Selamat Datang, {{ Auth::user()->name }}</span>
            <div class=" rounded-full flex justify-center">
                <img src="{{ asset('images/user.gif') }}" alt="" class="w-full h-full max-w-xl">
            </div>
        </div>
    </div>
@endsection
