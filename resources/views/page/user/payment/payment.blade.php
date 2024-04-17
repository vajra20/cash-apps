@extends('layout.sidebar.sidebar')
@section('title', 'Sale')

@section('content-web')
    @include('components.preloader')

    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
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

            <div class="flex flex-row gap-4">
                <a href="{{ route('payment.export') }}">
                    <button
                        class="px-4 py-2.5 bg-green-500 rounded-lg flex flex-row items-center gap-4 text-white hover:shadow-md hover:shadow-green-900">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"
                            class="w-6 h-6">
                            <rect width="24" height="24" fill="none" />
                            <path fill="currentColor"
                                d="M18 12.998h-5v5a1 1 0 0 1-2 0v-5H6a1 1 0 0 1 0-2h5v-5a1 1 0 0 1 2 0v5h5a1 1 0 0 1 0 2" />
                        </svg>

                        <span>Export Data</span>
                    </button>
                </a>
                <a href="{{ route('payment.detail') }}">
                    <button
                        class="px-4 py-2.5 bg-green-500 rounded-lg flex flex-row items-center gap-4 text-white hover:shadow-md hover:shadow-green-900">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"
                            class="w-6 h-6">
                            <rect width="24" height="24" fill="none" />
                            <path fill="currentColor"
                                d="M18 12.998h-5v5a1 1 0 0 1-2 0v-5H6a1 1 0 0 1 0-2h5v-5a1 1 0 0 1 2 0v5h5a1 1 0 0 1 0 2" />
                        </svg>

                        <span>Add Payment</span>
                    </button>
                </a>
            </div>
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


                                        {{-- Delete --}}
                                        <button class="hover:text-primary"
                                            data-modal-target="delete-modal-{{ $sale->id }}"
                                            data-modal-toggle="delete-modal-{{ $sale->id }}">
                                            <svg class="fill-current" width="18" height="18" viewBox="0 0 18 18"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M13.7535 2.47502H11.5879V1.9969C11.5879 1.15315 10.9129 0.478149 10.0691 0.478149H7.90352C7.05977 0.478149 6.38477 1.15315 6.38477 1.9969V2.47502H4.21914C3.40352 2.47502 2.72852 3.15002 2.72852 3.96565V4.8094C2.72852 5.42815 3.09414 5.9344 3.62852 6.1594L4.07852 15.4688C4.13477 16.6219 5.09102 17.5219 6.24414 17.5219H11.7004C12.8535 17.5219 13.8098 16.6219 13.866 15.4688L14.3441 6.13127C14.8785 5.90627 15.2441 5.3719 15.2441 4.78127V3.93752C15.2441 3.15002 14.5691 2.47502 13.7535 2.47502ZM7.67852 1.9969C7.67852 1.85627 7.79102 1.74377 7.93164 1.74377H10.0973C10.2379 1.74377 10.3504 1.85627 10.3504 1.9969V2.47502H7.70664V1.9969H7.67852ZM4.02227 3.96565C4.02227 3.85315 4.10664 3.74065 4.24727 3.74065H13.7535C13.866 3.74065 13.9785 3.82502 13.9785 3.96565V4.8094C13.9785 4.9219 13.8941 5.0344 13.7535 5.0344H4.24727C4.13477 5.0344 4.02227 4.95002 4.02227 4.8094V3.96565ZM11.7285 16.2563H6.27227C5.79414 16.2563 5.40039 15.8906 5.37227 15.3844L4.95039 6.2719H13.0785L12.6566 15.3844C12.6004 15.8625 12.2066 16.2563 11.7285 16.2563Z"
                                                    fill="" />
                                                <path
                                                    d="M9.00039 9.11255C8.66289 9.11255 8.35352 9.3938 8.35352 9.75942V13.3313C8.35352 13.6688 8.63477 13.9782 9.00039 13.9782C9.33789 13.9782 9.64727 13.6969 9.64727 13.3313V9.75942C9.64727 9.3938 9.33789 9.11255 9.00039 9.11255Z"
                                                    fill="" />
                                                <path
                                                    d="M11.2502 9.67504C10.8846 9.64692 10.6033 9.90004 10.5752 10.2657L10.4064 12.7407C10.3783 13.0782 10.6314 13.3875 10.9971 13.4157C11.0252 13.4157 11.0252 13.4157 11.0533 13.4157C11.3908 13.4157 11.6721 13.1625 11.6721 12.825L11.8408 10.35C11.8408 9.98442 11.5877 9.70317 11.2502 9.67504Z"
                                                    fill="" />
                                                <path
                                                    d="M6.72245 9.67504C6.38495 9.70317 6.1037 10.0125 6.13182 10.35L6.3287 12.825C6.35683 13.1625 6.63808 13.4157 6.94745 13.4157C6.97558 13.4157 6.97558 13.4157 7.0037 13.4157C7.3412 13.3875 7.62245 13.0782 7.59433 12.7407L7.39745 10.2657C7.39745 9.90004 7.08808 9.64692 6.72245 9.67504Z"
                                                    fill="" />
                                            </svg>
                                        </button>

                                        <div id="delete-modal-{{ $sale->id }}" tabindex="-1"
                                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative p-4 w-full max-w-md max-h-full">
                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                    <button type="button"
                                                        class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                        data-modal-hide="delete-modal-{{ $sale->id }}">
                                                        <svg class="w-3 h-3" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 14 14">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                    <form action="{{ route('customer.delete', $sale->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <div class="p-4 md:p-5 text-center">
                                                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                fill="none" viewBox="0 0 20 20">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                            </svg>
                                                            <h3
                                                                class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                                                Are you sure you want to delete this product?
                                                            </h3>
                                                            <button type="submit"
                                                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                                Yes, I'm sure
                                                            </button>
                                                            <button data-modal-hide="delete-modal-{{ $sale->id }}"
                                                                type="button"
                                                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No,
                                                                cancel</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Delete --}}
                                        <a href="{{ route('payment.pdf') }}">
                                            <button class="hover:text-primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                    viewBox="0 0 24 24">
                                                    <rect width="24" height="24" fill="none" />
                                                    <path fill="currentColor"
                                                        d="m12 16l-5-5l1.4-1.45l2.6 2.6V4h2v8.15l2.6-2.6L17 11zm-6 4q-.825 0-1.412-.587T4 18v-3h2v3h12v-3h2v3q0 .825-.587 1.413T18 20z" />
                                                </svg>
                                            </button>
                                        </a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection
