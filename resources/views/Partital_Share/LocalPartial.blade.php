@if ($LocalMap == null || count($LocalMap) == 0)
    <div class="container mx-auto text-center">Không có dữ liệu</div>
@else
    <div class="grid lg:grid-cols-2 lg:gap-7">
        <div>
            @foreach ($LocalMap as $item)
                @if ($item->IsPublic == true && $item->Description == 'ten_1' && $item->Value != null)
                    <div
                        class="relative z-10 w-full border hover:z-20 border-gray-150 hover:border-blue-200 js-collapse">
                        <div
                            class="relative w-full py-3 pl-2 sm:pl-4 pr-[30px] sm:pr-[54px] text-[18px] js-collapse-title cursor-pointer">
                            @foreach ($LocalMap as $val)
                                @if ($val->Description == 'ten_1')
                                    {{ $val->Value }}
                                @endif
                            @endforeach
                            <button class="absolute right-0 top-0 sm:w-[54px] w-[30px] h-[54px] z-0">+</button>
                        </div>

                        <div
                            class="relative px-2 sm:flex sm:px-4 py-4 text-base min-h-[120px] transition-all js-collapse-content border-t border-gray-150">
                            <div class="sm:flex-grow sm:pr-4">
                                @foreach ($LocalMap as $val)
                                    @if ($val->Description == 'diachi_1' && $val->IsPublic == true && $val->Value != null)
                                        {!! html_entity_decode($val->Value) !!}
                                    @endif
                                @endforeach
                            </div>
                            @foreach ($LocalMap as $val)
                                @if ($val->Description == 'map_1')
                                    @if ($val->Value == null || $val->IsPublic == false)
                                        <a href="#" class="text-blue-200 underline underline-offset-3"
                                            target="_blank">Xem bản
                                            đồ</a>
                                    @else
                                        <a href="{{ $val->Value }}" class="text-blue-200 underline underline-offset-3"
                                            target="_blank">Xem bản đồ</a>
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach

            @foreach ($LocalMap as $item)
                @if ($item->IsPublic == true && $item->Description == 'ten_2' && $item->Value != null)
                    <div
                        class="relative z-10 w-full border hover:z-20 border-gray-150 hover:border-blue-200 js-collapse">
                        <div
                            class="relative w-full py-3 pl-2 sm:pl-4 pr-[30px] sm:pr-[54px] text-[18px] js-collapse-title cursor-pointer">
                            @foreach ($LocalMap as $val)
                                @if ($val->Description == 'ten_2')
                                    {{ $val->Value }}
                                @endif
                            @endforeach
                            <button class="absolute right-0 top-0 sm:w-[54px] w-[30px] h-[54px] z-0">+</button>
                        </div>

                        <div
                            class="relative px-2 sm:flex sm:px-4 py-4 text-base min-h-[120px] transition-all js-collapse-content border-t border-gray-150">
                            <div class="sm:flex-grow sm:pr-4">
                                @foreach ($LocalMap as $val)
                                    @if ($val->Description == 'diachi_2' && $val->IsPublic == true && $val->Value != null)
                                        {!! html_entity_decode($val->Value) !!}
                                    @endif
                                @endforeach
                            </div>
                            @foreach ($LocalMap as $val)
                                @if ($val->Description == 'map_2')
                                    @if ($val->Value == null || $val->IsPublic == false)
                                        <a href="#" class="text-blue-200 underline underline-offset-3"
                                            target="_blank">Xem bản
                                            đồ</a>
                                    @else
                                        <a href="{{ $val->Value }}" class="text-blue-200 underline underline-offset-3"
                                            target="_blank">Xem bản đồ</a>
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach

            @foreach ($LocalMap as $item)
                @if ($item->IsPublic == true && $item->Description == 'ten_3' && $item->Value != null)
                    <div
                        class="relative z-10 w-full border hover:z-20 border-gray-150 hover:border-blue-200 js-collapse">
                        <div
                            class="relative w-full py-3 pl-2 sm:pl-4 pr-[30px] sm:pr-[54px] text-[18px] js-collapse-title cursor-pointer">
                            @foreach ($LocalMap as $val)
                                @if ($val->Description == 'ten_3')
                                    {{ $val->Value }}
                                @endif
                            @endforeach
                            <button class="absolute right-0 top-0 sm:w-[54px] w-[30px] h-[54px] z-0">+</button>
                        </div>

                        <div
                            class="relative px-2 sm:flex sm:px-4 py-4 text-base min-h-[120px] transition-all js-collapse-content border-t border-gray-150">
                            <div class="sm:flex-grow sm:pr-4">
                                @foreach ($LocalMap as $val)
                                    @if ($val->Description == 'diachi_3' && $val->IsPublic == true && $val->Value != null)
                                        {!! html_entity_decode($val->Value) !!}
                                    @endif
                                @endforeach
                            </div>
                            @foreach ($LocalMap as $val)
                                @if ($val->Description == 'map_3')
                                    @if ($val->Value == null || $val->IsPublic == false)
                                        <a href="#" class="text-blue-200 underline underline-offset-3"
                                            target="_blank">Xem bản
                                            đồ</a>
                                    @else
                                        <a href="{{ $val->Value }}" class="text-blue-200 underline underline-offset-3"
                                            target="_blank">Xem bản đồ</a>
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach

            @foreach ($LocalMap as $item)
                @if ($item->IsPublic == true && $item->Description == 'ten_4' && $item->Value != null)
                    <div
                        class="relative z-10 w-full border hover:z-20 border-gray-150 hover:border-blue-200 js-collapse">
                        <div
                            class="relative w-full py-3 pl-2 sm:pl-4 pr-[30px] sm:pr-[54px] text-[18px] js-collapse-title cursor-pointer">
                            @foreach ($LocalMap as $val)
                                @if ($val->Description == 'ten_4')
                                    {{ $val->Value }}
                                @endif
                            @endforeach
                            <button class="absolute right-0 top-0 sm:w-[54px] w-[30px] h-[54px] z-0">+</button>
                        </div>

                        <div
                            class="relative px-2 sm:flex sm:px-4 py-4 text-base min-h-[120px] transition-all js-collapse-content border-t border-gray-150">
                            <div class="sm:flex-grow sm:pr-4">
                                @foreach ($LocalMap as $val)
                                    @if ($val->Description == 'diachi_4' && $val->IsPublic == true && $val->Value != null)
                                        {!! html_entity_decode($val->Value) !!}
                                    @endif
                                @endforeach
                            </div>
                            @foreach ($LocalMap as $val)
                                @if ($val->Description == 'map_4')
                                    @if ($val->Value == null || $val->IsPublic == false)
                                        <a href="#" class="text-blue-200 underline underline-offset-3"
                                            target="_blank">Xem bản
                                            đồ</a>
                                    @else
                                        <a href="{{ $val->Value }}" class="text-blue-200 underline underline-offset-3"
                                            target="_blank">Xem bản đồ</a>
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach


            @foreach ($LocalMap as $item)
                @if ($item->IsPublic == true && $item->Description == 'ten_5' && $item->Value != null)
                    <div
                        class="relative z-10 w-full border hover:z-20 border-gray-150 hover:border-blue-200 js-collapse">
                        <div
                            class="relative w-full py-3 pl-2 sm:pl-4 pr-[30px] sm:pr-[54px] text-[18px] js-collapse-title cursor-pointer">
                            @foreach ($LocalMap as $val)
                                @if ($val->Description == 'ten_5')
                                    {{ $val->Value }}
                                @endif
                            @endforeach
                            <button class="absolute right-0 top-0 sm:w-[54px] w-[30px] h-[54px] z-0">+</button>
                        </div>

                        <div
                            class="relative px-2 sm:flex sm:px-4 py-4 text-base min-h-[120px] transition-all js-collapse-content border-t border-gray-150">
                            <div class="sm:flex-grow sm:pr-4">
                                @foreach ($LocalMap as $val)
                                    @if ($val->Description == 'diachi_5' && $val->IsPublic == true && $val->Value != null)
                                        {!! html_entity_decode($val->Value) !!}
                                    @endif
                                @endforeach
                            </div>
                            @foreach ($LocalMap as $val)
                                @if ($val->Description == 'map_5')
                                    @if ($val->Value == null || $val->IsPublic == false)
                                        <a href="#" class="text-blue-200 underline underline-offset-3"
                                            target="_blank">Xem bản
                                            đồ</a>
                                    @else
                                        <a href="{{ $val->Value }}" class="text-blue-200 underline underline-offset-3"
                                            target="_blank">Xem bản
                                            đồ</a>
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach

            @foreach ($LocalMap as $item)
                @if ($item->IsPublic == true && $item->Description == 'ten_6' && $item->Value != null)
                    <div
                        class="relative z-10 w-full border hover:z-20 border-gray-150 hover:border-blue-200 js-collapse">
                        <div
                            class="relative w-full py-3 pl-2 sm:pl-4 pr-[30px] sm:pr-[54px] text-[18px] js-collapse-title cursor-pointer">
                            @foreach ($LocalMap as $val)
                                @if ($val->Description == 'ten_6')
                                    {{ $val->Value }}
                                @endif
                            @endforeach
                            <button class="absolute right-0 top-0 sm:w-[54px] w-[30px] h-[54px] z-0">+</button>
                        </div>

                        <div
                            class="relative px-2 sm:flex sm:px-4 py-4 text-base min-h-[120px] transition-all js-collapse-content border-t border-gray-150">
                            <div class="sm:flex-grow sm:pr-4">
                                @foreach ($LocalMap as $val)
                                    @if ($val->Description == 'diachi_6' && $val->IsPublic == true && $val->Value != null)
                                        {!! html_entity_decode($val->Value) !!}
                                    @endif
                                @endforeach
                            </div>
                            @foreach ($LocalMap as $val)
                                @if ($val->Description == 'map_6')
                                    @if ($val->Value == null || $val->IsPublic == false)
                                        <a href="#" class="text-blue-200 underline underline-offset-3"
                                            target="_blank">Xem bản
                                            đồ</a>
                                    @else
                                        <a href="{{ $val->Value }}"
                                            class="text-blue-200 underline underline-offset-3" target="_blank">Xem bản
                                            đồ</a>
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach

            @foreach ($LocalMap as $item)
                @if ($item->IsPublic == true && $item->Description == 'ten_7' && $item->Value != null)
                    <div
                        class="relative z-10 w-full border hover:z-20 border-gray-150 hover:border-blue-200 js-collapse">
                        <div
                            class="relative w-full py-3 pl-2 sm:pl-4 pr-[30px] sm:pr-[54px] text-[18px] js-collapse-title cursor-pointer">
                            @foreach ($LocalMap as $val)
                                @if ($val->Description == 'ten_7')
                                    {{ $val->Value }}
                                @endif
                            @endforeach
                            <button class="absolute right-0 top-0 sm:w-[54px] w-[30px] h-[54px] z-0">+</button>
                        </div>

                        <div
                            class="relative px-2 sm:flex sm:px-4 py-4 text-base min-h-[120px] transition-all js-collapse-content border-t border-gray-150">
                            <div class="sm:flex-grow sm:pr-4">
                                @foreach ($LocalMap as $val)
                                    @if ($val->Description == 'diachi_7' && $val->IsPublic == true && $val->Value != null)
                                        {!! html_entity_decode($val->Value) !!}
                                    @endif
                                @endforeach
                            </div>
                            @foreach ($LocalMap as $val)
                                @if ($val->Description == 'map_7')
                                    @if ($val->Value == null || $val->IsPublic == false)
                                        <a href="#" class="text-blue-200 underline underline-offset-3"
                                            target="_blank">Xem bản
                                            đồ</a>
                                    @else
                                        <a href="{{ $val->Value }}"
                                            class="text-blue-200 underline underline-offset-3" target="_blank">Xem bản
                                            đồ</a>
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach
            {{-- <div class="relative z-10 w-full border hover:z-20 border-gray-150 hover:border-blue-200 js-collapse">
                <div
                    class="relative w-full py-3 pl-2 sm:pl-4 pr-[30px] sm:pr-[54px] text-[18px] js-collapse-title cursor-pointer">
                    @foreach ($LocalMap as $val)
                        @if ($val->Description == 'ten_2')
                            {{ $val->Value }}
                        @endif
                    @endforeach
                    <button class="absolute right-0 top-0 sm:w-[54px] w-[30px] h-[54px] z-0">+</button>
                </div>
                <div
                    class="relative px-2 sm:flex sm:px-4 py-4 text-base min-h-[120px] transition-all js-collapse-content border-t border-gray-150">
                    <div class="sm:flex-grow sm:pr-4">
                        @foreach ($LocalMap as $val)
                            @if ($val->Description == 'diachi_2')
                                {!! html_entity_decode($val->Value) !!}
                            @endif
                        @endforeach
                    </div>
                    @foreach ($LocalMap as $val)
                        @if ($val->Description == 'map_2')
                            @if ($val->Value == null)
                                <a href="#" class="text-blue-200 underline underline-offset-3" target="_blank">Xem bản
                                    đồ</a>
                            @else
                                <a href="{{ $val->Value }}" class="text-blue-200 underline underline-offset-3"
                                    target="_blank">Xem bản đồ</a>
                            @endif
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="relative z-10 w-full border hover:z-20 border-gray-150 hover:border-blue-200 js-collapse">
                <div
                    class="relative w-full py-3 pl-2 sm:pl-4 pr-[30px] sm:pr-[54px] text-[18px] js-collapse-title cursor-pointer">
                    @foreach ($LocalMap as $val)
                        @if ($val->Description == 'ten_3')
                            {{ $val->Value }}
                        @endif
                    @endforeach
                    <button class="absolute right-0 top-0 sm:w-[54px] w-[30px] h-[54px] z-0">+</button>
                </div>
                <div
                    class="relative px-2 sm:flex sm:px-4 py-4 text-base min-h-[120px] transition-all js-collapse-content border-t border-gray-150">
                    <div class="sm:flex-grow sm:pr-4">
                        @foreach ($LocalMap as $val)
                            @if ($val->Description == 'diachi_3')
                                {!! html_entity_decode($val->Value) !!}
                            @endif
                        @endforeach
                    </div>
                    @foreach ($LocalMap as $val)
                        @if ($val->Description == 'map_3')
                            @if ($val->Value == null)
                                <a href="#" class="text-blue-200 underline underline-offset-3" target="_blank">Xem bản
                                    đồ</a>
                            @else
                                <a href="{{ $val->Value }}" class="text-blue-200 underline underline-offset-3"
                                    target="_blank">Xem bản đồ</a>
                            @endif
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="relative z-10 w-full border hover:z-20 border-gray-150 hover:border-blue-200 js-collapse">
                <div
                    class="relative w-full py-3 pl-2 sm:pl-4 pr-[30px] sm:pr-[54px] text-[18px] js-collapse-title cursor-pointer">
                    @foreach ($LocalMap as $val)
                        @if ($val->Description == 'ten_4')
                            {{ $val->Value }}
                        @endif
                    @endforeach
                    <button class="absolute right-0 top-0 sm:w-[54px] w-[30px] h-[54px] z-0">+</button>
                </div>
                <div
                    class="relative px-2 sm:flex sm:px-4 py-4 text-base min-h-[120px] transition-all js-collapse-content border-t border-gray-150">
                    <div class="sm:flex-grow sm:pr-4">
                        @foreach ($LocalMap as $val)
                            @if ($val->Description == 'diachi_4')
                                {!! html_entity_decode($val->Value) !!}
                            @endif
                        @endforeach
                    </div>
                    @foreach ($LocalMap as $val)
                        @if ($val->Description == 'map_4')
                            @if ($val->Value == null)
                                <a href="#" class="text-blue-200 underline underline-offset-3" target="_blank">Xem bản
                                    đồ</a>
                            @else
                                <a href="{{ $val->Value }}" class="text-blue-200 underline underline-offset-3"
                                    target="_blank">Xem bản đồ</a>
                            @endif
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="relative z-10 w-full border hover:z-20 border-gray-150 hover:border-blue-200 js-collapse">
                <div
                    class="relative w-full py-3 pl-2 sm:pl-4 pr-[30px] sm:pr-[54px] text-[18px] js-collapse-title cursor-pointer">
                    @foreach ($LocalMap as $val)
                        @if ($val->Description == 'ten_5')
                            {{ $val->Value }}
                        @endif
                    @endforeach
                    <button class="absolute right-0 top-0 sm:w-[54px] w-[30px] h-[54px] z-0">+</button>
                </div>
                <div
                    class="relative px-2 sm:flex sm:px-4 py-4 text-base min-h-[120px] transition-all js-collapse-content border-t border-gray-150">
                    <div class="sm:flex-grow sm:pr-4">
                        @foreach ($LocalMap as $val)
                            @if ($val->Description == 'diachi_5')
                                {!! html_entity_decode($val->Value) !!}
                            @endif
                        @endforeach
                    </div>
                    @foreach ($LocalMap as $val)
                        @if ($val->Description == 'map_5')
                            @if ($val->Value == null)
                                <a href="#" class="text-blue-200 underline underline-offset-3" target="_blank">Xem bản
                                    đồ</a>
                            @else
                                <a href="{{ $val->Value }}" class="text-blue-200 underline underline-offset-3"
                                    target="_blank">Xem bản đồ</a>
                            @endif
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="relative z-10 w-full border hover:z-20 border-gray-150 hover:border-blue-200 js-collapse">
                <div
                    class="relative w-full py-3 pl-2 sm:pl-4 pr-[30px] sm:pr-[54px] text-[18px] js-collapse-title cursor-pointer">
                    @foreach ($LocalMap as $val)
                        @if ($val->Description == 'ten_6')
                            {{ $val->Value }}
                        @endif
                    @endforeach
                    <button class="absolute right-0 top-0 sm:w-[54px] w-[30px] h-[54px] z-0">+</button>
                </div>
                <div
                    class="relative px-2 sm:flex sm:px-4 py-4 text-base min-h-[120px] transition-all js-collapse-content border-t border-gray-150">
                    <div class="sm:flex-grow sm:pr-4">
                        @foreach ($LocalMap as $val)
                            @if ($val->Description == 'diachi_6')
                                {!! html_entity_decode($val->Value) !!}
                            @endif
                        @endforeach
                    </div>
                    @foreach ($LocalMap as $val)
                        @if ($val->Description == 'map_6')
                            @if ($val->Value == null)
                                <a href="#" class="text-blue-200 underline underline-offset-3" target="_blank">Xem bản
                                    đồ</a>
                            @else
                                <a href="{{ $val->Value }}" class="text-blue-200 underline underline-offset-3"
                                    target="_blank">Xem bản đồ</a>
                            @endif
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="relative z-10 w-full border hover:z-20 border-gray-150 hover:border-blue-200 js-collapse">
                <div
                    class="relative w-full py-3 pl-2 sm:pl-4 pr-[30px] sm:pr-[54px] text-[18px] js-collapse-title cursor-pointer">
                    @foreach ($LocalMap as $val)
                        @if ($val->Description == 'ten_7')
                            {{ $val->Value }}
                        @endif
                    @endforeach
                    <button class="absolute right-0 top-0 sm:w-[54px] w-[30px] h-[54px] z-0">+</button>
                </div>
                <div
                    class="relative px-2 sm:flex sm:px-4 py-4 text-base min-h-[120px] transition-all js-collapse-content border-t border-gray-150">
                    <div class="sm:flex-grow sm:pr-4">
                        @foreach ($LocalMap as $val)
                            @if ($val->Description == 'diachi_7')
                                {!! html_entity_decode($val->Value) !!}
                            @endif
                        @endforeach
                    </div>
                    @foreach ($LocalMap as $val)
                        @if ($val->Description == 'map_7')
                            @if ($val->Value == null)
                                <a href="#" class="text-blue-200 underline underline-offset-3" target="_blank">Xem bản
                                    đồ</a>
                            @else
                                <a href="{{ $val->Value }}" class="text-blue-200 underline underline-offset-3"
                                    target="_blank">Xem bản đồ</a>
                            @endif
                        @endif
                    @endforeach
                </div>
            </div> --}}
        </div>
        {{-- <img class="w-full mt-8 lg:mt-0" src="/assets/he_thong_benh_vien.3bf09191.jpg" --}}
        @foreach ($LocalMap as $val)
            @if ($val->Description == 'image_HTBV' && $val->IsPublic == true && $val->Value != null)
                {{-- {!! html_entity_decode($val->Value) !!} --}}
                <img class="w-full mt-8 lg:mt-0" src="{{$val->Value}}" alt="hệ thống bệnh viện thú y petpro">
            @endif
        @endforeach   
    </div>
@endif
