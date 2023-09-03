<div class="container-fluid px-md-2 mt-md-4">
    <div class="row">
        <div class="col-md-3">
            <div class="card my-2 my-md-0">
                <div class="card-header">
                    <h2 class="text-center">FOTO</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 mb-3">
                            @if ($fotoUp)
                                    <img class="card-img" src="{{ $fotoUp->temporaryUrl() }}" alt="Foto" class="img-fluid">
                                @else
                                    @if ($foto)
                                        <img class="card-img" src="{{ asset($foto) }}" alt="foto" class="img-fluid">
                                    @else
                                        <img class="card-img" src="{{ asset('assets/img/home-decor-1.jpg') }}" alt="Foto" class="img-fluid">
                                    @endif
                                @endif
                        </div>
                        <div class="col-12">
                            @if ($foto_ktpUp)
                                    <img class="card-img" src="{{ $foto_ktpUp->temporaryUrl() }}" alt="Foto" class="img-fluid">
                                @else
                                    @if ($foto_ktp)
                                        <img class="card-img" src="{{ asset($foto_ktp) }}" alt="foto" class="img-fluid">
                                    @else
                                        <img class="card-img" src="{{ asset('assets/img/home-decor-1.jpg') }}" alt="Foto" class="img-fluid">
                                    @endif
                                @endif
                        </div>
                    </div>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card my-2 my-md-0">
                <div class="card-header border-bottom">
                    <h2 class="text-center">PROFIL</h2>
                </div>
                <div class="card-body">
                    @if ($isData && $isEdit)
                        <form wire:submit.prevent="Edit" enctype="multipart/form-data">
                    @else
                        <form wire:submit.prevent="Create" enctype="multipart/form-data">
                    @endif
                        <div class="form-group">
                            <label class=" mt-1 mt-md-2">Nama Lengkap</label>
                            <div class="input-group input-group-sm mt-0  ">
                                <input wire:model="nama" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"
                                @if ($isEdit == false)
                                    disabled
                                @endif>
                            </div>
                            @error('name') <span class="error text-danger text-sm">{{ __($message) }}<br></span> @enderror
                            <label class=" mt-1 mt-md-2">No.Rek</label>
                            <div class="input-group input-group-sm mt-0  ">
                                <input wire:model="no_rek" type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"
                                @if ($isEdit == false)
                                    disabled
                                @endif>
                            </div>
                            @error('nik') <span class="error text-danger text-sm">{{$message }}<br></span> @enderror
                            <label class=" mt-1 mt-md-2">Tempat Lahir</label>
                            <div class="input-group input-group-sm mt-0  ">
                                <input wire:model="tempat_lahir" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"
                                @if ($isEdit == false)
                                    disabled
                                @endif>
                            </div>
                            @error('tempat_lahir') <span class="error text-danger text-sm">{{ __($message) }}<br></span> @enderror
                            <label class=" mt-1 mt-md-2">Tanggal Lahir</label>
                            <div class="input-group input-group-sm mt-0  ">
                                <input wire:model="tgl_lahir" type="date" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"
                                @if ($isEdit == false)
                                    disabled
                                @endif>
                            </div>
                            @error('tgl_lahir') <span class="error text-danger text-sm">{{ __($message) }}<br></span> @enderror
                            <label class=" mt-1 mt-md-2">Jenis Kelamin</label>
                            <div class="input-group input-group-sm mt-0  ">
                                <select wire:model="jenis_kelamin" class="form-control form-control-sm" @if ($isEdit == false)
                                disabled
                            @endif>
                                    <option selected>Jenis Kelamin</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            @error('jenis_kelamin') <span class="error text-danger text-sm">{{ __($message) }}<br></span> @enderror
                            <label class=" mt-1 mt-md-2">Agama</label>
                            <div class="input-group input-group-sm mt-0 mb-1 mb-md-2  ">
                                <input wire:model="agama" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"
                                @if ($isEdit == false)
                                    disabled
                                @endif>
                            </div>
                            <label class=" mt-1 mt-md-2">Telp.</label>
                            <div class="input-group input-group-sm mt-0  ">
                                <input wire:model="no_telp" type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"
                                @if ($isEdit == false)
                                    disabled
                                @endif>
                            </div>
                            @error('no_telp') <span class="error text-danger text-sm">{{ __($message) }} <br></span> @enderror
                            <label class=" mt-1 mt-md-2">Alamat</label>
                            <div class="form-group mt-0 ">
                                <textarea wire:model="alamat" class="form-control" rows="3" @if ($isEdit == false)
                                disabled
                            @endif></textarea>
                            </div>
                            @error('alamat') <span class="error text-danger text-sm">{{ __($message) }}<br></span> @enderror
                            <div class="mt-0 mb-md-2">
                                <label for="formFileSm" class="form-label">Foto*</label>
                                <input wire:model.debounce.300ms="fotoUp" class="form-control form-control-sm" id="formFileSm" type="file" @if ($isEdit == false)
                                disabled
                            @endif>
                            </div>
                            <div class="mt-0 mb-md-2">
                                <label for="formFileSm" class="form-label">Foto KTP*</label>
                                <input wire:model.debounce.300ms="foto_ktpUp" class="form-control form-control-sm" id="formFileSm" type="file" @if ($isEdit == false)
                                disabled
                            @endif>
                            </div>
                            <label class=" mt-1 ">Status Nikah</label>
                            <div class="input-group input-group-sm mt-0 mb-md-2 ">
                                <select wire:model="status" class="form-control form-control-sm" @if ($isEdit == false)
                                disabled
                            @endif>
                                    <option selected>Status</option>
                                    <option value="belum menikah">Belum Menikah</option>
                                    <option value="sudah menikah">Sudah Menikah</option>
                                </select>
                            </div>
                            @error('status') <span class="error text-sm mb-1 mb-md-2">{{ __($message) }}<br></span> @enderror
                        </div>
                        @if ($isEdit == False)
                            <a wire:click="trueEdit" class="btn bg-gradient-primary btn-lg btn-rounded w-100 mt-4 mb-0">Ubah</a>
                        @else
                        <button type=" submit" class="btn bg-gradient-primary btn-lg btn-rounded w-100 mt-4 mb-0 @if ($status == '' || $status == Null) disabled @endif " wire:loading.attr="disabled">
                            <span wire:loading.remove>SIMPAN</span>
                            <span wire:loading>
                                <div class="spinner-border spinner-border-sm" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </span>
                        </button>
                        @endif
                    </form>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>
</div>
