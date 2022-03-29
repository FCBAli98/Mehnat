@extends('layouts.app')

@section('title', $model->title)

<?php 
$contPost = strip_tags($model->content);
$description = mb_substr($contPost,0,300);
?>
@section('description', $description)

@section('content')
<div class="whiteSection">
  <div class="mainContainer">
    <div class="contentBlock firstContent">
      <div class="middleContainer">
        <div class="minContainer">
          <div class="pageHead">
            <div class="borderedDec grey"></div>
          </div>
          <div class="breadcrumbs1">
            <ul>
              <li>
              <a href="{{route('home')}}">{{__('main.home')}}</a>
              </li>
              <li>
                2020 йил 1 февраль ойидан бошлаб киритиладиган тариф ставкалари миқдори
              </li>
            </ul>
          </div>

            <h2 class="title title-28">2020 йил 1 февраль ойидан бошлаб киритиладиган тариф ставкалари миқдори</h2><br><br>
         
            <h3>Энг кам иш ҳақи хозирда: <i class="text-danger">679330</i> сўм.</h3>
         
              <div class="col-sm-4 nopade" style="padding-left: 0 !important">
                <form action="" method="get">
                  <select onchange='this.form.submit()' name="razryad" id="mychange" class="form-control" required="required" onchange="myFunc()" style="width:200px">
                  <option value="0">Разрядни танланг</option>
                        @foreach($resources as $key => $resource) 
                            <option value="{{ $key }}" {{ ( request()->razryad == $key ) ? 'selected' : '' }} > {{ $resource }}</option>
                        @endforeach
                      </select>
                  </form>
              </div><br>
       

           
          <p style="padding-left: 0 !important " id="result-calc-1">Коеффицент таърифи:  {{ $razryad }}</p>
              
            @if(isset($summa))
              
              <div class="row">
                <div class="col-sm-12">
                  <div class="well">
                    <p id="raz" class="nomargin"><h3 class="nomargin result-calc-2"><b>Сизнинг маошингиз</b>: <span style="color:green">{{ $summa }}</span>  сўм</h3></p>
                  </div>
                  <p id="maosh" style="color:red"></p>
                </div>
              </div>
            @endif
          <div class="staticPageFooter">
            <?php /* ?>
            <div class="staticPageShareLabel">{{__('main.поделиться')}}:</div>
            <div class="staticPageShareList">
              <a href="#" class="staticPageFooterBtn"><i class="icon-sn-fb"></i></a>
              <a href="#" class="staticPageFooterBtn"><i class="icon-vk"></i></a>
              <a href="#" class="staticPageFooterBtn"><i class="icon-odno"></i></a>
              <a href="#" class="staticPageFooterBtn"><i class="icon-dotted"></i></a>
            </div>
            <?php */ ?>
            
          </div>
          </div>
        <div class="div row::before"></div>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('sliderLinks')
  <?php echo App::make("App\Http\Controllers\SliderLinksController")->display(); ?>
@endsection









