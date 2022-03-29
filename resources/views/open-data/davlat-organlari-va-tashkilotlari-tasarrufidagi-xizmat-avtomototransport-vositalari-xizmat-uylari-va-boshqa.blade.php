@extends('layouts.custom')

@section('content')
  <div class="container" style="margin: 20px auto">
    <div class="container" style="margin: 20px auto">
      <div style="padding : 20px; text-align: center">
        @if($lang == 'uzbText')
          <h1>Davlat organlari va tashkilotlari tasarrufidagi xizmat avtomototransport vositalari, xizmat uylari va boshqa ko‘chmas mulklar to‘g‘risidagi ma’lumotlar (tezkor-qidiruv, harbiy va boshqa maxsus xizmatlarda foydalaniladigan ashyolar bundan mustasno).</h1>
        @elseif($lang == 'uzbKrText')
          <h1>Давлат органлари ва ташкилотлари тасарруфидаги хизмат автомототранспорт воситалари, хизмат уйлари ва бошқа кўчмас мулклар тўғрисидаги маълумотлар (тезкор-қидирув, ҳарбий ва бошқа махсус хизматларда фойдаланиладиган ашёлар бундан мустасно).</h1>
        @elseif($lang == 'engText')
          <h1></h1>
        @else
          <h1>Сведения о служебных автомототранспортных средствах, служебном жилье и другом недвижимом имуществе, находящихся в распоряжении государственных органов и организаций (за исключением вещей, используемых в оперативно-розыскных, военных и других специальных службах).</h1>
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
            <td>{{$item['tableColumn']['TR']['data']}}</td>
            <td>{{$item['tableColumn']['Avtoulovnomi']['text'][$lang]}}</td>
            <td>{{$item['tableColumn']['Davlatraqami']['text'][$lang]}}</td>
            <td>{{$item['tableColumn']['Rangi']['text'][$lang]}}</td>
            <td>{{$item['tableColumn']['Lavozimlarnomi']['text'][$lang]}}</td><s></s>
          </tr>
        @endforeach
        </tbody>
      </table>

    </div>
@endsection
