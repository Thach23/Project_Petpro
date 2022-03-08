@extends('_LayoutShare._layouthome',['Meta' => $Meta])

@section('content')
    @if ($products == null)
        <div style="text-align: center"><b style="font-size:25px; text-align :center;">Không tìm thấy dữ liệu</b></div>
    @else
        <main>

            <!-- breadcrumb -->
            <div class="relative w-full bg-center bg-cover bg-kien-thuc-thu-cung">
                <div class="container mx-auto">
                    <div class="py-10 text-sm md:text-lg">
                        <a href="{{ route('home') }}" class="text-gray-400 item">Trang chủ</a>
                        <span class="text-gray-350 px-[5px]">></span>
                        <a href="{{ route('KienThucCategory') }}" class="text-gray-400 item">Shop</a>
                        <span class="text-gray-350 px-[5px]">></span>
                        <a class="text-gray-250 item">{{ $CategoryProduct->Name }}</a>
                        <h1 class="text-blue-200 text-4xl md:text-[42px] capitalize leading-tight">
                            {{ $CategoryProduct->Name }}
                        </h1>
                    </div>
                </div>
            </div>

            <!-- quảng cáo -->
            @include('Partital_Share.QuangCaoPartial')

            <!-- search blog -->
            <div class="container mx-auto pb-[85px] grid lg:grid-cols-8 lg:gap-6 grid-cols-1">
                <div class="lg:col-span-6">
                    <form id="form" action="{{ route('ShopSearch') }}" method="get" enctype="multipart/form-data">
                        <div class="input-search w-[343px] max-w-full h-10 mb-9">
                            <input
                                class="w-full h-full leading-10 border border-gray-60 focus-visible:outline-none rounded-[4px] text-[14px] py-2 pr-2 pl-12"
                                placeholder="Tìm kiếm sản phẩm" name="key" id="key" value="{{ $key }}">
                        </div>
                    </form>

                    <!-- blog detail -->
                    <div class="detail">
                        <div class="flex flex-col md:flex-row">
                            <div class="relative max-w-full mx-auto w-[350px] image">
                                <div style="border:none"
                                    class="border preview border-gray-1100 rounded-[20px] overflow-hidden">
                                    @if ($products->ProductImage == null)
                                        <img id="product-Image" class="w-full h-auto" src="/assets/no-image-icon.jpg"
                                            alt="{{ $products->Name }}">
                                    @else
                                        <img id="product-Image" class="w-full h-auto pinterest-img"
                                            src="{{ $products->ProductImage }}" alt="{{ $products->Name }}">
                                    @endif
                                </div>
                                @if ($listpictureMapping != null || count($listpictureMapping) > 1)
                                    <div id="thumbsCarousel" class="w-full mt-5 swiper">
                                        <div class="swiper-wrapper">
                                            @php
                                                $count = 1;
                                            @endphp
                                            @foreach ($listpictureMapping as $val)
                                                @if ($val->Url != null)
                                                    <button
                                                        class="border border-gray-1100 swiper-slide max-w-[82px] w-[82px]"
                                                        onclick="getSrc({{ $val->Id }})">
                                                        <img id="{{ $val->Id }}-src" src="{{ $val->Url }}"
                                                            alt="Sản phẩm PetPro {{ $count }}">
                                                    </button>
                                                    @php
                                                        $count = $count + 1;
                                                    @endphp
                                                @endif
                                            @endforeach

                                        </div>
                                    </div>
                                @endif

                            </div>
                            <div class="flex-1 mt-8 md:mt-0 ml:0 md:ml-8 infor">
                                <h2 class="text-[30px] font-medium leading-[50px]">{{ $products->Name }}</h2>
                                @php
                                    $countCmt = count($comments);
                                    $price = $products->Price;
                                    $price = number_format($price, 0, '', '.');
                                    
                                    $countCmt = count($comments);
                                    $oldprice = $products->OldPrice;
                                    $oldprice = number_format($oldprice, 0, '', '.');
                                @endphp
                                <p class="text-xs text-gray-900">Khách hàng đánh giá ({{ $countCmt }} Đánh Giá)</p>
                                <div class="bg-gray-100 h-[60px] flex items-center px-5 my-4">
                                    @if ($products->OldPrice == 0 || $products->OldPrice == null)
                                    @else
                                        <span class="text-[10px] line-through text-gray-950">{{ $oldprice }}
                                            đ</span>
                                    @endif

                                    <span id="price_Product"
                                        class="inline-block text-blue-600 text-[26px] ml-3 font-semibold">{{ $price }}
                                        đ</span>

                                    {{-- <span
                                        class="text-[8px] font-semibold bg-orange text-white px-1 leading-[14px] inline-block ml-5">Giảm
                                        5%</span> --}}
                                </div>
                                <div>
                                    <label for="count" class="text-lg text-gray-850">Số lượng</label>
                                    <div class="flex border input w-[75px] border-gray-1000 flex-nowrap mt-2"
                                        style="width: fit-content;">
                                        <button class="w-[30px] h-[30px]" onclick="increase()"
                                            style="margin-right: 5px;">+</button>
                                        <input class="w-[15px] h-[30px] text-center outline-none" type="text" name="count"
                                            value="1" id="count" readonly="readonly" max="30" min="1">
                                        <button class="w-[30px] h-[30px]" onclick="decrease()"
                                            style="margin-left: 5px;">-</button>
                                    </div>
                                </div>
                                <div class="mt-4 text-sm font-light">
                                    Tình trạng: <span class="font-bold text-blue-600">Còn hàng</span>
                                </div>
                                <div class="mt-4 text-sm leading-7">
                                    <span class="font-light opacity-90">Mô tả:</span> {!! html_entity_decode($products->Description) !!}
                                </div>
                                @if ($ProductAttribute != null || count($ProductAttribute) > 0)
                                    <div class="flex flex-wrap mt-4 text-sm font-light">
                                        {{-- <div class="my-2 text-gray-1050 mx-[6px] px-4 leading-[26px]">
                                            Pate 400g
                                        </div> --}}

                                        @foreach ($ProductAttribute as $val)
                                            @if ($val->Value == null)
                                                <div id="{{ $val->Id }}-1" onclick="changePrice({{ $val->Id }})"
                                                    name="attribute"
                                                    class="my-2 text-gray-1000 mx-[6px] border border-gray-1000 px-4 leading-[26px] cursor-pointer hover:text-blue-600 hover:border-blue-600">
                                                    Mặc định</div>
                                                <input type="text" id="{{ $val->Id }}-2" hidden
                                                    value="{{ $val->Price }}">
                                                <input type="text" id="{{ $val->Id }}-3" hidden
                                                    value="{{ $val->Id }}">
                                            @else
                                                <div id="{{ $val->Id }}-1" onclick="changePrice({{ $val->Id }})"
                                                    name="attribute"
                                                    class="my-2 text-gray-1000 mx-[6px] border border-gray-1000 px-4 leading-[26px] cursor-pointer hover:text-blue-600 hover:border-blue-600">
                                                    {{ $val->Value }}</div>
                                                <input type="text" id="{{ $val->Id }}-2" hidden
                                                    value="{{ $val->Price }}">
                                                <input type="text" id="{{ $val->Id }}-3" hidden
                                                    value="{{ $val->Id }}">
                                            @endif
                                        @endforeach
                                    </div>
                                @endif
                                <div class="flex items-center mt-4 text-xs flex-nowrap">
                                    <span class="relative top-[-3px]">Chia sẻ:</span>
                                    <ul class="flex">
                                        {{-- <li class="ml-1">
                                            <a class="inline-block messenger-btn" href="/" target="_blank"
                                                onclick="window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes, width=SomeSize, height=SomeSize'); return false;">
                                                <img class="w-5 h-5" src="/assets/messenger.g66150.svg"
                                                    alt="messenger">
                                            </a>
                                        </li> --}}
                                        <li class="ml-1">
                                            <a class="inline-block facebook-btn" href="/" target="_blank"
                                                onclick="window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes, width=SomeSize, height=SomeSize'); return false;">
                                                <img class="w-5 h-5" src="/assets/facebook.a79480.svg"
                                                    alt="facebook">
                                            </a>
                                        </li>
                                        <li class="ml-1">
                                            <a class="inline-block pinterest-btn" href="/" target="_blank"
                                                onclick="window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes, width=SomeSize, height=SomeSize'); return false;">
                                                <img class="w-5 h-5" src="/assets/pinterest.d79965.svg"
                                                    alt="printerest">
                                            </a>
                                        </li>

                                        <li class="ml-1">
                                            <a class="inline-block twitter-btn" href="/" target="_blank"
                                                onclick="window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes, width=SomeSize, height=SomeSize'); return false;">
                                                <img class="w-5 h-5" src="/assets/twitter.c79494.svg" alt="twitter">
                                            </a>
                                        </li>
                                        <li class="ml-1">
                                            <a class="inline-block twitter-btn" style="cursor: pointer" onclick="copyToClipboard()">
                                                <img class="w-5 h-5"
                                                    src="https://img.icons8.com/ios-glyphs/60/000000/link--v1.png"
                                                    alt="Link-Coppy" />
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <button onclick="show()"
                                    class="p-3 mt-4 text-sm font-medium leading-none text-blue-800 uppercase border border-blue-800 rounded hover:bg-blue-200 hover:text-white order">đặt
                                    ngay</button>
                            </div>
                        </div>
                        <h3 class="leading-[60px] w-full bg-gray-100 px-4 uppercase mt-6">mô tả sản phẩm</h3>
                        <div class="mt-4 space-y-5 text-sm leading-6 description content text-gray-190">
                            {!! html_entity_decode($products->Content) !!}
                        </div>

                        @include('Partital_Share.QuangCao2Partial')

                        <h3 class="mt-6 text-xl font-bold leading-8 text-gray-800">Sản phẩm liên quan</h3>
                        <div class="grid gap-3 md:gap-5 md:grid-cols-3">
                            @if ($products_Lienquan == null || count($products_Lienquan) == 0)
                                <div class="pt-5 pb-5">Không có dữ liệu</div>
                            @else
                                @foreach ($products_Lienquan as $val)
                                    <div class="rounded-[10px] h-full p-[15px] relative">
                                        <a href="{{ route('shopdetail', ['slug' => $val->Slug]) }}   ">
                                            @if ($val->ProductImage == null)
                                                <img class="w-full rounded-[10px] border border-gray-100"
                                                    src="/assets/no-image-icon.jpg" alt="{{ $val->Name }}">
                                            @else
                                                <img class="w-full rounded-[10px] border border-gray-100"
                                                    src="{{ $val->ProductImage }}" alt="{{ $val->Name }}">
                                            @endif
                                        </a>
                                        <div class="pt-5">
                                            <div class="text-lg font-bold leading-6">{{ $val->Name }}</div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <!-- thảo luận -->
                    <input type="hidden" id="custId" name="custId_" value="{{ $products->Id }}">
                    <input type="hidden" id="Slug" name="Slug" value="{{ $products->Slug }}">
                    <div class="w-full">
                        <div class="leading-[60px] w-full bg-gray-100 px-4">ĐÁNH GIÁ SẢN PHẨM</div>
                        <div class="lg:pr-[56px]">
                            <section class="articles">
                                <div class="commnets-reply" id="content">
                                    <!--danh sach comment -->
                                    @include('Partital_Share.CommentPartial')
                                </div>
                            </section>
                        </div>
                    </div>

                    <div class="mt-[30px]">
                        <div class="text-[16px] text-gray-700 mb-[20px]">Ý kiến</div>
                        <form method="get" role="form" class="rounded-field">
                            @csrf
                            <input type="hidden" id="Id_Blog" name="Id_Blog" value="{{ $products->Id }}">
                            <input type="hidden" id="Slug_Blog" name="Slug_Blog" value="{{ $products->Slug }}">

                            <input type="text"
                                class="w-[282px] h-[45px] bg-gray-110 border border-gray-100 px-[22px] py-[10px] max-w-full outline-none mb-[14px]"
                                id="Name_User" name="Name_User" placeholder="Họ và tên"
                                pattern="[a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂẾưăạảấầẩẫậắằẳẵặẹẻẽềềểếỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s|_]{2,30}"
                                required>
                            <textarea
                                class="w-full outline-none h-[100px] px-[22px] py-[10px] bg-gray-110 border border-gray-100 rounded-[4px] placeholder:text-gray-600 mb-[31px]"
                                placeholder="Nội dung" id="Cmt_User" name="Cmt_User"></textarea>
                            <div class="sm:flex sm:justify-between">
                                <div class="g-recaptcha cus-recaptcha" id="feedback-recaptcha"
                                    data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>
                                <div class="sm:flex sm:justify-between mt-5">
                                    <button type="submit" style="width:auto"
                                        class="w-full sm:w-auto px-[18px] max-h-[42px] py-[9px] rounded-[5px] bg-blue-200 text-white text-[18px] leading-6 font-normal"
                                        id="check-btn">Đăng bình luận</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!--Modal thông báo-->
                <div class="modal" id="modal_show" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content" style="margin-top: 20rem;">
                            <div class="modal-header">
                                <b class="modal-title" style="">Thông báo</b>
                            </div>
                            <div class="modal-body">
                                <input id="notification" type="text" value="abc"
                                    style="border: 0px solid black; background-color:white; width:100%;"
                                    disabled="disabled">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                    style="background-color: #008CDD; border-radius: 5px" style="border-radius: 5px"
                                    onclick="Close()">Đóng</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- modal đặt hàng -->
                <div id="modalOrder" class="modal">
                    <div class="modal-content">
                        <div class="modal-heading">
                            Vui lòng để lại số điện thoại để đặt hàng
                        </div>
                        <div class="modal-body">
                            <a href="javascript:void(0)" class="close" aria-close onclick="Close()">
                                <img src="/assets/close.de495574.svg" alt="close">
                            </a>
                            <form id="formbuy" action="{{ route('ShopConfirm') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <input hidden type="text" name="Id_Prod" id="Id_Prod" value="{{ $products->Id }}" />
                                <input hidden type="text" name="value_price" id="value_price"
                                    value="{{ $products->Price }}">
                                <input hidden type="text" name="Quantity_Prod" id="Quantity_Prod" value="1">
                                @if (count($ProductAttribute) == 0)
                                    <input hidden type="text" name="Id_Attr" id="Id_Attr" value="-1">
                                @else
                                    <input hidden type="text" name="Id_Attr" id="Id_Attr"
                                        value="{{ $ProductAttribute[0]->Id }}">
                                @endif


                                <div>
                                    <label for="phone">*Số điện thoại</label>
                                    <input type="text" name="phone" id="phone" pattern="[0-9]{9,13}">
                                    <label hidden="true" id="alert_phone" style="font-style: italic; color:red">Vui
                                        lòng
                                        nhập số điện thoại</label>
                                </div>
                                <div class="mt-5">
                                    <label for="name">*Tên người đặt hàng</label>
                                    <input type="text" name="name" id="name"
                                        pattern="[A-z\s_àáãạảăắằẳẵặâấầẩẫậèéẹẻẽêềếểễệđìíĩỉịòóõọỏôốồổỗộơớờởỡợùúũụủưứừửữựỳỵỷỹýÀÁÃẠẢĂẮẰẲẴẶÂẤẦẨẪẬÈÉẸẺẼÊỀẾỂỄỆĐÌÍĨỈỊÒÓÕỌỎÔỐỒỔỖỘƠỚỜỞỠỢÙÚŨỤỦƯỨỪỬỮỰỲỴỶỸÝ]{2,30}">
                                    <label hidden="true" id="alert_name" style="font-style: italic; color:red">Vui
                                        lòng
                                        nhập tên khách hàng</label>
                                </div>
                                <div class="sm:flex sm:justify-between mt-5">
                                    <div class="g-recaptcha" id="feedback-recaptcha_buy"
                                        data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>
                                    {{-- <div>i'm not robot</div> --}}
                                    <div class="sm:flex sm:justify-between mt-5" style="padding-bottom: 9px;">
                                        <button onclick="Confirm()" type="button" id="btnSend"
                                            class="px-5 py-3 leading-none border rounded text-blue-850 border-blue-850">Xác
                                            nhận</button>
                                    </div>

                                </div>
                                <label hidden="true" id="alert_captcha" style="font-style: italic; color:red">Vui
                                    lòng
                                    xác minh</label>
                            </form>
                        </div>
                    </div>
                </div>

                @include('Partital_Share.RightMenuShopPartial')
            </div>

            <!--Câu hỏi PetPro -->
            @include('Partital_Share.QNAPartial', ['QNA' => $QNA])
        </main>
        <script src="/assets/js/share.js"></script>
        <script type="module" crossorigin src="/assets/shop-detail.d0db1adb.js"></script>
        <script src="https://www.google.com/recaptcha/api.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script>
            $(document).ready(

                function load() {
                    document.getElementById("Cmt_User").value = "";
                    document.getElementById("Name_User").value = "";
                    document.getElementById('name').value = "";
                    document.getElementById('phone').value = "";
                }
            )

            function Confirm() {
                const name_validate = document.getElementById('name');
                const phone_validate = document.getElementById('phone');
                const name_alert = document.getElementById('alert_name');
                const phone_alert = document.getElementById('alert_phone');
                const captcha_alert = document.getElementById('alert_captcha');

                var flag_name = true;
                var flag_phone = true;
                var flag_captcha = true;

                if (!name_validate.checkValidity() || name_validate.value == "") {
                    if (!name_validate.checkValidity()) {
                        name_alert.innerHTML = "Tên không đúng định dạng";
                        name_alert.hidden = false;
                        flag_name = false;

                    } else {
                        name_alert.innerHTML = "Vui lòng điền tên";
                        name_alert.hidden = false;
                        flag_name = false;
                    }
                } else {
                    name_alert.hidden = true;
                    flag_name = true;
                }

                if (!phone_validate.checkValidity() || phone_validate.value == "") {
                    if (!phone_validate.checkValidity()) {
                        phone_alert.innerHTML = "Số điện thoại không đúng định dạng";
                        phone_alert.hidden = false;
                        flag_phone = false;
                    } else {
                        phone_alert.innerHTML = "Vui lòng điền số điện thoại";
                        phone_alert.hidden = false;
                        flag_phone = false;
                    }
                } else {
                    phone_alert.hidden = true;
                    flag_phone = true;
                }

                if (grecaptcha.getResponse(1).length !== 0) {
                    flag_captcha = true;
                    captcha_alert.hidden = true;
                } else {
                    flag_captcha = false;
                    captcha_alert.hidden = false;
                    return false;
                }

                if (flag_phone == true && flag_name == true && flag_captcha == true) {
                    document.getElementById("btnSend").disabled = true
                    $('#formbuy').submit();
                }
            }

            function show() {
                grecaptcha.reset(1);
                $('#modalOrder').show();
            }

            function Close() {
                $('#modal_show').hide();
                $('#modalOrder').hide();
            }

            function getSrc(id) {
                var _id = id + '-src';
                var Img = document.getElementById(_id);
                var srcImg = Img.getAttribute('src');
                document.getElementById('product-Image').src = srcImg;
            }


            $(function() {
                $('main').on('click', '.pagination a', function(e) {
                    e.preventDefault();

                    var url = $(this).attr('href');
                    getArticles(url);
                    window.history.pushState("", "", url);
                });

                function getArticles(url) {
                    $.ajax({
                        url: url
                    }).done(function(data) {
                        $("#content").html(data.commentpartial);
                    }).fail(function() {
                        alert('Articles could not be loaded.');
                    });
                }
            });

            $(function() {
                $("#check-btn").click(function(e) {
                    e.preventDefault();
                    var url = $(this).attr('href');
                    getArticlesUp(url);
                    window.history.pushState("", "", url);
                });


                function getArticlesUp(url) {
                    const Email_validate = document.getElementById('Name_User');

                    var Id_Blog = document.getElementById('Id_Blog').getAttribute('value');
                    var Name_User = document.getElementById('Name_User').value;
                    var Slug_Blog = document.getElementById('Slug_Blog').getAttribute('value');
                    var Cmt_User = document.getElementById('Cmt_User').value;
                    var modal = document.getElementById('notification');
                    var resCaptcha = document.getElementById('feedback-recaptcha');


                    if (Email_validate.checkValidity() && Cmt_User.length > 0) {
                        if (grecaptcha.getResponse().length !== 0) {
                            $.ajax({
                                url: url,
                                data: {
                                    '_token': "{{ csrf_token() }}",
                                    'Id_Blog': Id_Blog,
                                    'Name_User': Name_User,
                                    'Slug_Blog': Slug_Blog,
                                    'Cmt_User': Cmt_User,
                                    'Name_User_Length': Name_User.length,
                                    'isBlog': 0,
                                    'up': true,
                                },
                            }).done(function(data) {
                                $("#content").html(data.commentpartial);
                                document.getElementById("Cmt_User").value = "";
                                document.getElementById("Name_User").value = "";
                                modal.value = "Cảm ơn đã phản hồi";
                                grecaptcha.reset();
                                $('#modal_show').show();
                            }).fail(function() {
                                alert('Failed to up comment.');
                            });
                        } else {
                            var modal = document.getElementById('notification');
                            modal.value = "Vui lòng xác minh để bình luận";
                            $('#modal_show').show();
                        }
                    } else {
                        if (!Email_validate.checkValidity()) {
                            console.log('false')
                            modal.value = "Vui lòng điền họ và tên";
                            $('#modal_show').show();
                            return false;
                        }
                        if (Cmt_User.length < 1) {
                            modal.value = "Vui lòng điền nội dung";
                            $('#modal_show').show();
                            return false;
                        }
                    }

                }
            });

            function Close() {
                $('#modal_show').hide();
                $('#modalOrder').hide();
            }

            function checkLogin() {
                var modal = document.getElementById('notification');
                modal.value = "Vui lòng đăng nhập để bình luận";
                $('#modal_show').show();
            }

            function increase() {
                var count = document.getElementById('count').value;
                count = parseInt(count) + 1;
                if (count > 30) {
                    // var modal = document.getElementById('notification');
                    // modal.value = "Không vượt quá 30 sản phẩm!";
                    // $('#modal_show').show();
                    return;
                }
                document.getElementById('count').value = count;
                document.getElementById('Quantity_Prod').value = count;
                // var price = document.getElementById('value_price').value;

                // let value_ = parseInt(price) * parseInt(count)
                // value_ = new Intl.NumberFormat('vi-VN', {
                //     style: 'currency',
                //     currency: 'VND'
                // }).format(value_);
                // value_ = value_.replace(" ₫", " ");
                // document.getElementById('price_Product').innerHTML = value_ + ' đ';

            }

            function decrease() {
                var count = document.getElementById('count').value;
                if (count > 1) {
                    count = parseInt(count) - 1;
                }
                document.getElementById('count').value = count;
                document.getElementById('Quantity_Prod').value = count;
            }



            function changePrice(id) {
                var _1 = id + '-1';
                var _2 = id + '-2';
                var _3 = id + '-3';
                var text = document.getElementById(_1);
                var value_ = document.getElementById(_2).value;
                var id_ = document.getElementById(_3).value;
                document.getElementById('value_price').value = value_;
                document.getElementById('Id_Attr').value = id_;
                var alltext = document.getElementsByName('attribute');

                // var count = document.getElementById('count').value;
                // var price = document.getElementById('value_price').value;
                // value_ = parseInt(price) * parseInt(count)

                value_ = new Intl.NumberFormat('vi-VN', {
                    style: 'currency',
                    currency: 'VND'
                }).format(value_);

                value_ = value_.replace(" ₫", " ");
                document.getElementById('price_Product').innerHTML = value_ + ' đ';

                alltext.forEach((item) => {
                    item.className = item.className.replace('text-blue-600', 'text-gray-1000');
                    item.className = item.className.replace('border-blue-600', 'border-gray-1000');
                });
                text.className = 'my-2 text-blue-600 mx-[6px] border border-blue-600 px-4 leading-[26px] cursor-pointer';
            }


            function copyToClipboard(text) {
                var inputc = document.body.appendChild(document.createElement("input"));
                inputc.value = window.location.href;
                // inputc.focus();
                inputc.select();
                document.execCommand('copy');
                inputc.parentNode.removeChild(inputc);
                // alert("URL Copied.");
                var modal = document.getElementById('notification');
                modal.value = "Đã copy đường dẫn";
                $('#modal_show').show();
            }
        </script>
    @endif
@endsection
