@extends('layouts.app')

@section('title', __('main.home'))

@section('additionalCssFiles')
  <style>
    .lb-details {
      display: none !important;
    }

    #chartdiv {
      width: 100%;
      height: 500px;
    }

    .rating-bottom {
      padding: 15px 10px 0;
    }

    .rating-bottom .my-row {
      margin: 0 -7.5px;
    }

    .rating-bottom .my-col-4 {
      width: 33.333333%;
      float: left;
      padding: 0 7.5px;
    }

    .rating-bottom .my-col-3 {
      width: 25%;
      float: left;
      padding: 0 7.5px;
    }


    .rating-bottom .rating-b-item {
      padding-top: 15px;
    }

    .rating-bottom .rating-b-item > a {
      text-decoration: none;
      display: -ms-flexbox;
      display: flex;
      -ms-flex-wrap: wrap;
      flex-wrap: wrap;
      background: #fff;
      height: 160px;
      overflow: hidden;
      position: relative;
      text-align: center;
      border-radius: 8px;
      box-shadow: 0px 4px 20px 0px rgb(110, 110, 110);
      padding: 20px 30px;
    }

    .rating-bottom .rating-b-item a span.rating-unity {
      background: none;
      color: #00598e;
      box-shadow: none;
      float: none;
      margin: 0;
      width: auto;
      height: auto;
      font-size: 32px;
      padding: 10px 0;
      display: block;
      flex: 0 0 100%;
      max-width: 100%;
    }

    .rating-bottom .rating-b-item span {
      width: 100%;
      text-align: center !important;
    }

    .dmiStatistics {
      border-radius: 50px;
      width: 60px;
      height: 60px;
      margin: 0 auto
    }

    .dmiStatistics img {
      position: relative;
      top: -10px;
      right: -2px;
      width: 50px;
      height: auto
    }

    .DMITitle {
      font-size: 18px
    }

    .DMIa {
      display: inline-block;
      pointer-events: none;
    }

  </style>
