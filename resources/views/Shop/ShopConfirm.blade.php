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
                <a href="{{ route('ShopCategory') }}" class="text-gray-400 item">Shop</a>
                <h1 class="text-blue-200 text-4xl md:text-[42px] capitalize leading-tight">Xác nhận đặt hàng
                </h1>
            </div>
        </div>
        </div>

        <!-- noi dung chinh -->
        <div class="container mt-10 mx-auto pb-[85px]">
            <!-- modal đặt hàng thành công -->
            <div>
                <div class="modal-content" style="border:none">
                    <div class="modal-heading" style="margin-left: auto; margin-right:auto;">
                        Cám ơn bạn đã đặt hàng thành công
                    </div>
                    <div class="modal-body">
                        {{-- <a href="javascript:void(0)" class="close" aria-close>
                            <img src="/assets/close.de495574.svg" alt="close">
                        </a> --}}
                        <div class="text-center">
                            <img class="w-[110px] h-[110px] block mx-auto" src="/assets/shopping-cart.7aed384c.svg" alt="">
                            <h3 class="mt-5 text-xl leading-6 text-blue-200">Đặt hàng thành công !</h3>
                            <p class="mt-4 text-sm leading-[22px]">Cám ơn bạn đã tin tưởng chúng tôi
                                <br>Chúng tôi sẽ liên hệ với bạn để xác nhận đơn hàng trong thời gian sớm nhất
                            </p>
                            <p
                                class="inline-block px-2 py-1 mt-5 text-sm leading-5 text-blue-200 border border-blue-200 rounded">
                                Hotline: 1800 5999 41</p>
                        </div>
                    </div>
                </div>
            </div>

            @include('Partital_Share.LogoPartial')

            <!--Câu hỏi PetPro -->
            @include('Partital_Share.QNAPartial', ['QNA' => $QNA])
        </div>
    </main>
@endsection
