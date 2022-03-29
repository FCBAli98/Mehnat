@extends('layouts.custom')

@section('content')
  <div class="container" style="margin: 20px auto">
    <div class="container" style="margin: 20px auto">
      <div style="padding : 20px; text-align: center">
        @if($lang == 'uzbText')
          <h1>Mehnatni muxofaza qilish sohasidagi xizmatlar bozorining professional ishtirokchilari yagona reyestri</h1>
        @elseif($lang == 'uzbKrText')
          <h1>Меҳнатни мухофаза қилиш соҳасидаги хизматлар бозорининг профессионал иштирокчилари ягона реестри
          </h1>
        @elseif($lang == 'engText')
          <h1></h1>
        @else
          <h1>Единый реестр профессиональных участников рынка услуг в сфере охраны труда</h1>
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
            <td>{{$item['tableColumn']['Tashkilotningnomi']['text'][$lang]}}</td>
            <td>{{$item['tableColumn']['Faoliyatturi']['text'][$lang]}}</td>
            <td>{{$item['tableColumn']['Telefonraqami']['data']}}</td>
            <td>{{$item['tableColumn']['STIRraqami']['number']}}</td>
            <td>{{$item['tableColumn']['Reestrraqami']['data']}}</td>
          </tr>
        @endforeach
        </tbody>
      </table>

    </div>
@endsection
