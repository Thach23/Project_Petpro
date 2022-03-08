@extends('_LayoutShare._layouthome',['Meta' => $Meta])

@section('content')
    <main>

        <!-- breadcrumb -->
        <div class="relative w-full bg-center" style="background: white;">
            <div class="container mx-auto">
                <div class="py-10 text-sm md:text-lg">
                    <a href="{{ route('home') }}" class="text-gray-400 item">Trang chủ</a>
                    <span class="text-gray-350 px-[5px]">></span>
                    <span class="text-gray-250">Liên hệ</span>
                    {{-- <h2 class="text-blue-200 text-4xl md:text-[42px] capitalize leading-tight">Liên hệ</h2> --}}
                </div>
            </div>
        </div>

        <div class="container mx-auto">
            <!-- contact -->
            <div class="relative w-full border border-gray-200 rounded-lg mb-15">
                <div class="p-[20px] xl:pb-13">
                    <div class="lg:px-8 lg:pr-[52px]">
                        <div class="mb-3 text-center">
                            <h1
                                class="text-[28px] sm:text-5xl text-center text-blue-200 leading-[55px] md:leading-[72px] capitalize">
                                Liên Hệ với chúng Tôi
                            </h1>
                            <img class="block mx-auto mt-3" src="/assets/icon-foot.48e78dce.svg" alt="">
                        </div>
                        <p class="text-center pb-9 w-[792px] max-w-full mx-auto">Hãy để lại thông tin bên dưới, chúng tôi sẽ
                            liên hệ ngay lập tức để tư vấn và hỗ trợ vấn đề bạn
                            gặp phải. Xin cảm ơn!</p>
                        <form id="myForm" action="{{ route('XacNhanLienHe') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="w-[588px] max-w-full mx-auto">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-[16px] pb-[17px]">
                                    <input
                                        class="w-full outline-none h-[44px] border-[1.5px] px-[12px] py-[10px] border-gray-200 rounded-[4px]"
                                        placeholder="Tên" type="text" id="name" name="name"
                                        pattern="[A-z\s_áàảãạâấầẩẫậăắằẳẵặđéèẻẽẹêếềểễệíìỉĩịóòỏõọôốồổỗộơớờởỡợúùủũụưứừửữựýỳỷỹỵÁÀẢÃẠÂẤẦẨẪẬĂẮẰẲẴẶĐÉÈẺẼẸÊẾỀỂỄỆÍÌỈĨỊÓÒỎÕỌÔỐỒỔỖỘƠỚỜỞỠỢÚÙỦŨỤƯỨỪỬỮỰÝỲỶỸỴ]{2,30}">
                                    <input
                                        class="w-full outline-none h-[44px] border-[1.5px] px-[12px] py-[10px] border-gray-200 rounded-[4px]"
                                        placeholder="Email" type="email" id="email" name="email"
                                        pattern="[A-Za-z0-9._%+-]+@[a-z]+\.[a-z]{3}">
                                </div>
                                <div class="pb-[17px]">
                                    <input
                                        class="w-full outline-none h-[44px] border-[1.5px] px-[12px] py-[10px] border-gray-200 rounded-[4px]"
                                        placeholder="Tiêu đề" type="text" id="title" name="title"
                                        pattern="[A-z0-9\s_áàảãạâấầẩẫậăắằẳẵặđéèẻẽẹêếềểễệíìỉĩịóòỏõọôốồổỗộơớờởỡợúùủũụưứừửữựýỳỷỹỵÁÀẢÃẠÂẤẦẨẪẬĂẮẰẲẴẶĐÉÈẺẼẸÊẾỀỂỄỆÍÌỈĨỊÓÒỎÕỌÔỐỒỔỖỘƠỚỜỞỠỢÚÙỦŨỤƯỨỪỬỮỰÝỲỶỸỴ]{5,500}">
                                    {{-- A-z0-9\s_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểếỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹý --}}
                                </div>
                                <div class="pb-[17px]">
                                    <textarea
                                        class="w-full outline-none h-[100px] px-[12px] py-[10px] border-[1.5px] border-gray-200 rounded-[4px]"
                                        placeholder="Nhập nội dung" id="text" name="text"></textarea>
                                </div>
                                <div class="flex justify-end w-full">
                                    <button type="button" id="btnSend"
                                        class="w-full md:w-[240px] outline-none h-[45px] text-center text-blue-600 uppercase border-[2px] border-blue-600 rounded-[50px]"
                                        onclick="showThongBao()">GỬI
                                        YÊU CẦU</button>
                                </div>
                            </div>
                        </form>

                    </div>

                    <img class="rounded-bl-lg -mb-[1px] xl:absolute xl:bottom-0" src="/assets/dog.62bfd494.png" alt="">
                </div>
            </div>

            <div class="grid lg:grid-cols-5 lg:gap-13">
                <!--map-->
                <section class="w-full lg:col-span-3">
                    @foreach ($webAtribute as $val)
                        @if ($val->Description == 'map' && $val->IsPublic == true)
                            @if ($val->Value != null)
                                <iframe id="frame1" src="{{ $val->Value }}" class="w-full lg:col-span-3" width="600"
                                    height="450" style="border:0;" allowfullscreen="" loading="lazy">
                                </iframe>
                            @endif
                        @endif
                    @endforeach
                </section>
                <div class="mt-10 lg:col-span-2 lg:mt-0">
                    <h3 class="pb-3 text-[32px] font-medium text-blue-200 capitalize">thông tin liên hệ</h3>
                    @foreach ($webAtribute as $val)
                        @if ($val->Description == 'hotline' && $val->IsPublic == true)
                            <div class="flex items-start mb-4">
                                <div class="w-7">
                                    <img src="/assets/icon-phone-ring.df5c50d4.svg" alt="">
                                </div>
                                <div class="pl-2 text-lg font-medium">
                                    <p class="uppercase text-gray-160">số khẩn cấp</p>
                                    @if ($val->Value != null)
                                        <strong class="text-gray-600">{{ $val->Value }}</strong>
                                    @endif
                                </div>
                            </div>
                        @endif
                    @endforeach

                    @foreach ($webAtribute as $val)
                        @if ($val->Description == 'hotline_2' && $val->IsPublic == true)
                            <div class="flex items-start mb-4">
                                <div class="w-7 ">
                                    <img class="pt-[3px]" src="/assets/icon-phone-blue.03054949.svg" alt="">
                                </div>
                                <div class="pl-2 text-lg font-medium">
                                    <p class="uppercase text-gray-160">chĂm sóc khách hàng</p>
                                    @if ($val->Value != null)
                                        <strong class="text-gray-600">{{ $val->Value }}</strong>
                                    @endif
                                </div>
                            </div>
                        @endif
                    @endforeach


                    @foreach ($webAtribute as $val)
                        @if ($val->Description == 'email' && $val->IsPublic == true)
                            <div class="flex items-start mb-4">
                                <div class="w-7">
                                    <img class="pt-[6px]" src="/assets/icon-mail-blue.2978bdd9.svg" alt="">
                                </div>
                                <div class="pl-2 text-lg font-medium">
                                    <p class="uppercase text-gray-160">Email</p>
                                    @if ($val->Value != null)
                                        {!! html_entity_decode($val->Value) !!}
                                    @endif
                                </div>
                            </div>
                        @endif
                    @endforeach


                    @foreach ($webAtribute as $val)
                        @if ($val->Description == 'timework' && $val->IsPublic == true)
                            <div class="flex items-start">
                                <div class="w-7">
                                    <img class="pt-[2px]" src="/assets/icon-time-working.b94834bc.svg" alt="">
                                </div>
                                <div class="pl-2 text-lg font-medium">
                                    <p class="uppercase text-gray-160">Giờ làm việc</p>
                                    @if ($val->Value != null)
                                        {!! html_entity_decode($val->Value) !!}
                                    @endif
                                </div>
                            </div>
                        @endif
                    @endforeach


                </div>
            </div>

        </div>
        <!-- hệ thống bệnh viện -->
        <div class="container mx-auto pt-10 pb-[70px]">
            <div class="mb-8 text-center">
                <h2 class="text-[28px] sm:text-5xl text-center text-blue-200 leading-[55px] md:leading-[72px] capitalize">
                    hệ
                    thống bệnh viện thú y PetPro
                </h2>
                <img class="block mx-auto mt-3" src="/assets/icon-foot.48e78dce.svg" alt="">
            </div>
            @include('Partital_Share.LocalPartial',['LocalMap' => $LocalMap])
        </div>

        <!--Modal thông báo-->
        <div class="modal" id="modal_show" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="margin-top: 20rem;">
                    <div class="modal-header">
                        <b class="modal-title" style="font-size: :45px">Thông báo</b>
                    </div>
                    <div class="modal-body">
                        <input id="notification" type="text" value="abc"
                            style="border: 0px solid black; background-color:white; width:100%;" disabled="disabled">
                    </div>
                    <div class="modal-footer">
                        <button type="button" style="border-radius: 5px; background-color: #008CDD"
                            class="btn btn-secondary" data-dismiss="modal" onclick="Close()">Đóng</button>
                    </div>
                </div>
            </div>
        </div>

    </main>
    {{-- <script type="module" crossorigin src="/assets/collapse.54d613f4.js"></script> --}}
    <script type="module" crossorigin src="/assets/collapse.6f9ad156.js"></script>
    <script async src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>
    <script type="text/javascript">
        function showThongBao(event) {

            const name_validate = document.getElementById('name');
            const email_validate = document.getElementById('email');
            const title_validate = document.getElementById('title');
            const text_validate = document.getElementById('text');

            var modal = document.getElementById('notification');


            if (!name_validate.checkValidity() || name_validate.value == "") {
                if (!name_validate.checkValidity()) {
                    modal.value = "Tên không đúng định dạng. Vui lòng nhập lại";
                    $('#modal_show').show();
                    return false;
                } else {
                    modal.value = "Vui lòng điền tên";
                    $('#modal_show').show();
                    return false;
                }
            }

            if (!email_validate.checkValidity() || email_validate.value == "") {
                if (!email_validate.checkValidity()) {
                    modal.value = "Email không đúng định dạng. Vui lòng nhập lại";
                    $('#modal_show').show();
                    return false;
                } else {
                    modal.value = "Vui lòng điền Email";
                    $('#modal_show').show();
                    return false;
                }
            }

            if (!title_validate.checkValidity() || title_validate.value == "") {
                if (!title_validate.checkValidity()) {
                    modal.value = "Tiêu đề không đúng định dạng. Vui lòng nhập lại";
                    $('#modal_show').show();
                    return false;
                } else {
                    modal.value = "Vui lòng điền tiêu đề";
                    $('#modal_show').show();
                    return false;
                }
            }


            if (text_validate.value == "") {
                modal.value = "Vui lòng điền nội dung";
                $('#modal_show').show();
                return false;
            }


            modal.value = "Cảm ơn đã phản hồi với chúng tôi";

            if (name_validate.checkValidity() && email_validate.checkValidity() && title_validate.checkValidity() &&
                text_validate.value != "") {
                document.getElementById("btnSend").disabled = true
                $('#myForm').submit();

            }
        }

        // function submit() {
        //     var email = document.getElementById('email').value;

        //     $.ajax({
        //         type: 'POST',
        //         url: "{{ route('XacNhanLienHe') }}",
        //         datatype: 'json',
        //         data: {
        //             '_token': "{{ csrf_token() }}",
        //             'email': email,
        //         },
        //         success: function(data) {
        //             if (data.code === 200) {}
        //         },
        //         error: function(xhr, ajaxOptions, thrownError) {
        //             alert('Gửi thông tin thất bại.');
        //         }
        //     });
        //     const name_validate = document.getElementById('name');
        //     const email_validate = document.getElementById('email');
        //     const title_validate = document.getElementById('title');
        //     const text_validate = document.getElementById('text');

        //     name_validate.value = "";
        //     email_validate.value = "";
        //     title_validate.value = "";
        //     text_validate.value = "";
        //     $('#modalConfirmContact').hide();
        // }

        function Close() {
            // var modal = document.getElementById('notification');
            // modal.value = "";
            $('#modal_show').hide();
        }

        // function myFunction(map) {
        //     //   var x = document.getElementById("mySelect").value;
        //     // document.querySelector("demo").innerHTML = "You selected: " + x;
        //     console.log(document.getElementById("mySelect"))
        // }

        // function doimap() {
        //     // var select = $('#mySelect').val();
        //     var selected = document.getElementById("mySelect").value;
        //     var iframe = document.getElementById("frame1");
        //     // iframe.src = "https://www.google.com/maps/embed?pb=!1m26!1m12!1m3!1d15677.12698669328!2d106.63508832746483!3d10.789719726999165!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m11!3e6!4m3!3m2!1d10.781518199999999!2d106.64092009999999!4m5!1s0x31752950a22d3a35%3A0xb1542d6625c6b3ef!2spetpro%20chi%20nh%C3%A1nh%207!3m2!1d10.7954674!2d106.6483729!5e0!3m2!1svi!2s!4v1637733607776!5m2!1svi!2s";
        //     if (selected == 1) {
        //         iframe.src =
        //             "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.3517429538697!2d106.62861704936887!3d10.784348992278455!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ea83583222d%3A0x3c87574e2bee2bb9!2sPET%20PRO!5e0!3m2!1svi!2s!4v1637735588049!5m2!1svi!2s";
        //     }
        //     if (selected == 2) {
        //         iframe.src =
        //             "https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d3919.0849178101726!2d106.63481299936909!3d10.80480804226451!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1zMzg3LTM4OSBD4buZbmcgSMOyYSwgUC4gMTMsIFEuIFTDom4gQsOsbmgsIFRQLiBIQ00!5e0!3m2!1svi!2s!4v1637735727947!5m2!1svi!2s";
        //     }
        //     if (selected == 3) {
        //         iframe.src =
        //             "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.206799744957!2d106.64617884936904!3d10.79546739227089!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752950a22d3a35%3A0xb1542d6625c6b3ef!2zQuG7h25oIFZp4buHbiBUaMO6IFkgUGV0UHJvIC0gQ2hpIE5ow6FuaCBUcsaw4budbmcgQ2hpbmg!5e0!3m2!1svi!2s!4v1637735784677!5m2!1svi!2s";
        //     }
        //     if (selected == 4) {
        //         iframe.src =
        //             "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.9471937261287!2d106.58721644936924!3d10.815353192257296!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752b98ea2bb8bd%3A0xc2243ebb78564272!2zQuG7h25oIFZp4buHbiBUaMO6IFkgUGV0UHJvIDQ!5e0!3m2!1svi!2s!4v1637735831478!5m2!1svi!2s";
        //     }
        //     if (selected == 5) {
        //         iframe.src =
        //             "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.956848248679!2d106.61283544936829!3d10.73780929231017!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752dc50da24ecf%3A0x17298d3fcb94da84!2zNDkzIEtpbmggRMawxqFuZyBWxrDGoW5nLCBBbiBM4bqhYywgQsOsbmggVMOibiwgVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1637735895620!5m2!1svi!2s";
        //     }
        //     if (selected == 6) {
        //         iframe.src =
        //             "https://www.google.com/maps/embed?pb=!1m26!1m12!1m3!1d501928.5414752287!2d106.62117664956595!3d10.632483857590934!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m11!3e6!4m3!3m2!1d10.781518199999999!2d106.64092009999999!4m5!1s0x31756ff0804234a7%3A0x28b45edcfda5a210!2zcGV0cHJvIHbFqW5nIHTDoHU!3m2!1d10.367372699999999!2d107.0863493!5e0!3m2!1svi!2s!4v1637736016173!5m2!1svi!2s";
        //     }
        //     if (selected == 7) {
        //         iframe.src =
        //             "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.0682095103025!2d106.63397644936916!3d10.806087892263593!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3175295a42ddf22d%3A0x713a42fd81fa1b40!2zQuG7h25oIFZp4buHbiBUaMO6IFkgUGV0IFBybyBD4buZbmcgSMOyYQ!5e0!3m2!1svi!2s!4v1637734097050!5m2!1svi!2s";
        //     }

        //     // console.log(iframe);
        // }
    </script>
@endsection
