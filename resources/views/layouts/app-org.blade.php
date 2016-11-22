<!DOCTYPE html>
<html>

<!-- Mirrored from steelcoders.com/modern/admin2/inbox.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 22 Nov 2016 07:03:28 GMT -->
<head>

        <!-- Title -->
        <title>{{ config('app.name') }}</title>

        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta charset="UTF-8">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />

        <!-- Styles -->
        <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
        <link href="{{ asset('assets/plugins/pace-master/themes/blue/pace-theme-flash.css') }}" rel="stylesheet"/>
        <link href="{{ asset('assets/plugins/uniform/css/uniform.default.min.css') }}" rel="stylesheet"/>
        <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/plugins/fontawesome/css/font-awesome.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/plugins/line-icons/simple-line-icons.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/plugins/waves/waves.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/plugins/switchery/switchery.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/plugins/3d-bold-navigation/css/style.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/plugins/slidepushmenus/css/component.css') }}" rel="stylesheet" type="text/css"/>

        <!-- Theme Styles -->
        <link href="{{ asset('assets/css/modern.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" type="text/css"/>

        <script src="{{ asset('assets/plugins/3d-bold-navigation/js/modernizr.js') }}"></script>


        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <body class="page-header-fixed compact-menu page-horizontal-bar">
        <div class="overlay"></div>
        <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" id="cbp-spmenu-s1">
            <h3><span class="pull-left">Chat</span><a href="javascript:void(0);" class="pull-right" id="closeRight"><i class="fa fa-times"></i></a></h3>
            <div class="slimscroll">
                <a href="javascript:void(0);" class="showRight2"><img src="{{ asset('assets/images/avatar2.png') }}" alt=""><span>Sandra smith<small>Hi! How're you?</small></span></a>
                <a href="javascript:void(0);" class="showRight2"><img src="{{ asset('assets/images/avatar3.png') }}" alt=""><span>Amily Lee<small>Hi! How're you?</small></span></a>
                <a href="javascript:void(0);" class="showRight2"><img src="{{ asset('assets/images/avatar4.png') }}" alt=""><span>Christopher Palmer<small>Hi! How're you?</small></span></a>
                <a href="javascript:void(0);" class="showRight2"><img src="{{ asset('assets/images/avatar5.png') }}" alt=""><span>Nick Doe<small>Hi! How're you?</small></span></a>
                <a href="javascript:void(0);" class="showRight2"><img src="{{ asset('assets/images/avatar2.png') }}" alt=""><span>Sandra smith<small>Hi! How're you?</small></span></a>
                <a href="javascript:void(0);" class="showRight2"><img src="{{ asset('assets/images/avatar3.png') }}" alt=""><span>Amily Lee<small>Hi! How're you?</small></span></a>
                <a href="javascript:void(0);" class="showRight2"><img src="{{ asset('assets/images/avatar4.png') }}" alt=""><span>Christopher Palmer<small>Hi! How're you?</small></span></a>
                <a href="javascript:void(0);" class="showRight2"><img src="{{ asset('assets/images/avatar5.png') }}" alt=""><span>Nick Doe<small>Hi! How're you?</small></span></a>
            </div>
		</nav>
        <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" id="cbp-spmenu-s2">
            <h3><span class="pull-left">Sandra Smith</span> <a href="javascript:void(0);" class="pull-right" id="closeRight2"><i class="fa fa-angle-right"></i></a></h3>
            <div class="slimscroll chat">
                <div class="chat-item chat-item-left">
                    <div class="chat-image">
                        <img src="{{ asset('assets/images/avatar2.png') }}" alt="">
                    </div>
                    <div class="chat-message">
                        Hi There!
                    </div>
                </div>
                <div class="chat-item chat-item-right">
                    <div class="chat-message">
                        Hi! How are you?
                    </div>
                </div>
                <div class="chat-item chat-item-left">
                    <div class="chat-image">
                        <img src="{{ asset('assets/images/avatar2.png') }}" alt="">
                    </div>
                    <div class="chat-message">
                        Fine! do you like my project?
                    </div>
                </div>
                <div class="chat-item chat-item-right">
                    <div class="chat-message">
                        Yes, It's clean and creative, good job!
                    </div>
                </div>
                <div class="chat-item chat-item-left">
                    <div class="chat-image">
                        <img src="{{ asset('assets/images/avatar2.png') }}" alt="">
                    </div>
                    <div class="chat-message">
                        Thanks, I tried!
                    </div>
                </div>
                <div class="chat-item chat-item-right">
                    <div class="chat-message">
                        Good luck with your sales!
                    </div>
                </div>
            </div>
            <div class="chat-write">
                <form class="form-horizontal" action="javascript:void(0);">
                    <input type="text" class="form-control" placeholder="Say something">
                </form>
            </div>
		</nav>
        <form class="search-form" action="#" method="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control search-input" placeholder="Search...">
                <span class="input-group-btn">
                    <button class="btn btn-default close-search waves-effect waves-button waves-classic" type="button"><i class="fa fa-times"></i></button>
                </span>
            </div><!-- Input Group -->
        </form><!-- Search Form -->
        <main class="page-content content-wrap">
            <div class="navbar">
                <div class="navbar-inner container">
                    <div class="sidebar-pusher">
                        <a href="javascript:void(0);" class="waves-effect waves-button waves-classic push-sidebar">
                            <i class="fa fa-bars"></i>
                        </a>
                    </div>
                    <div class="logo-box">
                        <a href="{{ url('/') }}" class="logo-text"><span>{{ config('app.name', 'Laravel') }}</span></a>
                    </div><!-- Logo Box -->
                    <div class="search-button">
                        <a href="javascript:void(0);" class="waves-effect waves-button waves-classic show-search"><i class="fa fa-search"></i></a>
                    </div>
                    <div class="topmenu-outer">
                        <div class="top-menu">
                            <ul class="nav navbar-nav navbar-left">
                                <li>
                                    <a href="javascript:void(0);" class="waves-effect waves-button waves-classic toggle-fullscreen"><i class="fa fa-expand"></i></a>
                                </li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <a href="javascript:void(0);" class="waves-effect waves-button waves-classic show-search"><i class="fa fa-search"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown">
                                        <span class="user-name"> {{ isset(Auth::user()->name) }}<i class="fa fa-angle-down"></i></span>
                                        <img class="img-circle avatar" src="{{ asset('assets/images/avatar1.png') }}" width="40" height="40" alt="">
                                    </a>
                                    <ul class="dropdown-menu dropdown-list" role="menu">
                                        <li role="presentation"><a href="profile.html"><i class="fa fa-user"></i>Profile</a></li>
                                        <li role="presentation"><a href="calendar.html"><i class="fa fa-calendar"></i>Calendar</a></li>
                                        <li role="presentation"><a href="inbox.html"><i class="fa fa-envelope"></i>Inbox<span class="badge badge-success pull-right">4</span></a></li>
                                        <li role="presentation" class="divider"></li>
                                        <li role="presentation"><a href="lock-screen.html"><i class="fa fa-lock"></i>Lock screen</a></li>
                                        <li role="presentation">
                                              <a href="{{ url('/logout') }}"
                                                  onclick="event.preventDefault();
                                                           document.getElementById('logout-form').submit();">
                                                  <i class="fa fa-sign-out m-r-xs"></i>Logout
                                              </a>
                                              <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                                  {{ csrf_field() }}
                                              </form>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="waves-effect waves-button waves-classic" id="showRight">
                                        <i class="fa fa-comments"></i>
                                    </a>
                                </li>
                            </ul><!-- Nav -->
                        </div><!-- Top Menu -->
                    </div>
                </div>
            </div><!-- Navbar -->
            <div class="page-sidebar sidebar horizontal-bar">
                <div class="page-sidebar-inner">
                    <ul class="menu accordion-menu">
                        <li class="nav-heading"><span>Navigation</span></li>
                        <li><a href="index-2.html"><span class="menu-icon icon-speedometer"></span><p>Dashboard</p></a></li>
                        <li><a href="#"><span class="menu-icon icon-user"></span><p>Profile</p></a></li>
                    </ul>
                </div><!-- Page Sidebar Inner -->
            </div>
            <!-- Page Sidebar -->
            <div class="page-inner">
                <div id="main-wrapper" class="container">
                    <div class="row m-t-md">
                        <div class="col-md-12">
                            <div class="row mailbox-header">
                                <div class="col-md-2">
                                    <a href="compose.html" class="btn btn-success btn-block">Compose</a>
                                </div>
                                <div class="col-md-6">
                                    <h2>Inbox</h2>
                                </div>
                                <div class="col-md-4">
                                    <form action="#" method="GET">
                                        <div class="input-group">
                                            <input type="text" name="search" class="form-control input-search" placeholder="Search...">
                                            <span class="input-group-btn">
                                                <button class="btn btn-success" type="button"><i class="fa fa-search"></i></button>
                                            </span>
                                        </div><!-- Input Group -->
                                    </form>
                               </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <ul class="list-unstyled mailbox-nav">
                                <li class="active"><a href="{{ url('Emails') }}"><i class="fa fa-inbox"></i>Inbox <span class="badge badge-success pull-right">4</span></a></li>
                                <li><a href="{{ url('Emails') }}"><i class="fa fa-sign-out"></i>Sent</a></li>
                                <li><a href="{{ url('Emails') }}"><i class="fa fa-file-text-o"></i>Draft</a></li>
                                <li><a href="{{ url('Emails') }}"><i class="fa fa-exclamation-circle"></i>Spam</a></li>
                                <li><a href="{{ url('Emails') }}"><i class="fa fa-trash"></i>Trash</a></li>
                            </ul>
                        </div>

                        @yield('content')

                    </div><!-- Row -->
                </div><!-- Main Wrapper -->
                <div class="page-footer">
                    <div class="container">
                        <p class="no-s">{{date('Y')}} &copy; Email App by Tyondo Enterprise.</p>
                    </div>
                </div>
            </div><!-- Page Inner -->
        </main><!-- Page Content -->

        <div class="cd-overlay"></div>
        <!-- Javascripts -->
        <script src="{{ asset('assets/plugins/jquery/jquery-2.1.4.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/pace-master/pace.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/jquery-blockui/jquery.blockui.js') }}"></script>
        <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/switchery/switchery.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/uniform/jquery.uniform.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/classie/classie.js') }}"></script>
        <script src="{{ asset('assets/plugins/waves/waves.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/3d-bold-navigation/js/main.js') }}"></script>
        <script src="{{ asset('assets/js/modern.min.js') }}"></script>
      <!--  <script src="assets/js/pages/inbox.js"></script> -->


    </body>

<!-- Mirrored from steelcoders.com/modern/admin2/inbox.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 22 Nov 2016 07:03:29 GMT -->
</html>
