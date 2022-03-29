@extends('layouts.custom')

@section('content')
  <div class="container" style="margin: 20px auto">
    <div class="container" style="margin: 20px auto">
      <div style="padding : 20px; text-align: center">
        @if($lang == 'uzbText')
          <h1>2021 yildagi ish kunlari kalendari</h1>
        @elseif($lang == 'uzbKrText')
          <h1>Бандлик ва меҳнат муносабатлари вазирлигининг инвестиция лойиҳалари тўғрисида маълумот</h1>
        @elseif($lang == 'engText')
          <h1></h1>
        @else
          <h1>Информация об инвестиционных проектах министерства занятости и трудовых отношений Республики Узбекистан</h1>
        @endif
      </div>
      <table class="table table-bordered table-striped table-condensed">
        <thead>
        <tr>
          @foreach($result['result']['tableFields'] as $item)
            <td>{{$item['text'][$lang]}}</td>
          @endforeach
        </tr>
        </thead>
        <tbody>
        @foreach($result['result']['data'] as $item)
          <tr>
            <td>{{$item['tableColumn']['Лойиҳанинг номи']['text'][$lang]}}</td>
            <td>{{$item['tableColumn']['Loyihamuddati']['data']}}</td>
            <td>{{$item['tableColumn']['Лойиҳа қиймати']['text'][$lang]}}</td>
            <td>{{$item['tableColumn']['Лойиҳа тўғрисида қисқача маълумот']['text'][$lang]}}</td>
          </tr>
        @endforeach
        </tbody>
      </table>

    </div>
@endsection
