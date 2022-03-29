@extends('layouts.custom')

@section('content')
  <div class="container" style="margin: 20px auto">
    <div class="container" style="margin: 20px auto">
      <div style="padding : 20px; text-align: center">
        @if($lang == 'uzbText')
          <h1>Vazirlikning choraklik, yarim yillik va yillik hisobotlari</h1>
        @elseif($lang == 'uzbKrText')
          <h1>Вазирликнинг чораклик, ярим йиллик ва йиллик ҳисоботлари</h1>
        @elseif($lang == 'engText')
          <h1></h1>
        @else
          <h1>Ежеквартальные, полуежегодно и ежегодно отчеты Министерства</h1>
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
            <td>{{$item['tableColumn']['Hududlarnomi']['text'][$lang]}}</td>
            <td>{{$item['tableColumn']['Jamikorsatilganxizmatlar']['number']}}</td>
            <td>{{$item['tableColumn']['Ishgajoylashganlar']['number']}}</td>
            <td>{{$item['tableColumn']['Jamoatishigajalbetilganlar']['number']}}</td>
            <td>{{$item['tableColumn']['Kasbgaoqitilganlar']['number']}}</td>
            <td>{{$item['tableColumn']['Ajratilgansubsidiyalar']['number']}}</td>
            <td>{{$item['tableColumn']['Ishsizliknafaqasitayinlanganlarsoni']['number']}}</td>
          </tr>
        @endforeach
        </tbody>
      </table>

    </div>
@endsection
