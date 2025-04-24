
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
<style>
  .setting-size-icon i{
    font-size: 23px !important;
  }
</style>
<aside
  :class="sidebarToggle ? 'translate-x-0 lg:w-[90px]' : '-translate-x-full'"
  class="sidebar fixed left-0 top-0 z-10 flex h-screen w-[290px] flex-col overflow-hidden overflow-y-auto border-r border-gray-200 bg-white px-5 duration-300 ease-linear dark:border-gray-800 dark:bg-black lg:static lg:translate-x-0"
  @click.outside="sidebarToggle = false"
>

  <div
    :class="sidebarToggle ? 'justify-center' : 'justify-between'"
    class="sidebar-header flex items-center gap-2 pb-7 pt-5"
  >
    <a href="index.html">
      <span class="logo" :class="sidebarToggle ? 'hidden' : ''">
        <img src="{{ asset('images/logo.png') }}" alt="Logo">
      </span>
      <img  class="logo-icon" :class="sidebarToggle ? 'lg:block' : 'hidden'" src="{{ asset('images/pngtree-polar-bear-head-png-image_12164074.png')  }}" alt="My Image" style="max-width:80%;margin:auto;">
    </a>
  </div>


  <div
    class="no-scrollbar flex flex-col overflow-y-auto h-full" style="scrollbar-width: none;-ms-overflow-style: none;"
  >
    
    <nav class="setting-size-icon" x-data="{selected: $persist('Dashboard')}">
     
      <div>
        <h3 class="mb-4 text-xs leading-[20px] text-gray-400 uppercase">
            <span
              class="menu-group-title"
              :class="sidebarToggle ? 'lg:hidden' : ''"
            >
              THUÊ ZOOM
            </span>

            <svg
              :class="sidebarToggle ? 'lg:block hidden' : 'hidden'"
              class="menu-group-icon mx-auto fill-current"
              width="24"
              height="24"
              viewBox="0 0 24 24"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                fill-rule="evenodd"
                clip-rule="evenodd"
                d="M5.99915 10.2451C6.96564 10.2451 7.74915 11.0286 7.74915 11.9951V12.0051C7.74915 12.9716 6.96564 13.7551 5.99915 13.7551C5.03265 13.7551 4.24915 12.9716 4.24915 12.0051V11.9951C4.24915 11.0286 5.03265 10.2451 5.99915 10.2451ZM17.9991 10.2451C18.9656 10.2451 19.7491 11.0286 19.7491 11.9951V12.0051C19.7491 12.9716 18.9656 13.7551 17.9991 13.7551C17.0326 13.7551 16.2491 12.9716 16.2491 12.0051V11.9951C16.2491 11.0286 17.0326 10.2451 17.9991 10.2451ZM13.7491 11.9951C13.7491 11.0286 12.9656 10.2451 11.9991 10.2451C11.0326 10.2451 10.2491 11.0286 10.2491 11.9951V12.0051C10.2491 12.9716 11.0326 13.7551 11.9991 13.7551C12.9656 13.7551 13.7491 12.9716 13.7491 12.0051V11.9951Z"
                fill=""
              />
            </svg>
        </h3>

        <ul class="mb-6 flex flex-col gap-4">         
          <li>
            <a
              href="{{ route('listorder') }}"
              @click="selected = (selected === 'Calendar' ? '':'Calendar')"
              class="menu-item group"
              :class=" (selected === 'Calendar') && (page === 'calendar') ? 'menu-item-active' : 'menu-item-inactive'"
            >
            <i class="fa-solid fa-list"></i>
              <span
                class="menu-item-text"
                :class="sidebarToggle ? 'lg:hidden' : ''"
              >
                Lịch sử thuê
              </span>
            </a>
          </li>

          <li>
            <a
              href="{{ route('createorder') }}"
              @click="selected = (selected === 'Calendar' ? '':'Calendar')"
              class="menu-item group"
              :class=" (selected === 'Calendar') && (page === 'calendar') ? 'menu-item-active' : 'menu-item-inactive'"
            >
            <i class="fa-brands fa-google-play"></i>
              <span
                class="menu-item-text"
                :class="sidebarToggle ? 'lg:hidden' : ''"
              >
                Tạo đơn mới
              </span>
            </a>
          </li>
        </ul>
        <h3 class="mb-4 text-xs leading-[20px] text-gray-400 uppercase">
            <span
              class="menu-group-title"
              :class="sidebarToggle ? 'lg:hidden' : ''"
            >
              Giao dịch
            </span>

            <svg
              :class="sidebarToggle ? 'lg:block hidden' : 'hidden'"
              class="menu-group-icon mx-auto fill-current"
              width="24"
              height="24"
              viewBox="0 0 24 24"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                fill-rule="evenodd"
                clip-rule="evenodd"
                d="M5.99915 10.2451C6.96564 10.2451 7.74915 11.0286 7.74915 11.9951V12.0051C7.74915 12.9716 6.96564 13.7551 5.99915 13.7551C5.03265 13.7551 4.24915 12.9716 4.24915 12.0051V11.9951C4.24915 11.0286 5.03265 10.2451 5.99915 10.2451ZM17.9991 10.2451C18.9656 10.2451 19.7491 11.0286 19.7491 11.9951V12.0051C19.7491 12.9716 18.9656 13.7551 17.9991 13.7551C17.0326 13.7551 16.2491 12.9716 16.2491 12.0051V11.9951C16.2491 11.0286 17.0326 10.2451 17.9991 10.2451ZM13.7491 11.9951C13.7491 11.0286 12.9656 10.2451 11.9991 10.2451C11.0326 10.2451 10.2491 11.0286 10.2491 11.9951V12.0051C10.2491 12.9716 11.0326 13.7551 11.9991 13.7551C12.9656 13.7551 13.7491 12.9716 13.7491 12.0051V11.9951Z"
                fill=""
              />
            </svg>
        </h3>
        <ul class="mb-6 flex flex-col gap-4">         
          <li>
            <a
              href=""
              @click="selected = (selected === 'Calendar' ? '':'Calendar')"
              class="menu-item group"
              :class=" (selected === 'Calendar') && (page === 'calendar') ? 'menu-item-active' : 'menu-item-inactive'"
            >
            <i class="fa-solid fa-credit-card"></i>
              <span
                class="menu-item-text"
                :class="sidebarToggle ? 'lg:hidden' : ''"
              >
                Nạp tiền
              </span>
            </a>
          </li>

          <li>
            <a
              href=""
              @click="selected = (selected === 'Calendar' ? '':'Calendar')"
              class="menu-item group"
              :class=" (selected === 'Calendar') && (page === 'calendar') ? 'menu-item-active' : 'menu-item-inactive'"
            >
            <i class="fa-solid fa-clock-rotate-left"></i>
              <span
                class="menu-item-text"
                :class="sidebarToggle ? 'lg:hidden' : ''"
              >
                Lịch sử giao dịch
              </span>
            </a>
          </li>
        </ul>
      </div>

    </nav>
  
  </div>
</aside>
  
