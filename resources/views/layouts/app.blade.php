<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" id="custom-scroll">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="ScreenOrientation" content="autoRotate:disabled">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::to('img/company/logo-favicon.png') }}">

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('/fontawesome/css/fonts-bunny.css') }}"> --}}
    {{-- <link rel='stylesheet' href="{{ asset('/css/boxicons.min.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('/fontawesome/boxicons/css/animation.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('/fontawesome/boxicons/css/boxicons.css') }}">
    <link rel="stylesheet" href="{{ asset('/fontawesome/boxicons/css/boxicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/fontawesome/boxicons/css/transformations.css') }}">




    {{-- Start Include dashboard css  Kier Aguilar 12/13/2022 --}}
    <link rel="stylesheet" href="{{ asset('/css/dashboard/loading.css') }}">


    <link rel="stylesheet" href="{{ asset('/fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/css/toastr.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/css/main.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap-cust.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/css/report/logbook.css') }}" type="text/css">

    {{-- Start Include Procedure Management css  Renedel Malay 1/18/2023 --}}
    <link rel="stylesheet" href="{{ asset('/css/setup/procedure-management/procedure-management.css') }}"
        type="text/css">
    {{-- Start Include User Authorization css  Renedel Malay 1/18/2023 --}}
    <link rel="stylesheet" href="{{ asset('/css/setup/user-authorization/user-authorization.css') }}" type="text/css">
    {{-- Start Include New Case Modal css  Renedel Malay 1/18/2023 --}}
    <link rel="stylesheet" href="{{ asset('/css/outpatient/new-case.css') }}" type="text/css">
    {{-- Start Include Group Authorization css  Renedel Malay 1/19/2023 --}}
    <link rel="stylesheet" href="{{ asset('/css/setup/group-authorization/group-authorization.css') }}"
        type="text/css">
    {{-- Start Include Group Management css  Renedel Malay 1/19/2023 --}}
    <link rel="stylesheet" href="{{ asset('/css/setup/group-management/group-management.css') }}" type="text/css">
    {{-- Start Include User Management css  Renedel Malay 1/19/2023 --}}
    <link rel="stylesheet" href="{{ asset('/css/setup/user-management/user-management.css') }}" type="text/css">
    {{-- Start Include User Management css  Renedel Malay 1/19/2023 --}}
    <link rel="stylesheet" href="{{ asset('/css/outpatient/medical-information.css') }}" type="text/css">

    {{-- Start Include responsive css Renedel Malay 1/9/2023 --}}
    <link rel="stylesheet" href="{{ asset('/css/responsive.css') }}" type="text/css">

    @livewireStyles


    @livewireScripts
    {{-- <script src="{{ asset('/js/popper.min.js') }}"></script> --}}



    <script src="{{ asset('/js/jquery-3.6.1.js') }}"></script>
    <script src="{{ asset('/js/theme.js') }}"></script>
    <script src="{{ asset('/js/moment.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/js/toastr_jquery.min.js') }}"></script>
    <script src="{{ asset('/js/toastr.min.js') }}"></script>

    <script src="{{ asset('/js/webcam.js') }}"></script>
    <script src="{{ asset('/js/webcam.min.js') }}"></script>




    {{-- Added by KLA START --}}
    <script src="{{ asset('/js/chart/Chart.min.js') }}"></script>
    <script src="{{ asset('/js/chart/chart-area-demo.js') }}"></script>
    <script src="{{ asset('/js/plugins/sweetalert.js') }}"></script> {{-- sweet alert KLA-12/14/2022 --}}

    <script>
        window.addEventListener('alert', event => {
            toastr[event.detail.type](event.detail.message,
                event.detail.title ?? ''), toastr.options = {
                "closeButton": true,
                "progressBar": true,
            }
        });
    </script>

    {{-- Added by KLA END --}}


    {{-- <script src="{{ asset('/js/datetimepicker.js') }}"></script> --}}
    <script src="{{ asset('/js/main.js') }}"></script>
    <script src="{{ asset('/js/report.js') }}"></script>

    {{-- Added by CPN START --}}
    <script src="{{ asset('/js/utilities/address.js') }}"></script>
    <script src="{{ asset('/js/passwordShowHide.js') }}"></script>
    <script src="{{ asset('/js/loginValidator.js') }}"></script>
    <script src="{{ asset('/js/registerValidator.js') }}"></script>
    <script src="{{ asset('/js/registrationView.js') }}"></script>
    <script src="{{ asset('/js/outpatientView.js') }}"></script>
    <script src="{{ asset('/js/passValidation.js') }}"></script>
    <script src="{{ asset('/js/addNewPatient.js') }}"></script>
    <script src="{{ asset('/js/dashboard.js') }}"></script>
    <script src="{{ asset('/js/newCase.js') }}"></script>
    <script src="{{ asset('/js/inpatient/inpatientView.js') }}"></script>
    <script src="{{ asset('/js/backgroundInfo.js') }} "></script>
    <script  src="{{ asset('/js/updatePatientInfo.js') }} " type="module"></script>
    <script  src="{{ asset('/js/user-group-authorizations/userGroupAuthorization.js') }} " type="module"></script>
    {{-- Added by CPN END --}}

    {{-- Added by RGM START --}}

    <script src="{{ asset('/js/addContactAndEmail.js') }} "></script>
    <script src="{{ asset('/js/addHMO.js') }} "></script>
    <script src="{{ asset('/js/modal.js') }} "></script>
    <script src="{{ asset('/js/dropDownCust.js') }} "></script>
    <script src="{{ asset('/js/caseInformation.js') }} "></script>
    <script src="{{ asset('/js/userManagement.js') }} "></script>
    <script src="{{ asset('/js/procedureManagement.js') }} "></script>
    <script src="{{ asset('/js/setup/userAuthorizationView.js') }} "></script>
    <script src="{{ asset('/js/item-management/itemManagement.js') }} "></script>
    
    {{-- Added by RGM END --}}

    {{-- ADDED by MDC START --}}
    <script src="{{ asset('js/print.js') }}"></script>
    {{-- ADDED by MDC END --}}



    {{-- @guest
    <script src="{{ asset('/js/scripts.js') }}"></script>
    <script src="{{ asset('/js/jquery.backstretch.js') }}"></script>
    <script src="{{ asset('/js/jquery.backstretch.min.js') }}"></script>
    @endguest --}}


    <!--<title> Drop Down Sidebar Menu | CodingLab </title>-->
    {{-- <link rel="stylesheet" href="dropdown-scroll.css"> --}}
    <!-- Boxiocns CDN Link -->

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    {!! Toastr::message() !!}
    @guest
        <div id="app" class="login-background">
            <!--This blades are for guests-->
            <main class="d-flex  align-middle">
                @yield('content')
            </main>
        </div>
    @else
        <div id="app">
            <div class="wrapper">
                <!-- Sidebar -->
                <x-sidebar />
                <section class="home-section">
                    <div class="home-content">
                        <div class="row w-100 pt-2">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="header-icon">
                                        <i class="fa-solid fa-caret-left" id="burger-menu"></i>
                                        {{-- <i class='bx bx-menu'></i> --}}
                                        {{-- <i class="fa-solid fa-chevron-right"></i> --}}
                                    </div>
                                    <div class="col mt-2">
                                        <div class="row company-name-row my-0 py-0">
                                            <span class="company-name">{{ config('app.company') }}</span>
                                        </div>
                                        <div class="row header-tab-row my-0 py-0">
                                            <span id="headTitle" class="text header-tab"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col text-end align-self-lg-center">
                                <div class="row">
                                    <div class="col align-self-center">
                                        <p class="d-inline">{{ Auth::user()->user_name }}</p>
                                    </div>
                                    <div class="col-2 col">
                                        <div class="dropdownCust">
                                            <i onclick="userProfile()"
                                                class="fa-regular fa-circle-user dropBtn user-group border-radius-25"></i>
                                            <div id="userDropdown" class="dropdown-content">
                                                <a href="">User Profile</a>
                                                <a href="">User Settings</a>
                                                <a class="dropdown-item" href="{{ route('logout') }}" id="logoutBtn"
                                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    <span>Logout</span>
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                    class="d-none">
                                                    @csrf
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                {{-- <li class="nav-item dropdown has-arrow main-drop">
                  <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                    <span class="user-img">
                    <i class="fa-regular fa-circle-user"></i>
                    <span class="status online"></span></span>
                    <span></span>
                  </a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="">My Profile</a>
                    <a class="dropdown-item" href="">Settings</a>
                    <a class="dropdown-item" href="">Logout</a>
                  </div>
                </li> --}}

                                {{-- <div class="btn-group user-group">
                    <a href="" data-bs-toggle="dropdown" onclick=""><i class="fa-regular fa-circle-user" ></i></a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" >User Profile</a></li>
                    <li><a class="dropdown-item" >User Settings</a></li>
                    <li>

                    </li>
                  </ul>
                </div> --}}
                                {{-- <div class="dropdown">
                  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
                  <span class="caret"></span></button>
                  <ul class="dropdown-menu">
                    <li><a href="#">HTML</a></li>
                    <li><a href="#">CSS</a></li>
                    <li><a href="#">JavaScript</a></li>
                  </ul>
                </div>
                <div class="logout-div d-inline">
                  <a class="d-inline" href="{{ route('logout') }}" id="logoutBtn" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      <span>Logout</span>
                      <i class='bx bx-log-out'></i>
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
                </div> --}}
                            </div>
                        </div>


                    </div>

                    {{-- just in-case there still probleme with closed navigator --}}
                    {{-- <div class="home-content shadow ">

            <span id="headTitle" class="px-5 text header-tab text-white"></span> <br />
          </div> --}}

                    <main>
                        @yield('content')
                    </main>

                </section>
            </div>
        </div>
    @endguest

    <footer class="main-footer text-center">
        <!-- Copyright -->
        <div class="text-center">
            <div class="profile_name">&#169; {{ config('app.name') }} </div>
        </div>
        <!-- Copyright -->
    </footer>

</body>

</html>
