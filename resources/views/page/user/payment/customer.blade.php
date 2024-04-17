@extends('layout.sidebar.sidebar')
@section('title', 'Customer')
@section('content-web')
    @include('components.preloader')

    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <div class="grid grid-cols-3 gap-10">
            <div class="bg-gray-300 p-4 rounded-lg col-span-1 shadow-md h-fit">
                <div class="w-full text-center border-b border-solid border-black border-x-0 border-y-0 pb-2">
                    <span class="w-full text-xl font-bold text-center text-black-2">PAYMENT
                        CONFIRMATION
                        RECEIPT</span>
                </div>
                <div class="p-4 flex flex-col gap-y-2.5 text-black-2">
                    @foreach ($detail_sale as $payment)
                        <div class="flex flex-row gap-5 items-center justify-between">
                            <div class="flex flex-col">
                                <span class="font-medium">{{ $payment->product->name }}</span>
                                <span
                                    class="text-sm font-normal">Rp{{ number_format($payment->product->price, 0, ',', '.') }}
                                    X
                                    {{ $payment->total_product }}</span>
                            </div>
                            <span
                                class="text-gray-600 font-semibold ">Rp{{ number_format($payment->subtotal, 0, ',', '.') }}</span>
                        </div>
                    @endforeach
                    <span class="mt-5 text-lg font-bold text-gray-700 text-end w-full">Total Price :
                        Rp{{ number_format($sales->total_price, 0, ',', '.') }}</span>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="rounded-sm  bg-box shadow-default dark:border-strokedark dark:bg-boxdark col-span-2">
                <div class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                    <h3 class="font-medium text-black dark:text-white">
                        Contact Form
                    </h3>
                </div>
                <form action="{{ route('customer.store') }}" method="POST">
                    @csrf
                    <div class="p-6.5">
                        <div class="mb-4.5">
                            <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                Name
                            </label>
                            <input type="text" placeholder="Enter your Name" name="name"
                                class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                        </div>
                        <div class="mb-4.5">
                            <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                Address
                            </label>
                            <input type="text" placeholder="Enter your address" name="address"
                                class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                        </div>
                        <div class="mb-4.5">
                            <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                No. Telephone
                            </label>
                            <input type="number" placeholder="Enter your telephone" name="telp"
                                class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                        </div>

                        <button
                            class="flex w-full justify-center rounded bg-primary p-3 font-medium text-gray hover:bg-opacity-90">
                            Send Message
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
