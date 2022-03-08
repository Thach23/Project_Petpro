@if ($newProduct != null || count($newProduct) > 0)
    <div class="relative">
        <h3 class="uppercase text-center text-blue-600 text-[35px] leading-none mb-10">Sản phẩm mới</h3>
        <div id="newProductsCarousel" class="w-full px-8 swiper">
            <div class="swiper-wrapper">
                @foreach ($newProduct as $val)
                    <div class="swiper-slide">
                        <a href="{{ route('shopdetail', ['slug' => $val->Slug]) }}">
                            @if ($val->ProductImage == null)
                                <a href="{{ route('shopdetail', ['slug' => $val->Slug]) }}"
                                    class="inline-block border border-gray-100">
                                    <img class="w-full " src="/assets/no-image-icon.jpg"
                                        alt="{{ $val->Name }}">
                                </a>
                                <div class="relative py-3">
                                    <p style="height: 48px" class="text-sm leading-6">
                                        {{ $val->Name }}
                                    </p>
                                    @php
                                        $price = $val->Price;
                                        $price = number_format($price, 0, '', '.');
                                    @endphp
                                    <p class="mt-5 text-[22px] font-bold tracking-wider">
                                        {{ $price }} đ
                                        {{-- <span
                                                class="text-[8px] font-semibold bg-orange text-white px-1 leading-[14px] inline-block relative top-[-4px]">Giảm
                                                5%</span> --}}
                                    </p>
                                </div>
                            @else
                                <a href="{{ route('shopdetail', ['slug' => $val->Slug]) }}"
                                    class="inline-block border border-gray-100">
                                    <img class="w-full " src="{{ $val->ProductImage }}"
                                        alt="{{ $val->Name }}">
                                </a>
                                <div class="relative py-3">
                                    <p style="height: 48px" class="text-sm leading-6">
                                        {{ $val->Name }}
                                    </p>
                                    @php
                                        $price = $val->Price;
                                        $price = number_format($price, 0, '', '.');
                                    @endphp
                                    <p class="mt-5 text-[22px] font-bold tracking-wider">
                                        {{ $price }} đ
                                        {{-- <span
                                                class="text-[8px] font-semibold bg-orange text-white px-1 leading-[14px] inline-block relative top-[-4px]">Giảm
                                                5%</span> --}}
                                    </p>
                                </div>
                            @endif
                        </a>

                    </div>
                @endforeach
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
@endif
