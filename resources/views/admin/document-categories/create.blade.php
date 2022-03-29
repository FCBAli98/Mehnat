@extends('layouts.admin')

@section('title', 'Категории документов - Добавление')

@section('content')
<h2>Категории документов</h2>
<hr>
<div class="clearfix">
    <div class="pull-left">
        <div class="btn-group group-control">
          <a href="{{ route('admin.document-categories.index') }}" class="btn btn-default">{{__('main.Back')}}</a>
        </div>
    </div>
</div>
<br>
<div class="row">
  <div class="col-md-5">
    <?php echo Form::model($model,['url' => route('admin.document-categories.store'), 'method' => 'post']) ?>

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
