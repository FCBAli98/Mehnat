@extends('layouts.app')

@section('title', __('main.home'))

@section('content')
  <div class="whiteSection">
    <div class="mainContainer">
      <div class="contentBlock firstContent">
        <div class="middleContainer">
          <div class="pageHead">
            <h2 class="title title-24">
              {{ __('main.retrain_reester') }}
            </h2>
            <div class="borderedDec grey"></div>
          </div>
          <div class="pageColls" style="padding-right: 10px">
            <div class="row15" style="margin-bottom: 10px">
              <div class="colp15-2 field2">
                <label for="soato">{{ __('main.Вилоят') }}</label>
                <select id="soato">
                  <option value=""></option>
                  @foreach($regions as $soato => $region)
                    <option value="{{ $soato }}">{{ $region }}</option>
                  @endforeach
                </select>
              </div>
              <div class="colp15-2 field2">
                <label for="city_soato">{{ __('main.Туман') }}</label>
                <select id="city_soato">
                  <option value=""></option>
                @foreach($cities as $soato => $city)
                    <option value="{{ $soato }}">{{ $city }}</option>
                  @endforeach
                </select>
              </div>
              <div class="colp15-4 field2">
                <div class="colp15-9">
                  <label for="institution_id">{{ __('main.Ўқув муассасаси') }}</label>
                  <select id="institution_id">
                    <option value=""></option>
                  </select>
                  <input type="text" id="institution_name" style="display: none">
                </div>
                <button class="btn0 btn2" style="height: 32px; padding: 5px 10px; margin-top: 20px; background-color: #72bf75" onclick="changeEducation()">{{ __('main.Boshqasi') }}</button>
              </div>
              <div class="colp15-2 field2">
                <label for="finished_year">тугаган сана</label>
                <select id="finished_year">
                  <option value=""></option>
                  <option value="2017">2017</option>
                  <option value="2018">2018</option>
                  <option value="2019">2019</option>
                  <option value="2020">2020</option>
                </select>
              </div>
              <div class="colp15-2" style="margin-top: 20px">
                <button class="btn0 btn2" style="height: 32px; padding: 5px 10px; background-color: #ff6464" onclick="resetFilter()"><i class="icon-close"></i></button>
                <button class="btn0 btn2" style="height: 32px; padding: 5px 10px" onclick="fetchData(1)"><i class="icon-search"></i></button>
              </div>
            </div>
            <div class="row15" id="re-trained-citizens">
              <table cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                  <th>{{ __('main.Вилоят') }}</th>
                  <th>{{ __('main.Туман') }}</th>
                  <th>{{ __('main.ФИО') }}</th>
                  <th>{{ __('main.Ўқув муассасаси') }}</th>
                  {{--                  <th>Телефон</th>--}}
                  <th>{{ __('main.Таълим йўналиши') }}</th>
                  <th>{{ __('main.Тугатган сана') }}</th>
                </tr>
                </thead>
                <tbody id="citizens-tbody">
                </tbody>
              </table>
              <div class="pagination1">
                <ul id="pagination-list">
                </ul>
              </div>
            </div>
            <div class="row15 alert alert-warning" id="processingDiv" style="text-align: center" hidden>
              processing...
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('additionalCssFiles')
  <style>
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    td, th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }
  </style>
