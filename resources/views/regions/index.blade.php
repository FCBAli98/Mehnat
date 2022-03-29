@extends('layouts.app')

@section('title', __('main.home'))

@section('content')
  <div class="whiteSection">
    <div class="mainContainer">
      <div class="contentBlock firstContent">
        <div class="middleContainer">
          <div class="pageHead">
            <h2 class="title title-24">{!! __('main.ENST') !!}</h2>
            <div class="borderedDec grey"></div>
          </div>
          <div class="pageColls">
            <div class="row15">
              <div class="colp15-8">
                @include('layouts.map')
              </div>
              <div class="colp15-4">
                <p style="color: blue; text-align: center">
                  {{ __('main.enst_statistics') }}
                </p>
                <div style="display: inline-flex; margin-bottom: 3px">
                  <div class="colp5-4">
                    <img src="/images/regionsStatistics/legal.png" style="width: 80px" alt="" class="svg regionsStatisticsIcon"/>
                  </div>
                  <div class="colp5-8">
                    <h2 style="font-weight: bold; color: blue; text-align: center; margin-bottom: 4px">{{ $statistics['legal_count'] }}</h2>
                    {{ __('main.legal_count') }}
                  </div>
                </div>
                <div style="display: inline-flex; margin-bottom: 3px">
                  <div class="colp5-4">
                    <img src="/images/regionsStatistics/physical.png" style="width: 80px" alt="" class="svg regionsStatisticsIcon"/>
                  </div>
                  <div class="colp5-8">
                    <h2 style="font-weight: bold; color: blue; text-align: center; margin-bottom: 4px">{{ $statistics['physical_count'] }}</h2>
                    {{ __('main.physical_count') }}
                  </div>
                </div>
                <div style="display: inline-flex; margin-bottom: 3px">
                  <div class="colp5-4">
                    <img src="/images/regionsStatistics/male.png" style="width: 80px" alt="" class="svg regionsStatisticsIcon"/>
                  </div>
                  <div class="colp5-8">
                    <h2 style="font-weight: bold; color: blue; text-align: center; margin-bottom: 4px; width: 100%">{{ $statistics['male_count'] }}</h2>
                    {{ __('main.male_count') }}
                  </div>
                </div>
                <div style="display: inline-flex; margin-bottom: 3px">
                  <div class="colp5-4">
                    <img src="/images/regionsStatistics/female.png" style="width: 80px" alt="" class="svg regionsStatisticsIcon"/>
                  </div>
                  <div class="colp5-8">
                    <h2 style="font-weight: bold; color: blue; text-align: center; margin-bottom: 4px">{{ $statistics['female_count'] }}</h2>
                    {{ __('main.female_count') }}
                  </div>
                </div>
              </div>
            </div>
            <div class="row15" style="margin-top: 15px">
              <div class="sliderLinksSites">
                <ul class="sliderSites owl-carousel owl-theme">
                  <li>
                    <div class="newsBox" style="margin: 1rem; box-shadow: 0 0 3px rgba(19, 69, 98, 0.2); border: 2px solid blue; border-radius: 5px; max-height: 200px">
                      <div class="textCenter newsTitle">
                        <a href="/ru/pages/o-sisteme" style="min-height: auto;" target="_blank">
                          <span>{{ __('main.about_my_mehnat') }} </span>
                        </a>
                      </div>

                      <div class="newsImage">
                        <a href="/ru/pages/o-sisteme" target="_blank" style="height: 100px; line-height: 100px; text-align: center;">
                          <img src="/images/regionsStatistics/documentsIcon.png" alt="" style="max-width: 80px;">
                        </a>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="newsBox" style="margin: 1rem; box-shadow: 0 0 3px rgba(19, 69, 98, 0.2); border: 2px solid blue; border-radius: 5px; max-height: 200px">
                      <div class="textCenter newsTitle">
                        <a href="/ru/pages/edinaya-nacionalnaya-sistema-truda-video-uroki-po-polzovaniyu-saytom-mymehnatuz" style="min-height: auto;" target="_blank">
                          <span>{{ __('main.tutor_for_my_mehnat') }}</span>
                        </a>
                      </div>
                      <div class="newsImage">
                        <a href="/ru/pages/edinaya-nacionalnaya-sistema-truda-video-uroki-po-polzovaniyu-saytom-mymehnatuz" target="_blank" style="height: 100px; line-height: 10px; text-align: center;">
                          <img src="/images/regionsStatistics/videoPlayerIcon.png" alt="" style="width: 60px;">
                        </a>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="newsBox" style="margin: 1rem; box-shadow: 0 0 3px rgba(19, 69, 98, 0.2); border: 2px solid blue; border-radius: 5px; max-height: 200px">
                      <div class="textCenter newsTitle">
                        <a href="/ru/news#/novosti-enst" style="min-height: auto;" target="_blank">
                          <span>{{ __('main.Новости') }}</span>
                        </a>
                      </div>

                      <div class="newsImage">
                        <a href="/ru/news#/novosti-enst" target="_blank" style="height: 100px; line-height: 100px; text-align: center;">
                          <img src="/images/regionsStatistics/newsIcon.png" alt="" style="max-width: 80px;">
                        </a>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="staticPageFooter">
            <div class="title title-18 row5" style="border-top: 1px solid blue; border-bottom: 1px solid blue; padding-top: 10px">
              <div class="colp5-4">
                <a href="https://my.mehnat.uz" target="_blank" style="text-align: center; text-decoration: none">
                  <img src="/images/regionsStatistics/globe.png" alt="" style="max-width: 80px;">
                  my.mehnat.uz
                </a>
              </div>
              <div class="colp5-4">
                <p style="text-align: center;">
                  <img src="/images/regionsStatistics/phone.png" alt="" style="max-width: 80px;">
                  + 998 71 200 70 30
                </p>
              </div>
              <div class="colp5-4">
                <a href="https://t.me/joinchat/URlLmDSe1CID_05m" target="_blank" style="height: 100px; line-height: 12px; text-align: center; text-decoration: none">
                  <img src="/images/regionsStatistics/telegram.png" alt="" style="max-width: 80px;">
                  Телеграмда қўллаб-қувватлаш хизмати
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
