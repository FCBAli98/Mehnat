@extends('layouts.custom')

@section('content')
  <div class="container" style="margin: 20px auto">
    <div class="container" style="margin: 20px auto">
      <div style="padding : 20px; text-align: center">
        @if($lang == 'uzbText')
          <h1>Xorijga mehnat faoliyatini amalga oshirish uchun ketayotgan O’zbekiston Respublikasi fuqarolarining bilimini baholash markazlari reyestri</h1>
        @elseif($lang == 'uzbKrText')
          <h1>Хорижга меҳнат фаолиятини амалга ошириш учун кетаётган Ўзбекистон Республикаси фуқароларининг билимини баҳолаш марказлари реестри</h1>
        @elseif($lang == 'engText')
          <h1></h1>
        @else
          <h1>Реестр Оценки знаний граждан Республики Узбекистан, выезжающих за рубеж для осуществления трудовой деятельности</h1>
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
            <td>{{$item['tableColumn']['Bilimnibaholashmarkazinomi']['text'][$lang]}}</td>
            <td>{{$item['tableColumn']['Manzili']['text'][$lang]}}</td>
            <td>{{$item['tableColumn']['Telefonraqami']['data']}}</td>
            <td>{{$item['tableColumn']['Reyestrraqami']['number']}}</td>
            <td>{{$item['tableColumn']['Guvohnomaraqamivasanasi']['data']}}</td>
          </tr>
        @endforeach
        </tbody>
      </table>

    </div>
@endsection