@endsection
@section('additionalJsFiles')
  <script>
    fetchData(1);
    getInstitutions();

    function resetFilter() {
      $('#soato').val('');
      $('#city_soato').val('');
      $('#institution_id').val('');
      $('#institution_name').val('');
      $('#finished_year').val('');
      fetchData(1);
    }

    function changeEducation() {
      $('#institution_id').toggle();
      $('#institution_name').toggle();
    }

    function getInstitutions() {
      $.ajax({
        url: 'https://abkm.mehnat.uz/api/edu-centers',
        method: 'GET',
        success: function (data) {
          $.each(data.data.institutions, function (index, value) {
            $('#institution_id').append('<option value="'+value.insitution_id+'">'+value.institution_name+'</option>')
          });
          $.each(data.data.directions, function (index, value) {
            $('#institution_id').append('<option value="'+value.direction_id+'">'+value.direction_name+'</option>')
          });
        }
      })
    }

    function fetchData(page_number = 1) {
      // $('#re-trained-citizens').hide();
      // $('#processingDiv').show();
      $('#citizens-tbody').empty();
      $('#pagination-list').empty();
      let soato = $('#soato').val();
      let city_soato = $('#city_soato').val();
      let institution_id = $('#institution_id').val();
      let institution_name = $('#institution_name').val();
      let finished_year = $('#finished_year').val();

      $.ajax({
        url: 'https://abkm.mehnat.uz/api/get-list-training-proposeds',
        method: 'GET',
        data: {limit:15, total:0, page: page_number, soato:soato, city_soato:city_soato, institution_id:institution_id, institution_name:institution_name, finished_year:finished_year},
        success: function (data) {
          let result = data.data;
          let li = '<li class="disabled" aria-disabled="true" aria-label="« Previous"><a><i class="icon-duble-arrow-left"></i></a></li>';

          let total_pages = Math.ceil(result.total / 15);

          for (let i = 1; i <= total_pages; i++)
          {
            if(i > 7)
            {
              li += '<li class="disabled" aria-disabled="true"><span>...</span></li>';
              break;
            }
            else {
              if(i === result.current_page) {
                li += '<li class="active" aria-current="page"><a><span>'+i+'</span></a></li>';
              }
              else
              {
                li += '<li><a href="#" onclick="fetchData('+i+')"><span>'+i+'</span></a></li>';
              }
            }
          }

          if(total_pages === 8 )
          {
            if(result.current_page === 8)
            {
              li += '<li class="active" aria-current="page"><a href="#" onclick="fetchData(8)"><span>8</span></a></li>';
            }
            else
            {
              li += '<li><a href="#" onclick="fetchData(8)"><span>8</span></a></li>';
            }
          }

          if(total_pages >= 9 )
          {
            if(result.current_page === (total_pages-1))
            {
              li += '<li class="active" aria-current="page"><a href="#" onclick="fetchData('+(total_pages-1)+')"><span>'+(total_pages-1)+'</span></a></li>';
            }
            else
            {
              li += '<li><a href="#" onclick="fetchData('+(total_pages-1)+')"><span>'+(total_pages-1)+'</span></a></li>';
            }

            if(result.current_page === total_pages)
            {
              li += '<li class="active" aria-current="page"><a href="#" onclick="fetchData('+(total_pages)+')"><span>'+(total_pages)+'</span></a></li>';
            }
            else
            {
              li += '<li><a href="#" onclick="fetchData('+(total_pages)+')"><span>'+(total_pages)+'</span></a></li>';
            }

          }

          li += '<li><a href="#" rel="next" aria-label="Next »" onclick="fetchData('+(result.current_page+1)+')"><i class="icon-duble-arrow-right"></i></a></li>';
          $('#pagination-list').append(li);

          $.each(result.data, function (index, value) {
            let tr = '<tr><td>' +value.parent_structure_name+ '</td>';
            tr += '<td>' +value.structure_name+ '</td>';
            tr += '<td>' +value.l_name+' '+value.f_name+' '+value.m_name+ '</td>';
            tr += '<td>' +value.institution_name+ '</td>';
            // tr += '<td>' +value.phone+ '</td>';
            tr += '<td>' +value.direction_name+ '</td>';
            tr += '<td>' +value.end_date.substr(0, 10)+ '</td></tr>';

            $('#citizens-tbody').append(tr);
          });
        },
        error: function (error, status, message) {
          console.log(error)
          console.log(status)
          console.log(message)
        }
      })
    }

  </script>
@endsection
