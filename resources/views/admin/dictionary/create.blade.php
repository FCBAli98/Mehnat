@extends('layouts.admin')

@section('title', 'Страницы - Добавление')

@section('content')
<h2>Страницы</h2>
<hr>
<div class="clearfix">
    <div class="pull-left">
        <div class="btn-group group-control">
          <a href="{{ route('admin.dictionary.index') }}" class="btn btn-default">{{__('main.Back')}}</a>
        </div>
    </div>
</div>
<br>
    <?php echo Form::model($model,['url' => route('admin.dictionary.store'), 'method' => 'post', 'files' => true]) ?>
    @csrf
      <div class="form-group{{ $errors->has('lang') ? ' has-error' : '' }}">
        <label>Language</label>
        <?= Form::select('lang', $languages, null,  ['class' => 'form-control', 'required' => true]) ?>
        @if ($errors->has('lang'))
          <span class="help-block">
            <strong>{{ $errors->first('lang') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label>Name</label>
          <?= Form::textarea('name', old('name') ,['class' => 'form-control', 'rows' => '5' ,'id' => 'name', 'required' => true]) ?>
        @if ($errors->has('name'))
          <span class="help-block">
                  <strong>{{ $errors->first('name') }}</strong>
                </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
        <label>Description</label>
        <?= Form::textarea('description', old('description') ,['class' => 'form-control', 'rows' => '7' ,'id' => 'name', 'required' => true]) ?>
        @if ($errors->has('description'))
          <span class="help-block">
            <strong>{{ $errors->first('description') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('enabled') ? ' has-error' : '' }}">
        <label>Status</label>
        <?= Form::select('status', [
              1 => 'Опубликовано',
              0 => 'Не активен'
              ], null,  ['class' => 'form-control', 'required' => true]) ?>
        @if ($errors->has('status'))
          <span class="help-block">
            <strong>{{ $errors->first('status') }}</strong>
          </span>
        @endif
      </div>

      <div class="text-right">
        <button class="btn btn-success" type="submit">Submit</button>
      </div>

    <?php echo Form::close(); ?>

@endsection
