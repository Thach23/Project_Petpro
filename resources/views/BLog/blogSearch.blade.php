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
                <a class="text-gray-250 item">Kiến thức</a>
                <h1 class="text-blue-200 text-4xl md:text-[42px] capitalize leading-tight">Kết quả tìm kiếm</h1>
            </div>
        </div>
        </div>

        <!-- quảng cáo -->
        @include('Partital_Share.QuangCaoPartial')

        <!-- search blog -->
        <div class="container mx-auto pb-[85px] grid lg:grid-cols-8 lg:gap-6 grid-cols-1">
            <div class="lg:col-span-6">
                @include('Partital_Share.SearchBlogPartial',['key' => $key])
                <!-- kien thuc -->
                @if ($slugCategory != null)
                    <div
                        class="uppercase bg-blue-300 text-[20px] min-w-[180px] w-fit font-bold text-center rounded-[5px] text-white py-[11px] px-6 mb-11">
                        {{ $slugCategory }}
                    </div>
                @endif
                @if ($blogs == null || count($blogs) == 0)
                    <div class="container mx-auto text-center">Không có dữ liệu</div>
                @else
                    <div class="grid gap-6 gap-y-[54px] md:grid-cols-2 lg:grid-cols-3">
                        @foreach ($blogs as $val)
                            <div class="border border-gray-180 rounded-[5px] h-full flex flex-col">
                                <a href="{{ route('blogdetail', ['slug' => $val->Slug]) }}">
                                    @if ($val->BlogImage == null)
                                        <img class="w-full rounded-t-[5px] flex-shrink-0" src="/assets/no-image-icon.jpg"
                                            alt="{{ $val->Title }}">
                                    @else
                                        <img class="w-full rounded-t-[5px] flex-shrink-0" src="{{ $val->BlogImage }}"
                                            alt="{{ $val->Title }}">
                                    @endif
                                </a>
                                <div class="relative h-full px-[25px] pb-[25px] flex flex-col">
                                    <div
                                        class="absolute left-[26px] text-center text-white p-[9px] transform -translate-y-1/2 bg-blue-200 uppercase text-[14px] font-bold">
                                        <div>{{ $val->day }}</div>
                                        <div class="text-month">{{ substr($val->month, 0, 3) }}
                                            </p>
                                        </div>
                                    </div>
                                    <a href="{{ route('blogdetail', ['slug' => $val->Slug]) }}">
                                        <div class="mx-height text-[18px] maxline-3 font-bold pt-10 flex-1">
                                            {{ $val->Title }}
                                        </div>
                                    </a>
                                    <div class="text-[14px] flex-shrink-0 maxline-3"
                                        style="height: 63px; max-height: 63px;">{{ $val->Description }}</div>
                                    <div class="flex-shrink-0 pt-3 text-center">
                                        <a class="text-[14px] underline underline-offset-[4px] text-blue-150"
                                            href="{{ route('blogdetail', ['slug' => $val->Slug]) }}">Đọc
                                            Thêm</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif




                <!-- pagination -->
                <div class="pagination text-center pt-[34px]">
                    {{ $blogs->links() }}
                </div>

            </div>

            @include('Partital_Share.RightMenuBlogPartial')
        </div>

    </main>

    <!-- booking -->
    <div class="relative w-full overflow-hidden bg-white">
        <div class="relative w-[830px] max-w-full pb-[45px] px-4 block mx-auto">
            <img class="w-full" src="/assets/pets.a13ce774.jpg" alt="Thú cưng Pet Pro">
            <div class="text-center pb-[25px]">
                <h2 class="text-[48px] text-blue-200 leading-[55px] md:leading-[72px] capitalize">Đặt lịch hẹn</h2>
                <img class="block mx-auto mt-3" src="/assets/icon-foot.2549ce2f.svg" alt="Câu Chuyện Về PetPro">
            </div>
            @include('Partital_Share.BookingPartial', ['dsChuyenKhoa' => $dsChuyenKhoa])
        </div>
    </div>
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
