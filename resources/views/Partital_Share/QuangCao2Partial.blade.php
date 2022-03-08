@if ($Scocial_Media == null || count($Scocial_Media) == 0)
    <div class="container mx-auto text-center">Không có dữ liệu</div>
@else
    {{-- <div class="container mx-auto">
        @foreach ($Scocial_Media as $val)
            @if ($val->Description == 'link_banner_3')
                <a href="{{ $val->Value }}">
            @endif
        @endforeach

        @foreach ($Scocial_Media as $val)
            @if ($val->Description == 'banner_3')
                <img class="py-10 mx-auto" src="{{ $val->Value }}" alt="banner" />
            @endif
        @endforeach
        </a>
    </div> --}}

    @if ($check->IsPublic == true)
        <div class="container mx-auto py-10 ">
            @foreach ($Scocial_Media as $val)
                @if ($val->Description == 'link_banner_3')
                    @if ($val->IsPublic == true)
                        <a href="{{ $val->Value }}">
                        @else
                            <a>
                    @endif
                @endif
            @endforeach


            @foreach ($Scocial_Media as $val)
                @if ($val->Description == 'banner_3')
                    @if ($val->IsPublic == true)
                        <img class="mx-auto" src="{{ $val->Value }}" alt="banner" />
                    @else
                        <div class="container mx-auto">
                            <div class="py-10 mx-auto"></div>
                        </div>
                    @endif
                @endif
            @endforeach
            </a>
        </div>
    @endif
@endif
