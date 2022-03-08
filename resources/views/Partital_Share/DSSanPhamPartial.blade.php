@foreach ($products as $p)
    <div class="col mb-5">
        <div class="product-grid">
            <div class="product-image">
                <a href="{{ route('ChiTietSanPham', ['slug' => $p->Slug]) }}" class="image">
                    <img class="pic-1" src="{{ asset('assets/images/shop/shop_img_1.jpg') }}">
                </a>
                <span class="product-discount-label">-33%</span>
                <ul class="product-links">
                    <li><a href="#" data-tip="Add to Wishlist"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg></a></li>
                    <li><a href="#" data-tip="Quick View"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
                                <path
                                    d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                                </path>
                            </svg></a></li>
                </ul>
                <a class="add-to-cart btn-theme bg-navy-blue capusle" data-url="{{ route('addtocart') }}"
                    item-id="{{ $p->Id }}">Thêm vào giỏ
                    <span class="ml-2"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag">
                            <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                            <line x1="3" y1="6" x2="21" y2="6"></line>
                            <path d="M16 10a4 4 0 0 1-8 0"></path>
                        </svg></span></a>
            </div>
            <div class="product-content">
                <h3 class="title"><a
                        href="{{ route('ChiTietSanPham', ['slug' => $p->Slug]) }}">{{ $p->Name }}</a>
                </h3>
                <div class="price">
                    <span>${{ number_format($p->Price, 2, '.', ',') }}</span>
                    $15.00
                </div>
            </div>
        </div>
    </div>
@endforeach
<div class="col-lg-12">
    {{ $products->links() }}
</div>
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>
    <script>
        function addtocart(event) {
            event.preventDefault();
            let itemid = $(this).attr('item-id');

            $.ajax({
                method: "POST",
                url: "{{ route('addtocart') }}",
                dataType: "json",
                data: {
                    '_token': "{{ csrf_token() }}",
                    'id': itemid
                },
                success: function(data) {
                    if (data.code == 200) {
                        console.log(data);
                        //$('#giohangpartial').html(data.giohangpartial);
                        $('#currentitem').text(Object.keys(data.cart).length);
                        alert('Thêm giỏ hàng vào thành công');
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
        $(function() {
            $('.add-to-cart').on('click', addtocart);
        });
    </script>
@endpush
