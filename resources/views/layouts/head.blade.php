@section('head')
    <head>
        @php
            $routeName = Route::getCurrentRoute()->getName();
        @endphp
<<<<<<< HEAD
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="author" content="M_Adnan" />
        <script src="https://cdn.jsdelivr.net/npm/js-base64@2.5.2/base64.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@3.1.1/dist/chart.min.js"></script>
        <link href="https://canvasjs.com/assets/css/jquery-ui.1.11.2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
=======
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
        <meta name="author" content="M_Adnan"/>
>>>>>>> github_abdulaziz2
        <!-- Document Title -->
        <script src="https://cdn.jsdelivr.net/npm/js-base64@2.5.2/base64.min.js"></script>
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script src="https://canvasjs.com/assets/script/jquery-ui.1.11.2.min.js"></script>
        <script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
     <!--  <script src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-md5/2.18.0/js/md5.min.js" integrity="sha512-Hmp6qDy9imQmd15Ds1WQJ3uoyGCUz5myyr5ijainC1z+tP7wuXcze5ZZR3dF7+rkRALfNy7jcfgS5hH8wJ/2dQ==" crossorigin="anonymous"></script>
                      <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/core.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-md5/2.18.0/js/md5.js" integrity="sha512-NpfrQEgzOExS1Ax8fjITKrgBFK87lZbBmvWdZk4suiCC4tsHPrTCsulgIA7Z/+CeWhDpEP/f36mNWgZXDKtTAA==" crossorigin="anonymous"></script>
      //  <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/md5.js"></script>
-->
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/2.3.1/css/flag-icon.min.css" rel="stylesheet"/>
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
        <link rel="icon" href="images/favicon.ico" type="image/x-icon">
        <!-- FontsOnline -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
                crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
                integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
                integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <!-- StyleSheets -->
        <link rel="stylesheet" type="text/css" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" type="text/css" href="{{asset('css')}}/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="{{asset('css')}}/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="{{asset('css')}}/main.css">
        <link rel="stylesheet" type="text/css" href="{{asset('css')}}/style.css">
        @if($routeName === 'home')
            <script rel="stylesheet" src="{{asset('js')}}/home.js"></script>
        @endif
        @if($routeName !== 'login'&&$routeName !=='home'&&$routeName !=='contact')
            <a class="SideBarName" hidden id="userid">{{ auth()->user()->id }}</a>
            <a class="SideBarName" hidden id="username">{{ auth()->user()->first_name }}</a>
        @endif
        @if($routeName === 'editkeyword')
            <link rel="stylesheet" type="text/css" href="{{asset('css')}}/editkeyword.css">
            <script rel="stylesheet" src="{{asset('js')}}/editkeyword.js"></script>
        @endif
        @if($routeName === 'grafik')
            <link rel="stylesheet" type="text/css" href="{{asset('css')}}/grafik.css">
            <script rel="stylesheet" src="{{asset('js')}}/grafik.js"></script>
        @endif
        @if($routeName === 'dashboard' ||$routeName === 'dashboard' ||$routeName === '/update' ||$routeName === '/edit' ||$routeName === '/delete/' ||$routeName === 'store' )
            <link rel="stylesheet"type="text/css" href="{{asset('css')}}/grafik.css">
            <script rel="stylesheet" src="{{asset('js')}}/dashboard.js"></script>
        @endif
        @if($routeName === 'profile')
            <link rel="stylesheet" type="text/css" href="{{asset('css')}}/Panel.css">
            <link rel="stylesheet" type="text/css" href="{{asset('css')}}/profile.css">
            <script rel="stylesheet" src="{{asset('js')}}/profile.js"></script>
            <script rel="stylesheet" src="{{asset('js')}}/sidebar.js"></script>
        @endif
        @if($routeName === 'websitelist')
            <link rel="stylesheet" type="text/css" href="{{asset('css')}}/websitelist.css">
            <script rel="stylesheet" src="{{asset('js')}}/websitelist.js"></script>
            <script rel="stylesheet" src="{{asset('js')}}/sidebar.js"></script>
        @endif
        @if($routeName === 'panel')
            <script rel="stylesheet" src="{{asset('js')}}/panel.js"></script>
            <link rel="stylesheet" type="text/css" href="{{asset('css')}}/Panel.css">
            <script rel="stylesheet" src="{{asset('js')}}/sidebar.js"></script>
        @endif    @if($routeName === 'addwebsite')
            <script rel="stylesheet" src="{{asset('js')}}/panel.js"></script>
            <link rel="stylesheet" type="text/css" href="{{asset('css')}}/Panel.css">
            <script rel="stylesheet" src="{{asset('js')}}/sidebar.js"></script>
        @endif
        @if($routeName === 'packets')
            <script rel="stylesheet" src="{{asset('js')}}/packets.js"></script>
            <link rel="stylesheet" type="text/css" href="{{asset('css')}}/packets.css">

        @endif    @if($routeName === 'packets_post')
            <script rel="stylesheet" src="{{asset('js')}}/packet_post.js"></script>
            <link rel="stylesheet" type="text/css" href="{{asset('css')}}/packets.css">

        @endif
        @if($routeName === 'contact' || $routeName === 'contact.post')
            <link rel="stylesheet" type="text/css" href="{{asset('css')}}/contact.css">
        @endif
        @if( $routeName === 'findorder' ||$routeName ==='findpost')
            <script rel="stylesheet" src="{{asset('js')}}/findorder.js"></script>
            <link rel="stylesheet" type="text/css" href="{{asset('css')}}/findorder.css">
<<<<<<< HEAD

=======
            <script src="https://mojoaxel.github.io/bootstrap-select-country/dist/js/bootstrap-select-country.min.js"></script>
            <link rel="stylesheet" href="https://mojoaxel.github.io/bootstrap-select-country/dist/css/bootstrap-select-country.min.css"/>
>>>>>>> github_abdulaziz2
            <script rel="stylesheet" src="{{asset('js')}}/sidebar.js"></script>
        @endif
        <script rel="stylesheet" src="{{asset('js')}}/login.js"></script>
        @if($routeName === 'settings' || $routeName === 'store.settings' )
            <link rel="stylesheet" type="text/css" href="{{asset('css')}}/settings.css">
            <script rel="stylesheet" src="{{asset('js')}}/sidebar.js"></script>
            <script rel="stylesheet" src="{{asset('js')}}/settings.js"></script>
            <link rel="stylesheet" type="text/css" href="{{asset('rs-plugin')}}/css/settings.css" media="screen"/>
        @endif
        @if($routeName === 'login')
            <link rel="stylesheet" type="text/css" href="{{asset('css')}}/login.css">
        @endif
        <link rel="stylesheet" type="text/css" href="{{asset('css')}}/responsive.css">
        <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
        <!-- JavaScripts -->
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- Favicon -->
        <!-- FontsOnline -->
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Alegreya+Sans:400,500,700,800,900,300,100' rel='stylesheet' type='text/css'>
        <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
        <link rel="stylesheet" type="text/css" href="{{asset('rs-plugin')}}/css/settings.css" media="screen"/>
        <!-- JavaScripts -->
    </head>
@endsection
