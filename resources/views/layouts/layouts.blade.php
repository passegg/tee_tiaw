<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap demo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container-fluid">
            <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom d-flex justify-content-between">
            <a href="/" class="d-flex justify-content-center align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                <use xlink:href="#bootstrap"></use>
                </svg>
                <span class="fs-3 text-bold">Tee Tiaw</span>
            </a>
            {{-- <button class="btn btn-md  d-sm-none d-md-none d-xs-block d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon d-flex justify-content-center align-items-center" >
                    <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" fill="currentColor" class="bi bi-list " viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
                    </svg>
                </span>
            </button> --}}
            <ul class="nav nav-pills d-sm-flex" id="navbarNav">
                <li class="nav-item"><a href="{{ route('home') }}" class="nav-link active" aria-current="page">Home</a></li>
                <li class="nav-item"><a href="{{ route('admin.login') }}" class="nav-link">login admin</a></li> {{--ลบตอนใช้จริงเพื่อนำทางให้ง่ายขึ้น--}}
                <li class="nav-item"><a href="{{ route('admin.register') }}" class="nav-link">register admin</a></li> {{--ลบตอนใช้จริงเพื่อนำทางให้ง่ายขึ้น--}}
            </ul>
            </header>
        </div>

        @yield('content')

        <footer>
            <div class="">
                <footer class="d-flex flex-wrap justify-content-center align-items-center py-3 my-4 border-top">
                    <div class="col-md-4 d-flex align-items-center">
                        <a href="/" class="mb-3 me-2 mb-md-0 text-body-secondary text-decoration-none lh-1" aria-label="Bootstrap">
                            <svg class="bi" width="30" height="24" aria-hidden="true">
                                <use xlink:href="#bootstrap"></use>
                            </svg>
                        </a>
                        <span class="mb-3 mb-md-0 text-body-secondary d-flex align-items-center justify-content-center">© 2025 Panupong, Inc</span>
                        <a href="https://github.com/passegg" class="ps-3 d-flex align-items-center justify-content-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16" style="color:black;">
                                    <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27s1.36.09 2 .27c1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.01 8.01 0 0 0 16 8c0-4.42-3.58-8-8-8"/>
                                </svg>
                        </a>
                    </div>
                </footer>
            </div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    </body>
</html>