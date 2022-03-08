<div class="hidden lg:block lg:col-span-2">
    <div class="sticky top-[100px] z-40">
        <div
            class="filter-variant w-[285px] max-w-full h-[56px] text-blue-70 capitalize border border-blue-60 text-center leading-[54px] rounded-lg pl-[36px] font-bold mb-[10px]">
            chuyên mục</div>
        <ul class="pl-[14px]">
            <li>
                <a href="{{ route('ShopCategory') }}" class="flex py-4">
                    <i><img src="/assets/icon-chevron-right-blur.d3050433.svg"></i>
                    <span class="font-bold">Tất cả sản phẩm</span>
                </a>
                <ul class="pl-[8px]">
                    @if ($ProductCategories == null || count($ProductCategories) == 0)
                        <p>Không có dữ liệu</p>
                    @else
                        @foreach ($ProductCategories as $val)
                            <li>
                                <a href="{{ route('ShopHome', ['slug' => $val->Slug]) }}" class="flex py-4">
                                    <i><img src="/assets/icon-chevron-right.6e3b8966.svg"></i>
                                    <span class="hv">{{ $val->Name }}</span>
                                </a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </li>
        </ul>
        @if ($link->IsPublic == true && $image->IsPublic == true)
            <div class="hidden mt-[120px] lg:block">
                <a href="{{ $link->Value }}">
                    <img src="{{ $image->Value }}">
                </a>
            </div>
        @else
            @if ($image->IsPublic == true)
                @if ($link->IsPublic == false)
                    <img src="{{ $image->Value }}">
                @endif
            @endif
        @endif
    </div>
</div>
