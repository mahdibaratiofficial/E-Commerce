@extends('layouts.main.blank-app')

@section('content')
    <div class="row">
        <div class="col-5" style="margin: auto;margin-top:200px">
            <div class="card-login text-center">
                <h5 class="shabnam"> رمز عبور جدید را وارد کنید </h5>

                <div class="card-body">
                    <form method="POST" action="{{ route('reset.password') }}">
                        @csrf

                        <input type="hidden" name="_reset_password_token" value="{{ $_reset_password_token }}">

                        <div class="form-group mt-20">
                            <input type="password" required="" name="password" placeholder="رمز عبور را وارد کنید"
                                id="number" class="shabnam" style="text-align: center">
                        </div>


                        <div class="form-group mt-20">
                            <input type="password" required="" name="password_confirmation" placeholder="رمز عبور را تکرار کنید"
                                id="number" class="shabnam" style="text-align: center">
                        </div>

                        @error('password')
                            <span> {{ $message }} </span>
                        @enderror

                        @error('password_confirmation')
                            <span> {{ $message }} </span>
                        @enderror

                        @error('_reset_password_token')
                            <span> {{ $message }} </span>
                        @enderror

                        <div class="form-group">
                            <button type="submit" class="btn btn-heading btn-block shabnam" style="width: 100%"
                                name="resetpassword">
                                تغییر رمز عبور
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
