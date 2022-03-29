<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <?php $siteTitle = getOption('siteTitle'); ?>
    <title>@yield('title') | <?= $siteTitle?$siteTitle:config('app.name', 'Laravel') ?></title>

    <meta property="og:site_name" content="{{$siteTitle}}">
    <meta property="og:url" content="{{url()->full()}}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('title')">
    <?php if ($__env->yieldContent('description')): ?>
    <meta property="og:description" content="@yield('description')">
    <?php else: ?>
    <meta property="og:description" content="{{getOption('descriptionSite')}}">
    <?php endif ?>
    <?php if ($__env->yieldContent('image')): ?>
    <meta property="og:image" content="@yield('image')">
    <?php else: ?>
    <meta property="og:image" content="{{asset('images/siteImage.png')}}">
    <?php endif ?>

    <link href="{{asset('favicon.ico')}}" type="image/x-icon" rel="shortcut icon">

    <link rel="stylesheet" href="{{asset('css/main.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/jquery.fancybox.css')}}"/>
    <link rel="stylesheet" href="<?= asset('css/style.css').'?v='.time() ?>"/>
    <link rel="stylesheet" href="<?= asset('css/media.css').'?v='.time() ?>"/>
    <link rel="stylesheet" href="<?= asset('css/print.css').'?v='.time() ?>"/>
    <link rel="stylesheet" href="<?= asset('css/add.css').'?v='.time() ?>"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/sp-view.js')}}"></script>
    <script src="{{asset('js/jquery.cookie.min.js')}}"></script>
    <script src="{{asset('js/jquery-ui.js')}}"></script>
    <script src="{{asset('js/jquery.fancybox.js')}}"></script>
    <script src="{{asset('js/owl.carousel.js')}}"></script>
    <script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('js/bootstrap-datepicker.ru.min.js')}}"></script>
    <script src="{{asset('js/script.js').'?v='.time()}}"></script>
</head>
<body>
    <!-- start #mainWrap-->
    <div id="mainWrap">
      <!-- start #header-->
      <div id="header">
        <?php echo App::make("App\Http\Controllers\HeaderController")->display(); ?>
      </div>
      <!-- end #header-->
      <!-- start #content-->
      <div id="content">
        @yield('content')
        @yield('sliderLinks')
      </div>
      <!-- end #content-->
    </div>
    <!-- end #mainWrap-->
    <!-- start #footer-->
    <div id="footer">
        <?php echo App::make("App\Http\Controllers\FooterController")->display(); ?>
    </div>
    <!-- end #footer-->
    <div id="mask"></div>
    @yield('additionalJsFiles')
    <script src="<?= asset('js/add.js').'?v='.time() ?>"></script>
  </body>
</html>
