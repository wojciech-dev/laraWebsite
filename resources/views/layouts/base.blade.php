<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Base') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles
    <style>
      #menu-toggle:checked+#menu {
        display: block;
      }
  
      #dropdown-toggle:checked+#dropdown {
        display: block;
      }
  
      a,
      span {
        position: relative;
        text-decoration: none;
        transition: all 0.3s ease;
      }
  
      a.arrow,
      span.arrow {
        display: flex;
        align-items: center;
        font-weight: 600;
        line-height: 1.5;
      }
  
      a.arrow .arrow_icon,
      span.arrow .arrow_icon {
        position: relative;
        margin-left: 0.5em;
      }
  
      a.arrow .arrow_icon svg,
      span.arrow .arrow_icon svg {
        transition: transform 0.3s 0.02s ease;
        margin-right: 1em;
      }
  
      a.arrow .arrow_icon::before,
      span.arrow .arrow_icon::before {
        content: "";
        display: block;
        position: absolute;
        top: 50%;
        left: 0;
        width: 0;
        height: 2px;
        background: #38b2ac;
        transform: translateY(-50%);
        transition: width 0.3s ease;
      }
  
      a.arrow:hover .arrow_icon::before,
      span.arrow:hover .arrow_icon::before {
        width: 1em;
      }
  
      a.arrow:hover .arrow_icon svg,
      span.arrow:hover .arrow_icon svg {
        transform: translateX(0.75em);
      }
  
       .cover {
        border-bottom-right-radius: 128px;
      } 
  
      .bg-blue-teal-gradient {
        background: rgb(49, 130, 206);
        background: linear-gradient(90deg, rgba(49, 130, 206, 1) 0%, rgba(56, 178, 172, 1) 100%);
      }
  
      @media (min-width: 1024px) {
        .cover {
          border-bottom-right-radius: 256px;
        }
      } 
    </style>
</head>

<body class="antialiased bg-white font-sans text-gray-900">

  <main class="w-full">
    base.blade.php
    {{ $slot }}
  </main>

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-131505823-4"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-131505823-4');
  </script>

  <script src="{{ mix('js/app.js') }}"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.jquery.min.js"></script>

  @stack('scripts')

  @livewireScripts
</body>

</html>