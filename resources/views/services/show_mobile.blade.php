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
        <div class="minContainer">
          <div class="pageHead">
            <div class="borderedDec grey"></div>
          </div>
          <div class="staticPageHead">
            <h2 class="title title-28" style="text-align: center">{{$model->title}}</h2>
          </div>
          <div class="staticPageContent"><?= $model->content ?></div>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
