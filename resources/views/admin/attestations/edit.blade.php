@extends('layouts.admin')

@section('title', 'Cертификатлар - Кушиш')

@section('content')
<h2>Cертификатлар</h2>
<hr>
  <div class="clearfix">
      <div class="pull-left">
          <div class="btn-group group-control">
            <a href="{{ route('admin.attestations.index') }}" class="btn btn-default">{{__('main.Back')}}</a>
          </div>
      </div>
  </div>
  <br>
  

  <form action="{{route('admin.attestations.update', ['id' => $attestation->id]) }}" method="POST">
  @csrf()
  @method('patch')
  <div class="row">
     
        <div class="pd col-md-6">
          <label for="region_id">Вилоят номи</label>
          <select name="region_id" class="form-control" onchange="myFunction()" id="region_id">
              <option value="">- - -</option>
              @foreach($region as $region)
                  <option value="{{ $region->id }}"{{ ($attestation->region_id == $region->id) ? 'selected' : ''}}>{{ $region->name_cyrl }}</option>
              @endforeach
          </select>
        </div>
      
        <div class="pd col-md-6">
          <label for="city_id">Шахар номи</label>
          <select name="city_id" class="form-control" id="city_id">
              <option value="">- - -</option>
              @foreach($city as $city)
                  <option value="{{ $city->id }}" {{ ($attestation->city_id == $city->id) ? 'selected' : ''}}>{{ $city->name_cyrl }}</option>
              @endforeach
          </select>
        </div>
      <!-- 123 -->
  
    <div class="pd col-md-6">
      <label for="">Давлат экспертизаси ҳулосасининг серияси ва рақами</label>
      <input required type="text" class="form-control" name="conclusion_number" value="{{ $attestation->conclusion_number }}">
    </div>
    <div class="pd col-md-6">
      <label for="">Давлат экспертизаси ҳулосаси берилган сана</label>
      <input required type="date" class="form-control" name="conclusion_date" value="{{ $attestation->conclusion_date }}">
    </div>
    <div class="pd col-md-12">
      <label for="">Иш ўринлари аттестациядан ўтказилган корхона номи</label>
      <input required type="text" class="form-control" name="company_name" value="{{ $attestation->company_name }}">
    </div>
  
    <div class="pd col-md-4">
      <label for="">СТИР</label>
      <input required type="text" class="form-control"  name="company_tin" value="{{ $attestation->company_tin }}">
    </div>
    <div class="pd col-md-4">
      <label for="">XXTUT</label>
      <input required type="text" class="form-control" name="xxtut" value="{{ $attestation->xxtut }}">
    </div>
    <div class="pd col-md-4">
      <label for="">MXBT</label>
      <input required type="text" class="form-control" name="mxbt" value="{{ $attestation->mxbt }}">
    </div>

    <div class="pd col-md-6">
      <label for="">Иш ўринлари аттестациядан ўтказилган корхона манзили</label>
      <input required type="text" class="form-control"  name="company_id" value="{{ $attestation->company_id }}">
    </div>
 
    <div class="pd col-md-4">
      <label for="">Аттестациядан ўтказилган иш  ўринлар сони</label>
      <input required type="number" min="0" class="form-control"  name="positions_count" value="{{ $attestation->positions_count }}">
    </div>
    <div class="pd col-md-2">
      <label for="">шу жумладан ногиронлар</label>
      <input required type="number" min="0" class="form-control" name="number" value="{{ $attestation->number }}">
    </div>
    <div class="pd col-md-4">
      <label for="">Иш ўринларини  аттестациядан ўтказувчи корхона (лаборатория)номи</label>
      <input required type="text" class="form-control" name="attestation_company" value="{{ $attestation->attestation_company }}">
    </div>
  
    <div class="pd col-md-4">
      <label for="">Юридик манзили</label>
      <input required type="text" class="form-control"  name="attestation_address" value="{{ $attestation->attestation_address }}">
    </div>
    <div class="pd col-md-4">
      <label for="">СТИР</label>
      <input required type="number" class="form-control" name="attestation_tin" value="{{ $attestation->attestation_tin }}">
    </div>
    <div class="pd col-md-6">
      <label for="">Аккредитация гувоҳнома рақами </label>
      <input required type="text" class="form-control" name="certification_number" value="{{ $attestation->certification_number }}">
    </div>
 
    <div class="pd col-md-2">
      <label for="">Гувоҳнома амал килиш муддати</label>
      <input required type="date" class="form-control" name="expired_at" value="{{ $attestation->expired_at }}">
    </div>
    <div class="pd col-md-4">
      <label for="">Cумма </label>
      <input type="number" min="0" class="form-control" name="payed_amount" value="{{ $attestation->payed_amount }}">
    </div>

  <div class="text-right">
  <input type="submit" class="btn btn-success " value="{{ __('main.Сохранить')}}">
  </div>

</div>
</form>
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