@extends('layouts.custom')

@section('content')
<div class="whiteSection">
  <div class="mainContainer">
    <div class="contentBlock firstContent">
      <div class="middleContainer">
        <div class="pageHead">
          <div class="borderedDec grey"></div>
        </div>
          <div>
            <table class="table table-bordered table-striped table-condensed" >
              <form action="{{ route( 'attestations.index') }}"  method="GET">
                  <thead>
                    <tr>
                      <th rowspan="2">Т/Р</th>
                      <th rowspan="2">Ҳудуд  
                          <select onchange="this.form.submit()" style="width:82px;" id="region_id" name="region_id" class="form-control">
                            <option  value="">{{__('main.все')}}</option>
                            @foreach( $regions as $region)
                            <option @if(((isset(request()->region_id))) && (request()->region_id == $region->id)) selected="" @endif value="{{ $region->id }}" >{{ $region->name_cyrl }}</option>
                            @endforeach
                          </select>
                      </th>
                      <th rowspan="2">Туман (шаҳар) 
                        <select onchange="this.form.submit()" style="width:82px;" id="city_id" name="city_id" class="form-control">
                          <option  value="">{{__('main.все')}}</option>
                          @foreach( $cities as $city)
                          <option @if(((isset(request()->city_id))) && (request()->city_id == $city->id) && (request()->region_id == $city->region_id)) selected="" @endif value="{{ (request()->region_id == $city->region_id) ? $city->id : '' }}">{{ $city->name_cyrl }}</option>
                          @endforeach
                        </select>
                      </th>
                      <th rowspan="2">Давлат экспертиза ҳулосасининг серияси ва рақами
                        <div>
                          <input type="text" class="form-control" value="{{ isset(request()->conclusion_number) ? request()->conclusion_number : '' }}" name="conclusion_number" placeholder="">
                        </div>
                      </th>
                      <th rowspan="2">Давлат экспертиза ҳулосаси берилган сана 
                        <div class="">
                          <select onchange="this.form.submit()" id="years" name="years" class="form-control">
                            <option value="">{{__('main.все')}}</option>
                            @foreach( $get_years as $year)
                          <option @if(((isset(request()->years))) && (request()->years == $year)) selected="" @endif value="{{ $year }}">{{ $year }}</option>
                          @endforeach
                          </select>
                        </div>
                      </th>
                      <th style="padding-bottom:25px;" rowspan="2">Иш ўринлари аттестациядан ўтказилган корхона номи  </th>
                      <th rowspan="2">СТИР<div>
                        <div>
                          <input style="width:70px;" type="text" class="form-control" name="company_tin" placeholder="" value="{{ isset(request()->company_tin) ? request()->company_tin : '' }}">
                        </div>
                      </th>
                      <th rowspan="2">ХХТУТ  
                        <div>
                          <input style="width:70px;" type="text" class="form-control" name="xxtut" placeholder="" value="{{ isset(request()->xxtut) ? request()->xxtut : '' }}">
                        </div>
                      </th>
                      <th rowspan="2">МХБТ
                        <div>
                          <input style="width:54px;" type="text" class="form-control" name="mxbt" placeholder="" value="{{ isset(request()->mxbt) ? request()->mxbt : '' }}">
                        </div>
                      </th>
                      <th style="padding-bottom:25px;" rowspan="2">Иш ўринлари аттестациядан ўтказилган корхона манзили</th>
                      <th style="padding-bottom:25px;" rowspan="2">Аттестациядан ўтказилган иш  ўринлар сони</th>
                      <th style="padding-bottom:25px;" rowspan="2">шу жумладан ногиронлар</th>
                      <th colspan="6">Иш ўринларни аттестациядан ўтказган лабораториянинг</th>
                    </tr>
                    <tr>
                      <th style="padding-bottom:25px;" scope="col">Иш ўринларини аттестациядан ўтказувчи корхона (лаборатория) номи</th>
                      <th style="padding-bottom:25px;" scope="col">юридик манзили</th>
                      <th scope="col">СТИР
                        <div>
                          <input style="width:70px;" type="text" class="form-control" name="attestation_tin" placeholder=""  value="{{ isset(request()->attestation_tin) ? request()->attestation_tin : '' }}">
                        </div>
                      </th>
                      <th style="padding-bottom:25px;" scope="col">Аккредитация гувоҳнома рақами </th>
                      <th style="padding-bottom:25px;" scope="col">Гувоҳнома амал килиш муддати</th>
                      <th style="padding-bottom:25px;" scope="col">тўланган сумма миқдори (1 иш ўрни ҳисобида) </th>
                    </tr>
                    <div class="but">
                <button type="submit" class="btn btn-primary">{{ __('main.Поиск')}}</button>
              </div>
                  </thead>
              </form>  
                <tbody>
                    @php $i = 1; @endphp
                    @foreach($attestations as $key => $attestation)
                    <tr style="font-size: 10px;">
                      <td value="{{ $attestation->id }}"><span class='mobile-head'></span>{{ $attestations->firstItem() + $key }}</td>
                      <td value="{{ $attestation->region_id }}"><span class='mobile-head'></span> {{ $attestation->region->name_cyrl??'' }}</td>
                      <td value="{{ $attestation->city_id }}"><span class='mobile-head'></span> {{ $attestation->city->name_cyrl??'' }}</td>
                      <td value="{{ $attestation->conclusion_number }}"><span class='mobile-head'></span>{{ $attestation->conclusion_number }} </a></td>
                      <td value="{{ $attestation->conclusion_date }}"><span class='mobile-head'></span>{{ $attestation->conclusion_date }}</td>
                      <td value="{{ $attestation->company_name }}"><span class='mobile-head'></span>{{ $attestation->company_name }}</td>
                      <td value="{{ $attestation->company_tin }}"><span class='mobile-head'></span>{{ $attestation->company_tin }}</td>
                      <td value="{{ $attestation->xxtut }}"><span class='mobile-head'></span>{{ $attestation->xxtut }}</td>
                      <td value="{{ $attestation->mxbt }}"><span class='mobile-head'></span>{{ $attestation->mxbt }}</td>
                      <td value="{{ $attestation->company_id }}"><span class='mobile-head'></span>{{ $attestation->company_id }}</td>
                      <td value="{{ $attestation->positions_count }}"><span class='mobile-head'></span>{{ $attestation->positions_count }}</td>
                      <td value="{{ $attestation->number }}"><span class='mobile-head'></span>{{ $attestation->number}}</td>
                      <td value="{{ $attestation->attestation_company }}"><span class='mobile-head'></span>{{ $attestation->attestation_company}}</td>
                      <td value="{{ $attestation->attestation_address }}"><span class='mobile-head'></span>{{ $attestation->attestation_address}}</td>
                      <td value="{{ $attestation->attestation_tin }}"><span class='mobile-head'></span>{{ $attestation->attestation_tin}}</td>
                      <td value="{{ $attestation->certification_number }}"><span class='mobile-head'></span>{{ $attestation->certification_number}}</td>
                      <td value="{{ $attestation->expired_at }}"><span class='mobile-head'></span>{{ $attestation->expired_at}}</td>
                      <td value="{{ $attestation->payed_amount }}"><span class='mobile-head'></span>{{ $attestation->payed_amount}}</td>
                    </tr>
                    @php $i++; @endphp
                    @endforeach
                </tbody>
            </table>
          </div>   
        <br>
        {{ $attestations->links() }}
        <hr>
        <div class="row15 staticPageRow">
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<style>
    .mainContainer{
      margin-left: 180px;
    }
    .contentBlock{
        width:1540px;
    }
    .table thead th {
        font-weight: 400px;
        font-size: 10px;
        line-height: 1.5;
        text-align:center;
    }
    .but{
      padding-left: 1452px;
      margin-top: 27px; 
    }
    table th {
          background-color: #eff0f4;
          font-size: 12px;
          }
    table td{padding: 8px;
         border: 1px solid #d5d7df;
         }
    table tr{
         text-align:center;
         }
    .btn{
      margin-bottom: 10px;
    }
</style>
@endsection
