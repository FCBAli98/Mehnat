@extends('layouts.admin')

@section('title', 'Пользователи - Добавление')

@section('content')
<h2>{{__('main.User')}}</h2>
<hr>
<div class="clearfix">
    <div class="pull-left">
        <div class="btn-group group-control">
          <a href="{{ route('admin.users.index') }}" class="btn btn-default">{{__('main.Back')}}</a>
        </div>
    </div>
</div>
<br>
<div class="row">
  <div class="col-md-4">
    <?php echo Form::open(['url' => route('admin.users.store'), 'method' => 'post']) ?>
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
      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label>Password</label>
        <?= Form::password('password',['class' => 'form-control', 'id' => 'password', 'required' => true]) ?>
        @if ($errors->has('password'))
          <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
          </span>
        @endif
      </div>
      <div class="form-group">
        <label>Confirm Password</label>
        <?= Form::password('password_confirmation',['class' => 'form-control', 'id' => 'password_confirmation', 'required' => true]) ?>
      </div>
      <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
        <label>Role</label>
        <?= Form::select('role', $roles, null,  ['class' => 'form-control', 'required' => true]); ?>
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
