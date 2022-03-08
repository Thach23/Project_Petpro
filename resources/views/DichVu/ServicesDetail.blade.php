@extends('_LayoutShare._layouthome',['Meta' => $Meta])
@section('content')
    <main class="overflow-hidden">

        <!-- breadcrumb -->
        @if ($breadbcrumb->Value != null && $breadbcrumb->IsPublic == true)
            <div class="relative w-full bg-center bg-cover"
                style="background-image: radial-gradient(197.33% 2625.24% at 0 60.68%,#fff 0,hsla(0,0%,100%,0) 100%),url('{{ $breadbcrumb->Value }}')">
                <div class="container mx-auto">
                    <div class="py-10 text-sm md:text-lg">
                        <a href="{{ route('home') }}" zz class="text-gray-400 item">Trang chủ</a>
                        <span class="text-gray-350 px-[5px]">></span>
                        <a href="{{ route('DichVuBV') }}" class="text-gray-400 item">Dịch Vụ</a>
                        <span class="text-gray-350 px-[5px]">></span>
                        <span class="text-gray-250">{{ $blogsDetail->Title }}</span>
                        <h1 class="text-blue-200 text-4xl md:text-[42px] capitalize leading-tight">
                            {{ $blogsDetail->Title }}
                        </h1>
                    </div>
                </div>
            </div>
        @else
            <div class="relative w-full bg-center bg-cover">
                <div class="container mx-auto">
                    <div class="py-10 text-sm md:text-lg">
                        <a href="{{ route('home') }}" class="text-gray-400 item">Trang chủ</a>
                        <span class="text-gray-350 px-[5px]">></span>
                        <a href="{{ route('CauChuyenPetPro') }}" class="text-gray-400 item">Dịch Vụ</a>
                        <span class="text-gray-350 px-[5px]">></span>
                        <span class="text-gray-250">{{ $blogsDetail->Title }}</span>
                        <h2 class="text-blue-200 text-4xl md:text-[42px] capitalize leading-tight">
                            {{ $blogsDetail->Title }}
                        </h2>
                    </div>
                </div>
            </div>
        @endif


        <!-- content -->
        <div class="container flex flex-col mx-auto md:flex-row mt-14">
            {{-- @if ($blogsDetail->BlogCategoryId == 16)
                
            @else
                <div class="sidebar w-full md:w-[260px] md:min-w-[260px] max-w-[260px]">
                    <ul class="w-full p-0 m-0 overflow-hidden rounded tracking-[0.05em]">
                        <li class="text-lg font-bold leading-5 text-white px-6 py-[14px] bg-blue-600">Dịch Vụ Khác</li>
                        @foreach ($dsDichVu as $val)
                            <li
                                class="text-lg leading-5 text-gray-600 px-6 py-[14px] border border-t-0 border-gray-450 hover:text-blue-600">
                                <a href="{{ route('dichvuGroup', ['slug' => $val->Slug]) }}">{{ $val->Title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}
            <div class="sidebar w-full md:w-[260px] md:min-w-[260px] max-w-260">
                <ul class="w-full p-0 m-0 overflow-hidden rounded tracking-[0.05em]">
                    <li class="text-lg font-bold leading-5 text-white px-6 py-[14px] bg-blue-600">Chuyên Khoa Khác</li>
                    @foreach ($dsChuyenKhoa as $val)
                        <li
                            class="text-lg leading-5 text-gray-600 px-6 py-[14px] border border-t-0 border-gray-450 hover:text-blue-600">
                            <a href="{{ route('chuyenkhoaGroup', ['slug' => $val->Slug]) }}">{{ $val->Title }}</a>
                        </li>
                    @endforeach
                </ul>

                <ul class="w-full p-0 m-0 overflow-hidden rounded tracking-[0.05em] mt-5">
                    <li class="text-lg font-bold leading-5 text-white px-6 py-[14px] bg-blue-600">Dịch Vụ Khác</li>
                    @foreach ($dsDichVu as $val)
                        <li
                            class="text-lg leading-5 text-gray-600 px-6 py-[14px] border border-t-0 border-gray-450 hover:text-blue-600">
                            <a href="{{ route('dichvuGroup', ['slug' => $val->Slug]) }}">{{ $val->Title }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>


            <div class="pl-0 mt-12 md:pl-12 content md:mt-0">
                <img class="w-full" src="{{ $blogsDetail->BlogImage }}" alt="{{ $blogsDetail->Description }}">
                <h3 class="my-6 text-3xl text-blue-200 uppercase md:text-4xl lg:text-5xl">
                    {{-- {{ $blogsDetail->Title }} --}}
                    {{ $blogsDetail->Description }}
                </h3>
                {{-- <h5 class="text-xl text-gray-600 md:text-2xl">{{ $blogsDetail->Description }}</h5> --}}
                @if ($blogsDetail->Content == null)
                    <p></p>
                @else
                    {{-- <p class="text-gray-600 text-[16px] leading-7 mt-4">{!! html_entity_decode($blogsDetail->Content) !!}</p> --}}
                    {!! html_entity_decode($blogsDetail->Content) !!}
                @endif

                <div class="grid grid-cols-2 mt-10 lg:grid-cols-4">
                    <div class="flex py-[15px]">
                        <img class="mr-[12px] h-[25px] w-[25px]"
                            src="data:image/jpeg;base64,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">
                        <span>Tổ chức nhân sự</span>
                    </div>
                    <div class="flex py-[15px]">
                        <img class="mr-[12px] h-[25px] w-[25px]"
                            src="data:image/jpeg;base64,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">
                        <span>Trình độ chuyên môn</span>
                    </div>
                    <div class="flex py-[15px]">
                        <img class="mr-[12px] h-[25px] w-[25px]"
                            src="data:image/jpeg;base64,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">
                        <span>Hoạt động y khoa</span>
                    </div>
                    <div class="flex py-[15px]">
                        <img class="mr-[12px] h-[25px] w-[25px]"
                            src="data:image/jpeg;base64,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">
                        <span>Cơ sở vật chất</span>
                    </div>
                </div>

                @if ($blogsDetail->Link != null)
                    <div class="relative mt-9">
                        <img class="relative invisible w-full opacity-0" src="/assets/poster.23fec723.jpg"
                            alt="Câu Chuyện Petpro">
                        <iframe class="absolute top-0 left-0 w-full h-full" width="100%" height="100%"
                            src="{{ $blogsDetail->Link }}" title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen>
                        </iframe>
                    </div>
                @endif
            </div>
        </div>

        <!-- content 2 -->
        <div class="container flex flex-col mx-auto md:flex-row mt-14">
            <div class="sidebar w-full md:w-[260px] md:min-w-[260px] max-w-[260px]">
                <!----------------------------------------------->
            </div>
            <div class="pl-0 mt-12 md:pl-12 content md:mt-0">
                @if ($blogsDetail->ContentTwo == null)
                    <p></p>
                @else
                    <p class="text-gray-600 text-[16px] leading-7 mt-4">{!! html_entity_decode($blogsDetail->ContentTwo) !!}</p>
                @endif
                {{-- <p class="text-gray-600 text-[16px] leading-7 mt-4">{!! html_entity_decode($blogsDetail->ContentTwo) !!}</p> --}}
            </div>
        </div>

        <!-- banner -->

        @include('Partital_Share.QuangCaoPartial')

        <!-- tin tức chuyên khoa  -->
        @if ($blogs != null || count($blogs) > 0)
            <div class="relative pt-2 pb-[50px] bg-cover">
                <div class="text-center">
                    <h2 class="text-[48px] text-center text-blue-200 leading-[55px] md:leading-[72px] capitalize">tin tức
                        chuyên
                        khoa</h2>
                    <img class="block mx-auto mt-3" src="/assets/icon-foot.48e78dce.svg" alt="kiến thức">
                </div>

                <!-- tin tuc -->
                @include('Partital_Share.TinTucPartial', ['blogs' => $blogs])
            </div>
        @endif

        <!-- booking & FAQ-->
        @include(
            'Partital_Share.AboutPartial',
            ['dsChuyenKhoa' => $allServices],
            ['QNA' => $QNA]
        )
    </main>
@endsection
