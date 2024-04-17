@extends('layout.sidebar.sidebar')
@section('title', 'Sale')

@section('content-web')
    @include('components.preloader')

    <nav class="bg-box border-gray-200 dark:bg-gray-900 fixed w-full z-999999">
        <div class="max-w-screen-xl flex flex-row gap-20 items-center justify-between py-4 px-10 ">
            <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <button id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                    data-dropdown-placement="bottom">
                    <div class="w-full flex flex-row gap-5 items-center">
                        <div class="flex flex-col gap-0">
                            <span class="text-nowrap text-bodydark1 text-end text-sm">{{ Auth::user()->name }}</span>
                            <span class="text-nowrap text-bodydark2 text-end text-xs">{{ Auth::user()->email }}</span>
                        </div>
                        <div
                            class="w-12 h-12 flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600">
                            <span class="sr-only">Open user menu</span>
                            <img class="w-12 h-12 rounded-full" src="{{ asset('images/profile.jpg') }}" alt="user photo">
                        </div>
                    </div>
                </button>

                <!-- Dropdown menu -->
                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                    id="user-dropdown">
                    <div class="px-4 py-3">
                        <span class="block text-sm text-box dark:text-box font-bold">{{ Auth::user()->name }}</span>
                        <span
                            class="block text-sm text-gray-500 truncate dark:text-gray-400">{{ Auth::user()->email }}</span>
                    </div>
                    <ul class="py-2" aria-labelledby="user-menu-button">
                        <li>
                            <a href="{{ route('logout') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-black-2">Logout</a>
                        </li>
                    </ul>
                </div>
                <button data-collapse-toggle="navbar-user" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-user" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>

            {{-- Search --}}
            <div class="w-full mb-0 flex">
                <div class="relative w-full">
                    <button class="absolute left-0 top-1/2 -translate-y-1/2">
                        <svg class="fill-body hover:fill-primary dark:fill-bodydark dark:hover:fill-primary" width="20"
                            height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M9.16666 3.33332C5.945 3.33332 3.33332 5.945 3.33332 9.16666C3.33332 12.3883 5.945 15 9.16666 15C12.3883 15 15 12.3883 15 9.16666C15 5.945 12.3883 3.33332 9.16666 3.33332ZM1.66666 9.16666C1.66666 5.02452 5.02452 1.66666 9.16666 1.66666C13.3088 1.66666 16.6667 5.02452 16.6667 9.16666C16.6667 13.3088 13.3088 16.6667 9.16666 16.6667C5.02452 16.6667 1.66666 13.3088 1.66666 9.16666Z"
                                fill="" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M13.2857 13.2857C13.6112 12.9603 14.1388 12.9603 14.4642 13.2857L18.0892 16.9107C18.4147 17.2362 18.4147 17.7638 18.0892 18.0892C17.7638 18.4147 17.2362 18.4147 16.9107 18.0892L13.2857 14.4642C12.9603 14.1388 12.9603 13.6112 13.2857 13.2857Z"
                                fill="" />
                        </svg>
                    </button>

                    <form action="{{ route('sale.admin') }}" method="GET" class="mb-0">
                        <input type="search" placeholder="Type to search..." name="search" value="{{ request('search') }}"
                            class="w-full bg-transparent !pl-9 pr-4 focus:outline-none border-none focus:ring-0" />
                    </form>
                </div>
            </div>
        </div>
    </nav>


    <div class="mx-auto max-w-screen-2xl md:p-10 2xl:p-14 !pt-26">
        <form action="{{ route('sale.admin') }}" method="GET">
            <select name="month" id="month">
                @foreach (range(1, 12) as $monthNum)
                    <option value="{{ $monthNum }}">{{ date('F', mktime(0, 0, 0, $monthNum, 1)) }}</option>
                @endforeach
            </select>
            <select name="year" id="year">
                @foreach (range(date('Y'), $years) as $yearNum)
                    <option value="{{ $yearNum }}">{{ $yearNum }}</option>
                @endforeach
            </select>
            <button type="submit">Filter</button>
        </form>
        <a href="{{ route('sale.admin') }}">
            <button type="submit">Reset</button>
        </a>

        <!-- Breadcrumb Start -->
        <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="text-title-md2 font-bold text-black dark:text-white">
                Payment
            </h2>

            <nav class="self-end">
                <ol class="flex items-center gap-2">
                    <li>
                        <a class="font-medium" href="{{ route('user') }}">Dashboard /</a>
                    </li>
                    <li class="font-medium text-primary">Payment</li>
                </ol>
            </nav>

        </div>
        <!-- Breadcrumb End -->
        <div
            class="rounded-sm border border-stroke bg-box px-5 pb-2.5 pt-6 shadow-default dark:border-strokedark dark:bg-boxdark
