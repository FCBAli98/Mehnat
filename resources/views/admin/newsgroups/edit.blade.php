@extends('layouts.admin')

@section('title', 'Темы - Редактирование')

@section('content')
<h2>Темы #{{ $model->id }}</h2>
<hr>
<div class="clearfix">
    <div class="pull-left">
        <div class="btn-group group-control">
          <a href="{{ route('admin.newsgroups.index') }}" class="btn btn-default">{{__('main.List')}}</a>
          <a href="{{ route('admin.newsgroups.show', ['id' => $model->id]) }}" class="btn btn-default">{{__('main.Show')}}</a>
          <a href="{{ route('admin.newsgroups.create') }}" class="btn btn-default">{{__('main.add_new')}}</a>
        </div>
    </div>
</div>
<br>
<div class="row">
  <div class="col-md-4">

    <?php echo Form::model($model, ['url' => route('admin.newsgroups.update',['id' => $model->id]), 'method' => 'PUT']) ?>
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
      
      <div class="text-right">
        <button class="btn btn-success" type="submit">Submit</button>
      </div>
    <?php echo Form::close(); ?>

  </div>
</div>
@endsection
