@if ($Scocial_Media == null)
    <div class="container mx-auto text-center">Không có dữ liệu</div>
@else
    {{-- {{ dd($Scocial_Media) }} --}}
    <div class="container h-full mx-auto">
        <div class="flex flex-row justify-between py-4 sm:items-center">
            <ul class="flex flex-col sm:flex-row">
                <li class="flex">
                    @foreach ($Scocial_Media as $val)
                        @if ($val->Description == 'phone')
                            <img class="w-[10px] md:w-4 mr-3 relative bottom-0 md:-bottom-0.5"
                                src="/assets/icon-phone.0467253c.svg" alt="{{ $val->Value }}">
                            <a class="text-gray-100 whitespace-nowrap text-[10px] text-[9px] md:text-base"
                                href="tel:(028) 38 61297">{{ $val->Value }}</a>
                        @endif
                    @endforeach
                </li>
                <li class="flex ml-0 text-gray-100 sm:ml-12">
                    @foreach ($Scocial_Media as $val)
                        @if ($val->Description == 'email')
                            <img class="w-[10px] md:w-4 mr-3 relative bottom-0 md:-bottom-0.5"
                                src="/assets/icon-mail.74ba5c8b.svg" alt="{{ $val->Value }}">
                            <a class="text-gray-100 text-[10px] text-[9px] md:text-base"
                                href="mailto:benhvien.thuypetpro198@gmaill.com">{{ $val->Value }}</a>
                        @endif
                    @endforeach
                </li>
            </ul>
            <ul class="flex">
                <li>
                    @foreach ($Scocial_Media as $val)
                        @if ($val->Description == 'zalo')
                            <a href="{{ $val->Value }}" target="_blank">
                                <img class="w-6 h-6" src="/assets/icon-zalo.0f5e2ca1.svg" alt="zalo">
                            </a>
                        @endif
                    @endforeach

                </li>
                <li class="ml-4 sm:ml-6">
                    @foreach ($Scocial_Media as $val)
                        @if ($val->Description == 'facebook')
                            <a href="{{ $val->Value }}" target="_blank">
                                <img class="w-6 h-6" src="/assets/icon-facebook.f263e26c.svg" alt="facebook">
                            </a>
                        @endif
                    @endforeach

                </li>
                <li class="ml-4 sm:ml-6">
                    @foreach ($Scocial_Media as $val)
                        @if ($val->Description == 'instagram')
                            <a href="{{ $val->Value }}" target="_blank">
                                <img class="w-6 h-6" src="/assets/icon-instagram.bbd2d036.svg" alt="instagram">
                            </a>
                        @endif
                    @endforeach

                </li>
                <li class="ml-4 sm:ml-6">
                    @foreach ($Scocial_Media as $val)
                        @if ($val->Description == 'youtube')
                            <a href="{{ $val->Value }}" target="_blank">
                                <img class="w-6 h-6" src="/assets/icon-youtube.8a23c502.svg" alt="youtube">
                            </a>
                        @endif
                    @endforeach
                </li>
            </ul>
        </div>
    </div>
@endif
