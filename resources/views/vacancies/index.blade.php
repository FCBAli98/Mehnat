@extends('layouts.app')

@section('title', __('main.home'))

@section('additionalCssFiles')
  <style>
    #customers {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    #customers td, #customers th {
      border: 1px solid #ddd;
      padding: 8px;
    }

    #customers tr:nth-child(even){background-color: #f2f2f2;}

    #customers tr:hover {background-color: #ddd;}

    #customers th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #04AA6D;
      color: white;
    }

    select {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    .pagination {
      display: inline-block;
    }

    .pagination a {
      color: black;
      float: left;
      padding: 8px 16px;
      text-decoration: none;
    }

    .pagination a.active {
      background-color: #4CAF50;
      color: white;
    }

    .pagination a:hover:not(.active) {background-color: #ddd;}
  </style>
@endsection
@section('content')
  <div class="whiteSection">
    <div class="mainContainer">
      <div class="contentBlock firstContent">
        <div class="middleContainer">
          <table id="customers">
            <tr>
              <th>Viloyat</th>
              <th>Tuman</th>
              <th>Mutahassislik</th>
              <th>Korxona nomi</th>
              <th>Maosh</th>
              <th>Bosh ish o'rinlar soni</th>
              <th>Vakansiya elon qilingan sana</th>
            </tr>
            <tr>
              <td>
                <select id="region_id" name="region_id" onchange="reloadPage()">
                  <option value="0"></option>
                  @foreach($regions as $region)
                    @if($region['id'] == $region_id)
                      <option value="{{ $region['id'] }}" selected>{{ $region['name_ru'] }}</option>
                    @else
                      <option value="{{ $region['id'] }}">{{ $region['name_ru'] }}</option>
                    @endif
                  @endforeach
                </select>
              </td>
              <td>
                <select id="district_id" name="district_id" onchange="reloadPage()">
                  <option value="0"></option>
                  @foreach($districts as $district)
                    @if($district['id'] == $district_id)
                      <option value="{{ $district['id'] }}" selected>{{ $district['name_ru'] }}</option>
                    @else
                      <option value="{{ $district['id'] }}">{{ $district['name_ru'] }}</option>
                    @endif
                  @endforeach
                </select>
              </td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            @foreach($vacancies->data as $vacancy)
              <tr>
                <td>{{ (isset($regions[substr($vacancy->company_soato_code, 0, 4)]))?$regions[substr($vacancy->company_soato_code, 0, 4)]['name_ru']:'' }}</td>
                <td>{{ (isset($districts[$vacancy->company_soato_code]))?$districts[$vacancy->company_soato_code]['name_ru']:'' }}</td>
                <td>{{ $vacancy->position_name }}</td>
                <td>{{ $vacancy->company_name }}</td>
                <td>{{ $vacancy->position_salary }}</td>
                <td>1</td>
                <td>{{ substr($vacancy->updated_at, 0, 16) }}</td>
              </tr>
            @endforeach
          </table>

          <div class="pagination" style="margin-top: 5px">
              @if($page != 1)
                <a href="javascript:void(0)" onclick="reloadPage({{ --$page }})">&laquo;</a>
              @endif
              @for($i=1; $i<=$vacancies->pages; $i++)
                @if($page == $i-1)
                  <a href="javascript:void(0)" class="active" onclick="reloadPage({{ $i }})">{{ $i }}</a>
                @else
                  <a href="javascript:void(0)" onclick="reloadPage({{ $i }})">{{ $i }}</a>
                @endif
              @endfor
              @if($page != $vacancies->pages)
                <a href="javascript:void(0)" onclick="reloadPage({{ ++$page }})">&laquo;</a>
              @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('additionalJsFiles')
  <script>
    function reloadPage(page=1) {
      let region_id = $('#region_id').val()
      let district_id = $('#district_id').val()
      let filterTxt = `page=${page}`

      if(region_id != 0) {
        filterTxt += '&region_id='+region_id
      }

      if(district_id != 0) {
        filterTxt += '&district_id='+district_id
      }

      if(filterTxt !== '') {
        window.location.href = `https://mehnat.uz/uz/vacancies?${filterTxt}`
      }
    }
  </script>
@endsection
