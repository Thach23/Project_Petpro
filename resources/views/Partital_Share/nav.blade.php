<div class="sticky top-0 left-0 z-50 w-full bg-white shadow-menu">
    <div class="container-menu flex justify-between w-full h-full px-4 m-auto md:max-w-full xl:max-w-[1280px]">
        <div class="relative flex items-center lg:justify-between justify-end w-full h-full min-h-[64px]">
            <a id="btnMenuMobile"
                class="md:hidden cus-hidden absolute cursor-pointer top-1/2 transform -translate-y-[50%] left-0">
                <img src="/assets/btn_show_menu.f9a27e57.svg" alt="Mobile Button">
            </a>
            <a href="{{ route('home') }}"
                class="absolute lg:relative lg:transform-none lg:left-0 top-1/2 transform -translate-y-[50%] w-16 left-1/2 -translate-x-1/2">
                <img src="/assets/logo.061b39cb.svg" width="65px" height="65px" alt="Logo Pet Pro">
            </a>
            <ul id="menuTop"
                class="fontsize-cus hidden lg:top-0 absolute z-20 left-0 top-16 h-[100vh] max-h-[100vh] w-[calc(100%+32px)] -ml-4 lg:relative lg:w-full lg:-ml-0 lg:flex lg:max-h-full items-center lg:justify-around flex-1 lg:h-full lg:px-10 menu  lg:pt-0">
                <!--text-[16px]-->
                <li class="w-full h-3 bg-gradient-to-b from-gray-270 to-white md:hidden"></li>
                <li
                    class="li-cus relative bg-white lg:flex lg:items-center lg:text-center lg:px-3 lg:h-full lg:py-7 menu-item js-menu-item">
                    <a href="{{ route('home') }}"
                        class="relative block w-full px-4 py-3 font-normal text-blue-200 capitalize transition-colors lg:w-auto lg:px-0 lg:py-0 focus:text-blue-300 hover:text-blue-300">Trang
                        Chủ</a>
                </li>
                <li
                    class="li-cus relative bg-white lg:flex lg:items-center lg:text-center lg:px-3 lg:h-full lg:py-7 menu-item js-menu-item">
                    <a href="{{ route('CauChuyenPetPro') }}"
                        class="relative block w-full px-4 py-3 font-normal text-blue-200 capitalize transition-colors lg:w-auto lg:px-0 lg:py-0 focus:text-blue-300 hover:text-blue-300">
                        Câu Chuyện Petpro
                        <button
                            class="absolute flex items-center justify-center w-10 h-10 transform -translate-y-1/2 md:hidden right-3 top-1/2 js-btn-expand-menu chevron-down"></button>
                    </a>
                    <ul
                        class="submenu js-submenu pl-7 py-0 lg:absolute top-full bg-white lg:z-50 lg:px-4 lg:py-4 rounded-[4px]shadow-submenu js-submenu lg:left-1/2 lg:transform lg:-translate-x-[50%] hidden lg:hidden">
                        <li class="li-cus py-3 pr-4 text-left whitespace-nowrap">
                            <a class="text-blue-200 capitalize hover:text-blue-300 inline-block min-w-[216px]"
                                href="{{ route('GioiThieuBenhVien') }}">Giới thiệu bệnh viện</a>
                        </li>
                        <li class="li-cus py-3 pr-4 text-left whitespace-nowrap">
                            <a class="text-blue-200 capitalize hover:text-blue-300 inline-block min-w-[216px]"
                                href="{{ route('DoiNguBacSi') }}">Đội ngũ bác sĩ</a>
                        </li>
                        <li class="li-cus py-3 pr-4 text-left whitespace-nowrap">
                            <a class="text-blue-200 capitalize hover:text-blue-300 inline-block min-w-[216px]"
                                href="{{ route('TrangThietBiHD') }}">Trang thiết bị hiện đại</a>
                        </li>
                        <li class="li-cus py-3 pr-4 text-left whitespace-nowrap">
                            <a class="text-blue-200 capitalize hover:text-blue-300 inline-block min-w-[216px]"
                                href="{{ route('KHNoivePetPro') }}">Khách hàng nói về PetPro</a>
                        </li>
                    </ul>
                </li>
                <li
                    class="li-cus relative bg-white lg:flex lg:items-center lg:text-center lg:px-1 lg:h-full lg:py-7 menu-item js-menu-item">
                    <a href="{{ route('DichVuBV') }}"
                        class="relative block w-full px-4 py-3 font-normal text-blue-200 capitalize transition-colors lg:w-auto lg:px-0 lg:py-0 focus:text-blue-300 hover:text-blue-300">
                        Dịch vụ bệnh viện
                        <button
                            class="absolute flex items-center justify-center w-10 h-10 transform -translate-y-1/2 lg:hidden right-3 top-1/2 js-btn-expand-menu chevron-down"></button>
                    </a>
                    <ul
                        class="submenu submenu-cols-2 js-submenu px-6 py-0 lg:absolute top-full bg-white lg:z-50 lg:px-4 lg:py-4 rounded-[4px] shadow-submenu lg:left-1/2 lg:transform lg:-translate-x-[50%] hidden">
                        @if ($chuyenKhoa != null || count($chuyenKhoa) > 0)
                            @foreach ($chuyenKhoa as $val)
                                <li class="li-cus py-3 pr-4 text-left whitespace-normal md:whitespace-nowrap">
                                    <a class="text-blue-200 capitalize hover:text-blue-300 inline-block lg:min-w-[216px]"
                                        href="{{ route('chuyenkhoaGroup', ['slug' => $val->Slug]) }}">{{ $val->Title }}</a>
                                </li>
                            @endforeach
                        @endif

                        @if ($dichVu != null || count($dichVu) > 0)
                            @foreach ($dichVu as $val)
                                <li class="li-cus py-3 pr-4 text-left whitespace-normal md:whitespace-nowrap">
                                    <a class="text-blue-200 capitalize hover:text-blue-300 inline-block lg:min-w-[216px]"
                                        href="{{ route('dichvuGroup', ['slug' => $val->Slug]) }}">{{ $val->Title }}</a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </li>
                <li
                    class="li-cus relative bg-white lg:flex lg:items-center lg:text-center lg:px-3 lg:h-full lg:py-7 menu-item js-menu-item">
                    <a href="{{ route('ShopCategory') }}" {{-- <a href="#" --}}
                        class="relative block w-full px-4 py-3 font-normal text-blue-200 capitalize transition-colors lg:w-auto lg:px-0 lg:py-0 focus:text-blue-300 hover:text-blue-300">
                        Shop
                        <button
                            class="absolute flex items-center justify-center w-10 h-10 transform -translate-y-1/2 md:hidden right-3 top-1/2 js-btn-expand-menu chevron-down"></button>
                    </a>
                    <ul
                        class="submenu js-submenu pl-7 py-0 lg:absolute top-full bg-white lg:z-50 lg:px-4 lg:py-4 rounded-[4px] shadow-submenu js-submenu lg:left-1/2 lg:transform lg:-translate-x-[50%] hidden lg:hidden">
                        <li class="li-cus py-3 pr-4 text-left whitespace-nowrap">
                            <a class="text-blue-200 capitalize hover:text-blue-300 inline-block min-w-[216px]"
                                href="{{ route('ShopHome', 'thuc-an-cho-cho') }}">Thức Ăn Cho
                                {{-- href="#">Thức Ăn Cho --}}
                                Chó</a>
                        </li>
                        <li class="li-cus py-3 pr-4 text-left whitespace-nowrap">
                            <a class="text-blue-200 capitalize hover:text-blue-300 inline-block min-w-[216px]"
                                href="{{ route('ShopHome', 'thuc-an-cho-meo') }}">Thức Ăn Cho
                                {{-- href="#">Thức Ăn Cho --}}
                                Mèo</a>
                        </li>
                        <li class="li-cus py-3 pr-4 text-left whitespace-nowrap">
                            <a class="text-blue-200 capitalize hover:text-blue-300 inline-block min-w-[216px]"
                                href="{{ route('ShopHome', 'my-pham-thu-cung') }}">Mỹ Phẩm Cho Thú
                                {{-- href="#">Mỹ Phẩm Cho Thú --}}
                                Cưng</a>
                        </li>
                        <li class="li-cus py-3 pr-4 text-left whitespace-nowrap">
                            <a class="text-blue-200 capitalize hover:text-blue-300 inline-block min-w-[216px]"
                                href="{{ route('ShopHome', 'do-dung-nuoi-cho') }}">Đồ Dùng Nuôi
                                {{-- href="#">Đồ Dùng Nuôi --}}

                                Chó</a>
                        </li>
                        <li class="li-cus py-3 pr-4 text-left whitespace-nowrap">
                            <a class="text-blue-200 capitalize hover:text-blue-300 inline-block min-w-[216px]"
                                href="{{ route('ShopHome', 'do-dung-nuoi-meo') }}">Đồ Dùng Nuôi
                                {{-- href="#">Đồ Dùng Nuôi --}}
                                Mèo</a>
                        </li>
                        <li class="li-cus py-3 pr-4 text-left whitespace-nowrap">
                            <a class="text-blue-200 capitalize hover:text-blue-300 inline-block min-w-[216px]"
                                href="{{ route('ShopHome', 'dung-cu-grooming') }}">Dụng Cụ
                                {{-- href="#">Dụng Cụ --}}

                                Grooming</a>
                        </li>
                        <li class="li-cus py-3 pr-4 text-left whitespace-nowrap">
                            <a class="text-blue-200 capitalize hover:text-blue-300 inline-block min-w-[216px]"
                                href="{{ route('ShopHome', 'thuoc-dac-tri') }}">Thuốc Đặc
                                {{-- href="#">Dụng Cụ --}}

                                Trị</a>
                        </li>
                        <li class="li-cus py-3 pr-4 text-left whitespace-nowrap">
                            <a class="text-blue-200 capitalize hover:text-blue-300 inline-block min-w-[216px]"
                                href="{{ route('ShopHome', 'san-pham-khac') }}">Sản Phẩm
                                {{-- href="#">Dụng Cụ --}}

                                Khác</a>
                        </li>
                    </ul>
                </li>
                <li
                    class="li-cus relative bg-white lg:flex lg:items-center lg:text-center lg:px-3 lg:h-full lg:py-7 menu-item js-menu-item">
                    <a href="{{ route('KienThucCategory') }}"
                        class="relative block w-full px-4 py-3 font-normal text-blue-200 capitalize transition-colors lg:w-auto lg:px-0 lg:py-0 focus:text-blue-300 hover:text-blue-300">Kiến
                        Thức Thú Cưng
                        <button
                            class="absolute flex items-center justify-center w-10 h-10 transform -translate-y-1/2 lg:hidden right-3 top-1/2 js-btn-expand-menu chevron-down"></button>
                    </a>

                    {{-- <a href="" 
                        class="relative block w-full px-4 py-3 font-normal text-blue-200 capitalize transition-colors lg:w-auto lg:px-0 lg:py-0 focus:text-blue-300 hover:text-blue-300">Kiến
                        Thức Thú Cưng</a> --}}
                    <ul
                        class="submenu js-submenu pl-7 py-0 lg:absolute top-full bg-white lg:z-50 lg:px-4 lg:py-4 rounded-[4px] shadow-submenu js-submenu lg:left-1/2 lg:transform lg:-translate-x-[50%] hidden lg:hidden">
                        <li class="li-cus py-3 pr-4 text-left whitespace-nowrap">
                            <a class="text-blue-200 capitalize hover:text-blue-300 inline-block min-w-[216px]"
                                href="{{ route('KienThuc', ['slug' => 'kien-thuc-thu-cung']) }}">Kiến thức thú
                                cưng</a>
                        </li>
                        <li class="li-cus py-3 pr-4 text-left whitespace-nowrap">
                            <a class="text-blue-200 capitalize hover:text-blue-300 inline-block min-w-[216px]"
                                href="{{ route('KienThuc', ['slug' => 'dich-vu-thu-cung']) }}">Dịch vụ</a>
                        </li>
                        <li class="li-cus py-3 pr-4 text-left whitespace-nowrap">
                            <a class="text-blue-200 capitalize hover:text-blue-300 inline-block min-w-[216px]"
                                href="{{ route('KienThuc', ['slug' => 'thong-bao']) }}">Thông báo</a>
                        </li>
                        <li class="li-cus py-3 pr-4 text-left whitespace-nowrap">
                            <a class="text-blue-200 capitalize hover:text-blue-300 inline-block min-w-[216px]"
                                href="{{ route('KienThuc', ['slug' => 'khuyen-mai']) }}">Khuyến mãi</a>
                        </li>
                    </ul>
                </li>
                <li
                    class="li-cus relative bg-white lg:flex lg:items-center lg:text-center lg:px-3 lg:h-full lg:py-7 menu-item js-menu-item">
                    <a href="{{ route('DatLich') }}"
                        class="relative block w-full px-4 py-3 font-normal text-blue-200 capitalize transition-colors lg:w-auto lg:px-0 lg:py-0 focus:text-blue-300 hover:text-blue-300">Đặt
                        Lịch Hẹn</a>
                </li>
                <li
                    class="li-cus relative bg-white lg:flex lg:items-center lg:text-center lg:px-3 lg:h-full lg:py-7 menu-item js-menu-item">
                    <a href="{{ route('LienHe') }}"
                        class="relative block w-full px-4 py-3 font-normal text-blue-200 capitalize transition-colors lg:w-auto lg:px-0 lg:py-0 focus:text-blue-300 hover:text-blue-300">Liên
                        Hệ</a>
                </li>
            </ul>

            <ul class="flex justify-end w-18">
                {{-- <li>
                    <a href="#">
                        <img src="/assets/icon-checkout.d3263d9f.svg" alt="giỏ hàng">
                        
                    </a>
                </li> --}}
                <li>
                    <a id="search-all" href="javascript:void(0)">
                        <img src="/assets/icon-search.64a82995.svg" alt="tìm kiếm">
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div id="search-all-input" style="display: none">
        <div class="gcse-search" enablehistory="false"></div>
    </div>
</div>
