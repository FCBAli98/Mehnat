@extends('layouts.app')

@section('title', $model->title)

@section('content')
<div class="whiteSection">
  <div class="mainContainer">
    <div class="contentBlock firstContent">
      <div class="middleContainer">
        <div class="headDocumentsPage">
          <h2 class="title title-24">{{$model->title}}</h2>
          <div class="row15">
            <div class="colp15-4">
              <button id="searchBtn" class="btn0 btn2 btnSmall right">{{__('main.Поиск')}}</button>
            </div>
            <div class="colp15-8">
              <div class="searchBlock">
                <form method="GET">
                  <table>
                    <tr>
                      <td>
                        <div class="lightText">{{__('main.Поиск')}}:</div>
                      </td>
                      <td width="110px">
                        <div class="formControl">
                          <label class="formLabel">{{__('main.номер акта')}}</label>
                          <div class="field">
                            <?= Form::text('search[no]', isset(app('request')->input('search')['no'])?app('request')->input('search')['no']:null, []) ?>
                          </div>
                        </div>
                      </td>
                      <td width="130px">
                        <div class="formControl">
                          <label class="formLabel">{{__('main.дата принятия')}}</label>
                          <div class="field fieldWithIcon">
                            <?= Form::text('search[date]', isset(app('request')->input('search')['date'])?app('request')->input('search')['date']:null, ['placeholder' => '00.00.0000', 'class' => 'jq-datapicker']) ?>
                            <i class="icon-calendar"></i>
                          </div>
                        </div>
                      </td>
                      <td width="280px">
                        <div class="formControl">
                          <label class="formLabel">{{__('main.фраза')}}</label>
                          <div class="field">
                            <?= Form::text('search[title]', isset(app('request')->input('search')['title'])?app('request')->input('search')['title']:null, []) ?>
                          </div>
                        </div>
                      </td>
                      <td>
                        <button class="btn0 btn2">{{__('main.найти')}}</button>
                        <button id="closeSearch" class="btn0 btnDef">{{__('main.закрыть')}}</button>
                      </td>
                    </tr>
                  </table>
                </form>
              </div>
            </div>
          </div>
          <div class="borderedDec grey"></div>
        </div>
        <div class="pageColls">
          <div class="row15">
            <div class="colp15-4">                  
              <nav class="sideBarNavs">
                <?php if (count($nav) > 0): ?>
                <ul>
                  <?php foreach ($nav as $navItem): ?>
                    <?php if ($navItem->title): ?>
                      <li <?= $navItem->url==$model->url?'class="active"':'' ?>><a href="{{route('documents.show', ['name' => $navItem->url])}}"> <span>{{$navItem->title}}</span></a></li>
                    <?php endif ?>
                  <?php endforeach ?>
                </ul>
                <?php endif ?>
              </nav>
            </div>
            <div class="colp15-8">                  
              <div class="contentItems">
                <div class="contentItem">
                  <ul class="listDocuments">
                  <?php if (count($documents) > 0): ?>
                    <?php foreach ($documents as $document): ?>
                      <li>
                        <?php $date = new DateTime($document->date); ?>
                        <div class="lightText">
                          <?php if ($document->no): ?>
                          {{$document->no}} / 
                          <?php endif ?>
                          {{$date->format('d.m.Y')}}</div>
                        <a href="{{$document->url}}" class="documentTitle" target="_blank">{{$document->title}}</a>
                        <div class="clearFix">
                          <div class="left"><a href="{{$document->another_url}}" class="documentUrl" target="_blank">{{$document->another_url}}</a></div>
                          <div class="right">
                            <?php if ($document->file1 || $document->file2): ?>
                              <div class="downloadFiles"><span>{{__('main.скачать')}}:</span>
                                <?php if ($document->file1): ?>
                                  <a href="{{getFile($document->file1)}}" target="_blank"><i class="icon-doc"></i></a>
                                <?php endif ?>
                                <?php if ($document->file2): ?>
                                  <a href="{{getFile($document->file2)}}" target="_blank"><i class="icon-pdf"></i></a>
                                <?php endif ?>
                              </div>
                            <?php endif ?>
                          </div>
                        </div>
                      </li>
                    <?php endforeach ?>
                  <?php endif ?>
                  </ul>
                  <?= $documents->appends(request()->input())->links('pagination.default'); ?>
                </div>
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