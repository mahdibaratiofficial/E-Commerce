@extends('layouts.main.blank-app')

@section('content')
    <div class="row">
        <div class="col-5" style="margin: auto;margin-top:200px">
            <div class="card-login text-center">
                <h5 class="shabnam"> بازیابی رمز عبور - ایمیل خود را وارد کنید </h5>

                <div class="card-body">
                    <form method="POST" action="{{ route('generate.password.reset') }}">
                        @csrf
                        <div class="form-group mt-20">
                            <input type="text" required="" name="email" placeholder="ایمیل خود را وارد کنید"
                                id="number" class="shabnam" style="text-align: center">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-heading btn-block shabnam" style="width: 100%"
                                name="resetpassword">

                                ارسال ایمیل بازیابی رمز عبور
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
