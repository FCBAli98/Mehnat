@extends('layouts.admin')

@section('title', 'Руководство - Редактирование')

@section('content')
<h2>Руководство #{{ $model->id }}</h2>
<hr>
<div class="clearfix">
    <div class="pull-left">
        <div class="btn-group group-control">
          <a href="{{ route('admin.employees.index') }}" class="btn btn-default">{{__('main.List')}}</a>
          <a href="{{ route('admin.employees.show', ['id' => $model->id]) }}" class="btn btn-default">{{__('main.Show')}}</a>
          <a href="{{ route('admin.employees.create') }}" class="btn btn-default">{{__('main.add_new')}}</a>
        </div>
    </div>
</div>
<br>
    <?php echo Form::model($model, ['url' => route('admin.employees.update',['id' => $model->id]), 'method' => 'PUT', 'files' => true]) ?>
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

      <div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}">
        <label>Должность</label>
        <?= Form::text('position', old('position') ,['class' => 'form-control', 'id' => 'position', 'required' => true]) ?>
        @if ($errors->has('position'))
          <span class="help-block">
            <strong>{{ $errors->first('position') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
        <label>Phone</label>
        <?= Form::text('phone', old('phone') ,['class' => 'form-control', 'id' => 'phone']) ?>
        @if ($errors->has('phone'))
          <span class="help-block">
            <strong>{{ $errors->first('phone') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('reception_days') ? ' has-error' : '' }}">
        <label>Приёмные дни</label>
        <?= Form::text('reception_days', old('reception_days') ,['class' => 'form-control', 'id' => 'reception_days', 'required' => true]) ?>
        @if ($errors->has('reception_days'))
          <span class="help-block">
            <strong>{{ $errors->first('reception_days') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
        <label>Фото</label>
        <?php if ($model->image): ?>
          <div id="imageBox">
            <img src="{{getThumbnail($model->image)}}" alt="">
            <p>
              <a href="#" id='changeImage'>Заменить</a>
            </p>
          </div>
          <div id="fileInput" style='display:none;'>
            <?= Form::file('image', ['class' => 'form-control', 'id' => 'image']) ?>
            <p>
              <a href="#" id='cancelChangeImage'>Отменить</a>
            </p>
          </div>
        <?php else: ?>
          <?= Form::file('image', ['class' => 'form-control', 'id' => 'image']) ?>
        <?php endif ?>
        @if ($errors->has('image'))
          <span class="help-block">
            <strong>{{ $errors->first('image') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
        <label>Описание</label>
        <?= Form::textarea('description', old('description') ,['class' => 'form-control', 'rows' => '5' ,'id' => 'description', 'required' => true]) ?>
        @if ($errors->has('description'))
          <span class="help-block">
            <strong>{{ $errors->first('description') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
        <label>Функции и задачи</label>
        <?= Form::textarea('content', old('content') ,['class' => 'form-control textarea']) ?>
        @if ($errors->has('content'))
          <span class="help-block">
            <strong>{{ $errors->first('content') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('enabled') ? ' has-error' : '' }}">
        <label>Status</label>
        <?= Form::select('enabled', \Config::get('handbook.statuses'), null,  ['class' => 'form-control', 'required' => true]) ?>
        @if ($errors->has('enabled'))
          <span class="help-block">
            <strong>{{ $errors->first('enabled') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('order') ? ' has-error' : '' }}">
        <label>Order</label>
        <?= Form::number('order', old('order') ,['class' => 'form-control', 'id' => 'order']) ?>
        @if ($errors->has('order'))
          <span class="help-block">
            <strong>{{ $errors->first('order') }}</strong>
          </span>
        @endif
      </div>

      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>История</strong>
        </div>
        <div class="panel-body" id="block-form-template">
          <input v-for="deleted in deleted_histories" type="hidden" name="deleted_histories[]" :value="deleted">
          <div v-for="(history, index) in histories" class="panel panel-default">
            <div class="panel-heading clearfix">
              <strong>@{{history.title}}</strong>
              <div class="pull-right" v-if="histories.length > 1">
                <a class="btn btn-danger btn-sm pull-right" @click="deleteBlock(index)"><i class="glyphicon glyphicon-trash"></i></a>
              </div>
            </div>
            <div class="panel-body">
              <input v-if="history.id" type="hidden" :name="'histories['+index+'][id]'" :id="'histories['+index+'][id]'" :value="history.id">
              <div class="form-group">
                <label :for="'histories['+index+'][title]'">Годы</label>
                <input :name="'histories['+index+'][title]'" type="text" v-model="history.title" class="form-control">
              </div>
              <div class="form-group">
                <label :for="'histories['+index+'][content]'">Место работы</label>
                <input :name="'histories['+index+'][content]'" type="text" v-model="history.content" class="form-control">
              </div>
            </div>
          </div>

          <hr>
          <div class="text-right">
            <a class="btn btn-primary" @click="addBlock">Добавить блок</a>
          </div>
          
        </div>
      </div>

      
      <div class="text-right">
        <button class="btn btn-success" type="submit">Submit</button>
      </div>
    <?php echo Form::close(); ?>

@endsection
@section('additionalJsFiles')
<script type="text/javascript">
  var histories = <?= isset($histories)&&$histories?json_encode($histories):0 ?>;
  if (!histories) {
    histories = [{
              title: '',
              content: ''
            }];
  }
</script>
<script src="<?= asset('admin-assets/js/employees-history-form.js').'?v='.time() ?>"></script>
@endsection