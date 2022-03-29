@extends('layouts.app')

@section('title', __('main.Центральный аппарат'))

@section('content')
<div class="whiteSection">
  <div class="mainContainer">
    <div class="contentBlock firstContent">
      <div class="middleContainer">
        <div class="pageHead">
          <h2 class="title title-24">{{__('main.Центральный аппарат')}}</h2>
          <div class="borderedDec grey"></div>
        </div>
        <div class="pageColls">
          <div class="row15">
            <div class="colp15-8">                  
              <div class="contentItems">
                <div class="contentItem">
                  <?php if (count($models) > 0): ?>
                    <?php foreach ($models as $employee): ?>
                      <?php $image = $employee->image?getMedium($employee->image):asset('images/personalImageDefault.png'); ?>
                      <?php $fullImage = $employee->image?getFull($employee->image):false; ?>
                      <?php if ($employee->title): ?>
                      <div class="personalBlock personalBlock2">
                        <div style="background-image: url({{$image}});" class="personalImage">
                          <?php if ($fullImage): ?>
                            <a href="{{$fullImage}}" class="fancybox"></a>
                          <?php endif ?>
                        </div>
                        <div class="personalCard">
                          <div class="personalCardName">{{$employee->position}}</div>
                          <div class="personalCardPosition">{{$employee->title}}</div>
                          <?php if ($employee->phone): ?>
                          <div class="personalCardRecDays">{{__('main.Телефон')}}: {{$employee->phone}}</div>
                          <?php endif ?>
                          <div class="personalCardRecDays">{{__('main.Приёмные дни')}}: {{$employee->reception_days}}</div>
                          <div class="minButtons minButtons2">
                            <a href="{{route('central-apparatus.position',['id' => $employee->id])}}" target="_blank">{{__('main.Положение')}}</a>
                            <a href="{{route('central-apparatus.duties',['id' => $employee->id])}}" target="_blank">{{__('main.Задачи')}}</a>
                          </div>
                        </div>
                      </div>
                      <?php endif ?>
                    <?php endforeach ?>
                  <?php endif ?>
                  <?= $models->links('pagination.default'); ?>
                </div>
              </div>
            </div>
            <div class="colp15-4">                  
              <nav class="sideBarNavs">
                <?php if (count($menu) > 0): ?>
                <ul>
                  <?php foreach ($menu as $navItem): ?>
                    <?php if ($navItem->title): ?>
                      <li><a href="{{$navItem->url}}"> <span>{{$navItem->title}}</span></a></li>
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
</div>
@endsection
@section('sliderLinks')
  <?php echo App::make("App\Http\Controllers\SliderLinksController")->display(); ?>
@endsection