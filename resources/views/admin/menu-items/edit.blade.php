@extends('layouts.admin')

@section('title', 'Пункты меню - Редактирование')

@section('content')
<h2>Пункты меню</h2>
<hr>
<div class="clearfix">
    <div class="pull-left">
        <div class="btn-group group-control">
          <a href="{{ route('admin.menu-items.index') }}" class="btn btn-default">{{__('main.List')}}</a>
          <a href="{{ route('admin.menu-items.show', ['id' => $model->id]) }}" class="btn btn-default">{{__('main.Show')}}</a>
          <a href="{{ route('admin.menu-items.create') }}" class="btn btn-default">{{__('main.add_new')}}</a>
        </div>
    </div>
</div>
<br>
    <?php echo Form::model($model, ['url' => route('admin.menu-items.update',['id' => $model->id]), 'method' => 'PUT', 'files' => true]) ?>
      <div class="form-group{{ $errors->has('lang') ? ' has-error' : '' }}">
        <label>Language</label>
        <?= Form::select('lang', $languages, null,  ['class' => 'form-control', 'required' => true, 'id' => 'lang-select']) ?>
        @if ($errors->has('lang'))
          <span class="help-block">
            <strong>{{ $errors->first('lang') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
        <label>Menu</label>
        <?= Form::select('category_id', $categories, null,  ['class' => 'form-control', 'required' => true]) ?>
        @if ($errors->has('category_id'))
          <span class="help-block">
            <strong>{{ $errors->first('category_id') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('parent_id') ? ' has-error' : '' }}">
        <label>Parent menu item</label>
        <?= Form::select('parent_id', $parents, null,  ['class' => 'form-control']) ?>
        @if ($errors->has('parent_id'))
          <span class="help-block">
            <strong>{{ $errors->first('parent_id') }}</strong>
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
  
      <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
        <label>Url</label>
        <?= Form::text('url', old('url') ,['class' => 'form-control', 'id' => 'url', 'required' => true]) ?>
        @if ($errors->has('url'))
          <span class="help-block">
            <strong>{{ $errors->first('url') }}</strong>
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
