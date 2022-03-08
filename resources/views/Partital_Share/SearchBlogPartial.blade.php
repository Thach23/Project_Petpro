<form id="form" action="{{ route('TimKiemKienThuc') }}" method="get" enctype="multipart/form-data">
    <div class="input-search w-[343px] max-w-full h-10 mb-9">
        <input
            class="w-full h-full leading-10 border border-gray-60 outline-none rounded-[4px] text-[14px] py-2 pr-2 pl-12"
            placeholder="Tìm kiếm bài viết" name="key" id="key" value="{{ $key }}">
    </div>
</form>
