<!doctype html>
<html lang="en">
<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
            crossorigin="anonymous"></script>

    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
        rel="stylesheet"
    />
    <!-- MDB -->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.0/mdb.min.css"
        rel="stylesheet"
    />

    <script
        type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.0/mdb.min.js"
    ></script>
</head>
<body>

<main>


    <header class="mb-auto">
        <div>
            <h3 class="float-md-start mb-0">Store</h3>
            <nav class="nav nav-masthead justify-content-center float-md-end">
                <a class="nav-link fw-bold text-black" aria-current="page" href="{{route('product.home')}}">Home </a>
                <div>
                    <a class="nav-link fw-bold text-black" href="{{route('product.index')}}">index </a>
                </div>
                <div>
                    @if (Route::has('login'))

                        @auth
                            <a href="{{ url('/dashboard') }}" class="nav-link fw-bold text-black">Профиль</a>

                            <a href="{{ route('order.basket') }}" class="nav-link fw-bold text-black">Открыть
                                корзину</a>

                        @else
                            <a href="{{ route('login') }}" class="nav-link fw-bold text-black">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="nav-link fw-bold text-black">Register</a>
                            @endif
                        @endauth

                    @endif
                </div>
            </nav>
        </div>
    </header>
</main>


</body>
</html>
@yield('start')
