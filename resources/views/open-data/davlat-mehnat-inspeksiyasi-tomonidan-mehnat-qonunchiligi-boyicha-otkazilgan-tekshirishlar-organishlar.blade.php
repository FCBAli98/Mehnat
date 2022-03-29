@extends('layouts.custom')

@section('content')
  <div class="container" style="margin: 20px auto">
    <div class="container" style="margin: 20px auto">
      <div style="padding : 20px; text-align: center">
        @if($lang == 'uzbText')
          <h1>Davlat mehnat inspeksiyasi tomonidan mehnat qonunchiligi bo‘yicha o‘tkazilgan tekshirishlar (o‘rganishlar)</h1>
        @elseif($lang == 'uzbKrText')
          <h1>Давлат меҳнат инспекцияси томонидан меҳнат қонунчилиги бўйича ўтказилган текширишлар (ўрганишлар)</h1>
        @elseif($lang == 'engText')
          <h1></h1>
        @else
          <h1>Проверки (изучения) по вопросам трудового законодательства, проводимой государственной инспекцией труда</h1>
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
            <td>{{$item['tableColumn']['Ҳудудлар']['text'][$lang]}}</td>
            <td>{{$item['tableColumn']['Jamiotkazilgantekshirishvaorganishlarsoni']['number']}}</td>
            <td>{{$item['tableColumn']['Aniqlanganqonunbuzilishlarsoni']['number']}}</td>
            <td>{{$item['tableColumn']['Berilganyozmakorsatmalarsoni']['number']}}</td>
            <td>{{$item['tableColumn']['Kiritilgantaqdimnomalarsoni']['number']}}</td>
          </tr>
        @endforeach
        </tbody>
      </table>

    </div>
@endsection
