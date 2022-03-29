@extends('layouts.custom')

@section('content')
  <div class="container" style="margin: 20px auto">
    <div class="container" style="margin: 20px auto">
      <div style="padding : 20px; text-align: center">
        @if($lang == 'uzbText')
          <h1>Mansabdor shaxslarning xizmat safarlari va xorijdan tashrif buyurgan mehmonlarni kutib olish xarajatlari (xizmat safarining yoki tashrifning maqsadi, sutkalik pul, transport va yashash bilan bog‘liq xarajatlar (davlat sirlari va xizmatda foydalanish uchun mo‘ljallangan ma’lumotlar bundan mustasno).</h1>
        @elseif($lang == 'uzbKrText')
          <h1>Мансабдор шахсларнинг хизмат сафарлари ва хориждан ташриф буюрган меҳмонларни кутиб олиш харажатлари (хизмат сафарининг ёки ташрифнинг мақсади, суткалик пул, транспорт ва яшаш билан боғлиқ харажатлар (давлат сирлари ва хизматда фойдаланиш учун мўлжалланган маълумотлар бундан мустасно).</h1>
        @elseif($lang == 'engText')
          <h1></h1>
        @else
          <h1>Расходы на служебные командировки должностных лиц и на прием гостей, прибывших из-за рубежа (цель служебной командировки или визита, расходы на суточные, транспорт и на проживание (за исключением государственных секретов и сведений, предназначенных для служебного пользования)</h1>
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
            <td>{{$item['tableColumn']['Nomlanishi']['text'][$lang]}}</td>
            <td>{{$item['tableColumn']['Harajatturi']['number']}}</td>
            <td>{{$item['tableColumn']['Reja']['number']}}</td>
            <td>{{$item['tableColumn']['Kassaharajati']['number']}}</td>
            <td>{{$item['tableColumn']['Qoldiq']['number']}}</td>
          </tr>
        @endforeach
        </tbody>
      </table>

    </div>
@endsection
