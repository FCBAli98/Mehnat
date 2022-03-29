@extends('layouts.custom')

@section('content')
  <div class="container" style="margin: 20px auto">
    <div class="container" style="margin: 20px auto">
      <div style="padding : 20px; text-align: center">
        @if($lang == 'uzbText')
          <h1>2021 yildagi ish kunlari kalendari</h1>
        @elseif($lang == 'uzbKrText')
          <h1>2021 йилдаги иш кунлари календари</h1>
        @elseif($lang == 'engText')
          <h1></h1>
        @else
          <h1>Календарь рабочих дней в 2021 году
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
            <td>{{$item['tableColumn']['Oylar']['text'][$lang]}}</td>
            <td>{{$item['tableColumn']['5kunlik40soatliishhaftasida']['number']}}</td>
            <td>{{$item['tableColumn']['6kunlik40soatliishhaftasida']['number']}}</td>
            <td>{{$item['tableColumn']['36soatliishhaftasida']['number']}}</td>
            <td>{{$item['tableColumn']['5kunlikishhaftasidagiishkunlarsoni']['number']}}</td>
            <td>{{$item['tableColumn']['6kunlikishhaftasidagiishkunlarsoni']['number']}}</td>
        </tr>
      @endforeach
      </tbody>
    </table>

  </div>
@endsection
