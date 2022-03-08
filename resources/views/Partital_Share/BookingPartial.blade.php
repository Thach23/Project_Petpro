<form id="myForm" action="{{ route('XacNhanDatLich') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-[15px] mb-[15px]">
        @if ($dsChuyenKhoa == null || count($dsChuyenKhoa) == 0)
            <select required
                class="w-full h-[44px] outline-none border-[1.5px] border-solid pl-[8px] pr-[12px] py-[10px] border-gray-130 rounded-[4px] placeholder:text-gray-600 bg-white">
                <option value="">Không có dữ liệu</option>
                <option value="">Không có dữ liệu</option>
            </select>
        @else
            <select required id="department" name="department"
                class="w-full h-[44px] outline-none border-[1.5px] border-solid pl-[8px] pr-[12px] py-[10px] border-gray-130 rounded-[4px] placeholder:text-gray-600 bg-white">
                <option value="null">Chọn chuyên khoa</option>
                @foreach ($dsChuyenKhoa as $val)
                    <option value="{{ $val->Title }}">{{ $val->Title }}</option>
                @endforeach
            </select>
        @endif

        <select required id="pet" name="pet"
            class="w-full h-[44px] outline-none border-[1.5px] border-solid pl-[8px] pr-[12px] py-[10px] border-gray-130 rounded-[4px] placeholder:text-gray-600 bg-white">
            <option value="null">Chọn thú nuôi</option>
            <option value="Chó">Chó</option>
            <option value="Mèo">Mèo</option>
            <option value="Khác">Khác</option>
        </select>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-[16px] pb-[17px]">
        <input
            class="w-full outline-none h-[44px] border-[1.5px] px-[12px] py-[10px] border-gray-130 rounded-[4px]  placeholder:text-gray-600"
            placeholder="Tên" type="text" id="name" name="name"
            pattern="[A-z\s_áàảãạâấầẩẫậăắằẳẵặđéèẻẽẹêếềểễệíìỉĩịóòỏõọôốồổỗộơớờởỡợúùủũụưứừửữựýỳỷỹỵÁÀẢÃẠÂẤẦẨẪẬĂẮẰẲẴẶĐÉÈẺẼẸÊẾỀỂỄỆÍÌỈĨỊÓÒỎÕỌÔỐỒỔỖỘƠỚỜỞỠỢÚÙỦŨỤƯỨỪỬỮỰÝỲỶỸỴ]{2,30}">
        <input
            class="w-full outline-none h-[44px] border-[1.5px] px-[12px] py-[10px] border-gray-130 rounded-[4px]  placeholder:text-gray-600"
            placeholder="Email" type="email" id="email" name="email" pattern="[A-Za-z0-9._%+-]+@[a-z]+\.[a-z]{3}">
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-[16px] pb-[17px]">
        <input
            class="w-full outline-none h-[44px] border-[1.5px] px-[12px] py-[10px] border-gray-130 rounded-[4px]  placeholder:text-gray-600"
            placeholder="Số Điện Thoại" type="tel" id="phone" name="phone" pattern="[0-9]{9,13}">
        <input
            class="w-full outline-none h-[44px] border-[1.5px] px-[12px] py-[10px] border-gray-130 rounded-[4px]  placeholder:text-gray-600 required:invalid:text-gray-220"
            type="date" id="date" name="date">
    </div>
    <div class="grid grid-cols-1 pb-[17px]">
        <select required id="location" name="location"
            class="w-full h-[44px] outline-none border-[1.5px] border-solid pl-[8px] pr-[12px] py-[10px] border-gray-130 rounded-[4px] placeholder:text-gray-600 bg-white">
            <option value="null">Chọn nơi khám</option>
            <option value="Cơ sở 1 - 192/7 Phú Thọ Hòa, P. Phú Thọ Hòa, Q. Tân Phú, TP. HCM">192/7 Phú Thọ
                Hòa, P. Phú Thọ Hòa, Q. Tân Phú, TP. HCM</option>
            <option value="Cơ sở 2 - 387-389 Cộng Hòa, P. 13, Q. Tân Bình, TP. HCM">387-389 Cộng Hòa, P. 13,
                Q. Tân Bình, TP. HCM</option>
            <option value="Cơ sở 3 - 111 Trường Chinh, P. 12, Q. Tân Bình, TP. HCM">111 Trường Chinh, P. 12,
                Q. Tân Bình, TP. HCM</option>
            <option value="Cơ sở 4 - 216 Nguyễn Thị Tú, P. Bình Hưng Hòa B, Q. Bình Tân, TP. HCM">216 Nguyễn
                Thị Tú, P. Bình Hưng Hòa B, Q. Bình Tân, TP. HCM</option>
            <option value="Cơ sở 5 - 493 Đường Kinh Dương Vương, Khu Phố 6, Phường An Lạc, Q. Bình Tân, TP. HCM">493
                Đường Kinh Dương Vương, Khu Phố 6, Phường An Lạc, Q. Bình Tân, TP. HCM
            </option>
            <option value="Cơ sở 6 - 383 Đường Nguyễn An Ninh, Khu Phố 6, Phường 9, TP. Vũng Tàu, Bà Rịa – Vũng
            Tàu">383 Đường Nguyễn An Ninh, Khu Phố 6, Phường 9, TP. Vũng Tàu, Bà Rịa – Vũng
                Tàu</option>
            <option value="Cơ sở 7 - 145 Trần Quý, Phường 4, Quận 11, TP. HCM`">145 Trần Quý, Phường 4, Quận
                11, TP. HCM</option>
        </select>
    </div>
    <div class="grid grid-cols-1 pb-[17px]">
        <textarea
            class="w-full outline-none h-[100px] px-[12px] py-[10px] border-[1.5px] border-gray-130 rounded-[4px] placeholder:text-gray-600"
            placeholder="Nhập nội dung" id="text" name="text"></textarea>
    </div>
    <div class="flex justify-end w-full pt-2">
        <button
            class="w-full sm:w-[240px] outline-none h-[45px] text-center border-blue-600 uppercase border-[2px] text-blue-600 rounded-full text-lg bg-transparent"
            id="btnSend" type="button" onclick="showThongBao()">GỬI
            YÊU CẦU</button>
    </div>
