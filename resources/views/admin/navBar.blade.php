<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
          @if(auth()->check())
            @if(auth()->user()->name == 'admin' || auth()->user()->name == 'manager')

            <li>
                <a href="#"><i class="fa fa-newspaper-o fa-fw"></i> Новости<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('admin.newsgroups.index') }}">Темы</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.news.index') }}">Новости</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{route('admin.pages.index')}}"><i class="fa fa-table fa-fw"></i> Страницы</a>
            </li>
            <li>
                <a href="{{route('admin.professional-standarts.index')}}"><i class="fa fa-table fa-fw"></i> Профессиональные стандарты</a>
            </li>
           <!--  <li>
                <a href="{{route('admin.professional-standarts-uz.index')}}"><i class="fa fa-table fa-fw"></i> Профессиональные стандарты UZ</a>
            </li> -->
            <li>
                <a href="#"><i class="fa fa-table fa-fw"></i> Категории<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('admin.categories.index') }}">Категории</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.articles.index') }}">Записи</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{route('admin.blogs.index')}}"><i class="fa fa-table fa-fw"></i> Блоги</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-image fa-fw"></i> Слайдеры<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('admin.sliders.index') }}">Слайдеры</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.slider-items.index') }}">Изображении</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-table fa-fw"></i> Услуги<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('admin.services-categories.index') }}">Категории услуг</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.services.index') }}">Услуги</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-bars fa-fw"></i> Меню<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('admin.menu.index') }}">Меню</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.menu-items.index') }}">Пункты меню</a>
                    </li>
                </ul>
            </li>
            <li>
              <a href="#"><i class="fa fa-bars fa-fw"></i>Statistics<span class="fa arrow"></span></a>
              <ul class="nav nav-second-level">
                <li>
                  <a href="{{ route('statistics.index') }}">Statistics</a>
                </li>
                <li>
                  <a href="{{ route('regions_statistics') }}">Region Statistics</a>
                </li>
              </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-group fa-fw"></i> Сотрудники<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <!-- <li>
                        <a href="{{ route('admin.employee-categories.index') }}">Категории сотрудников</a>
                    </li> -->
                    <li>
                        <a href="{{ route('admin.employees.index') }}">Руководство</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.central-apparatus.index') }}">Центральный аппарат</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.territorial-divisions.index') }}">Территориальные подразделения</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.subordinate-organizations.index') }}">Подведомственные организации</a>
                    </li>
                </ul>
            </li>
             <li>
                <a href="#"><i class="fa fa-file-text-o fa-fw"></i> Документы<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('admin.document-categories.index') }}">Категории документов</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.documents.index') }}">Документы</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-file-text-o fa-fw"></i> Cертификаты<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('admin.attestations.index') }}">Категории Cертификаты</a>
                    </li>

                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-file-text fa-fw"></i> Формы<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('admin.feedback') }}">Задать вопрос</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.corruption-prevention') }}">Предотвращение коррупции</a>
                    </li>
                </ul>
            </li>
            <li>
              <a href="{{ route('admin.regions.index') }}"><i class="fa fa-map fa-fw"></i> Регионы</a>
            </li>
            <li>
                <a href="{{ route('admin.signals') }}"><i class="fa fa-table fa-fw"></i> Острые сигналы</a>
            </li>
            <li>
                <a href="{{ route('admin.text-blocks.index') }}"><i class="fa fa-table fa-fw"></i> Текстовые блоки</a>
            </li>
            <li>
                <a href="{{ route('admin.options.index') }}"><i class="fa fa-cog fa-fw"></i> Настройки</a>
            </li>
            <li>
                <a href="{{ route('admin.users.index') }}"><i class="fa fa-group fa-fw"></i> Пользователи</a>
            </li>
            @elseif(auth()->user()->name == 'manaviyat')
              <li>
                <a href="{{route('admin.blogs.index')}}"><i class="fa fa-table fa-fw"></i> Блоги</a>
              </li>
              <li>
                <a href="/admin/pages/1770"><i class="fa fa-table fa-fw"></i> 	Гендерное равенство</a>
              </li>
            @else
              <li>
                <a href="{{ route('admin.dictionary.index') }}"><i class="fa fa-group fa-fw"></i> Азбука</a>
              </li>
            @endif
          @endif
            <?php if (isset($_GET['dev'])): ?>
            <li>
                <a href="{{ route('admin.roles.index') }}"><i class="fa fa-sitemap fa-fw"></i> Роли</a>
            </li>
            <?php endif ?>
            <?php /* ?>
            <li>
                <a href="{{ route('admin.dashboard') }}"><i class="fa fa-table fa-fw"></i> {{__('main.Dashboard')}}</a>
            </li>
            <li>
                <a href="{{ route('admin.services.index') }}"><i class="fa fa-table fa-fw"></i> {{__('main.Services')}}</a>
            </li>
            <li>
                <a href="{{ route('admin.roles.index') }}"><i class="fa fa-group fa-fw"></i> {{__('main.Roles')}}</a>
            </li>
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <a href="{{ route('tasks.index') }}"><i class="fa fa-table fa-fw"></i> Задачи</a>
            </li>
            <li>
                <a href="{{ route('indicators.index') }}"><i class="fa fa-table fa-fw"></i> Индикаторы</a>
            </li>
            <li>
                <a href="{{ route('databanks.index') }}"><i class="fa fa-table fa-fw"></i> Банк данных</a>
            </li>
            <li>
                <a href="{{ route('partners.index') }}"><i class="fa fa-table fa-fw"></i> Партнеры</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-table fa-fw"></i> Новости<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('news.index') }}">Новости</a>
                    </li>
                    <li>
                        <a href="{{ route('subjects.index') }}">Темы</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-table fa-fw"></i> Публикации<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('publications.index') }}">Публикации</a>
                    </li>
                    <li>
                        <a href="{{ route('publications-subjects.index') }}">Темы</a>
                    </li>
                    <li>
                        <a href="{{ route('publications-objectives.index') }}">Цели</a>
                    </li>
                    <li>
                        <a href="{{ route('publications-documents.index') }}">Тип документа</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('legislations.index') }}"><i class="fa fa-table fa-fw"></i> Законодательство</a>
            </li>
            <li>
                <a href="{{ route('textblocks.index') }}"><i class="fa fa-table fa-fw"></i> Текстовые блоки</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-table fa-fw"></i> Меню<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('menus.index') }}">Меню</a>
                    </li>
                    <li>
                        <a href="{{ route('menu-items.index') }}">Пункты меню</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('options.index') }}"><i class="fa fa-cogs fa-fw"></i> Настройки</a>
            </li>
            @role('admin')
            <li>
                <a href="{{ route('users.index') }}"><i class="fa fa-users fa-fw"></i> Пользователи</a>
            </li>
            <?php if (isset($_GET['dev'])): ?>
            <li>
                <a href="{{ route('roles.index') }}"><i class="fa fa-users fa-fw"></i> Роли</a>
            </li>
            <?php endif ?>
            @endrole
            <?php */ ?>
        </ul>
    </div>
</div>
