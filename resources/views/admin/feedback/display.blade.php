@extends('layouts.admin')

@section('title', 'Задать вопрос')

@section('content')
<div class="pull-right">
  <br>
  <div class="form-group">
    Перейти: <a href="{{route('feedback')}}" target="_blank">{{route('feedback', [], false)}}</a>
  </div>
</div>
<h2>Задать вопрос</h2>
<hr>
    <?php echo Form::model($model,['url' => route('admin.feedback.submit'), 'method' => 'post', 'files' => true]) ?>

      <div class="form-group{{ $errors->has('lang') ? ' has-error' : '' }}">
        <label>Language</label>
        <?= Form::select('lang', $languages, null,  ['class' => 'form-control', 'required' => true, 'id' => 'lang-select']) ?>
        @if ($errors->has('lang'))
          <span class="help-block">
            <strong>{{ $errors->first('lang') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('anchor') ? ' has-error' : '' }}">
        <label>Email получателя</label>
        <?= Form::email('anchor', old('anchor') ,['class' => 'form-control', 'id' => 'anchor', 'required' => true]) ?>
        @if ($errors->has('anchor'))
          <span class="help-block">
            <strong>{{ $errors->first('anchor') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('additional_field1') ? ' has-error' : '' }}">
        <label>Сообщение успешной отправки формы</label>
        <?= Form::text('additional_field1', old('additional_field1') ,['class' => 'form-control', 'id' => 'additional_field1', 'required' => true]) ?>
        @if ($errors->has('additional_field1'))
          <span class="help-block">
            <strong>{{ $errors->first('additional_field1') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('additional_field2') ? ' has-error' : '' }}">
        <label>Сообщение не успешной отправки формы</label>
        <?= Form::text('additional_field2', old('additional_field2') ,['class' => 'form-control', 'id' => 'additional_field2', 'required' => true]) ?>
        @if ($errors->has('additional_field2'))
          <span class="help-block">
            <strong>{{ $errors->first('additional_field2') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
        <label>Description</label>
        <?= Form::textarea('description', old('description') ,['class' => 'form-control textarea']) ?>
        @if ($errors->has('description'))
          <span class="help-block">
            <strong>{{ $errors->first('description') }}</strong>
          </span>
        @endif
      </div>
      
      <div class="text-right">
        <button class="btn btn-success" type="submit">Submit</button>
      </div>
      
    <?php echo Form::close(); ?>

@endsection
