@extends('layouts.admin')

@section('title', 'Роли - Редактирование')

@section('content')
<h2>Роли #{{ $model->id }}</h2>
<hr>
<div class="clearfix">
    <div class="pull-left">
        <div class="btn-group group-control">
          <a href="{{ route('admin.roles.index') }}" class="btn btn-default">{{__('main.List')}}</a>
          <a href="{{ route('admin.roles.show', ['id' => $model->id]) }}" class="btn btn-default">{{__('main.Show')}}</a>
          <a href="{{ route('admin.roles.create') }}" class="btn btn-default">{{__('main.add_new')}}</a>
        </div>
    </div>
</div>
<br>
<div class="row">
  <div class="col-md-4">

    <?php echo Form::model($model, ['url' => route('admin.roles.update',['id' => $model->id]), 'method' => 'PUT']) ?>
      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label>Name</label>
        <?= Form::text('name', old('name') ,['class' => 'form-control', 'id' => 'name', 'required' => true]) ?>
        @if ($errors->has('name'))
          <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
          </span>
        @endif
      </div>
      <div class="form-group{{ $errors->has('display_name') ? ' has-error' : '' }}">
        <label>Display Name</label>
        <?= Form::text('display_name', old('display_name') ,['class' => 'form-control', 'id' => 'display_name']) ?>
        @if ($errors->has('display_name'))
          <span class="help-block">
            <strong>{{ $errors->first('display_name') }}</strong>
          </span>
        @endif
      </div>
      <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
        <label>Description</label>
        <?= Form::textarea('description',old('description'),['class' => 'form-control', 'id' => 'description', 'rows' => 3]) ?>
        @if ($errors->has('description'))
          <span class="help-block">
            <strong>{{ $errors->first('description') }}</strong>
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
