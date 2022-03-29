@extends('layouts.admin')

@section('title', 'Страницы - Редактирование')

@section('content')
<h2>Страницы #{{ $model->id }}</h2>
<hr>
<div class="clearfix">
    <div class="pull-left">
        <div class="btn-group group-control">
          <a href="{{ route('admin.pages.index') }}" class="btn btn-default">{{__('main.List')}}</a>
          <a href="{{ route('admin.pages.show', ['id' => $model->id]) }}" class="btn btn-default">{{__('main.Show')}}</a>
          <a href="{{ route('admin.pages.create') }}" class="btn btn-default">{{__('main.add_new')}}</a>
        </div>
    </div>
</div>
<br>
    <?php echo Form::model($model, ['url' => route('admin.pages.update',['id' => $model->id]), 'method' => 'PUT', 'files' => true]) ?>
      <div class="form-group{{ $errors->has('lang') ? ' has-error' : '' }}">
        <label>Language</label>
        <?= Form::select('lang', $languages, null,  ['class' => 'form-control', 'required' => true, 'id' => 'lang-select']) ?>
        @if ($errors->has('lang'))
          <span class="help-block">
            <strong>{{ $errors->first('lang') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
        <label>Title</label>
        <?= Form::text('title', old('title') ,['class' => 'form-control', 'id' => 'title', 'required' => true]) ?>
        @if ($errors->has('title'))
          <span class="help-block">
            <strong>{{ $errors->first('title') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
        <label>Description</label>
        <?= Form::textarea('description', old('description') ,['class' => 'form-control', 'rows' => '5' ,'id' => 'description', 'required' => true]) ?>
        @if ($errors->has('description'))
          <span class="help-block">
            <strong>{{ $errors->first('description') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
        <label>Content</label>
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

      <div class="form-group{{ $errors->has('relation_menu_id') ? ' has-error' : '' }}">
        <label>Menu</label>
        <?= Form::select('relation_menu_id', $menus, null,  ['class' => 'form-control']) ?>
        @if ($errors->has('relation_menu_id'))
          <span class="help-block">
            <strong>{{ $errors->first('relation_menu_id') }}</strong>
          </span>
        @endif
      </div>
      
      <div class="text-right">
        <button class="btn btn-success" type="submit">Submit</button>
      </div>
    <?php echo Form::close(); ?>

@endsection
