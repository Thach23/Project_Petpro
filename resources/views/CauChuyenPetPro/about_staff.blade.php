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
                <span class="text-gray-250">Đội ngũ bác sĩ</span>
                <h1 class="text-blue-200 text-4xl md:text-[42px] capitalize leading-tight">Đội ngũ bác sĩ</h1>
            </div>
        </div>
        </div>


        <div class="container mx-auto">
            <!-- staff -->
            <div class="w-full py-[34px]">
                <div class="grid grid-cols-1 lg:grid-cols-10 gap-[24px]">
                    <div class="lg:col-span-6">
                        @foreach ($data as $val)
                            @if ($val->Description == 'anh_1' && $val->IsPublic == true)
                                <img class="w-full" src="{{ $val->Value }}" alt="Doctor">
                            @endif
                        @endforeach
                    </div>
                    <div class="flex items-center lg:col-span-4">
                        <div class="">
                            <h2 class="text-[28px] sm:text-5xl lg:text-3xl xl:text-5xl mb-[15px] text-blue-200 ">Đội ngũ bác
                                sĩ</h2>
                            <h4 class="text-[20px] sm:text-[24px] mb-[10px]">Bác sĩ và chuyên gia ưu tú với tay nghề cao!
                            </h4>
                            <p class="mb-[15px]">
                                @foreach ($data as $val)
                                    @if ($val->Description == 'noidung_1' && $val->IsPublic == true)
                                        {!! html_entity_decode($val->Value) !!}
                                    @endif
                                @endforeach
                            </p>
                            <div class="grid grid-cols-1 xl:grid-cols-2">
                                <div class="flex py-[15px]">
                                    <img class="mr-[12px] h-[25px] w-[25px]"
                                        src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAgEASABIAAD/2wBDAAEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQH/2wBDAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQH/wAARCAAZABkDAREAAhEBAxEB/8QAHwAAAQUBAQEBAQEAAAAAAAAAAAECAwQFBgcICQoL/8QAtRAAAgEDAwIEAwUFBAQAAAF9AQIDAAQRBRIhMUEGE1FhByJxFDKBkaEII0KxwRVS0fAkM2JyggkKFhcYGRolJicoKSo0NTY3ODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqDhIWGh4iJipKTlJWWl5iZmqKjpKWmp6ipqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uHi4+Tl5ufo6erx8vP09fb3+Pn6/8QAHwEAAwEBAQEBAQEBAQAAAAAAAAECAwQFBgcICQoL/8QAtREAAgECBAQDBAcFBAQAAQJ3AAECAxEEBSExBhJBUQdhcRMiMoEIFEKRobHBCSMzUvAVYnLRChYkNOEl8RcYGRomJygpKjU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6goOEhYaHiImKkpOUlZaXmJmaoqOkpaanqKmqsrO0tba3uLm6wsPExcbHyMnK0tPU1dbX2Nna4uPk5ebn6Onq8vP09fb3+Pn6/9oADAMBAAIRAxEAPwD+iT/gqF/wVO1/9nDxJN+z/wDs+/2Yfixb2Npe+O/HOqWdrq9n4Bg1awiv9I0XQ9IuvOsdQ8WXdhd2ur3d1rNtc6To2nT2MI03Vb3U5X0P+y/o5/RuwXH2Xx4444+sf6sVK1WjkuTYatUwtXO54WtKhisXjMVS5K1DLKValVwtKnhKlPFYvEQrTeIw1HDxWM/gz6U/0rcw8Nczn4eeHn1X/W6nQo18/wA+xdCljKPD8MZh4YjB4LAYOtz4fE5vWw9aljK1XG0quDwWGqUILDYyvipywH89Lft4/tpNrp8RH9qX46f2g1wbk26/EnxOuheYW3bR4XXUB4ZW3z0tF0gWoX5RCF4r+6F4LeEiwSwH/EN+DPYKHs/aPh/LnjeW1rvMnQ/tFz/6evFe1vrz31P86n4++Nrx7zL/AIitx59YdT2vs1xNmiwHM3eyypYhZWqf/TlYNUUtFC2h/QN/wS//AOCpvin4/eLrf9nX9oxtPb4n3VjezeBPH9rZ2ui/8Jtc6PbS3mqeGvEejWNta6Zp/ieHTra71KwvtNgsdP1aCzvLGXT7PVIbRtY/h76Rf0bst4Iyupx5wEq64dp1qMM6ySpVqYv+yKeKqRpYbMMBi61SpiK+XTr1KWHr0cROtXw06tKtGvVw06qwn+hv0WfpW5r4hZxT8OPEl4Z8U1aFeeQcQ0qFLBf25UwdKdbFZZmWCoUqWFw+aQw1KticPiMNTw+HxdOhWoTw9HFwovG/vJX8Wn99n8KHxotvAWv/APBRf4xWH7SWteKfDvw5v/2nfiXp/j/XPDENtL4i0fw0PG2u2lhdadHNZ6lD9js7RNMEk0On6nPHoqS3FhY6jdrb28/+zXCVTOsF4DcK1vD/AAmW4/PqPh3w/XyPB5jOpHAYvMP7IwdWtTryhVw8va1arxHLCdfDwljHGnWrUKTnOH+C3G1Lh/MPpI8Z4fxMx2bZbw1iPFHifD8Q4/K4Up5lgss/tzH0cPVw0Z0cTD2NGksLzThhsVUjgVOph6GJrKnTqfopYfscfsx/8E8bvWP2rPjv8QvDX7QXhAX0Wpfsd/DTQri1ubn4rXFxYWmsaL4o8WgQTaRNZ+HvtlqLq+sU1HwvbiKLxFMl1faj4e8J3H4NX8V/ETx1pYTw04LyLMOB81dGWH8VeIMZTqU6fDNOnWq4TF5dlnvwxUKuO9lV9nRrOhmVRylgIOnRw+OzOn/R+H8GPC76OdbG+LXH3EWWeImTe3hifBnhjAVKVWrxbUqYejjcFmub2pzwc6OXe3o+1xFCOJyqmoQzKcauIxWW5RV/Nv4c/Gb4j/Hz/goJ8KvjPfQ2Fv8AETx9+0h8LdYFn4dshYaXaTN4w8OadZ6daWyM0n2C00q2gsbq6vJ57u8t4ri+1a8ubqe7u5P3/PuE8g4J8DeJeEqM688iyTgDiTC+1x9b2+JqwWVY+vVr1ajSj7eriak61OnRhClSqShRwtKnShSpR/mjhvjXiXxA+kPwlxtiIYenxHxB4l8KYz2OW0Pq+Fozec5bhqOGo0k3L6vRwlKnQq1a9SpWrU4VK+Mr1a1StWl/d/X+L5/vifz6f8FVv+CXfjP4zeML79pT9nTTIdb8aarZWUPxM+G8c0FnfeIrjSbGOwsvF3hSS5khs59YbTLSz0/WtCeS2fUTZwapp7XOq3F/Dd/3H9Gr6RuU8J5VR8P+PMRLB5RhqtafD2fyjOrRwEMVWlXrZXmcacZVYYRYirVr4TGKNRUPazw1dU8NChOl/nh9LH6K+dca5ziPE3w3wsMdneLoUIcUcMxnToV8yqYOhHD0M4ymVWUKNTGvC0qOHx2AlKlLE+xp4rDuri6mIhW/ntvf2eP2pLzWNP8ABGofBH483muaSkunaT4Wuvh14/ur7ToHu5pJbXTNJk0iSS1tZL555nW0hS3kuHlmO53dz/c1Hjvw3pYWvnFDjDgqlg8U44jFZjTz7JKdGvNUoqNTEYmOKjGpVjRjCKdWbqRhGMNEkj/Oyv4c+KtbGYfI8RwNx/Wx2EjLDYPKqvDfENXEYanKtOU6WFwksHKVKlKvKpNqjCNOVSU56ttv+gX/AIJW/wDBLbxx8I/GunftJftHaYvh3xZocFz/AMKy+GrXNpeajpF5qNnPZXXizxfJaPcWtnfQ2FzNb6HoUFzNdW01zNf6v9iu7S1sm/h76Sf0j8n4oyivwBwDiHj8sxk6f+sPECp1KVDFUqFWFanlmVxqqnVq0Z1qcKmMxs6cKdSNOFHC+1pVKlU/0M+ih9FTPeD87w3iZ4lYVZbm+Ap1f9V+GHVpVsTg62Jo1KFXN84lRlUo0a8MPVnTwGAhVnVpTqzxGM9hWo0qD/oYr+Fz/RYKACgAoAKAAP/Z"
                                        alt="Tay nghề chuyên môn cao">
                                    <span>Tay nghề chuyên môn cao</span>
                                </div>
                                <div class="flex py-[15px]">
                                    <img class="mr-[12px] h-[25px] w-[25px]"
                                        src="data:image/jpeg;base64,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"
                                        alt="Luôn học hỏi và phát triển">
                                    <span>Luôn học hỏi và phát triển</span>
                                </div>
                                <div class="flex py-[15px]">
                                    <img class="mr-[12px] h-[25px] w-[25px]"
                                        src="data:image/jpeg;base64,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"
                                        alt="Hỗ trợ nhiệt tình tận tâm">
                                    <span>Hỗ trợ nhiệt tình tận tâm</span>
                                </div>
                                <div class="flex py-[15px]">
                                    <img class="mr-[12px] h-[25px] w-[25px]"
                                        src="data:image/jpeg;base64,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"
                                        alt="Yêu thương động vật">
                                    <span>Yêu thương động vật</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- doctors -->
            <div class="grid grid-cols-1 gap-16 py-10 lg:grid-cols-2">
                <div class="items-center w-full sm:border sm:border-gray-100 sm:rounded-lg sm:flex">
                    @foreach ($data as $val)
                        @if ($val->Description == 'anh_2_1' && $val->IsPublic == true)
                            <img class="img-cus w-full m-auto sm:w-auto sm:h-full xl:w-auto lg:h-auto sm:rounded-l-lg"
                                src="{{ $val->Value }}" alt="{{ substr($val->Name, 0, 16) }}">
                        @endif
                    @endforeach
                    <div class="py-4 sm:p-4 lg:p-5 xl:p-10 bg-gray-80">
                        @foreach ($data as $val)
                            @if ($val->Description == 'ten_2_1' && $val->IsPublic == true)
                                <h4 class="text-2xl xl:text-[28px] font-bold">{{ $val->Value }}</h4>
                            @endif
                        @endforeach
                        @foreach ($data as $val)
                            @if ($val->Description == 'khoa_2_1' && $val->IsPublic == true)
                                <h5 class="text-xl xl:text-[24px] pb-3 sm:pb-5">{{ $val->Value }}</h5>
                            @endif
                        @endforeach
                        @foreach ($data as $val)
                            @if ($val->Description == 'gioithieu_2_1' && $val->IsPublic == true)
                                <p class="text-base">{{ $val->Value }}</p>
                            @endif
                        @endforeach

                    </div>
                </div>
                <div class="items-center w-full sm:border sm:border-gray-100 sm:rounded-lg sm:flex">
                    @foreach ($data as $val)
                        @if ($val->Description == 'anh_2_2' && $val->IsPublic == true)
                            <img class="img-cus w-full m-auto sm:w-auto sm:h-full xl:w-auto lg:h-auto sm:rounded-l-lg"
                                src="{{ $val->Value }}" alt="{{ substr($val->Name, 0, 16) }}">
                        @endif
                    @endforeach
                    <div class="py-4 sm:p-4 lg:p-5 xl:p-10 bg-gray-80">
                        @foreach ($data as $val)
                            @if ($val->Description == 'ten_2_2' && $val->IsPublic == true)
                                <h4 class="text-2xl xl:text-[28px] font-bold">{{ $val->Value }}</h4>
                            @endif
                        @endforeach
                        @foreach ($data as $val)
                            @if ($val->Description == 'khoa_2_2' && $val->IsPublic == true)
                                <h5 class="text-xl xl:text-[24px] pb-3 sm:pb-5">{{ $val->Value }}</h5>
                            @endif
                        @endforeach
                        @foreach ($data as $val)
                            @if ($val->Description == 'gioithieu_2_2' && $val->IsPublic == true)
                                <p class="text-base">{{ $val->Value }}</p>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="items-center w-full sm:border sm:border-gray-100 sm:rounded-lg sm:flex">
                    @foreach ($data as $val)
                        @if ($val->Description == 'anh_2_3' && $val->IsPublic == true)
                            <img class="img-cus w-full m-auto sm:w-auto sm:h-full xl:w-auto lg:h-auto sm:rounded-l-lg"
                                src="{{ $val->Value }}" alt="{{ substr($val->Name, 0, 16) }}">
                        @endif
                    @endforeach
                    <div class="py-4 sm:p-4 lg:p-5 xl:p-10 bg-gray-80">
                        @foreach ($data as $val)
                            @if ($val->Description == 'ten_2_3' && $val->IsPublic == true)
                                <h4 class="text-2xl xl:text-[28px] font-bold">{{ $val->Value }}</h4>
                            @endif
                        @endforeach
                        @foreach ($data as $val)
                            @if ($val->Description == 'khoa_2_3' && $val->IsPublic == true)
                                <h5 class="text-xl xl:text-[24px] pb-3 sm:pb-5">{{ $val->Value }}</h5>
                            @endif
                        @endforeach
                        @foreach ($data as $val)
                            @if ($val->Description == 'gioithieu_2_3' && $val->IsPublic == true)
                                <p class="text-base">{{ $val->Value }}</p>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="items-center w-full sm:border sm:border-gray-100 sm:rounded-lg sm:flex">
                    @foreach ($data as $val)
                        @if ($val->Description == 'anh_2_4' && $val->IsPublic == true)
                            <img class="img-cus w-full m-auto sm:w-auto sm:h-full xl:w-auto lg:h-auto sm:rounded-l-lg"
                                src="{{ $val->Value }}" alt="{{ substr($val->Name, 0, 16) }}">
                        @endif
                    @endforeach
                    <div class="py-4 sm:p-4 lg:p-5 xl:p-10 bg-gray-80">
                        @foreach ($data as $val)
                            @if ($val->Description == 'ten_2_4' && $val->IsPublic == true)
                                <h4 class="text-2xl xl:text-[28px] font-bold">{{ $val->Value }}</h4>
                            @endif
                        @endforeach
                        @foreach ($data as $val)
                            @if ($val->Description == 'khoa_2_4' && $val->IsPublic == true)
                                <h5 class="text-xl xl:text-[24px] pb-3 sm:pb-5">{{ $val->Value }}</h5>
                            @endif
                        @endforeach
                        @foreach ($data as $val)
                            @if ($val->Description == 'gioithieu_2_4' && $val->IsPublic == true)
                                <p class="text-base">{{ $val->Value }}</p>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="items-center w-full sm:border sm:border-gray-100 sm:rounded-lg sm:flex">
                    @foreach ($data as $val)
                        @if ($val->Description == 'anh_2_5' && $val->IsPublic == true)
                            <img class="img-cus w-full m-auto sm:w-auto sm:h-full xl:w-auto lg:h-auto sm:rounded-l-lg"
                                src="{{ $val->Value }}" alt="{{ substr($val->Name, 0, 16) }}">
                        @endif
                    @endforeach
                    <div class="py-4 sm:p-4 lg:p-5 xl:p-10 bg-gray-80">
                        @foreach ($data as $val)
                            @if ($val->Description == 'ten_2_5' && $val->IsPublic == true)
                                <h4 class="text-2xl xl:text-[28px] font-bold">{{ $val->Value }}</h4>
                            @endif
                        @endforeach
                        @foreach ($data as $val)
                            @if ($val->Description == 'khoa_2_5' && $val->IsPublic == true)
                                <h5 class="text-xl xl:text-[24px] pb-3 sm:pb-5">{{ $val->Value }}</h5>
                            @endif
                        @endforeach
                        @foreach ($data as $val)
                            @if ($val->Description == 'gioithieu_2_5' && $val->IsPublic == true)
                                <p class="text-base">{{ $val->Value }}</p>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="items-center w-full sm:border sm:border-gray-100 sm:rounded-lg sm:flex">
                    @foreach ($data as $val)
                        @if ($val->Description == 'anh_2_6' && $val->IsPublic == true)
                            <img class="img-cus w-full m-auto sm:w-auto sm:h-full xl:w-auto lg:h-auto sm:rounded-l-lg"
                                src="{{ $val->Value }}" alt="{{ substr($val->Name, 0, 16) }}">
                        @endif
                    @endforeach
                    <div class="py-4 sm:p-4 lg:p-5 xl:p-10 bg-gray-80">
                        @foreach ($data as $val)
                            @if ($val->Description == 'ten_2_6' && $val->IsPublic == true)
                                <h4 class="text-2xl xl:text-[28px] font-bold">{{ $val->Value }}</h4>
                            @endif
                        @endforeach
                        @foreach ($data as $val)
                            @if ($val->Description == 'khoa_2_6' && $val->IsPublic == true)
                                <h5 class="text-xl xl:text-[24px] pb-3 sm:pb-5">{{ $val->Value }}</h5>
                            @endif
                        @endforeach
                        @foreach ($data as $val)
                            @if ($val->Description == 'gioithieu_2_6' && $val->IsPublic == true)
                                <p class="text-base">{{ $val->Value }}</p>
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
