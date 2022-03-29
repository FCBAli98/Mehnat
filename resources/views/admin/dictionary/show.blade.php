@extends('layouts.admin')

@section('title', 'Страницы - Просмотр')

@section('content')
<h2>Страницы #{{ $model->id }}</h2>
<hr>
<div class="clearfix">
    <div class="pull-left">
        <div class="btn-group group-control">
          <a href="{{ route('admin.dictionary.index') }}" class="btn btn-default">{{__('main.List')}}</a>
          <a href="{{ route('admin.dictionary.edit', ['id' => $model->id]) }}" class="btn btn-default">{{__('main.Edit')}}</a>
          <a href="{{ route('admin.dictionary.create') }}" class="btn btn-default">{{__('main.add_new')}}</a>
        </div>
    </div>
    <div class="pull-right">
    <div class="btn-group group-control">
      <?php foreach ($languages as $lang => $locale): ?>
        <a href="?lang={{$lang}}" class="btn btn-default btn-sm {{ $locale['active']?'active':'' }}">{{ $locale['name'] }}</a>
      <?php endforeach ?>
    </div>
  </div>
</div>
<br>
<table class="table table-bordered table-striped table-condensed">
  <tbody>
      <tr>
          <th scope="row">Id</th>
          <td>{{ $model->id }}</td>
      </tr>
      <tr>
          <th scope="row">Name</th>
          <td>{{ $model->name }}</td>
      </tr>
      <tr>
          <th scope="row">Description</th>
          <td>{{$model->description}} </td>
      </tr>
      <tr>
          <th scope="row">Status</th>
        <td>{{$model->status == 1 ? 'Актив' : 'Неактив'}}</td>

      </tr>
      <tr>
          <th scope="row">Created</th>
          <td>{{ $model->created_at }}</td>
      </tr>
      <tr>
          <th scope="row">Modified</th>
          <td>{{ $model->updated_at }}</td>
      </tr>
  </tbody>
</table>
<h3>Content</h3>
<div class="content">
  <?= $model->content ?>
</div>
<hr>
<div class="clearfix">
  <div class="pull-left">
    <form action="{{route('admin.dictionary.destroy',['id' => $model->id])}}" method="post" style="display: none;" id='deleteItem'>
        @csrf
        <input name="_method" type="hidden" value="DELETE">
      </form>
      <a href="#" class="btn btn-danger" onclick="if (confirm('Вы уверены, что хотите удалить?')) { document.getElementById('deleteItem').submit(); } event.returnValue = false; return false;">Удалить</a>
  </div>
</div>
@endsection