sm:px-7.5 xl:pb-1">
            <div class="max-w-full overflow-x-auto">
                <table class="w-full table-auto">
                    <thead>
                        <tr class="bg-gray-2 text-left dark:bg-meta-4">
                            <th class="min-w-[10px] px-4 py-4 font-medium text-black dark:text-white xl:pl-11">
                                No
                            </th>
                            <th class="min-w-[220px] px-4 py-4 font-medium text-black dark:text-white xl:pl-11">
                                Customer Name
                            </th>
                            <th class="min-w-[150px] px-4 py-4 font-medium text-black dark:text-white">
                                Date Sale
                            </th>
                            <th class="min-w-[120px] px-4 py-4 font-medium text-black dark:text-white">
                                Total Price
                            </th>
                            <th class="min-w-[120px] px-4 py-4 font-medium text-black dark:text-white">
                                Created By
                            </th>
                            <th class="px-4 py-4 font-medium text-black dark:text-white">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sales as $sale)
                            <tr>
                                <td class="border-b border-[#eee] px-4 py-5 pl-9 dark:border-strokedark xl:pl-11">
                                    <h5 class="font-medium text-black dark:text-white">{{ $loop->iteration }}</h5>
                                </td>
                                <td class="border-b border-[#eee] px-4 py-5 pl-9 dark:border-strokedark xl:pl-11">
                                    <h5 class="font-medium text-black dark:text-white">{{ $sale->customer->name }}</h5>
                                </td>
                                <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                    <p class="text-black dark:text-white">
                                        {{ $sale->date_sale }}
                                    </p>
                                </td>
                                <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                    <p class="text-black dark:text-white">
                                        Rp{{ number_format($sale->total_price, 0, ',', '.') }}</p>
                                </td>
                                <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                    <p class="text-black dark:text-white">{{ $sale->created_by }}</p>
                                </td>
                                <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                    <div class="flex items-center space-x-3.5">

                                        {{-- View --}}
                                        <button class="hover:text-primary"
                                            data-modal-target="view-modal-{{ $sale->id }}"
                                            data-modal-toggle="view-modal-{{ $sale->id }}">
                                            <svg class="fill-current" width="18" height="18" viewBox="0 0 18 18"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M8.99981 14.8219C3.43106 14.8219 0.674805 9.50624 0.562305 9.28124C0.47793 9.11249 0.47793 8.88749 0.562305 8.71874C0.674805 8.49374 3.43106 3.20624 8.99981 3.20624C14.5686 3.20624 17.3248 8.49374 17.4373 8.71874C17.5217 8.88749 17.5217 9.11249 17.4373 9.28124C17.3248 9.50624 14.5686 14.8219 8.99981 14.8219ZM1.85605 8.99999C2.4748 10.0406 4.89356 13.5562 8.99981 13.5562C13.1061 13.5562 15.5248 10.0406 16.1436 8.99999C15.5248 7.95936 13.1061 4.44374 8.99981 4.44374C4.89356 4.44374 2.4748 7.95936 1.85605 8.99999Z"
                                                    fill="" />
                                                <path
                                                    d="M9 11.3906C7.67812 11.3906 6.60938 10.3219 6.60938 9C6.60938 7.67813 7.67812 6.60938 9 6.60938C10.3219 6.60938 11.3906 7.67813 11.3906 9C11.3906 10.3219 10.3219 11.3906 9 11.3906ZM9 7.875C8.38125 7.875 7.875 8.38125 7.875 9C7.875 9.61875 8.38125 10.125 9 10.125C9.61875 10.125 10.125 9.61875 10.125 9C10.125 8.38125 9.61875 7.875 9 7.875Z"
                                                    fill="" />
                                            </svg>
                                        </button>

                                        <!-- Main modal -->
                                        <div id="view-modal-{{ $sale->id }}" tabindex="-1" aria-hidden="true"
                                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative p-4 w-full max-w-2xl max-h-full">
                                                <!-- Modal content -->
                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                    <!-- Modal header -->
                                                    <div
                                                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                            Detail Payment {{ $sale->customer->name }}
                                                        </h3>
                                                        <button type="button"
                                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                            data-modal-hide="view-modal-{{ $sale->id }}">
                                                            <svg class="w-3 h-3" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 14 14">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                            </svg>
                                                            <span class="sr-only">Close modal</span>
                                                        </button>
                                                    </div>
                                                    <!-- Modal body -->
                                                    <div class="p-4 md:p-5 space-y-4 bg-white rounded-b-lg text-black-2">
                                                        <div class="grid grid-cols-3 mb-8">
                                                            <div class="flex flex-col gap-y-2 col-span-1">
                                                                <span>Name</span>
                                                                <span>Address</span>
                                                                <span>Telephone</span>
                                                                <span>Total Price</span>
                                                            </div>
                                                            <div class="flex flex-col gap-y-2 col-span-2">
                                                                <span>: {{ $sale->customer->name }}</span>
                                                                <span>: {{ $sale->customer->address }}</span>
                                                                <span>: {{ $sale->customer->telp }}</span>
                                                                <span>:
                                                                    Rp{{ number_format($sale->total_price, 0, ',', '.') }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="flex justify-center">
                                                            <div
                                                                class="bg-gray-300 p-4 text-black-2 rounded-lg shadow-md max-w-full w-1/2">
                                                                <div
                                                                    class="w-full text-center border-b border-solid border-black border-x-0 border-y-0 pb-2">
                                                                    <span
                                                                        class="w-full text-xl font-bold text-center">PAYMENT
                                                                        CONFIRMATION
                                                                        RECEIPT</span>
                                                                </div>
                                                                <div class="p-4 flex flex-col gap-y-2.5">
                                                                    @foreach ($sale->detailSale as $detailSale)
                                                                        <div
                                                                            class="flex flex-row gap-5 items-center justify-between">
                                                                            <div class="flex flex-col">
                                                                                <span
                                                                                    class="font-medium">{{ $detailSale->product->name }}</span>
                                                                                <span
                                                                                    class="text-sm font-normal">Rp{{ number_format($detailSale->product->price, 0, ',', '.') }}
                                                                                    X
                                                                                    {{ $detailSale->total_product }}</span>
                                                                            </div>
                                                                            <span
                                                                                class="text-gray-600 font-semibold ">Rp{{ number_format($detailSale->subtotal, 0, ',', '.') }}</span>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Modal footer -->
                                                    <div
                                                        class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                        <button data-modal-hide="view-modal-{{ $sale->id }}"
                                                            type="button"
                                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I
                                                            accept</button>
                                                        <button data-modal-hide="view-modal-{{ $sale->id }}"
                                                            type="button"
                                                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection
