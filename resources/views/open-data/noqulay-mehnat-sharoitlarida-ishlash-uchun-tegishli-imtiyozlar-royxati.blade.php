@extends('layouts.custom')

@section('content')
  <div class="container" style="margin: 20px auto">
    <div class="container" style="margin: 20px auto">
      <div style="padding : 20px; text-align: center">
        @if($lang == 'uzbText')
          <h1>2021 yildagi ish kunlari kalendari</h1>
        @elseif($lang == 'uzbKrText')
          <h1>Ноқулай меҳнат шароитларида ишлаш учун тегишли имтиёзлар рўйхати
          </h1>
        @elseif($lang == 'engText')
          <h1></h1>
        @else
          <h1>Действующие списки льгот за работу в неблагоприятных условиях труда</h1>
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
            <td>{{$item['tableColumn']['Noqulaymehnatsharoitlaridaishlashuchuntegishliimtiyozlarroyxati']['text'][$lang]}}</td>
          </tr>
        @endforeach
        </tbody>
      </table>

    </div>
@endsection
