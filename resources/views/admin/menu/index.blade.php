@extends('layouts.admin')

@section('title', 'Меню')

@section('content')
<h2>Меню</h2>
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
      <a href="{{route('admin.menu.create')}}" class="btn btn-primary btn-sm">{{ __('main.add_new') }}</a>
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
        <th width="200">Title</th>
        <th width="200">Parent</th>
        <th width="200">Translations</th>
        <th>Created</th>
        <th>Modified</th>
        <th class="actions">Actions</th>
    </tr>
    <tr id="searchRow">
      <th></th>
      <th>
        <?= Form::text('search[title]', isset(app('request')->input('search')['title'])?app('request')->input('search')['title']:null, ['class' => 'form-control', 'form' => 'searchForm']) ?>
      </th>
      <th>
        <?= Form::select('search[parent_id]', $parents, isset(app('request')->input('search')['parent_id'])?app('request')->input('search')['parent_id']:null, ['class' => 'form-control', 'form' => 'searchForm']) ?>
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
          <td>{{$item->title}}</td>
          <td>{{$item->parent?$item->parent->title:''}}</td>
          <td>
            <div class="nowrap">
              <?php foreach ($item->langsCheck as $lang => $locale): ?>
                <?php if (isset($locale['exists'])): ?>
                  <a href="{{route('admin.menu.show',['id' => $item->id, 'lang' => $lang])}}" class="btn btn-success btn-xs"><i class="fa fa-check" aria-hidden="true"></i> {{$locale['name']}}</a>
                <?php else: ?>
                  <a href="{{route('admin.menu.edit',['id' => $item->id, 'lang' => $lang])}}" class="btn btn-primary btn-xs"><i class="fa fa-plus" aria-hidden="true"></i> {{$locale['name']}}</a>
                <?php endif ?>
              <?php endforeach ?>
            </div>
          </td>
          <td>{{$item->created_at}}</td>
          <td>{{$item->updated_at}}</td>
          <td>
            <a href="{{route('admin.menu.show',['id' => $item->id])}}" class="btn btn-default btn-sm"><span class="fa fa-eye"></span></a>
            <a href="{{route('admin.menu.edit',['id' => $item->id])}}" class="btn btn-default btn-sm"><span class="fa fa-pencil"></span></a>
            <?php if (array_search($item->anchor, $blockeds) === false): ?>
            <form action="{{route('admin.menu.destroy',['id' => $item->id])}}" method="post" style="display: none;" id='deleteItem-{{$item->id}}'>
              @csrf
              <input name="_method" type="hidden" value="DELETE">
            </form>
            <a href="#" class="btn btn-default btn-sm" onclick="if (confirm('Вы уверены, что хотите удалить?')) { document.getElementById('deleteItem-<?= $item->id ?>').submit(); } event.returnValue = false; return false;"><span class="fa fa-trash"></span></a>
            <?php endif ?>
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
