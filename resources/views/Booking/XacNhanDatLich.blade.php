@extends('_LayoutShare._layouthome',['Meta' => $Meta])

@section('content')
    <main>
        <!-- breadcrumb -->
        {{-- @foreach ($Meta['collection'] as $val)
            @if ($val->Description == 'breadcrumb' && $val->IsPublic == true && $val->Value != null)
                <div class="relative w-full bg-center bg-cover"
                    style="background-image: radial-gradient(197.33% 2625.24% at 0 60.68%,#fff 0,hsla(0,0%,100%,0) 100%),url('{{ $val->Value }}')">
            @endif
        @endforeach
        <div class="container mx-auto">
            <div class="py-10 text-sm md:text-lg">
                <a href="{{ route('home') }}" class="text-gray-400 item">Trang chủ</a>
                <span class="text-gray-350 px-[5px]">></span>
                <a href="{{ route('ShopCategory') }}" class="text-gray-400 item">Đặt lịch hẹn</a>
                <h2 class="text-blue-200 text-4xl md:text-[42px] capitalize leading-tight">Xác nhận đặt lịch hẹn
                </h2>
            </div>
        </div>
        </div> --}}

        <!-- noi dung chinh -->
        <div class="container mt-10 mx-auto pb-[85px]">
            <div>
                <div>
                    <div class="modal-body" tyle="border:none">
                        <div class="text-center">
                            <img class="w-[88px] h-[88px] block mx-auto" src="/assets/booking.d552112e.svg" alt="Booking">
                            <h1 class="mt-5 text-xl font-medium leading-6 text-blue-200">Xác Nhận Đặt Lịch Hẹn</h1>
                            <p class="mt-4 text-sm leading-[22px]">
                                Bạn đã gửi yêu cầu thành công!
                                <br>Chúng tôi sẽ liên hệ với bạn để xác nhận thông tin trong thời gian sớm nhất
                            </p>
                            <p class="inline-block mt-3 text-sm leading-5 text-blue-200">Hotline: 1800 5999 41</p>
                            <p class="mt-5">
                                <a href="{{ $url }}"
                                    class="inline-block py-3 text-lg leading-none text-white uppercase bg-blue-200 rounded-full px-18"
                                    aria-close href="javascript:void(0)">ok</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <!--Câu hỏi PetPro -->
            @include('Partital_Share.QNAPartial', ['QNA' => $QNA]) --}}
        </div>
    </main>
@endsection
