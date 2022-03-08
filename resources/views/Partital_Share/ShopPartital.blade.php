    @if ($carts != null)
    <section id="content" class="wide-tb-100 pb-0">
        <div class="container" id="delete-cart-url" data-url="{{ route('deletecart') }}">
            <form action="{{ route('updatecart') }},method='POST'">
                @csrf
                <div class="table-responsive">

                    <table id="MyCartInfo" class="table" data-url="{{ route('updatecart') }}">
                        <thead class="thead-dark theme-head">
                            <tr>
                                <th scope="col"><span>Image</span></th>
                                <th scope="col"><span>Name</span></th>
                                <th scope="col"><span>Price</span></th>
                                <th scope="col"><span>Quantity</span></th>
                                <th scope="col"><span>Total</span></th>
                                <th scope="col"><span>Function</span></th>
                            </tr>
                        </thead>
                        @php
                        $total = 0;
                        $Quanity = 0;
                        @endphp
                        <tbody class="theme-body">
                            @foreach ($carts as $item)
                            @php
                            $total += $item['quantity'] * $item['Price'];
                            $Quanity += $item['quantity'];
                            @endphp
                            <tr class="DataRow" itemid="{{ $item->Id }}">
                                {{-- <th scope="row">
                                    <a href="#" class="link-oragne"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-x-square">
                                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                            <line x1="9" y1="9" x2="15" y2="15"></line>
                                            <line x1="15" y1="9" x2="9" y2="15"></line>
                                        </svg></a>
                                </th> --}}
                                <td>
                                    <div class="item-product">
                                        <span class="img-wrap"><img src="{{ asset('assets/images/shop/item-1.jpg') }}" alt=""></span>

                                    </div>
                                </td>
                                <td>
                                    <span>{{ $item['Name'] }}</span>
                                </td>
                                <td><strong class="txt-blue">{{ number_format($item['Price']) }} đ</strong>
                                </td>
                                <td>
                                    <div class="quantity">
                                        <button class="minus-btn" type="button" name="button" onclick="minus(this)">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus">
                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                            </svg>
                                        </button>
                                        <input type="number" class="soluong" min="1" value="{{ strval($item['quantity']) }}" readonly>
                                        <button class="plus-btn" type="button" name="button" onclick="plus(this)">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                                <td><strong class="txt-orange">{{ number_format($item['quantity'] * $item['Price']) }} đ</strong>
                                </td>
                                <td>
                                    <button data-id="{{ $item->Id }}" class="btn btn-danger delete-cart" type="button" onclick="cartDelete(this)">Delete</button>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="row mt-4">
                    <div class="col-md-6">
                        <!-- <form novalidate="novalidate" method="post" action="#" id="contact_form" class="row align-items-center no-gutters">
                        <div class="col">
                            <input type="text" class="form-control" name="name" placeholder="Coupon code">
                        </div>
                        <div class="col-auto">
                            <button class="btn-theme bg-orange btn-shadow ml-4 h-100" type="submit">Apply
                                Coupon</button>
                        </div>

                    </form> -->
                    </div>
                    <div class="col-md-6">

                        <div class="text-md-right">
                            <button class="btn-theme bg-green btn-shadow" data-id="{{ $item->Id }}" type="button" id="btn-update" onclick="cartUpdate()">Update
                                cart</button>
                        </div>

                    </div>
                </div>
            </form>

            <div class="row mt-5 justify-content-md-end">
                <div class="col-lg-4 col-md-6">
                    <div class="cart-totals">
                        <div class="px-4">
                            <div class="order-head">
                                <span>Cart Totals</span>
                            </div>
                        </div>
                        <div class="order-list">
                            <ul class="list-unstyled">
                                <li>
                                    <span>Quanity</span>
                                    <span class="txt-green">{{ $Quanity }}</span>
                                </li>
                                <li>
                                    <span>Total</span>
                                    <span class="txt-green">{{ number_format($total) }}</span>
                                </li>
                            </ul>
                        </div>
                        <div class="px-4">
                            <a class="btn-theme bg-orange btn-shadow btn-block" href="{{route('dathang')}}">Proceed to checkout</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    @else
    <h1>Giỏ hàng đang trống</h1>
    @endif