@extends('layouts.app')

@section('title', $model->title)

@section('content')
<div class="whiteSection">
  <div class="mainContainer">
    <div class="contentBlock firstContent">
      <div class="smallContainer">
        <div class="breadcrumbs1">
          <ul>
            <li>
              <a href="{{route('home')}}">{{__('main.home')}}</a>
            </li>
            <li>
              {{$model->title}}
            </li>
          </ul>
        </div>
        <div class="pageHead">
          <h2 class="title title-24">{{$model->title}}</h2>
          <div class="borderedDec grey"></div>
        </div>
        <div class="articles">
          <?php if (count($items)): ?>
          <ul>
            <?php foreach ($items as $item): ?>
              <?php if ($item->title): ?>
                <li><a href="{{route('articles.show',['name' => $item->url])}}">{{$item->title}}</a></li>
              <?php endif ?>
            <?php endforeach ?>
          </ul>
          <?php endif ?>
            <?php if (count($children)): ?>
            <ul>
              <?php foreach ($children as $item): ?>
                <?php if ($item->title): ?>
                <li><a href="{{route('categories.show',['name' => $item->url])}}">{{$item->title}}</a></li>
                <?php endif ?>
              <?php endforeach ?>
            </ul>
            <?php endif ?>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('sliderLinks')
  <?php echo App::make("App\Http\Controllers\SliderLinksController")->display(); ?>
@endsection
