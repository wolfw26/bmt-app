<div class="form-group">
    <div class="card-header pb-0 text-left">
        <h3 class="font-weight-bolder text-primary text-gradient text-center">Login Admin</h3>
        <p class="mb-0 text-center">Gunakan Email dan Password untuk Log in</p>
    </div>
    <div class="card-body pb-3">
        <form wire:submit.prevent="Login">
            @csrf
            <label>Email</label>
            <div class="input-group mb-0">
                <input wire:model.debounce.500ms="email" type="email" class="form-control @error('email')
                    is-invalid
                @enderror" placeholder="Email" aria-label="Email" aria-describedby="email-addon">
            </div>
            @error('email') <i class="error font-italic text-danger">*{{  $message }}</i> @enderror

            {{ $password }}
            <label>Password</label>
            <div class="input-group mb-0">
                <input wire:model.debounce.200ms="password" type="password" class="form-control @error('password')
                is-invalid
            @enderror" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
            </div>
            @error('password') <i class="error font-italic text-danger">*{{  $message }}</i> @enderror
            <div class="text-center">
                <button  type="submit" class="btn bg-gradient-primary btn-lg btn-rounded w-100 mt-4 mb-0 @if (strlen($password) < 6) disabled @endif "wire:loading.attr="disabled">
                    <span wire:loading.remove>Log in</span>
                    <span wire:loading>
                        <div class="spinner-border spinner-border-sm" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </span>
                </button>
            </div>
        </form>
    </div>
    <div class="card-footer text-center pt-0 px-sm-4 px-1">
        <p class="mb-4 mx-auto">
            Belum Memiliki Akun?
            <a href="{{ route('adm.daftar') }}" class="text-primary text-gradient font-weight-bold">Registrasi</a>
        </p>
    </div>
</div>
