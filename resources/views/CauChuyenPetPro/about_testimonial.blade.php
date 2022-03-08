@extends('_LayoutShare._layouthome',['Meta' => $Meta])

@section('content')
    <main>

        <!-- breadcrumb -->
        @foreach ($Meta['collection'] as $val)
            @if ($val->Description == 'breadcrumb' && $val->IsPublic == true && $val->Value != null)
                <div class="relative w-full bg-center bg-cover"
                    style="background-image: radial-gradient(197.33% 2625.24% at 0 60.68%,#fff 0,hsla(0,0%,100%,0) 100%),url('{{ $val->Value }}')">
            @endif
        @endforeach
        <div class="container mx-auto">
            <div class="py-10 text-sm md:text-lg">
                <a href="{{ route('home') }}" class="text-gray-400 item">Trang chủ</a>
                <span class="text-gray-350 px-[5px]">></span>
                <a href="{{ route('CauChuyenPetPro') }}" class="text-gray-400 item">Câu Chuyện PetPro</a>
                <span class="text-gray-350 px-[5px]">></span>
                <span class="text-gray-250">Khách hàng nói về PetPro</span>
                <h1 class="text-blue-200 text-4xl md:text-[42px] capitalize leading-tight">Khách hàng nói về
                    PetPro</h1>
            </div>
        </div>
        </div>


        <!-- customer -->
        <div class="container mx-auto">
            <div class="grid grid-cols-1 gap-8 py-10 lg:grid-cols-2">
                <div class="items-center w-full sm:border sm:border-gray-100 sm:rounded-lg sm:flex">
                    @foreach ($data as $val)
                        @if ($val->Description == 'anh_2_1' && $val->IsPublic == true)
                            <img class="img-cus w-full m-auto sm:w-auto sm:h-full sm:rounded-l-lg" src="{{ $val->Value }}"
                                alt="{{ substr($val->Name, 0, 14) }}">
                        @endif
                    @endforeach

                    <div class="py-4 sm:p-4 lg:p-5 xl:p-10 bg-gray-80">
                        <img class="w-[20px] sm:w-[43px] pb-3"
                            src="data:image/jpeg;base64,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"
                            alt="">
                        @foreach ($data as $val)
                            @if ($val->Description == 'mota_2_1' && $val->IsPublic == true)
                                <p class="pb-3 text-base">{{ $val->Value }}</p>
                            @endif
                        @endforeach

                        @foreach ($data as $val)
                            @if ($val->Description == 'ten_2_1' && $val->IsPublic == true)
                                <p class="text-base text-gray-150">{{ $val->Value }}</p>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="items-center w-full sm:border sm:border-gray-100 sm:rounded-lg sm:flex">
                    @foreach ($data as $val)
                        @if ($val->Description == 'anh_2_2' && $val->IsPublic == true)
                            <img class="img-cus w-full m-auto sm:w-auto sm:h-full sm:rounded-l-lg" src="{{ $val->Value }}"
                                alt="{{ substr($val->Name, 0, 14) }}">
                        @endif
                    @endforeach

                    <div class="py-4 sm:p-4 lg:p-5 xl:p-10 bg-gray-80">
                        <img class="w-[20px] sm:w-[43px] pb-3"
                            src="data:image/jpeg;base64,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"
                            alt="">
                        @foreach ($data as $val)
                            @if ($val->Description == 'mota_2_2' && $val->IsPublic == true)
                                <p class="pb-3 text-base">{{ $val->Value }}</p>
                            @endif
                        @endforeach
                        @foreach ($data as $val)
                            @if ($val->Description == 'ten_2_2' && $val->IsPublic == true)
                                <p class="text-base text-gray-150">{{ $val->Value }}</p>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="items-center w-full sm:border sm:border-gray-100 sm:rounded-lg sm:flex">
                    @foreach ($data as $val)
                        @if ($val->Description == 'anh_2_3' && $val->IsPublic == true)
                            <img class="img-cus w-full m-auto sm:w-auto sm:h-full sm:rounded-l-lg"
                                src="{{ $val->Value }}" alt="{{ substr($val->Name, 0, 14) }}">
                        @endif
                    @endforeach
                    <div class="py-4 sm:p-4 lg:p-5 xl:p-10 bg-gray-80">
                        <img class="w-[20px] sm:w-[43px] pb-3"
                            src="data:image/jpeg;base64,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"
                            alt="Thú y Pet Pro">
                        @foreach ($data as $val)
                            @if ($val->Description == 'mota_2_3' && $val->IsPublic == true)
                                <p class="pb-3 text-base">{{ $val->Value }}</p>
                            @endif
                        @endforeach
                        @foreach ($data as $val)
                            @if ($val->Description == 'ten_2_3' && $val->IsPublic == true)
                                <p class="text-base text-gray-150">{{ $val->Value }}</p>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="items-center w-full sm:border sm:border-gray-100 sm:rounded-lg sm:flex">
                    @foreach ($data as $val)
                        @if ($val->Description == 'anh_2_4' && $val->IsPublic == true)
                            <img class="img-cus w-full m-auto sm:w-auto sm:h-full sm:rounded-l-lg"
                                src="{{ $val->Value }}" alt="{{ substr($val->Name, 0, 14) }}">
                        @endif
                    @endforeach
                    <div class="py-4 sm:p-4 lg:p-5 xl:p-10 bg-gray-80">
                        <img class="w-[20px] sm:w-[43px] pb-3"
                            src="data:image/jpeg;base64,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"
                            alt="">
                        @foreach ($data as $val)
                            @if ($val->Description == 'mota_2_4' && $val->IsPublic == true)
                                <p class="pb-3 text-base">{{ $val->Value }}</p>
                            @endif
                        @endforeach
                        @foreach ($data as $val)
                            @if ($val->Description == 'ten_2_4' && $val->IsPublic == true)
                                <p class="text-base text-gray-150">{{ $val->Value }}</p>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- bs hanh -->
        <div class="w-full bg-blue-500">
            <div class="container mx-auto">
                <div class="items-center md:flex">
                    @foreach ($data as $val)
                        @if ($val->Description == 'anh_1' && $val->IsPublic == true)
                            <img class="w-full" src="{{ $val->Value }}" alt="{{ substr($val->Name, 0, 14) }}">
                        @endif
                    @endforeach
                    <div>
                        <img class="w-[20px] py-5 md:py-0 md:pb-4 md:w-8 lg:w-[43px]"
                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACsAAAAlCAYAAADbVxCwAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAJxSURBVHgB7ZhPbtNAFMa/N3a6YWMOADgngBs03KBVYMGK5gRtT9D0BDQnaLtCKoqSDevmCOkJbAmJBRvMkkqe4Y1jI1cknvGfUYXqnxTZGT8/f36eeTPzCBZ8idTI97EvFUICQt2mgPg+xfmHIcVowWWkgmfAgSfwGpT5D3Q7EZaHL2hWtvWrnAQ+jqXECf8N+Ihc5F8GwHM+HKABnyMV7gmc5fcHhfPCv1IYcZDu3g9pVSlWR1IIXLLAEBWQjkYDFt/UGfueWpiO+Lcq/vwjds6OYOeoNjqaA4EFC32DBjwQ61oof/ZboPprVSGKk3mkjlwJ1ex5+IQWQjWZWP3W2HT2WpBCbGOXBULVH4jCe+g/E5uPyhD1SDiVzawsGwSCs8FKpFiW22jBKUoK/DTeDKx5YMwG+eg8tMyvWVQ5sxgNCVcyxTUPoniXf19a5Eklcf1uSEdogPLwkZTBSGIyHtKVwYrfWWDfYBM3FaphoaOq6/y1Tm2EaoSi6r7KziZoyE2kTPk05hnqApYIMsxS5emuLsU8vwvuXneogcAjQp55YJd5VLF16cW64r8S65sMbvQMtAPapJ4VGqJ3HVX+U54tyzsRmscqArVaDcX3Em+3bW/yRfwt2kC4GL+kU33aRTco1qluUDjh9cVUn3bVZ0MdRbhC4Hhz6I5GWxVLgq/f1asuxQZwTJ9nXdGLdUUv1hW9WFc8WbEJHPLjN34JJezqVSZ4Ybzc0rZGBy+hq0GTISXCS7O6QIw2SJxvK/dwW6KvoR2Jl9cuhH6I4MUzy9eRqRcFriLmFZXpLpOxLmLww7jQtkY9kqw4x9pYY3bvHwnR3luzr+RlAAAAAElFTkSuQmCC"
                            alt="">
                        <div class="pb-5 text-center sm:pb-0">
                            @foreach ($data as $val)
                                @if ($val->Description == 'mota_1' && $val->IsPublic == true)
                                    <h3 class="text-2xl italic text-white lg:text-4xl pb-11">{{ $val->Value }}
                                    </h3>
                                @endif
                            @endforeach

                            @foreach ($data as $val)
                                @if ($val->Description == 'ten_1' && $val->IsPublic == true)
                                    <span
                                        class="px-8 pt-5 text-blue-100 border-t border-gray-20">{{ $val->Value }}</span>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- customer -->
        <div class="container mx-auto">
            <div class="grid grid-cols-1 gap-8 py-10 pb-[20px] lg:grid-cols-2">
                <div class="items-center w-full sm:border sm:border-gray-100 sm:rounded-lg sm:flex">
                    @foreach ($data as $val)
                        @if ($val->Description == 'anh_2_5' && $val->IsPublic == true)
                            <img class="img-cus w-full m-auto sm:w-auto sm:h-full sm:rounded-l-lg"
                                src="{{ $val->Value }}" alt="{{ substr($val->Name, 0, 14) }}">
                        @endif
                    @endforeach
                    <div class="py-4 sm:p-4 lg:p-5 xl:p-10 bg-gray-80">
                        <img class="w-[20px] sm:w-[43px] pb-3"
                            src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAgEASABIAAD/2wBDAAEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQH/2wBDAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQH/wAARCAAmACsDAREAAhEBAxEB/8QAHwAAAQUBAQEBAQEAAAAAAAAAAAECAwQFBgcICQoL/8QAtRAAAgEDAwIEAwUFBAQAAAF9AQIDAAQRBRIhMUEGE1FhByJxFDKBkaEII0KxwRVS0fAkM2JyggkKFhcYGRolJicoKSo0NTY3ODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqDhIWGh4iJipKTlJWWl5iZmqKjpKWmp6ipqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uHi4+Tl5ufo6erx8vP09fb3+Pn6/8QAHwEAAwEBAQEBAQEBAQAAAAAAAAECAwQFBgcICQoL/8QAtREAAgECBAQDBAcFBAQAAQJ3AAECAxEEBSExBhJBUQdhcRMiMoEIFEKRobHBCSMzUvAVYnLRChYkNOEl8RcYGRomJygpKjU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6goOEhYaHiImKkpOUlZaXmJmaoqOkpaanqKmqsrO0tba3uLm6wsPExcbHyMnK0tPU1dbX2Nna4uPk5ebn6Onq8vP09fb3+Pn6/9oADAMBAAIRAxEAPwD+4L4r/F0eDpP7B0JIbnxC8aSXM06GS20qGZA8JaPKie8lRlliiY+VFEySzCQOsTfoXB3BX9uR/tHMJTpZZGcoUoU3y1cZOEuWdpWfs6EJJwnNLnnNShBx5XNfl/HfH/8Aq9P+y8rjTrZtKEZ16lWPPRwNOpHmp3hde1xFSLVSEJP2cIOM6impxg/lm4+Ivjy8vEvJPFeu/aFlEiJBfTW1uH3BgFsbUxWexmABhFv5br8jIU+Wv16nwxw7QoSoRyfL/ZODjJ1MPTq1eWzV3iKqnX5krtT9rzp+8pJ6n4fV4v4pxGIjiJ57mntVNTjGliqtGipcyaSw1F08PytpJ01S5JL3XFx0P0ZjLFELcMUUsCMfMQM8due3av5glZSklsm7ddL6a+h/X0G3GLl8Tim9La2V9OmvQ8A+K3xkfwrdP4d8Npb3GspGrX9/MBNb6Y0gDJbxwZ2z33lkSP5p8i3Vo1eOd3dIf0jg/geOcUY5nmkqlPAyk1h8PTvTqYtRdpVJVN6eH5k4x5P3lVqTjKnGMZT/ACnjrxDlkdeWUZPGlVzGME8ViqiVSlgnNXjShSvarieVqcvafuqScFKFWUpRp/Ntt8QvHVzrNjdSeKtekmN7bkRLqFwlqxaZAY/sETrZGOQfK8P2fy5FO1kYHFfqdXhrh6lgcRRjk+XRh7CqnN4ak6ytCTUvrM4uupR3jP2vNF6qSZ+O0OLeJ62Y4avPPc0lUeJovkWLrRoO9SKcfqsJRw3JJaSp+y5JLSUWj9FK/mM/ro/M3xVqE2reJde1G4ZmlvNX1CY72LFENzIIogT0SGIJDGo4WNFUYAFf1bk+Gp4PKsuwtNJQoYLDQ0VlKSpR55v+9OblOT3cpNvVn8Y57i6mOzrNcXVlKU6+YYup7zu4xdeahBP+WnTUacFtGEVFaJH3Z4K+HXhbw3o+mLFpGn3epC3trm51W7tILm9lvWjSV5Ypp43e2iSU/wCjwwFFiRUJ3y75X/nnPuJ83zTHYtzxuJo4X2tWlSwdGtUpUIUFKUIwnCnKMas5Q/izqKTm3K1ocsI/0/w5wjkeT5fgowwGEr4xUqNatjq9CnWxFTEuMZyqU6lWMpUYRn/Cp03GNOKj8U+acvRq+YPrz8vdRvbjV9UvdQnYvc6lfXF3KzHJM13O8rZP+9Ie2AOgAr+tsNQp4LCUMNTSjSwuHpUYJKyUKNNQVl6RP4mxeJq4/G4nF1W5VsZia2IqNvepiKsqkrv/ABSP0J8LfDzwt4VsLK2tNIsLi9tRHJJq11aW9xqM12oBe5F1LG0sP7wFoo4WjjgGFjUYJP8ANOb8TZvm+Ir1a2NxFOhWcoxwdGtUp4anRd1Gl7KElCfu6TnNSlUd3JvZf1nknCWR5HhcNRw+AwtXEUFCU8dXoUquLqV1Zyre3nBzp+9dwhTcYU1ZQiuvc18+fTH5e6r/AMhPUf8Ar/vP/SiSv62wf+6YX/sHof8ApqJ/E2P/AN+xv/YXiP8A09M92g/aL8TwRQwjQ9BZYY44gT/aAYrGoUEkXmMkDnjGe1fnlTwwympOc3mGYpzlKbS+rWTk2/8Anxeyb7n6fT8Xs7p06dNZZlbVOEYJtYu7UUo/9BNrtLt8j6Y8A+MYfHPhy31yO2azlM01peWpfzFhu7fYZBFLtUyQukkcsbFVZRJ5bAshJ/KeI8kqcP5pVy+VVV4ckK1Cso8rnRqc3K5wu+WcZRlCSTabjzLSSS/Z+FeIafE2T0czhReHqOpUw+IoOXPGnXpcvP7Odk505RlCcG4ppS5ZXcW3+ciNsdHAyUZWA9dpBx+lf1BJc0ZR/mTX3qx/IEXyyjLflaf3O59ED9pDxRkZ0HQSMjIH9oAkdwCbw4PocHHoelfmT8Lsp6ZjmN+l/qz/AA9gr/evU/W14w53fXK8qt1t9bTt6/WHb7n6H0L4Y+I2i+IdC07WJVl0+W8jkM1myTXHkTQTy20qLPHCqyxmSFmifajNGyl0R9yL+aZtwvjsszHE4GDhiYUJxUK6lCl7SFSnCrBunKbcJKM0pxvJKSfLKUbSf61knF+XZtleEzCanhKmIhN1MO41K3sqlKrUoziqsKaU4uVNyhLli3Bx5oxleK/P/Vf+QnqP/X/ef+lElf0jg/8AdML/ANg9D/01E/lPH/79jf8AsLxH/p6ZQroOQ+3f2ev+RCm/7GDUf/SbT6/AvEv/AJKKH/Ytw3/p3En9LeE3/JLT/wCxri//AEzhT4ir99P5pCgD6Z+H3/IoaR/2/wD/AKdL2vyniX/kd43/ALlv/USgftPCX/JP5f8A9zf/AKm4k4Lxv8MdT0TxHqFvHfWE9tczS31o7PcpMLa5mkeNLhBasizx8o/lu6NgOCN2xfosg4swmPyvDVJYfE06tKnDD1oqNKUHVpQjGcqcnVUnTlvHmjGSvytO3M/luJeCsblub4unDE4SrRr1amKoSlKtGoqNapOUI1YqhKKqR1jLklKMrKSavyx5MeCtVJA+0afyQP8AW3Pf/t0r2Xn2DWvs8T/4BS/+XHgrhrHNpe1wmrt/Erdf+4B9u/C7wlN4N8JWul3N1Fd3VzPLqdy8AcW6SXaQhYYTIqSOkcUUQMjxxl5C5CKu0V+BcXZzDPM6rYulSnRo0qcMJSjUcfaSjRlNudRRcoxlKc52jGUko8q5m7s/pXgnIanDuQ0MDWrwr16tSpjK0qSkqUZ4iNO1Om5qM5RhCEE5yjBylzPlirI+QvFHwv1Tw9rd7piX1hcQRv5lrK0lysjWs2Xt/PUWhVZxEVEyozxh87HZcGv2vKOLcJmWAoYuWHxNOpOPLVgo0nBVoe7V9m/bXdPnvyOSjJxtzRTP5/zvgjG5TmWIwccThKtKEuehNzrKboVLype1j7DljVULe0UXKClflk0YC+CNVdlUXGn5ZgozLc4yTgZ/0Q8c16Tz/BpNunibJN/BS6K//P48qPDOPlJRVbCXk0lepWtdu3/QOfZng/4aWmh+G9K0zULuW5vbeGVrqW0cJbGa5uZrpkgEsHmmOLz/AClkcI0oTzTHEX8tfwvO+Kq2YZpjMXhqMKWHqzgqUK0XKqoUqVOipVHCpyKU/Z87jFyUObkUp8vM/wCiuH+DaGWZPgcFi6862Jo05utUoSUaLqVq1SvKNJTp87hT9r7OM5KMpqPO4Q5uSID/2Q=="
                            alt="">
                        @foreach ($data as $val)
                            @if ($val->Description == 'mota_2_5' && $val->IsPublic == true)
                                <p class="pb-3 text-base">{{ $val->Value }}</p>
                            @endif
                        @endforeach
                        @foreach ($data as $val)
                            @if ($val->Description == 'ten_2_5' && $val->IsPublic == true)
                                <p class="text-base text-gray-150">{{ $val->Value }}</p>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="items-center w-full sm:border sm:border-gray-100 sm:rounded-lg sm:flex">
                    @foreach ($data as $val)
                        @if ($val->Description == 'anh_2_6' && $val->IsPublic == true)
                            <img class="img-cus w-full m-auto sm:w-auto sm:h-full sm:rounded-l-lg"
                                src="{{ $val->Value }}" alt="{{ substr($val->Name, 0, 14) }}">
                        @endif
                    @endforeach
                    <div class="py-4 sm:p-4 lg:p-5 xl:p-10 bg-gray-80">
                        <img class="w-[20px] sm:w-[43px] pb-3"
                            src="data:image/jpeg;base64,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"
                            alt="">
                        @foreach ($data as $val)
                            @if ($val->Description == 'mota_2_6' && $val->IsPublic == true)
                                <p class="pb-3 text-base">{{ $val->Value }}</p>
                            @endif
                        @endforeach
                        @foreach ($data as $val)
                            @if ($val->Description == 'ten_2_6' && $val->IsPublic == true)
                                <p class="text-base text-gray-150">{{ $val->Value }}</p>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- booking & FAQ-->
        @include(
            'Partital_Share.AboutPartial',
            ['dsChuyenKhoa' => $dsChuyenKhoa],
            ['QNA' => $QNA]
        )
    </main>
@endsection
