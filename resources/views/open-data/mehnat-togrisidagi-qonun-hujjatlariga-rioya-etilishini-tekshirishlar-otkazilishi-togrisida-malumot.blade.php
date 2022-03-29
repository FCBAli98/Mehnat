@extends('layouts.custom')

@section('content')
  <div class="container" style="margin: 20px auto">
    <div style="padding : 20px; text-align: center">
    @if($lang == 'uzbText')
    <h1>Mehnat to‘g‘risidagi qonun hujjatlariga rioya etilishini tekshirishlar o‘tkazilishi to‘g‘risida ma’lumot</h1>
    @elseif($lang == 'uzbKrText')
      <h1>Меҳнат тўғрисидаги қонун ҳужжатларига риоя этилишини текширишлар ўтказилиши тўғрисида маълумот</h1>
    @elseif($lang == 'engText')
      <h1>Information on the conducted checks for compliance with labor laws</h1>
    @else
      <h1>Информация о проведенных проверках на соответствие нормам трудового законодательства</h1>
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
          <td>{{$item['tableColumn']['Hududlar']['text'][$lang]}}</td>
          <td>{{$item['tableColumn']['Ishgaqabulqilishnirasmiylashtirmaslik']['number']}}</td>
          <td>{{$item['tableColumn']['Mehnatgahaqtolashda']['number']}}</td>
          <td>{{$item['tableColumn']['Mehnatdaftarchasiyuritilishida']['number']}}</td>
          <td>{{$item['tableColumn']['Ishdannoqonuniyboshatishda']['number']}}</td>
          <td>{{$item['tableColumn']['Boshishorinlaritogrisidagimalumotnitaqdimetmaslikyokiyashirish']['number']}}</td>
          <td>{{$item['tableColumn']['Boshqaqonunbuzarliklarboyicha']['number']}}</td>
        </tr>
      @endforeach
      </tbody>
    </table>

  </div>
@endsection
