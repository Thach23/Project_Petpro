@if ($Scocial_Media == null || count($Scocial_Media) == 0)
    <div class="container mx-auto text-center">Không có dữ liệu</div>
@else
    <div id="certificateCarousel" class="swiper">
        <div class="swiper-wrapper max-w-[225px] lg:max-w-[400px] xl:max-w-full">
            @foreach ($Scocial_Media as $val)
                @if ($val->IsPublic == false || $val->Value == null)
                @else
                    <div class="swiper-slide">
                        <img class="w-full max-w-[225px] lg:max-w-[400px] xl:max-w-full" src="{{ $val->Value }}"
                            alt="{{ substr($val->Name, 0, 22) }}">
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endif
