@extends('layouts.admin')

@section('title', __('main.Профессиональные стандарты'))

@section('content')
<h2>Профессиональные стандарты</h2>
<hr>
<div class="clearfix">
  <div class="pull-left">
    <?=__('main.page_count', ['current' => $models->currentPage(), 'lastPage' => $models->lastPage(), 'total' => $models->total()])?>
  </div>
</div>
<br>
<table cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed">
  <thead>
    <tr>
      <th width="50" rowspan="2">id</th>
      <th rowspan="2">Касбий фаолият соҳаси</th>
      <th rowspan="2">Ўзбекистон Республикаси ташкилотлари томонидан ишлаб чиқилган касб стандартлари номи</th>
      <th rowspan="2">Касбий фаолият тури</th>
      <th rowspan="2">Ўзбекистон Республикаси Бандлик ва меҳнат муносабатлари вазирлигига хат (кирувчи хатнинг рақами ва санаси)</th>
      <th rowspan="2">Касб стандартининг қайд қилиш рақами</th>
      <th rowspan="2">Масъул ташкилот</th>
      <th rowspan="2">Касб стандартини амалиётга жорий этиш санаси(Бандлик ва меҳнат муносабатлари вазирининг буйруғи)</th>
      <th colspan="2">Касб стандартига ўзгартириш киритиш</th>
      <th rowspan="2">Касб стандартини амалиётга жорий этиш санаси (Бандлик ва меҳнат муносабатлари вазирининг буйруғига ўзгартиришлар)</th>
      <th class="actions" rowspan="2" width="300">Файлы</th>
    </tr>
    <tr>
      <th>Кирувчи хатнинг рақами ва санаси</th>
      <th>Ўзгартирилган стандартнинг қайд қилиш рақами</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($models as $item): ?>
      <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->regionActivite}}</td>
        <td>{{$item->standarbyRregion}}</td>
        <td>{{$item->view_pro_avtivite}}</td>
        <td>{{$item->latter_toMisistry}}</td>
        <td>{{$item->registrationNumber}}</td>
        <td>{{$item->responseOrganization}}</td>
        <td>{{$item->datainAction}}</td>
        <td>{{$item->incamingLatter}}</td>
        <td>{{$item->amendedRegisNumber}}</td>
        <td>{{$item->dataIntraAction}}</td>
        <td>
          <?php if ($item->files): ?>
            <?php foreach ($item->files as $index => $file): ?>
              <p>
                <a href="/uploads/files/{{$file}}" target="_blank">
                  /uploads/files/{{$file}}
                </a>
                <?php echo Form::model($item,['url' => route('admin.professional-standarts-uz.file-delete', ['id' => $item->id]), 'method' => 'delete']) ?>
                  <input type="hidden" name="file_index" value="{{$index}}">
                  <button class="btn btn-danger btn-xs">Удалить</button>
                <?php echo Form::close(); ?>
              </p>
            <?php endforeach ?>
          <?php endif ?>
          <?php echo Form::model($item,['url' => route('admin.professional-standarts-uz.file-upload', ['id' => $item->id]), 'method' => 'post', 'files' => true]) ?>
            <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
              <?= Form::file('file', ['class' => 'form-control', 'id' => 'file']) ?>
            </div>
            <button class="btn btn-success btn-xs">Загрузить</button>
          <?php echo Form::close(); ?>
        </td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>
<div class="text-right">
  <?= $models->links(); ?>
</div>
@endsection
