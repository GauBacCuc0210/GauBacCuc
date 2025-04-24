@include('commandpart.header')

<main class="mt-4">
          <div class="p-10 mx-auto max-w-7xl md:p-6">
            <div class="grid grid-cols-12 gap-4 md:gap-6">
                <div class="col-span-12 space-y-6 xl:col-span-12 ">
                    <div class="">
                        <h1 class="font-bold !text-[24px]"><a class="!text-blue-600" href="{{ route('listadmins') }}">Tài khoản</a> / Thêm tài khoản</h1>
                    </div>
                    <div class="bg-white p-4 rounded-md shadow">
                       <form action="{{ route('admin.store') }}" method="POST">
                            @csrf <!-- Bảo vệ CSRF -->
                            <div class="pt-2 mt-3">
                                <label for="username" class="block text-sm font-medium text-gray-700 mb-2">Tài khoản</label>
                                <input 
                                    name="username" 
                                    type="text" 
                                    class="border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-blue-500 w-full"
                                    required
                                >
                            </div>

                            <div class="pt-2 mt-3">
                                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Mật khẩu</label>
                                <input 
                                    name="password" 
                                    type="password" 
                                    class="border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-blue-500 w-full"
                                    required
                                >
                            </div>

                            <div class="pt-2 mt-3">
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                <input 
                                    name="email" 
                                    type="email" 
                                    class="border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-blue-500 w-full"
                                    required
                                >
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