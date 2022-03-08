@if ($Scocial_Media == null || count($Scocial_Media) == 0)
    <div class="container mx-auto text-center">Không có dữ liệu</div>
@else
    @if ($check->IsPublic == true)
        <div class="container py-10 mx-auto">
            <div class="banner-center">
                @foreach ($Scocial_Media as $val)
                    @if ($val->Description == 'link_banner_1')
                        @if ($val->IsPublic == true)
                            <a href="{{ $val->Value }}">
                            @else
                                <a></a>
                        @endif
                    @endif
                @endforeach

                @foreach ($Scocial_Media as $val)
                    @if ($val->Description == 'banner_1')
                        @if ($val->IsPublic == true)
                            <img src="{{ $val->Value }}" alt="banner-1" />
                        @else
                            {{-- <div class="container mx-auto">
                    <div class="py-10 mx-auto"></div>
                </div> --}}
                            <p class="py-10 mx-auto"></p>
                        @endif
                    @endif
                @endforeach
                </a>
            </div>
        </div>
    @else
        <div class="container mt-5 mx-auto">
        </div>
    @endif
@endif
