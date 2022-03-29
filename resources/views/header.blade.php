<div id="mobMainNav">
  <div class="mobMainNavInnerWrap">
    <ul class="languages">
      @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <li <?= $localeCode == LaravelLocalization::getCurrentLocale() ? "class='active'" : ''; ?>>
          <a hreflang="{{ $localeCode }}"
             href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">{{ $properties['name'] }}</a>
        </li>
      @endforeach
    </ul>
    <nav class="headerNav">
        <?php if (count($headerMenu) > 0): ?>
      <ul>
          <?php foreach ($headerMenu as $menu): ?>
          <?php if ($menu['url']): ?>
        <li>
          <a href="{{$menu['url']}}">{{$menu['title']}}</a>
            <?php if (count($menu['items']) > 0): ?>
          <ul>
              <?php foreach ($menu['items'] as $item): ?>
            <li <?= count($item['items']) ? 'class="dropDownList"' : '' ?>>
              <a href="{{$item['url']}}">{{$item['title']}}</a>
                <?php if (count($item['items'])): ?>
              <ul>
                  <?php foreach ($item['items'] as $item): ?>
                <li <?= count($item['items']) ? 'class="dropDownList"' : '' ?>>
                  <a href="{{$item['url']}}">{{$item['title']}}</a>
                    <?php if (count($item['items'])): ?>
                  <ul>
                      <?php foreach ($item['items'] as $item): ?>
                    <li <?= count($item['items']) ? 'class="dropDownList"' : '' ?>>
                      <a href="{{$item['url']}}">{{$item['title']}}</a>
                    </li>
                      <?php endforeach ?>
                  </ul>
                    <?php endif ?>
                </li>
                  <?php endforeach ?>
              </ul>
                <?php endif ?>
            </li>
              <?php endforeach ?>
          </ul>
            <?php endif ?>
        </li>
          <?php endif ?>
          <?php endforeach ?>
      </ul>
        <?php endif ?>
    </nav>
    <div class="headerCell">
      <div class="headerBL">{{__('main.Связатся с нами')}}:</div>
      <ul class="snList">
        <li><a href="https://www.facebook.com/www.mehnat.uz/" target="_blank"><i class="icon-sn-fb"></i></a></li>
        <li><a href="https://t.me/mehnatvazirligi" target="_blank"><i class="icon-sn-tg"></i></a></li>
      </ul>
      <a href="tel:+998712000600" class="telBlock"><span>+998</span><strong>71 200 06 00</strong></a>
    </div>
  </div>
</div>
<div class="header">
  <div class="minContainer">
    <div class="logo">
      <a href="{{route('home')}}">
        <img src="{{$logo}}" alt=""/>
      </a>
    </div>
    <div class="headerCell left">
      <div class="stateSymbols">
          <?php if (LaravelLocalization::getCurrentLocale() == 'uz'): ?>
        <a target="_blank" href="{{route('pages.show', ['name' => 'bayroq'])}}"><i><img
              src="{{asset('/images/flag.png')}}" alt=""/></i><span>{{__('main.Флаг')}}</span></a>
        <a target="_blank" href="{{route('pages.show', ['name' => 'gerb'])}}"><i><img
              src="{{asset('/images/gerb.png')}}" alt=""/></i><span>{{__('main.Герб')}}</span></a>
        <a target="_blank" href="{{route('pages.show', ['name' => 'madhiya'])}}"><i><img
              src="{{asset('/images/gymn.png')}}" alt=""/></i><span>{{__('main.Гимн')}}</span></a>
          <?php endif ?>
          <?php if (LaravelLocalization::getCurrentLocale() == 'oz'): ?>
        <a target="_blank" href="{{route('pages.show', ['name' => 'bayroq'])}}"><i><img
              src="{{asset('/images/flag.png')}}" alt=""/></i><span>{{__('main.Флаг')}}</span></a>
        <a target="_blank" href="{{route('pages.show', ['name' => 'gerb'])}}"><i><img
              src="{{asset('/images/gerb.png')}}" alt=""/></i><span>{{__('main.Герб')}}</span></a>
        <a target="_blank" href="{{route('pages.show', ['name' => 'madhiya'])}}"><i><img
              src="{{asset('/images/gymn.png')}}" alt=""/></i><span>{{__('main.Гимн')}}</span></a>
          <?php endif ?>
          <?php if (LaravelLocalization::getCurrentLocale() == 'ru'): ?>
        <a target="_blank" href="{{route('pages.show', ['name' => 'flag'])}}"><i><img
              src="{{asset('/images/flag.png')}}" alt=""/></i><span>{{__('main.Флаг')}}</span></a>
        <a target="_blank" href="{{route('pages.show', ['name' => 'gerb'])}}"><i><img
              src="{{asset('/images/gerb.png')}}" alt=""/></i><span>{{__('main.Герб')}}</span></a>
        <a target="_blank" href="{{route('pages.show', ['name' => 'gimn'])}}"><i><img
              src="{{asset('/images/gymn.png')}}" alt=""/></i><span>{{__('main.Гимн')}}</span></a>
          <?php endif ?>
          <?php if (LaravelLocalization::getCurrentLocale() == 'en'): ?>
        <a target="_blank" href="{{route('pages.show', ['name' => 'flag'])}}"><i><img
              src="{{asset('/images/flag.png')}}" alt=""/></i><span>{{__('main.Флаг')}}</span></a>
        <a target="_blank" href="{{route('pages.show', ['name' => 'emblem'])}}"><i><img
              src="{{asset('/images/gerb.png')}}" alt=""/></i><span>{{__('main.Герб')}}</span></a>
        <a target="_blank" href="{{route('pages.show', ['name' => 'anthem'])}}"><i><img
              src="{{asset('/images/gymn.png')}}" alt=""/></i><span>{{__('main.Гимн')}}</span></a>
          <?php endif ?>
      </div>
      <ul class="languages">
        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
          <li <?= $localeCode == LaravelLocalization::getCurrentLocale() ? "class='active'" : ''; ?>>
            <a hreflang="{{ $localeCode }}"
               href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">{{ $properties['name'] }}</a>
          </li>
        @endforeach
      </ul>
    </div>
    <div class="headerCell right textRight">
      <div class="headerBL">{{__('main.Связатся с нами')}}: <a href="tel:+998712394121" class="telBlock"><strong>+998</strong><strong>71 239 41 21</strong></a></div>
      <div style="display: flex">
        <ul class="snList">
          <li><a href="https://www.facebook.com/www.mehnat.uz/" target="_blank"><i class="icon-sn-fb"></i></a></li>
          <li><a href="https://t.me/mehnatvazirligi" target="_blank"><i class="icon-sn-tg"></i></a></li>
          <li><a href="https://twitter.com/Uzb_MinLabour" target="_blank"><i class="icon-sn-tw"></i></a></li>
          <li><a href="https://www.instagram.com/bandlik_vazirligi/" target="_blank"><i class="icon-sn-insta"></i></a></li>
        </ul>
        <div class="headerBL">{{__('main.Ишонч телефони')}}: <a href="tel:+998712000600" class="telBlock"><strong>+998</strong><strong>71 200 06 00</strong></a></div>


      </div>

      <div class="calendar" style="margin: 5px 0 -4px;">
        <i class="icon-calendar"></i> &nbsp;<span>{{__('main.Сана')}}: {{date('d.m.Y')}} {{__('main.й.')}}</span>
      </div>
    </div>
  </div>
