@extends('layouts.app')

@section('title', 'Your Cart')

@section('main')
    @if (count($datas) <= 0)
        <div class="container d-flex justify-content-center align-items-center my-lg-5">
            <div class="card d-flex flex-column justify-content-center align-items-center border-0" style="width: 18rem;">
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    <h5 class="card-title text-center mb-1 text-danger">Your cart is empty!</h5>
                    <p class="card-text text-center mb-2">Please go to the store to fill your cart...</p>
                    <a href="{{ url('/product') }}" class="btn btn-primary"><span>Go to store</span> <i
                            class="fa-solid fa-store"></i></a>
                </div>
            </div>
        </div>
    @else
        <table class="table table-light my-4 overflow-scroll text-center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Images</th>
                    <th>Items</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $data->product->image }}</td>
                        <td>{{ $data->product->name }}</td>
                        <td>
                            <form action="{{ route('cart-list.update', $data->id) }}" method="POST"
                                class="d-flex justify-content-center align-items-center">
                                @csrf
                                @method('PUT')
                                <input type="number" name="qty" value="{{ $data->qty }}" class="form-number"
                                    required>
                                <input type="hidden" name="price_items" value="{{ $data->product->price }}">
                                <button class="table-btn" type="submit"><i class="fa-solid fa-circle-check"></i></button>
                            </form>
                        </td>
                        <td id="total{{ $data->id }}">Rp.{{ number_format($data->price_items, '0', '.', '.') }},-</td>
                        <td>
                            <form action="{{ route('cart.destroy', $data->id) }}">
                                @csrf
                                <input type="submit" class="table-delete-btn px-4" value="Delete"
                                    onclick="return confirm('Are you sure you want to delete?')">
                            </form>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <p class="text-end text-black">Total : Rp.{{ number_format($priceTotalResult, '0', '.', '.') }},-</p>
                    </td>
                    <td></td>
                </tr>
            </tbody>
        </table>

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
        {{-- @include('transaksi') --}}
    @endif
@endsection
