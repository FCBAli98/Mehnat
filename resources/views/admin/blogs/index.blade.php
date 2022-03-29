@extends('layouts.admin')

@section('title', 'Блоги')

@section('content')
  <div class="pull-right">
    <br>
    <div class="form-group">
      Перейти: <a href="{{route('blogs')}}" target="_blank">{{route('blogs', [], false)}}</a>
    </div>
  </div>
  <h2>Блоги</h2>

  <hr>

  <div class="clearfix">
    <div class="pull-left">
      {{ __('main.page_count', ['current' => $models->currentPage(), 'lastPage' => $models->lastPage(), 'total' => $models->total()]) }}
    </div>

    @php
      $selectedLang = 'ru';
    @endphp

    <div class="pull-right">
      <div class="btn-group group-control">
        @foreach ($languages as $lang => $locale)
          <a href="?lang={{ $lang }}" class="btn btn-default btn-sm {{ $locale['active'] ? 'active' : '' }}">{{ $locale['name'] }}</a>

          @if ($locale['active'])
            @php
              $selectedLang = $lang;
            @endphp
          @endif
        @endforeach

        <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary btn-sm">{{ __('main.add_new') }}</a>
      </div>
    </div>
  </div>

  <br>

  <form action="" id="searchForm" method='get'>
    <input type="hidden" name="lang" value="{{$selectedLang}}">
  </form>

  <table cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed">
    <thead>
      <tr>
        <th width="50">#</th>
        <th width="200">Title</th>
        <th width="200">Url</th>
        <th width="200">Translations</th>
        <th>Status</th>
        <th>Created</th>
        <th>Modified</th>
        <th class="actions">Actions</th>
      </tr>

      <tr id="searchRow">
        <th></th>

        <th>
          {!! Form::text('search[title]', isset(app('request')->input('search')['title']) ? app('request')->input('search')['title'] : null, ['class' => 'form-control', 'form' => 'searchForm']) !!}
        </th>

        <th></th>

        <th></th>

        <th>
          {!! Form::select('search[enabled]', ['' => 'Выберите']+\Config::get('handbook.statuses'), isset(app('request')->input('search')['enabled']) ? app('request')->input('search')['enabled'] : null, ['class' => 'form-control', 'form' => 'searchForm']) !!}
        </th>

        <th></th>
        <th></th>
        <th></th>
      </tr>
    </thead>

    <tbody>
      @if ($models)
        @php
          $i = $models->currentPage();
        @endphp

        @foreach ($models as $item)
          <tr>
            <td>
              {{ $i }}
            </td>

            <td>
              {{ $item->title }}
            </td>

            <td>
              @if ($item->url)
                <a href="/{{$selectedLang}}/blog/{{$item->url}}" target="_blank">/{{$selectedLang}}/blogs/{{$item->url}}</a>
              @endif
            </td>

            <td>
              <div class="nowrap">
                @foreach ($item->langsCheck as $lang => $locale)
                  @if (isset($locale['exists']))
                    <a href="{{ route('admin.blogs.show', ['id' => $item->id, 'lang' => $lang]) }}" class="btn btn-success btn-xs">
                      <i class="fa fa-check" aria-hidden="true"></i> {{ $locale['name'] }}
                    </a>
                  @else
                    <a href="{{ route('admin.blogs.edit', ['id' => $item->id, 'lang' => $lang]) }}" class="btn btn-primary btn-xs">
                      <i class="fa fa-plus" aria-hidden="true"></i> {{ $locale['name'] }}
                    </a>
                  @endif
                @endforeach
              </div>
            </td>

            <td>
              {{ $item->status_display }}
            </td>

            <td>
              {{ $item->created_at }}
            </td>

            <td>
              {{ $item->updated_at }}
            </td>

            <td>
              <a href="{{ route('admin.blogs.show',['id' => $item->id]) }}" class="btn btn-default btn-sm"><span class="fa fa-eye"></span></a>
              <a href="{{ route('admin.blogs.edit',['id' => $item->id]) }}" class="btn btn-default btn-sm"><span class="fa fa-pencil"></span></a>

              <form action="{{ route('admin.blogs.destroy',['id' => $item->id]) }}" method="post" style="display: none;" id='deleteItem-{{ $item->id }}'>
                {{ csrf_field()  }}
                <input name="_method" type="hidden" value="DELETE">
              </form>

              <a href="#" class="btn btn-default btn-sm" onclick="if (confirm('Вы уверены, что хотите удалить?')) { document.getElementById('deleteItem-{{ $item->id }}').submit(); } event.returnValue = false; return false;"><span class="fa fa-trash"></span></a>
            </td>
          </tr>

          @php
            $i++;
          @endphp
        @endforeach
      @endif
    </tbody>
  </table>

  <div class="text-right">
    {!! $models->links() !!}
  </div>
@endsection
