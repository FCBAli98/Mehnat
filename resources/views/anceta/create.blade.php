@extends('layouts.app')

@section('title', __('main.home'))

@section('additionalCssFiles')
  <style>
    .form-control {
      width: 100%;
      background: #fff;
      border-radius: 8px;
      -o-border-radius: 8px;
      -moz-border-radius: 8px;
      -webkit-border-radius: 8px;
      -ms-border-radius: 8px;
      border: 2px solid #E3E0E0;
      height: 48px;
      padding: 0 10px;
      font-size: 15px;
    }

    /* The Modal (background) */
    .modal {
      display: none; /* Hidden by default */
      position: fixed; /* Stay in place */
      z-index: 9999; /* Sit on top */
      left: 0;
      top: 0;
      width: 100%; /* Full width */
      height: auto; /* Full height */
      overflow: auto; /* Enable scroll if needed */
      background-color: rgb(0, 0, 0); /* Fallback color */
      background-color: rgba(0, 0, 0, 0.4); /* Black w/ opacity */
    }

    /* Modal Content/Box */
    .modal-content {
      background-color: #fefefe;
      margin: 10% auto; /* 15% from the top and centered */
      padding: 2px;
      border: 1px solid #888;
      width: 50%; /* Could be more or less, depending on screen size */
    }

    /* The Close Button */
    .close {
      color: #aaa;
      float: right;
      font-size: 18px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: black;
      text-decoration: none;
      cursor: pointer;
    }

    /*  loader*/

    /* Absolute Center Spinner */
    .loading {
      position: fixed;
      z-index: 999;
      height: 2em;
      width: 2em;
      overflow: show;
      margin: auto;
      top: 0;
      left: 0;
      bottom: 0;
      right: 0;
    }

    /* Transparent Overlay */
    .loading:before {
      content: '';
      display: block;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: radial-gradient(rgba(20, 20, 20, .8), rgba(0, 0, 0, .8));

      background: -webkit-radial-gradient(rgba(20, 20, 20, .8), rgba(0, 0, 0, .8));
    }

    /* :not(:required) hides these rules from IE9 and below */
    .loading:not(:required) {
      /* hide "loading..." text */
      font: 0/0 a;
      color: transparent;
      text-shadow: none;
      background-color: transparent;
      border: 0;
    }

    .loading:not(:required):after {
      content: '';
      display: block;
      font-size: 10px;
      width: 1em;
      height: 1em;
      margin-top: -0.5em;
      -webkit-animation: spinner 150ms infinite linear;
      -moz-animation: spinner 150ms infinite linear;
      -ms-animation: spinner 150ms infinite linear;
      -o-animation: spinner 150ms infinite linear;
      animation: spinner 150ms infinite linear;
      border-radius: 0.5em;
      -webkit-box-shadow: rgba(255, 255, 255, 0.75) 1.5em 0 0 0, rgba(255, 255, 255, 0.75) 1.1em 1.1em 0 0, rgba(255, 255, 255, 0.75) 0 1.5em 0 0, rgba(255, 255, 255, 0.75) -1.1em 1.1em 0 0, rgba(255, 255, 255, 0.75) -1.5em 0 0 0, rgba(255, 255, 255, 0.75) -1.1em -1.1em 0 0, rgba(255, 255, 255, 0.75) 0 -1.5em 0 0, rgba(255, 255, 255, 0.75) 1.1em -1.1em 0 0;
      box-shadow: rgba(255, 255, 255, 0.75) 1.5em 0 0 0, rgba(255, 255, 255, 0.75) 1.1em 1.1em 0 0, rgba(255, 255, 255, 0.75) 0 1.5em 0 0, rgba(255, 255, 255, 0.75) -1.1em 1.1em 0 0, rgba(255, 255, 255, 0.75) -1.5em 0 0 0, rgba(255, 255, 255, 0.75) -1.1em -1.1em 0 0, rgba(255, 255, 255, 0.75) 0 -1.5em 0 0, rgba(255, 255, 255, 0.75) 1.1em -1.1em 0 0;
    }

    /* Animation */

    @-webkit-keyframes spinner {
      0% {
        -webkit-transform: rotate(0deg);
        -moz-transform: rotate(0deg);
        -ms-transform: rotate(0deg);
        -o-transform: rotate(0deg);
        transform: rotate(0deg);
      }
      100% {
        -webkit-transform: rotate(360deg);
        -moz-transform: rotate(360deg);
        -ms-transform: rotate(360deg);
        -o-transform: rotate(360deg);
        transform: rotate(360deg);
      }
    }

    @-moz-keyframes spinner {
      0% {
        -webkit-transform: rotate(0deg);
        -moz-transform: rotate(0deg);
        -ms-transform: rotate(0deg);
        -o-transform: rotate(0deg);
        transform: rotate(0deg);
      }
      100% {
        -webkit-transform: rotate(360deg);
        -moz-transform: rotate(360deg);
        -ms-transform: rotate(360deg);
        -o-transform: rotate(360deg);
        transform: rotate(360deg);
      }
    }

    @-o-keyframes spinner {
      0% {
        -webkit-transform: rotate(0deg);
        -moz-transform: rotate(0deg);
        -ms-transform: rotate(0deg);
        -o-transform: rotate(0deg);
        transform: rotate(0deg);
      }
      100% {
        -webkit-transform: rotate(360deg);
        -moz-transform: rotate(360deg);
        -ms-transform: rotate(360deg);
        -o-transform: rotate(360deg);
        transform: rotate(360deg);
      }
    }

    @keyframes spinner {
      0% {
        -webkit-transform: rotate(0deg);
        -moz-transform: rotate(0deg);
        -ms-transform: rotate(0deg);
        -o-transform: rotate(0deg);
        transform: rotate(0deg);
      }
      100% {
        -webkit-transform: rotate(360deg);
        -moz-transform: rotate(360deg);
        -ms-transform: rotate(360deg);
        -o-transform: rotate(360deg);
        transform: rotate(360deg);
      }
    }
  </style>
