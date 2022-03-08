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
                <a href="{{ route('CauChuyenPetPro') }}" class="text-gray-400 item">Câu Chuyện PetPro</a>
                <span class="text-gray-350 px-[5px]">></span>
                <span class="text-gray-250">Trang thiết bị</span>
                <h1 class="text-blue-200 text-4xl md:text-[42px] capitalize leading-tight">Trang thiết bị</h1>
            </div>
        </div>
        </div>


        <!-- equip -->
        <div class="container mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-9 gap-[24px] py-[34px] w-full pt-[34px]">
                <div class="lg:col-span-5">
                    @foreach ($data as $val)
                        @if ($val->Description == 'anh_1' && $val->IsPublic == true)
                            <img class="w-full" src="{{ $val->Value }}" alt="{{ substr($val->Name, 0, 20) }}">
                        @endif
                    @endforeach
                </div>
                <div class="flex items-center pb-5 lg:col-span-4 lg:pb-0">
                    <div class="lg:py-5">
                        @foreach ($data as $val)
                            @if ($val->Description == 'ten_1' && $val->IsPublic == true)
                                <h2 class="text-4xl mb-[15px] text-blue-200 capitalize">{{ $val->Value }}</h2>
                            @endif
                        @endforeach

                        @foreach ($data as $val)
                            @if ($val->Description == 'mota_1' && $val->IsPublic == true)
                                <p>{{ $val->Value }}</p>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-9 gap-[24px] pb-[34px] w-full">
                <div class="lg:col-span-5 lg:order-last">
                    @foreach ($data as $val)
                        @if ($val->Description == 'anh_2' && $val->IsPublic == true)
                            <img class="w-full" src="{{ $val->Value }}" alt="{{ substr($val->Name, 0, 20) }}">
                        @endif
                    @endforeach
                </div>
                <div class="flex items-center pb-5 lg:col-span-4 lg:pb-0">
                    <div class="lg:py-5">
                        @foreach ($data as $val)
                            @if ($val->Description == 'ten_2' && $val->IsPublic == true)
                                <h2 class="text-4xl mb-[15px] text-blue-200 capitalize">{{ $val->Value }}</h2>
                            @endif
                        @endforeach

                        @foreach ($data as $val)
                            @if ($val->Description == 'mota_2' && $val->IsPublic == true)
                                <p>{{ $val->Value }}</p>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-9 gap-[24px] pb-[34px] w-full">
                <div class="lg:col-span-5">
                    @foreach ($data as $val)
                        @if ($val->Description == 'anh_3' && $val->IsPublic == true)
                            <img class="w-full" src="{{ $val->Value }}" alt="{{ substr($val->Name, 0, 20) }}">
                        @endif
                    @endforeach
                </div>
                <div class="flex items-center pb-5 lg:col-span-4 lg:pb-0">
                    <div class="lg:py-5">
                        @foreach ($data as $val)
                            @if ($val->Description == 'ten_3' && $val->IsPublic == true)
                                <h2 class="text-4xl mb-[15px] text-blue-200 capitalize">{{ $val->Value }}</h2>
                            @endif
                        @endforeach

                        @foreach ($data as $val)
                            @if ($val->Description == 'mota_3' && $val->IsPublic == true)
                                <p>{{ $val->Value }}</p>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- booking & FAQ-->
        @include(
            'Partital_Share.AboutPartial',
            ['dsChuyenKhoa' => $dsChuyenKhoa],
            ['QNA' => $QNA]
        )
    </main>
@endsection
