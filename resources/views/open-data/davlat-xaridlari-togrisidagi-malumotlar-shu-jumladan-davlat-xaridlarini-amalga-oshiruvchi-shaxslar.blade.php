@extends('layouts.custom')

@section('content')
  <div class="container" style="margin: 20px auto">
    <div class="container" style="margin: 20px auto">
      <div style="padding : 20px; text-align: center">
        @if($lang == 'uzbText')
          <h1>Davlat xaridlari to‘g‘risidagi ma’lumotlar, shu jumladan davlat xaridlarini amalga oshiruvchi shaxslar tomonidan to‘g‘ridan to‘g‘ri shartnomalar bo‘yicha xarid qilinadigan tovarlar (ishlar, xizmatlar).</h1>
        @elseif($lang == 'uzbKrText')
          <h1>Давлат харидлари тўғрисидаги маълумотлар, шу жумладан давлат харидларини амалга оширувчи шахслар томонидан тўғридан-тўғри шартномалар бўйича харид қилинадиган товарлар (ишлар, хизматлар).
          </h1>
        @elseif($lang == 'engText')
          <h1></h1>
        @else
          <h1>Сведения о государственных закупках, в том числе о товарах (работах, услугах), приобретаемых лицами, осуществляющими государственные закупки по прямым договорам.</h1>
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
            <td>{{$item['tableColumn']['Shartnomaraqami']['data']}}</td>
            <td>{{$item['tableColumn']['Shartnomasanasi']['data']}}</td>
            <td>{{$item['tableColumn']['Maxsulottovarishxizmatnomi']['text'][$lang]}}</td>
            <td>{{$item['tableColumn']['Olchovbirligi']['text'][$lang]}}</td>
            <td>{{$item['tableColumn']['Soni']['number']}}</td>
            <td>{{$item['tableColumn']['Summasimingsom']['number']}}</td>
            <td>{{$item['tableColumn']['Jamimingsom']['number']}}</td>
          </tr>
        @endforeach
        </tbody>
      </table>

    </div>
@endsection
