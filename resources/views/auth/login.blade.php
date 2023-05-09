    <div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-blue" id="exampleModalLabel"><b>Login</b></h4>
                    <img src="{{ asset('storage/asset/pngegg.png') }}" alt="" width="13%">
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">

                            <div class="col-md-12">
                                <p class="mb-1" style="font-size: 14px;">Email</p>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required placeholder="Email address"
                                    autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <p class="mb-1" style="font-size: 14px;">Password</p>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required placeholder="Password" autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p class="fw-bold mb-0">Don't have an account? <a href="{{ url('register') }}"
                                        class="text-red" style="text-decoration: none;">sign up</a></p>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <div class="row mb-0">
                        <div class="col-md-12">
                            <button type="submit" class="rounded-pill button btn-box-blue btn-box-sm">
                                <b>Login</b>
                            </button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
