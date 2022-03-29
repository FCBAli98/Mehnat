@extends('layouts.admin')

@section('title', 'Пользователи')

@section('content')
<h2>{{__('main.Users')}}</h2>
<hr>
<div class="clearfix">
  <div class="pull-left">
  	<?=__('main.page_count', ['current' => $models->currentPage(), 'lastPage' => $models->lastPage(), 'total' => $models->total()])?>
  </div>
  <div class="pull-right">
    <div class="btn-group group-control">
      <a href="{{route('admin.users.create')}}" class="btn btn-default btn-sm">{{ __('main.add_new') }}</a>
    </div>
  </div>
</div>
<br>
<table cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed">
  <thead>
    <tr>
        <th width="50">Id</th>
        <th width="200">Name</th>
        <th width="200">E-mail</th>
        <th width="200">Role</th>
        <th>Created</th>
        <th>Modified</th>
        <th class="actions">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php if ($models): ?>
      <?php foreach ($models as $item): ?>
        <tr>
          <td>{{$item->id}}</td>
          <td>{{$item->name}}</td>
          <td>{{$item->email}}</td>
          <td>{{$item->role->display_name}}</td>
          <td>{{$item->created_at}}</td>
          <td>{{$item->updated_at}}</td>
          <td>
            <a href="{{route('admin.users.show',['id' => $item->id])}}" class="btn btn-default btn-sm"><span class="fa fa-eye"></span></a>
            <a href="{{route('admin.users.edit',['id' => $item->id])}}" class="btn btn-default btn-sm"><span class="fa fa-pencil"></span></a>
            <form action="{{route('admin.users.destroy',['id' => $item->id])}}" method="post" style="display: none;" id='deleteItem-{{$item->id}}'>
              @csrf
              <input name="_method" type="hidden" value="DELETE">
            </form>
            <a href="#" class="btn btn-default btn-sm" onclick="if (confirm('Are you sure you want to delete?')) { document.getElementById('deleteItem-<?= $item->id ?>').submit(); } event.returnValue = false; return false;"><span class="fa fa-trash"></span></a>
          </td>
        </tr>
      <?php endforeach ?>
    <?php endif ?>  	
  </tbody>
</table>
<div class="text-right">
  <?= $models->links(); ?>
</div>
@endsection
