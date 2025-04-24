<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
    />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>
      eCommerce Dashboard | TailAdmin - Tailwind CSS Admin Dashboard Template
    </title>
    <link href="{{ asset('css/tailwind.css') }}" rel="stylesheet">
    @vite(['resources/css/style.css'])

<style>
  .icondispay{
    display:none;
  }
</style>



  </head>
  <body
    x-data="{ page: 'ecommerce', 'loaded': true, 'darkMode': false, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }"
    x-init="
         darkMode = JSON.parse(localStorage.getItem('darkMode'));
         $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))"
    :class="{'dark bg-gray-900': darkMode === true}"
  >

    @include('layout.preload')

 
    <div class="flex h-screen overflow-hidden">
  
      @include('layout.slidebaradmin')

      <div
        class="relative flex flex-col flex-1 overflow-x-hidden overflow-y-auto"
      >

        @include('layout.overlay')
        @include('layout.header')
        <main>
          <div class="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6">
            <div class="grid grid-cols-12 gap-4 md:gap-6">
              <div class="col-span-12 space-y-6 xl:col-span-7">
        
                @include('layout.metric-group-01')
                
              </div>
              <div class="col-span-12 xl:col-span-5">
              
                @include('layout.chart-02')
               
            
              </div>
            </div>
          </div>
        </main>
        
      </div>
     
    </div>
 
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>


<script src="https://cdn.jsdelivr.net/npm/@alpinejs/persist@3.x.x/dist/cdn.min.js" defer></script>
  </body>
</html>
