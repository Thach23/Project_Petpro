@if ($blogs == null || count($blogs) == 0)
@else
    <!-- tin tức chuyên khoa  -->
    {{-- <div class="relative pt-2 pb-[50px] bg-cover">
        <div class="text-center">
            <h2 class="text-[48px] text-center text-blue-200 leading-[55px] md:leading-[72px] capitalize">tin tức chuyên
                khoa</h2>
            <img class="block mx-auto mt-3" src="/assets/icon-foot.48e78dce.svg" alt="kiến thức">
        </div> --}}
    <div class="flex justify-center pl-5 pr-0 mt-4 md:mt-8 lg:pr-5">
        <div id="knowledgeCarousel" class="inline-block swiper">
            <div class="swiper-wrapper">
                @foreach ($blogs as $val)
                    <div
                        class="relative overflow-hidden bg-white border rounded swiper-slide border-gray-550 max-w-[245px] md:max-w-[450px] lg:max-w-[386px]">
                        <a href="{{ route('blogdetail', ['slug' => $val->Slug]) }}">
                            <img class="w-full max-h-[256px] min-height" style="height: 100%;"
                                src="{{ $val->BlogImage }}" alt="{{ $val->Title }}">
                        </a>

                        <div class="relative px-4 pt-5 pb-5 md:pt-9">
                            <div
                                class="absolute top-0 flex items-center justify-center w-11 md:w-16 h-11 md:h-16 text-xs md:text-xl leading-4 md:leading-6 text-center text-white bg-blue-200 left-4 transform translate-y-[-70%] uppercase font-semibold py-2 px-2">
                                {{ $val->day }} {{ substr($val->month, 0, 3) }}</div>
                            <a href="{{ route('blogdetail', ['slug' => $val->Slug]) }}">
                                <div class="text-[18px] maxline-3 font-bold flex-1"
                                    style="height: 60px; max-height: 60px;">
                                    {{ $val->Title }} </div>
                            </a>
                            <p
                                class="bg-blue-200 text-[12px] inline-block text-white px-[10px] py-[5px] leading-none rounded-full">
                                {{ $val->BlogCategoryId }}
                            </p>
                            <div class="text-[14px] flex-shrink-0 maxline-3"
                                style="margin-top: 0.5rem; height: 63px; max-height: 63px;">
                                {{ $val->Description }}</div>
                            <div class="mt-4 text-center">
                                {{-- <a class="inline text-blue-200 text-xs md:text-[16px] capitalize border-b border-blue-200"
                                    href="#">đọc thêm</a> --}}
                                <a class="inline text-blue-200 text-xs md:text-[16px] capitalize border-b border-blue-200"
                                    href="{{ route('blogdetail', ['slug' => $val->Slug]) }}">đọc thêm</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    {{-- </div> --}}
@endif
