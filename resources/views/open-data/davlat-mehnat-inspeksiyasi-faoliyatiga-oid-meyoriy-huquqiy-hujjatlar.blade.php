@extends('layouts.custom')

@section('content')
  <div class="container" style="margin: 20px auto">
    <div class="container" style="margin: 20px auto">
      <div style="padding : 20px; text-align: center">
        @if($lang == 'uzbText')
          <h1>Davlat mehnat inspeksiyasi faoliyatiga oid me’yoriy-huquqiy hujjatlar</h1>
        @elseif($lang == 'uzbKrText')
          <h1>Давлат меҳнат инспекцияси фаолиятига оид меъёрий-ҳуқуқий ҳужжатлар
          </h1>
        @elseif($lang == 'engText')
          <h1></h1>
        @else
          <h1>Нормативно-правовые акты о деятельности Государственной инспекции труда</h1>
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
            <td>{{$item['tableColumn']['Норматив-ҳуқуқий хужжатларнинг номи']['text'][$lang]}}</td>
            <td>{{$item['tableColumn']['Hujjatraqami']['data']}}</td>
            <td>{{$item['tableColumn']['Hujjatsanasi']['data']}}</td>
          </tr>
        @endforeach
        </tbody>
      </table>

    </div>
@endsection
