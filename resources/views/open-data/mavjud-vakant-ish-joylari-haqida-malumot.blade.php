@extends('layouts.custom')

@section('content')
  <div class="container" style="margin: 20px auto">
    <div class="container" style="margin: 20px auto">
      <div style="padding : 20px; text-align: center">
        @if($lang == 'uzbText')
          <h1>Chet elda ishlash uchun shartnoma shartlari haqida ma’lumot</h1>
        @elseif($lang == 'uzbKrText')
          <h1>Мавжуд вакант иш жойлари ҳақида маълумот</h1>
        @elseif($lang == 'engText')
          <h1></h1>
        @else
          <h1>Информация об имеющихся вакантных должностях</h1>
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
            <td>{{$item['tableColumn']['Tashkilotnomi']['text'][$lang]}}</td>
            <td>{{$item['tableColumn']['Tasdiqlanganshtatbirligi']['number']}}</td>
            <td>{{$item['tableColumn']['Boshishorinlari']['number']}}</td>
          </tr>
        @endforeach
        </tbody>
      </table>

    </div>
@endsection
