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
                <span class="text-gray-250">Tuyển dụng</span>
                <h1 class="text-blue-200 text-4xl md:text-[42px] capitalize leading-tight">Tuyển dụng</h1>
            </div>
        </div>
        </div>


        <div class="container mx-auto">
            <!-- why choose us -->
            <div class="py-10 md:py-20">
                <div class="text-center">
                    <h2
                        class="md:text-[48px] text-[36px] text-center text-blue-200 leading-[55px] md:leading-[72px] capitalize">
                        vì sao bạn nên tham gia?</h2>
                </div>
                <div class="grid grid-cols-2 gap-6 mt-12 lg:grid-cols-3 lg:gap-14">
                    <div class="flex flex-col items-center justify-center">
                        <img class="w-[56px]" src="/assets/dolar.svg" alt="Chế độ lương thưởng hấp dẫn">
                        <p class="text-[16px] leading-[28px] mt-6 text-center">Chế độ lương thưởng hấp dẫn</p>
                    </div>
                    <div class="flex flex-col items-center justify-center">
                        <img src="/assets/hand.svg" alt="Được dào tạo chuyên nghiệp và bài bản">
                        <p class="text-[16px] leading-[28px] mt-6 text-center">Được đào tạo chuyên nghiệp và bài bản</p>
                    </div>
                    <div class="flex flex-col items-center justify-center">
                        <img src="/assets/pig.svg" alt="có bảo hiểm cho chú cưng">
                        <p class="text-[16px] leading-[28px] mt-6 text-center">Có bảo hiểm cho chú cưng</p>
                    </div>
                    <div class="flex flex-col items-center justify-top">
                        <img src="/assets/fish-cooked.04b9963f.svg" alt="Du lịch các kỳ lễ">
                        <p class="text-[16px] leading-[28px] mt-6 text-center">Du lịch các kỳ lễ</p>
                    </div>
                    <div class="flex flex-col items-center justify-center">
                        <img src="/assets/dog.svg" alt="Tiếp xúc môi trường chuyên nghiệp">
                        <p class="text-[16px] leading-[28px] mt-6 text-center">Tiếp xúc môi trường chuyên nghiệp</p>
                    </div>
                    <div class="flex flex-col items-center justify-top">
                        <img src="/assets/baohiem.svg" alt="Bảo hiểm cá nhân">
                        <p class="text-[16px] leading-[28px] mt-6 text-center">Bảo hiểm cá nhân</p>
                    </div>
                </div>
            </div>
            <!-- staff -->
            <div class="py-10 md:py-20">
                <div class="text-center">
                    <h2
                        class="md:text-[48px] text-[36px] text-center text-blue-200 leading-[55px] md:leading-[72px] capitalize">
                        Đội ngũ
                        của chúng tôi</h2>
                </div>
                <div class="relative mt-10">
                    <div id="careerCarousel" class="relative swiper">
                        <div class="swiper-wrapper">
                            @if ($slideBanner == null || count($slideBanner) == 0)
                                <div class="relative swiper-slide">
                                    <img class="relative z-0 w-full" src="/assets/slide1.2bba631c.jpg"
                                        alt="Đội ngũ Pet Pro">
                                </div>
                                <div class="relative swiper-slide">
                                    <img class="relative z-0 w-full" src="/assets/slide2.36d8f7c2.jpg"
                                        alt="Đội ngũ Pet Pro">
                                </div>
                                <div class="relative swiper-slide">
                                    <img class="relative z-0 w-full" src="/assets/slide3.3ec67632.jpg"
                                        alt="Đội ngũ Pet Pro">
                                </div>
                            @else
                                @foreach ($slideBanner as $val)
                                    @if ($val->IsPublic == true && $val->Value != null)
                                        <div class="relative swiper-slide">
                                            <img class="relative z-0 w-full" src="{{ $val->Value }}"
                                                alt="Đội ngũ Pet Pro">
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                        <div class="relative mt-6 swiper-pagination"></div>
                    </div>
                    <div class="career-navigation swiper-button-next"></div>
                    <div class="career-navigation swiper-button-prev"></div>
                </div>
            </div>

            <!-- jobs -->
            <div class="pt-0 pb-10">
                <div class="text-center">
                    <h2
                        class="md:text-[48px] text-[36px] text-center text-blue-200 leading-[55px] md:leading-[72px] capitalize">
                        Vị trí khả dụng
                    </h2>
                    <img class="block mx-auto mt-3" src="/assets/icon-foot.48e78dce.svg" alt="Câu Chuyện Về PetPro">
                    <p class="mt-5 text-[16px] leading-loose">Bên dưới là vị trí ứng tuyển mà PetPro đang cần!</p>
                </div>
                <div class="flex flex-col items-center justify-center mt-10 md:flex-row">
                    @if ($Phongban == null || count($Phongban) == 0)
                        <select name="phongban" id="phongban" required onchange="changeSelect(this)"
                            class="border border-gray-200 h-[44px] px-3 w-[280px] rounded">
                            <option value="">Không có dữ liệu</option>
                        </select>
                    @else
                        <select name="phong_ban" id="phong_ban" required
                            class="border border-gray-200 h-[44px] px-3 w-[280px] rounded">
                            <option value="-1">Chọn phòng ban</option>
                            @foreach ($Phongban as $val)
                                <option value="{{ $val->Id }}">{{ $val->Name }}</option>
                            @endforeach
                        </select>
                    @endif

                    @if ($Diadiem == null || count($Diadiem) == 0)
                        <select name="noilamviec" id="noilamviec" required
                            class="ml-0 md:ml-6 mt-6 md:mt-0 border border-gray-200 h-[44px] px-3 w-[280px] rounded">
                            <option value="">Không có dữ liệu</option>
                        </select>
                    @else
                        <select name="noi_lam_viec" id="noi_lam_viec" required
                            class="ml-0 md:ml-6 mt-6 md:mt-0 border border-gray-200 h-[44px] px-3 w-[280px] rounded">
                            <option value="-1">Chọn địa điểm</option>
                            @foreach ($Diadiem as $val)
                                <option value="{{ $val->Id }}">{{ $val->Address }}</option>
                            @endforeach
                        </select>
                    @endif
                </div>

                {{-- @include('Partital_Share.RecruitPartial') --}}
                <div class="mx-auto mt-6 border border-gray-200 rounded-lg max-w-[792px]" id="contentRecruit">
                    <!--Danh sach bai viet tuyen dung -->
                </div>
            </div>
        </div>
    </main>
    {{-- <script type="module" crossorigin src="/assets/career.b044c2d0.js"></script> --}}
    {{-- <script type="module" crossorigin src="/assets/career.a81a9f19.js"></script> --}}
    <script type="module" crossorigin src="/assets/career.58ba098a.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>
    <script>
        $(document).ready(
            function getRecruit() {
                $.ajax({
                    type: 'POST',
                    url: "{{ route('loadrecruit') }}",
                    datatype: 'json',
                    data: {
                        '_token': "{{ csrf_token() }}",
                        'key': -1,
                        // 'category': null,
                    },
                    success: function(data) {

                        if (data.code === 200) {
                            $("#contentRecruit").html(data.recruitpartial);
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert('Failed to load recruits.');
                    }
                });
            }
        );

        $(function() {
            $("#phong_ban").change(function() {
                // var selectedText = $(this).find("option:selected").text();
                var selectedValue = $(this).val();

                $.ajax({
                    type: 'POST',
                    url: "{{ route('loadrecruit') }}",
                    datatype: 'json',
                    data: {
                        '_token': "{{ csrf_token() }}",
                        'key': selectedValue + "-pb",
                        // 'category': category,
                    },
                    success: function(data) {

                        if (data.code === 200) {
                            $("#contentRecruit").html(data.recruitpartial);
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert('Failed to load recruits.');
                    }
                });
            });
        });

        $(function() {

            $("#noi_lam_viec").change(function() {
                var selectedValue = $(this).val();

                $.ajax({
                    type: 'POST',
                    url: "{{ route('loadrecruit') }}",
                    datatype: 'json',
                    data: {
                        '_token': "{{ csrf_token() }}",
                        'key': selectedValue + "-nlv",
                        // 'category': category,
                    },
                    success: function(data) {

                        if (data.code === 200) {
                            $("#contentRecruit").html(data.recruitpartial);
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert('Failed to load recruits.');
                    }
                });
            });
        });
    </script>
@endsection
