@extends('layouts.admin')

@section('title', 'Cертификатлар - Кушиш')

@section('content')
<h2>Cертификатлар</h2>
@if(session('status'))
    <div class="alert alert-success" role="alert">
        {{ __('main.Успешно сохранено')}}
    </div>
@endif

<hr>
  <div class="clearfix">
      <div class="pull-left">
          <div class="btn-group group-control">
            <a href="{{ route('admin.attestations.index') }}" class="btn btn-default">{{__('main.Back')}}</a>
          </div>
      </div>
  </div>
  <br>
<div class="row">
  <form action="{{ route('admin.attestations.store') }}" method="post">
  @csrf()
    <div class="pd col-md-6">
      <label for="region_id">Вилоят номи</label>
      <select name="region_id" class="form-control" onchange="myFunction()" id="region_id">
          <option value="">- - -</option>
          @foreach($region as $region)
              <option value="{{ $region->id }}">{{ $region->name_cyrl }}</option>
          @endforeach
      </select>
    </div>
    <div class="pd col-md-6">
      <label for="city_id">Шахар номи</label>
      <select name="city_id" class="form-control" id="city_id">
          <!-- <option value="">- - -</optio n>
          @foreach($city as $city)
              <option value="{{ $city->id }}">{{ $city->name_cyrl }}</option>
          @endforeach -->
      </select>
    </div>
    <div class="pd col-md-6">
      <label for="">Давлат экспертизаси ҳулосасининг серияси ва рақами</label>
      <input required type="text" class="form-control" name="conclusion_number">
    </div>
    <div class="pd col-md-6">
      <label for="">Давлат экспертизаси ҳулосаси берилган сана</label>
      <input required type="date" class="form-control" name="conclusion_date">
    </div>
    <div class="pd col-md-12">
      <label for="">Иш ўринлари аттестациядан ўтказилган корхона номи</label>
      <textarea type="number" class="form-control" name="company_name"> </textarea>
    </div>
    <div class="pd col-md-4">
      <label for="">СТИР</label>
      <input required min="0" minlength="9" maxlength="9" type="number" class="form-control"  name="company_tin">
    </div>
    <div class="pd col-md-4">
      <label for="">XXTUT</label>
      <input required type="text" class="form-control" name="xxtut">
    </div>
    <div class="pd col-md-4">
      <label for="">MXBT</label>
      <input required type="text" class="form-control" name="mxbt">
    </div>
    <div class="pd col-md-6">
      <label for="">Иш ўринлари аттестациядан ўтказилган корхона манзили</label>
      <input required type="text" class="form-control"  name="company_id">
    </div>
    <div class="pd col-md-4">
      <label for="">Аттестациядан ўтказилган иш  ўринлар сони</label>
      <input    required type="number" min="0" class="form-control"  name="positions_count">
    </div>
    <div class="pd col-md-2">
      <label for="">шу жумладан ногиронлар</label>
      <input required type="number" min="0" class="form-control" name="number">
    </div>
    <div class="pd col-md-4">
      <label for="">Иш ўринларини  аттестациядан ўтказувчи корхона (лаборатория)номи</label>
      <input required type="text" class="form-control" name="attestation_company">
    </div>
    <div class="pd col-md-4">
      <label for="">Юридик манзили</label>
      <input required type="text" class="form-control"  name="attestation_address">
    </div>
    <div class="pd col-md-4">
      <label for="">СТИР</label>
      <input  maxlength="9" type="number" min="0" class="form-control" name="attestation_tin">
    </div>
    <div class="pd col-md-6">
      <label for="">Аккредитация гувоҳнома рақами </label>
      <input required type="text" class="form-control" name="certification_number">
    </div>
    <div class="pd col-md-2">
      <label for="">Гувоҳнома амал килиш муддати</label>
      <input required type="date" class="form-control" name="expired_at">
    </div>
    <div class="pd col-md-4">
      <label for="">Cумма </label>
      <input required type="number" min="0" class="form-control" name="payed_amount">
    </div>
    <div class="text-right">
    <input type="submit" class="btn btn-success" value="{{ __('main.Сохранить')}}">
    </div>
</form>
</div>
<script>
function myFunction() {
  clearSelect();
  var e = document.getElementById("region_id");
  var region_id = e.options[e.selectedIndex].value;
  console.log(region_id)
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      // create new option element
      select = document.getElementById('city_id');
      var arr = JSON.parse(this.responseText);
      // console.log(arr)
      for( var i=0; i<arr.length; i++)
      {
        var opt = document.createElement('option');
        opt.value = arr[i].id;
        opt.innerHTML = arr[i].name_cyrl;
        select.appendChild(opt);
      }
      // console.log(this.responseText)

    }
  };
  var url = '/get-city-by-region?region_id='+region_id;
  xhttp.open("get", url, true);
  xhttp.send();
}

function clearSelect()
{
  var select = document.getElementById("city_id");
  var length = select.options.length;
  for (i = length-1; i >= 0; i--) {
    select.options[i] = null;
  }
}
</script>
@endsection
 <style>
  .text-right{
    padding: 13px;
  }
  .pd{
    padding: 12px;
    margin-top: -4px;
  } 
 </style>