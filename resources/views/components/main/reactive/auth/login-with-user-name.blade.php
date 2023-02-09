<form wire:submit.prevent="submit">
    <div class="form-group">
        <input type="text" required="" name="username" placeholder="نام کاربری یا ایمیل یا شماره تلفن"
            wire:model.defer="username" value="{{ $username }}" />

        @error('username')
            <span class="text text-muted">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <input required="" type="password" name="password" placeholder="گذرواژه" wire:model.defer="password"
            value="{{ $password }}" />

        @error('password')
            <span class="text text-muted">{{ $message }}</span>
        @enderror
    </div>
    <div class="login_footer form-group text-center">
        جایگاه ربات گوگل
    </div>
    <div class="login_footer form-group mb-50">
        <div class="chek-form">
            <div class="custome-checkbox" wire:click="rememberMe()">
                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="" />
                <label class="form-check-label" for="exampleCheckbox1"><span>منو
                        یادت باشه</span></label>
            </div>
        </div>
        <a class="text-muted shabnam" href="page-login.html#">رمز عبور
            خود را
            فراموش کرده اید?</a>
    </div>
    <div class="form-group" dir="rtl">
        <button type="submit" class="btn btn-heading btn-block hover-up shabnam" name="login">ورود

            <div wire:loading>
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            </div>

        </button>

        @if ($error != '')
            <span class="text text-muted">{{ $error }}</span>
        @endif
    </div>
</form>
