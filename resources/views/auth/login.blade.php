@extends('layout.layout')
@section('title', 'Login')

@section('content')
    @if ($errors->any())
        <div class="fixed bottom-0 right-8 mb-3 z-99999">
            @foreach ($errors->all() as $error)
                <div id="toast-danger-{{ $loop->index }}"
                    class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
                    role="alert">
                    <div
                        class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z" />
                        </svg>
                        <span class="sr-only">Error icon</span>
                    </div>
                    <div class="ms-3 text-sm font-normal">{{ $error }}</div>
                    <button type="button"
                        class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                        data-dismiss-target="#toast-danger-{{ $loop->index }}" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
            @endforeach
        </div>
    @endif

    @include('components.preloader')
    <!-- ===== Page Wrapper Start ===== -->
    <div class="flex h-screen overflow-hidden">
        <!-- ===== Content Area Start ===== -->
        <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">
            <!-- ===== Main Content Start ===== -->
            <main class="overflow-y-hidden">
                <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">

                    <!-- ====== Forms Section Start -->
                    <div
                        class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                        <div class="flex flex-wrap items-center">
                            <div class="hidden w-full xl:block xl:w-1/2">
                                <div class="px-26 py-14 text-center ">
                                    <a href="" class="flex flex-row gap-3 items-center justify-center mb-5.5">
                                        <img class="w-full h-auto max-w-16" src="images/logo.png" alt="Kasir" />
                                        <span class="text-black text-4xl font-bold uppercase">Kasir</span>
                                    </a>

                                    <p class="font-medium 2xl:px-20 text-black">
                                        A good sales system uses unique credentials, such as email and password, to securely
                                        manage transactions and stuff.
                                    </p>

                                    <span class="mt-15 inline-block">
                                        <img src="./images/illustration/illustration-03.svg" alt="illustration" />
                                    </span>
                                </div>
                            </div>
                            <div class="w-full border-stroke dark:border-strokedark xl:w-1/2 xl:border-l-2">
                                <div class="w-full p-4 sm:p-12.5 xl:p-17.5">
                                    <h2 class="mb-9 text-2xl font-bold text-black dark:text-white sm:text-title-xl2">
                                        Sign In to Kasir
                                    </h2>

                                    <form action="{{ route('login.auth') }}" method="POST">
                                        @csrf
                                        <div class="mb-4">
                                            <label class="mb-2.5 block font-medium text-black dark:text-white">Email</label>
                                            <div class="relative">
                                                <input type="email" name="email" placeholder="Enter your email"
                                                    class="w-full rounded-lg border border-stroke bg-transparent py-4 pl-6 pr-10 outline-none focus:border-primary focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" />

                                                <span class="absolute right-4 top-4">
                                                    <svg class="fill-current" width="22" height="22"
                                                        viewBox="0 0 22 22" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <g opacity="0.5">
                                                            <path
                                                                d="M19.2516 3.30005H2.75156C1.58281 3.30005 0.585938 4.26255 0.585938 5.46567V16.6032C0.585938 17.7719 1.54844 18.7688 2.75156 18.7688H19.2516C20.4203 18.7688 21.4172 17.8063 21.4172 16.6032V5.4313C21.4172 4.26255 20.4203 3.30005 19.2516 3.30005ZM19.2516 4.84692C19.2859 4.84692 19.3203 4.84692 19.3547 4.84692L11.0016 10.2094L2.64844 4.84692C2.68281 4.84692 2.71719 4.84692 2.75156 4.84692H19.2516ZM19.2516 17.1532H2.75156C2.40781 17.1532 2.13281 16.8782 2.13281 16.5344V6.35942L10.1766 11.5157C10.4172 11.6875 10.6922 11.7563 10.9672 11.7563C11.2422 11.7563 11.5172 11.6875 11.7578 11.5157L19.8016 6.35942V16.5688C19.8703 16.9125 19.5953 17.1532 19.2516 17.1532Z"
                                                                fill="" />
                                                        </g>
                                                    </svg>
                                                </span>
                                            </div>
                                        </div>

                                        <div class="mb-6">
                                            <label class="mb-2.5 block font-medium text-black dark:text-white">
                                                Password</label>
                                            <div class="relative">
                                                <input type="password" name="password"
                                                    placeholder="6+ Characters, 1 Capital letter"
                                                    class="w-full rounded-lg border border-stroke bg-transparent py-4 pl-6 pr-10 outline-none focus:border-primary focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" />
                                                <span class="absolute right-4 top-4">
                                                    <svg class="fill-current" width="22" height="22"
                                                        viewBox="0 0 22 22" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <g opacity="0.5">
                                                            <path
                                                                d="M16.1547 6.80626V5.91251C16.1547 3.16251 14.0922 0.825009 11.4797 0.618759C10.0359 0.481259 8.59219 0.996884 7.52656 1.95938C6.46094 2.92188 5.84219 4.29688 5.84219 5.70626V6.80626C3.84844 7.18438 2.33594 8.93751 2.33594 11.0688V17.2906C2.33594 19.5594 4.19219 21.3813 6.42656 21.3813H15.5016C17.7703 21.3813 19.6266 19.525 19.6266 17.2563V11C19.6609 8.93751 18.1484 7.21876 16.1547 6.80626ZM8.55781 3.09376C9.31406 2.40626 10.3109 2.06251 11.3422 2.16563C13.1641 2.33751 14.6078 3.98751 14.6078 5.91251V6.70313H7.38906V5.67188C7.38906 4.70938 7.80156 3.78126 8.55781 3.09376ZM18.1141 17.2906C18.1141 18.7 16.9453 19.8688 15.5359 19.8688H6.46094C5.05156 19.8688 3.91719 18.7344 3.91719 17.325V11.0688C3.91719 9.52189 5.15469 8.28438 6.70156 8.28438H15.2953C16.8422 8.28438 18.1141 9.52188 18.1141 11V17.2906Z"
                                                                fill="" />
                                                            <path
                                                                d="M10.9977 11.8594C10.5852 11.8594 10.207 12.2031 10.207 12.65V16.2594C10.207 16.6719 10.5508 17.05 10.9977 17.05C11.4102 17.05 11.7883 16.7063 11.7883 16.2594V12.6156C11.7883 12.2031 11.4102 11.8594 10.9977 11.8594Z"
                                                                fill="" />
                                                        </g>
                                                    </svg>
                                                </span>
                                            </div>
                                        </div>

                                        <div class="mb-5">
                                            <input type="submit" value="Sign In"
                                                class="w-full cursor-pointer rounded-lg border border-primary bg-primary p-4 font-medium text-white transition hover:bg-opacity-90" />
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ====== Forms Section End -->
                </div>
            </main>
            <!-- ===== Main Content End ===== -->
        </div>
        <!-- ===== Content Area End ===== -->
    </div>
    <!-- ===== Page Wrapper End ===== -->
@endsection
