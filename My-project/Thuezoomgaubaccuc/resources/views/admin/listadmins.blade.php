
@include('commandpart.header')
        <main>
          <div class="p-10 mx-auto max-w-7xl md:p-6">
            <div class="grid grid-cols-12 gap-4 md:gap-6">
              <div class="col-span-12 space-y-6 xl:col-span-12 ">
                <div class="">
                  <h1 class="font-bold !text-[24px]">Tài khoản quản trị</h1>
                </div>
                <div>
                    <a href="{{ route('addadmins') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                        Thêm Mới
                    </a>
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
                          <label for="username" class="block text-sm font-medium text-gray-700 mb-2">Họ tên</label>
                          <input 
                              id="username" 
                              name="username"
                              type="text" 
                              class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 w-full"
                              value="{{ request('username') }}"
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
               
                    <h2 class="text-xl font-bold text-gray-700 mb-4 pb-2">
                      Danh Sách Người Dùng
                    </h2>
                    @if (session('success'))
                      <div id="status-box" style="position: relative; background-color: #d4edda; padding: 20px; color: #155724; text-align: center; margin: 6px 0; width: 40%; max-width: 600px; border-radius: 5px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                        {{ session('success') }}

                       
                        <div id="progress-bar" style="position: absolute; bottom: 0; left: 0; height: 5px; background-color: #28a745; width: 100%; animation: progressBar 5s linear forwards;"></div>
                      </div>

                    @endif
                   
                    <table class="min-w-full bg-white border  rounded-lg shadow-md">
                      <thead class="">
                        <tr>
                          <th class="px-4 py-2 border text-left">ID</th>
                          <th class="px-4 py-2 border text-left">Họ Tên</th>
                          <th class="px-4 py-2 border text-left">Email</th>
                          <th class="px-4 py-2 border text-center">Hành Động</th>
                        </tr>
                      </thead>
                      @foreach ($admins as $admin)
                        <tr class="hover:bg-gray-100">
                            <td class="border border-gray-300 px-4 py-2">{{ $admin->id }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $admin->username }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $admin->email }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                            <a href="{{ route('editadmins', $admin->id) }}" class="bg-blue-500 px-3 py-1 rounded-md hover:bg-blue-600">
                                <i class="fa-solid fa-pencil"></i>
                            </a>


                                @if ($admin->username !== 'gaubaccuc')
                                    |
                                    <form action="{{ route('deleteadmin', $admin->id) }}" method="POST" 
                                        class="inline"
                                        onsubmit="return confirm('Bạn có chắc chắn muốn xóa không?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 px-3 py-1 rounded-md hover:bg-red-600 ml-2">
                                            <i class="fa-solid fa-trash-can "></i>
                                        </button>
                                    </form>
                                @endif

                            </td>
                        </tr>
                      @endforeach
                    </table>

                    <!-- Pagination -->
                    <div class="flex justify-center items-center mt-4">
                        <nav class="flex space-x-1">
                            @if ($admins->onFirstPage())
                                <span class="px-3 py-1 border border-gray-300 text-gray-500 rounded-md">«</span>
                            @else
                                <a href="{{ $admins->previousPageUrl() }}" class="px-3 py-1 border border-gray-500 text-gray-700 rounded-md hover:bg-gray-200">«</a>
                            @endif

                            @for ($i = 1; $i <= $admins->lastPage(); $i++)
                                <a href="{{ $admins->url($i) }}" class="px-3 py-1 border {{ $admins->currentPage() == $i ? 'border-blue-600 bg-blue-500 text-white' : 'border-gray-500 text-gray-700 hover:bg-gray-200' }} rounded-md">
                                    {{ $i }}
                                </a>
                            @endfor

                            @if ($admins->hasMorePages())
                                <a href="{{ $admins->nextPageUrl() }}" class="px-3 py-1 border border-gray-500 text-gray-700 rounded-md hover:bg-gray-200">»</a>
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
