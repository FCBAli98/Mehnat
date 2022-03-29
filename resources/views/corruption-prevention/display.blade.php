@extends('layouts.app')

@section('title', __('main.Обращение по вопросам предотвращения коррупции сотрудников органов труда'))

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
                {{__('main.Обращение по вопросам предотвращения коррупции сотрудников органов труда')}}
              </li>
            </ul>
          </div>

          <div class="pageHead">
            <h2 class="title title-28">{{__('main.Обращение по вопросам предотвращения коррупции сотрудников органов труда')}}</h2>
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
          <?php echo Form::open(['url' => route('corruption-prevention.submit'), 'method' => 'post', 'files' => true]) ?>
            <div class="formControl{{ $errors->has('user_type') ? ' has-error' : '' }}">
              <label>{{__('main.Выберите физическое лицо/юридическое лицо')}} *</label>
              <div class="field2">
                <?= Form::select('user_type', $types, old('user_type'), ['required' => true]) ?>
              </div>
              @if ($errors->has('user_type'))
                <span class="help-block">
                  <strong>{{ $errors->first('user_type') }}</strong>
                </span>
              @endif
            </div>
            <div class="formControl{{ $errors->has('fio') ? ' has-error' : '' }}">
              <label>{{__('main.Ф.И.О. Заявителя/наименование юр.лица')}} *</label>
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
              <label>{{__('main.Телефон')}} *</label>
              <div class="field2">
                <?= Form::tel('phone', old('phone') ,['id' => 'phone', 'required' => true]) ?>
              </div>
              @if ($errors->has('phone'))
                <span class="help-block">
                  <strong>{{ $errors->first('phone') }}</strong>
                </span>
              @endif
            </div>
            <div class="formControl{{ $errors->has('email') ? ' has-error' : '' }}">
              <label>{{__('main.Электронная почта')}}</label>
              <div class="field2">
                <?= Form::email('email', old('email') ,['id' => 'email']) ?>
              </div>
              @if ($errors->has('email'))
                <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
              @endif
            </div>
            <div class="formControl{{ $errors->has('address') ? ' has-error' : '' }}">
              <label>{{__('main.Адрес')}} *</label>
              <div class="field2">
                <?= Form::text('address', old('address') ,['id' => 'address', 'required' => true]) ?>
              </div>
              @if ($errors->has('address'))
                <span class="help-block">
                  <strong>{{ $errors->first('address') }}</strong>
                </span>
              @endif
            </div>
            <div class="formControl{{ $errors->has('content') ? ' has-error' : '' }}">
              <label>{{__('main.Текст обращения')}} *</label>
              <div class="field2">
                <?= Form::textarea('content', old('content') ,['rows' => '4','required' => true]) ?>
              </div>
              @if ($errors->has('content'))
                <span class="help-block">
                  <strong>{{ $errors->first('content') }}</strong>
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