@extends('layouts.app')

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
            <div class="breadcrumbs1">
              <ul>
                <li>
                  <a href="{{route('home')}}">{{__('main.home')}}</a>
                </li>

              </ul>
            </div>

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
            <div class="staticPageFooter">
              <div class="staticPageShareLabel">{{__('main.поделиться')}}:</div>
              <div class="staticPageShareList">
                <a href="#" class="staticPageFooterBtn"><i class="icon-sn-fb"></i></a>
                <a href="#" class="staticPageFooterBtn"><i class="icon-vk"></i></a>
                <a href="#" class="staticPageFooterBtn"><i class="icon-odno"></i></a>
                <a href="#" class="staticPageFooterBtn"><i class="icon-dotted"></i></a>
              </div>
              <a href="#" id="print" class="staticPageFooterBtn right"><i class="icon-printer"></i></a>
            </div>
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
