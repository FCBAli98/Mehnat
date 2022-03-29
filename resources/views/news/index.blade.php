@extends('layouts.app')

@section('title', __('main.News'))

@section('content')
<div class="whiteSection">
  <div class="mainContainer">
    <div class="contentBlock firstContent">
      <div class="middleContainer">
        <div class="pageHead">
          <h2 class="title title-24">{{__('main.Новости')}}</h2>
          <div class="borderedDec grey"></div>
        </div>
        <div class="pageColls" id="NewsPage">
          <div id="loader" v-if="loader"></div>
          <div class="row15" v-if="categories.length">
            <div class="colp15-3">                  
              <nav class="sideBarNavs">
                <ul>
                  <li v-for="(category, index) in categories">
                    <router-link :to="'/'+category.url"><span>@{{category.title}}</span></router-link>
                  </li>
                </ul>
              </nav>
            </div>
            <div class="colp15-9">
              <div id="newsList">
                <div class="contentItem" v-if="firstNews">

                  <div class="lastNews" v-if="firstNews">
                    <div v-bind:style="{backgroundImage: 'url('+firstNews.image+')'}" class="imgBox"></div>
                    <div class="lastNewsContent">
                      <div class="lastNewsTitle">@{{firstNews.title}}</div>
                      <div class="lastNewsDesc">@{{firstNews.description}}</div><a :href="firstNews.url" class="btn0 btn3 btnSmall">{{__('main.читать подробно')}}</a>
                    </div>
                    <div class="itemSN">
                      <a href="#"><i class="icon-fb2"></i></a>
                      <a href="#"><i class="icon-vk"></i></a>
                      <a href="#"><i class="icon-odno"></i></a>
                      <a href="#"><i class="icon-dotted"></i></a>
                    </div>
                  </div>

                  <div class="news2List" v-if="news.length">
                    <ul>
                      <li v-for="(newsItem, index) in news">
                        <div class="news2Box">
                          <div class="news2Image">
                            <a :href="newsItem.url">
                              <div v-bind:style="{backgroundImage: 'url('+newsItem.image+')'}" class="imgBox"></div>
                              <div class="arrowHover"><img src="{{asset('/images/icons/arrow-ellips.png')}}" alt=""/></div>
                            </a>
                          </div>
                          <div class="news2Title">
                            <a :href="newsItem.url">@{{newsItem.title}}</a>
                          </div>
                          <div class="news2Footer">
                            <div class="newsDate left" v-html="newsItem.date"></div>
                            <?php /* ?>
                            <div class="itemSN">
                              <a href="#"><i class="icon-fb2"></i></a>
                              <a href="#"><i class="icon-vk"></i></a>
                              <a href="#"><i class="icon-odno"></i></a>
                              <a href="#"><i class="icon-dotted"></i></a>
                            </div>
                            <?php */ ?>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>

                  <div class="moreItems"><a class="btn0 btn3 btn3g btnSmall" @click="loadMode()" v-if="!lastPage">{{__('main.загрузить еще')}}</a></div>

                </div>
                <h3 v-else class="textCenter">
                  <br>
                  <br>
                  {{__('main.Data_not_found')}}
                </h3>
              </div>
            </div>
          </div>
          
          <h3 v-else class="textCenter">
            <br>
            <br>
            {{__('main.Data_not_found')}}
          </h3>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('sliderLinks')
  <?php echo App::make("App\Http\Controllers\SliderLinksController")->display(); ?>
@endsection
@section('additionalJsFiles')
<script src="<?= asset('js/news.js').'?v='.time() ?>"></script>
@endsection