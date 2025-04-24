@include('layoutuser.header')
<main>
          <div class="p-10 mx-auto max-w-7xl md:p-6">
            <div class="grid grid-cols-12 gap-4 md:gap-6">
              <div class="col-span-12 space-y-6 xl:col-span-12 ">
                <div class="">
                  <h1 class="font-bold !text-[24px]">Danh sách đơn hàng</h1>
                </div>
              
                <div class="flex space-x-4">
                    <div>
                    
                        <a href="{{ route('createorder') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                            <i class="fa-solid fa-plus"></i> Thêm Mới
                        </a>
                    </div>
                    <div>
                        <a href="" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">
                            <i class="fa-solid fa-plus"></i> Nạp tiền ({{ number_format(Auth::user()->coin, 0, ',', '.') }}đ)
                        </a>
                    </div>
                </div>

              </div>
              <div class="col-span-12 space-y-6 xl:col-span-12">
                <div class="card bg-white p-4 rounded-md shadow">
                  <div class="overflow-x-auto">
                   
                    <h2 class="text-xl font-bold text-gray-700 mb-4 pb-2">
                      Danh sách đơn thuê zoom
                    </h2>
                    <div class="flex justify-around mb-3">
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
              
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border rounded-lg shadow-md">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2 border text-left">ID</th>
                                    <th class="px-4 py-2 border text-left">Thời gian thuê</th>
                                    <th class="px-4 py-2 border text-left">Loại Zoom</th>
                                    <th class="px-4 py-2 border text-center">Giá thuê</th>
                                    <th class="px-4 py-2 border text-center">Phòng họp</th>
                                    <th class="px-4 py-2 border text-center">Người tham gia</th>
                                    <th class="px-4 py-2 border text-center">Cloud Recording</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tbody>
                                @if ($orders->isEmpty())
                                    <tr>
                                        <td colspan="7" class="text-center text-gray-500 py-4">Bạn chưa có đơn hàng nào.</td>
                                    </tr>
                                @else
                                    @foreach ($orders as $order)
                                        <tr class="bg-gray-100">
                                            <td class="px-4 py-2 border">{{ $order->id }}</td>
                                            <td class="px-4 py-2 border">
                                                <span class="text-green-500">{{ \Carbon\Carbon::parse($order->datestart)->format('H:i d-m-Y ') }}</span><br>
                                                <span class="text-red-500">{{ \Carbon\Carbon::parse($order->dateend)->format('H:i d-m-Y ') }}</span><br>
                                                @php
                                                    $timeText = $order->numberhouse < 24 ? $order->numberhouse . ' giờ' : floor($order->numberhouse / 24) . ' ngày';
                                                @endphp
                                                <span>{{ $timeText }}</span>
                                            </td>
                                            <td class="px-4 py-2 border">{{ $order->type }}</td>
                                            <td class="px-4 py-2 border text-center">{{ number_format($order->price, 0, ',', '.') }} đ</td>
                                            <td class="px-4 py-2 border text-center">
    @if ($order->room)
        <a href="{{ route('rooms.room', ['id' => $roomsByOrderId[$order->id]->id]) }}" class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600 transition duration-300">
            Xem phòng
        </a>
    @else
        <a href="{{ route('rooms.createRoom', ['order_id' => $order->id]) }}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition duration-300">
            Tạo phòng họp
        </a>
    @endif
</td>
                                            <td class="px-4 py-2 border text-center"><a href=""><i class="fa-solid fa-user"></i></a></td>
                                            <td class="px-4 py-2 border text-center"><a href=""><i class="fa-solid fa-cloud"></i></a></td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>

                        </table>
                    </div>

                    <div class="flex justify-center items-center mt-4">
                        <nav class="flex space-x-1">
                            @if ($orders->onFirstPage())
                                <span class="px-3 py-1 border border-gray-300 text-gray-500 rounded-md">«</span>
                            @else
                                <a href="{{ $orders->previousPageUrl() }}" class="px-3 py-1 border border-gray-500 text-gray-700 rounded-md hover:bg-gray-200">«</a>
                            @endif

                            @for ($i = 1; $i <= $orders->lastPage(); $i++)
                                <a href="{{ $orders->url($i) }}" class="px-3 py-1 border {{ $orders->currentPage() == $i ? 'border-blue-600 bg-blue-500 text-white' : 'border-gray-500 text-gray-700 hover:bg-gray-200' }} rounded-md">
                                    {{ $i }}
                                </a>
                            @endfor

                            @if ($orders->hasMorePages())
                                <a href="{{ $orders->nextPageUrl() }}" class="px-3 py-1 border border-gray-500 text-gray-700 rounded-md hover:bg-gray-200">»</a>
                            @else
                                <span class="px-3 py-1 border border-gray-300 text-gray-500 rounded-md">»</span>
                            @endif
                        </nav>
                    </div>


           






                  </div>

                </div>
              </div>
            </div>
          </div>
        </main>

@include('layoutuser.footer')