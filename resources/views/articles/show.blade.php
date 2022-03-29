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
        <div class="row15 staticPageRow">
          <div class="colp15-8">
            <div class="contentItems">
              <div class="breadcrumbs1">
                <ul>
                  <li>
                    <a href="{{route('home')}}">{{__('main.home')}}</a>
                  </li>
                  <li>
                    <a href="{{route('categories.show', ['name' => $model->category->url])}}">{{$model->category->title}}</a>
                  </li>
                  <li>
                    {{$model->title}}
                  </li>
                </ul>
              </div>
              <div class="staticPageHead">
                <h2 class="title title-28">{{$model->title}}</h2>
              </div>
              <div class="staticPageContent"><?= $model->content ?></div>
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
          <div class="colp15-4">
            <nav class="sideBarNavs">
              <?php if (count($items) > 0): ?>
              <ul>
                <?php foreach ($items as $item): ?>
                  <?php if ($item->title): ?>
                    <li <?= $item->url==$model->url?'class="active"':'' ?>><a href="{{route('articles.show', ['name' => $item->url])}}"> <span>{{$item->title}}</span></a></li>
                  <?php endif ?>
                <?php endforeach ?>
              </ul>
              <?php endif ?>
            </nav>
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