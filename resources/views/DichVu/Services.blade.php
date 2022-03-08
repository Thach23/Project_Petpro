@extends('_LayoutShare._layouthome',['Meta' => $Meta])

@section('content')
    <main class="overflow-hidden">

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
                <span class="text-gray-250">Dịch vụ</span>
                <h1 class="text-blue-200 text-4xl md:text-[42px] capitalize leading-tight">Dịch vụ bệnh viện</h1>
            </div>
        </div>
        </div>


        <!-- banner -->
        @include('Partital_Share.QuangCaoPartial')

        <!-- chuyen khoa -->
        <div class="container relative mx-auto">
            <div class="py-10 md:py-20 md:px-5">
                <div class="text-center">
                    <h2 class="text-[48px] text-center text-blue-200 leading-[55px] md:leading-[72px] capitalize">chuyên
                        khoa
                    </h2>
                    <img class="block mx-auto mt-3" src="/assets/icon-foot.2549ce2f.svg" alt="chuyên khoa">
                </div>

                @include('Partital_Share.ChuyenKhoaPartial' , ['ChuyenKhoablogs' => $ChuyenKhoablogs])
            </div>
        </div>
        <!-- dich vu cap cuu -->
        @include('Partital_Share.HotLinePartial')

        <!-- dich vu -->
        <div class="container relative mx-auto">
            <div class="py-10 md:py-20 md:px-5">
                <div class="text-center">
                    <h2 class="text-[48px] text-center text-blue-200 leading-[55px] md:leading-[72px] capitalize">dịch vụ
                    </h2>
                    <img class="block mx-auto mt-3" src="/assets/icon-foot.2549ce2f.svg" alt="dịch vụ">
                </div>
            </div>
            @include('Partital_Share.DichVuPartial', ['DichVublogs' => $DichVublogs])
        </div>
        </div>

        <!-- bao hiem thu cung -->
        <div class="container mx-auto px-5 pb-[200px] mt-10">
            <div class="title">
                <h2>bảo hiểm sức khỏe thú cưng</h2>
                <img src="/assets/icon-foot.48e78dce.svg" alt="dịch vụ">
            </div>
            <p class="max-w-3xl m-auto mt-6 text-base leading-7 text-center text-gray-150">
                Chó và mèo của Chủ Thú cưng đủ điều kiện để được chi trả bảo hiểm khi và chỉ khi các bé bị bệnh nặng hoặc
                gặp phải tai
                nạn bất ngờ trong thời gian sử dụng dịch vụ
            </p>
            <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2 xl:grid-cols-4">
                <div class="mt-4 border rounded-xl lg:mt-10 border-gray-650 js-hover baohiem">
                    <div class="flex flex-col items-center px-3 py-6">
                        @foreach ($baoHiem as $val)
                            @if ($val->Description == 'image_A1' && $val->IsPublic == true)
                                <img class="w-12 h-12" src="{{ $val->Value }}" alt="A1 Combo Basic">
                            @endif
                        @endforeach

                        @foreach ($baoHiem as $val)
                            @if ($val->Description == 'title_A1' && $val->IsPublic == true)
                                <h3 class="mt-3 text-2xl leading-9 text-blue-200">{{ $val->Value }}</h3>
                            @endif
                        @endforeach

                    </div>
                    <div class="px-4 pt-3 pb-5">
                        @foreach ($baoHiem as $val)
                            @if ($val->Description == 'content_A1' && $val->IsPublic == true)
                                {!! html_entity_decode($val->Value) !!}
                            @endif
                        @endforeach
                        <p class="mt-6 text-2xl font-medium leading-none text-center text-blue-200">
                            @foreach ($baoHiem as $val)
                                @if ($val->Description == 'price_A1' && $val->IsPublic == true)
                                    {{ $val->Value }}
                                @endif
                            @endforeach
                            <span class="text-[12px] font-normal relative -top-[5px]">VNĐ</span>
                            @foreach ($baoHiem as $val)
                                @if ($val->Description == 'year_A1' && $val->IsPublic == true)
                                    <span class="text-base font-normal">/{{ $val->Value }} năm</span>
                                @endif
                            @endforeach
                        </p>
                        <div class="mt-6 text-center">
                            @foreach ($baoHiem as $val)
                                @if ($val->Description == 'button_A1' && $val->IsPublic == true)
                                    @foreach ($baoHiem as $val_2)
                                        @if ($val_2->Description == 'link_A1')
                                            <a class="btn" href="{{ $val_2->Value }}">{{ $val->Value }}</a>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="mt-4 border rounded-xl lg:mt-10 border-gray-650 js-hover baohiem">
                    <div class="flex flex-col items-center px-3 py-6">
                        @foreach ($baoHiem as $val)
                            @if ($val->Description == 'image_A2' && $val->IsPublic == true)
                                <img class="w-12 h-12" src="{{ $val->Value }}" alt="A2 Combo Basic">
                            @endif
                        @endforeach

                        @foreach ($baoHiem as $val)
                            @if ($val->Description == 'title_A2' && $val->IsPublic == true)
                                <h3 class="mt-3 text-2xl leading-9 text-blue-200">{{ $val->Value }}</h3>
                            @endif
                        @endforeach

                    </div>
                    <div class="px-4 pt-3 pb-5">
                        @foreach ($baoHiem as $val)
                            @if ($val->Description == 'content_A2' && $val->IsPublic == true)
                                {!! html_entity_decode($val->Value) !!}
                            @endif
                        @endforeach
                        <p class="mt-6 text-2xl font-medium leading-none text-center text-blue-200">
                            @foreach ($baoHiem as $val)
                                @if ($val->Description == 'price_A2' && $val->IsPublic == true)
                                    {{ $val->Value }}
                                @endif
                            @endforeach
                            <span class="text-[12px] font-normal relative -top-[5px]">VNĐ</span>
                            @foreach ($baoHiem as $val)
                                @if ($val->Description == 'year_A2' && $val->IsPublic == true)
                                    <span class="text-base font-normal">/{{ $val->Value }} năm</span>
                                @endif
                            @endforeach
                        </p>
                        <div class="mt-6 text-center">
                            @foreach ($baoHiem as $val)
                                @if ($val->Description == 'button_A2' && $val->IsPublic == true)
                                    @foreach ($baoHiem as $val_2)
                                        @if ($val_2->Description == 'link_A2')
                                            <a class="btn" href="{{ $val_2->Value }}">{{ $val->Value }}</a>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="mt-4 border rounded-xl lg:mt-10 border-gray-650 js-hover baohiem">
                    <div class="flex flex-col items-center px-3 py-6">
                        @foreach ($baoHiem as $val)
                            @if ($val->Description == 'image_B1' && $val->IsPublic == true)
                                <img class="w-12 h-12" src="{{ $val->Value }}" alt="B1 Combo Luxury">
                            @endif
                        @endforeach

                        @foreach ($baoHiem as $val)
                            @if ($val->Description == 'title_B1' && $val->IsPublic == true)
                                <h3 class="mt-3 text-2xl leading-9 text-blue-200">{{ $val->Value }}</h3>
                            @endif
                        @endforeach

                    </div>
                    <div class="px-4 pt-3 pb-5">
                        @foreach ($baoHiem as $val)
                            @if ($val->Description == 'content_B1' && $val->IsPublic == true)
                                {!! html_entity_decode($val->Value) !!}
                            @endif
                        @endforeach
                        <p class="mt-6 text-2xl font-medium leading-none text-center text-blue-200">
                            @foreach ($baoHiem as $val)
                                @if ($val->Description == 'price_B1' && $val->IsPublic == true)
                                    {{ $val->Value }}
                                @endif
                            @endforeach
                            <span class="text-[12px] font-normal relative -top-[5px]">VNĐ</span>
                            @foreach ($baoHiem as $val)
                                @if ($val->Description == 'year_B1' && $val->IsPublic == true)
                                    <span class="text-base font-normal">/{{ $val->Value }} năm</span>
                                @endif
                            @endforeach
                        </p>
                        <div class="mt-6 text-center">
                            @foreach ($baoHiem as $val)
                                @if ($val->Description == 'button_B1' && $val->IsPublic == true)
                                    @foreach ($baoHiem as $val_2)
                                        @if ($val_2->Description == 'link_B1')
                                            <a class="btn" href="{{ $val_2->Value }}">{{ $val->Value }}</a>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="mt-4 border rounded-xl lg:mt-10 border-gray-650 js-hover baohiem">
                    <div class="flex flex-col items-center px-3 py-6">
                        @foreach ($baoHiem as $val)
                            @if ($val->Description == 'image_B2' && $val->IsPublic == true)
                                <img class="w-12 h-12" src="{{ $val->Value }}" alt="B2 Combo Luxury">
                            @endif
                        @endforeach

                        @foreach ($baoHiem as $val)
                            @if ($val->Description == 'title_B2' && $val->IsPublic == true)
                                <h3 class="mt-3 text-2xl leading-9 text-blue-200">{{ $val->Value }}</h3>
                            @endif
                        @endforeach

                    </div>
                    <div class="px-4 pt-3 pb-5">
                        @foreach ($baoHiem as $val)
                            @if ($val->Description == 'content_B2' && $val->IsPublic == true)
                                {!! html_entity_decode($val->Value) !!}
                            @endif
                        @endforeach
                        <p class="mt-6 text-2xl font-medium leading-none text-center text-blue-200">
                            @foreach ($baoHiem as $val)
                                @if ($val->Description == 'price_B2' && $val->IsPublic == true)
                                    {{ $val->Value }}
                                @endif
                            @endforeach
                            <span class="text-[12px] font-normal relative -top-[5px]">VNĐ</span>
                            @foreach ($baoHiem as $val)
                                @if ($val->Description == 'year_B2' && $val->IsPublic == true)
                                    <span class="text-base font-normal">/{{ $val->Value }} năm</span>
                                @endif
                            @endforeach
                        </p>
                        <div class="mt-6 text-center">
                            @foreach ($baoHiem as $val)
                                @if ($val->Description == 'button_B2' && $val->IsPublic == true)
                                    @foreach ($baoHiem as $val_2)
                                        @if ($val_2->Description == 'link_B2')
                                            <a class="btn" href="{{ $val_2->Value }}">{{ $val->Value }}</a>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- booking & FAQ-->
        @include('Partital_Share.AboutPartial',['dsChuyenKhoa' => $dsChuyenKhoa], ['QNA' => $QNA])
    </main>
@endsection
