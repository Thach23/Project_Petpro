@extends('_LayoutShare._layouthome',['Meta' => $Meta])

@section('content')
    <main>

        <!-- breadcrumb -->
        @foreach ($Meta['collection'] as $val)
            @if ($val->Description == 'breadcrumb' && $val->IsPublic == true && $val->Value != null)
                <div class="relative w-full bg-center bg-cover"
                    style="background-image: radial-gradient(197.33% 2625.24% at 0 60.68%,#fff 0,hsla(0,0%,100%,0) 100%),url('{{ $val->Value }}')">
            @endif
        @endforeach
        <div class="container mx-auto">
            <div class="py-10 text-sm md:text-lg">
                <a href="{{ route('home') }}" class="text-gray-400 item">Trang chủ</a>
                <span class="text-gray-350 px-[5px]">></span>
                <a class="text-gray-250 item">Shop</a>
                <h1 class="text-blue-200 text-4xl md:text-[42px] capitalize leading-tight">Shop</h1>
            </div>
        </div>
        </div>

        <!-- quảng cáo -->
        @include('Partital_Share.QuangCaoPartial')

        <!-- noi dung chinh -->
        <div class="container mt-10 mx-auto pb-[85px]">
            <div class="grid grid-cols-1 lg:grid-cols-8 lg:gap-6">
                <div class="col-span-full lg:col-span-6">
                    <!-- san pham moi -->
                    @include('Partital_Share.NewProdPartial')

                    <!--search -->
                    @include('Partital_Share.SearchShopPartial',['key' => $key])

                    <!-- kien thuc -->
                    @foreach ($ProductCategories as $item)
                        @php
                            $count = 0;
                            
                            foreach ($DsProDuct as $prod) {
                                if ($item->Id == $prod->ProductCategoryId) {
                                    $count++;
                                }
                            }
                        @endphp
                        <div
                            class="uppercase bg-blue-700 text-base w-fit font-bold text-center rounded-[5px] text-white py-[13px] px-6 mb-11 mt-[50px]">
                            <a href="{{ route('ShopHome', ['slug' => $item->Slug]) }}">
                                {{ $item->Name }}
                            </a>
                        </div>
                        @if ($DsProDuct == null || $count == 0)
                            <p>Không có dữ liệu</p>
                        @else
                            <div class="grid gap-6 gap-y-[54px] md:grid-cols-2 lg:grid-cols-3">
                                @foreach ($DsProDuct as $val)
                                    @if ($val->ProductCategoryId == $item->Id)
                                        <div
                                            class="border border-gray-750 rounded-[20px] h-full p-[15px] js-hover shop-item relative pb-20">
                                            <a href="{{ route('shopdetail', ['slug' => $val->Slug]) }}">
                                                @if ($val->ProductImage == null)
                                                    <img class="w-full rounded-[20px]" src="/assets/no-image-icon.jpg"
                                                        alt="{{ $val->Name }}">
                                                @else
                                                    <img class="w-full rounded-[20px]" src="{{ $val->ProductImage }}"
                                                        alt="{{ $val->Name }}">
                                                @endif

                                            </a>
                                            <div class="pt-5">
                                                <a href="{{ route('shopdetail', ['slug' => $val->Slug]) }}">
                                                    <div class="text-sm">{{ $val->Name }}</div>
                                                </a>
                                                <div
                                                    class="absolute left-0 flex items-center justify-between w-full px-[15px] bottom-6 mt-7">
                                                    <a href="{{ route('shopdetail', ['slug' => $val->Slug]) }}"
                                                        class="p-2 text-sm font-medium leading-none text-blue-800 uppercase border border-blue-800 rounded order">Xem
                                                        thêm</a>
                                                    @php
                                                        $price = $val->Price;
                                                        $price = number_format($price, 0, '', '.');
                                                    @endphp
                                                    <span id="price"
                                                        class="text-2xl font-bold leading-10 tracking-wider">{{ $price }}
                                                        đ</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        @endif
                    @endforeach
                </div>

                <!-- Menu phải -->
                @include('Partital_Share.RightMenuShopPartial')
            </div>

            @include('Partital_Share.LogoPartial')

            <!--Câu hỏi PetPro -->
            @include('Partital_Share.QNAPartial', ['QNA' => $QNA])
        </div>

    </main>
@endsection
