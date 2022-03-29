@extends('layouts.admin')

@section('title', 'Пользователи - Редактирование')

@section('content')
<h2>{{__('main.User')}} #{{ $model->id }}</h2>
<hr>
<div class="clearfix">
    <div class="pull-left">
        <div class="btn-group group-control">
          <a href="{{ route('admin.users.index') }}" class="btn btn-default">{{__('main.List')}}</a>
          <a href="{{ route('admin.users.show', ['id' => $model->id]) }}" class="btn btn-default">{{__('main.Show')}}</a>
          <a href="{{ route('admin.users.create') }}" class="btn btn-default">{{__('main.add_new')}}</a>
        </div>
    </div>
</div>
<br>
<div class="row">
  <div class="col-md-4">

    <?php echo Form::model($model, ['url' => route('admin.users.update',['id' => $model->id]), 'method' => 'PUT']) ?>
      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label>Name</label>
        <?= Form::text('name', old('name') ,['class' => 'form-control', 'id' => 'name', 'required' => true]) ?>
        @if ($errors->has('name'))
          <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
          </span>
        @endif
      </div>
      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label>E-mail</label>
        <?= Form::text('email', old('email') ,['class' => 'form-control', 'id' => 'email']) ?>
        @if ($errors->has('email'))
          <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
          </span>
        @endif
      </div>
      <div class="form-group{{ $errors->has('new_password') ? ' has-error' : '' }}">
        <label>New password</label>
        <?= Form::password('new_password',['class' => 'form-control', 'id' => 'new_password']) ?>
        @if ($errors->has('new_password'))
          <span class="help-block">
            <strong>{{ $errors->first('new_password') }}</strong>
          </span>
        @endif
      </div>
      <div class="form-group">
        <label>Confirm New password</label>
        <?= Form::password('new_password_confirmation',['class' => 'form-control', 'id' => 'new_password_confirmation']) ?>
      </div>
      <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
        <label>Role</label>
        <?= Form::select('role', $roles, $model->role->id,  ['class' => 'form-control', 'required' => true]); ?>
        @if ($errors->has('role'))
          <span class="help-block">
            <strong>{{ $errors->first('role') }}</strong>
          </span>
        @endif
      </div>
      <div class="text-right">
        <button class="btn btn-success" type="submit">Submit</button>
      </div>
    <?php echo Form::close(); ?>

  </div>
</div>
@endsection
