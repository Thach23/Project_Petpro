@if ($recruits == null || count($recruits) == 0)
    <div class="container mx-auto text-center">Không có dữ liệu</div>
@else
    @foreach ($recruits as $val)
        <div
            class="flex items-center justify-between w-full px-4 pt-4 pb-6 border-b border-gray-200 md:px-8 md:pt-8 last:border-0">
            <div>
                <h4 class="text-blue-600 text-[16px] leading-7">{{ $val->Title }}</h4>
                <u>
                    <p class="mt-2 text-sm opacity-50">{{ $val->Description }}</p>
                </u>
            </div>
            <a href="{{ route('ChiTietTuyenDung', ['id' => $val->Temp_1]) }}"
                class="uppercase text-blue-600 text-sm md:text-lg font-medium tracking-[0.05em] min-w-[120px] w-[120px] md:min-w-[180px] md:w-[180px] h-[44px] border border-blue-600 flex justify-center items-center rounded-full text-center whitespace-nowrap">ứng
                tuyển</a>
        </div>
    @endforeach
@endif
