<div class="relative py-12">
    <div class="w-[830px] px-4 max-w-full mx-auto">
        <div class="text-center">
            <h2 class="text-[48px] text-center text-blue-200 leading-[55px] md:leading-[72px] capitalize">Câu hỏi
                thường gặp</h2>
            <img class="block mx-auto mt-3" src="/assets/icon-foot.2549ce2f.svg" alt="Câu Chuyện Về PetPro">
        </div>
        @if ($QNA == null || count($QNA) == 0)
            <div class="container mx-auto text-center">Không có dữ liệu</div>
        @else
            @foreach ($QNA as $item)
                @if ($item->IsPublic == true && $item->Description == 'quest_1' && $item->Value != null)
                    <div
                        class="w-full relative z-10 hover:z-20 border border-gray-150 hover:border-blue-200 js-collapse mt-[25px]">
                        <div
                            class="relative w-full py-3 pl-2 sm:pl-4 pr-[30px] sm:pr-[54px] text-[18px] js-collapse-title cursor-pointer">
                            @foreach ($QNA as $val)
                                @if ($val->Description == 'quest_1')
                                    {{ $val->Value }}
                                @endif
                            @endforeach
                            <button class="absolute right-0 top-0 sm:w-[54px] w-[30px] h-[54px] z-0">+</button>
                        </div>
                        @foreach ($QNA as $val)
                            @if ($val->Description == 'answer_1' && $val->IsPublic == true && $val->Value != null)
                                <div
                                    class="px-2 sm:px-4 py-4 sm:pr-[54px] text-base min-h-[120px] transition-all js-collapse-content border-t border-gray-150 hidden">
                                    {{ $val->Value }}
                                </div>
                            @else
                                @if (($val->Description == 'answer_1' && $val->IsPublic == false) || ($val->Description == 'answer_1' && $val->Value == null))
                                    <div
                                        class="px-2 sm:px-4 py-4 sm:pr-[54px] text-base min-h-[120px] transition-all js-collapse-content border-t border-gray-150 hidden">
                                        Không có dữ liệu
                                    </div>
                                @endif
                            @endif
                        @endforeach
                    </div>
                @else
                    @if (($item->IsPublic == false && $item->Description == 'quest_1') || ($item->Value == null && $item->Description == 'quest_1'))
                        <div class="mt-[25px]"></div>
                    @endif
                @endif
            @endforeach

            @foreach ($QNA as $item)
                @if ($item->IsPublic == true && $item->Description == 'quest_2' && $item->Value != null)
                    <div
                        class="w-full relative z-10 hover:z-20 border -mt-[1px] border-gray-150 hover:border-blue-200 js-collapse">
                        <div
                            class="relative w-full py-3 pl-2 sm:pl-4 pr-[30px] sm:pr-[54px] text-[18px] js-collapse-title cursor-pointer">
                            @foreach ($QNA as $val)
                                @if ($val->Description == 'quest_2')
                                    {{ $val->Value }}
                                @endif
                            @endforeach
                            <button class="absolute right-0 top-0 sm:w-[54px] w-[30px] h-[54px] z-0">+</button>
                        </div>
                        @foreach ($QNA as $val)
                            @if ($val->Description == 'answer_2' && $val->IsPublic == true && $val->Value != null)
                                <div
                                    class="px-2 sm:px-4 py-4 sm:pr-[54px] text-base min-h-[120px] transition-all js-collapse-content hidden border-t border-gray-150">
                                    {{ $val->Value }}
                                </div>
                            @else
                                @if (($val->Description == 'answer_2' && $val->IsPublic == false) || ($val->Description == 'answer_2' && $val->Value == null))
                                    <div
                                        class="px-2 sm:px-4 py-4 sm:pr-[54px] text-base min-h-[120px] transition-all js-collapse-content hidden border-t border-gray-150">
                                        Không có dữ liệu
                                    </div>
                                @endif
                            @endif
                        @endforeach
                    </div>
                @endif
            @endforeach

            @foreach ($QNA as $item)
                @if ($item->IsPublic == true && $item->Description == 'quest_3' && $item->Value != null)
                    <div
                        class="w-full relative z-10 hover:z-20 border -mt-[1px] border-gray-150 hover:border-blue-200 js-collapse">
                        <div
                            class="relative w-full py-3 pl-2 sm:pl-4 pr-[30px] sm:pr-[54px] text-[18px] js-collapse-title cursor-pointer">
                            @foreach ($QNA as $val)
                                @if ($val->Description == 'quest_3')
                                    {{ $val->Value }}
                                @endif
                            @endforeach
                            <button class="absolute right-0 top-0 sm:w-[54px] w-[30px] h-[54px] z-0">+</button>
                        </div>
                        @foreach ($QNA as $val)
                            @if ($val->Description == 'answer_3' && $val->IsPublic == true && $val->Value != null)
                                <div
                                    class="px-2 sm:px-4 py-4 sm:pr-[54px] text-base min-h-[120px] transition-all js-collapse-content hidden border-t border-gray-150">
                                    {{ $val->Value }}
                                </div>
                            @else
                                @if (($val->Description == 'answer_3' && $val->IsPublic == false) || ($val->Description == 'answer_3' && $val->Value == null))
                                    <div
                                        class="px-2 sm:px-4 py-4 sm:pr-[54px] text-base min-h-[120px] transition-all js-collapse-content hidden border-t border-gray-150">
                                        Không có dữ liệu
                                    </div>
                                @endif
                            @endif
                        @endforeach
                    </div>
                @endif
            @endforeach

            @foreach ($QNA as $item)
                @if ($item->IsPublic == true && $item->Description == 'quest_4' && $item->Value != null)
                    <div
                        class="w-full relative z-10 hover:z-20 border -mt-[1px] border-gray-150 hover:border-blue-200 js-collapse">
                        <div
                            class="relative w-full py-3 pl-2 sm:pl-4 pr-[30px] sm:pr-[54px] text-[18px] js-collapse-title cursor-pointer">
                            @foreach ($QNA as $val)
                                @if ($val->Description == 'quest_4')
                                    {{ $val->Value }}
                                @endif
                            @endforeach
                            <button class="absolute right-0 top-0 sm:w-[54px] w-[30px] h-[54px] z-0">+</button>
                        </div>
                        @foreach ($QNA as $val)
                            @if ($val->Description == 'answer_4' && $val->IsPublic == true && $val->Value != null)
                                <div
                                    class="px-2 sm:px-4 py-4 sm:pr-[54px] text-base min-h-[120px] transition-all js-collapse-content hidden border-t border-gray-150">
                                    {{ $val->Value }}
                                </div>
                            @else
                                @if (($val->Description == 'answer_4' && $val->IsPublic == false) || ($val->Description == 'answer_4' && $val->Value == null))
                                    <div
                                        class="px-2 sm:px-4 py-4 sm:pr-[54px] text-base min-h-[120px] transition-all js-collapse-content hidden border-t border-gray-150">
                                        Không có dữ liệu
                                    </div>
                                @endif
                            @endif
                        @endforeach
                    </div>
                @endif
            @endforeach

            @foreach ($QNA as $item)
                @if ($item->IsPublic == true && $item->Description == 'quest_5' && $item->Value != null)
                    <div
                        class="w-full relative z-10 hover:z-20 border -mt-[1px] hover:border-blue-200 border-gray-150 js-collapse">
                        <div
                            class="relative w-full py-3 pl-2 sm:pl-4 pr-[30px] sm:pr-[54px] text-[18px] js-collapse-title cursor-pointer">
                            @foreach ($QNA as $val)
                                @if ($val->Description == 'quest_5')
                                    {{ $val->Value }}
                                @endif
                            @endforeach
                            <button class="absolute right-0 top-0 sm:w-[54px] w-[30px] h-[54px] z-0">+</button>
                        </div>
                        @foreach ($QNA as $val)
                            @if ($val->Description == 'answer_5' && $val->IsPublic == true && $val->Value != null)
                                <div
                                    class="px-2 sm:px-4 py-4 sm:pr-[54px] text-base min-h-[120px] transition-all js-collapse-content hidden border-t border-gray-150">
                                    {{ $val->Value }}
                                </div>
                            @else
                                @if (($val->Description == 'answer_5' && $val->IsPublic == false) || ($val->Description == 'answer_5' && $val->Value == null))
                                    <div
                                        class="px-2 sm:px-4 py-4 sm:pr-[54px] text-base min-h-[120px] transition-all js-collapse-content hidden border-t border-gray-150">
                                        Không có dữ liệu
                                    </div>
                                @endif
                            @endif
                        @endforeach
                    </div>
                @endif
            @endforeach
        @endif
    </div>
</div>
