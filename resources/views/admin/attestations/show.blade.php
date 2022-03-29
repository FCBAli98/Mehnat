@extends('layouts.admin')

@section('title', 'Cертификатлар - куриш')

@section('content')
<h2>Cертификатлар </h2>
<hr>
<div class="clearfix">
    <div class="pull-left">
        <div class="btn-group group-control">
          <a href="{{ route('admin.attestations.index') }}" class="btn btn-default">{{__('main.Back')}}</a>
          
        </div>
    </div>
    <div class="pull-right">
    <div class="btn-group group-control">
      
    </div>
  </div>
</div>
<br>
<table class="table table-bordered table-striped table-condensed">
  <tbody>
      <tr>
          <th scope="row">Id</th>
          <td>{{ $attestation->id }}</td>
      </tr>
      <tr>
          <th scope="row">Вилоят номи</th>
          <td>{{ $attestation->region->name_cyrl ?? '' }}</td>
      </tr>
      <tr>
          <th scope="row">Шахар номи</th>
          <td>{{ $attestation->city->name_cyrl ?? '' }}</td>
      </tr>
      <tr>
          <th scope="row">Давлат экспертизаси ҳулосасининг серияси ва рақами</th>
          <td>{{ $attestation->conclusion_number }}</td>
      </tr>
      <tr>
          <th scope="row">Давлат экспертизаси ҳулосаси берилган сана</th>
          <td>{{ $attestation->conclusion_date }}</td>
      </tr>
      <tr>
          <th scope="row">Иш ўринлари аттестациядан ўтказилган корхоналар номи</th>
          <td>{{ $attestation->company_name }}</td>
      </tr>
      <tr>
          <th scope="row">СТИР</th>
          <td>{{ $attestation->company_tin }}</td>
      </tr>
      <tr>
          <th scope="row">XXTUT</th>
          <td>{{ $attestation->xxtut }}</td>
      </tr>
      <tr>
          <th scope="row">MXBT</th>
          <td>{{ $attestation->mxbt }}</td>
      </tr>
      
      <tr>
          <th scope="row">Иш ўринлари аттестациядан ўтказилган корхоналар манзили</th>
          <td>{{ $attestation->company_id }}</td>
      </tr>
      <tr>
          <th scope="row">Аттестациядан ўтказилган иш  ўринлар сони</th>
          <td>{{ $attestation->positions_count }}</td>
      </tr>
      <tr>
          <th scope="row">шу жумладан ногиронлар</th>
          <td>{{ $attestation->number }}</td>
      </tr>
      
      <tr>
          <th scope="row">Иш ўринларини  аттестациядан ўтказувчи корхона (лаборатория)номи</th>
          <td>{{ $attestation->attestation_company }}</td>
      </tr>
      <tr>
          <th scope="row">Юридик манзили</th>
          <td>{{ $attestation->attestation_address }}</td>
      </tr>
      <tr>
          <th scope="row">СТИР</th>
          <td>{{ $attestation->attestation_tin }}</td>
      </tr>
      <tr>
          <th scope="row">Аккредитация гувоҳнома рақами</th>
          <td>{{ $attestation->certification_number }}</td>
      </tr>
      <tr>
          <th scope="row">Гувоҳнома амал килиш муддати</th>
          <td>{{ $attestation->expired_at }}</td>
      </tr>
      <tr>
          <th scope="row">Cумма</th>
          <td>{{ $attestation->payed_amount }}</td>
      </tr>
  </tbody>
</table>

@endsection
