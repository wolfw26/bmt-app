<div class="container-fluid">
    <div class="card shadow-lg">
        <div class="card-header pb-0">
            <h3 class="text-center text-primary">DATA ADMIN</h3>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#adminAkun">
                Tambah
            </button>
        </div>
        <div class="card-body">
            <div class="card px-0">
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive max-height-400 overflow-y-scroll">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr class=" text-center">
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>TTL</th>
                                    <th>JK</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 1;$i <=50; $i++ ) <tr class=" text-center">
                                    <td>{{ $i }}</td>
                                    <td>ANdreas-{{ $i }}</td>
                                    <td>Jl.jalan jalan</td>
                                    <td>15-06-{{ $i + 1990 }}</td>
                                    <td>Laki-laki</td>
                                    @if ($i % 2 == 0)
                                    <td>Belum</td>
                                    @else
                                    <td>Sudah</td>
                                    @endif
                                    </tr>
                                    @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal 1 -->
<div class="modal fade" id="adminAkun" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="card card-plain">
                    <div class="card-header pb-0 text-left d-flex justify-content-start">
                        <button type="button" class="btn-close text-dark " data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <h3 class="font-weight-bolder text-primary text-gradient mx-5">Join us today</h3>
                    </div>
                    <div class="card-body pb-3">
                        <form role="form text-left">
                            <label>Name</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="name-addon">
                            </div>
                            <label>Email</label>
                            <div class="input-group mb-3">
                                <input type="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email-addon">
                            </div>
                            <label>Password</label>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center pt-0 px-sm-4 px-1">

                        <button class="btn btn-primary" data-bs-target="#dataAdmin" data-bs-toggle="modal" data-bs-dismiss="modal">Next</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal 2-->
<div class="modal fade" id="dataAdmin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center font-weight-bolder " id="staticBackdropLabel">Tambah Data Admin Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row px-1">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-alternative" name="username" placeholder="username">
                            </div>
                            <div class="form-group">
                                <input class="form-control form-control-alternative" type="email" name="email" placeholder="E-Mail">
                            </div>
                            <div class="form-group">
                                <input class="form-control form-control-alternative" type="password" name="password" placeholder="password">
                            </div>
                        </div>
                        <div class="col-6"></div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a class="btn btn-secondary btn-sm bg-gradient-faded-primary-vertical" data-bs-toggle="modal" href="#adminAkun" role="button">Back to Akun</a>
                <button type="button" class="btn btn-primary bg-gradient-primary btn-sm">Tambahkan</button>
            </div>
        </div>
    </div>
</div>