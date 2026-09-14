<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
        <!-- Core CSS -->
    <!-- build:css assets/vendor/css/theme.css  -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" />

    <!--  Icons -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/iconify-icons.css') }}" />

   

    
</head>
<body>
    <div>
         <li class="nav-item navbar-dropdown dropdown-user dropdown">
        <a class="nav-link dropdown-toggle hide-arrow p-0" href="javascript:void(0);" data-bs-toggle="dropdown">
            <div class="avatar avatar-online">
                <img src="{{ asset('assets/img/avatars/1.png') }}" alt class="rounded-circle" />
            </div>
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
            <li>
                <a class="dropdown-item mt-0" href="#">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0 me-2">
                            <div class="avatar avatar-online">
                                <img src="{{ asset('assets/img/avatars/1.png') }}" alt class="rounded-circle" />
                            </div>
                        </div>
                        @php
                            use Illuminate\Support\Facades\Auth;
                        @endphp
                        <div class="flex-grow-1">
                            <h6 class="mb-0">{{ Auth::user()->name ?? 'Guest' }}</h6>
                        <small class="text-body-secondary">
                            {{ Auth::user()->role == 1 ? 'Admin' : 'Student' }}
                        </small>
                        </div>
                    </div>
                </a>
            </li>
            <li>
                <div class="dropdown-divider my-1 mx-n2"></div>
            </li>
            <li>
                <a class="dropdown-item" href="{{ route('dashboard') }}">
                    <i class="icon-base ti tabler-user me-3 icon-md"></i><span class="align-middle">Dashboard</span>
                </a>
            </li>
           

            <li>
                <div class="dropdown-divider my-1 mx-n2"></div>
            </li>

            <li>
                <a class="dropdown-item" href="#">
                    <i class="icon-base ti tabler-question-mark me-3 icon-md"></i><span class="align-middle">FAQ</span>
                </a>
            </li>
            <li>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <div class="d-grid px-2 pt-2 pb-1">
                        <button class="btn btn-sm btn-danger d-flex">
                            <small class="align-middle">Logout</small>
                            <i class="icon-base ti tabler-logout ms-2 icon-14px"></i>
                        </button>
                    </div>
                </form>
            </li>
        </ul>
    </li>
    </div>

        <!-- Core JS -->
    <!-- build:js assets/vendor/js/theme.js -->

    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>

    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/node-waves/node-waves.js') }}"></script>

    <script src="{{ asset('assets/vendor/libs/@algolia/autocomplete-js.js') }}"></script>

    <script src="{{ asset('assets/vendor/libs/pickr/pickr.js') }}"></script>

    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('assets/vendor/libs/hammer/hammer.js') }}"></script>

    <script src="{{ asset('assets/vendor/libs/i18n/i18n.js') }}"></script>

    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
</body>
</html>