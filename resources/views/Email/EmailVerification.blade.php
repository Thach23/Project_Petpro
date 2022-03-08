<h1>Chúng tôi đã gửi cho bạn mã xác nhận</h1>
<form action="{{route('activemail')}}"></form>
    <label for="">Mã xác nhận của bạn là:</label>
    <input type="hidden" name="Id" value="{{$users['Id']}}">
    <input type="text" name="ConfirmToken" value="{{$users['ConfirmToken']}}">