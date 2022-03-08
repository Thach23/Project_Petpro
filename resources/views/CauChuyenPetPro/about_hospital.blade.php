@extends('_LayoutShare._layouthome',['Meta' => $Meta])
@section('content')
    <main>

        <!-- breadcrumb -->
        @foreach ($data as $val)
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
                <span class="text-gray-250">Giới thiệu bệnh viện</span>
                <h1 class="text-blue-200 text-4xl md:text-[42px] capitalize leading-tight">Giới thiệu bệnh viện
                </h1>
            </div>
        </div>
        </div>

        <!-- su menh -->
        <div class="container mx-auto">
            <div class="w-full pt-[34px]">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-[24px]">
                    <div class="flex items-center lg:pt-0">
                        <div class="">
                            <h2 class="text-[28px] sm:text-5xl mb-[15px] text-blue-200 uppercase">sứ mệnh & tầm nhìn</h2>
                            <h4 class="text-[22px] sm:text-[24px] mb-[10px]">Nâng tầm sức khoẻ cho thú cưng Việt!</h4>
                            {{-- <p class="mb-[15px]">
                                @foreach ($data as $val)
                                    @if ($val->Description == 'noidung_1')
                                        {{ $val->Value }}
                                    @endif
                                @endforeach
                            </p> --}}
                            @foreach ($data as $val)
                                @if ($val->Description == 'noidung_1' && $val->IsPublic == true)
                                    @if ($val->Value != null)
                                        {!! html_entity_decode($val->Value) !!}
                                    @endif
                                @endif
                            @endforeach
                            <div class="grid grid-cols-1 xl:grid-cols-2">
                                <div class="flex py-[15px]">
                                    <img class="mr-[12px] h-[25px] w-[25px]"
                                        src="data:image/jpeg;base64,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"
                                        alt="hài lòng và tín nhiệm">
                                    <span>Hài lòng & Tín nhiệm</span>
                                </div>
                                <div class="flex py-[15px]">
                                    <img class="mr-[12px] h-[25px] w-[25px]"
                                        src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAgEASABIAAD/2wBDAAEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQH/2wBDAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQH/wAARCAAZABkDAREAAhEBAxEB/8QAHwAAAQUBAQEBAQEAAAAAAAAAAAECAwQFBgcICQoL/8QAtRAAAgEDAwIEAwUFBAQAAAF9AQIDAAQRBRIhMUEGE1FhByJxFDKBkaEII0KxwRVS0fAkM2JyggkKFhcYGRolJicoKSo0NTY3ODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqDhIWGh4iJipKTlJWWl5iZmqKjpKWmp6ipqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uHi4+Tl5ufo6erx8vP09fb3+Pn6/8QAHwEAAwEBAQEBAQEBAQAAAAAAAAECAwQFBgcICQoL/8QAtREAAgECBAQDBAcFBAQAAQJ3AAECAxEEBSExBhJBUQdhcRMiMoEIFEKRobHBCSMzUvAVYnLRChYkNOEl8RcYGRomJygpKjU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6goOEhYaHiImKkpOUlZaXmJmaoqOkpaanqKmqsrO0tba3uLm6wsPExcbHyMnK0tPU1dbX2Nna4uPk5ebn6Onq8vP09fb3+Pn6/9oADAMBAAIRAxEAPwD+iT/gqF/wVO1/9nDxJN+z/wDs+/2Yfixb2Npe+O/HOqWdrq9n4Bg1awiv9I0XQ9IuvOsdQ8WXdhd2ur3d1rNtc6To2nT2MI03Vb3U5X0P+y/o5/RuwXH2Xx4444+sf6sVK1WjkuTYatUwtXO54WtKhisXjMVS5K1DLKValVwtKnhKlPFYvEQrTeIw1HDxWM/gz6U/0rcw8Nczn4eeHn1X/W6nQo18/wA+xdCljKPD8MZh4YjB4LAYOtz4fE5vWw9aljK1XG0quDwWGqUILDYyvipywH89Lft4/tpNrp8RH9qX46f2g1wbk26/EnxOuheYW3bR4XXUB4ZW3z0tF0gWoX5RCF4r+6F4LeEiwSwH/EN+DPYKHs/aPh/LnjeW1rvMnQ/tFz/6evFe1vrz31P86n4++Nrx7zL/AIitx59YdT2vs1xNmiwHM3eyypYhZWqf/TlYNUUtFC2h/QN/wS//AOCpvin4/eLrf9nX9oxtPb4n3VjezeBPH9rZ2ui/8Jtc6PbS3mqeGvEejWNta6Zp/ieHTra71KwvtNgsdP1aCzvLGXT7PVIbRtY/h76Rf0bst4Iyupx5wEq64dp1qMM6ySpVqYv+yKeKqRpYbMMBi61SpiK+XTr1KWHr0cROtXw06tKtGvVw06qwn+hv0WfpW5r4hZxT8OPEl4Z8U1aFeeQcQ0qFLBf25UwdKdbFZZmWCoUqWFw+aQw1KticPiMNTw+HxdOhWoTw9HFwovG/vJX8Wn99n8KHxotvAWv/APBRf4xWH7SWteKfDvw5v/2nfiXp/j/XPDENtL4i0fw0PG2u2lhdadHNZ6lD9js7RNMEk0On6nPHoqS3FhY6jdrb28/+zXCVTOsF4DcK1vD/AAmW4/PqPh3w/XyPB5jOpHAYvMP7IwdWtTryhVw8va1arxHLCdfDwljHGnWrUKTnOH+C3G1Lh/MPpI8Z4fxMx2bZbw1iPFHifD8Q4/K4Up5lgss/tzH0cPVw0Z0cTD2NGksLzThhsVUjgVOph6GJrKnTqfopYfscfsx/8E8bvWP2rPjv8QvDX7QXhAX0Wpfsd/DTQri1ubn4rXFxYWmsaL4o8WgQTaRNZ+HvtlqLq+sU1HwvbiKLxFMl1faj4e8J3H4NX8V/ETx1pYTw04LyLMOB81dGWH8VeIMZTqU6fDNOnWq4TF5dlnvwxUKuO9lV9nRrOhmVRylgIOnRw+OzOn/R+H8GPC76OdbG+LXH3EWWeImTe3hifBnhjAVKVWrxbUqYejjcFmub2pzwc6OXe3o+1xFCOJyqmoQzKcauIxWW5RV/Nv4c/Gb4j/Hz/goJ8KvjPfQ2Fv8AETx9+0h8LdYFn4dshYaXaTN4w8OadZ6daWyM0n2C00q2gsbq6vJ57u8t4ri+1a8ubqe7u5P3/PuE8g4J8DeJeEqM688iyTgDiTC+1x9b2+JqwWVY+vVr1ajSj7eriak61OnRhClSqShRwtKnShSpR/mjhvjXiXxA+kPwlxtiIYenxHxB4l8KYz2OW0Pq+Fozec5bhqOGo0k3L6vRwlKnQq1a9SpWrU4VK+Mr1a1StWl/d/X+L5/vifz6f8FVv+CXfjP4zeML79pT9nTTIdb8aarZWUPxM+G8c0FnfeIrjSbGOwsvF3hSS5khs59YbTLSz0/WtCeS2fUTZwapp7XOq3F/Dd/3H9Gr6RuU8J5VR8P+PMRLB5RhqtafD2fyjOrRwEMVWlXrZXmcacZVYYRYirVr4TGKNRUPazw1dU8NChOl/nh9LH6K+dca5ziPE3w3wsMdneLoUIcUcMxnToV8yqYOhHD0M4ymVWUKNTGvC0qOHx2AlKlLE+xp4rDuri6mIhW/ntvf2eP2pLzWNP8ABGofBH483muaSkunaT4Wuvh14/ur7ToHu5pJbXTNJk0iSS1tZL555nW0hS3kuHlmO53dz/c1Hjvw3pYWvnFDjDgqlg8U44jFZjTz7JKdGvNUoqNTEYmOKjGpVjRjCKdWbqRhGMNEkj/Oyv4c+KtbGYfI8RwNx/Wx2EjLDYPKqvDfENXEYanKtOU6WFwksHKVKlKvKpNqjCNOVSU56ttv+gX/AIJW/wDBLbxx8I/GunftJftHaYvh3xZocFz/AMKy+GrXNpeajpF5qNnPZXXizxfJaPcWtnfQ2FzNb6HoUFzNdW01zNf6v9iu7S1sm/h76Sf0j8n4oyivwBwDiHj8sxk6f+sPECp1KVDFUqFWFanlmVxqqnVq0Z1qcKmMxs6cKdSNOFHC+1pVKlU/0M+ih9FTPeD87w3iZ4lYVZbm+Ap1f9V+GHVpVsTg62Jo1KFXN84lRlUo0a8MPVnTwGAhVnVpTqzxGM9hWo0qD/oYr+Fz/RYKACgAoAKAAP/Z"
                                        alt="nâng cao sức khỏe">
                                    <span>Nâng cao sức khoẻ</span>
                                </div>
                                <div class="flex py-[15px]">
                                    <img class="mr-[12px] h-[25px] w-[25px]"
                                        src="data:image/jpeg;base64,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"
                                        alt="dịch vụ tận tình">
                                    <span>Dịch vụ tận tình</span>
                                </div>
                                <div class="flex py-[15px]">
                                    <img class="mr-[12px] h-[25px] w-[25px]"
                                        src="data:image/jpeg;base64,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"
                                        alt="trang thiết bị tân tiến">
                                    <span>Trang thiết bị tân tiến</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        @foreach ($data as $val)
                            @if ($val->Description == 'anh_1' && $val->IsPublic == true)
                                <img class="w-full" src="{{ $val->Value }}" alt="Doctor">
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- chung nhan -->
        <div class="pr-0 pl-6 lg:pr-6 pt-8 pb-[50px]">
            <div class="mb-8 title">
                <h2>các chứng nhận</h2>
                <img src="/assets/icon-foot.48e78dce.svg" alt="các chứng nhận">
            </div>
            @include('Partital_Share.ChungNhanPartial')
        </div>


        @include('Partital_Share.CounterPartial')

        <!-- cau chuyen petpro -->
        <div class="container mx-auto">
            <div class="w-full mt-10 mb-13 lg:mb-20">
                <div class="text-center">
                    <h2 class="text-[48px] text-blue-200 leading-[55px] md:leading-[72px] capitalize">Câu Chuyện Về PetPro
                    </h2>
                    <img class="block mx-auto mt-3" src="/assets/icon-foot.2549ce2f.svg" alt="Câu Chuyện Về PetPro">
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-5 gap-11 pt-9">
                    <div class="lg:col-span-3">
                        <div class="relative w-full js-hover">
                            @foreach ($data as $val)
                                @if ($val->Description == 'video_2_1' && $val->IsPublic == true)
                                    @if ($val->Value != null)
                                        <img class="relative invisible w-full opacity-0" src="/assets/poster.23fec723.jpg"
                                            alt="Câu Chuyện Petpro">

                                        <div
                                            class="absolute top-0 left-0 z-0 w-full h-full transition-all bg-center bg-cover bg-about-video bg">
                                        </div>
                                        <div
                                            class="absolute top-0 left-0 z-10 w-full h-full bg-black pointer-events-none bg-opacity-30">
                                        </div>

                                        <div
                                            class="absolute top-0 z-20 flex flex-col items-center justify-center w-full h-full">


                                            <iframe class="absolute top-0 left-0 w-full h-full" width="100%" height="100%"
                                                src="{{ $val->Value }}" title="YouTube video player" frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen>
                                            </iframe>
                                        </div>
                                    @endif
                                @endif
                            @endforeach
                        </div>

                        @foreach ($data as $val)
                            @if ($val->Description == 'anh_2_2' && $val->IsPublic == true)
                                @if ($val->Value != null)
                                    <img class="w-full my-5" src="{{ $val->Value }}" alt="Petpro staff">
                                @endif
                            @endif
                        @endforeach
                    </div>
                    @foreach ($data as $val)
                        @if ($val->Description == 'noidung_2' && $val->IsPublic == true)
                            @if ($val->Value != null)
                                <div class="text-justify lg:col-span-2 lg:px-0">
                                    {!! html_entity_decode($val->Value) !!}
                                </div>
                            @endif
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

        <!-- booking & FAQ-->
        @include('Partital_Share.AboutPartial',[ 'dsChuyenKhoa' => $dsChuyenKhoa], ['QNA' => $QNA])
    </main>
@endsection
