<div class="card">
    <div class="card-header">
        @if ($inputStatus == 'number')
            <h4 class="mb-0 shabnam">شمار
                ه همراه خود را وارد کنید</h4>
        @elseif ($inputStatus == 'code')
            <h4 class="mb-0 shabnam">کد یک بار مصرف را وارد کنید</h4>
        @endif
    </div>

    <div class="card-body">
        <form wire:submit.prevent="OTP">
            @if ($inputStatus == 'number')
                <div class="form-group mt-20 mb-1">
                    <input type="text" required="" name="number" value="{{ $number }}"
                        placeholder="نام کاربری یا ایمیل یا شماره تلفن" id="number"
                        onkeypress="toEnglishNumber(this.value,'number')" wire:model.defer="number">
                </div>
                @error('number')
                    <span class="text text-muted mb-20">{{ $message }}</span>
                @enderror
            @elseif ($inputStatus == 'code')
                <div class="form-group mt-20">
                    <input type="text" required="" value="{{ $code }}" name="number"
                        placeholder="کد را وارد کنید" id="number" onkeypress="toEnglishNumber(this.value,'number')"
                        wire:model.defer="code">
                </div>

                @error('code')
                    <span class="text text-muted">{{ $message }}</span>
                @enderror
            @endif


            <div class="form-group">
                <button type="submit" class="btn btn-heading btn-block shabnam" style="width: 100%" name="login">

                    @if ($inputStatus == 'number')
                        ارسال پیامک
                    @elseif ($inputStatus == 'code')
                        بررسی کد
                    @endif

                    <div wire:loading>
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    </div>

                </button>

            </div>
        </form>
    </div>
</div>