</form>

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
                <button type="button" style="border-radius: 5px; background-color: #008CDD" class="btn btn-secondary"
                    data-dismiss="modal" onclick="Close()">Đóng</button>
            </div>
        </div>
    </div>
</div>

<div id="modalConfirmBooking" class="modal" role="dialog" aria-hidden="true" tabindex="-1">
    <div class="modal-content">
        <div class="modal-body">
            <div class="text-center">
                <img class="w-[88px] h-[88px] block mx-auto" src="/assets/booking.d552112e.svg" alt="">
                <h3 class="mt-5 text-xl font-medium leading-6 text-blue-200">Xác Nhận Đặt Lịch Hẹn</h3>
                <p class="mt-4 text-sm leading-[22px]">
                    Bạn đã gửi yêu cầu thành công!
                    <br>Chúng tôi sẽ liên hệ với bạn để xác nhận thông tin trong thời gian sớm nhất
                </p>
                <p class="inline-block mt-3 text-sm leading-5 text-blue-200">Hotline: 1800 5999 41</p>
                <p class="mt-5">
                    <a class="inline-block py-3 text-lg leading-none text-white uppercase bg-blue-200 rounded-full px-18"
                        aria-close href="javascript:void(0)" onclick="submit()">ok</a>
                </p>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
crossorigin="anonymous" referrerpolicy="no-referrer">
</script>
<script>
    function showThongBao(event) {
        const name_validate = document.getElementById('name');
        const phone_validate = document.getElementById('phone');
        const email_validate = document.getElementById('email');
        const date_validate = document.getElementById('date');
        const text_validate = document.getElementById('text');
        const department_validate = document.getElementById('department');
        const pet_validate = document.getElementById('pet');
        const location_validate = document.getElementById('location');

        var modal = document.getElementById('notification');

        if (department_validate.value == "null") {
            modal.value = "Vui lòng chọn chuyên khoa";
            $('#modal_show').show();
            return false;
        }

        if (pet_validate.value == "null") {
            modal.value = "Vui lòng chọn thú cưng";
            $('#modal_show').show();
            return false;
        }

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

        if (!phone_validate.checkValidity() || phone_validate.value == "") {
            if (!phone_validate.checkValidity()) {
                modal.value = "Số điện thoại không đúng định dạng. Vui lòng nhập lại";
                $('#modal_show').show();
                return false;
            } else {
                modal.value = "Vui lòng điền số điện thoại";
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

        if (location_validate.value == "null") {
            modal.value = "Vui lòng cơ sở khám";
            $('#modal_show').show();
            return false;
        }

        if (text_validate.value == "") {
            modal.value = "Vui lòng điền nội dung";
            $('#modal_show').show();
            return false;
        }


        if (date_validate.value == "") {
            modal.value = "Vui lòng chọn ngày hẹn";
            $('#modal_show').show();
            return false;
        }

        var today = new Date();
        var daychoose = new Date(date_validate.value)
        if (daychoose > today) {} else {
            modal.value = "Vui lòng chọn ngày lớn hơn hôm nay!";
            $('#modal_show').show();
            return false;
        }

        // $('#modalConfirmBooking').show();
        document.getElementById("btnSend").disabled = true
        $('#myForm').submit();

    }

    function Close() {

        // var modal = document.getElementById('notification');
        // modal.value = "";
        $('#modal_show').hide();
        $('#modalConfirmBooking').hide();
    }

    function submit() {
        // var email = document.getElementById('email').value;

        // $.ajax({
        //     type: 'POST',
        //     url: "{{ route('XacNhanDatLich') }}",
        //     datatype: 'json',
        //     data: {
        //         '_token': "{{ csrf_token() }}",
        //         'email': email,
        //     },
        //     success: function(data) {
        //         if (data.code === 200) {}
        //     },
        //     error: function(xhr, ajaxOptions, thrownError) {
        //         alert('Gửi thông tin thất bại.');
        //     }
        // });
        // const name_validate = document.getElementById('name');
        // const phone_validate = document.getElementById('phone');
        // const email_validate = document.getElementById('email');
        // const date_validate = document.getElementById('date');
        // const text_validate = document.getElementById('text');
        // const department_validate = document.getElementById('department');
        // const pet_validate = document.getElementById('pet');
        // const location_validate = document.getElementById('location');

        // name_validate.value = "";
        // phone_validate.value = "";
        // email_validate.value = "";
        // date_validate.value = "";
        // text_validate.value = "";
        // department_validate.value = "null";
        // pet_validate.value = "null";
        // location_validate.value = "null";
        $('#myForm').submit();
    }
</script>
