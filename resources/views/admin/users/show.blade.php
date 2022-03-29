@extends('layouts.admin')

@section('title', 'Пользователи - Просмотр')

@section('content')
<h2>{{__('main.Users')}} #{{ $model->id }}</h2>
<hr>
<div class="clearfix">
    <div class="pull-left">
        <div class="btn-group group-control">
          <a href="{{ route('admin.users.index') }}" class="btn btn-default">{{__('main.List')}}</a>
          <a href="{{ route('admin.users.edit', ['id' => $model->id]) }}" class="btn btn-default">{{__('main.Edit')}}</a>
          <a href="{{ route('admin.users.create') }}" class="btn btn-default">{{__('main.add_new')}}</a>
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
          <th scope="row">E-mail</th>
          <td>{{ $model->email }}</td>
      </tr>
      <tr>
          <th scope="row">Role</th>
          <td>{{ $model->role->display_name }}</td>
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
    <form action="{{route('admin.users.destroy',['id' => $model->id])}}" method="post" style="display: none;" id='deleteItem'>
        @csrf
        <input name="_method" type="hidden" value="DELETE">
      </form>
      <a href="#" class="btn btn-danger" onclick="if (confirm('Are you sure you want to delete?')) { document.getElementById('deleteItem').submit(); } event.returnValue = false; return false;">Delete</a>
  </div>
</div>
@endsection
