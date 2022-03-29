@extends('layouts.app')

@section('title', __('main.home'))

@section('additionalCssFiles')
  <style>
    .classicGridView {
      background: #f5f5f5;
      display: block;
      margin-bottom: 10px;
      padding: 20px 35px 10px 35px;
    }
  </style>
@endsection

@section('content')
  <div class="whiteSection">
    <div class="mainContainer">
      <div class="contentBlock servicesBlock">
        <div class="minContainer">
          <h1>
            Очиқ маълумотлар
          </h1>
          @foreach($data as $item)
            <div class="classicGridView">
              <div>
                <a href="#"><h3>{{ $item->title }}</h3></a>
              </div>
              <div>
                <p>{{ $item->description }}</p>
              </div>
              <div>
                <p>{{ $item->code }}</p>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
@endsection
