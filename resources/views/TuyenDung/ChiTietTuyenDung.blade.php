@extends('_LayoutShare._layouthome',['Meta' => $Meta])

@section('content')
    @if ($blogs == null)
        <div style="text-align: center"><b style="font-size:25px; text-align :center;">Không tìm thấy dữ liệu</b></div>
    @else
        <main>

            <!-- breadcrumb -->
            <div class="relative w-full bg-center bg-cover bg-kien-thuc-thu-cung">
                <div class="container mx-auto">
                    <div class="py-10 text-sm md:text-lg">
                        <a href="{{ route('home') }}" class="text-gray-400 item">Trang chủ</a>
                        <span class="text-gray-350 px-[5px]">></span>
                        <a href="{{ route('KienThucCategory') }}" class="text-gray-400 item">Tuyển dụng</a>
                        <span class="text-gray-350 px-[5px]">></span>
                        <a class="text-gray-250 item">Thông tin tuyển dụng</a>
                        <h1 class="text-blue-200 text-4xl md:text-[42px] capitalize leading-tight">
                            Thông tin tuyển dụng
                        </h1>
                    </div>
                </div>
            </div>

            <!-- quảng cáo -->
            @include('Partital_Share.QuangCaoPartial')

            <!-- search blog -->
            <div class="container mx-auto pb-[85px] grid lg:grid-cols-8 lg:gap-6">
                <div class="lg:col-span-7">

                    <!-- blog detail -->
                    @if ($blogs == null)
                        <div class="container mx-auto text-center">Không có dữ liệu</div>
                    @else
                        <div class="">

                            <h1 class="text-[40px] font-bold mb-[28px]">{{ $blogs->Title }}</h1>
                            <p class="text-[14px] mb-[22px]">{{ $blogs->DateCreated }}</p>
                            @if ($blogs->Temp_2 == null)
                                <div class="w-full drop-shadow-[0_5px_10px_rgba(0,0,0,0.5)]">
                                    <img class="w-full rounded-[5px]" src="/assets/no-image-icon.jpg"
                                        style="width: 1047px; height:498px;" alt="{{ $blogs->Title }}">
                                </div>
                            @else
                                <div class="w-full drop-shadow-[0_5px_10px_rgba(0,0,0,0.5)]">
                                    <img class="w-full rounded-[5px]" src="{{ $blogs->Temp_2 }}"
                                        alt="{{ $blogs->Title }}">
                                </div>
                            @endif

                            <div class="flex items-center mt-[20px] mb-[26px]">
                                <img class="rounded-full w-[42px] h-[42px] mr-[14px]" src="/assets/logo.784179a7.svg">
                                <label class="capitalize">Admin PetPro</label>
                            </div>
                            <h4 class="text-[20px] leading-[34px] font-medium text-gray-370 pb-[26px]">
                                {{ $blogs->Description }}</h4>
                            <div class="paragraph-content">
                                @if ($blogs->Content != null)
                                    {!! html_entity_decode($blogs->Content) !!}
                                @else
                                    <p>Không có dữ liệu</p>
                                @endif
                            </div>

                            @include('Partital_Share.QuangCao2Partial')

                            <!-- bài viết liên quan -->
                            <div class="mb-[36px]">
                                <div class="text-[18px] font-bold leading-[60px] mb-[6px]">Bài tuyển dụng mới nhất</div>
                                @if ($blogs_Lienquan == null || count($blogs_Lienquan) == 0)
                                    <p>Không có dữ liệu</p>
                                @else
                                    <div class="grid gap-[30px] lg:grid-cols-3">
                                        @foreach ($blogs_Lienquan as $val)
                                            <a href="{{ route('ChiTietTuyenDung', ['id' => $val->Temp_1]) }}">
                                                @if ($val->Temp_2 == null)
                                                    <img class="mb-[20px] rounded-[5px] drop-shadow-[0_5px_10px_rgba(0,0,0,0.5)] img-blog-relate"
                                                        src="/assets/no-image-icon.jpg" alt="{{ $val->Title }}">
                                                @else
                                                    <img class="mb-[20px] rounded-[5px] drop-shadow-[0_5px_10px_rgba(0,0,0,0.5)] img-blog-relate"
                                                        src="{{ $val->Temp_2 }}" alt="{{ $val->Title }}">
                                                @endif

                                                <div class="text-[14px] font-bold capitalize maxline-3">{{ $val->Title }}
                                                </div>
                                            </a>
                                        @endforeach
                                    </div>
                                @endif

                            </div>
                        </div>
                    @endif
                </div>
        </main>
    @endif
@endsection
