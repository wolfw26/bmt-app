<div class="form-group">
    <div class="card-header pb-0 text-left">
        <h3 class="font-weight-bolder text-primary text-gradient text-center">Regitrasi</h3>
        <p class="mb-0 text-center">Masukan Email dan Password untuk register</p>
    </div>
    <div class="card-body pb-3">
        <form wire:submit.prevent="register">
            <label>Name</label>
            <div class="input-group mb-0">
                <input wire:model="name" type="text" class="form-control @error('name') is-invalid  @enderror" placeholder="Name" aria-label="Name" aria-describedby="name-addon">
            </div>
            @error('name') <i class="error font-italic text-danger">*{{ $message }}</i> @enderror
            <label>Email</label>
            <div class="input-group mb-0">
                <input wire:model="email" type="email" class="form-control @error('email') is-invalid  @enderror" placeholder="Email" aria-label="Email" aria-describedby="email-addon">
            </div>
            @error('email') <i class="error font-italic text-danger">*{{ $message }}</i> @enderror
            <label>Password</label>
            <div class="input-group mb-0">
                <input wire:model="password" type="password" class="form-control @error('password') is-invalid  @enderror" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
            </div>
            @error('password') <i class="error font-italic text-danger">*{{ $message }}</i> @enderror
            <div class="text-center">
                <button  type="submit" class="btn bg-gradient-primary btn-lg btn-rounded w-100 mt-4 mb-0 @if (strlen($password) < 6) disabled @endif "wire:loading.attr="disabled">
                    <span wire:loading.remove>Daftar</span>
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
            Sudah Memiliki Akun?
            <a href="{{ route('login') }}" class="text-primary text-gradient font-weight-bold">Masuk</a>
        </p>
    </div>
</div>
