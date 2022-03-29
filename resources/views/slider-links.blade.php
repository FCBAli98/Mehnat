@if ($linksSlider)
  <div class="sectionBottom">
    <div class="mainContainer">
      <div class="borderedDec grey"></div>

      <br>

      <div class="textCenter sectionTitle">
        <h3 class="title title-22">
          {{ $linksSlider['title'] }}
        </h3>
      </div>

      <div class="sliderLinksSites">
        <ul class="sliderSites owl-carousel owl-theme">
          @foreach ($linksSlider['items'] as $item)
            @if ($item->image)
              @if ($loop->index % 2 === 0)
                <li>
                  @endif
                  <div class="newsBox" style="margin: 1rem; box-shadow: 0 0 3px rgba(19, 69, 98, 0.2);">
                    <div class="newsImage">
                      <a href="{{ $item->url }}" target="_blank" style="height: 100px; line-height: 100px; text-align: center;">
                        <img src="{{getFull($item->image)}}" alt="" style="max-width: 80%;">
                      </a>
                    </div>

                    <div class="textCenter newsTitle">
                      <a href="{{ $item->url }}" style="min-height: auto;" target="_blank">
                        <span>{{ $item->title }}</span>
                      </a>
                    </div>
                  </div>
                  @if ($loop->index % 2 === 1)
                </li>
              @endif
            @endif
          @endforeach
        </ul>
      </div>
    </div>
  </div>
@endif
