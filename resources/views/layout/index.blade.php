<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Percobaan 1</title>
    {{-- JQuerry --}}
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    @includeIf('layout.style')
</head>

<body>
    @includeIf('layout.header')
    <div class="container-fluid">
        <div class="row">
            @includeIf('layout.sidebar')
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                @yield('content')
            </main>
        </div>
    </div>

    @includeIf('layout.script')
    @stack('js')
</body>

</html>
