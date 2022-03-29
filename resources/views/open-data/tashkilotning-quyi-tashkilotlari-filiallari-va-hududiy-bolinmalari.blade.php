@extends('layouts.custom')

@section('content')
  <div class="container" style="margin: 20px auto">
    <div class="container" style="margin: 20px auto">
      <div style="padding : 20px; text-align: center">
        @if($lang == 'uzbText')
          <h1>Tashkilotning quyi tashkilotlari, filiallari va hududiy bo‘linmalari (nomi, joylashgan joyi, ish tartibi, aholi bilan ishlash bo‘yicha telefon raqamlari, rasmiy veb-sayti, elektron pochta manzili, rahbarning F.I.Sh., geografik joylashuvi) haqida ma’lumotlar</h1>
        @elseif($lang == 'uzbKrText')
          <h1>Ташкилотнинг қуйи ташкилотлари, филиаллари ва ҳудудий бўлинмалари (номи, жойлашган жойи, иш тартиби, аҳоли билан ишлаш бўйича телефон рақамлари, расмий веб-сайти, электрон почта манзили, раҳбарнинг Ф.И.Ш., географик жойлашуви) ҳақида маълумотлар
          </h1>
        @elseif($lang == 'engText')
          <h1></h1>
        @else
          <h1>Информация о подведомственных организациях, филиалах и региональных подразделениях организации (наименование, место расположения, режим работы, контактные телефоны по работе с населением, официальный сайт, адрес электронной почты, Ф.И.О. руководителя, геопозиция)
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
            <td>{{$item['tableColumn']['Tashkilotnomi']['text'][$lang]}}</td>
            <td>{{$item['tableColumn']['rahbarningFIOsi']['text'][$lang]}}</td>
            <td>{{$item['tableColumn']['Joylashganmanzili']['text'][$lang]}}</td>
            <td>{{$item['tableColumn']['Ishkunlari']['text'][$lang]}}</td>
            <td>{{$item['tableColumn']['Telefonraqam']['data']}}</td>
            <td>{{$item['tableColumn']['Rasmiyvebsayt']['data']}}</td>
            <td>{{$item['tableColumn']['Emailmanzili']['data']}}</td>
            <td>{{$item['tableColumn']['Indeks']['data']}}</td>
            <td>{{$item['tableColumn']['latitude']['number']}}</td>
            <td>{{$item['tableColumn']['longitude']['number']}}</td>
          </tr>
        @endforeach
        </tbody>
      </table>

    </div>
@endsection
