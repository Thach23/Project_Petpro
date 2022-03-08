@if ($Scocial_Media == null || count($Scocial_Media) == 0)
    <div class="container mx-auto text-center">Không có dữ liệu</div>
@else
    <div class="flex justify-center mb-18 mt-20">
        <div id="clientsCarousel" class="swiper">
            <div class="swiper-wrapper">
                @foreach ($Scocial_Media as $val)
                    @if ($val->IsPublic == false || $val->Value == null)
                    @else
                        <div class="swiper-slide max-w-[100px] sm:max-w-[180px]">
                            <img class="w-[100px] sm:w-[180px]" src="{{ $val->Value }}"
                                alt="{{ substr($val->Name, 0, 6) }}">
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endif
