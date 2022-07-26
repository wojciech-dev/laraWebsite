<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Base') }}</title>

  <link rel="stylesheet" href="{{ mix('css/app.css') }}">
  @livewireStyles
</head>

<body>

  <div class="bg-white shadow-md" x-data="{ isOpen: false }">
    <nav class="container px-6 py-8 mx-auto md:flex md:justify-between md:items-center">
      <div class="flex items-center justify-between">
        <a class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 md:text-2xl hover:text-green-400"
          href="/">
          TailFood
        </a>
        <!-- Mobile menu button -->
        <div @click="isOpen = !isOpen" class="flex md:hidden">
          <button type="button" class="text-gray-800 hover:text-gray-400 focus:outline-none focus:text-gray-400"
            aria-label="toggle menu">
            <svg viewBox="0 0 24 24" class="w-6 h-6 fill-current">
              <path fill-rule="evenodd"
                d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z">
              </path>
            </svg>
          </button>
        </div>
      </div>

      <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
      <div :class="isOpen ? 'flex' : 'hidden'"
        class="flex-col mt-8 space-y-4 md:flex md:space-y-0 md:flex-row md:items-center md:space-x-10 md:mt-0">
        @if (Route::has('login'))
        @auth
          @if (Auth::user()->utype==='admin')
          <a class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:text-green-400" href="{{ route('admin.dashboard') }}">Dashboard</a>
          <a class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:text-green-400"href="{{ route('admin.service_categories') }}">Service categories</a>
          <a class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:text-green-400"href="{{ route('admin.all_services') }}">All services</a>
          <a class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:text-green-400"href="{{ route('admin.slider') }}">Slider</a>
          <a class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:text-green-400" href="{{ route('admin.contacts') }}">ContactUs</a>
  
          <a class="inline-block px-6 py-2 border-2 border-red-600 text-red-600 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out"
            href="{{ route('logout') }}">Logout</a>
      
          @elseif (Auth::user()->utype==='provider')
          <a class="py-2 inline-block md:text-white md:hidden lg:block font-semibold" href="#">About Us</a>
          <a class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:text-green-400"href="#">Treatments</a>
          <a class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:text-green-400"href="#">Testimonials</a>
          <a class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:text-green-400"href="#">Blog</a>
          <a class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:text-green-400" href="#">ContactUs</a>
          <a class="inline-block px-6 py-2 border-2 border-red-600 text-red-600 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out"
            href="{{ route('logout') }}">Logout</a>
  
          @elseif (Auth::user()->utype==='customer')
          <a class="py-2 inline-block md:text-white md:hidden lg:block font-semibold" href="#">About Us</a>
          <a class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:text-green-400"href="#">Treatments</a>
          <a class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:text-green-400"href="#">Testimonials</a>
          <a class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:text-green-400"href="#">Blog</a>
          <a class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:text-green-400" href="#">ContactUs</a>
          <a class="inline-block px-6 py-2 border-2 border-red-600 text-red-600 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out"
            href="{{ route('logout') }}">Logout</a>
          @endif
          @else
          <a class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:text-green-400"
          href="#">Home</a>
        <a class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:text-green-400"
          href="#">About Us</a>
        <a class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:text-green-400"
          href="#">Our Menu</a>
        <a class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:text-green-400"
          href="#">Gallery</a>
          <div>
            <a class="inline-block px-6 py-2 border-2 border-green-500 text-green-500 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out"
            href="{{ route('login') }}">Login</a>
              <a class="inline-block px-6 py-2 border-2 border-green-500 text-green-500 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out"
              href="{{ route('register') }}">Register</a>
          </div>
          @endif
          @endif
      </div>
    </nav>
  </div>
  <!-- Main Hero Content -->
    base.blade.php

    <div class="w-full">
      {{ $slot }}
    </div>

    <footer class="bg-gray-800 border-t border-gray-200">
      <div class="container flex flex-wrap items-center justify-center px-4 py-8 mx-auto lg:justify-between">
        <div class="flex flex-wrap justify-center">
          <ul class="flex items-center space-x-4 text-white">
            <li>Home</li>
            <li>About</li>
            <li>Contact</li>
            <li>Terms</li>
          </ul>
        </div>
        <div class="flex justify-center mt-4 lg:mt-0">
          <a>
            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              class="w-6 h-6 text-blue-600" viewBox="0 0 24 24">
              <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
            </svg>
          </a>
          <a class="ml-3">
            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              class="w-6 h-6 text-blue-300" viewBox="0 0 24 24">
              <path
                d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
              </path>
            </svg>
          </a>
          <a class="ml-3">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              class="w-6 h-6 text-pink-400" viewBox="0 0 24 24">
              <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
              <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
            </svg>
          </a>
          <a class="ml-3">
            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
              stroke-width="0" class="w-6 h-6 text-blue-500" viewBox="0 0 24 24">
              <path stroke="none"
                d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"></path>
              <circle cx="4" cy="4" r="2" stroke="none"></circle>
            </svg>
          </a>
        </div>
      </div>
    </footer>

  <script src="{{ mix('js/app.js') }}"></script>

  @stack('scripts')

  @livewireScripts

</body>

</html>