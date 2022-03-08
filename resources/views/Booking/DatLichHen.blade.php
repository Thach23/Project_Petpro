@extends('_LayoutShare._layouthome',['Meta' => $Meta])

@section('content')
    <main>

        <!-- breadcrumb -->
        <div class="relative w-full bg-center" style="background: white;">
            <div class="container mx-auto">
                <div class="py-10 text-sm md:text-lg">
                    <a href="{{ route('home') }}" class="text-gray-400 item">Trang chủ</a>
                    <span class="text-gray-350 px-[5px]">></span>
                    {{-- <a href="{{ route('CauChuyenPetPro') }}" class="text-gray-250">Liên hệ</a>
                    <span class="text-gray-350 px-[5px]">></span> --}}
                    <span class="text-gray-250">Đặt lịch hẹn</span>
                    {{-- <h2 class="text-blue-200 text-4xl md:text-[42px] capitalize leading-tight">Đặt lịch hẹn</h2> --}}
                </div>
            </div>
        </div>

        @include('Partital_Share.HotLinePartial')

        {{-- <!-- booking form -->
    

        <!-- clinics -->
        @include('Partital_Share.LocalPartial') --}}
        <!-- booking form -->
        <div class="container mx-auto pt-[30px] sm:pt-[50px] xl:pt-15">
            <div class="grid grid-cols-1 lg:grid-cols-10 lg:gap-5">
                <div class="relative w-full lg:col-span-7 py-7 lg:py-12 2xl:py-18">
                    <h1 class="text-[28px] sm:text-[56px] text-blue-200 capitalize sm:pb-[20px] pb-[15px] md:pl-16">đặt lịch
                        hẹn</h1>
                    <img class="absolute -top-[24px] right-0 w-[160px] sm:w-[227px] lg:right-[64px] lg:-top-1 xl:w-[280px] xl:right-20 xl:-top-10 2xl:-top-4"
                        src="/assets/booking_pet.fcf232f8.png" alt="Đặt lịch hẹn PetPro">
                    <div
                        class="max-w-full pb-10 pt-[50px] sm:pt-[70px] px-4 md:px-16 block mx-auto bg-chan-xuong bg-cover bg-blue-600 rounded-[12px] md:rounded-[64px]">
                        @include('Partital_Share.BookingPartial', [
                            'dsChuyenKhoa' => $dsChuyenKhoa,
                        ])
                    </div>
                </div>
                <div class="mr-cus flex items-center justify-center lg:col-span-3 lg:pt-[104px]">
                    <div class="pr-cus pt-8">
                        <h3 class="pb-6 text-blue-200 capitalize text-[28px] sm:text-5xl text-center">giờ làm việc</h3>
                        <div class="grid grid-cols-2 px-[34px] text-2xl font-medium w-[360px]">
                            <div class="text-blue-200">
                                <p class="pb-5">Thứ Hai</p>
                                <p class="pb-5">Thứ Ba</p>
                                <p class="pb-5">Thứ Tư</p>
                                <p class="pb-5">Thứ Năm</p>
                                <p class="pb-5">Thứ Sáu</p>
                                <p class="pb-5">Thứ Bảy</p>
                                <p class="pb-5">Chủ Nhật</p>
                            </div>
                            <div class="text-right">
                                <p class="pb-5 whitespace-nowrap">8h00 - 20h00</p>
                                <p class="pb-5 whitespace-nowrap">8h00 - 20h00</p>
                                <p class="pb-5 whitespace-nowrap">8h00 - 20h00</p>
                                <p class="pb-5 whitespace-nowrap">8h00 - 20h00</p>
                                <p class="pb-5 whitespace-nowrap">8h00 - 20h00</p>
                                <p class="pb-5 whitespace-nowrap">8h00 - 20h00</p>
                                <p class="pb-5 whitespace-nowrap">8h00 - 19h00</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- hệ thống bệnh viện -->
        <div class="container mx-auto pt-10 pb-[70px]">
            <div class="mb-8 text-center">
                <h2 class="text-[28px] sm:text-5xl text-center text-blue-200 leading-[55px] md:leading-[72px] capitalize">hệ
                    thống bệnh viện thú y PetPro
                </h2>
                <img class="block mx-auto mt-3" src="/assets/icon-foot.48e78dce.svg" alt="">
            </div>
            @include('Partital_Share.LocalPartial', ['LocalMap' => $LocalMap])
        </div>
    </main>
    {{-- <script type="module" crossorigin src="/assets/collapse.54d613f4.js"></script> --}}
    <script type="module" crossorigin src="/assets/collapse.6f9ad156.js"></script>
    <script>
        $(document).ready(
            function changeClass() {
                // let url = document.URL;
                // if (url.includes("dat-lich-hen") == false) {

                // }
                var elem = document.getElementById("btnSend");

                elem.style.borderColor = "#FFFFFF";
                elem.style.color = "#FFFFFF";
            }
        );
    </script>
@endsection
