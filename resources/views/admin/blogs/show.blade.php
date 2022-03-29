@extends('layouts.admin')

@section('title', 'Блоги - Просмотр')

@section('content')
  <h2>
    Блоги #{{ $model->id }}
  </h2>

  <hr>

  <div class="clearfix">
    <div class="pull-left">
      <div class="btn-group group-control">
        <a href="{{ route('admin.blogs.index') }}" class="btn btn-default">{{ __('main.List') }}</a>
        <a href="{{ route('admin.blogs.edit', ['id' => $model->id]) }}" class="btn btn-default">{{ __('main.Edit') }}</a>
        <a href="{{ route('admin.blogs.create') }}" class="btn btn-default">{{ __('main.add_new') }}</a>
      </div>
    </div>

    <div class="pull-right">
      <div class="btn-group group-control">
        @foreach ($languages as $lang => $locale)
          <a href="?lang={{ $lang }}" class="btn btn-default btn-sm {{ $locale['active'] ? 'active' : '' }}">{{ $locale['name'] }}</a>
        @endforeach
      </div>
    </div>
  </div>

  <br>

  <table class="table table-bordered table-striped table-condensed">
    <tbody>
      <tr>
        <th scope="row">
          ID
        </th>

        <td>
          {{ $model->id }}
        </td>
      </tr>

      <tr>
        <th scope="row">
          Title
        </th>

        <td>
          {{ $model->title }}
        </td>
      </tr>

      <tr>
        <th scope="row">
          Url
        </th>

        <td>
          @if ($model->url)
            <a href="{{ route('blogs.show', ['name' => $model->url], false) }}" target="_blank">{{ route('blogs.show', ['name' => $model->url], false) }}</a>
          @endif
        </td>
      </tr>

      <tr>
        <th scope="row">
          Image
        </th>

        <td>
          @if ($model->image)
            <img src="{{ getThumbnail($model->image) }}" alt="">
          @endif
        </td>
      </tr>

      <tr>
        <th scope="row">
          Description
        </th>

        <td>
          {{ $model->description }}
        </td>
      </tr>

      <tr>
        <th scope="row">
          Date
        </th>

        <td>
          {{ $model->date }}
        </td>
      </tr>

      <tr>
        <th scope="row">
          Status
        </th>

        <td>
          {{ $model->status_display }}
        </td>
      </tr>

      <tr>
        <th scope="row">
          Translations
        </th>

        <td>
          <table class="table table-condensed">
            @foreach ($model->langsCheck as $lang => $locale)
              @if (isset($locale['exists']))
                <tr class="success">
                  <td>
                    {{$locale['name']}}
                  </td>

                  <td>
                    <form action="{{ route('admin.blogs.destroyTranslate', ['id' => $model->id, 'lang' => $lang]) }}" method="post">
                      {{ csrf_field() }}

                      <input name="_method" type="hidden" value="DELETE">
                      <input name="lang" type="hidden" value="{{ $lang }}">
                      <button class="btn btn-danger btn-xs" onclick="if (confirm('Вы уверены, что хотите удалить?')) { return true } event.returnValue = false; return false;">Удалить перевод</button>
                    </form>
                  </td>
                </tr>
              @else
                <tr>
                  <td>
                    {{ $locale['name'] }}
                  </td>

                  <td>
                    <a href="{{route('admin.blogs.edit', ['id' => $model->id, 'lang' => $lang]) }}" class="btn btn-primary btn-xs">Добавить перевод</a>
                  </td>
                </tr>
              @endif
            @endforeach
          </table>
        </td>
      </tr>

      <tr>
        <th scope="row">
          Created
        </th>

        <td>
          {{ $model->created_at }}
        </td>
      </tr>

      <tr>
        <th scope="row">
          Modified
        </th>

        <td>
          {{ $model->updated_at }}
        </td>
      </tr>
    </tbody>
  </table>

  <h3>
    Content
  </h3>

  <div class="content">
    {!! $model->content !!}
  </div>

  <hr>

  <div class="clearfix">
    <div class="pull-left">
      <form action="{{ route('admin.blogs.destroy', ['id' => $model->id]) }}" method="post" style="display: none;" id='deleteItem'>
        {{ csrf_field() }}
        <input name="_method" type="hidden" value="DELETE">
      </form>

      <a href="#" class="btn btn-danger" onclick="if (confirm('Вы уверены, что хотите удалить?')) { document.getElementById('deleteItem').submit(); } event.returnValue = false; return false;">Удалить</a>
    </div>
  </div>
@endsection
