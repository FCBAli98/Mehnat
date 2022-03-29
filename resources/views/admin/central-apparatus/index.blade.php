@extends('layouts.admin')

@section('title', 'Центральный аппарат')

@section('content')
<div class="pull-right">
  <p></p>
  <form action="{{route('admin.central-apparatus.select-menu')}}" class="form-inline" method="post">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail2">Menu</label>
      <?= Form::select('select_menu', ['' => 'Выберите']+$menuTree, $selected_menu_id, ['class' => 'form-control', 'id' => 'selectMenu']) ?>
    </div>
    <div class="form-group">
      Перейти: <a href="{{route('central-apparatus.index')}}" target="_blank">{{route('central-apparatus.index', [], false)}}</a>
    </div>
  </form>
</div>
<h2>Центральный аппарат</h2>
<hr>
<div class="clearfix">
  <div class="pull-left">
  	<?=__('main.page_count', ['current' => $models->currentPage(), 'lastPage' => $models->lastPage(), 'total' => $models->total()])?>
  </div>
  <?php $selectedLang = ''; ?>
  <div class="pull-right">
    <div class="btn-group group-control">
      <?php foreach ($languages as $lang => $locale): ?>
        <a href="?lang={{$lang}}" class="btn btn-default btn-sm {{ $locale['active']?'active':'' }}">{{ $locale['name'] }}</a>
        <?php if ($locale['active']): ?>
          <?php $selectedLang = $lang; ?>
        <?php endif ?>
      <?php endforeach ?>
      <a href="{{route('admin.central-apparatus.create')}}" class="btn btn-primary btn-sm">{{ __('main.add_new') }}</a>
    </div>
  </div>
</div>
<br>
<form action="" id="searchForm" method='get'>
  <input type="hidden" name="lang" value="{{$selectedLang}}">
</form>
<table cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed">
  <thead>
    <tr>
        <th width="50">#</th>
        <th width="200">Отдел</th>
        <th width="200">Translations</th>
        <th>Status</th>
        <th>Created</th>
        <th>Modified</th>
        <th class="actions">Actions</th>
    </tr>
    <tr id="searchRow">
      <th></th>
      <th>
        <?= Form::text('search[position]', isset(app('request')->input('search')['position'])?app('request')->input('search')['position']:null, ['class' => 'form-control', 'form' => 'searchForm']) ?>
      </th>
      <th></th>
      <th>
        <?= Form::select('search[enabled]', ['' => 'Выберите']+\Config::get('handbook.statuses'), isset(app('request')->input('search')['enabled'])?app('request')->input('search')['enabled']:null, ['class' => 'form-control', 'form' => 'searchForm']) ?>
      </th>
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
          <td>{{$item->position}}</td>
          <td>
            <div class="nowrap">
              <?php foreach ($item->langsCheck as $lang => $locale): ?>
                <?php if (isset($locale['exists'])): ?>
                  <a href="{{route('admin.central-apparatus.show',['id' => $item->id, 'lang' => $lang])}}" class="btn btn-success btn-xs"><i class="fa fa-check" aria-hidden="true"></i> {{$locale['name']}}</a>
                <?php else: ?>
                  <a href="{{route('admin.central-apparatus.edit',['id' => $item->id, 'lang' => $lang])}}" class="btn btn-primary btn-xs"><i class="fa fa-plus" aria-hidden="true"></i> {{$locale['name']}}</a>
                <?php endif ?>
              <?php endforeach ?>
            </div>
          </td>
          <td>{{$item->status_display}}</td>
          <td>{{$item->created_at}}</td>
          <td>{{$item->updated_at}}</td>
          <td>
            <a href="{{route('admin.central-apparatus.show',['id' => $item->id])}}" class="btn btn-default btn-sm"><span class="fa fa-eye"></span></a>
            <a href="{{route('admin.central-apparatus.edit',['id' => $item->id])}}" class="btn btn-default btn-sm"><span class="fa fa-pencil"></span></a>
            <form action="{{route('admin.central-apparatus.destroy',['id' => $item->id])}}" method="post" style="display: none;" id='deleteItem-{{$item->id}}'>
              @csrf
              <input name="_method" type="hidden" value="DELETE">
            </form>
            <a href="#" class="btn btn-default btn-sm" onclick="if (confirm('Вы уверены, что хотите удалить?')) { document.getElementById('deleteItem-<?= $item->id ?>').submit(); } event.returnValue = false; return false;"><span class="fa fa-trash"></span></a>
          </td>
        </tr>
      <?php $i++; endforeach ?>
    <?php endif ?>  	
  </tbody>
</table>
<div class="text-right">
  <?= $models->links(); ?>
</div>
@endsection