@endsection
@section('content')
  <?php if (count($modalPageMenu)): ?>
  <?php foreach ($modalPageMenu as $modalPageMenuItem): ?>
  <div id="{{$modalPageMenuItem['anchor']}}" class="modalPage modalPageLeft">
    <div class="modalPageInnerWrap">
      <div class="minContainer">
        <div class="modalPageHead">
          <h1 class="title title-28" style="border: 1px solid red;"><i
              class="{{$modalPageMenuItem['icon']}}"></i><span>{{$modalPageMenuItem['title']}}</span></h1><a href="#"
                                                                                                             class="closeModalPage right"><i
              class="icon-close"></i></a>
          <div class="borderedDec grey"></div>
        </div>
        <div class="modalPageBody">
          <?php if (count($modalPageMenuItem['childs'])): ?>
          <div class="row15">
            <?php $i = 0; foreach ($modalPageMenuItem['childs'] as $child): ?>
            <div class="colp15-6">
              <h3 class="title-22">{{$child['title']}}</h3>
              <?php if (count($child['items'])): ?>
              <ul class="onlineServices">
                <?php foreach ($child['items'] as $item): ?>
                <?php if ($item->title): ?>
                <li><a href="{{$item->url}}"> <span class="li-text">{{$item->title}}</span></a></li>
                <?php endif ?>
                <?php endforeach ?>
              </ul>
              <?php endif ?>
            </div>
            <?php $i++; ?>
            <?php if ($i == 2 && end($modalPageMenuItem['childs']) != $child): ?>
          </div>
          <div class="row15">
            <?php $i = 0; ?>
            <?php endif ?>
            <?php endforeach ?>
          </div>
          <?php endif ?>
        </div>
      </div>
    </div>
  </div>
  <?php endforeach ?>
  <?php endif ?>
  <div id="mainBanner">
    <?php if ($mainSlider): ?>
    <div class="mainBannersSlider owl-carousel owl-theme">
      <?php foreach ($mainSlider as $slider): ?>
      <?php if ($slider->image): ?>
      @if($slider->url != '')
        <div style="background-image: url({{getFull($slider->image)}}); cursor: pointer" class="bannerItem"
             onclick="location.href='{{ $slider->url }}'"></div>
      @else
        <div style="background-image: url({{getFull($slider->image)}});" class="bannerItem"></div>
      @endif
      <?php endif ?>
      <?php endforeach ?>
    </div>
    <?php endif ?>

  <!--      for fixed menu-->
    <?php if (false): ?>
    <div class="bannerButtons textCenter">
      <div class="minContainer">

        <?php if (isset($modalPageMenu['forWorker'])): ?>
        <div class="left">
          <a href="#forWorker" class="bannerBtn bannerBtnLeft">
            <i class="{{$modalPageMenu['forWorker']['icon']}}"></i>
            <span>{{$modalPageMenu['forWorker']['title']}}</span>
            <span class="bannerBtnArrows">
              <i class="icon-dots-arrow-right"></i>
              <i class="icon-dots-arrow-right"></i>
              <i class="icon-dots-arrow-right"></i>
            </span>
          </a>
        </div>
        <?php endif ?>

        <?php if (isset($modalPageMenu['forEmployer'])): ?>
        <div class="right">
          <a href="#forEmployer" class="bannerBtn bannerBtnRight">
            <i class="{{$modalPageMenu['forEmployer']['icon']}}"></i>
            <span>{{$modalPageMenu['forEmployer']['title']}}</span>
            <span class="bannerBtnArrows">
              <i class="icon-dots-arrow-left"></i>
              <i class="icon-dots-arrow-left"></i>
              <i class="icon-dots-arrow-left"></i>
            </span>
          </a>
        </div>
        <?php endif ?>

        <div class="inline-block">
          <?php if (isset($modalPageMenu['laborMigrant'])): ?>
          <div>
            <a href="#laborMigrant" class="bannerBtn">
              <i class="{{$modalPageMenu['laborMigrant']['icon']}}"></i>
              <span>{{$modalPageMenu['laborMigrant']['title']}}</span>
            </a>
          </div>
          <?php endif ?>
          <div>
            <a href="{{route('signals')}}" class="bannerBtn">
              <i class="icon-info"></i>
              <span>{{__('main.Острые сигналы')}}</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  <?php endif ?>
  <!--    end for fixed menu-->
  </div>

  <!-- <div id="favouriteDayContent" style="visibility: hidden">
    <div style="height: 40px; padding-top: 10px; background-color: #00588e">
      <p id="" style="font-size: 18px; font-weight: bold; color: white; text-align: center">21 октябрь - Ўзбек тили байрамига <span id="diff_day"></span> кун қолди!</p>
    </div>
  </div> -->

  {{--fixed menu--}}
  {{--modal window--}}
  <div id="followModal" class="modalPage modalPageLeft">
    <div class="modalPageInnerWrap">
      <div class="minContainer">
        <div class="modalPageHead">
          <h1 class="title title-28"><i class="fa fa-rss"></i><span>{{__('main.Подписатся')}}</span></h1><a href="#"
                                                                                                            class="closeModalPage right"><i
              class="icon-close"></i></a>
          <div class="borderedDec grey"></div>
        </div>
        <div class="modalPageBody">
          <div class="row15">
            <form action="{{ route('followers.store') }}" method="post">
              @csrf
              <div class="colp15-10">
                <div class="form-control">
                  <label>E-mail</label>
                  <div class="field2">
                    <input type="email" required name="email" id="email">
                  </div>
                </div>
              </div>
              <div class="colp15-2" style="padding-top: 15px">
                <div class="textRight">
                  <button type="submit" class="btn0 btn2">{{__('main.Сохранить')}}</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{--end modal--}}

  <div class="fixedMenuOnLeft">
    <div class="bannerButtons" style="position: relative">
      <div>
        <a href="#followModal" class="bannerBtn" style="width: 100%; margin-bottom: 0; padding: 0 37px 0 20px">
          <i class="fa fa-rss"></i>
          <span class="sherzodsSpan">{{__('main.Подписатся')}}</span>
        </a>
      </div>
      <div>
        <a href="{{route('signals')}}" class="bannerBtn" style="width: 100%; margin-bottom: 0; padding: 0 37px 0 20px">
          <i class="icon-info"></i>
          <span class="sherzodsSpan">{{__('main.Острые сигналы')}}</span>
        </a>
      </div>
      <?php if (isset($modalPageMenu['forWorker'])): ?>
      <div>
        <a href="#forWorker" class="bannerBtn" style="width: 100%; padding: 0 37px 0 20px">
          <i class="{{$modalPageMenu['forWorker']['icon']}}"></i>
          <span class="sherzodsSpan">{{$modalPageMenu['forWorker']['title']}}</span>
        </a>
      </div>
      <?php endif ?>

      <?php if (isset($modalPageMenu['forEmployer'])): ?>
      <div>
        <a href="#forEmployer" class="bannerBtn" style="width: 100%; padding: 0 37px 0 20px">
          <i class="{{$modalPageMenu['forEmployer']['icon']}}"></i>
          <span class="sherzodsSpan">{{$modalPageMenu['forEmployer']['title']}}</span>
        </a>
      </div>
      <?php endif ?>

      <?php if (isset($modalPageMenu['laborMigrant'])): ?>
      <div>
        <a href="#laborMigrant" class="bannerBtn" style="width: 100%; margin-bottom: 0; padding: 0 37px 0 20px">
          <i class="{{$modalPageMenu['laborMigrant']['icon']}}"></i>
          <span class="sherzodsSpan">{{$modalPageMenu['laborMigrant']['title']}}</span>
        </a>
      </div>
      <?php endif ?>
    </div>
  </div>
  {{--end fixed menu--}}

  {{--start Left and right menu--}}
  <div class="leftSidebar">
    <?php if (isset($leftMenu)): ?>
    <?php foreach ($leftMenu as $menu): ?>
    <div class="inline-block sidebarItem">
      <div>
        @if(strlen($menu['title'])>50)
          <a href="{{$menu['url']}}" class="bannerBtn sidebarItem" style="line-height: 16px; ">
            <i class="icon-dots-arrow-min-right"
               style="font-size: 12px; float: left; width: 10%; align-items: center; display: inline-flex; height: 100%"></i>
            <span
              style="float: left; width: 80%; align-items: center; display: inline-flex; height: 100%">{{$menu['title']}}</span>
          </a>
        @else
          <a href="{{$menu['url']}}" class="bannerBtn sidebarItem" style="line-height: 16px">
            <i class="icon-dots-arrow-min-right"
               style="font-size: 12px; float: left; width: 10%; align-items: center; display: inline-flex; height: 100%"></i>
            <span
              style="float: left; width: 80%; align-items: center; display: inline-flex; height: 100%">{{$menu['title']}}</span>
          </a>
        @endif
      </div>
    </div>
    <?php endforeach ?>
    <?php endif ?>
  </div>
  <div class="rightSidebar" style="position:absolute; right: 1px;">
    {{--  <div class="newsBox" style="padding: 3px 10px">--}}
    {{--    <div class="videoContent">--}}
    {{--      <video width="100%" height="auto" preload="auto" autoplay="true" loop="true" muted="muted" controls>--}}
    {{--        <source type="video/mp4" src="/uploads/filemanager/source/RR.mp4">--}}
    {{--      </video>--}}
    {{--    </div>--}}
    {{--  </div>--}}
    {{--  <hr>--}}
    <div class="newsBox" style="padding: 3px 10px">
      <h2>{{__('main.mass_media_about_us')}}</h2>
      <div class="videoContent">
        <?php if (isset($lastPressData['content'])): ?>
        <?php if ($lastPressData['content']): ?>
        {!! $lastPressData['content'] !!}
        <?php else: ?>
        <p></p>

        <video width="100%" height="auto" preload="auto" autoplay="true" loop="true" muted="muted" controls>
          <source type="video/mp4" src="/uploads/filemanager/source/Ozbekiston_qanday_xalqaro_hujjatlarni.mp4">
        </video>
        <?php endif ?>
        <?php else: ?>
        <video width="100%" height="auto" preload="auto" autoplay="true" loop="true" muted="muted" controls>
          <source type="video/mp4" src="/uploads/filemanager/source/Ozbekiston_qanday_xalqaro_hujjatlarni.mp4">
        </video>
        <?php endif ?>
      </div>
      <?php if (isset($lastPressData['title'])): ?>
      <?php if ($lastPressData['content']): ?>
      <div class="newsTitle"><span><a
            href="{{route('news.show', ['name' => isset($lastPressData[0]) ? $lastPressData[0]['url'] : ''])}}">{{ $lastPressData['title'] }}</a></span>
      </div>
      <div class="newsDate" style="text-align: left"><i
          class="icon-dec-1"></i><span>{{ str_limit($lastPressData['created_at'], 10, '') }}</span></div>
      <?php endif ?>
      <?php endif ?>
    </div>
    <hr>
    <div class="newsBox" style="padding: 3px 10px">
      <h4>{{__('main.territorial_news')}}</h4>

      <?php if (isset($lastTerritorialNews[0])): ?>
      <div class="newsImage"><a href="{{ $lastTerritorialNews[0]['url'] }}"
                                style="background-image:url('{{ $lastTerritorialNews[0]['image'] }}'); font-size: 18px; font-weight: bold"></a>
      </div>
      <div class="newsTitle"><a href="{{ $lastTerritorialNews[0]['url'] }}">{{ $lastTerritorialNews[0]['title'] }}</a>
      </div>
      <div class="newsDate" style="text-align: left">{!! $lastTerritorialNews[0]['date'] !!}</div>
      <?php else: ?>
      <div class="newsImage"><a href="#" style="background-image:url('{{ asset('/images/siteImage.png') }}');"></a>
      </div>
      <?php endif ?>
    </div>
  </div>
  {{--end Left and right menu--}}


  <div class="whiteSection">
    <div class="mainContainer">
      <div class="contentBlock servicesBlock">
        <div class="minContainer">
        
          <?php if (isset($onlineServices['title']) && $onlineServices['title']): ?>
          <div class="servicesCellHead">
            <h3 class="title title-22" style="text-align: center">{{$onlineServices['title']}}</h3>
            <div class="borderedDec"></div>
          </div>
          <?php if ($onlineServices['childs']): ?>
          <div class="servicesTabsNav">
            <nav>
              <ul>
                <?php foreach ($onlineServices['childs'] as $index => $child): ?>
                <li <?= $onlineServices['childs'][0] == $child ? 'class="active"' : "" ?>><a
                    href="{{$index}}">{{$child['title']}}</a></li>
                <?php endforeach ?>

                <?php if ($informationServices): ?>
                <li><a href="{{count($onlineServices['childs'])+1}}">{{$informationServices['title']}}</a></li>
                <?php endif ?>
              </ul>
            </nav>
          </div>
          <div class="servicesTabsBodies">
            <?php foreach ($onlineServices['childs'] as $index => $child): ?>
            <div
              <?= $onlineServices['childs'][0] == $child ? 'style="display:block;"' : "" ?> class="servicesTabsBody servicesTabsBody{{$index}}">
              <?php if ($child['items']): ?>
              <ul class="onlineServices">
                <?php foreach ($child['items'] as $item): ?>
                <li>
                  <?php if ($item->enabled == 3): ?>
                  <a>
                          <span class="li-icon">
                            <?php if ($item->image): ?>
                            <img src="{{getIcon($item->image)}}" alt="" class="svg"/>
                            <?php endif ?>
                          </span>
                    <span class="li-text">
                            <span class="labels">{{__("main.Скоро")}}</span>
                            {{$item->title}}
                          </span>
                  </a>
                  <?php else: ?>
                  <a
                    href="{{$item->another_url?$item->another_url:route('services.show', ['name' => $item->url])}}" <?= $item->another_url ? "target='_blank'" : ''; ?>>
                          <span class="li-icon">
                            <?php if ($item->image): ?>
                            <img src="{{getIcon($item->image)}}" alt="" class="svg"/>
                            <?php endif ?>
                          </span>
                    <span class="li-text">{{$item->title}}</span>
                  </a>
                  <?php endif ?>
                </li>
                <?php endforeach ?>
              </ul>
              <?php endif ?>
            </div>
            <?php endforeach ?>

            <?php if ($informationServices): ?>
            <div class="servicesTabsBody servicesTabsBody{{count($onlineServices['childs'])+1}}">
              <?php if (count($informationServices['items'])): ?>
              <ul class="informationServices">
                <?php foreach ($informationServices['items'] as $item): ?>
                <li>
                  <?php if ($item->enabled == 3): ?>
                  <span class="labels">{{__("main.Скоро")}}</span>
                  <a>{{$item->title}}</a>
                  <?php else: ?>
                  <a
                    href="{{$item->another_url?$item->another_url:route('services.show', ['name' => $item->url])}}" <?= $item->another_url ? "target='_blank'" : ''; ?>>{{$item->title}}</a>
                  <?php endif ?>
                </li>
                <?php endforeach ?>
              </ul>
              <?php endif ?>
            </div>
            <?php endif ?>
          </div>
          <?php endif ?>
          <?php endif ?>

          <?php /* ?>
        <div class="row10">
          <div class="colp10-8">
            <?php if (isset($onlineServices['title'])&&$onlineServices['title']): ?>
            <div class="servicesCellHead">
              <h3 class="title title-22">{{$onlineServices['title']}}</h3>
              <div class="borderedDec"></div>
            </div>
            <div class="servicesCellBody">
              <?php if ($onlineServices['childs']): ?>
              <div class="row5">
                <?php foreach ($onlineServices['childs'] as $child): ?>
                <div class="colp5-6">
                  <div class="title-18">{{$child['title']}}</div>
                  <?php if ($child['items']): ?>
                    <ul class="onlineServices">
                    <?php foreach ($child['items'] as $item): ?>
                      <li>
                        <?php if ($item->enabled == 3): ?>
                          <a>
                            <span class="li-icon">
                              <?php if ($item->image): ?>
                              <img src="{{getIcon($item->image)}}" alt="" class="svg"/>
                              <?php endif ?>
                            </span>
                            <span class="li-text">
                              <span class="labels">{{__("main.Скоро")}}</span>
                              {{$item->title}}
                            </span>
                          </a>
                        <?php else: ?>
                          <a href="{{$item->another_url?$item->another_url:route('services.show', ['name' => $item->url])}}" <?= $item->another_url?"target='_blank'":''; ?>>
                            <span class="li-icon">
                              <?php if ($item->image): ?>
                              <img src="{{getIcon($item->image)}}" alt="" class="svg"/>
                              <?php endif ?>
                            </span>
                            <span class="li-text">{{$item->title}}</span>
                          </a>
                        <?php endif ?>
                      </li>
                    <?php endforeach ?>
                    </ul>
                  <?php endif ?>
                </div>
                <?php endforeach ?>
              </div>
              <?php endif ?>
            </div>
            <?php endif ?>
          </div>
          <div class="colp10-4">
            <?php if ($informationServices): ?>
              <div class="servicesCellHead">
                <h3 class="title title-22">{{$informationServices['title']}}</h3>
                <div class="borderedDec"></div>
              </div>
              <?php if (count($informationServices['items'])): ?>
              <ul class="informationServices">
                <?php foreach ($informationServices['items'] as $item): ?>
                <li>
                  <?php if ($item->enabled == 3): ?>
                    <span class="labels">{{__("main.Скоро")}}</span>
                    <a>{{$item->title}}</a>
                  <?php else: ?>
                    <a href="{{$item->another_url?$item->another_url:route('services.show', ['name' => $item->url])}}" <?= $item->another_url?"target='_blank'":''; ?>>{{$item->title}}</a>
                  <?php endif ?>
                </li>
                <?php endforeach ?>
              </ul>
              <?php endif ?>
            <?php endif ?>
          </div>
        </div>
        <?php */ ?>

        </div>
      </div>
      <?php if (count($news)): ?>
      <div class="newsSection">
        <div class="textCenter sectionTitle">
          <h3 class="title title-22">{{__("main.open_data")}}<br>
            {{__("main.Statistics", ['year' => $year, 'months' => $months])}}</h3>
        </div>

        <div style="text-align: center">
          <h4>{{$stat[0]->name}} - {{number_format($stat[0]->value, 2, ',', ' ')}}  {{__('main.mln_people')}}</h4>
          <h4>{{$stat[1]->name}} - {{number_format($stat[1]->value, 2, ',', ' ')}}  {{__('main.mln_people')}}</h4>
        </div>
        <div class="dottsBlock">
        </div>
      </div>
      <?php endif ?>
    </div>
  </div>
  <div class="mainContainer">
    <?php if (false): ?>
    <?php if (count($news)): ?>
    <div class="newsBlock">
      <div class="minContainer">
        <div class="newsList">
          <ul>
            <?php foreach ($news as $newsItem): ?>
            <li>
              <div class="newsBox">
                <div class="newsImage"><a href="{{route('news.show', ['name' => $newsItem->url])}}"
                                          style="background-image:url('{{getMedium($newsItem->image)}}');"></a></div>
                <div class="newsTitle"><a
                    href="{{route('news.show', ['name' => $newsItem->url])}}"><span>{{$newsItem->title}}</span></a>
                </div>
                <?php $date = new \DateTime($newsItem->date); ?>
                <div class="newsDate"><i class="icon-dec-1"></i><span><b>{{$date->format('d')}}</b>.{{$date->format('m.Y')}}</span>
                </div>
              </div>
            </li>
            <?php endforeach ?>
          </ul>
        </div>
      </div>
      <div class="allRecords allNews">
        <div class="borderedDec"></div>
        <a href="{{route('news')}}" class="btn0 btn1"><span>{{__('main.Все новости')}}</span><i
            class="icon-dots-arrow-min-right"></i></a>
      </div>
    </div>
    <?php endif ?>
    <?php endif ?>

    {{--  tabs and gallery--}}
    <div class="newsBlock">
      <div class="minContainer" style="max-width: 100%">

        {{--      statistics--}}
        <div class="contentBlock servicesBlock">
          <div class="minContainer">
            <!-- HTML -->
            <div id="chartdiv"></div>
            <div class="rating-bottom">
              <div class="my-row">
                @foreach($statistics as $statistic)
                  <div class="my-col-4">
                    <div class="rating-b-item">
                      <a href="{{ route('showStatisticsByRegions', ['id' => $statistic->id]) }}" target="_blank"
                         rel="nofollow" class="rating-hover">
                    <span class="rating-unity">
                      <span class="rating-count" data-counter="{{ $statistic->value }}">{{ $statistic->value }}</span>
                    </span>
                        <span style="font-weight: normal; color: #00598e">{{ $statistic->name }}</span>
                      </a>
                    </div>
                  </div>
                @endforeach
                <div class="clearfix"></div>
              </div>
            </div>

          </div>
        </div>


        {{--      statistics--}}
        <div class="newsSection">
          <div class="textCenter sectionTitle">
            <h3 class="title title-22">{{__('main.DMIStatistics')}}</h3>
          </div>
          <div class="dottsBlock" style="position:absolute;"></div>
        </div>
        <div class="contentBlock servicesBlock">
          <div class="minContainer">
            <!-- HTML -->
            <div class="rating-bottom">
              <div class="my-row">
                <div class="colp5-3">
                  <div class="rating-b-item">
                    <a href="#" target="_blank" rel="nofollow" class="rating-hover DMIa" style="height: 250px">
                      <div class="dmiStatistics" style="background-color: #80A5CB;">
                        <img src="/images/icons/statistics/document.svg" alt="">
                      </div>
                      <span class="rating-unity">
                        <span class="rating-count" data-counter="13426">13426</span>
                      </span>
                      <span class="DMITitle">{!! __('main.DMIStatisticsTotal') !!}</span>
                    </a>
                  </div>
                </div>
                <div class="colp5-3">
                  <div class="rating-b-item">
                    <a href="#" target="_blank" rel="nofollow" class="rating-hover DMIa" style="height: 250px">
                      <div class="dmiStatistics" style="background-color: #8679B9;">
                        <img src="/images/icons/statistics/search.svg" alt="">
                      </div>
                      <span class="rating-unity">
                        <span class="rating-count" data-counter="8575">8575</span>
                      </span>
                      <span class="DMITitle">{!! __('main.DMIStatisticsInspections') !!}</span>
                    </a>
                  </div>
                </div>
                <div class="colp5-3">
                  <div class="rating-b-item">
                    <a href="#" target="_blank" rel="nofollow" class="rating-hover DMIa" style="height: 250px"
                       onclick="javascript.av">
                      <div class="dmiStatistics" style="background-color: #C7A67E;">
                        <img src="/images/icons/statistics/document1.svg" alt="">
                      </div>
                      <span class="rating-unity">
                        <span class="rating-count" data-counter="7508">7508</span>
                      </span>
                      <span class="DMITitle">{!! __('main.DMIStatisticsSatisfied') !!}</span>
                    </a>
                  </div>
                </div>
                <div class="colp5-3">
                  <div class="rating-b-item">
                    <a href="#" target="_blank" rel="nofollow" class="rating-hover DMIa" style="height: 250px">
                      <div class="dmiStatistics" style="background-color: #81C37D;">
                        <img src="/images/icons/statistics/compliant.svg" alt="">
                      </div>
                      <span class="rating-unity">
                        <span class="rating-count" data-counter="444">444</span>
                      </span>
                      <span class="DMITitle">{!! __('main.DMIStatisticsFines') !!}</span>
                    </a>
                  </div>
                </div>

                <div class="clearfix"></div>
              </div>
            </div>

          </div>
        </div>


        {{--      end statistics--}}

        {{--      new prof stat begin--}}

        <div class="newsSection">
          <div class="textCenter sectionTitle">
            <h3 class="title title-22">{{__('main.stat_vacancies')}} </h3>
          </div>
          <div class="dottsBlock" style="position:absolute;"></div>
        </div>
        <div class="contentBlock servicesBlock">
          <div class="minContainer">
            <!-- HTML -->
            <div class="rating-bottom">
              <div class="my-row">

                <div class="colp5-2">
                  <div class="rating-b-item">
                    <a href="#" target="_blank" rel="nofollow" class="rating-hover DMIa" style="height: 200px">
                      <div class="dmiStatistics" style="background-color: #8679B9;">
                        <img src="/images/icons/statistics/search.svg" alt="">
                      </div>
                      <span class="rating-unity">
                        <span class="rating-count" style="font-size: 20px" data-counter="3313">3313</span>
                      </span>
                      <span class="DMITitle" style="font-size: 12px">{!! __('main.Тарбиячи') !!}</span>
                    </a>
                  </div>
                </div>
                <div class="colp5-2">
                  <div class="rating-b-item">
                    <a href="#" target="_blank" rel="nofollow" class="rating-hover DMIa" style="height: 200px;">
                      <div class="dmiStatistics" style="background-color: #80A5CB;">
                        <img src="/images/icons/statistics/document.svg" alt="">
                      </div>
                      <span class="rating-unity">
                        <span class="rating-count" style="font-size: 20px" data-counter="1765">1765</span>
                      </span>
                      <span class="DMITitle" style="font-size: 12px">{!! __('main.Умумий амалиёт ҳамшираси') !!}</span>
                    </a>
                  </div>
                </div>
                <div class="colp5-2">
                  <div class="rating-b-item">
                    <a href="#" target="_blank" rel="nofollow" class="rating-hover DMIa" style="height: 200px">
                      <div class="dmiStatistics" style="background-color: #8679B9;">
                        <img src="/images/icons/statistics/search.svg" alt="">
                      </div>
                      <span class="rating-unity">
                        <span class="rating-count" style="font-size: 20px" data-counter="1451">1451</span>
                      </span>
                      <span class="DMITitle" style="font-size: 12px">{!! __('main.Иш юритувчи') !!}</span>
                    </a>
                  </div>
                </div>
                <div class="colp5-2">
                  <div class="rating-b-item">
                    <a href="#" target="_blank" rel="nofollow" class="rating-hover DMIa" style="height: 200px;">
                      <div class="dmiStatistics" style="background-color: #80A5CB;">
                        <img src="/images/icons/statistics/document.svg" alt="">
                      </div>
                      <span class="rating-unity">
                        <span class="rating-count" style="font-size: 20px" data-counter="1213">1213</span>
                      </span>
                      <span class="DMITitle" style="font-size: 12px">{!! __('main.Кассир') !!}</span>
                    </a>
                  </div>
                </div>
                <div class="colp5-2">
                  <div class="rating-b-item">
                    <a href="#" target="_blank" rel="nofollow" class="rating-hover DMIa" style="height: 200px;">
                      <div class="dmiStatistics" style="background-color: #80A5CB;">
                        <img src="/images/icons/statistics/document.svg" alt="">
                      </div>
                      <span class="rating-unity">
                        <span class="rating-count" style="font-size: 20px" data-counter="1200">1200</span>
                      </span>
                      <span class="DMITitle" style="font-size: 12px">{!! __('main.Электрик') !!}</span>
                    </a>
                  </div>
                </div>
                <div class="colp5-2">
                  <div class="rating-b-item">
                    <a href="#" target="_blank" rel="nofollow" class="rating-hover DMIa" style="height: 200px">
                      <div class="dmiStatistics" style="background-color: #8679B9;">
                        <img src="/images/icons/statistics/search.svg" alt="">
                      </div>
                      <span class="rating-unity">
                        <span class="rating-count" style="font-size: 20px" data-counter="1072">1072</span>
                      </span>
                      <span class="DMITitle" style="font-size: 12px">{!! __('main.Бошланғич синфлар ўқитувчиси') !!}</span>
                    </a>
                  </div>
                </div>

                <div class="clearfix"></div>
              </div>
            </div>

            <div class="rating-bottom">
              <div class="my-row">
                <div class="colp5-2">
                  <div class="rating-b-item">
                    <a href="#" target="_blank" rel="nofollow" class="rating-hover DMIa" style="height: 200px;">
                      <div class="dmiStatistics" style="background-color: #80A5CB;">
                        <img src="/images/icons/statistics/document.svg" alt="">
                      </div>
                      <span class="rating-unity">
                        <span class="rating-count" style="font-size: 20px" data-counter="1005">1005</span>
                      </span>
                      <span class="DMITitle" style="font-size: 12px">{!! __('main.Соғлиқни сақлаш муассасаси санитари (санитаркаси)') !!}</span>
                    </a>
                  </div>
                </div>
                <div class="colp5-2">
                  <div class="rating-b-item">
                    <a href="#" target="_blank" rel="nofollow" class="rating-hover DMIa" style="height: 200px">
                      <div class="dmiStatistics" style="background-color: #8679B9;">
                        <img src="/images/icons/statistics/search.svg" alt="">
                      </div>
                      <span class="rating-unity">
                        <span class="rating-count" style="font-size: 20px" data-counter="874">874</span>
                      </span>
                      <span class="DMITitle" style="font-size: 12px">{!! __('main.Фермер') !!}</span>
                    </a>
                  </div>
                </div>
                <div class="colp5-2">
                  <div class="rating-b-item">
                    <a href="#" target="_blank" rel="nofollow" class="rating-hover DMIa" style="height: 200px;">
                      <div class="dmiStatistics" style="background-color: #80A5CB;">
                        <img src="/images/icons/statistics/document.svg" alt="">
                      </div>
                      <span class="rating-unity">
                        <span class="rating-count" style="font-size: 20px" data-counter="839">839</span>
                      </span>
                      <span class="DMITitle" style="font-size: 12px">{!! __('main.Барча номдаги тиббиёт ҳамшираси') !!}</span>
                    </a>
                  </div>
                </div>
                <div class="colp5-2">
                  <div class="rating-b-item">
                    <a href="#" target="_blank" rel="nofollow" class="rating-hover DMIa" style="height: 200px">
                      <div class="dmiStatistics" style="background-color: #8679B9;">
                        <img src="/images/icons/statistics/search.svg" alt="">
                      </div>
                      <span class="rating-unity">
                        <span class="rating-count" style="font-size: 20px" data-counter="703">703</span>
                      </span>
                      <span class="DMITitle" style="font-size: 12px">{!! __('main.Хўжалик мудири') !!}</span>
                    </a>
                  </div>
                </div>
                <div class="colp5-2">
                  <div class="rating-b-item">
                    <a href="#" target="_blank" rel="nofollow" class="rating-hover DMIa" style="height: 200px;">
                      <div class="dmiStatistics" style="background-color: #80A5CB;">
                        <img src="/images/icons/statistics/document.svg" alt="">
                      </div>
                      <span class="rating-unity">
                        <span class="rating-count" style="font-size: 20px" data-counter="675">675</span>
                      </span>
                      <span class="DMITitle" style="font-size: 12px">{!! __('main.Механик') !!}</span>
                    </a>
                  </div>
                </div>
                <div class="colp5-2">
                  <div class="rating-b-item">
                    <a href="#" target="_blank" rel="nofollow" class="rating-hover DMIa" style="height: 200px">
                      <div class="dmiStatistics" style="background-color: #8679B9;">
                        <img src="/images/icons/statistics/search.svg" alt="">
                      </div>
                      <span class="rating-unity">
                        <span class="rating-count" style="font-size: 20px" data-counter="662">662</span>
                      </span>
                      <span class="DMITitle" style="font-size: 12px">{!! __('main.Кадрлар бўйича инспектор') !!}</span>
                    </a>
                  </div>
                </div>

                <div class="clearfix"></div>
              </div>
            </div>

            <div class="allRecords allNews">
              <div class="borderedDec"></div>
              <a href="{{__('main.url_batafsil')}}" class="btn0 btn1"><span>{{__('main.Барча касблар')}}</span><i
                  class="icon-dots-arrow-min-right"></i></a>
            </div>

          </div>
        </div>
        {{--      new prof stat end--}}

        <?php if (count($news)): ?>
        <div class="newsSection">
          <div class="textCenter sectionTitle">
            <h3 class="title title-22">{{__('main.Новости')}}</h3>
          </div>
          <div class="dottsBlock" style="position:absolute;"></div>
        </div>
        <?php endif ?>
        <div class="contentBlock servicesBlock">
          <div class="minContainer">
            <div class="layout">
              <input name="nav" type="radio" class="nav newsTabs-radio" id="newsTabs" checked="checked"/>
              <div class="page newsTabs-page">
                <div class="page-contents">
                  <?php if (count($news)): ?>
                  <div id="newsList">
                    <div class="contentItem">
                      <?php if (isset($news[0])): ?>
                      <div class="news2Box">
                        <div class="news2Image">
                          <a href="{{route('news.show', ['name' => $news[0]->url])}}" style="height: 350px">
                            <div
                              style="background-image:url('{{getMedium($news[0]->image)}}'); background-size: auto 100%"
                              class="imgBox"></div>
                            <div class="arrowHover"><img src="{{asset('/images/icons/arrow-ellips.png')}}" alt=""/>
                            </div>
                          </a>
                        </div>
                        <div class="news2Title">
                          <a href="{{route('news.show', ['name' => $news[0]->url])}}"
                             style="font-size: 18px; font-weight: bold">{{$news[0]->title}}</a>
                        </div>
                        <div class="news2Footer">
                          <?php $date = new \DateTime($news[0]->date); ?>
                          <div class="newsDate left"><i class="icon-dec-1"></i><span><b>{{$date->format('d')}}</b>.{{$date->format('m.Y')}}</span>
                          </div>
                        </div>
                      </div>

                      <div class="news2List">
                        <ul>
                          <?php foreach ($news as $newsItem): ?>
                          <li>
                            <div class="news2Box">
                              <div class="news2Image">
                                <a href="{{route('news.show', ['name' => $newsItem->url])}}" style="height: 170px">
                                  <div
                                    style="background-image:url('{{getMedium($newsItem->image)}}'); background-size: auto 100%"
                                    class="imgBox"></div>
                                  <div class="arrowHover"><img src="{{asset('/images/icons/arrow-ellips.png')}}"
                                                               alt=""/></div>
                                </a>
                              </div>
                              <div class="news2Title">
                                <a href="{{route('news.show', ['name' => $newsItem->url])}}">{{$newsItem->title}}</a>
                              </div>
                              <div class="news2Footer">
                                <?php $date = new \DateTime($newsItem->date); ?>
                                <div class="newsDate left"><i class="icon-dec-1"></i><span><b>{{$date->format('d')}}</b>.{{$date->format('m.Y')}}</span>
                                </div>
                              </div>
                            </div>
                          </li>
                          <?php endforeach ?>
                        </ul>
                      </div>
                      <?php endif ?>
                    </div>
                  </div>
                  <?php endif ?>
                </div>
              </div>
              <label class="nav tabsLabel" for="newsTabs">
                <span>{{__('main.Новости')}}</span>
              </label>

              <input name="nav" type="radio" class="photoGalleryTabs-radio" id="photoGalleryTabs"/>
              <div class="page photoGalleryTabs-page">
                <div class="page-contents">
                  <?php if (count($photoGallery)): ?>
                  <?php foreach ($photoGallery['items'] as $photo): ?>
                  <a class="example-image-link" href="{{getMedium($photo->image)}}" data-lightbox="example-set"
                     data-title="Click the right half of the image to move forward.">
                    <img class="photoGallery-images" src="{{getMedium($photo->image)}}" alt=""/>
                  </a>
                  <?php endforeach ?>
                  <?php else: ?>
                  <span>Нет фото</span>
                  <?php endif ?>
                </div>
              </div>
              <label class="nav tabsLabel" for="photoGalleryTabs">
                <?php if (count($photoGallery)): ?>
                <span>{{ $photoGallery['title'] }}</span>
                <?php else: ?>
                <span>Фотогалерея</span>
                <?php endif ?>
              </label>
            </div>
          </div>
        </div>
      </div>
      <div class="allRecords allNews">
        <div class="borderedDec"></div>
        <a href="{{route('news')}}" class="btn0 btn1"><span>{{__('main.Все новости')}}</span><i
            class="icon-dots-arrow-min-right"></i></a>
      </div>
    </div>
    {{--end of tabs end gallery--}}


    <?php if (count($infographics) && count($infographics['items'])): ?>
    <div class="textCenter sectionTitle">
      <h3 class="title title-22">
        {{ $infographics['title'] }}
      </h3>
    </div>
    <div class="infographics sliderLinksSites">
      <div class="minContainer">
        <div class="infographicsList">
          <ul class="sliderSites owl-carousel owl-theme">
            <?php foreach ($infographics['items'] as $infographic): ?>
            <li>
              <div class="infographicItem">
                <a class="example-image-link" href="{{getMedium($infographic->image)}}" data-lightbox="example-set"
                   data-title="Click the right half of the image to move forward.">
                  <div class="imgBox" style="background-image: url({{getMedium($infographic->image)}});"></div>

                </a>
              </div>
            </li>
            <?php endforeach ?>
          </ul>
        </div>
      </div>
    </div>
    <br>
    <br>
    <?php endif ?>

    <?php if (count($partners) && count($partners['items'])): ?>
    <div class="textCenter sectionTitle">
      <h3 class="title title-22">
        {{ $partners['title'] }}
      </h3>
    </div>
    <div class="partners sliderLinksSites">
      <div class="minContainer">
        <div class="infographicsList">
          <ul class="sliderSites owl-carousel owl-theme">
            <?php foreach ($partners['items'] as $partner): ?>
            <li>
              <div class="infographicItem">
                <a href="{{$partner->url}}" target="_blank">
                  <div class="imgBox" style="background-image: url({{getMedium($partner->image)}});"></div>
                </a>
              </div>
            </li>
            <?php endforeach ?>
          </ul>
        </div>
      </div>
    </div>
    <br>
    <br>
    <?php endif ?>

    <div class="textCenter sectionTitle">
      <h3 class="title title-22">{{__("main.Территориальные подразделения")}}</h3>
    </div>
    @include('layouts.map')
    @if ($linksSlider && count($linksSlider['items']) > 0)
      <div class="textCenter sectionTitle">
        <h3 class="title title-22">
          {{ $linksSlider['title'] }}
        </h3>
      </div>

      <div class="sliderLinksSites">
        <ul class="sliderSites owl-carousel owl-theme">
          @foreach ($linksSlider['items'] as $item)
            @if ($item->image)
              @if ($loop->index % 2 === 0)
                <li>
                  @endif
                  <div class="newsBox" style="margin: 1rem; box-shadow: 0 0 3px rgba(19, 69, 98, 0.2);">
                    <div class="newsImage">
                      <a href="{{ $item->url }}" target="_blank"
                         style="height: 100px; line-height: 100px; text-align: center;">
                        <img src="{{getFull($item->image)}}" alt="" style="max-width: 80%;">
                      </a>
                    </div>

                    <div class="textCenter newsTitle">
                      <a href="{{ $item->url }}" style="min-height: auto;" target="_blank">
                        <span>{{ $item->title }}</span>
                      </a>
                    </div>
                  </div>
                  @if ($loop->index % 2 === 1)
                </li>
              @endif
            @endif
          @endforeach
        </ul>
      </div>
    @endif
  </div>
