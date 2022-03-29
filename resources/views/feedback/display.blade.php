@extends('layouts.app')

@section('title', __('main.Задать вопрос'))

@section('content')
<div class="whiteSection">
  <div class="mainContainer">
    <div class="contentBlock firstContent">
      <div class="middleContainer">
        <div class="staticPage">

          <div class="breadcrumbs1">
            <ul>
              <li>
                <a href="{{route('home')}}">{{__('main.home')}}</a>
              </li>
              <li>
                {{__('main.Задать вопрос')}}
              </li>
            </ul>
          </div>

          <div class="pageHead">
            <h2 class="title title-28">{{__('main.Задать вопрос')}}</h2>
            <div class="borderedDec grey"></div>
          </div>
          @if (Session::has('success'))
              <br>
              <div class="alert alert-success">{{ Session::get('success') }}</div>
          @endif
          @if (Session::has('error'))
              <br>
              <div class="alert alert-danger">{{ Session::get('error') }}</div>
          @endif
          <?php if ($model->description): ?>
            <?= $model->description ?>
            <br>
          <?php endif ?>
          <?php echo Form::open(['url' => route('feedback.submit'), 'method' => 'post', 'files' => true]) ?>
            <div class="formControl{{ $errors->has('subject') ? ' has-error' : '' }}">
              <label>{{__('main.Тема')}}</label>
              <div class="field2">
                <?= Form::select('subject', $subjects, old('subject'), ['required' => true]) ?>
              </div>
              @if ($errors->has('subject'))
                <span class="help-block">
                  <strong>{{ $errors->first('subject') }}</strong>
                </span>
              @endif
            </div>
            <div class="formControl{{ $errors->has('fio') ? ' has-error' : '' }}">
              <label>{{__('main.ФИО')}}</label>
              <div class="field2">
                <?= Form::text('fio', old('fio') ,['id' => 'fio', 'required' => true]) ?>
              </div>
              @if ($errors->has('fio'))
                <span class="help-block">
                  <strong>{{ $errors->first('fio') }}</strong>
                </span>
              @endif
            </div>
            <div class="formControl{{ $errors->has('phone') ? ' has-error' : '' }}">
              <label>{{__('main.Телефон')}}</label>
              <div class="field2">
                <?= Form::tel('phone', old('phone') ,['id' => 'phone', 'required' => true]) ?>
              </div>
              @if ($errors->has('phone'))
                <span class="help-block">
                  <strong>{{ $errors->first('phone') }}</strong>
                </span>
              @endif
            </div>
            <div class="formControl{{ $errors->has('address') ? ' has-error' : '' }}">
              <label>{{__('main.Адрес')}}</label>
              <div class="field2">
                <?= Form::text('address', old('address') ,['id' => 'address', 'required' => true]) ?>
              </div>
              @if ($errors->has('address'))
                <span class="help-block">
                  <strong>{{ $errors->first('address') }}</strong>
                </span>
              @endif
            </div>
            <div class="formControl{{ $errors->has('comment') ? ' has-error' : '' }}">
              <label>{{__('main.Комментарий')}}</label>
              <div class="field2">
                <?= Form::textarea('comment', old('comment') ,['rows' => '4','required' => true]) ?>
              </div>
              @if ($errors->has('comment'))
                <span class="help-block">
                  <strong>{{ $errors->first('comment') }}</strong>
                </span>
              @endif
            </div>
            <div class="textRight">
              <button class="btn0 btn2">{{__('main.Отправить')}}</button>
            </div>
          <?php echo Form::close(); ?>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('sliderLinks')
  <?php echo App::make("App\Http\Controllers\SliderLinksController")->display(); ?>
@endsection