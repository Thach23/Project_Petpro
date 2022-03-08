@if ($ChuyenKhoablogs == null || count($ChuyenKhoablogs) == 0)
    <div class="row text-center">Không có dữ liệu</div>
@else
    <div class="grid grid-cols-1 gap-4 mt-10 sm:grid-cols-2 lg:grid-cols-3 lg:gap-9">
        @foreach ($ChuyenKhoablogs as $val)
            <a href="{{ route('chuyenkhoaGroup', ['slug' => $val->Slug]) }}" class="relative mt-4">
                <img class="max-w-full rounded-full w-[160px] h-[160px] md:w-[300px] md:h-[300px] mx-auto pointer-events-none"
                    src="{{ $val->ImageUrl }}" alt="{{ $val->Title }}">
                <div class="text-base md:text-[28px] leading-[42px] text-blue-200 mt-3 md:mt-6 text-center capitalize">
                    {{ $val->Title }}
                </div>
            </a>
        @endforeach
    </div>
@endif
