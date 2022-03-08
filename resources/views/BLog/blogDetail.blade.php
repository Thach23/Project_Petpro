@extends('_LayoutShare._layouthome',['Meta' => $Meta])

@section('content')
    @if ($blogs == null)
        <div style="text-align: center"><b style="font-size:25px; text-align :center;">Không tìm thấy dữ liệu</b></div>
    @else
        <main>
            <!-- breadcrumb -->
            <div class="relative w-full bg-center bg-cover bg-kien-thuc-thu-cung">
                <div class="container mx-auto">
                    <div class="py-10 text-sm md:text-lg">
                        <a href="{{ route('home') }}" class="text-gray-400 item">Trang chủ</a>
                        <span class="text-gray-350 px-[5px]">></span>
                        <a href="{{ route('KienThucCategory') }}" class="text-gray-400 item">Kiến thức</a>
                        <span class="text-gray-350 px-[5px]">></span>
                        <a class="text-gray-250 item">{{ $CategoryBlog->Name }}</a>
                        <h1 class="text-blue-200 text-4xl md:text-[42px] capitalize leading-tight">
                            {{ $CategoryBlog->Name }}
                        </h1>
                    </div>
                </div>
            </div>

            <!-- quảng cáo -->
            @include('Partital_Share.QuangCaoPartial')

            <!-- search blog -->
            <div class="container mx-auto pb-[85px] grid lg:grid-cols-8 lg:gap-6 grid-cols-1">
                <div class="lg:col-span-6">
                    @include('Partital_Share.SearchBlogPartial',['key' => $key])

                    <!-- blog detail -->
                    @if ($blogs == null)
                        <div class="container mx-auto text-center">Không có dữ liệu</div>
                    @else
                        <div class="lg:pr-[101px]">
                            <div
                                class="capitalize bg-blue-300 text-[14px] w-fit font-medium text-center rounded-[3px] text-white py-[3px] px-4 mb-[30px]">
                                {{ $CategoryBlog->Name }}</div>
                            <h1 class="text-cus font-bold mb-[28px]">{{ $blogs->Title }}</h1>
                            <p class="text-[14px] mb-[22px]">{{ $blogs->DateCreated }}</p>
                            <div class="w-full drop-shadow-[0_5px_10px_rgba(0,0,0,0.5)]">
                                @if ($blogs->BlogImage == null)
                                    <img class="w-full rounded-[5px]" src="/assets/no-image-icon.jpg"
                                        style="width: 1047px; height:498px;" alt="{{ $blogs->Title }}">
                                @else
                                    <img class="w-full rounded-[5px]" src="{{ $blogs->BlogImage }}"
                                        alt="{{ $blogs->Title }}">
                                @endif

                            </div>
                            <div class="flex items-center mt-[20px] mb-[26px]">
                                <img class="rounded-full w-[42px] h-[42px] mr-[14px]" src="/assets/logo.784179a7.svg">
                                <label class="capitalize">Admin Petpro</label>
                            </div>
                            <h4
                                class="text-[15px] leading-[24px] font-medium-700 text-gray-370 pb-\[10px\] text-italic text-justify-content">
                                {{ $blogs->Description }}</h4>
                            <div class="paragraph-content">
                                @if ($blogs->Content != null)
                                    {!! html_entity_decode($blogs->Content) !!}
                                @else
                                    <p>Không có dữ liệu</p>
                                @endif
                            </div>

                            @include('Partital_Share.QuangCao2Partial')

                            <!-- bài viết liên quan -->
                            <div class="mb-[36px]">
                                <div class="text-[18px] font-bold leading-[60px] mb-[6px]">Bài viết liên quan</div>
                                @if ($blogs_Lienquan == null || count($blogs_Lienquan) == 0)
                                    <p>Không có dữ liệu</p>
                                @else
                                    <div class="grid gap-[30px] lg:grid-cols-3">
                                        @foreach ($blogs_Lienquan as $val)
                                            <a href="{{ route('blogdetail', ['slug' => $val->Slug]) }}">
                                                @if ($val->BlogImage == null)
                                                    <img class="mb-[20px] rounded-[5px] drop-shadow-[0_5px_10px_rgba(0,0,0,0.5)] img-blog-relate"
                                                        src="/assets/no-image-icon.jpg" alt="{{ $val->Title }}">
                                                @else
                                                    <img class="mb-[20px] rounded-[5px] drop-shadow-[0_5px_10px_rgba(0,0,0,0.5)] img-blog-relate"
                                                        src="{{ $val->BlogImage }}" alt="{{ $val->Title }}">
                                                @endif

                                                <div class="text-[16px] font-bold capitalize maxline-3">{{ $val->Title }}
                                                </div>

                                                <div class="text-[14px] flex-shrink-0 maxline-3"
                                                    style="height: 63px; max-height: 63px;">
                                                    {{ $val->Description }}</div>
                                            </a>
                                        @endforeach
                                    </div>
                                @endif

                            </div>
                        </div>
                    @endif

                    <!-- thảo luận -->
                    <input type="hidden" id="custId" name="custId_" value="{{ $blogs->Id }}">
                    <input type="hidden" id="Slug" name="Slug" value="{{ $blogs->Slug }}">
                    <div class="w-full">
                        <div class="leading-[60px] w-full bg-gray-100 px-4">Thảo luận</div>
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
                            <input type="hidden" id="Id_Blog" name="Id_Blog" value="{{ $blogs->Id }}">
                            <input type="hidden" id="Slug_Blog" name="Slug_Blog" value="{{ $blogs->Slug }}">

                            <input type="text"
                                class="w-[282px] h-[45px] bg-gray-110 border border-gray-100 px-[22px] py-[10px] max-w-full outline-none mb-[14px]"
                                id="Name_User" name="Name_User" placeholder="Họ và tên"
                                pattern="[A-z\s_áàảãạâấầẩẫậăắằẳẵặđéèẻẽẹêếềểễệíìỉĩịóòỏõọôốồổỗộơớờởỡợúùủũụưứừửữựýỳỷỹỵÁÀẢÃẠÂẤẦẨẪẬĂẮẰẲẴẶĐÉÈẺẼẸÊẾỀỂỄỆÍÌỈĨỊÓÒỎÕỌÔỐỒỔỖỘƠỚỜỞỠỢÚÙỦŨỤƯỨỪỬỮỰÝỲỶỸỴ]{2,30}"
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
                                    style="background-color: #008CDD; border-radius: 5px" onclick="Close()">Đóng</button>
                            </div>
                        </div>
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

        <script src="https://www.google.com/recaptcha/api.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script>
            // $(document).ready(
            //     function getListComment() {
            //         var _id = document.getElementById('custId').getAttribute('value');

            //         $.ajax({
            //             type: 'POST',
            //             url: "{{ route('loadcomment') }}",
            //             datatype: 'json',
            //             data: {
            //                 '_token': "{{ csrf_token() }}",
            //                 'id': _id,
            //                 'isBlog': true,
            //             },
            //             success: function(data) {

            //                 if (data.code === 200) {
            //                     $("#content").html(data.commentpartial);
            //                 }
            //             },
            //             error: function(xhr, ajaxOptions, thrownError) {
            //                 alert('Failed to load comment.');
            //             }
            //         });
            //     }
            // )

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
                                    'isBlog': 1,
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


                // function getArticlesUp(url) {
                //     const Email_validate = document.getElementById('Name_User');

                //     var Id_Blog = document.getElementById('Id_Blog').getAttribute('value');
                //     var Name_User = document.getElementById('Name_User').value;
                //     var Slug_Blog = document.getElementById('Slug_Blog').getAttribute('value');
                //     var Cmt_User = document.getElementById('Cmt_User').value;
                //     var modal = document.getElementById('notification');
                //     var resCaptcha = document.getElementById('feedback-recaptcha');

                //     if (grecaptcha.getResponse().length !== 0) {


                //         if (Email_validate.checkValidity() && Cmt_User.length > 0) {

                //             $.ajax({
                //                 url: url,
                //                 data: {
                //                     '_token': "{{ csrf_token() }}",
                //                     'Id_Blog': Id_Blog,
                //                     'Name_User': Name_User,
                //                     'Slug_Blog': Slug_Blog,
                //                     'Cmt_User': Cmt_User,
                //                     'isBlog': 1,
                //                     'up': true,
                //                 },
                //             }).done(function(data) {
                //                 $("#content").html(data.commentpartial);
                //                 document.getElementById("Cmt_User").value = "";
                //                 document.getElementById("Name_User").value = "";
                //                 modal.value = "Cảm ơn đã phản hồi";
                //                 grecaptcha.reset();
                //                 $('#modal_show').show();
                //             }).fail(function() {
                //                 alert('Failed to up comment.');
                //             });
                //         } else {
                //             if (!Email_validate.checkValidity()) {
                //                 modal.value = "Vui lòng điền họ và tên";
                //                 $('#modal_show').show();
                //             }
                //             if (Cmt_User.length < 1) {
                //                 modal.value = "Vui lòng điền nội dung";
                //                 $('#modal_show').show();
                //             }
                //         }
                //     } else {
                //         var modal = document.getElementById('notification');
                //         modal.value = "Vui lòng xác minh để bình luận";
                //         $('#modal_show').show();
                //     }
                // }
            });

            function Close() {
                $('#modal_show').hide();
            }

            function checkLogin() {
                var modal = document.getElementById('notification');
                modal.value = "Vui lòng đăng nhập để bình luận";
                $('#modal_show').show();
            }
        </script>
    @endif
@endsection
