@include('layoutuser.header')
@section('title', 'Tạo đơn hàng')
    <main>
            <div class="p-10 mx-auto max-w-7xl md:p-6">
                <div class="grid grid-cols-12 gap-4 md:gap-6">
                <div class="col-span-12 space-y-6 xl:col-span-12 ">
                    <div class="">
                    <h1 class="font-bold !text-[24px]"><a href="">Thuê zoom/ </a>Tạo phòng họp</h1>
                    </div>
                    <!-- <div class="flex space-x-4">
                        <div>
                            <a href="" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">
                                <i class="fa-solid fa-plus"></i>Nạp tiền ({{ number_format(Auth::user()->coin, 0, ',', '.') }}đ)

                            </a>
                        </div>
                    </div> -->

                </div>
                <div class="col-span-12 space-y-6 xl:col-span-12">
                    <div class="card bg-white p-4 rounded-md shadow">
                    <div class="overflow-x-auto">
                    
                        <h2 class="text-xl font-bold text-gray-700 mb-4 pb-2">
                        Đơn hàng thuê zoom
                        </h2>
             


                        <div>
                            <form class="space-y-4 p-4" action="{{ route('rooms.store') }}" method="post">
                                 @csrf
                                <div class="grid grid-cols-12 gap-4">
                                <input type="hidden" name="idRoom" value="{{$order->idRoom  }} ">
                                <input type="hidden" name="id_order" value="{{ request()->get('order_id') }}">
                                    <div class="col-span-6">
                                        <label for="" class="block font-bold mb-1">
                                            Tên phòng họp <span class="text-red-500"></span>
                                        </label>
                                        <input 
                                        name="topic" 
                                        type="text" 
                                        value="{{ $defaultTopic }}"
                                        class="border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-blue-500 w-full"
                                        required
                                    >
                                    </div>
                                    <div class="col-span-6">
                                        <label for="" class="block font-bold mb-1">
                                            Thời gian mở phòng <span class="text-red-500"></span>
                                        </label>
                                        <input 
                                        name="start_time" 
                                        type="text" 
                                            value="{{ \Carbon\Carbon::parse($defaultStartTime)->format('Y-m-d\TH:i') }}"
                                        class="border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-blue-500 w-full"
                                        required
                                    >
                                    </div>
                                </div>
                                <div class="grid grid-cols-12 gap-4">
                                    <div class="col-span-6">
                                        <label for="" class="block font-bold mb-1">
                                                Mật khẩu <span class="text-red-500"></span>
                                            </label>
                                            <input 
                                            name="pass" 
                                            type="text" 
                                            value="{{ $defaultPass }}"
                                            class="border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-blue-500 w-full"
                                            required
                                        >
                                    </div>
                                    <div class="col-span-6 mt-4">
                                        <label class="block font-bold mb-1">Yêu cầu nhập mật khẩu khi vào phòng <span class="text-red-500">*</span></label>
                                        <div class="flex items-center space-x-6">
                                            <label class="inline-flex items-center">
                                                <input type="radio" name="input_pass" value="1" class="form-radio text-red-600" checked>
                                                <span class="ml-2">Bắt Buộc</span>
                                            </label>
                                            <label class="inline-flex items-center">
                                                <input type="radio" name="input_pass" value="0" class="form-radio text-blue-600">
                                                <span class="ml-2">Không cần</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>


                    
                              
                                <div class="flex items-center mt-4">
                                <div class="bg-blue-500 text-white px-5 py-2 rounded-md hover:bg-blue-600 flex items-center">
                                    <button 
                                        type="submit" 
                                        class="text-center w-auto">
                                        Tạo đơn
                                    </button>
                                </div>
                            </div>
                            



                            </form>
                        </div>


                    </div>

                    </div>
                </div>
                </div>
            </div>
    </main>



@include('layoutuser.footer')