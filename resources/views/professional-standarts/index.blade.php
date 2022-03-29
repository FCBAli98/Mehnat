@extends('layouts.custom')

@section('content')
<div class="whiteSection">
  <div class="mainContainer">
    <div class="contentBlock firstContent">
      <div class="middleContainer">
        <div class="pageHead">
          <div class="borderedDec grey"></div><br><br>
            <table style="font-size: 10px !important">
                <tr style="background: #eff0f4; color: 515666">
                    <form action="" method="get">
                     <td width="3%"></td>
                     <td class="ml-1">
                        <div class=" col-14 w-3 h-4 mr-3 pr-2">
                                <select onchange="this.form.submit()" class="form-control" name="regionActivite" id="">
                                        <option value="">{{__('main.все')}}</option>
                                        @foreach ($activities as $activity)
                                            <option @if(((isset(request()->regionActivite))) && (request()->regionActivite == $activity)) selected="" @endif value="{{$activity}}">{{$activity}}</option>
                                        @endforeach
                                </select>
                            {{-- <input class="form-control" type="search" name="regionActivite" value="{{request()->get('regionActivite')}}" placeholder="{{__('main.все')}}"> --}}
                        </div>
                    </td>
                     
                     <td>
                        <div class=" col-14 w-3 h-4 mr-3 pr-2">
                            <input class="form-control" type="search" name="standarbyRregion" value="" placeholder="{{__('main.все')}}">
                        </div>
                     </td>
                     <td>
                        <div class=" col-14 w-3 h-4 mr-3 pr-2">
                                <select onchange="this.form.submit()" class="form-control" name="view_pro_avtivite" id="">
                                        <option value="">{{__('main.все')}}</option>
                                        @foreach ($types as $type)
                                            <option @if(((isset(request()->view_pro_avtivite))) && (request()->view_pro_avtivite == $type)) selected="" @endif value="{{$type}}">{{$type}}</option>
                                        @endforeach
                                </select>
                            {{-- <input class="form-control" type="search" name="view_pro_avtivite" value="" placeholder="{{__('main.все')}}"> --}}
                        </div>
                     </td>
                     <td>
                        <div class=" col-14 w-3 h-4 mr-3 pr-2">
                            <input class="form-control" type="search" name="latter_toMisistry" value="" placeholder="{{__('main.все')}}">
                        </div>
                     </td>
                     <td> 
                        <div class=" col-14 w-3 h-4 mr-3 pr-2">
                            <input class="form-control" type="search" name="registrationNumber" value="" placeholder="{{__('main.все')}}">
                        </div>
                     </td>
                     <td>
                        <div class=" col-14 w-3 h-4 pr-2">
                                <select onchange="this.form.submit()" class="form-control" name="responseOrganization" id="">
                                        <option value="">{{__('main.все')}}</option>
                                        @foreach ($ministries as $ministry)
                                            <option @if(((isset(request()->responseOrganization))) && (request()->responseOrganization == $ministry)) selected="" @endif value="{{$ministry}}">{{$ministry}}</option>
                                        @endforeach
                                </select>
                            {{-- <input class="" type="search" name="responseOrganization" value="" placeholder="{{__('main.все')}}"> --}}
                        </div>
                     </td>
                     <td>
                        <div class=" col-14 w-3 h-4 mr-3 pr-2">                            
                            <input class="form-control" type="search" name="datainAction" value="" placeholder="{{__('main.все')}}">
                        </div>
                     </td>
                     <td></td>
                     <td>
                     </td>
                     <td>
                        <div class=" col-12 w-2 h-4">
                            <button type="submit" class="w-100 btn" style="background: #1b90bb; color: #fff;">{{__('main.Поиск')}}</button>
                        </div>
                    </td>
                    </form>
                </tr>
                <tr>
                    <th width="2%" rowspan='2'>№</th>
                    <th rowspan='2'>{{__("main.Область профессиональной деятельности")}}</th>
                    <th rowspan='2'>{{__("main.Наименование профессионального стандарта, разработанного организациями Республики Узбекистан")}}</th>
                    <th rowspan='2'>{{__("main.Вид профессиональной деятельности")}}</th>
                    <th rowspan='2'>{{__("main.Письмо в Министерство занятости и трудовых отношений Республики Узбекистан(номер, дата входящего письма)")}}</th>
                    <th rowspan='2'>{{__("main.Регистрационный номер  профессионального стандарта")}}</th>
                    <th rowspan='2'>{{__("main.Ответственная организация")}}</th>
                    <th rowspan='2'>{{__("main.Дата введения в действие профессионального стандарта(Приказ Министра занятости и трудовых отношений)")}}</th>
                    <th colspan="2">{{__("main.Внесение изменений в профессиональный стандарт")}}</th>
                    <th rowspan="2">{{__("main.Дата введения в действие профессионального стандарта(изменения в Приказ Министра занятости и трудовых отношений)")}}</th>
                </tr>
                <tr>
                    <th>{{__("main.номер, дата входящего письма")}}</th>
                    <th>{{__("main.Регистрационный номер измененного стандарта")}}</th>
                </tr>
                <tr>
                     <td></td>
                     <td>1</td>
                     <td>2</td>
                     <td>3</td>
                     <td>4</td>
                     <td>5</td>
                     <td>6</td>
                     <td>7</td>
                     <td>8</td>
                     <td>9</td>
                     <td>10</td>

                </tr>
                @foreach($professionalstandads as $key => $professionalstandad)
                
                <tr>
                <td value="{{ $professionalstandad->id }}"><span class='mobile-head'></span>{{$professionalstandads->firstItem() + $key}}</td>
                    <td value="{{ $professionalstandad->regionActivite }}"><span class='mobile-head'>Head2</span> {{ $professionalstandad->regionActivite }}</td>
                    <td style="word-wrap:break-word" value="{{ $professionalstandad->standarbyRregion }}"><span class='mobile-head'>Head3</span><a href="{{ route('standarts.show', ['id' => $professionalstandad->id])}}">{{ $professionalstandad->standarbyRregion }} </a></td>
                    <td value="{{ $professionalstandad->view_pro_avtivite }}"><span class='mobile-head'>Head4</span>{{ $professionalstandad->view_pro_avtivite }}</td>
                    <td value="{{ $professionalstandad->latter_toMisistry }}"><span class='mobile-head'>Head5</span>{{ $professionalstandad->latter_toMisistry }}</td>
                    <td value="{{ $professionalstandad->registrationNumber }}"><span class='mobile-head'>Head6</span>{{ $professionalstandad->registrationNumber }}</td>
                    <td value="{{ $professionalstandad->responseOrganization }}"><span class='mobile-head'>Head7</span>{{ $professionalstandad->responseOrganization }}</td>
                    <td value="{{ $professionalstandad->datainAction }}"><span class='mobile-head'>Head8</span>{{ $professionalstandad->datainAction }}</td>
                    <td value="{{ $professionalstandad->incamingLatter }}"><span class='mobile-head'>Head9</span>{{ $professionalstandad->incamingLatter }}</td>
                    <td value="{{ $professionalstandad->amendedRegisNumber }}"><span class='mobile-head'>Head10</span>{{ $professionalstandad->amendedRegisNumber }}</td>
                    <td value="{{ $professionalstandad->dataIntraAction }}"><span class='mobile-head'>Head11</span>{{ $professionalstandad->dataIntraAction}}</td>
                </tr>
                @endforeach
        </table>
        <br>
        {{ $professionalstandads->links() }}
        </div>
        <div class="row15 staticPageRow">
         
        </div>
      </div>
    </div>
  </div>
