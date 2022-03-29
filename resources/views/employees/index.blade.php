@extends('layouts.app')

@section('title', __('main.Руководство'))

@section('content')
<div class="whiteSection">
  <div class="mainContainer">
    <div class="contentBlock firstContent">
      <div class="middleContainer">
        <div class="pageHead">
          <h2 class="title title-24">{{__('main.Руководство')}}</h2>
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
                      <div class="personalBlock">
                        <div style="background-image: url({{$image}});" class="personalImage">
                          <?php if ($fullImage): ?>
                            <a href="{{$fullImage}}" class="fancybox"></a>
                          <?php endif ?>
                        </div>
                        <div class="personalCard">
                          <div class="personalCardName">{{$employee->title}}</div>
                          <div class="personalCardPosition">{{$employee->position}}</div>
                          <?php if ($employee->phone): ?>
                          <div class="personalCardRecDays">{{__('main.Телефон')}}: {{$employee->phone}}</div>
                          <?php endif ?>
                          <div class="personalCardRecDays">{{__('main.Приёмные дни')}}: {{$employee->reception_days}}</div>
                          <div class="minButtons js-toggleLinks">
                            <a href="#biography">{{__('main.Биография')}}</a>
                            <a href="#functions">{{__('main.Функции и задачи')}}</a>
                          </div>
                          <div id="biography" class="personalBiography">
                            <p><?= nl2br($employee->description) ?></p>
                            <?php if (count($employee->childs)): ?>
                              <?php foreach ($employee->childs as $history): ?>
                                <?php if ($history->title): ?>
                                <div class="personHistoryItem">
                                  <div class="personHistoryDesc">{{$history->content}}</div>
                                  <div class="personHistoryPeriod">{{$history->title}}</div>
                                </div>
                                <?php endif ?>
                              <?php endforeach ?>
                            <?php endif ?>
                          </div>
                          <div id="functions" class="personalBiography"><?= $employee->content?></div>
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