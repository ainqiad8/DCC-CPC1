<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/css/custom.css')}}">
  <script src="https://kit.fontawesome.com/67bb6a6c2a.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
</head>

<body>
@include('frontend.layouts.header')


@yield('content')


@include('frontend.layouts.footer')

</body>

<script src="{{asset('frontend/js/custom.js')}}"></script>

@yield('script')

</html>