@extends('layouts.mobile')

@section('title', "Calculate salary")


@section('content')

  <div class="whiteSection">
    <div class="mainContainer">
      <div class="contentBlock firstContent">
        <div class="middleContainer">
          <div class="pageHead">
            <div style="color: lightgrey" class="borderedDec lightgrey"></div>
          </div>
          <div class="staticPage">
            <div class="staticPageContent" style="text-align:center">
              <h1>{{ __('main.salary_title') }}</h1>
              <h4 style="text-align:center">{{__('main.info_salary')}}</h4>
              <br>
                <h4>{{__('main.oklad')}}:  <h3>{{$oklad}} {{__('main.som')}}</h3>  </h4>
              <br>
              <h4>{{__('main.select_razryad')}}: </h4>
                  <input id="salary" type="text" hidden value="{{$oklad}}">
                  <select class="form-control" style="width: 50%;  margin: auto" id="mySelect" onchange="myFunction({{json_encode(__('main.koef'))}}, {{json_encode(__('main.salary'))}}, {{json_encode(__('main.som'))}})">
                    @foreach($salary as $item)
                      <option value="{{$item->coefficient}}">{{$item->rank}}</option>
                    @endforeach
                  </select>
              <br>
                  <h4 id="demo"></h4>
              <br>
                  <h3 id="demo2"></h3>
            </div>
           

        </div>
      </div>
    </div>
  </div>
@endsection
<script>
  const formatter = new Intl.NumberFormat('uz-UZ', {
    style: 'currency',
    currency: 'UZB',
    minimumFractionDigits: 2
  })
  function myFunction(koef, maosh, som) {
    var x = document.getElementById("mySelect").value;
    var salary = document.getElementById("mySelect").value * document.getElementById("salary").value;
    document.getElementById("demo").innerHTML =  x + koef;
    document.getElementById("demo2").innerHTML = maosh + formatter.format(salary) + ' ' + som;
  }


</script>
