<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-12">
                <!-- Button trigger modal -->
                <button wire:click="modalType('add', null)" type="button" class="btn btn-primary btn-sm px-2" data-bs-toggle="modal" data-bs-target="#staticBackdropadd">
                    Tambah jabatan
                </button>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card px-2 mt-3">
                    <div class="card-header">
                        <h3 class=" text-center">JABATAN</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            @if (count($selectedItems) > 0)
                            @foreach ( $selectedItems as $sd )
                            {{ $sd }}
                            @endforeach
                            <div class="fixed-bottom bg-transparent p-3 d-flex justify-content-center">
                                <div class=" mx-2">
                                    <button class="btn btn-sm bg-gradient-danger" wire:click="deleteSelected">Delete Selected</button>
                                </div>
                                <div class="dropup">
                                    <button class="btn btn-sm btn-primary dropdown-toggle" type="button" id="statusDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                        Update Status
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="statusDropdown">
                                        <li><a class="dropdown-item" wire:click="updateStatus('active')">Active</a></li>
                                        <li><a class="dropdown-item" wire:click="updateStatus('non-active')">Non-Active</a></li>
                                    </ul>
                                </div>
                            </div>
                            @endif
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class=" text-center"><input type="checkbox" wire:model="selectAll" wire:click="UpdateselectAll"></th>
                                        <th>JABATAN</th>
                                        <th>Deskripsi</th>
                                        <th>Status</th>
                                        <th class="px-2">Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $data as $d )
                                    <tr>
                                        <td class="text-center">
                                            <input type="checkbox" wire:model="selectedItems" value="{{ $d->id }}" wire:key="checkbox-{{ $d->id }}">
                                        </td>
                                        <td>{{ $d->jabatan }}</td>
                                        <td>{{ $d->deskripsi }}</td>
                                        <td>{{ $d->status }}</td>
                                        <td class="px-2">
                                            <button wire:click="modalType('edit',{{ $d->id }})" class="border-0 bg-transparent p-1" data-bs-toggle="modal" data-bs-target="#staticBackdropedit">
                                                <i class="ni ni-folder-17" title="Edit {{ $d->jabatan }}"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div wire:ignore class="modal fade" id="staticBackdrop{{ $modal }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-uppercase" id="staticBackdropLabel">{{ $modal }} Data Jabatan</h5>
                    @error('deskripsi') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                        <form wire:submit.prevent="submitForm">
                            <div class="form-group">
                                <label class="form-control-label">Jabatan</label>
                                <input wire:model="jabatan"  type="text" class="form-control form-control-sm @error('jabatan') is-invalid @enderror">
                                @error('jabatan') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Deskripsi</label>
                                <input wire:model="deskripsi"  type="text" class="form-control form-control-sm @error('deskripsi') is-invalid @enderror">
                                @error('deskripsi') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <div class="modal-footer mt-2">
                        <button type="button" class="btn bg-gradient-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-sm bg-gradient-primary text-capitalize">{{ $modal }}</button>

                    </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
