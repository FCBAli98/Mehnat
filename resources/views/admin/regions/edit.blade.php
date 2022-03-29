@extends('layouts.admin')

@section('title', 'Регионы - Редактирование')

@section('content')
<h2>Регионы #{{ $model->id }}</h2>
<hr>
<div class="clearfix">
    <div class="pull-left">
        <div class="btn-group group-control">
          <a href="{{ route('admin.regions.index') }}" class="btn btn-default">{{__('main.List')}}</a>
          <a href="{{ route('admin.regions.show', ['id' => $model->id]) }}" class="btn btn-default">{{__('main.Show')}}</a>
          <a href="{{ route('admin.regions.create') }}" class="btn btn-default">{{__('main.add_new')}}</a>
        </div>
    </div>
</div>
<br>
<div class="row">
  <div class="col-md-4">

    <?php echo Form::model($model, ['url' => route('admin.regions.update',['id' => $model->id]), 'method' => 'PUT']) ?>
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
        <label>ФИО</label>
        <?= Form::text('title', old('title') ,['class' => 'form-control', 'id' => 'title', 'required' => true]) ?>
        @if ($errors->has('title'))
          <span class="help-block">
            <strong>{{ $errors->first('title') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('hc_key') ? ' has-error' : '' }}">
        <label>HC key</label>
        <?= Form::select('hc_key', $hcKeys, null,  ['class' => 'form-control', 'required' => true]) ?>
        @if ($errors->has('hc_key'))
          <span class="help-block">
            <strong>{{ $errors->first('hc_key') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('legal_entity_count') ? ' has-error' : '' }}">
        <label>Legal count</label>
        <?= Form::number('legal_entity_count', old('legal_entity_count') ,['class' => 'form-control', 'id' => 'legal_entity_count', 'required' => true]) ?>
        @if ($errors->has('legal_entity_count'))
          <span class="help-block">
            <strong>{{ $errors->first('legal_entity_count') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('male_count') ? ' has-error' : '' }}">
        <label>Male count</label>
        <?= Form::number('male_count', old('male_count') ,['class' => 'form-control', 'id' => 'male_count', 'required' => true]) ?>
        @if ($errors->has('male_count'))
          <span class="help-block">
            <strong>{{ $errors->first('male_count') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('female_count') ? ' has-error' : '' }}">
        <label>Female count</label>
        <?= Form::number('female_count', old('female_count') ,['class' => 'form-control', 'id' => 'female_count', 'required' => true]) ?>
        @if ($errors->has('female_count'))
          <span class="help-block">
            <strong>{{ $errors->first('female_count') }}</strong>
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