@endsection

@section('content')
  <div class="loading">Loading&#8230;</div>
  <div class="whiteSection">
    <div class="mainContainer">
      <div class="contentBlock firstContent">
        <div class="minContainer">
          <div class="pageHead">
{{--            <h3 class="title title-24 textCenter">{!! __('main.personal_data') !!}</h3>--}}
            <h3 class="title title-24 textCenter">Shaxsiy ma'lumotlar</h3>
          </div>
          <div class="pageColls">
            <!-- The Modal -->
            <div id="myModal" class="modal">

              <!-- Modal content -->
              <div class="modal-content">
                <span class="close" style="margin-right: 5px">&times;</span>
                <img src="/images/dataNotFound.jpg" alt="">
                <p id="showMessage" style="display: none"></p>
              </div>

            </div>
            @if (Session::has('success'))
              <br>
              <div class="alert alert-success">{{__('main.'.Session::get('success'))}}</div>
            @endif
            @if (Session::has('error'))
              <br>
              <div class="alert alert-danger">{{ Session::get('error') }}</div>
            @endif

            <?php echo Form::open(['url' => route('anceta.store'), 'method' => 'post', 'files' => true, 'id' => 'my_form']) ?>
            {{ csrf_field() }}
            <div class="row10">
              <div class="field222">
                <div class="row10">
                  <div class="formControl{{ $errors->has('passport_series') ? ' has-error' : '' }}">
                    <div class="field222">
                      <div class="col-xs-12 col-sm-12 col-md-4">
                        <label>Pasport seriya va raqamini kiriting</label>
                        <div class="col-xs-3 col-sm-3 col-md-3" style="padding-left: 0">
                          <input type="hidden" name="person_id" value="0" id="person_id">
                          <?= Form::text('passport_series', old('passport_series') ,['id' => 'passport_series', 'required' => true, 'minlength' => 2, 'maxlength' => 2, 'class' => 'example form-control']) ?>
                        </div>
                        <div class="col-xs-9 col-sm-9 col-md-9">
                          <?= Form::text('passport_number', old('passport_number') ,['id' => 'passport_number', 'required' => true, 'minlength' => 7, 'maxlength' => 7, 'class' => 'example form-control' ]) ?>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-4">
                        <label>Tug'ilgan kun, oy, yil</label>
                        <input type="text" class="datepicker form-control example" id="birth_date" name="birth_date" required value="{{ (old('birth_date')?old('birth_date'):'') }}">
                      </div>
                      <div class="col-md-4">
                        <label>Bog'lanish uchun telefon</label>
                        <?= Form::tel('phone', old('phone') ,['id' => 'phone', 'required' => true, 'class' => ' form-control', 'minlength' => 9, 'maxlength' => 9, 'placeholder' => '999999999']) ?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row10" style="margin-bottom: 10px">
                  @if ($errors->has('FIO'))
                    <span class="help-block">
                    <strong>{{ $errors->first('FIO') }}</strong>
                  </span>
                  @endif
                  <div class="formControl">
                    <div class="field22">
                      <div class="col-xs-12 col-sm-12 col-md-6">
                        <label>FIO</label>
                        <?= Form::text('FIO', old('FIO') ,['id' => 'FIO', 'required' => true, 'class' => ' form-control']) ?>
                      </div>
                    </div>
                    @if ($errors->has('FIO'))
                      <span class="help-block">
                  <strong>{{ $errors->first('FIO') }}</strong>
                </span>
                    @endif
                  </div>
                </div>
                <div class="row10">
                  <h3 class="title title-24 textCenter">Yashash manzil</h3>
                  <div class="col-xs-12 col-sm-12 col-md-4">
                    <div class="formControl{{ $errors->has('region_id') ? ' has-error' : '' }}">
                      <label>Hudud</label>
                      <div class="field22">
                        <?= Form::select('region_id', $regions, old('region_id'), ['required' => true, 'class' => ' form-control', 'id' => 'region_id']) ?>
                      </div>
                      @if ($errors->has('region_id'))
                        <span class="help-block">
                      <strong>{{ $errors->first('region_id') }}</strong>
                    </span>
                      @endif
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-4">
                    <div class="formControl{{ $errors->has('city_id') ? ' has-error' : '' }}">
                      <label>Tuman (shahar)</label>
                      <div class="field22">
                        <select name="city_id" id="city_id" class="form-control" required="false"></select>
                      </div>
                      @if ($errors->has('city_id'))
                        <span class="help-block">
                      <strong>{{ $errors->first('city_id') }}</strong>
                    </span>
                      @endif
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-4">
                    <div class="formControl{{ $errors->has('street') ? ' has-error' : '' }}">
                      <label>MFY, ko'cha, xonadon</label>
                      <div class="field22">
                        <input name="street" id="street" class="form-control" required="false"/>
                      </div>
                      @if ($errors->has('street'))
                        <span class="help-block">
                      <strong>{{ $errors->first('street') }}</strong>
                    </span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row10" style="margin-bottom: 10px">
                  <div class="formControl">
                    <div class="field22">
                      <h3 class="title title-24 textCenter">O'qish ma'lumotlari</h3>
                      <div class="col-xs-12 col-sm-12 col-md-4">
                        <label><b>Kasbga o'qitish markazi ( ta'lim muassasasi) nomi </b></label>
                        <?= Form::text('edu_center', old('edu_center'), ['id' => 'edu_center', 'required' => true, 'class' => ' form-control']) ?>
                      </div>
                    </div>
                    @if ($errors->has('edu_center'))
                      <span class="help-block">
                        <strong>{{ $errors->first('edu_center') }}</strong>
                      </span>
                    @endif
                  </div>
                  <div class="formControl">
                    <div class="field22">
                      <div class="col-xs-12 col-sm-12 col-md-4">
                        <label><b>Mutaxassisligingizni kiriting (kasb, yo`nalish) </b></label>
                        <?= Form::text('speciality', old('speciality'), ['id' => 'speciality', 'required' => true, 'class' => ' form-control']) ?>
                      </div>
                    </div>
                    @if ($errors->has('speciality'))
                      <span class="help-block">
                        <strong>{{ $errors->first('speciality') }}</strong>
                      </span>
                    @endif
                  </div>
                  <div class="formControl">
                    <div class="field22">
                      <div class="col-xs-12 col-sm-12 col-md-4">
                        <label><b>O'qish vaqti </b></label>
                        <?= Form::text('date', old('date'), ['id' => 'speciality', 'required' => true, 'class' => ' form-control']) ?>
                      </div>
                    </div>
                    @if ($errors->has('date'))
                      <span class="help-block">
                        <strong>{{ $errors->first('date') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
              </div>
            </div>

            <div class="row10 ">
              <h5 class="title title-24 textCenter">Anketa bilan ishlash tartibi: bitta asosiy javob variantini tanlang
                <br>
                Bir vaqtning o'zida barcha javob variantlarini belgilamang</h5>
              <div class="col-xs-12 col-sm-12 col-md-12" style="margin-bottom: 10px">
                <div class="formControl">
                  <label><b>1. Ta'lim sifatini qanday baholaysiz? </b></label>
                  <div class="field22">
                    <select name="first" id="" class="form-control">
                      <option class="form-control" value="A’lo">A’lo</option>
                      <option class="form-control" value="Yaxshi">Yaxshi</option>
                      <option class="form-control" value="O'rta">O'rta</option>
                    </select>
                  </div>
                  @if ($errors->has('first'))
                    <span class="help-block">
                      <strong>{{ $errors->first('first') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12" style="margin-bottom: 10px">
                <div class="formControl">
                  <label><b>2. Ta'lim jarayonining tashkilliy ishlarini qanday baholaysiz? </b></label>
                  <div class="field22">
                    <select name="second" id="" class="form-control">
                      <option class="form-control" value="A’lo">A’lo</option>
                      <option class="form-control" value="Yaxshi">Yaxshi</option>
                      <option class="form-control" value="O'rta">O'rta</option>
                    </select>
                  </div>
                  @if ($errors->has('second'))
                    <span class="help-block">
                      <strong>{{ $errors->first('second') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12" style="margin-bottom: 10px">
                <div class="formControl">
                  <label><b>3.  O'zingizning mutaxasissligingiz bo'yicha o'qitish sifatini qanday baholaysiz? </b></label>
                  <div class="field22">
                    <select name="third" id="" class="form-control">
                      <option class="form-control" value="A’lo">A’lo</option>
                      <option class="form-control" value="Yaxshi">Yaxshi</option>
                      <option class="form-control" value="O'rta">O'rta</option>
                    </select>
                  </div>
                  @if ($errors->has('third'))
                    <span class="help-block">
                      <strong>{{ $errors->first('third') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12" style="margin-bottom: 10px">
                <div class="formControl">
                  <label><b>4. Sizning o'quv jarayoningizdagi o'quv-uslubiy yoki ilmiy adabiyotlar bilan etarli darajada ta'minlanganini baholang. </b></label>
                  <div class="field22">
                    <select name="fourth" id="" class="form-control">
                      <option class="form-control" value="Ta’minlangan">Ta’minlangan</option>
                      <option class="form-control" value="Ta’minlanmagan">Ta’minlanmagan</option>
                      <option class="form-control" value="Qisman ta’minlanmagan">Qisman ta’minlanmagan
                      </option>
                    </select>
                  </div>
                  @if ($errors->has('fourth'))
                    <span class="help-block">
                      <strong>{{ $errors->first('fourth') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12" style="margin-bottom: 10px">
                <div class="formControl">
                  <label><b>5.  Ta'lim muassasasi sizga axborot resurslaridan foydalanish imkoniyatini taqdim etishini baholang. (elektron darsliklar, internet)</b></label>
                  <div class="field22">
                    <select name="fifth" id="" class="form-control">
                      <option class="form-control" value="Foydalandimn">Foydalandim
                      </option>
                      <option class="form-control" value="Foydalanmadim">Foydalanmadim
                      </option>
                    </select>
                  </div>
                  @if ($errors->has('fifth'))
                    <span class="help-block">
                      <strong>{{ $errors->first('fifth') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12" style="margin-bottom: 10px">
                <div class="formControl">
                  <label><b>6.  O'qituvchilarning vazifalarini o'z vaqtida bajarishini baholang. </b></label>
                  <div class="field22">
                    <select name="sixth" id="" class="form-control">
                      <option class="form-control" value="A’lo">A’lo</option>
                      <option class="form-control" value="Yaxshi">Yaxshi</option>
                      <option class="form-control" value="O'rta">O'rta</option>
                    </select>
                  </div>
                  @if ($errors->has('sixth'))
                    <span class="help-block">
                      <strong>{{ $errors->first('sixth') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12" style="margin-bottom: 10px">
                <div class="formControl">
                  <label><b>7.  O'qituvchilarning o’z ishiga nisbatdan bo’lgan ma’suliyatini baholang. </b></label>
                  <div class="field22">
                    <select name="seventh" id="" class="form-control">
                      <option class="form-control" value="A’lo">A’lo</option>
                      <option class="form-control" value="Yaxshi">Yaxshi</option>
                      <option class="form-control" value="O'rta">O'rta</option>
                    </select>
                  </div>
                  @if ($errors->has('seventh'))
                    <span class="help-block">
                      <strong>{{ $errors->first('seventh') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12" style="margin-bottom: 10px">
                <div class="formControl">
                  <label><b>8.  O'qituvchining bilim va tajribasini qanday baholaysiz?</b></label>
                  <div class="field22">
                    <select name="eighth" id="" class="form-control">
                      <option class="form-control" value="A’lo">A’lo</option>
                      <option class="form-control" value="Yaxshi">Yaxshi</option>
                      <option class="form-control" value="O'rta">O'rta</option>
                    </select>
                  </div>
                  @if ($errors->has('eighth'))
                    <span class="help-block">
                      <strong>{{ $errors->first('eighth') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12" style="margin-bottom: 10px">
                <div class="formControl">
                  <label><b>9.  Siz dars jarayonida o’z sohangiz bo’yicha amaliy mashg’ulotlar o’tkazilganligini baholang</b></label>
                  <div class="field22">
                    <select name="ninth" id="" class="form-control">
                      <option class="form-control" value="Amaliy dasrlar o’tkazildi">Amaliy dasrlar o’tkazildi</option>
                      <option class="form-control" value="Amaliy darslar o’tkazilmadi">Amaliy darslar o’tkazilmadi</option>
                    </select>
                  </div>
                  @if ($errors->has('ninth'))
                    <span class="help-block">
                      <strong>{{ $errors->first('ninth') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12" style="margin-bottom: 10px">
                <div class="formControl">
                  <label><b>10.  Ta’lim muassasida korruptsiya duch keldingizmi? <br>
                      (rahbariyat, o'qituvchilar va boshqalar orasida)</b></label>
                  <div class="field22">
                    <select name="tenth" id="" class="form-control">
                      <option class="form-control" value="Men shaxsan bunga duch kelganman">Men shaxsan bunga duch kelganman.</option>
                      <option class="form-control" value="Guruhdoshlarim bunga duch kelishdi">Guruhdoshlarim bunga duch kelishdi</option>
                      <option class="form-control" value="Men bu haqda hech narsa bilmayman">Men bu haqda hech narsa bilmayman</option>
                    </select>
                  </div>
                  @if ($errors->has('tenth'))
                    <span class="help-block">
                      <strong>{{ $errors->first('tenth') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12" style="margin-bottom: 10px">
                  <label><b>11.  Sizda taqdim etilayotgan ta'lim xizmatlari sifatini oshirish va o’quv jarayonidan tashqari ishlarni tashkil qilish bo'yicha fikrlaringiz bormi? Istaklaringizni yozing</b></label>
                  <div class="field22">
                    <?= Form::textarea('eleventh', old('address'), ['required' => true, 'class' => 'form-control']) ?>
                  </div>
                  @if ($errors->has('eleventh'))
                    <span class="help-block">
                      <strong>{{ $errors->first('eleventh') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
            </div>
            <div class="textRight ">
              <button class="btn0 btn2" id="save_btn">{{__('main.Отправить')}}</button>
            </div>
            <?php echo Form::close(); ?>

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('additionalJsFiles')
  <script>
    $('.loading').hide();
    let region_id = $('#region_id').val();
    let temp_region_id = $('#temp_region_id').val();
    getCities(region_id, 'city_id');
    getCities(temp_region_id, 'temp_city_id');

    $('.datepicker').datepicker({
      format: 'dd.mm.yyyy',
      orientation: 'bottom'
    });
    // Get the modal
    let modal = document.getElementById("myModal");

    // Get the <span> element that closes the modal
    let span = document.getElementsByClassName("close")[0];

    $('#my_form .example').bind('input', function () {
      let series = $('#passport_series').val();
      let number = $('#passport_number').val();
      let birth_date = $('#birth_date').val();
      console.log(birth_date)
      console.log(birth_date.substring(6, 10))
      console.log(birth_date.length)
      if (series.length === 2 && number.length === 7 && birth_date.length === 10 && parseInt(birth_date.substring(6, 10)) > 1900) {
        $.ajax({
          url: 'https://abkm.mehnat.uz/api/get-reworked-person',
          method: 'get',
          data: {passport: (series + number), birth_date: birth_date},
          success: function (response) {
            let data = response.data;
            console.log(response.data)
            console.log(data)
            console.log(data != undefined)
            console.log(data.length)
            if (data != undefined && data.length === undefined) {
              $('.disabledClass :input').prop("disabled", false);
              $('#person_id').val(data.person_id);
              $('#FIO').val(data.name + ' ' + data.last_name + ' ' + data.second_name)
              // setProfessionType(data.pin);
            } else {
              $('.disabledClass :input').prop("disabled", true);
              modal.style.display = "block";
              $('#profession_type').val(2);
              $('#profession').val('').hide();
              $('#showMessage').html('Маълумот топилмади!');
            }
          },
          error: function (error, response) {
            console.log(error)
            modal.style.display = "block";
            $('#profession_type').val(2);
            $('#profession').val('').hide();
            $('#showMessage').html('Маълумот топилмади!')
          }
        })
      }
    });

    $('#my_form .showTemp').bind('input', function () {
      if ($('#lives_here').prop("checked") === true) {
        $('#lives_here_value').val(1);
        $('#temporary_place').hide();
      } else {
        $('#lives_here_value').val(0);
        $('#temporary_place').show();
      }
    });


    $('#region_id').on('change', function () {
      let region_id = $('#region_id').val();
      $('#city_id').empty();
      getCities(region_id, 'city_id')
    });

    function getCities(region_id, city_id) {
      $.ajax({
        url: '/getCities',
        method: 'get',
        data: {region_id: region_id},
        success: function (response) {
          let data = JSON.parse(response);
          Object.entries(data).forEach(([key, value]) => {
            $('#' + city_id).append('<option value="' + key + '">' + value + '</option>')
          })
        },
        error: function (error) {
          console.log(error)
        }
      })
    }

    $('#temp_region_id').on('change', function () {
      let region_id = $('#temp_region_id').val();
      $('#temp_city_id').empty();
      getCities(region_id, 'temp_city_id');
    });

    $('#profession_type').on('change', function () {
      $('#profession').val('');
      if ($('#profession_type').val() === '2') {
        $('#profession');
      } else {
        $('#profession');
      }
    });

    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
      modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
  </script>
@endsection
