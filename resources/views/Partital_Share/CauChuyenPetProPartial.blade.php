@if ($CauChuyenblogs == null || count($CauChuyenblogs) == 0)
    <div class="row text-center">Không có dữ liệu</div>
@else
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
        @foreach ($CauChuyenblogs as $val)
            <div
                class="flex flex-col items-center px-6 text-center sm:text-left sm:flex-row sm:px-0 about-item js-hover">
                <div class="w-[160px] sm:w-[282px] min-w-[160px] sm:min-w-[282px]">
                    <a href="{{ route('DieuHuongCauChuyen', ['slug' => $val->Slug]) }}">
                        <img class="w-full transition-all img" src="{{ $val->BlogImage }}" alt="{{ $val->Title }}">
                    </a>
                </div>
                <div class="flex flex-col ml-0 text-left sm:ml-6">
                    @if ($val->Slug == 'gioi-thieu-benh-vien')
                        <img class="block w-6 mt-4 sm:w-9 sm:m-0" src="/assets/icon-about-blue.1414e375.svg"
                            alt="icon câu chuyện Pet Pro">
                    @elseif($val->Slug == 'trang-thiet-bi-hien-dai')
                        <img class="block w-6 mt-4 sm:w-14 sm:m-0" src="/assets/icon-thietbi-blue.0dfeeb50.svg"
                            alt="icon câu chuyện Pet Pro">
                    @elseif($val->Slug == 'doi-ngu-bac-si')
                        <img class="block w-6 mt-4 sm:w-11 sm:m-0" src="/assets/icon-doctor-blue.64eb5e46.svg"
                            alt="icon câu chuyện Pet Pro">
                    @else
                        <img class="block w-6 mt-4 sm:w-13 sm:m-0" src="/assets/icon-chat-blue.e1aa4e4e.svg"
                            alt="icon câu chuyện Pet Pro">
                    @endif
                    <a href="{{ route('DieuHuongCauChuyen', ['slug' => $val->Slug]) }}"
                        class="mt-3 text-base text-blue-200 capitalize sm:text-2xl hover:text-blue-600">{{ $val->Title }}</a>
                    <p class="mt-2 text-xs text-gray-600 sm:mt-4 sm:text-sm">
                        {{ $val->Description }}
                    </p>
                </div>
            </div>
        @endforeach
    </div>
@endif