</div>
  </div>

</div>
<style>
    .table thead th {
        vertical-align: middle;
        border-bottom: 0px solid #d5d7df;
    }
</style>
@endsection


<style>
table {border: 1px solid #d5d7df;
       border-collapse: collapse; 
       margin: 0 auto;  
       padding: 0px;
       table-layout: fixed;
       min-width: 100%;
       }
table th {text-align: center;
          padding: 5px;
          border: 1px solid #d5d7df;
          background-color: #eff0f4;
          color:#515666;
          font-weight:bold;
          text-align:center
          }
table td{padding: 8px;
         border: 1px solid #d5d7df;
         }
table tr{background-color: #f8f9ff;
         color:#000000;
         text-align:center;
         }
table .mobile-head {display:none;}
table .show-on-mobile {display:none;
         }
@media screen and (max-width: 600px) {
    table {border: 1px solid #d5d7df;
           border-collapse: collapse; 
           margin: 0 auto;  
           padding: 0px;
           table-layout: fixed;
           min-width: 100%;
           }
    table td{padding: 8px;
             border: 1px solid #d5d7df;
             display: block;
             text-align: right;
             width: 100%\9;  
             float: left\9;}
    table tr{background-color: #dddddd;
             color:#000000;
             text-align:right;
             margin:8px
             }
    table tr:first-child {
        display:none;
             }
    table tr{
        display: block;
            }
    table td:not(:first-child){
        border-top:0px;
            }
    table .mobile-head{
        font-weight:bold;
        color:#000000;
        float:left;
        text-align:left;
        display:block}
    table .show-on-mobile {
        display:block;
        }
    }
</style>
