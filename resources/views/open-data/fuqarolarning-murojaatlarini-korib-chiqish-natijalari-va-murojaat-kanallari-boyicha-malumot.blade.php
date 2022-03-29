@extends('layouts.custom')

@section('content')
  <div class="container" style="margin: 20px auto">
    <div class="container" style="margin: 20px auto">
      <div style="padding : 20px; text-align: center">
        @if($lang == 'uzbText')
          <h1>Fuqarolarning murojaatlarini ko‘rib chiqish natijalari va murojaat kanallari bo‘yicha ma’lumot (telefon, yozma ravishda, veb-sayt va elektron pochta orqali)</h1>
        @elseif($lang == 'uzbKrText')
          <h1>Фуқароларнинг мурожаатларини кўриб чиқиш натижалари ва мурожаат каналлари бўйича маълумот (телефон, ёзма равишда, веб-сайт ва электрон почта орқали)</h1>
        @elseif($lang == 'engText')
          <h1></h1>
        @else
          <h1>Информация об обращениях граждан в разрезе результатов их рассмотрения и каналов обращения (по телефону, письменно, через веб-сайт, по электронной почте)
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
            <td>{{$item['tableColumn']['2021yilning3choragidavomidakelibtushganmurojaatlarnikoribchiqishnatijalaritogrisida']['text'][$lang]}}</td>
            <td>{{$item['tableColumn']['Soni']['number']}}</td>
          </tr>
        @endforeach
        </tbody>
      </table>

    </div>
@endsection
