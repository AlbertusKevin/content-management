<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Content Manager</title>
    <link rel="stylesheet" href="{{ url('/css/sidebar.css') }}">
    <link rel="stylesheet" href="{{ url('/css/app.css') }}">
    @stack('style')
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    {{-- @include('sweetalert::alert') --}}
    <div class="sidebar close">
        <div class="logo-details">
            <i class='bx bxs-briefcase-alt-2'></i>
            <span class="logo_name">Content Manager</span>
        </div>
        <hr class="separator">
        <ul class="nav-links">
            @include('partial.menu')
        </ul>
    </div>
    <section class="home-section">
        <div class="home-content">
            <i class='bx bx-menu'></i>
            <div class="d-flex flex-column justify-content-center">
                <span class="text">Content Manager</span>
            </div>
        </div>
        <div class="container">
            @include('partial.breadcrumb')
            @yield('content')
        </div>
    </section>
    <script src="{{ url('/js/sidebar.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    @stack('script')
</body>

</html>
