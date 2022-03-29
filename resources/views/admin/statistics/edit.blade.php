@extends('layouts.admin')

@section('title', 'Меню - Редактирование')

@section('content')
<h2>Меню #{{ $model->id }}</h2>
<hr>
<div class="clearfix">
    <div class="pull-left">
        <div class="btn-group group-control">
          <a href="{{ route('statistics.index') }}" class="btn btn-default">{{__('main.List')}}</a>
          <a href="{{ route('statistics.show', ['id' => $model->id]) }}" class="btn btn-default">{{__('main.Show')}}</a>
          <a href="{{ route('statistics.create') }}" class="btn btn-default">{{__('main.add_new')}}</a>
        </div>
    </div>
</div>
<br>
<div class="row">
  <div class="col-md-4">

    <?php echo Form::model($model, ['url' => route('statistics.update',['id' => $model->id]), 'method' => 'PUT']) ?>
      <div class="form-group{{ $errors->has('parent_id') ? ' has-error' : '' }}">
        <label>Parent</label>
        <?= Form::select('parent_id', $parents, null,  ['class' => 'form-control']) ?>
        @if ($errors->has('parent_id'))
          <span class="help-block">
            <strong>{{ $errors->first('parent_id') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('name_uz') ? ' has-error' : '' }}">
        <label>Title (uz)</label>
        <?= Form::text('name_uz', old('name_uz') ,['class' => 'form-control', 'id' => 'name_uz', 'required' => true]) ?>
        @if ($errors->has('name_uz'))
          <span class="help-block">
            <strong>{{ $errors->first('name_uz') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('name_ru') ? ' has-error' : '' }}">
        <label>Title (ru)</label>
        <?= Form::text('name_ru', old('name_ru') ,['class' => 'form-control', 'id' => 'name_ru', 'required' => true]) ?>
        @if ($errors->has('name_ru'))
          <span class="help-block">
            <strong>{{ $errors->first('name_ru') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('name_cyrl') ? ' has-error' : '' }}">
        <label>Title (cyrl)</label>
        <?= Form::text('name_cyrl', old('name_cyrl') ,['class' => 'form-control', 'id' => 'name_cyrl', 'required' => true]) ?>
        @if ($errors->has('name_cyrl'))
          <span class="help-block">
            <strong>{{ $errors->first('name_cyrl') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('name_en') ? ' has-error' : '' }}">
        <label>Title (en)</label>
        <?= Form::text('name_en', old('name_en') ,['class' => 'form-control', 'id' => 'name_en', 'required' => true]) ?>
        @if ($errors->has('name_en'))
          <span class="help-block">
            <strong>{{ $errors->first('name_en') }}</strong>
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
