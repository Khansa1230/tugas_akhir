<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

@include('dosen.fisika.include.style')
</head>

<body>
    <div id="app">
        @include('dosen.fisika.include.sidebar')
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            
<div class="page-heading">
    <h3>Profile Statistics</h3>
</div>
            @yield('content')


            @include('dosen.fisika.include.footer')
        </div>
    </div>
    @include('dosen.fisika.include.script')
</body>

</html>
