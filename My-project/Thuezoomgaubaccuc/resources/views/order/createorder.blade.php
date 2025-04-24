@include('layoutuser.header')
@section('title', 'Tạo đơn hàng')
<style>
    .btn-submit {
        color: white;
        font-weight: 600;
        padding: 10px 20px;
        border-radius: 5px;
        background-color: blue;
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }
    
    .btn-submit:hover {
        background-color: white;
        color: blue;
        border-color: blue;
    }
</style>
    <main>
            <div class="p-10 mx-auto max-w-7xl md:p-6">
                <div class="grid grid-cols-12 gap-4 md:gap-6">
                <div class="col-span-12 space-y-6 xl:col-span-12 ">
                    <div class="">
                    <h1 class="font-bold !text-[24px]"><a href="">Lịch sử thuê Zoom / </a>Tạo đơn mới</h1>
                    </div>
                    <div class="flex space-x-4">
                        <div>
                            <a href="" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">
                                <i class="fa-solid fa-plus"></i>Nạp tiền ({{ number_format(Auth::user()->coin, 0, ',', '.') }}đ)

                            </a>
                        </div>
                    </div>

                </div>
                <div class="col-span-12 space-y-6 xl:col-span-12">
                    <div class="card bg-white p-4 rounded-md shadow">
                    <div class="overflow-x-auto">
                    
                        <h2 class="text-xl font-bold text-gray-700 mb-4 pb-2">
                        Đơn hàng thuê zoom
                        </h2>
                        <div class="flex justify-around">
                            <div class="font-bold">
                                Zoom 100:
                                @if($zoom100 == 0)
                                    <span class="text-red-600">0 (tạm hết)</span>
                                @else
                                    <span class="text-blue-600">{{ $zoom100 }}</span>
                                @endif
                            </div>

                            <div class="font-bold">
                                Zoom 300:
                                @if($zoom300 == 0)
                                    <span class="text-red-600">0 (tạm hết)</span>
                                @else
                                    <span class="text-blue-600">{{ $zoom300 }}</span>
                                @endif
                            </div>

                            <div class="font-bold">
                                Zoom 500:
                                @if($zoom500 == 0)
                                    <span class="text-red-600">0 (tạm hết)</span>
                                @else
                                    <span class="text-blue-600">{{ $zoom500 }}</span>
                                @endif
                            </div>

                            <div class="font-bold">
                                Zoom 1000:
                                @if($zoom1000 == 0)
                                    <span class="text-red-600">0 (tạm hết)</span>
                                @else
                                    <span class="text-blue-600">{{ $zoom1000 }}</span>
                                @endif
                            </div>
                        </div>


                        <div>
                            <form class="space-y-4 p-4" action="{{ route('order.store') }}" method="post">
                                 @csrf
                                <div class="grid grid-cols-12 gap-4">
                              
                                    <div class="col-span-6">
                                        <label for="" class="block font-bold mb-1">
                                            Loại tài khoản Zoom <span class="text-red-500">*</span>
                                        </label>
                                        <select id="type" name="type" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                          
                                            <option value="">-- Chọn loại zoom</option>
                                            @foreach ($zoomPrices->unique('type') as $price)
                                                <option value="{{ $price->type }}">Zoom: {{ ucfirst($price->type) }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-span-6">
                                        <label for="" class="block font-bold mb-1">Thời gian thuê <span class="text-red-500">*</span></label>
                                        <select id="numberhouse" name="numberhouse" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                          
                                            <option value="">Chọn thời gian</option>
                                        </select>
                                    </div>
                                </div>



                    
                                <div>
                                    <label class="block font-bold mb-1">Tự động gia hạn <span class="text-red-500">*</span></label>
                                    <div class="flex items-center space-x-6">
                                        <label class="inline-flex items-center">
                                            <input type="radio" name="extend_time_use" value="0" class="form-radio text-red-600">
                                            <span class="ml-2">Tắt</span>
                                        </label>
                                        <label class="inline-flex items-center">
                                            <input type="radio" name="extend_time_use" value="1" class="form-radio text-blue-600">
                                            <span class="ml-2">Bật</span>
                                        </label>
                                    </div>
                                </div>

                                <button type="submit" class="btn-submit" >
                                    Tạo đơn
                                </button>



                            </form>
                        </div>


                    </div>

                    </div>
                </div>
                </div>
            </div>
    </main>
    <script>
        const allPrices = @json($zoomPrices); 

        document.getElementById('type').addEventListener('change', function () {
            const selectedType = this.value;
            const rentalSelect = document.getElementById('numberhouse');
            rentalSelect.innerHTML = '<option value="">Chọn thời gian</option>';

            const filteredPrices = allPrices
                .filter(p => p.type == selectedType); 

            const uniquePrices = [...new Set(filteredPrices.map(p => p.hour))]
                .sort((a, b) => a - b);

            uniquePrices.forEach(hour => {
            
                const price = filteredPrices.find(p => p.hour === hour).price;

                const roundedPrice = Math.floor(price); 

                let timeText = `${hour} giờ - Giá ${roundedPrice} VND`;
                if (hour > 24 && hour <= 48) {
                    const days = Math.floor(hour / 24);
                    timeText = `${days} ngày - Giá ${roundedPrice} VND`;
                } else if (hour > 48 && hour <= 720) {
                    const months = Math.floor(hour / 720); 
                    timeText = `${months} tháng - Giá ${roundedPrice} VND`;
                } else if (hour > 720) {
                    const years = Math.floor(hour / 8760);
                    timeText = `${years} năm - Giá ${roundedPrice} VND`;
                }

                const option = document.createElement('option');
                option.value = hour;
                option.text = timeText; 
                rentalSelect.appendChild(option);
            });
        });
    </script>



@include('layoutuser.footer')