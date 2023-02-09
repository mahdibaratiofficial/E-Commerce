<form wire:submit.prevent="register" style="text-align: right !important">
    <div class="form-group">
        <input type="text" wire:model.debounce.800ms="username" placeholder="نام کاربری انتخاب کنید" value="{{ $username }}" />

            @error('username')
                <span class="text text-muted" > {{ $message }} </span>
            @enderror
    </div>
    <div class="form-group">
        <input type="email" wire:model.debounce.1000ms="email"  placeholder="ایمیل خود را وارد کنید" value="{{ $email }}"/>
            
        @error('email')
            <span class="text text-muted" > {{ $message }} </span>
        @enderror
    </div>
    <div class="form-group">
        <input required="" type="password" name="password"
            placeholder="Password" wire:model.debounce.1000ms="password" placeholder="یک گذرواژه وارد کنید" value="{{ $password }}" />

        @error('password')
            <span class="text text-muted" > {{ $message }} </span>
        @enderror
    </div>
    <div class="form-group">
        <input required="" type="password" name="password"
             wire:model.debounce.1000ms="password_confirmation" placeholder="تایید گذرواژه " value="{{ $password_confirmation }}" />

        @error('password_confirmation')
            <span class="text text-muted" > {{ $message }} </span>
        @enderror
    </div>
    <div class="login_footer form-group">
       جایگاه ربات گوگل
    </div>
    <div class="payment_option mb-50">
        <div class="custome-radio">
            <input class="form-check-input" required="" type="radio"
                name="payment_option" id="exampleRadios3" checked="" />
            <label class="form-check-label" for="exampleRadios3"
                data-bs-toggle="collapse" data-target="#bankTranfer"
                aria-controls="bankTranfer">I am a customer</label>
        </div>
        <div class="custome-radio">
            <input class="form-check-input" required="" type="radio"
                name="payment_option" id="exampleRadios4" checked="" />
            <label class="form-check-label" for="exampleRadios4"
                data-bs-toggle="collapse" data-target="#checkPayment"
                aria-controls="checkPayment">I am a vendor</label>
        </div>
    </div>
    <div class="login_footer form-group mb-50">
        <div class="chek-form">
            <div class="custome-checkbox">
                <input class="form-check-input" type="checkbox" name="checkbox"
                    id="exampleCheckbox12" value="" />
                <label class="form-check-label" for="exampleCheckbox12"><span>I
                        agree to terms &amp; Policy.</span></label>
            </div>
        </div>
        <a href="page-privacy-policy.html"><i
                class="fi-rs-book-alt mr-5 text-muted"></i>Lean more</a>
    </div>
    <div class="form-group mb-30">
        <button type="submit"
            class="btn btn-fill-out btn-block hover-up font-weight-bold shabnam"
            name="login">ثبت نام

            <div wire:loading>
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            </div>
        </button>
    </div>
    <p class="font-xs text-muted"><strong>Note:</strong>Your personal data will
        be used to support your experience throughout this website, to manage
        access to your account, and for other purposes described in our privacy
        policy</p>
</form>