@endsection
@section('additionalJsFiles')
  <!-- Resources -->
  <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
  <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
  <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

  {{--  <script>--}}
  {{--    let today = new Date();--}}
  {{--    let curr_year = today.getFullYear();--}}
  {{--    let curr_month = (today.getMonth()+1);--}}
  {{--    let curr_day = today.getDate();--}}

  {{--    let day_1 = new Date(curr_year, curr_month, curr_day);--}}

  {{--    let day_2 = new Date(2020, 10, 21);--}}

  {{--    function diffDates(day_one, day_two) {--}}
  {{--      return (day_one - day_two) / (60 * 60 * 24 * 1000);--}}
  {{--    }--}}

  {{--    if(diffDates(day_2, day_1) > 0)--}}
  {{--    {--}}
  {{--      document.getElementById('favouriteDayContent').style.visibility = "visible";--}}
  {{--    }else if(diffDates(day_2, day_1) === 0)--}}
  {{--    {--}}
  {{--      document.getElementById('favouriteDayContent').style.visibility = "visible";--}}
  {{--      document.getElementById('favouriteDayP').innerHTML = "21 октябрь - Ўзбек тили байрами куни!";--}}
  {{--    }--}}
  {{--    document.getElementById('diff_day').innerHTML = diffDates(day_2, day_1);--}}
  {{--  </script>--}}
  <script>
    let vid = document.getElementsByTagName("video")[0];
    if (typeof vid !== "undefined") {
      console.log(vid)
      vid.autoplay = true;
      vid.muted = "muted"
      vid.load();
    }
  </script>
  <!-- Chart code -->
  <script>
    am4core.ready(function () {

// Themes begin
      am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance

      var chart = am4core.create("chartdiv", am4charts.PieChart);

// Add data
      chart.radius = am4core.percent(55);
      chart.data = <?php echo json_encode($statistics_diagram); ?>;
      console.log(chart.data)
// Add and configure Series
      var pieSeries = chart.series.push(new am4charts.PieSeries());
      pieSeries.dataFields.value = "value";
      pieSeries.dataFields.category = "name";
      pieSeries.labels.template.text = "{category}: {value.value}" + " {{__('main.mln_people')}}";
      pieSeries.slices.template.tooltipText = "{category}: {value.value}" + " {{__('main.mln_people')}}";
      chart.legend.valueLabels.template.text = "{value.value}";
      pieSeries.slices.template.stroke = am4core.color("#fff");
      pieSeries.slices.template.strokeOpacity = 1;

// This creates initial animation
      pieSeries.hiddenState.properties.opacity = 1;
      pieSeries.hiddenState.properties.endAngle = -90;
      pieSeries.hiddenState.properties.startAngle = -90;

      chart.hiddenState.properties.radius = am4core.percent(0);


    }); // end am4core.ready()


    $(window).scroll(startCounter);


    function startCounter() {
      if ($(window).scrollTop() > 300) {
        $(window).off("scroll", startCounter);
        $('.rating-count').each(function () {
          var $this = $(this);
          jQuery({Counter: 0}).animate({Counter: $this.text()}, {
            duration: 4000,
            easing: 'swing',
            step: function () {
              if (isFloat($this.data('counter'))) {
                $this.text(Number.parseFloat(this.Counter).toFixed(1)/*Math.ceil(this.Counter)*/);
              } else {
                $this.text(Math.ceil(this.Counter));
              }
              // console.log(isFloat($this.data('counter')));
            }
          });
        });
      }
    }

    function isInt(n) {
      return Number(n) === n && n % 1 === 0;
    }

    function isFloat(n) {
      return Number(n) === n && n % 1 !== 0;
    }
  </script>
@endsection
