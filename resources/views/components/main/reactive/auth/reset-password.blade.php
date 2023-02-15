<div class="row">
    <div>
        <div class="card-login text-center">
            <h5 class="shabnam"> تغییر رمز عبور </h5>

            <div class="card-body">
                <form wire:submit.prevent="changePassword">

                    <div class="form-group mt-20">
                        <input type="password" wire:model.defer="old_password" placeholder="رمز عبور کنونی خود را وارد کنید"
                            id="number" class="shabnam" style="text-align: center">
                    </div>

                    @error('old_password')
                        <span> {{ $message }} </span>
                    @enderror

                    <div class="form-group mt-20">
                        <input type="password" wire:model.defer="password" placeholder="رمز عبور جدید  را وارد کنید"
                            id="number" class="shabnam" style="text-align: center">
                    </div>

                    @error('password')
                        <span> {{ $message }} </span>
                    @enderror


                    <div class="form-group mt-20">
                        <input type="password" wire:model.defer="password_confirmation"
                            placeholder="رمز عبور جدید را تکرار کنید"  class="shabnam"
                            style="text-align: center">
                    </div>

                    @error('password_confirmation')
                        <span> {{ $message }} </span>
                    @enderror


                    @error('samePassword')
                        <span> {{ $message }} </span>
                    @enderror

                    <div class="form-group">
                        <button type="submit" class="btn btn-heading btn-block shabnam" style="width: 100%">
                            تغییر رمز عبور

                            <div wire:loading>
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            </div>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>