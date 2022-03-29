@extends('layouts.app')

@section('title', __('main.Blogs'))

@section('content')
<div class="whiteSection">
  <div class="mainContainer">
    <div class="contentBlock firstContent">
      <div class="middleContainer">
        <div class="pageHead">
          <h2 class="title title-24">{{__('main.Blogs')}}</h2>
          <div class="borderedDec grey"></div>
        </div>
        <div class="pageColls" id="BlogsPage">
          <div id="loader" v-if="loader"></div>
          <div class="row15">
            <div class="colp15-3">                  
              <nav class="sideBarNavs">
                <ul>
                  <!-- <li>
                    <a target="_block" href="https://www.lex.uz/acts/121051">Qonun</a>
                  </li>
                  <li>
                    <a target="_block" href="https://lex.uz/docs/4664611">Qaror</a>
                  </li>
                  <li>
                    <a target="_block" href="https://lex.uz/docs/4784608">Bayon</a>
                  </li> -->
                  <li>
                    <a target="_block" href="https://mehnat.uz/oz/documents/ozbekiston-respublikasi-qonunlari">Me'yoriy-huquqiy hujjatlar</a>
                  </li>
                  <li>
                    <a target="_block" href="/oz/category/manolar-hazinasi">Ma’nolar xazinasi</a>
                  </li>
                  <li>
                    <a target="_block" href="http://strategy.gov.uz/uz">Tashabbus</a>
                  </li>
                </ul>
              </nav>
            </div>
            <div class="colp15-9">
              <div id="blogList">
                <div class="contentItem" v-if="firstBlogs">

                  <div class="lastNews" v-if="firstBlogs">
                    <div v-bind:style="{backgroundImage: 'url('+firstBlogs.image+')'}" class="imgBox"></div>
                    <div class="lastNewsContent">
                      <div class="lastNewsTitle">@{{firstBlogs.title}}</div>
                      <div class="lastNewsDesc">@{{firstBlogs.description}}</div><a :href="firstBlogs.url" class="btn0 btn3 btnSmall">{{__('main.читать подробно')}}</a>
                    </div>
                    <div class="itemSN">
                      <a href="#"><i class="icon-fb2"></i></a>
                      <a href="#"><i class="icon-vk"></i></a>
                      <a href="#"><i class="icon-odno"></i></a>
                      <a href="#"><i class="icon-dotted"></i></a>
                    </div>
                  </div>

                  <div class="news2List" v-if="blogs.length">
                    <ul>
                      <li v-for="(blogsItem, index) in blogs">
                        <div class="news2Box">
                          <div class="news2Image">
                            <a :href="blogsItem.url">
                              <div v-bind:style="{backgroundImage: 'url('+blogsItem.image+')'}" class="imgBox"></div>
                              <div class="arrowHover"><img src="{{asset('/images/icons/arrow-ellips.png')}}" alt=""/></div>
                            </a>
                          </div>
                          <div class="news2Title">
                            <a :href="blogsItem.url">@{{blogsItem.title}}</a>
                          </div>
                          <div class="news2Footer">
                            <div class="newsDate left" v-html="blogsItem.date"></div>
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
<script src="<?= asset('js/blogs.js').'?v='.time() ?>"></script>
@endsection