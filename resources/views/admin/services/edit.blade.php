@extends('layouts.admin')

@section('title', 'Услуги - Редактирование')

@section('content')
<h2>Услуги #{{ $model->id }}</h2>
<hr>
<div class="clearfix">
    <div class="pull-left">
        <div class="btn-group group-control">
          <a href="{{ route('admin.services.index') }}" class="btn btn-default">{{__('main.List')}}</a>
          <a href="{{ route('admin.services.show', ['id' => $model->id]) }}" class="btn btn-default">{{__('main.Show')}}</a>
          <a href="{{ route('admin.services.create') }}" class="btn btn-default">{{__('main.add_new')}}</a>
        </div>
    </div>
</div>
<br>
    <?php echo Form::model($model, ['url' => route('admin.services.update',['id' => $model->id]), 'method' => 'PUT', 'files' => true]) ?>
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
        <label>Category</label>
        <?= Form::select('category_id', $categories, null,  ['class' => 'form-control', 'required' => true]) ?>
        @if ($errors->has('category_id'))
          <span class="help-block">
            <strong>{{ $errors->first('category_id') }}</strong>
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

      <div class="form-group{{ $errors->has('icon') ? ' has-error' : '' }}">
        <label>Icon</label>
        <?php if ($model->image): ?>
          <div id="imageBox">
            <img src="{{getIcon($model->image)}}" alt="">
            <p>
              <a href="#" id='changeImage'>Заменить</a>
            </p>
          </div>
          <div id="fileInput" style='display:none;'>
            <?= Form::file('icon', ['class' => 'form-control', 'id' => 'icon']) ?>
            <p>
              <a href="#" id='cancelChangeImage'>Отменить</a>
            </p>
          </div>
        <?php else: ?>
          <?= Form::file('icon', ['class' => 'form-control', 'id' => 'icon']) ?>
        <?php endif ?>
        @if ($errors->has('icon'))
          <span class="help-block">
            <strong>{{ $errors->first('icon') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
        <label>Description</label>
        <?= Form::textarea('description', old('description') ,['class' => 'form-control', 'rows' => '5' ,'id' => 'description']) ?>
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

      <div class="form-group{{ $errors->has('another_url') ? ' has-error' : '' }}">
        <label>Url на сторонний сервер</label>
        <?= Form::text('another_url', old('another_url') ,['class' => 'form-control', 'id' => 'another_url']) ?>
        @if ($errors->has('another_url'))
          <span class="help-block">
            <strong>{{ $errors->first('another_url') }}</strong>
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
