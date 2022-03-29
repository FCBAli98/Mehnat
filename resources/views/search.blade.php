@extends('layouts.app')

@section('content')
<div class="whiteSection">
  <div class="mainContainer">
    <div class="contentBlock firstContent">
      <div class="middleContainer">
        <h5>{{ __('main.search_result') }}: {{ $data->total() }}</h5>
        <hr>
        <?php if (count($data) > 0): ?>
          <ul class="search-result">
            <?php foreach ($data as $result): ?>
              <?php
                $url = route('news.show', ['news' => $result->url]);
              ?>
              <li>
                <p>
                  <a href="{{ $url }}">{{ $result->title }}</a>
                </p>
              </li>
            <?php endforeach ?>
          </ul>
        <?php endif ?>
        {!!  $data->appends(request()->except('page'))->links() !!}
      </div>
    </div>
  </div>
</div>
@endsection
@section('sliderLinks')
  <?php echo App::make("App\Http\Controllers\SliderLinksController")->display(); ?>
@endsection
