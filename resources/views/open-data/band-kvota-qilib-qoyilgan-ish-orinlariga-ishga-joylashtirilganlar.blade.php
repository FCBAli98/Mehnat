@extends('layouts.custom')

@section('content')
  <div class="container" style="margin: 20px auto">
    <div class="container" style="margin: 20px auto">
      <div style="padding : 20px; text-align: center">
        @if($lang == 'uzbText')
          <h1>Band (kvota) qilib qo‘yilgan ish o‘rinlariga ishga joylashtirilganlar</h1>
        @elseif($lang == 'uzbKrText')
          <h1>Банд (квота) қилиб қўйилган иш ўринларига ишга жойлаштирилганлар</h1>
        @elseif($lang == 'engText')
          <h1></h1>
        @else
          <h1>Трудоустроенные на зарезервированные (квотированные) рабочие места
          </h1>
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
            <td>{{$item['tableColumn']['ID']['data']}}</td>
            <td>{{$item['tableColumn']['Ҳудудлар номи']['text'][$lang]}}</td>
            <td>{{$item['tableColumn']['Bandqilinganishorinlarisoni']['number']}}</td>
            <td>{{$item['tableColumn']['shujumladannogironlaruchun']['number']}}</td>
            <td>{{$item['tableColumn']['Jamiishgajoylashganlar']['number']}}</td>
            <td>{{$item['tableColumn']['shujumladannogironlar']['number']}}</td>
          </tr>
        @endforeach
        </tbody>
      </table>

    </div>
@endsection
