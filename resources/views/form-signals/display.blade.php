@extends('layouts.app')

@section('title', __('main.Острые сигналы'))

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
                {{__('main.Острые сигналы')}}
              </li>
            </ul>
          </div>

          <div class="pageHead">
            <h2 class="title title-28">{{__('main.Острые сигналы')}}</h2>
            <div class="borderedDec grey"></div>
          </div>
          @if (Session::has('success'))
              <br>
              <div class="alert alert-success">{{ __('main.'.Session::get('success')) }}</div>
          @endif
          @if (Session::has('error'))
              <br>
              <div class="alert alert-danger">{{ __('main.'.Session::get('error')) }}</div>
          @endif
          <?php echo Form::open(['url' => route('signals.submit'), 'method' => 'post', 'files' => true]) ?>
            <div class="formControl{{ $errors->has('subject') ? ' has-error' : '' }}">
              <label>{{__('main.Тема')}}</label>
              <div class="field2">
                <?= Form::text('subject', old('subject') ,['id' => 'subject', 'required' => true]) ?>
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
            <div class="formControl{{ $errors->has('message') ? ' has-error' : '' }}">
              <label>{{__('main.Сообщение')}}</label>
              <div class="field2">
                <?= Form::textarea('message', old('message') ,['rows' => '4','required' => true]) ?>
              </div>
              @if ($errors->has('message'))
                <span class="help-block">
                  <strong>{{ $errors->first('message') }}</strong>
                </span>
              @endif
            </div>

            <div class="formControl{{ $errors->has('file') ? ' has-error' : '' }}">
              <label>{{__('main.Прикрепить файл')}}</label>
              <div class="field2">
                <?= Form::file('file', ['class' => 'form-control', 'id' => 'file', 'accept'=>"image/x-png,image/jpg,image/jpeg"]) ?>
              </div>
              @if ($errors->has('file'))
                <span class="help-block">
                  <strong>{{ $errors->first('file') }}</strong>
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
