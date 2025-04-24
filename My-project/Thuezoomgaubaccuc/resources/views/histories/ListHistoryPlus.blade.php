
@include('commandpart.header')

        <main>
          <div class="p-10 mx-auto max-w-7xl md:p-6">
            <div class="grid grid-cols-12 gap-4 md:gap-6">
              <div class="col-span-12 space-y-6 xl:col-span-12 ">
                <div class="">
                  <h1 class="font-bold !text-[24px]">Danh sách cộng tiền</h1>
                </div>
                <div class="bg-white p-4 rounded-md shadow">
                  <form action="" method="get">
                    <div class="mb-[8px] p-[6px] bg-white rounded-md shadow">
                        <h3>Tìm kiếm dữ liệu</h3>
                    </div>
                    <div class="flex flex-wrap gap-4">
                      <div>
                          <label for="id" class="block text-sm font-medium text-gray-700 mb-2">Id</label>
                          <input 
                              id="id" 
                              name="id"
                              type="text" 
                              class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 w-[80px]"
                              value="{{ request('id') }}"
                          >
                      </div>
                      <div>
                          <label for="plusename" class="block text-sm font-medium text-gray-700 mb-2">Tên khách hàng</label>
                          <input 
                              id="plusename" 
                              name="plusename"
                              type="text" 
                              class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 w-full"
                              value="{{ request('plusename') }}"
                          >
                      </div>
                      <div>
                          <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Số điện thoại</label>
                          <input 
                              id="phone" 
                              name="phone"
                              type="number" 
                              class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 w-full"
                              value="{{ request('phone') }}"
                          >
                      </div>
                      <div>
                          <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                          <input 
                              id="email" 
                              name="email"
                              type="text" 
                              class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 w-full"
                              value="{{ request('email') }}"
                          >
                      </div>
                      <div class="flex justify-center items-center mt-7">
                        <div class="bg-blue-500 text-white px-5 py-2 rounded-md hover:bg-blue-600 flex items-center">
                          <button 
                            type="submit" 
                            class="text-center w-auto">
                            Lọc
                          </button>
                        </div>
                      </div>



                    </div>
                  </form>
                </div>

              </div>
              <div class="col-span-12 space-y-6 xl:col-span-12">
                <div class="card bg-white p-4 rounded-md shadow">
                  <div class="overflow-x-auto">
                    <!-- Tiêu đề -->
                    <h2 class="text-xl font-bold text-gray-700 mb-4 pb-2">
                      Danh Sách khách hàng
                    </h2>
                    <!-- Bảng -->
                    <table class="min-w-full bg-white border  rounded-lg shadow-md">
                      <thead class="">
                        <tr>
                          <th class="px-4 py-2 border text-left">ID</th>
                          <th class="px-4 py-2 border text-left">Thời gian</th>
                          <th class="px-4 py-2 border text-left">Số tiền</th>
                          <th class="px-4 py-2 border text-left">Tài khoản</th>
                          <th class="px-4 py-2 border text-center" >Ghi chú</th>

                        </tr>
                      </thead>
                      @foreach ($pluses as $pluse )
                      
                        <tr class="hover:bg-gray-100">
                            <td class="border border-gray-300 px-4 py-2">{{ $pluse->id }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $pluse->time }}</td>

                            <td class="border border-gray-300 px-4 py-2">
                                {{ number_format($pluse->numbercoinmanager, 0) }} đ
                            </td>

                            <td class="border border-gray-300 px-4 py-2">
                            {{ $pluse->user->name ?? 'Không có tên' }} <br>
                            {{ $pluse->user->phone ?? 'Không có số điện thoại' }} <br>
                            {{ $pluse->user->email ?? 'Không có email' }} <br>
                            {{ number_format($pluse->numbercoin, 0) }} đ

                            </td>

                            <td class="border border-gray-300 px-4 py-2">{{ $pluse->note }}</td>

                        </tr>
                      @endforeach
                    </table>

                    <!-- Pagination -->
                    <div class="flex justify-center items-center mt-4">
                        <nav class="flex space-x-1">
                            @if ($pluses->onFirstPage())
                                <span class="px-3 py-1 border border-gray-300 text-gray-500 rounded-md">«</span>
                            @else
                                <a href="{{ $pluses->previousPageUrl() }}" class="px-3 py-1 border border-gray-500 text-gray-700 rounded-md hover:bg-gray-200">«</a>
                            @endif

                            @for ($i = 1; $i <= $pluses->lastPage(); $i++)
                                <a href="{{ $pluses->url($i) }}" class="px-3 py-1 border {{ $pluses->currentPage() == $i ? 'border-blue-600 bg-blue-500 text-white' : 'border-gray-500 text-gray-700 hover:bg-gray-200' }} rounded-md">
                                    {{ $i }}
                                </a>
                            @endfor

                            @if ($pluses->hasMorePages())
                                <a href="{{ $pluses->nextPageUrl() }}" class="px-3 py-1 border border-gray-500 text-gray-700 rounded-md hover:bg-gray-200">»</a>
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

@include('commandpart.footer')
