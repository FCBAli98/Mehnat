@extends('layouts.app')

@section('content')
  <div class="whiteSection">
    <div class="mainContainer">
      <div class="contentBlock firstContent">
        <div class="middleContainer">
          <div class="pageHead">
            <div class="borderedDec grey"></div>
            <div class="staticPageFooter">
              <a href="#" id="print" class="staticPageFooterBtn right"><i class="icon-printer"></i></a>
            </div>
          </div>
          <div class="staticPage">
            @if(sizeof($search) > 0)
              @foreach($search as $model)
                <div class="staticPageHead">
                  @if($model->object_type == 'news')
                    <a href="{{route($model->object_type.'.show', ['name' => str_slug($model->object_value, '-')])}}" ><h4 class="title title-28">{{$model->object_value}}</h4></a>
                  @else
                    <a href="{{route($model->object_type.'s.show', ['name' => str_slug($model->object_value, '-')])}}" ><h4 class="title title-28">{{$model->object_value}}</h4></a>
                  @endif
                    <?php $date = new \DateTime($model->article->date); ?>
                  <div class="newsDate"> <i class="icon-dec-1"></i><span><b>{{$date->format('d')}}</b>.{{$date->format('m.Y')}}</span></div>
                </div>
              @endforeach
            @else
              <div class="staticPageHead" style="text-align:center; font-size: 14px"> <span> {{__('main.not_found_search_data')}} </span>
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
