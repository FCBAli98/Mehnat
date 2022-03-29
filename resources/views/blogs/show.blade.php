@extends('layouts.app')

@section('title', $model->title)

@php
  $contPost = strip_tags($model->content);

  $description = mb_substr($contPost, 0, 300);
@endphp

@section('description', $description)

@section('content')
  <div class="whiteSection">
    <div class="mainContainer">
      <div class="contentBlock firstContent">
        <div class="middleContainer">
          <div class="pageHead">
            <div class="borderedDec grey"></div>
          </div>
          <div>
            <div class="breadcrumbs1">
              <ul>
                <li>
                  <a href="{{ route('home') }}">{{ __('main.home') }}</a>
                </li>

                <li>
                  <a href="{{ route('blogs') }}">{{ __('main.Blogs') }}</a>
                </li>

                <li>
                  {{ $model->title }}
                </li>
              </ul>
            </div>

            <div class="staticPageHead">
              <h2 class="title title-28">{{$model->title}}</h2>
              <?php $date = new \DateTime($model->date); ?>
              <div class="newsDate"> <i class="icon-dec-1"></i><span><b>{{$date->format('d')}}</b>.{{$date->format('m.Y')}}</span></div>
            </div>

            <div class="staticPageContent">{!! $model->content !!}</div>

            <div class="staticPageFooter">
              <a href="#" id="print" class="staticPageFooterBtn right"><i class="icon-printer"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('sliderLinks')
  {!! App::make("App\Http\Controllers\SliderLinksController")->display() !!}
@endsection
