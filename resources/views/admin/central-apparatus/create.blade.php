@extends('layouts.admin')

@section('title', 'Центральный аппарат - Добавление')

@section('content')
<h2>Центральный аппарат</h2>
<hr>
<div class="clearfix">
    <div class="pull-left">
        <div class="btn-group group-control">
          <a href="{{ route('admin.central-apparatus.index') }}" class="btn btn-default">{{__('main.Back')}}</a>
        </div>
    </div>
</div>
<br>
    <?php echo Form::model($model,['url' => route('admin.central-apparatus.store'), 'method' => 'post', 'files' => true]) ?>

      <div class="form-group{{ $errors->has('lang') ? ' has-error' : '' }}">
        <label>Language</label>
        <?= Form::select('lang', $languages, null,  ['class' => 'form-control', 'required' => true]) ?>
        @if ($errors->has('lang'))
          <span class="help-block">
            <strong>{{ $errors->first('lang') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
        <label>ФИО</label>
        <?= Form::text('title', old('title') ,['class' => 'form-control', 'id' => 'title', 'required' => true]) ?>
        @if ($errors->has('title'))
          <span class="help-block">
            <strong>{{ $errors->first('title') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}">
        <label>Отдел</label>
        <?= Form::text('position', old('position') ,['class' => 'form-control', 'id' => 'position', 'required' => true]) ?>
        @if ($errors->has('position'))
          <span class="help-block">
            <strong>{{ $errors->first('position') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
        <label>Phone</label>
        <?= Form::text('phone', old('phone') ,['class' => 'form-control', 'id' => 'phone']) ?>
        @if ($errors->has('phone'))
          <span class="help-block">
            <strong>{{ $errors->first('phone') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('reception_days') ? ' has-error' : '' }}">
        <label>Приёмные дни</label>
        <?= Form::text('reception_days', old('reception_days') ,['class' => 'form-control', 'id' => 'reception_days', 'required' => true]) ?>
        @if ($errors->has('reception_days'))
          <span class="help-block">
            <strong>{{ $errors->first('reception_days') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
        <label>Фото</label>
        <?= Form::file('image', ['class' => 'form-control', 'id' => 'image']) ?>
        @if ($errors->has('image'))
          <span class="help-block">
            <strong>{{ $errors->first('image') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
        <label>Положение об управлении</label>
        <?= Form::textarea('description', old('description') ,['class' => 'form-control textarea', 'rows' => '5' ,'id' => 'description']) ?>
        @if ($errors->has('description'))
          <span class="help-block">
            <strong>{{ $errors->first('description') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
        <label>Должностные обязанности</label>
        <?= Form::textarea('content', old('content') ,['class' => 'form-control textarea']) ?>
        @if ($errors->has('content'))
          <span class="help-block">
            <strong>{{ $errors->first('content') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('enabled') ? ' has-error' : '' }}">
        <label>Status</label>
        <?= Form::select('enabled', \Config::get('handbook.statuses'), null,  ['class' => 'form-control', 'required' => true]) ?>
        @if ($errors->has('enabled'))
          <span class="help-block">
            <strong>{{ $errors->first('enabled') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('order') ? ' has-error' : '' }}">
        <label>Order</label>
        <?= Form::number('order', old('order') ,['class' => 'form-control', 'id' => 'order']) ?>
        @if ($errors->has('order'))
          <span class="help-block">
            <strong>{{ $errors->first('order') }}</strong>
          </span>
        @endif
      </div>

      <div class="text-right">
        <button class="btn btn-success" type="submit">Submit</button>
      </div>      
    <?php echo Form::close(); ?>

@endsection