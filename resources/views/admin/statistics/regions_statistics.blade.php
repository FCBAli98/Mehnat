@extends('layouts.admin')

@section('title', 'Statistics')

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
        <a href="{{route('create_regions_statistics')}}" class="btn btn-primary btn-sm">{{ __('main.add_new') }}</a>
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
      <th width="200">Region Title(uz)</th>
      <th width="200">Statistics Title(ru)</th>
      <th width="200">Parent Title(cyrl)</th>
      <th>Value</th>
      <th>Created</th>
      <th>Modified</th>
      <th class="actions">Actions</th>
    </tr>
    <tr id="searchRow">
      <th></th>
      <th>
        <?= Form::text('search[name]', isset(app('request')->input('search')['name'])?app('request')->input('search')['name']:null, ['class' => 'form-control', 'form' => 'searchForm']) ?>
      </th>
      <th>
        <?= Form::text('search[name]', isset(app('request')->input('search')['name'])?app('request')->input('search')['name']:null, ['class' => 'form-control', 'form' => 'searchForm']) ?>
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
      <td>{{$item->name_uz}}</td>
      <td>{{$item->s_name_uz}}</td>
      <td>{{$item->ps_name_cyrl}}</td>
      <td>{{$item->value}}</td>
      <td>{{$item->created_at}}</td>
      <td>{{$item->updated_at}}</td>
      <td>
        <a href="{{route('editRegionStatistics',['id' => $item->id])}}" class="btn btn-default btn-sm"><span class="fa fa-pencil"></span></a>
        <form action="{{route('destroyRegionStatistics',['id' => $item->id])}}" method="post" style="display: none;" id='deleteItem-{{$item->id}}'>
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
