@extends('layouts.custom')

@section('content')
  <div class="container" style="margin: 20px auto">
    <div class="container" style="margin: 20px auto">
      <div style="padding : 20px; text-align: center">
        @if($lang == 'uzbText')
          <h1>Chet elda ishlash uchun shartnoma shartlari haqida ma’lumot</h1>
        @elseif($lang == 'uzbKrText')
          <h1>Чет элда ишлаш учун шартнома шартлари ҳақида маълумот</h1>
        @elseif($lang == 'engText')
          <h1></h1>
        @else
          <h1>Информация о требованиях для заключения контракта для работы за рубежом
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
            <td>{{$item['tableColumn']['Xorijiydavlatlardavaqtinchalikmehnatfaoliyatiniamalgaoshirishshartlari']['text'][$lang]}}</td>
          </tr>
        @endforeach
        </tbody>
      </table>

    </div>
@endsection
