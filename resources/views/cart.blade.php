@extends('layouts.app')
@section('content')
    @if (count($carts) <= 0)
        <div class="container ">
            <div class="row kosong">
                <div class="col-md-12">
                    <img src="{{ asset('storage/asset/barangkosong.png') }}" class="position-absolute p-kosong" alt=""
                        width="15%">
                    <h2>{{ $kosong }}</h2>
                    <h4>{{ $kosong2 }} <a href="shop"><i class="fa-solid fa-cart-shopping text-danger"></i></a></h4>
                </div>
            </div>
        </div>
    @else
        <div class="container mb-5" style="min-height: 70vh">
            <div class="row">
                @if (Session::has('success'))
                    <div class="col-md-4 position-absolute top-25" id="alert-message">
                        <div class="alert alert-success d-flex align-items-center" role="alert">
                            <div class="fw-bolder">
                                <i class="fa-solid fa-square-check"></i> {{ Session::get('success') }}
                            </div>
                        </div>
                    </div>
                @endif

                @if (Session::has('error'))
                    <div class="col-md-4 position-absolute top-25" id="alert-message">
                        <div class="alert alert-warning d-flex align-items-center" role="alert">
                            <div class="fw-bolder">
                                <i class="fa-solid fa-triangle-exclamation"></i> {{ Session::get('error') }}
                            </div>
                        </div>
                    </div>
                @endif
                <h3 class="text-center my-5" style="font-family: 'Playfair Display';">My Carts</h3>
                <div class="col-md-12">

                    <table class="table">
                        <tr class="text-center">
                            <th>No</th>
                            <th>Images</th>
                            <th>Items</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Remove</th>
                        </tr>
                        @php
                            $grand_total = 0;
                        @endphp
                        @foreach ($carts as $cart)
                            <tr class="text-center align-middle">
                                <td>{{ $loop->iteration }}</td>
                                <td><img src="{{ $cart->product->image }}" alt="" width="40rem"></td>
                                <td>{{ $cart->product->name }}</td>
                                <td>
                                    <form action="{{ route('cart.update', $cart->id) }}" method="POST">
                                        @csrf
                                        @method('put')
                                        <input type="number" class="number-type" min="1"
                                            id="data{{ $cart->id }}" oninput="validity.valid||(value='1');"
                                            name="qty" value="{{ $cart->qty }}">
                                        <input type="hidden" name="price_items" id="harga_item{{ $cart->id }}"
                                            value="{{ $cart->product->price }}">
                                    </form>
                                </td>
                                <td id="total{{ $cart->id }}" class="total">
                                    Rp.{{ number_format($cart->price_items, '0', '.', '.') }},-</td>
                                <td><a href="#" class="button btn-box-xs btn-box-red" data-bs-toggle="modal"
                                        data-bs-target="#hapus" data-bs-tombol="tooltip" title="Delete item"
                                        data-bs-placement="right"><i class="fa-solid fa-trash"></i></a></td>
                                {{-- modal --}}
                                <div class="modal fade" id="hapus" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-danger" id="exampleModalLabel">Are you sure you
                                                    want to delete this item?</h5>
                                            </div>
                                            <div class="modal-body text-center">
                                                <h6>{{ $cart->product->name }} -
                                                    Rp.{{ number_format($cart->price_items) }},-
                                                </h6>
                                            </div>
                                            <div class="modal-footer">
                                                <form method="POST" action="{{ route('cart.destroy', $cart->id) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="button btn-box-red btn-box-xs">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                            @php
                                $grand_total += $cart->price_items;
                            @endphp
                            <script>
                                $(document).ready(function() {
                                    $("#data{{ $cart->id }}").change(function() {
                                        var qty = $(this).val();
                                        var harga = $("#harga_item{{ $cart->id }}").val();
                                        $.ajax({
                                            url: "{{ route('cart.update', $cart->id) }}",
                                            type: "PUT",
                                            data: {
                                                qty: qty,
                                                price_items: harga,
                                                _token: '{{ csrf_token() }}',
                                            },
                                            success: function(response) {
                                                var total_sementara = qty * harga;
                                                $("#total{{ $cart->id }}").html("Rp." + total_sementara + ",-");
                                                var grand_total = ;
                                                $(".total").each(function() {
                                                    grand_total += parseInt($(this).html().replace("Rp.", "")
                                                        .replace(",", "").replace("-", ""));
                                                });
                                                $("#grand_total").html("Rp." + grand_total + ",-");
                                            },
                                            error: function(xhr, status, error) {
                                                console.log();
                                            }
                                        });
                                    });
                                });
                            </script>
                        @endforeach
                        <tr style="height: 80px" class="align-middle border-tabel">
                            <th colspan="4">Total Price</th>
                            <th id="grand_total" class="text-center">
                                {{-- Rp.{{ number_format($grand_total, '0', '.', '.') }},- --}}
                            </th>
                            <th class="text-center">
                                <button id="pay-button" class="button btn-box-green btn-box-sm">Checkout</button>
                            </th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                setTimeout(function() {
                    $("#alert-message").fadeOut();
                }, 4000);
            });
        </script>

        {{-- midtrans --}}
        <script type="text/javascript">
            var payButton = document.getElementById('pay-button');
            payButton.addEventListener('click', function() {
                $.ajax({
                    type: "GET",
                    url: "{{ url('updatecart') }}",
                    dataType: "JSON",
                    success: function(response) {
                        var snap_token = response.token;
                        var total = response.total;
                        window.snap.pay(snap_token, {
                            onSuccess: function(result) {
                                alert("payment success!");
                                console.log(result);
                            },
                            onPending: function(result) {
                                alert("waiting your payment!");
                                console.log(result);
                            },
                            onError: function(result) {
                                alert("payment failed!");
                                console.log(result);
                            },
                            onClose: function() {
                                alert('you closed the popup without finishing the payment');
                            }
                        });
                    },
                    error: function(xhr, status, error) {
                        console.log();
                    }
                });
            });
        </script>
        @include('transaksi')
    @endif
@endsection
