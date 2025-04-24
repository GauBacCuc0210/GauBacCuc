@include('commandpart.header')

<main class="mt-4">
          <div class="p-10 mx-auto max-w-7xl md:p-6">
            <div class="grid grid-cols-12 gap-4 md:gap-6">
                <div class="col-span-12 space-y-6 xl:col-span-12 ">
                    <div class="">
                        <h1 class="font-bold !text-[24px]"><a class="!text-blue-600" href="{{ route('index.listprice') }}">Tài khoản</a> / Thêm tài khoản</h1>
                    </div>
                    <div class="bg-white p-4 rounded-md shadow">
                        <div class="mb-4"><h2>Sửa giá zoom</h2></div>
                       <form action="{{ route('updateprice', $price->id) }}" method="post">
                            @csrf 
                            @method('PUT')
                            <div class="flex gap-4">
                                <div class="w-1/2">
                                    <label for="type" class="block text-sm font-medium text-gray-700 mb-2">loại(*)</label>
                                    <input 
                                        name="type" 
                                        type="text" 
                                        class="border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-blue-500 w-full"
                                        value="{{ $price->type }}" 
                                        required
                                    >
                                </div>

                                <div class="w-1/2">
                                    <label for="hour" class="block text-sm font-medium text-gray-700 mb-2">Giờ(*)</label>
                                    <input 
                                        name="hour" 
                                        type="text" 
                                        class="border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-blue-500 w-full"
                                        value="{{ $price->hour }}" 
                                        required
                                    >
                                </div>
                            </div>


                            <div class="flex gap-4">
                                <div class="w-1/2">
                                    <label for="price" class="block text-sm font-medium text-gray-700 mb-2">Giá(*)</label>
                                    <input 
                                        name="price" 
                                        type="text" 
                                        class="border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-blue-500 w-full"
                                        value="{{ number_format($price->price, 0, '', '') }}" 
                                        required
                                    >

                                </div>

                            </div>



                            <div class="flex items-center mt-7">
                                <div class="bg-blue-500 text-white px-5 py-2 rounded-md hover:bg-blue-600 flex items-center">
                                    <button 
                                        type="submit" 
                                        class="text-center w-auto">
                                        Lưu thông tin
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
          </div>
</main>


@include('commandpart.footer')