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
      Danh sách tài khoản quản trị
    </title>
    <link href="{{ asset('css/tailwind.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    @vite(['resources/css/style.css'])
    <link rel="icon" href="images/pngtree-polar-bear-head-png-image_12164074.png" type="image/png">
    <style>
.icon-success {
    background-color: #28a745;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.icon-success i {
    color: #fff;
    font-size: 16px;
}


@keyframes progressBar {
	from { width: 100%; }
	to { width: 0%; }
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