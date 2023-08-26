<div class="form-group">
    <div class="card-header pb-0 text-left">
        <h3 class="font-weight-bolder text-primary text-gradient text-center">Regitrasi</h3>
        <p class="mb-0 text-center">Masukan Email dan Password untuk register</p>
    </div>
    <div class="card-body pb-3">
        <form wire:submit.prevent="register">
            <label>Name</label>
            <div class="input-group mb-3">
                <input wire:model="name" type="text" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="name-addon">
            </div>
            <label>Email</label>
            <div class="input-group mb-3">
                <input wire:model="email" type="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email-addon">
            </div>
            <label>Password</label>
            <div class="input-group mb-3">
                <input wire:model="password" type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
            </div>
            <div class="text-center">
                <button type="submit" class="btn bg-gradient-primary btn-lg btn-rounded w-100 mt-4 mb-0">Daftar</button>
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
