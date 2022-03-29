@extends('layouts.admin')

@section('title', 'Меню - Добавление')

@section('content')
<h2>Меню</h2>
<hr>
<div class="clearfix">
    <div class="pull-left">
        <div class="btn-group group-control">
          <a href="{{ route('admin.menu.index') }}" class="btn btn-default">{{__('main.Back')}}</a>
        </div>
    </div>
</div>
<br>
<div class="row">
  <div class="col-md-4">
    <?php echo Form::model($model,['url' => route('admin.menu.store'), 'method' => 'post']) ?>

      <div class="form-group{{ $errors->has('lang') ? ' has-error' : '' }}">
        <label>Language</label>
        <?= Form::select('lang', $languages, null,  ['class' => 'form-control', 'required' => true]) ?>
        @if ($errors->has('lang'))
          <span class="help-block">
            <strong>{{ $errors->first('lang') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('parent_id') ? ' has-error' : '' }}">
        <label>Parent</label>
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
      
      <div class="form-group{{ $errors->has('anchor') ? ' has-error' : '' }}">
        <label>Anchor</label>
        <?= Form::text('anchor', old('anchor') ,['class' => 'form-control', 'id' => 'anchor']) ?>
        @if ($errors->has('anchor'))
          <span class="help-block">
            <strong>{{ $errors->first('anchor') }}</strong>
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
