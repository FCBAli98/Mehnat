@extends('layouts.mobile')

@section('title', $model->title)

@section('content')
<div class="whiteSection">
  <div class="mainContainer">
    <div class="contentBlock firstContent">
      <div class="middleContainer">
        <div class="pageHead">
          <div class="borderedDec grey"></div>
        </div>
        <div class="staticPageHead">
          <h2 class="title title-28" style="text-align: center">{{$model->title}}</h2>
        </div>
        <div class="pageColls">
          <div class="row15">
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