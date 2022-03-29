@extends('layouts.custom')

@section('content')
<div class="whiteSection">
    <div class="mainContainer">
        <div class="contentBlock firstContent">
            <div class="middleContainer">
                <div class="pageHead">
                    <div class="borderedDec grey"></div><br>
                    <div class="contentItemsCustom">                       
                   
                        <div class="breadcrumbs1">
                                <ul>
                                  <li>
                                    <a href="{{route('home')}}">{{__('main.home')}}</a>
                                  </li>
                                  <li>
                                    <a href="{{route('professional-standarts.index')}}">{{__('main.Профессиональные стандарты')}}</a>
                                  </li>
                                </ul>
                              </div>
                            @if(session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ __('main.Успешно сохранено')}}
                                </div>
                            @endif
                            @if(count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                           <!--  <div style="max-width: 1890px; height: 400px" class="mainContainer bg-white float-center">       
                            <a href="{{ route('professional-standarts.index') }}" class="customButton" style="background: #1b90bb; color: #fff">Орқага</a> -->
                            <br>
                            <h3 class="text-center">{{ $professionalstandad->standarbyRregion }}</h3> <br>
                            <table style="font-size: 10px !important">                                    
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
                                    
                                    <tr>
                                    <td value="{{ $professionalstandad->id }}"><span class='mobile-head'></span>1</td>
                                        <td value="{{ $professionalstandad->regionActivite }}"><span class='mobile-head'>Head2</span> {{ $professionalstandad->regionActivite }}</td>
                                        <td style="word-wrap:break-word" value="{{ $professionalstandad->standarbyRregion }}"><span class='mobile-head'>Head3</span>{{ str_limit($professionalstandad->standarbyRregion, 100) }}</td>
                                        <td value="{{ $professionalstandad->view_pro_avtivite }}"><span class='mobile-head'>Head4</span>{{ $professionalstandad->view_pro_avtivite }}</td>
                                        <td value="{{ $professionalstandad->latter_toMisistry }}"><span class='mobile-head'>Head5</span>{{ $professionalstandad->latter_toMisistry }}</td>
                                        <td value="{{ $professionalstandad->registrationNumber }}"><span class='mobile-head'>Head6</span>{{ $professionalstandad->registrationNumber }}</td>
                                        <td value="{{ $professionalstandad->responseOrganization }}"><span class='mobile-head'>Head7</span>{{ $professionalstandad->responseOrganization }}</td>
                                        <td value="{{ $professionalstandad->datainAction }}"><span class='mobile-head'>Head8</span>{{ $professionalstandad->datainAction }}</td>
                                        <td value="{{ $professionalstandad->incamingLatter }}"><span class='mobile-head'>Head9</span>{{ $professionalstandad->incamingLatter }}</td>
                                        <td value="{{ $professionalstandad->amendedRegisNumber }}"><span class='mobile-head'>Head10</span>{{ $professionalstandad->amendedRegisNumber }}</td>
                                        <td value="{{ $professionalstandad->dataIntraAction }}"><span class='mobile-head'>Head11</span>{{ $professionalstandad->dataIntraAction}}</td>
                                    </tr>
                                 
                            </table>
                        <br>
                            {{-- <div style="width:50% !important; height: 20%">
                                @if(is_null($professionalstandad->file))
                                    <form action="{{route('standarts.upload', ['id' => $professionalstandad->id ])}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                        @csrf
                                         <div class="custom-file" style="width:50% !important">
                                            <input type="file" class="custom-file-input" id="inputGroupFile01"
                                              aria-describedby="inputGroupFileAddon01" name="file" accept=".doc, .docx">
                                            <label class="custom-file-label" for="inputGroupFile01">{{__('main.Выберите файл')}}</label>
                                          </div>
                                        </div>
                                        <!-- <label for="imageUpload"  class="btn btn-outlined">{{__('main.Выберите файл')}}</label> -->
                                        <!-- <input class="" type="file" id="imageUpload" accept=".doc, .docx," name="file"> -->          
                                        <button class="btn btn-lg" style="background: #1b90bb; color:#fff;" type="submit">{{__('main.Сохранить')}}</button>
                                    </form>
                                 @endif   
                                 <div class="upload">
                                @if(!is_null($professionalstandad->file))
                                    <a download="{{$name}}" class="btn btn-lg" style="background: #1b90bb; color: #fff; float: left; border-radius: 3px" href="{{$link}}" class="btn btn-lg">{{__('main.скачать')}}</a>
                                @endif    
                            </div>
                        </div> --}}

                        <?php if ($professionalstandad->files): ?>
                            <?php foreach ($professionalstandad->files as $index => $file): ?>
                                <p>
                                    <a href="{{getFile($file)}}" target="_blank">{{__("main.Прикрепленный файл")}} №{{$index+1}} ({{__("main.скачать")}})</a>
                                </p>
                            <?php endforeach ?>
                        <?php endif ?>

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
        border-bottom: 0px solid #dee2e6;
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
