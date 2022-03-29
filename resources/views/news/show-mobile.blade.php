@extends('layouts.mobile')

@section('title', $model->title)

<?php 
$contPost = strip_tags($model->content);
$description = mb_substr($contPost,0,300);
?>
@section('description', $description)

<?php if ($model->image): ?>
  @section('image', asset(getMedium($model->image)))
<?php endif ?>

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
            <?php $date = new \DateTime($model->date); ?>
            <div class="newsDate"> <i class="icon-dec-1"></i><span><b>{{$date->format('d')}}</b>.{{$date->format('m.Y')}}</span></div>
          </div>
          <div class="staticPageContent" style="font-size: 14px !important"><?= $model->content ?></div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection