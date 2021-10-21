@extends('layouts.index')
@section('content')
<div class="row d-flex justify-content-center align-items-center h-100">
    <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
            <div class="row g-0">
                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">

                        <form method="post" action="{{ route('store')}}">
                            @csrf
                            <div class="d-flex align-items-center mb-3 pb-1">
                                <img src="{{ asset('img/logo-AE.png') }}" class="fa-2x me-3"></i>
                                <span class="h1 fw-bold mb-0">Login</span>
                            </div>

                            <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Inicia sesión con la cuenta que te proporcionaron.</h5>

                            <div class="form-outline mb-4">
                                <input type="email" id="email" class="form-control form-control-lg" name="email" />
                                <label class="form-label" for="form2Example17">E-mail</label>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-outline mb-4">
                                <input type="password" id="password" class="form-control form-control-lg" name="password" />
                                <label class="form-label" for="form2Example27">Password</label>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="pt-1 mb-4">
                                <button class="boton uno" type="submit"><span>Login</span></button>
                            </div>
                            <a class="small text-muted" href="#!">¿Olvidaste tu contraseña?</a>
                            <!-- <p class="mb-5 pb-lg-2" style="color: #393f81;">Aún no tienes una cuen? <a href="#!" style="color: #393f81;">Register here</a></p> -->
                            <!-- <a href="#!" class="small text-muted">Terms of use.</a>
                            <a href="#!" class="small text-muted">Privacy policy</a> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection