<header id="header" class="fixed-top header-transparent">
    <div class="container d-flex align-items-center">

        <div class="logo mr-auto">

            <a href="/"><img src="{{ asset('assets/asset/Untitled-4-01.png') }}" alt="" class="img-fluid"></a>

            <h1 class="text-light"><a href="/"><span>Event</span></a></h1>

        </div>

        <nav class="nav-menu d-none d-lg-block">

            <ul>

                <li class="active"><a href="/">Beranda</a></li>

                {{-- Ini buat login --}}
                {{-- @guest
                <li clas><a href="{{route('login')}}">Login</a></li>
                @endguest --}}

                @auth

                    <li>
                        {{-- <div class="dropdown">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Settings</i>
                            </a> --}}

                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item text-dark" href="/profile"><i
                                            class="icofont-business-man-alt-2 icofont-2x"></i> Profile</a></li>
                                <li><a class="dropdown-item text-dark" href="/home"><i
                                            class="icofont-dashboard icofont-2x"></i> Dashboard</a></li>
                                <hr>
                                <li><a class="dropdown-item text-dark" href="/logout"><i
                                            class="icofont-logout icofont-2x"></i> Logout</a></li>
                            </ul>
                        </div>
                    </li>

                @else

                    {{-- <li><a href="/login">Login Admin</a></li> --}}

                @endauth

            </ul>

        </nav>

    </div>
</header>
