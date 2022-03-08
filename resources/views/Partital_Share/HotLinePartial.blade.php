@if ($Scocial_Media == null || count($Scocial_Media) == 0)
    <div class="container mx-auto text-center">Không có dữ liệu</div>
@else
    @foreach ($Scocial_Media as $val)
        @if ($val->Description == 'banner_2')
            <div class="relative flex justify-center w-full pr-0 bg-center bg-cover md:justify-end h-[110px] md:h-70 pt-3 md:pt-15 pb-3 md:pb-18 md:pr-44"
                style="background-image: url({{ $val->Value }});">
                <div class="inline-block text-center">
                    <h3 class="text-xl font-medium text-red-100 capitalize md:font-bold md:text-3xl sm:text-4xl">Dịch vụ
                        cấp cứu
                        24/7
                    </h3>
                    @foreach ($Scocial_Media as $val)
                        @if ($val->Description == 'phonehotline' && $val->IsPublic == true)
                            <p class="mt-1 text-xs text-gray-400 md:mt-2 md:text-lg sm:text-2xl">Hotline :
                                {{ $val->Value }}</p>
                        @endif
                    @endforeach
                    @foreach ($Scocial_Media as $val)
                        @if ($val->Description == 'phonehotline')
                            @if ($val->IsPublic == false || $val->Value == '' || $val->Value == null)
                                <a class="mt-2 md:mt-4 btn">gọi ngay</a>
                            @else
                                <a class="mt-2 md:mt-4 btn" href="tel: {{ $val->Value }}">gọi ngay</a>
                            @endif
                        @endif
                    @endforeach
                </div>
            </div>
        @endif
    @endforeach
@endif
