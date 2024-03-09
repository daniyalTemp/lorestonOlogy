<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>مدیریت بنیاد ایران شناسی  - لرستان</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/favicon.png')}}">
    <link href="{{asset('vendor/jqvmap/css/jqvmap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('vendor/chartist/css/chartist.min.css')}}">
    <link href="{{asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('../../cdn.lineicons.com/2.0/LineIcons.css')}}" rel="stylesheet">
    <!-- Datatable -->
    <link href="{{asset('vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="{{asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet">


    <link rel="stylesheet" href="https://unpkg.com/@majidh1/jalalidatepicker/dist/jalalidatepicker.min.css">

    <style>
        .hide-mobile
        {
            display: none;
        }
        @media only screen and (min-width: 600px) {
            .hide-mobile
            {
                display: block;
            }
        }
    </style>
</head>

<body>

<!--*******************
Preloader start
********************-->
<div id="preloader">
    <div class="sk-three-bounce">
        <div class="sk-child sk-bounce1"></div>
        <div class="sk-child sk-bounce2"></div>
        <div class="sk-child sk-bounce3"></div>
    </div>
</div>
<!--*******************
    Preloader end
********************-->
<!--**********************************
       Main wrapper start
   ***********************************-->
<div id="main-wrapper">

    <!--**********************************
        Nav header start
    ***********************************-->
    <div class="nav-header">
        <a href="{{route('dashboard.index')}}" class="brand-logo">
            <img class="logo-abbr" src="{{asset('images/logo-white.png')}}" alt="">
            <img class="logo-compact" src="{{asset('images/logo-text.png')}}" alt="">
            <img class="brand-title" src="{{asset('images/logo-text.png')}}" alt="">
        </a>

        <div class="nav-control">
            <div class="hamburger">
                <span class="line"></span><span class="line"></span><span class="line"></span>
            </div>
        </div>
    </div>
    <!--**********************************
        Nav header end
    ***********************************-->


    <!--**********************************
        Header start
    ***********************************-->
    <div class="header">
        <div class="header-content">
            <nav class="navbar navbar-expand">
                <div class="collapse navbar-collapse justify-content-between">
                    <div class="header-left">

                    </div>

                    <ul class="navbar-nav header-right">
                        <li class="nav-item dropdown notification_dropdown">
                            <a class="nav-link bell dz-fullscreen" href="#">
                                <svg id="icon-full" viewBox="0 0 24 24" width="20" height="20" stroke="currentColor"
                                     stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                     class="css-i6dzq1">
                                    <path
                                        d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3"></path>
                                </svg>
                                <svg id="icon-minimize" width="20" height="20" viewBox="0 0 24 24" fill="none"
                                     stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-minimize">
                                    <path
                                        d="M8 3v3a2 2 0 0 1-2 2H3m18 0h-3a2 2 0 0 1-2-2V3m0 18v-3a2 2 0 0 1 2-2h3M3 16h3a2 2 0 0 1 2 2v3"></path>
                                </svg>
                            </a>
                        </li>
                        <li class="nav-item dropdown header-profile">
                            <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                <img src="{{asset('storage/images/profile/'.\Illuminate\Support\Facades\Auth::user()->image)}}" width="20" alt=""/>
                                <div class="header-info">
                                    <span>سلام, <strong>  {{\Illuminate\Support\Facades\Auth::user()->name}}  </strong></span>

                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="app-profile.html" class="dropdown-item ai-icon">
                                    <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary"
                                         width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <span class="ml-2">پروفایل </span>
                                </a>
                                <a href="{{route('logout')}}" class="dropdown-item ai-icon">
                                    <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger"
                                         width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                        <polyline points="16 17 21 12 16 7"></polyline>
                                        <line x1="21" y1="12" x2="9" y2="12"></line>
                                    </svg>
                                    <span class="ml-2">خروج </span>
                                </a>
                            </div>
                        </li>
                    </ul>

                    <ul class="navbar-nav header-right pull-left hide-mobile" style="position: fixed;">

                        <li class="nav-item  ">
                            <img width="200px" class="logo-compact pt-2" src="{{asset('images/logo-text.png')}}" alt="">

                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!--**********************************
        Header end ti-comment-alt
    ***********************************-->
    <!--**********************************
            Sidebar start
        ***********************************-->
    <div class="deznav">
        <div class="deznav-scroll">
            <ul class="metismenu" id="menu">
                <li class="nav-label first">منوی اصلی</li>
                <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                             height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5"/>
                                <path
                                    d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z"
                                    fill="#000000" opacity="0.3"/>
                            </g>
                        </svg>
                        <span class="nav-text">داشبورد</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{route('dashboard.index')}}">صفحه اصلی </a></li>

                    </ul>
                </li>
                <li class="nav-label">کاربر ها</li>
                <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                             height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24"/>
                                <path
                                    d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                    fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                <path
                                    d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                    fill="#000000" fill-rule="nonzero"/>
                            </g>
                        </svg>
                        <span class="nav-text">کاربر ها</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">کابران</a>
                            <ul aria-expanded="false">
                                <li><a href="{{route('dashboard.user.add')}}">افزودن</a></li>
                                <li><a href="{{route('dashboard.user.list')}}">لیست</a></li>
                            </ul>
                        </li>
                        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">مخاطبان</a>
                            <ul aria-expanded="false">
                                <li><a href="{{route('dashboard.contact.add')}}">افزودن</a></li>
                                <li><a href="{{route('dashboard.contact.list')}}">لیست</a></li>
                                <li><a href="{{route('dashboard.contact.listTypes')}}"> مدیریت نوع </a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="nav-label">مستندات</li>

                <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                             height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <path
                                    d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z"
                                    fill="#000000" opacity="0.3"/>
                                <path
                                    d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z"
                                    fill="#000000"/>
                                <rect fill="#000000" opacity="0.3" x="10" y="9" width="7" height="2" rx="1"/>
                                <rect fill="#000000" opacity="0.3" x="7" y="9" width="2" height="2" rx="1"/>
                                <rect fill="#000000" opacity="0.3" x="7" y="13" width="2" height="2" rx="1"/>
                                <rect fill="#000000" opacity="0.3" x="10" y="13" width="7" height="2" rx="1"/>
                                <rect fill="#000000" opacity="0.3" x="7" y="17" width="2" height="2" rx="1"/>
                                <rect fill="#000000" opacity="0.3" x="10" y="17" width="7" height="2" rx="1"/>
                            </g>
                        </svg>
                        <span class="nav-text">سند ها</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">مقالات</a>
                            <ul aria-expanded="false">
                                <li><a href="{{route('dashboard.paper.add')}}">افزودن</a></li>
                                <li><a href="{{route('dashboard.paper.list')}}">لیست</a></li>
                            </ul>
                        </li>

                        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">کتاب ها</a>
                            <ul aria-expanded="false">
                                <li><a href="{{route('dashboard.book.add')}}">افزودن</a></li>
                                <li><a href="{{route('dashboard.book.list')}}">لیست</a></li>
                            </ul>
                        </li>
                        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">اسناد</a>
                            <ul aria-expanded="false">
                                <li><a href="{{route('dashboard.document.add')}}">افزودن</a></li>
                                <li><a href="{{route('dashboard.document.list')}}">لیست</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
 <li class="nav-label">آثار باستانی</li>

                <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <path d="M13.5,21 L13.5,18 C13.5,17.4477153 13.0522847,17 12.5,17 L11.5,17 C10.9477153,17 10.5,17.4477153 10.5,18 L10.5,21 L5,21 L5,4 C5,2.8954305 5.8954305,2 7,2 L17,2 C18.1045695,2 19,2.8954305 19,4 L19,21 L13.5,21 Z M9,4 C8.44771525,4 8,4.44771525 8,5 L8,6 C8,6.55228475 8.44771525,7 9,7 L10,7 C10.5522847,7 11,6.55228475 11,6 L11,5 C11,4.44771525 10.5522847,4 10,4 L9,4 Z M14,4 C13.4477153,4 13,4.44771525 13,5 L13,6 C13,6.55228475 13.4477153,7 14,7 L15,7 C15.5522847,7 16,6.55228475 16,6 L16,5 C16,4.44771525 15.5522847,4 15,4 L14,4 Z M9,8 C8.44771525,8 8,8.44771525 8,9 L8,10 C8,10.5522847 8.44771525,11 9,11 L10,11 C10.5522847,11 11,10.5522847 11,10 L11,9 C11,8.44771525 10.5522847,8 10,8 L9,8 Z M9,12 C8.44771525,12 8,12.4477153 8,13 L8,14 C8,14.5522847 8.44771525,15 9,15 L10,15 C10.5522847,15 11,14.5522847 11,14 L11,13 C11,12.4477153 10.5522847,12 10,12 L9,12 Z M14,12 C13.4477153,12 13,12.4477153 13,13 L13,14 C13,14.5522847 13.4477153,15 14,15 L15,15 C15.5522847,15 16,14.5522847 16,14 L16,13 C16,12.4477153 15.5522847,12 15,12 L14,12 Z" fill="#000000"/>
                                <rect fill="#FFFFFF" x="13" y="8" width="3" height="3" rx="1"/>
                                <path d="M4,21 L20,21 C20.5522847,21 21,21.4477153 21,22 L21,22.4 C21,22.7313708 20.7313708,23 20.4,23 L3.6,23 C3.26862915,23 3,22.7313708 3,22.4 L3,22 C3,21.4477153 3.44771525,21 4,21 Z" fill="#000000" opacity="0.3"/>
                            </g>
                        </svg>
                        <span class="nav-text">آثار باستانی</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">آثار باستانی</a>
                            <ul aria-expanded="false">
                                <li><a href="{{route('dashboard.antiquities.add')}}">افزودن</a></li>
                                <li><a href="{{route('dashboard.antiquities.list')}}">لیست</a></li>
                            </ul>
                        </li>

                        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">  نوع آثار باستانی</a>
                            <ul aria-expanded="false">
                                <li><a href="{{route('dashboard.antiquities.types.add')}}">افزودن</a></li>
                                <li><a href="{{route('dashboard.antiquities.types.list')}}">لیست</a></li>
                            </ul>
                        </li>


                    </ul>
                </li>

            </ul>
        </div>


    </div>
    <!--**********************************
        Sidebar end
    ***********************************-->
    <!--**********************************
         Content body start
     ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>
    <!--**********************************
        Content body end
    ***********************************-->

    <!--**********************************
            Footer start
        ***********************************-->
    <div class="footer">
        <div class="copyright">
            <p>کپی رایت © طراحی و توسعه  توسط <a href="https://www.daniyalroomiyani.ir"
                                                     target="_blank"> دانیال رومیانی </a> 1402 </p>
        </div>
    </div>
    <!--**********************************
        Footer end
    ***********************************-->

    <!--**********************************
       Support ticket button start
    ***********************************-->

    <!--**********************************
       Support ticket button end
    ***********************************-->


</div>
<!--**********************************
    Main wrapper end
***********************************-->

<!--**********************************
    Scripts
***********************************-->
<!-- Required vendors -->




<script src="{{asset('vendor/global/global.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('vendor/chart.js/Chart.bundle.min.js')}}"></script>
<script src="{{asset('js/custom.min.js')}}"></script>
<!-- Apex Chart -->
<script src="{{asset('vendor/apexchart/apexchart.js')}}"></script>

<!-- Vectormap -->
<!-- Chart piety plugin files -->
<script src="{{asset('vendor/peity/jquery.peity.min.js')}}"></script>

<!-- Chartist -->
<script src="{{asset('vendor/chartist/js/chartist.min.js')}}"></script>



<!-- Datatable -->
<script src="{{asset('vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/plugins-init/datatables.init.js')}}"></script>



<!-- Dashboard 1 -->
<script src="{{asset('js/dashboard/dashboard-2.js')}}"></script>
<!-- Svganimation scripts -->
<script src="{{asset('vendor/svganimation/vivus.min.js')}}"></script>
<script src="{{assert('vendor/svganimation/svg.animation.js')}}"></script>

<script type="text/javascript" src="https://unpkg.com/@majidh1/jalalidatepicker/dist/jalalidatepicker.min.js"></script>
<script>
    jalaliDatepicker.startWatch();
</script>
</body>

</html>
