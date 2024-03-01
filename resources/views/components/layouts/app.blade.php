<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200..800&display=swap" rel="stylesheet">

  <style>
    /* // <uniquifier>: Use a unique and descriptive class name
    // <weight>: Use a value from 200 to 800 */

    .plus-jakarta-sans {
      font-family: "Plus Jakarta Sans", sans-serif;
      font-optical-sizing: auto;
      font-style: normal;
    }
  </style>

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="relative plus-jakarta-sans ">
  <div class="max-w-7xl mx-4 xl:mx-auto absolute top-12 inset-x-0">
    <nav class="w-full  px-6 py-3 bg-white rounded-2xl shadow-lg">
      <img src="{{ asset('images/logo.png') }}" alt="logo" class="w-24">
    </nav>
  </div>

  <section style="background-image: url('images/hero.png')" class="w-full h-[492px] bg-cover bg-no-repeat">
    <div class="max-w-7xl mx-4 xl:mx-auto flex items-center h-full">

      <div class="w-full flex justify-center">
        <h1 class="text-5xl font-bold  text-center max-w-4xl text-white">Selamat Datang di Katalog Aplikasi
          Pemerintah
          Kabupaten
          Pandeglang
        </h1>
      </div>
    </div>
  </section>

  <section class="max-w-7xl mx-4 xl:mx-auto relative">
    <div class="absolute -top-28 w-full">
      <h3 class="text-lg font-semibold text-white mb-6">Aplikasi Pilihan</h3>

      <div class="grid  lg:grid-cols-4 grid-cols-2 gap-8 ">
        <x-home.feature>
          test
        </x-home.feature>
        <x-home.feature>
          test
        </x-home.feature>
        <x-home.feature>
          test
        </x-home.feature>
        <x-home.feature>
          test
        </x-home.feature>
      </div>
    </div>
  </section>



  {{--
  <x-ui.navbar /> --}}
  {{ $slot }}
</body>

</html>