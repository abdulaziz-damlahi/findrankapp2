@section('head')
    <head>
        @php
            $routeName = Route::getCurrentRoute()->getName();
        @endphp
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="author" content="M_Adnan" />
        <!-- Document Title -->
        <title>Infinity | SEO HTML5 Template</title>
        <!-- Favicon -->
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
        <link rel="icon" href="images/favicon.ico" type="image/x-icon">
        <!-- FontsOnline -->
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <!-- StyleSheets -->
        <link rel="stylesheet" type="text/css" href="{{asset('css')}}/packets.css">
        <link rel="stylesheet" type="text/css" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet"type="text/css" href="{{asset('css')}}/bootstrap/bootstrap.min.css">
        <link rel="stylesheet"type="text/css" href="{{asset('css')}}/font-awesome.min.css">
        <link rel="stylesheet"type="text/css" href="{{asset('css')}}/main.css">
        <link rel="stylesheet"type="text/css" href="{{asset('css')}}/style.css">
        @if($routeName === 'editkeyword')
            <link rel="stylesheet"type="text/css" href="{{asset('css')}}/editkeyword.css">
            <script rel="stylesheet" src="{{asset('js')}}/editkeyword.js"></script>
        @endif
        @if($routeName === 'profile')
            <link rel="stylesheet"type="text/css" href="{{asset('css')}}/Panel.css">
            <script rel="stylesheet" src="{{asset('js')}}/profile.js"></script>
        @endif
        @if($routeName === 'websitelist')
            <link rel="stylesheet"type="text/css" href="{{asset('css')}}/websitelist.css">
            <script rel="stylesheet" src="{{asset('js')}}/websitelist.js"></script>
        @endif
        @if($routeName === 'panel')
            <link rel="stylesheet" type="text/css" href="{{asset('css')}}/Panel.css">
            <script rel="stylesheet" src="{{asset('js')}}/panel.js"></script>
        @endif
        @if($routeName === 'packets')
            <script rel="stylesheet" src="{{asset('js')}}/packets.js"></script>
            <link rel="stylesheet" type="text/css" href="{{asset('css')}}/packets.css">
        @endif
        @if($routeName === 'contact' || $routeName === 'contact.post')
            <link rel="stylesheet" type="text/css" href="{{asset('css')}}/contact.css">
        @endif
        @if( $routeName === 'findorder' ||$routeName ==='findpost')
            <script rel="stylesheet" src="{{asset('js')}}/findorder.js"></script>
            <link rel="stylesheet" type="text/css" href="{{asset('css')}}/findorder.css">
        @endif
        <script rel="stylesheet" src="{{asset('js')}}/login.js"></script>
        @if($routeName === 'settings' || $routeName === 'store.settings' )
            <link rel="stylesheet" type="text/css" href="{{asset('css')}}/settings.css">
            <script rel="stylesheet" src="{{asset('js')}}/settings.js"></script>
            <link rel="stylesheet" type="text/css" href="{{asset('rs-plugin')}}/css/settings.css" media="screen" />
        @endif
        @if($routeName === 'login')
            <link rel="stylesheet" type="text/css" href="{{asset('css')}}/login.css">
        @endif
        <link rel="stylesheet" type="text/css" href="{{asset('css')}}/responsive.css">
        <!-- FontsOnline -->
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Alegreya+Sans:400,500,700,800,900,300,100' rel='stylesheet' type='text/css'>
        <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
        <link rel="stylesheet" type="text/css" href="{{asset('rs-plugin')}}/css/settings.css" media="screen" />
        <!-- JavaScripts -->
    </head>
@endsection
