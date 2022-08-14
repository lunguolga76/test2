<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!--jQuery-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
          crossorigin="anonymous">
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <!--ajax-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Font awesome 5 -->
    <link href="{{asset('/fontawesome/fontawesome-all.min.css')}}" type="text/css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/1ad2e98449.js" crossorigin="anonymous"></script>

</head>
<body>
<div class="container">
    <div class="row">
        <!-- ========================= HEADER ========================= -->
    @include('layouts.header')
    <!-- ========================= HEADER END // ========================= -->

        <!-- ========================= CONTENT ========================= -->
    @yield('content')
    <!-- ========================= CONTENT END // ========================= -->

        <!-- ========================= FOOTER ========================= -->
    @include('layouts.footer')
    <!-- ========================= FOOTER END // ========================= -->


    </div>
</div>
</body>
</html>

