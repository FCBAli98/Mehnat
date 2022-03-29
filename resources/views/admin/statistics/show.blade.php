@extends('layouts.admin')

@section('title', 'Меню - Просмотр')

@section('content')
<h2>Меню</h2>
<hr>
<div class="clearfix">
    <div class="pull-left">
        <div class="btn-group group-control">
          <a href="{{ route('statistics.index') }}" class="btn btn-default">{{__('main.List')}}</a>
          <a href="{{ route('statistics.edit', ['id' => $model->id]) }}" class="btn btn-default">{{__('main.Edit')}}</a>
          <a href="{{ route('statistics.create') }}" class="btn btn-default">{{__('main.add_new')}}</a>
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
          <th scope="row">Title (uz)</th>
          <td>{{ $model->name_uz }}</td>
      </tr>
      <tr>
        <th scope="row">Title (ru)</th>
        <td>{{ $model->name_ru }}</td>
      </tr>
      <tr>
        <th scope="row">Title (cyrl)</th>
        <td>{{ $model->name_cyrl }}</td>
      </tr>
      <tr>
        <th scope="row">Title (en)</th>
        <td>{{ $model->name_en }}</td>
      </tr>
      <tr>
        <th scope="row">Parent Title (uz)</th>
        <td>{{ ($model->parent)?$model->parent->name_cyrl:'' }}</td>
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
<div class="clearfix">
  <div class="pull-left">
    <form action="{{route('statistics.destroy',['id' => $model->id])}}" method="post" style="display: none;" id='deleteItem'>
      @csrf
      <input name="_method" type="hidden" value="DELETE">
    </form>
    <a href="#" class="btn btn-danger" onclick="if (confirm('Вы уверены, что хотите удалить?')) { document.getElementById('deleteItem').submit(); } event.returnValue = false; return false;">Удалить</a>
  </div>
</div>
@endsection
