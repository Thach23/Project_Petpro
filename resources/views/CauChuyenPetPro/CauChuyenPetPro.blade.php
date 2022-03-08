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
                <span class="text-gray-250">Câu chuyện PetPro</span>
                <h2 class="text-blue-200 text-4xl md:text-[42px] capitalize leading-tight">Câu chuyện PetPro</h2>
            </div>
        </div>
        </div>


        <!-- about -->
        <div class="container mx-auto">
            <div class="w-full pt-7">
                <div class="relative h-full mb-6 about-item">
                    <img class="relative invisible w-full opacity-0" src="/assets/poster.23fec723.jpg"
                        alt="Câu Chuyện Petpro">
                    @foreach ($Meta['collection'] as $val)
                        @if ($val->Description == 'link' && $val->IsPublic == true)
                            <iframe class="absolute top-0 left-0 w-full h-full" width="100%" height="100%"
                                src="{{ $val->Value }}" title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        @endif
                    @endforeach

                    <div class="absolute top-0 left-0 z-10 w-full h-full bg-black pointer-events-none bg-opacity-30"></div>
                </div>
            </div>
        </div>

        <!-- cau chuyen petpro -->
        <div class="container mx-auto pt-12 pb-[85px]">
            <div class="text-center">
                <h1 class="text-[48px] text-center text-blue-200 leading-[55px] md:leading-[72px] capitalize">Câu Chuyện Về
                    PetPro</h1>
                <img class="block mx-auto mt-3" src="/assets/icon-foot.2549ce2f.svg" alt="Câu Chuyện Về PetPro">
            </div>

            @include('Partital_Share.CauChuyenPetProPartial',['CauChuyenblogs' => $CauChuyenblogs])
        </div>

        <!-- booking & FAQ-->
        @include('Partital_Share.AboutPartial', ['dsChuyenKhoa' => $dsChuyenKhoa] , ['QNA'=> $QNA])



    </main>
@endsection
