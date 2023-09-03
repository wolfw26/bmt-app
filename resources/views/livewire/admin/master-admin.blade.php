<div class="container-fluid py-md-3  px-2">
    <div class="card">
        <div class="card-header">
            <h2 class="text-center">DATA ADMIN</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th>Username</th>
                            <th>E-mail</th>
                            <th>role</th>
                            <th>Nama Lengkap</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $data as $d )
                        <tr class="text-center">
                            <td> {{ $d->name }} </td>
                            <td> {{ $d->email }} </td>
                            <td> {{ $d->role }} </td>
                            @if ( $d->userData)
                            <td> {{ $d->userData->nama }} </td>
                            @else
                                <td> - </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
        <div class="card-footer"></div>
    </div>
</div>
