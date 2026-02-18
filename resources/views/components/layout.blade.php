<!DOCTYPE html>
<html lang="pt-pt">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ config('app.name') }}</title>

  @vite(['resources/css/app.css'])
</head>

<body class="bg-[#FFEDD6]">
  {{-- Header --}}
  <x-header />
  {{ $slot }}
  {{-- Footer --}}
  <x-footer />
</body>

</html>