</div>
<div class="topHeaderWrap">
  <div class="topHeader">
    <div class="topHeaderInnerWrap">
      <div class="minContainer">
        <nav class="headerNav">
          <a href="{{route('home')}}" class="homeLink">
            <i class="icon-home"></i>
          </a>
            <?php if (count($headerMenu) > 0): ?>
          <ul>
              <?php foreach ($headerMenu as $menu): ?>
              <?php if ($menu['url']): ?>
            <li>
              <a href="{{$menu['url']}}">{{$menu['title']}}</a>
                <?php if (count($menu['items']) > 0): ?>
              <div class="subMenu" lang="{{LaravelLocalization::getCurrentLocale()}}">
                <div class="minContainer">
                <!-- <div class="subMenuLogo"><img src="{{asset('/images/menu-logo.svg')}}" alt=""/></div> -->
                  <nav class="subMenuNav">
                    <ul>
                        <?php foreach ($menu['items'] as $item): ?>
                      <li <?= count($item['items']) ? 'class="dropDownList"' : '' ?>>
                        <a href="{{$item['url']}}">{{$item['title']}}</a>
                          <?php if (count($item['items'])): ?>
                        <ul>
                            <?php foreach ($item['items'] as $item): ?>
                          <li <?= count($item['items']) ? 'class="dropDownList"' : '' ?>>
                            <a href="{{$item['url']}}">{{$item['title']}}</a>
                              <?php if (count($item['items'])): ?>
                            <ul>
                                <?php foreach ($item['items'] as $item): ?>
                              <li <?= count($item['items']) ? 'class="dropDownList"' : '' ?>>
                                <a href="{{$item['url']}}">{{$item['title']}}</a>
                              </li>
                                <?php endforeach ?>
                            </ul>
                              <?php endif ?>
                          </li>
                            <?php endforeach ?>
                        </ul>
                          <?php endif ?>
                      </li>
                        <?php endforeach ?>
                    </ul>
                  </nav>
                </div>
              </div>
                <?php endif ?>
            </li>

              <?php endif ?>

              <?php endforeach ?>

          </ul>
            <?php endif ?>

        </nav>
        <div class="topHeaderRight right">

        <!--     <ul class="topHeaderUl">
            <li>
              <a href="{{ route('professional-standarts.index') }}" class="font-size:11px !important"><span >{{('main.Профессиональные стандарты')}}</span></a>
            </li>
          </ul> -->

        <!--  <ul class="topHeaderUl">
            <li>
              <a href=""><span>{{('main.Вход в систему')}}</span></a>
            </li>
          </ul> -->
          <div class="box">
            <form name="search" action="{{route('search')}}" method="get">
              <input type="text" class="input" name="search"
                     onmouseout="document.search.txt.value = ''">
            </form>
            <i id="in" class="fas fa-search"></i>
          </div>

          <button class="btnNav"><span></span></button>
        </div>
      </div>
    </div>
  </div>
</div>
<style>
  .box{
    position: absolute;
    top: 50%;
    left: 85%;
    transform: translate(-50%,-50%);
  }
  .input {
    padding: 10px;
    width: 50px;
    height: 50px;
    background: none;
    /*border: 1px solid #fff;*/
    border: none;
    border-radius: 10px;
    box-sizing: border-box;
    font-family: "Times New Roman";
    font-size: 20px;
    color: #fff;
    outline: none;
    transition: .5s;
  }
  .box:hover .input{
    width: 250px;
    border: 1px solid #fff;
    background: transparent;
    border-radius: 10px;
  }
  #in{
    position: absolute;
    top: 50%;
    right: 12%;
    transform: translate(-50%,-50%);
    font-size: 20px;
    color: #fff;
    transition: .2s;
  }
  .box:hover i{
    opacity: 0;
    z-index: -1;
  }

  @media(max-width:420px) {
    .box{
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%,-50%);
    }
  }

</style>
<script src="https://kit.fontawesome.com/afd6aa68df.js" crossorigin="anonymous"></script>
