@extends('layouts.app')

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
          <div class="breadcrumbs1">
            <ul>
              <li>
                <a href="{{route('home')}}">{{__('main.home')}}</a>
              </li>
              <li>
                <a href="{{route('news', [], false).'#/'.$model->category->url}}">{{$model->category->title}}</a>
              </li>
              <li>
                {{$model->title}}
              </li>
            </ul>
          </div>
          <div class="staticPageHead">
            <h2 class="title title-28">{{$model->title}}</h2>
            <?php $date = new \DateTime($model->date); ?>
            <div class="newsDate"> <i class="icon-dec-1"></i><span><b>{{$date->format('d')}}</b>.{{$date->format('m.Y')}}</span></div>
          </div>
          <div class="staticPageContent" style="font-size: 14px !important"><?= $model->content ?></div>
          <div class="staticPageFooter">
            <?php /* ?>
            <div class="staticPageShareLabel">{{__('main.поделиться')}}:</div>
            <div class="staticPageShareList">
              <a href="#" class="staticPageFooterBtn"><i class="icon-sn-fb"></i></a>
              <a href="#" class="staticPageFooterBtn"><i class="icon-vk"></i></a>
              <a href="#" class="staticPageFooterBtn"><i class="icon-odno"></i></a>
              <a href="#" class="staticPageFooterBtn"><i class="icon-dotted"></i></a>
            </div>
            <?php */ ?>
            <a href="#" id="print" class="staticPageFooterBtn right"><i class="icon-printer"></i></a>
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