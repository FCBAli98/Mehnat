@if ($contributors)
  <div class="sectionBottom">
    <div class="mainContainer">
      <div class="borderedDec grey"></div>

      <br>

      <div class="textCenter sectionTitle">
        <h3 class="title title-22">
          {{ $contributors['title'] }}
        </h3>
      </div>

      <div class="contentBlock">
        <div class="minContainer">
          <div class="sliderLinksSites">
            @if (count($contributors['items']) > 0)
              <ul class="sliderSites owl-carousel owl-theme">
                @foreach ($contributors['items'] as $item)
                  @if ($item->image)
                    <li>
                      <a href="{{ $item->url }}" target="_blank">
                        <div class="siteLogo">
                          <img src="{{ getThumbnail($item->image)}}" alt="">
                        </div>

                        <div class="siteTitle">
                          <span>{{ $item->title }}</span>
                        </div>
                      </a>
                    </li>
                  @endif
                @endforeach
              </ul>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
@endif
