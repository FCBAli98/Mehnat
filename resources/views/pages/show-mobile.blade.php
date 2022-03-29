@extends('layouts.mobile')

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
          <div class="staticPage">
            <div class="staticPageHead">
              <h2 class="title title-28">{{$model->title}}</h2>
            </div>
            <div class="staticPageContent"><?= $model->content ?></div>
          </div>

      </div>
    </div>
  </div>
</div>
@endsection
@section('sliderLinks')
  <?php echo App::make("App\Http\Controllers\SliderLinksController")->display(); ?>
@endsection