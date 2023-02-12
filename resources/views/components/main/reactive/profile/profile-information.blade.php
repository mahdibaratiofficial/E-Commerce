<form wire:submit.prevent="update">
    <div class="row">
        <div class="form-group col-md-6">
            <label>نام و نام خوانوادگی <span class="required">:</span></label>
            <input class="form-control" wire:model.defer="user.name" type="text" value="{{ $user->name }}" />

            @error('user.name')
                <span class="text text-muted"> {{ $message }} </span>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label>نام کاربری <span class="required">:</span></label>
            <input class="form-control" wire:model.defer="user.username" type="text" value="{{ $user->username }}" />
            
            @error('user.username')
                <span class="text text-muted"> {{ $message }} </span>
            @enderror

        </div>
        <div class="form-group col-md-12">
            <label>ایمیل <span class="required">:</span></label>
            <input class="form-control" wire:model.defer="user.email" type="email" value="{{ $user->email }}" />

            @error('user.email')
                <span class="text text-muted"> {{ $message }} </span>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label>شماره تلفن <span class="required">:</span></label>
            <input class="form-control" wire:model.defer="user.number" type="text" value="{{ $user->number }}" />
            @error('user.number')
                <span class="text text-muted"> {{ $message }} </span>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label>تاریخ تولد: <span class="required">*</span></label>
            <input class="form-control" wire:model.defer="user.birth_day" type="date" value="{{ $user->birth_day }}" />

            @error('user.birth_day')
                <span class="text text-muted"> {{ $message }} </span>
            @enderror
        </div>
        <div class="col-md-12">
            <button type="submit"
                class="btn btn-fill-out submit font-weight-bold" >ویرایش اطلاعات</button>
        </div>
    </div>
</form>