@extends('layouts.app')

@section('title', "Yillik hisobot")

@section('content')

  <div class="container" style="margin: 20px auto; width: 70%">
      <div style="padding : 20px; text-align: center">
        <div class="middleContainer" style="width: 100%; ">
          <div class="pageHead">
            <div style="color: lightgrey" class="borderedDec lightgrey"></div>
          </div>
          <div class="breadcrumbs1">
            <ul>
              <li>
                <a href="{{route('home')}}">{{__('main.home')}}</a>
              </li>
            </ul>
          </div>
          <h2>Ўзбекистон Республикаси Бандлик ва меҳнат муносабатлари вазирилги тизимида мавжуд штат бирликлари ва ишловчи ходимлар сони тўғрисида маълумот (01.10.2021й)
          </h2>
          <table class="table table-bordered table-striped table-condensed" border="1">
            <thead>
            <tr>
              <th class="tg-0lax" rowspan="3">№</th>
              <th class="tg-0lax" rowspan="3">кўрсаткичлар (нафар)</th>
              <th class="tg-0lax" colspan="2" rowspan="2">Жами</th>
              <th class="tg-0lax" colspan="2" rowspan="2">вазирлик</th>
              <th class="tg-0lax" colspan="2" rowspan="2">тасарруфий</th>
              <th class="tg-0lax" colspan="2" rowspan="2">худудий бошкармалар</th>
              <th class="tg-0lax" colspan="2" rowspan="2">МОНО марказлар</th>
              <th class="tg-0lax" colspan="2" rowspan="2">Касбга укитиш марказлари</th>
            </tr>
            <tr>
            </tr>
            <tr>
              <th class="tg-0lax">жами</th>
              <th class="tg-0lax">шундан&nbsp;&nbsp;&nbsp;аёллар</th>
              <th class="tg-0lax">жами</th>
              <th class="tg-0lax">шундан&nbsp;&nbsp;&nbsp;аёллар</th>
              <th class="tg-0lax">жами</th>
              <th class="tg-0lax">шундан&nbsp;&nbsp;&nbsp;аёллар</th>
              <th class="tg-0lax">жами</th>
              <th class="tg-0lax">шундан&nbsp;&nbsp;&nbsp;аёллар</th>
              <th class="tg-0lax">жами</th>
              <th class="tg-0lax">шундан&nbsp;&nbsp;&nbsp;аёллар</th>
              <th class="tg-0lax">жами</th>
              <th class="tg-0lax">шундан&nbsp;&nbsp;&nbsp;аёллар</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td class="tg-0lax">1</td>
              <td class="tg-0lax">2</td>
              <td class="tg-0lax">3</td>
              <td class="tg-0lax">4</td>
              <td class="tg-0lax">5</td>
              <td class="tg-0lax">6</td>
              <td class="tg-0lax">7</td>
              <td class="tg-0lax">8</td>
              <td class="tg-0lax">9</td>
              <td class="tg-0lax">10</td>
              <td class="tg-0lax">11</td>
              <td class="tg-0lax">12</td>
              <td class="tg-0lax">13</td>
              <td class="tg-0lax">14</td>
            </tr>
            <tr>
              <td class="tg-0lax">1</td>
              <td class="tg-0lax">тасдиқланган&nbsp;&nbsp;&nbsp;штат бирлиги бўйича</td>
              <td class="tg-0lax">0,0</td>
              <td class="tg-0lax">х</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">х</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">х</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">х</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">х</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">х</td>
            </tr>
            <tr>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">шундан&nbsp;&nbsp;&nbsp;бошкарув ходимлари</td>
              <td class="tg-0lax">0,0</td>
              <td class="tg-0lax">х</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">х</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">х</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">х</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">х</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">х</td>
            </tr>
            <tr>
              <td class="tg-0lax"> 1.1</td>
              <td class="tg-0lax">Ҳақиқатда&nbsp;&nbsp;&nbsp;банд ходимлар сони</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
            </tr>
            <tr>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">шундан&nbsp;&nbsp;&nbsp;бошкарув ходимлари</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
            </tr>
            <tr>
              <td class="tg-0lax"> 1.2</td>
              <td class="tg-0lax">вакант</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">х</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">х</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">х</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">х</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">х</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">х</td>
            </tr>
            <tr>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">шундан&nbsp;&nbsp;&nbsp;бошкарув ходимлари</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">х</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">х</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">х</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">х</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">х</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">х</td>
            </tr>
            <tr>
              <td class="tg-0lax">2*</td>
              <td class="tg-0lax">Ходимлар&nbsp;&nbsp;&nbsp;ёши бўйича</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
            </tr>
            <tr>
              <td class="tg-0lax" colspan="2">контрол</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
            </tr>
            <tr>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">25&nbsp;&nbsp;&nbsp;ёшгача</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
            </tr>
            <tr>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">шундан&nbsp;&nbsp;&nbsp;бошқарув ходимлари</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
            </tr>
            <tr>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">25-30&nbsp;&nbsp;&nbsp;ёшгача</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
            </tr>
            <tr>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">шундан&nbsp;&nbsp;&nbsp;бошқарув ходимлари</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
            </tr>
            <tr>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">30-35&nbsp;&nbsp;&nbsp;ёшгача</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
            </tr>
            <tr>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">35-40&nbsp;&nbsp;&nbsp;ёшгача</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
            </tr>
            <tr>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">40-45&nbsp;&nbsp;&nbsp;ёшгача</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
            </tr>
            <tr>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">45-50&nbsp;&nbsp;&nbsp;ёшгача</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
            </tr>
            <tr>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">50-55&nbsp;&nbsp;&nbsp;ёшгача</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
            </tr>
            <tr>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">55-60&nbsp;&nbsp;&nbsp;ёшгача</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
            </tr>
            <tr>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">60&nbsp;&nbsp;&nbsp;ёш ва ундан катта</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
            </tr>
            <tr>
              <td class="tg-0lax">2, 2</td>
              <td class="tg-0lax">ходимлар&nbsp;&nbsp;&nbsp;миллати бўйича</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
            </tr>
            <tr>
              <td class="tg-0lax" colspan="2">контрол</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
            </tr>
            <tr>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">ўзбек</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
            </tr>
            <tr>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">рус</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
            </tr>
            <tr>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">козок</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
            </tr>
            <tr>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">татар</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
            </tr>
            <tr>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">тожик</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
            </tr>
            <tr>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">бошқалар</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
            </tr>
            <tr>
              <td class="tg-0lax">3*</td>
              <td class="tg-0lax">Маълумоти&nbsp;&nbsp;&nbsp;бўйича</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
            </tr>
            <tr>
              <td class="tg-0lax" colspan="2">контрол</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
            </tr>
            <tr>
              <td class="tg-0lax"> 3.1</td>
              <td class="tg-0lax">олий&nbsp;&nbsp;&nbsp;маълумотли</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
            </tr>
            <tr>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">иқтисодчи</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
            </tr>
            <tr>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">мухандис</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
            </tr>
            <tr>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">хуқуқшунос</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
            </tr>
            <tr>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">педогог</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
            </tr>
            <tr>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">қурувчи</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
            </tr>
            <tr>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">бошқалар</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
            </tr>
            <tr>
              <td class="tg-0lax"> 3.2</td>
              <td class="tg-0lax">ўрта&nbsp;&nbsp;&nbsp;махсус маълумотли</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
            </tr>
            <tr>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">хисобчи</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
            </tr>
            <tr>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">хуқуқшунос</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
            </tr>
            <tr>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">педогог</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
            </tr>
            <tr>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">бошқалар</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
            </tr>
            <tr>
              <td class="tg-0lax"> 3.3</td>
              <td class="tg-0lax">тўлиқсиз&nbsp;&nbsp;&nbsp;олий</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
            </tr>
            <tr>
              <td class="tg-0lax"> 3.4</td>
              <td class="tg-0lax">ўрта&nbsp;&nbsp;&nbsp;маълумотли</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
            </tr>
            <tr>
              <td class="tg-0lax">4</td>
              <td class="tg-0lax">Соҳадаги&nbsp;&nbsp;&nbsp;иш стажи</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
            </tr>
            <tr>
              <td class="tg-0lax" colspan="2">контрол</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
            </tr>
            <tr>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">1&nbsp;&nbsp;&nbsp;йилгача</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
            </tr>
            <tr>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">1-3&nbsp;&nbsp;&nbsp;йилгача</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
            </tr>
            <tr>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">3-5&nbsp;&nbsp;&nbsp;йилгача</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
            </tr>
            <tr>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">5&nbsp;&nbsp;&nbsp;йилдан ортиқ</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
            </tr>
            <tr>
              <td class="tg-0lax">5</td>
              <td class="tg-0lax">Йил&nbsp;&nbsp;&nbsp;давомида малака ошириш ва қисқа муддатли курсларда ўқиганлар</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
            </tr>
            <tr>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">Улардан&nbsp;&nbsp;&nbsp;вазирлик малака ошириш Республика курсида ўқиганлар</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
            </tr>
            <tr>
              <td class="tg-0lax">6</td>
              <td class="tg-0lax">Чет&nbsp;&nbsp;&nbsp;элга борганлар</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
            </tr>
            <tr>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">хизмат&nbsp;&nbsp;&nbsp;сафари</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
            </tr>
            <tr>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">шахсий&nbsp;&nbsp;&nbsp;масалада</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
            </tr>
            <tr>
              <td class="tg-0lax">7</td>
              <td class="tg-0lax">Интизомий&nbsp;&nbsp;&nbsp;жазо қўлланилган</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
            </tr>
            <tr>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">хайфсан</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
            </tr>
            <tr>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">Жарима</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
            </tr>
            <tr>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">меҳнат&nbsp;&nbsp;&nbsp;шартнмоаси бекор қилинган</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
            </tr>
            <tr>
              <td class="tg-0lax">8</td>
              <td class="tg-0lax">ишдан&nbsp;&nbsp;&nbsp;бўшаганлар</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
            </tr>
            <tr>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">пенсия&nbsp;&nbsp;&nbsp;ёшига етиши муносабати билан</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
            </tr>
            <tr>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">бошқа&nbsp;&nbsp;&nbsp;ишга ўтганлиги муносабати билан</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
            </tr>
            <tr>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">Ўз&nbsp;&nbsp;&nbsp;хохшига кўра</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
            </tr>
            <tr>
              <td class="tg-0lax">9</td>
              <td class="tg-0lax">хисобот даврида ишга қабул қилинганлар</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
            </tr>
            <tr>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">шундан&nbsp;&nbsp;&nbsp;30- ёшгача бўлган ёшлар</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
            </tr>
            <tr>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">ўрта&nbsp;&nbsp;&nbsp;маълумотли</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
            </tr>
            <tr>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">ўрта&nbsp;&nbsp;&nbsp;махсус маълумотли</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
            </tr>
            <tr>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">олий&nbsp;&nbsp;&nbsp;маълумотли</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax"></td>
            </tr>
            <tr>
              <td class="tg-0lax">10</td>
              <td class="tg-0lax">Қабул&nbsp;&nbsp;&nbsp;қилинган буйруқлар сони</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">х</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">х</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">х</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">х</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">х</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">х</td>
            </tr>
            <tr>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">кадрларга&nbsp;&nbsp;&nbsp;оид</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">х</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">х</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">х</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">х</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">х</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">х</td>
            </tr>
            <tr>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">ишлаб&nbsp;&nbsp;&nbsp;чиқаришга оид</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">х</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">х</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">х</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">х</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">х</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">х</td>
            </tr>
            <tr>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">хизмат&nbsp;&nbsp;&nbsp;сафарига оид</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">х</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">х</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">х</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">х</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">х</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">х</td>
            </tr>
            <tr>
              <td class="tg-0lax">11</td>
              <td class="tg-0lax">хисобот даврида оммавий ахборот воситаларида&nbsp;&nbsp;&nbsp;чиқишлар сони</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">х</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">х</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">х</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">х</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">х</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">х</td>
            </tr>
            <tr>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">телевидение</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">х</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">х</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">х</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">х</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">х</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">х</td>
            </tr>
            <tr>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">газета&nbsp;&nbsp;&nbsp;ва журналларда</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">х</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">х</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">х</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">х</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">х</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">х</td>
            </tr>
            <tr>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">интернет&nbsp;&nbsp;&nbsp;саҳифаларида</td>
              <td class="tg-0lax">0</td>
              <td class="tg-0lax">х</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">х</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">х</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">х</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">х</td>
              <td class="tg-0lax"></td>
              <td class="tg-0lax">х</td>
            </tr>
            </tbody>
          </table>
        </div>
      </div>
  </div>
@endsection
