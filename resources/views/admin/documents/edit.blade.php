@extends('layouts.admin')

@section('title', 'Документы - Редактирование')

@section('content')
<h2>Документы #{{ $model->id }}</h2>
<hr>
<div class="clearfix">
    <div class="pull-left">
        <div class="btn-group group-control">
          <a href="{{ route('admin.documents.index') }}" class="btn btn-default">{{__('main.List')}}</a>
          <a href="{{ route('admin.documents.show', ['id' => $model->id]) }}" class="btn btn-default">{{__('main.Show')}}</a>
          <a href="{{ route('admin.documents.create') }}" class="btn btn-default">{{__('main.add_new')}}</a>
        </div>
    </div>
</div>
<br>
    <?php echo Form::model($model, ['url' => route('admin.documents.update',['id' => $model->id]), 'method' => 'PUT', 'files' => true]) ?>
      <div class="form-group{{ $errors->has('lang') ? ' has-error' : '' }}">
        <label>Язык</label>
        <?= Form::select('lang', $languages, null,  ['class' => 'form-control', 'required' => true]) ?>
        @if ($errors->has('lang'))
          <span class="help-block">
            <strong>{{ $errors->first('lang') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
        <label>Категория</label>
        <?= Form::select('category_id', $categories, null,  ['class' => 'form-control', 'required' => true]) ?>
        @if ($errors->has('category_id'))
          <span class="help-block">
            <strong>{{ $errors->first('category_id') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
        <label>Название документа</label>
        <?= Form::text('title', old('title') ,['class' => 'form-control', 'id' => 'title', 'required' => true]) ?>
        @if ($errors->has('title'))
          <span class="help-block">
            <strong>{{ $errors->first('title') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('file1') ? ' has-error' : '' }}">
        <label>Файл [DOC, DOCX]</label>
        <?php if ($model->file1): ?>
          <div class="fileBox">
            <p>
              <a href="{{getFile($model->file1)}}">
                <i class="fa fa-file-text-o fa-fw"></i>
                Скачать
              </a>
            </p>
            <p>
              <a href="#" class='changeFile'>Заменить</a>
            </p>
          </div>
          <div class="fileInput" style='display:none;'>
            <?= Form::file('file1', ['class' => 'form-control', 'id' => 'file1', 'accept'=>".doc, .docx"]) ?>
            <p>
              <a href="#" class='cancelChangeFile'>Отменить</a>
            </p>
          </div>
        <?php else: ?>
          <?= Form::file('file1', ['class' => 'form-control', 'id' => 'file1', 'accept'=>".doc, .docx"]) ?>
        <?php endif ?>
        @if ($errors->has('file1'))
          <span class="help-block">
            <strong>{{ $errors->first('file1') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('file2') ? ' has-error' : '' }}">
        <label>Файл [PDF]</label>
        <?php if ($model->file2): ?>
          <div class="fileBox">
            <p>
              <a href="{{getFile($model->file2)}}">
                <i class="fa fa-file-text-o fa-fw"></i>
                Скачать
              </a>
            </p>
            <p>
              <a href="#" class='changeFile'>Заменить</a>
            </p>
          </div>
          <div class="fileInput" style='display:none;'>
            <?= Form::file('file2', ['class' => 'form-control', 'id' => 'file2', 'accept'=>".pdf"]) ?>
            <p>
              <a href="#" class='cancelChangeFile'>Отменить</a>
            </p>
          </div>
        <?php else: ?>
          <?= Form::file('file2', ['class' => 'form-control', 'id' => 'file2', 'accept'=>".pdf"]) ?>
        <?php endif ?>
        @if ($errors->has('file2'))
          <span class="help-block">
            <strong>{{ $errors->first('file2') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('no') ? ' has-error' : '' }}">
        <label>№</label>
        <?= Form::text('no', old('no') ,['class' => 'form-control', 'id' => 'no']) ?>
        @if ($errors->has('no'))
          <span class="help-block">
            <strong>{{ $errors->first('no') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('another_url') ? ' has-error' : '' }}">
        <label>Ссылка</label>
        <?= Form::text('another_url', old('another_url') ,['class' => 'form-control', 'id' => 'another_url', 'required' => true]) ?>
        @if ($errors->has('another_url'))
          <span class="help-block">
            <strong>{{ $errors->first('another_url') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
        <label>Дата документа</label>
        <?= Form::text('date', old('date') ,['class' => 'form-control combodate', 'id' => 'date', 'required' => true]) ?>
        @if ($errors->has('date'))
          <span class="help-block">
            <strong>{{ $errors->first('date') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('enabled') ? ' has-error' : '' }}">
        <label>Статус</label>
        <?= Form::select('enabled', \Config::get('handbook.statuses'), null,  ['class' => 'form-control', 'required' => true]) ?>
        @if ($errors->has('enabled'))
          <span class="help-block">
            <strong>{{ $errors->first('enabled') }}</strong>
          </span>
        @endif
      </div>
      
      <div class="text-right">
        <button class="btn btn-success" type="submit">Submit</button>
      </div>
    <?php echo Form::close(); ?>

@endsection
