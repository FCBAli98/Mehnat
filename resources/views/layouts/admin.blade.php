<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title') | Административная панель</title>

         <!-- Bootstrap Core CSS -->
        <link href="{{ asset('admin-assets/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="{{ asset('admin-assets/css/metisMenu.min.css') }}" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="{{ asset('admin-assets/css/startmin.css') }}" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?= asset('admin-assets/css/font-awesome.min.css') ?>" rel="stylesheet">

        <link rel="stylesheet" href="<?= asset('admin-assets/css/add.css').'?v='.time() ?>"/>
    </head>
    <body>

        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
              @if(auth()->check())
                @if(auth()->user()->name != 'dictionary' && auth()->user()->name != 'manaviyat')
                  <div class="navbar-header">
                    <a class="navbar-brand" href="/admin">ADMIN</a>
                  </div>
                @endif
              @endif

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <ul class="nav navbar-nav navbar-left navbar-top-links">
                    <li><a href="{{route('home')}}" target="_blank"><i class="fa fa-home fa-fw"></i> Website</a></li>
                </ul>

                <ul class="nav navbar-right navbar-top-links">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> {{ Auth::user()->name }} <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <!-- <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a></li>
                            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a></li>
                            <li class="divider"></li> -->
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out fa-fw"></i> Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->
                @include('admin.navBar')
            </nav>

            <div id="page-wrapper">
                @if (isset($errors))
                      @if (count($errors) > 0)
                        <br>
                        <div class="alert alert-danger">
                          <ul>
                            <?php foreach ($errors->all() as $error): ?>
                              <li>{{ $error }}</li>
                            <?php endforeach ?>
                          </ul>
                        </div>
                      @endif
                  @endif
                  @if (Session::has('success'))
                      <br>
                      <div class="alert alert-success">{{ Session::get('success') }}</div>
                  @endif
                  @if (Session::has('message'))
                      <br>
                      <div class="alert alert-info">{{ Session::get('message') }}</div>
                  @endif
                  @if (Session::has('error'))
                      <br>
                      <div class="alert alert-danger">{{ Session::get('error') }}</div>
                  @endif
                @yield('content')
            </div>

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="{{ asset('admin-assets/js/jquery.min.js') }}"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="{{ asset('admin-assets/js/bootstrap.min.js') }}"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="{{ asset('admin-assets/js/metisMenu.min.js') }}"></script>

        <script src="{{ asset('admin-assets/js/combodate.js') }}"></script>
        <script src="{{ asset('admin-assets/js/moment.min.js') }}"></script>

        <script src="{{ asset('admin-assets/tinymce/jquery.tinymce.min.js') }}"></script>
        <script src="{{ asset('admin-assets/tinymce/tinymce.min.js') }}"></script>

        <!-- Custom Theme JavaScript -->
        <script src="{{ asset('admin-assets/js/startmin.js') }}"></script>
        @yield('additionalJsFiles')
        <script src="<?= asset('admin-assets/js/add.js').'?v='.time() ?>"></script>


    </body>
</html>
