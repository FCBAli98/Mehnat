@extends('layouts.app')

@section('title', $model->title)

<?php 
$contPost = strip_tags($model->content);
$description = mb_substr($contPost,0,300);
?>
@section('description', $description)

@section('content')
<div class="whiteSection">
  <div class="mainContainer">
    <div class="contentBlock firstContent">
      <div class="middleContainer">
        <div class="pageHead">
          <div class="borderedDec grey"></div>
        </div>
        <div class="smallContainer">
          <div class="breadcrumbs1">
            <ul>
              <li>
                <a href="{{route('home')}}">{{__('main.home')}}</a>
              </li>
              <li>
                <a href="{{route('employee-categories.show', ['name' => $model->category->url])}}">{{$model->category->title}}</a>
              </li>
              <li>
                {{$model->title}}
              </li>
            </ul>
          </div>
          <div class="biography">
            <div class="personalBlock">
              <?php $image = $model->image?getThumbnail($model->image):asset('images/personalImageDefault.png'); ?>
              <div style="background-image: url({{$image}});" class="personalImage"></div>
              <div class="personalCard">
                <div class="personalCardPosition">{{$model->position}}</div>
                <div class="personalCardName">{{$model->title}}</div>
                <div class="personalCardMiniInfo"><?= nl2br($model->description) ?></div>
              </div>
            </div>
            <br>
            <h3 class="title title-18">{{__('main.Функции и задачи')}}</h3>
            <div class="staticPageContent"><?= $model->content ?></div>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('sliderLinks')
  <?php echo App::make("App\Http\Controllers\SliderLinksController")->display(); ?>
@endsection