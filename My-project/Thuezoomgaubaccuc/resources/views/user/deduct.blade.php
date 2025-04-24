@include('commandpart.header')

<main class="mt-4">
          <div class="p-10 mx-auto max-w-7xl md:p-6">
            <div class="grid grid-cols-12 gap-4 md:gap-6">
                <div class="col-span-12 space-y-6 xl:col-span-12 ">
                    <div class="">
                        <h1 class="font-bold !text-[24px]"><a class="!text-blue-600" href="{{ route('index.listuser') }}">Khách hàng</a> / Cộng tiền</h1>
                    </div>
                    <div class="bg-white p-4 rounded-md shadow">
                    <h2 class="text-xl font-bold mb-4">Nạp tiền cho: {{ $user->name }}</h2>
                       <form action="{{ route('user.deduct.store', $user->id) }}" method="POST">
                            @csrf 
                            <div class="flex gap-4 mb-4">
                                <div class="w-1/2">
                                    <label for="amount" class="block text-sm font-medium text-gray-700 mb-2">Số tiền trừ của tài khoản {{ $user->name }}-
                                    Số dư: {{ $user->coin }}đ</label></label>
                                    <input 
                                        name="amount" 
                                        type="number" 
                                        class="border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-blue-500 w-full"
                                        required
                                    >
                                </div>

                
                            </div>


                            <div class="flex gap-4">
                                <div class="w-1/2">
                                    <label for="note" class="block text-sm font-medium text-gray-700 mb-2">Lý do trừ</label>
                                    <input 
                                        name="note" 
                                        type="text" 
                                        class="border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-blue-500 w-full"
                                    >
                                </div>
                            </div>



                            <div class="flex items-center mt-7">
                                <div class="bg-blue-500 text-white px-5 py-2 rounded-md hover:bg-blue-600 flex items-center">
                                    <button 
                                        type="submit" 
                                        class="text-center w-auto">
                                        Xác nhận
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