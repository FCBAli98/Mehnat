@extends('layouts.admin')

@section('title', 'Категории сотрудников - Добавление')

@section('content')
<h2>Категории сотрудников</h2>
<hr>
<div class="clearfix">
    <div class="pull-left">
        <div class="btn-group group-control">
          <a href="{{ route('admin.employee-categories.index') }}" class="btn btn-default">{{__('main.Back')}}</a>
        </div>
    </div>
</div>
<br>
<div class="row">
  <div class="col-md-12">
    <?php echo Form::model($model,['url' => route('admin.employee-categories.store'), 'method' => 'post']) ?>

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

      <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
        <label>Description</label>
        <?= Form::textarea('description', old('description') ,['class' => 'form-control textarea', 'rows' => '5' ,'id' => 'description']) ?>
        @if ($errors->has('description'))
          <span class="help-block">
            <strong>{{ $errors->first('description') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('relation_menu_id') ? ' has-error' : '' }}">
        <label>Menu</label>
        <?= Form::select('relation_menu_id', $menus, null,  ['class' => 'form-control', 'required' => true]) ?>
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

  </div>
</div>
@endsection
