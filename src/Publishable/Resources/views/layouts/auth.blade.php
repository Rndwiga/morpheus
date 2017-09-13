
<!DOCTYPE html>
<html>
<head>

    <!-- Title -->
    <title>{{ config('app.name') }} | a product of {{ config('app.company') }}</title>

    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta charset="UTF-8">
    <meta name="description" content="{{ config('app.name') }}" />
    <meta name="keywords" content="{{ config('app.name') }}" />
    <meta name="author" content="{{ config('app.company') }}" />

    <!-- Styles -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
    <link href="{{asset(config('tyondo_sms.assets').'admin/assets/plugins/pace-master/themes/blue/pace-theme-flash.css')}}" rel="stylesheet"/>
    <link href="{{asset(config('tyondo_sms.assets').'admin/assets/plugins/uniform/css/uniform.default.min.css')}}" rel="stylesheet"/>
    <link href="{{asset(config('tyondo_sms.assets').'admin/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset(config('tyondo_sms.assets').'admin/assets/plugins/fontawesome/css/font-awesome.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset(config('tyondo_sms.assets').'admin/assets/plugins/line-icons/simple-line-icons.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset(config('tyondo_sms.assets').'admin/assets/plugins/offcanvasmenueffects/css/menu_cornerbox.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset(config('tyondo_sms.assets').'admin/assets/plugins/waves/waves.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset(config('tyondo_sms.assets').'admin/assets/plugins/switchery/switchery.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset(config('tyondo_sms.assets').'admin/assets/plugins/3d-bold-navigation/css/style.css')}}" rel="stylesheet" type="text/css"/>

    <!-- Theme Styles -->
    <link href="{{asset(config('tyondo_sms.assets').'admin/assets/css/modern.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset(config('tyondo_sms.assets').'admin/assets/css/themes/green.css')}}" class="theme-color" rel="stylesheet" type="text/css"/>
    <link href="{{asset(config('tyondo_sms.assets').'admin/assets/css/custom.css')}}" rel="stylesheet" type="text/css"/>

    <script src="{{asset(config('tyondo_sms.assets').'admin/assets/plugins/3d-bold-navigation/js/modernizr.js')}}"></script>
    <script src="{{asset(config('tyondo_sms.assets').'assets/plugins/offcanvasmenueffects/js/snap.svg-min.js')}}"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="page-register">
<!-- Page Content -->
@yield('content')
<!-- Page Content -->


<!-- Javascripts -->
<script src="{{asset(config('tyondo_sms.assets').'admin/assets/plugins/jquery/jquery-2.1.4.min.js')}}"></script>
<script src="{{asset(config('tyondo_sms.assets').'admin/assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset(config('tyondo_sms.assets').'admin/assets/plugins/pace-master/pace.min.js')}}"></script>
<script src="{{asset(config('tyondo_sms.assets').'admin/assets/plugins/jquery-blockui/jquery.blockui.js')}}"></script>
<script src="{{asset(config('tyondo_sms.assets').'admin/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset(config('tyondo_sms.assets').'admin/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset(config('tyondo_sms.assets').'admin/assets/plugins/switchery/switchery.min.js')}}"></script>
<script src="{{asset(config('tyondo_sms.assets').'admin/assets/plugins/uniform/jquery.uniform.min.js')}}"></script>
<script src="{{asset(config('tyondo_sms.assets').'admin/assets/plugins/offcanvasmenueffects/js/classie.js')}}"></script>
<script src="{{asset(config('tyondo_sms.assets').'admin/assets/plugins/waves/waves.min.js')}}"></script>
<script src="{{asset(config('tyondo_sms.assets').'admin/assets/js/modern.min.js')}}"></script>

</body>
</html>