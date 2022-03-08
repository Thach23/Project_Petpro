@if (count($comments) > 0)
    <div id="load">
        @foreach ($comments as $item)
            @if ($item->CommentID == null && $item->Deleted == 0)
                <div class="flex py-[32px]">
                    <div class="min-w-[50px] w-[50px] h-[50px] rounded-full bg-gray-180 mr-4"></div>
                    <div class="font-light text-gray-190">
                        <div class="text-[13px]">{{ $item->UserName }}</div>
                        <div class="text-[10px] italic pb-[11px]">{{ $item->DateCreate }}</div>
                        <div class="text-[13px]">{{ $item->Content }}</div>
                    </div>
                </div>
                <hr class="mt-[28px] border-gray-100">
            @endif
        @endforeach

        <div class="pagination text-center pt-[34px]">
            {{ $comments->links() }}
        </div>
        @if (count($comments) > 5)
            <hr class="mt-[28px] border-gray-100">
        @endif
    </div>
@else
    <p class="mt-5">Không có bình luận</p>
@endif
