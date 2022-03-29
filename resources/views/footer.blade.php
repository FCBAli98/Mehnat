<div class="minContainer">
<div class="footer">
  <div class="row20">
    <div class="colp20-8" style="padding: 20px 0">
      <div class="footerList">
        <?php /* if ($footerTable): ?>
        <?= $footerTable->content ?>
        <?php endif */ ?>
        <div class="row15" >
          <div class="colp15-6"  style="font-size: 30px">
            <ul>
              <li><i class="icon-info"></i>
                <div class="li-text"><span>{{__('main.При использовании материалов сайта, ссылка на www.mehnat.uz обязательна')}}</span></div>
              </li>
              <li><i class="icon-info"></i>
                <div class="li-text"><span>{{__('main.Нашли ошибку? Выделите и нажмите Ctrl+Enter')}}</span></div>
              </li>
            </ul>
            <ul>
              <li><a href="#"><i class="icon-user"></i>
                  <div class="li-text"><span>{{__('main.Политика защиты персональной информации пользователей веб-сайта')}}</span></div></a></li>
              <li><a href="#"><i class="icon-maps"></i>
                  <div class="li-text"><span>{{__('main.Карта сайта')}}</span></div></a></li>
            </ul>
          </div>
          <div class="colp15-6">
            <div class="footerSearchForm">
              <form action="{{route('search')}}" method="get">
                <input type="text" placeholder="{{__('main.Что будете искать')}}?" name="q" class="footerSearchFormField"/>
                <button class="footerSearchFormBtn"><i class="icon-search"></i></button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="" style="float:left">

      <script>(function(i,s,o,g,r,a,m){i['QP']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','//scripts.poll-maker.com/3012/pollembed.js','qp');</script><a href='https://www.quiz-maker.com' data-poll='3915401x56c3448f-124' style='width:300px; padding: 0; display:block; text-align:right; margin: 0; '>.</a>

    <?php /* ?>
      <div class="stateSymbols">
        <?php if (LaravelLocalization::getCurrentLocale() == 'uz'): ?>
          <a target="_blank" href="{{route('pages.show', ['name' => 'bayroq'])}}"><i><img src="{{asset('/images/flag.png')}}" alt=""/></i><span>{{__('main.Флаг')}}</span></a>
          <a target="_blank" href="{{route('pages.show', ['name' => 'gerb'])}}"><i><img src="{{asset('/images/gerb.png')}}" alt=""/></i><span>{{__('main.Герб')}}</span></a>
          <a target="_blank" href="{{route('pages.show', ['name' => 'madhiya'])}}"><i><img src="{{asset('/images/gymn.png')}}" alt=""/></i><span>{{__('main.Гимн')}}</span></a>
        <?php endif ?>
        <?php if (LaravelLocalization::getCurrentLocale() == 'oz'): ?>
          <a target="_blank" href="{{route('pages.show', ['name' => 'bayroq'])}}"><i><img src="{{asset('/images/flag.png')}}" alt=""/></i><span>{{__('main.Флаг')}}</span></a>
          <a target="_blank" href="{{route('pages.show', ['name' => 'gerb'])}}"><i><img src="{{asset('/images/gerb.png')}}" alt=""/></i><span>{{__('main.Герб')}}</span></a>
          <a target="_blank" href="{{route('pages.show', ['name' => 'madhiya'])}}"><i><img src="{{asset('/images/gymn.png')}}" alt=""/></i><span>{{__('main.Гимн')}}</span></a>
        <?php endif ?>
        <?php if (LaravelLocalization::getCurrentLocale() == 'ru'): ?>
          <a target="_blank" href="{{route('pages.show', ['name' => 'flag'])}}"><i><img src="{{asset('/images/flag.png')}}" alt=""/></i><span>{{__('main.Флаг')}}</span></a>
          <a target="_blank" href="{{route('pages.show', ['name' => 'gerb'])}}"><i><img src="{{asset('/images/gerb.png')}}" alt=""/></i><span>{{__('main.Герб')}}</span></a>
          <a target="_blank" href="{{route('pages.show', ['name' => 'gimn'])}}"><i><img src="{{asset('/images/gymn.png')}}" alt=""/></i><span>{{__('main.Гимн')}}</span></a>
        <?php endif ?>
        <?php if (LaravelLocalization::getCurrentLocale() == 'en'): ?>
          <a target="_blank" href="{{route('pages.show', ['name' => 'flag'])}}"><i><img src="{{asset('/images/flag.png')}}" alt=""/></i><span>{{__('main.Флаг')}}</span></a>
          <a target="_blank" href="{{route('pages.show', ['name' => 'emblem'])}}"><i><img src="{{asset('/images/gerb.png')}}" alt=""/></i><span>{{__('main.Герб')}}</span></a>
          <a target="_blank" href="{{route('pages.show', ['name' => 'anthem'])}}"><i><img src="{{asset('/images/gymn.png')}}" alt=""/></i><span>{{__('main.Гимн')}}</span></a>
        <?php endif ?>
      </div>
      <?php */ ?>
    </div>
  </div>
  </div>
<div class="minFooter">
  <div class="row20">
    <div class="colp20-8">
      <?php if ($footerText): ?>
      <div class="footerText"><?= $footerText->content ?></div>
      <?php endif ?>
    </div>
    <div class="colp20-4">
      <div class="fShLinks" style="float: left">
        <a href="http://uforum.uz/forumdisplay.php?f=708" target="_blank">
          <img src="/images/uforum.jpg" alt="npa ru" width="100%" height="32">
        </a>
      </div>
      <div class="fShLinks">
        <!-- <a href="http://www.uz/ru/res/visitor/index?id=3304" target="_blank">
          <img src="{{asset('/images/fShLinks1.png')}}" alt=""/>
        </a> -->
        <!-- START WWW.UZ TOP-RATING -->
        <SCRIPT language="javascript" type="text/javascript">
        <!--
        top_js="1.0";top_r="id=3304&r="+escape(document.referrer)+"&pg="+escape(window.location.href);document.cookie="smart_top=1; path=/"; top_r+="&c="+(document.cookie?"Y":"N")
        //-->
        </SCRIPT>
        <SCRIPT language="javascript1.1" type="text/javascript">
        <!--
        top_js="1.1";top_r+="&j="+(navigator.javaEnabled()?"Y":"N")
        //-->
        </SCRIPT>
        <SCRIPT language="javascript1.2" type="text/javascript">
        <!--
        top_js="1.2";top_r+="&wh="+screen.width+'x'+screen.height+"&px="+
        (((navigator.appName.substring(0,3)=="Mic"))?screen.colorDepth:screen.pixelDepth)
        //-->
        </SCRIPT>
        <SCRIPT language="javascript1.3" type="text/javascript">
        <!--
        top_js="1.3";
        //-->
        </SCRIPT>
        <SCRIPT language="JavaScript" type="text/javascript">
        <!--
        top_rat="&col=7DC53B&t=ffffff&p=DD444E";top_r+="&js="+top_js+"";document.write('<a href="http://www.uz/ru/res/visitor/index?id=3304" target=_top><img src="https://cnt0.www.uz/counter/collect?'+top_r+top_rat+'" width=88 height=31 border=0 alt="Топ рейтинг www.uz"></a>')//-->
        </SCRIPT><NOSCRIPT><A href="http://www.uz/ru/res/visitor/index?id=3304" target=_top><IMG height=31 src="https://cnt0.www.uz/counter/collect?id=3304&pg=http%3A//uzinfocom.uz&&col=7DC53B&amp;t=ffffff&amp;p=DD444E" width=88 border=0 alt="Топ рейтинг www.uz"></A></NOSCRIPT>
        <!-- FINISH WWW.UZ TOP-RATING -->
        <!-- <a href="http://gis.uz" target="_blank">
          <img src="{{asset('/images/fShLinks2.png')}}" alt=""/>
        </a>
        <a href="http://uforum.uz/forumdisplay.php?f=708" target="_blank">
          <img src="{{asset('/images/fShLinks3.png')}}" alt=""/>
        </a> -->
      </div>
    </div>
  </div>
</div>
</div>
<div id="mistape">
  <div class="windowModal" v-bind:style="modalStyles" v-if="showWindowFlag">
    <div class="windowModalMask" @click="closeWindow()"></div>
    <div class="windowModalContent"><a @click="closeWindow()" class="windowModalClose"><i class="icon-close"></i></a>
      <div class="sendPreloader" v-if="loader"></div>
        @csrf
        <div class="formControl">
          <label>Адрес страницы</label><strong>@{{model.url}}</strong>
        </div>
        <div class="formControl">
          <label>Ошибка</label><strong>@{{model.errorText}}</strong>
        </div>
        <div class="formControl">
          <label>Комментарий</label>
          <div class="field2">
            <textarea rows="4" v-model="model.comments"></textarea>
          </div>
        </div>
        <div class="textRight">
          <button class="btn0 btn2" @click="submit()">Отправить</button>
        </div>
    </div>
  </div>
</div>
<div class="specialViewModalWrap" style="left: 0!important;">
  <button class="specialViewModalBtn"><i class="icon-special-view"></i><span>{{__('main.Слабовидящим')}}</span></button>
  <div class="specialViewModal">
    <div class="specialViewModalMask"></div>
    <div class="specialViewModalContent">
      <div class="specialViewButtons specialViewButtons1 textCenter">
        <a href="#" class="specialViewCloseBtn"><span>{{__("main.Закрыть")}}</span></a>
        <hr/>
      </div>
      <h2 class="title-18">{{__('main.Версия для людей с ограниченными возможностями')}}</h2>
      <div class="closeSpecialView"><a href="#" class="right specialViewCloseBtn"><i class="icon-close"></i></a>
        <div class="borderedDec"></div>
      </div>
      <div class="specialViewParams">
        <div class="row10">
          <div class="colp10-6">
            <h4 class="title-16">{{__('main.Цвета сайта')}}: </h4>
            <ul>
              <li><a href="#" class="specialViewColor spcNormal"><span><img src="{{asset('/images/specialView1.png')}}" alt=""/></span><span>{{__('main.Цветной режим')}}</span></a></li>
              <li><a href="#" class="specialViewColor spcWhiteAndBlack"><span><img src="{{asset('/images/specialView2.png')}}" alt=""/></span><span>{{__('main.Черным по белому')}}</span></a></li>
              <li><a href="#" class="specialViewColor spcDark"><span><img src="{{asset('/images/specialView3.png')}}" alt=""/></span><span>{{__('main.Белым по черному')}}</span></a></li>
            </ul>
          </div>
          <div class="colp10-6">
            <h4 class="title-16">{{__('main.Масштаб')}}:</h4>
            <ul class="spViewSliders">
              <li><span class="spViewSliderL">{{__('main.Шрифт')}}</span>
                <div id="fontSizer" class="spViewSlider"></div>
              </li>
              <li><span class="spViewSliderL">{{__('main.Интерфейс')}}</span>
                <div id="zoomSizer" class="spViewSlider"></div>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="specialViewButtons"><a href="#" class="right submitSpecialView"><span>{{__('main.Применить')}}</span><i class="icon-dots-arrow-min-right"></i></a><a href="#" class="left resetSpecialView"><span>{{__('main.Вернуть стандартные настройти')}}</span><i class="icon-dots-arrow-min-right"></i></a></div>
    </div>
  </div>
</div>
<div id="speech">
  <div v-if="showFlag">
    <button id="speakerBtn" ref="111" @click="play()" v-bind:style="style" v-bind:class="{ loader: loader }">
      <img src="/images/icons/speaker.svg" alt="">
    </button>
  </div>
</div>
<script src="<?= asset('js/mistape.js').'?v='.time() ?>"></script>
<script src="<?= asset('js/speech.js').'?v='.time() ?>"></script>

