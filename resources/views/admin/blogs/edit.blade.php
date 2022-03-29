@extends('layouts.admin')

@section('title', 'Блоги - Редактирование')

@section('content')
  <h2>
    Блоги #{{ $model->id }}
  </h2>

  <hr>

  <div class="clearfix">
    <div class="pull-left">
      <div class="btn-group group-control">
        <a href="{{ route('admin.blogs.index') }}" class="btn btn-default">{{ __('main.List') }}</a>
        <a href="{{ route('admin.blogs.show', ['id' => $model->id]) }}" class="btn btn-default">{{ __('main.Show') }}</a>
        <a href="{{ route('admin.blogs.create') }}" class="btn btn-default">{{ __('main.add_new') }}</a>
      </div>
    </div>
  </div>

  <br>

  {!! Form::model($model, ['url' => route('admin.blogs.update',['id' => $model->id]), 'method' => 'PUT', 'files' => true]) !!}
    <div class="form-group{{ $errors->has('lang') ? ' has-error' : '' }}">
      <label>Language</label>

      {!! Form::select('lang', $languages, null,  ['class' => 'form-control', 'required' => true, 'id' => 'lang-select']) !!}

      @if ($errors->has('lang'))
        <span class="help-block">
          <strong>{{ $errors->first('lang') }}</strong>
        </span>
      @endif
    </div>

    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
      <label>Title</label>

      {!! Form::text('title', old('title') ,['class' => 'form-control', 'id' => 'title', 'required' => true]) !!}

      @if ($errors->has('title'))
        <span class="help-block">
          <strong>{{ $errors->first('title') }}</strong>
        </span>
      @endif
    </div>

    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
      <label>Image</label>
      <?php if ($model->image): ?>
        <div id="imageBox">
          <img src="{{getThumbnail($model->image)}}" alt="">
          <p>
            <a href="#" id='changeImage'>Заменить</a>
          </p>
        </div>
        <div id="fileInput" style='display:none;'>
          <?= Form::file('image', ['class' => 'form-control', 'id' => 'image']) ?>
          <p>
            <a href="#" id='cancelChangeImage'>Отменить</a>
          </p>
        </div>
      <?php else: ?>
        <?= Form::file('image', ['class' => 'form-control', 'id' => 'image']) ?>
      <?php endif ?>
      @if ($errors->has('image'))
        <span class="help-block">
          <strong>{{ $errors->first('image') }}</strong>
        </span>
      @endif
    </div>

    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
      <label>Description</label>

      {!! Form::textarea('description', old('description') ,['class' => 'form-control', 'rows' => '5' ,'id' => 'description', 'required' => true]) !!}

      @if ($errors->has('description'))
        <span class="help-block">
          <strong>{{ $errors->first('description') }}</strong>
        </span>
      @endif
    </div>

    <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
      <label>Content</label>

      {!! Form::textarea('content', old('content') ,['class' => 'form-control textarea']) !!}

      @if ($errors->has('content'))
        <span class="help-block">
          <strong>{{ $errors->first('content') }}</strong>
        </span>
      @endif
    </div>

    <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
      <label>Date</label>

      {!! Form::text('date', old('date') ,['class' => 'form-control combodate', 'id' => 'date', 'required' => true]) !!}

      @if ($errors->has('date'))
        <span class="help-block">
          <strong>{{ $errors->first('date') }}</strong>
        </span>
      @endif
    </div>

    <div class="form-group{{ $errors->has('enabled') ? ' has-error' : '' }}">
      <label>Status</label>

      {!! Form::select('enabled', Config::get('handbook.statuses'), null,  ['class' => 'form-control', 'required' => true]) !!}

      @if ($errors->has('enabled'))
        <span class="help-block">
          <strong>{{ $errors->first('enabled') }}</strong>
        </span>
      @endif
    </div>

    <div class="form-group{{ $errors->has('order') ? ' has-error' : '' }}">
      <label>Order</label>

      {!! Form::text('order', old('order') ,['class' => 'form-control', 'id' => 'order']) !!}

      @if ($errors->has('order'))
        <span class="help-block">
          <strong>{{ $errors->first('order') }}</strong>
        </span>
      @endif
    </div>

    <div class="text-right">
      <button class="btn btn-success" type="submit">Submit</button>
    </div>
  {!! Form::close() !!}
@endsection
