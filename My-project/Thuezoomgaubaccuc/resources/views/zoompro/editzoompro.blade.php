@include('commandpart.header')

<main class="mt-4">
          <div class="p-10 mx-auto max-w-7xl md:p-6">
            <div class="grid grid-cols-12 gap-4 md:gap-6">
                <div class="col-span-12 space-y-6 xl:col-span-12 ">
                    <div class="">
                        <h1 class="font-bold !text-[24px]"><a class="!text-blue-600" href="{{ route('listzoompro') }}">Tài khoản</a> / Thêm tài khoản</h1>
                    </div>
                    <div class="bg-white p-4 rounded-md shadow">
                        <div class="mb-4"><h2>Thông tin tài khoản zoom</h2></div>
                       <form action="{{ route('updatezoompro', $zoompro->id) }}" method="post">
                            @csrf 
                            @method('PUT')
                            <div class="flex gap-4">
                                <div class="w-1/2">
                                    <label for="user" class="block text-sm font-medium text-gray-700 mb-2">Tài khoản(*)</label>
                                    <input 
                                        name="user" 
                                        type="text" 
                                        class="border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-blue-500 w-full"
                                        value="{{ $zoompro->user }}" 
                                        required
                                    >
                                </div>

                                <div class="w-1/2">
                                    <label for="pass" class="block text-sm font-medium text-gray-700 mb-2">Mật khẩu(*)</label>
                                    <input 
                                        name="pass" 
                                        type="text" 
                                        class="border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-blue-500 w-full"
                                        value="{{ $zoompro->pass }}" 
                                        required
                                    >
                                </div>
                            </div>


                            <div class="flex gap-4">
                                <div class="w-1/2">
                                    <label for="key_host" class="block text-sm font-medium text-gray-700 mb-2">Key Host(*)</label>
                                    <input 
                                        name="key_host" 
                                        type="text" 
                                        class="border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-blue-500 w-full"
                                        value="{{ $zoompro->key_host }}" 
                                        required
                                    >
                                </div>

                            </div>

                            <div class="flex gap-4">
                                <div class="w-1/2">
                                    <label for="zoom_client_secret" class="block text-sm font-medium text-gray-700 mb-2">Zoom Client Secret(*)</label>
                                    <input 
                                        name="zoom_client_secret" 
                                        type="text" 
                                        class="border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-blue-500 w-full"
                                        value="{{ $zoompro->zoom_client_secret }}" 
                                        required
                                    >
                                </div>

                                <div class="w-1/2">
                                    <label for="zoom_client_id" class="block text-sm font-medium text-gray-700 mb-2">Zoom Client ID(*)</label>
                                    <input 
                                        name="zoom_client_id" 
                                        type="text" 
                                        class="border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-blue-500 w-full"
                                        value="{{ $zoompro->zoom_client_id }}" 
                                        required
                                    >
                                </div>
                            </div>


                            <div class="flex  gap-4">
                                <div class="w-1/2">
                                    <label for="zoom_account_id" class="block text-sm font-medium text-gray-700 mb-2">Zoom Account ID(*)</label>
                                    <input 
                                        name="zoom_account_id" 
                                        type="text" 
                                        class="border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-blue-500 w-full"
                                        value="{{ $zoompro->zoom_account_id }}" 
                                        required
                                    >
                                </div>

                                <div class="w-1/2">
                                    <label for="deadline" class="block text-sm font-medium text-gray-700 mb-2">Deadline</label>
                                    <input 
                                        name="deadline" 
                                        type="date" 
                                        class="border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-blue-500 w-full"
                                        value="{{ \Carbon\Carbon::parse($zoompro->deadline)->format('Y-m-d') }}"

                                        required
                                    >
                                </div>
                            </div>


                            <div class="flex gap-4">
                                <div class="w-1/2 pt-2 mt-3">
                                    <label for="type" class="block text-sm font-medium text-gray-700 mb-2">Loại zoom</label>
                                    <select 
                                        name="type" 
                                        class="border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-blue-500 w-full"
                                        required
                                    >
                                        <option value="100" {{ $zoompro->type == '100' ? 'selected' : '' }}>100 người dùng</option>
                                        <option value="300" {{ $zoompro->type == '300' ? 'selected' : '' }}>300 người dùng</option>
                                        <option value="500" {{ $zoompro->type == '500' ? 'selected' : '' }}>500 người dùng</option>
                                        <option value="1000" {{ $zoompro->type == '1000' ? 'selected' : '' }}>1000 người dùng</option>
                                    </select>
                                </div>



                                <div class="w-1/2 pt-2 mt-3">
                                    <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Trạng thái</label>
                                    
                                    <select 
                                        name="status" 
                                        class="border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-blue-500 w-full"
                                        value="{{ $zoompro->status }}" 
                                        required
                                    >
                                        <option value="active">Kích hoạt</option>
                                        <option value="lock">Khóa</option>
                                    </select>
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