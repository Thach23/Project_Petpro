    @if ($GgAnalytics == null)
        <div></div>
    @else
        @foreach ($GgAnalytics as $val)
            @if ($val->Description == 'noidung1' && $val->IsPublic == true)
                {!! html_entity_decode($val->Value) !!}
            @endif
        @endforeach
    @endif
