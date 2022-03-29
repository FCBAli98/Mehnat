@extends('layouts.admin')

@section('title', 'Острые сигналы')

@section('content')
<h2>Острые сигналы</h2>
<hr>
<div class="clearfix">
  <div class="pull-left">
  	<?=__('main.page_count', ['current' => $models->currentPage(), 'lastPage' => $models->lastPage(), 'total' => $models->total()])?>
  </div>
</div>
<br>
<form action="" id="searchForm" method='get'>
</form>
<table cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed">
  <thead>
    <tr>
        <th width="50">#</th>
        <th width="200">ФИО</th>
        <th width="200">Тема</th>
        <th>Сообщение</th>
        <th>Файл</th>
        <th>Created</th>
        <th>Modified</th>
    </tr>
    <tr id="searchRow">
      <th></th>
      <th>
        <?= Form::text('search[fio]', isset(app('request')->input('search')['fio'])?app('request')->input('search')['fio']:null, ['class' => 'form-control', 'form' => 'searchForm']) ?>
      </th>
      <th>
        <?= Form::text('search[subject]', isset(app('request')->input('search')['subject'])?app('request')->input('search')['subject']:null, ['class' => 'form-control', 'form' => 'searchForm']) ?>
      </th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php if ($models): ?>
      <?php $i = $models->currentPage(); foreach ($models as $item): ?>
        <tr>
          <td>{{$i}}</td>
          <td>{{$item->fio}}</td>
          <td>{{$item->subject}}</td>
          <td>{{$item->message}}</td>
          <td>
            <?php if ($item->file && getFile($item->file)): ?>
              <a href="{{asset(getFile($item->file))}}" target="_blank">{{$item->file}}</a>
            <?php endif ?>
          </td>
          <td>{{$item->created_at}}</td>
          <td>{{$item->updated_at}}</td>
        </tr>
      <?php $i++; endforeach ?>
    <?php endif ?>  	
  </tbody>
</table>
<div class="text-right">
  <?= $models->links(); ?>
</div>
@endsection
