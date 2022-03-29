@extends('layouts.app')

@section('title', $title)

@section('content')
  <div class="whiteSection">
    <div class="mainContainer">
      <div class="contentBlock firstContent">
        <div class="middleContainer">
          <div class="minContainer">
            <div class="pageHead">
              <div class="borderedDec grey"></div>
            </div>
            <div class="breadcrumbs1">
              <ul>
                <li>
                  <a href="{{route('home')}}">{{__('main.home')}}</a>
                </li>
                <li>
                  {{$title}}
                </li>
              </ul>
            </div>
            <div class="staticPageHead">
              <h2 class="title title-28">{{$title}}</h2>
            </div>
            <div class="staticPageContent">
              <table class="table table-bordered table-striped table-condensed">
                <thead>
                <tr>
                    <th>№</th>
                    <th>Таълим муассаса номи</th>
                    <th>ФИО</th>
                    <th>Ўқув муассаса тури</th>
{{--                    <th>Ўқув маркази тури</th>--}}
                    <th>Ҳудуд</th>
                    <th>Туман</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1; $skipped = ($result['current_page'] - 1) * $result['per_page']; ?>
                @foreach($result['data'] as $key => $item)
                  <tr>
                    <td>{{$skipped + $key + 1}}</td>
                    <td>{{$item['company_name']}}</td>
                    <td>{{$item['name']}}</td>
                    <td>{{$item['type_of_institutions']['name']}}</td>
{{--                    <td>{{''}}</td>--}}
                    <td>{{($item['region']) ? $item['region']['name_cyrl'] : ''}}</td>
                    <td>{{($item['city']) ? $item['city']['name_cyrl'] : ''}}</td>
                  </tr>
                @endforeach
                </tbody>
              </table>
              <div class="text-right">
                {{ $paginate->links('pagination.default') }}
              </div>
            </div>
            <div class="staticPageFooter">
              <?php /* ?>
            <div class="staticPageShareLabel">{{__('main.поделиться')}}:</div>
            <div class="staticPageShareList">
              <a href="#" class="staticPageFooterBtn"><i class="icon-sn-fb"></i></a>
              <a href="#" class="staticPageFooterBtn"><i class="icon-vk"></i></a>
              <a href="#" class="staticPageFooterBtn"><i class="icon-odno"></i></a>
              <a href="#" class="staticPageFooterBtn"><i class="icon-dotted"></i></a>
            </div>
            <?php */ ?>
              <a href="#" id="print" class="staticPageFooterBtn right"><i class="icon-printer"></i></a>
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
