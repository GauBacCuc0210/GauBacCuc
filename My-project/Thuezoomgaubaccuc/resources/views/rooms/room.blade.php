@include('layoutuser.header')
@section('title', 'Tạo đơn hàng')
    <main>
            <div class="p-10 mx-auto max-w-7xl md:p-6">
                <div class="grid grid-cols-12 gap-4 md:gap-6">
                <div class="col-span-12 space-y-6 xl:col-span-12 ">
                    <div class="">
                    <h1 class="font-bold !text-[24px]"><a href="">Thuê zoom / </a>Thông tin phòng họp</h1>
                    </div>


                </div>
                <div class="col-span-12 space-y-6 xl:col-span-12">
                    <div class="card bg-white p-4 rounded-md shadow">
                    <div class="overflow-x-auto">
                    
                        <h2 class="text-xl font-bold text-gray-700 mb-4 pb-2">
                        Thông tin phòng họp
                        </h2>
                        <div>
                        <form class="space-y-4 p-4">
                            @csrf
                            <div class="grid grid-cols-12 gap-4">
                                <div class="col-span-6">
                                    <label for="topic" class="block font-bold mb-1">
                                        Tên phòng họp <span class="text-red-500">*</span>
                                    </label>
                                  
                           
                                    <input 
                                        name="topic" 
                                        type="text" 
                                        class="border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-blue-500 w-full"
                                        required
                                        value="{{ $roomInfo['topic'] }}"
                                        disabled
                                    >
                                </div>
                                <div class="col-span-6">
                                    <label for="password" class="block font-bold mb-1">
                                        Mật khẩu phòng họp <span class="text-red-500">*</span>
                                    </label>
                                    <input 
                                        name="password" 
                                        type="text" 
                                        class="border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-blue-500 w-full"
                                        required
                                        value="{{ $roomInfo['password'] }}"
                                        disabled
                                    >
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-4">
                                <div class="col-span-6">
                                    <label for="limit" class="block font-bold mb-1">
                                        Giới hạn phòng họp <span class="text-red-500">*</span>
                                    </label>
                                    <input 
                                        name="limit" 
                                        type="text" 
                                        class="border bg-gray-300 border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-blue-500 w-full"
                                        value="100 người" 
                                        disabled
                                    >
                                </div>
                                <!-- <div class="col-span-6">
                                    <label for="host_key" class="block font-bold mb-1">
                                        KEY HOST <span class="text-red-500">*</span>
                                    </label>
                                    <input 
                                        name="host_key" 
                                        type="text" 
                                        class="border bg-gray-300 border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-blue-500 w-full"
                                        disabled
                                        value=""
                                    >
                                </div> -->
                            </div>

                            <div class="grid grid-cols-12 gap-4">
                                <div class="col-span-6">
                                    <label for="idroom" class="block font-bold mb-1">
                                        ID Phòng Họp <span class="text-red-500">*</span>
                                    </label>
                                    <input 
                                        name="idroom" 
                                        type="text" 
                                        class="border bg-gray-300 border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-blue-500 w-full"
                                        disabled
                                        value="{{$roomInfo['id_zoom'] }}"
                                    >
                                </div>
                                <div class="col-span-6">
                                    <label for="join_url" class="block font-bold mb-1">
                                        Link Phòng Họp <span class="text-red-500">*</span>
                                    </label>
                                    <input 
                                        name="join_url" 
                                        type="text" 
                                        class="border bg-gray-300 border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-blue-500 w-full"
                                        disabled
                                        value="{{ $roomInfo['start_url'] }}"
                                    >
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-4">
                                <div class="col-span-6">
                                    <label for="participant_join_url" class="block font-bold mb-1">
                                        Link phòng họp cho người tham gia <span class="text-red-500">*</span>
                                    </label>
                                    <input 
                                        name="participant_join_url" 
                                        type="text" 
                                        class="border bg-gray-300 border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-blue-500 w-full"
                                        disabled
                                        value="{{ $roomInfo['join_url'] }}"
                                    >
                                </div>
                                <div class="col-span-6">
                                    <label for="admin_join_url" class="block font-bold mb-1">
                                        Link Phòng Họp cho người quản trị <span class="text-red-500">*</span>
                                    </label>
                                    <input 
                                        name="admin_join_url" 
                                        type="text" 
                                        class="border bg-gray-300 border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-blue-500 w-full"
                                        disabled
                                        value="{{ $roomInfo['start_url'] }}"
                                    >
                                </div>
                            </div>

                            <div class="flex items-center mt-4">
                                <a href="{{ $roomInfo['start_url'] }}" class="bg-blue-500  px-5 py-2 rounded-md hover:bg-blue-600">
                                   Vào phòng họp với quyền quản trị
                                </a>
                            </div>
                        </form>


                        </div>


                    </div>

                    </div>
                </div>
                </div>
            </div>
    </main>
    <script>
    // Thay đổi URL hiện tại thành /listorder (không reload lại trang)
    window.history.replaceState(null, null, "{{ route('listorder') }}");
</script>






@include('layoutuser.footer')