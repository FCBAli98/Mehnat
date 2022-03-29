@extends('layouts.admin')

@section('title', 'Меню - Добавление')

@section('content')
<h2>Меню</h2>
<hr>
<div class="clearfix">
    <div class="pull-left">
        <div class="btn-group group-control">
          <a href="{{ route('statistics.index') }}" class="btn btn-default">{{__('main.Back')}}</a>
        </div>
    </div>
</div>
<br>
<div class="row">
  <div class="col-md-4">
    <?php echo Form::model($model, ['url' => route('store_regions_statistics'), 'method' => 'post']) ?>

      <div class="form-group{{ $errors->has('region_id') ? ' has-error' : '' }}">
        <label>Parent</label>
        <?= Form::select('region_id', $regions, null,  ['class' => 'form-control']) ?>
        @if ($errors->has('region_id'))
          <span class="help-block">
            <strong>{{ $errors->first('region_id') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('statistic_id') ? ' has-error' : '' }}">
        <label>Parent</label>
        <?= Form::select('statistic_id', $parents, null,  ['class' => 'form-control']) ?>
        @if ($errors->has('statistic_id'))
          <span class="help-block">
            <strong>{{ $errors->first('statistic_id') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('value') ? ' has-error' : '' }}">
        <label>value</label>
        <?= Form::number('value', old('value'),['class' => 'form-control', 'id' => 'value', 'required' => true, 'step' => '0.001']) ?>
        @if ($errors->has('value'))
          <span class="help-block">
            <strong>{{ $errors->first('value') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('year') ? ' has-error' : '' }}">
        <label>year</label>
        <?= Form::number('year', 2021, ['class' => 'form-control', 'id' => 'year', 'required' => true]) ?>
        @if ($errors->has('year'))
          <span class="help-block">
            <strong>{{ $errors->first('year') }}</strong>
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
