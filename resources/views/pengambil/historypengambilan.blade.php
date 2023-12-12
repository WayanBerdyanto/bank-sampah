<div class="card mx-4 mt-2">
    <div class="card-header">
        <span><i class="bi bi-table me-2"></i></span> Data Penerimaan Sampah
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped data-table" style="width: 100%">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pengguna</th>
                        <th>Jenis Sampah</th>
                        <th>Tgl Pengajuan</th>
                        <th>Jam Pengajuan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($result as $idx => $item)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $item->nama_lengkap }}</td>
                            <td>{{ $item->jenis_sampah }}</td>
                            <td>{{ $item->tanggal }}</td>
                            <td>{{ $item->jam }}</td>
                            <td>{{ $item->status_pengambilan }}</td>
                            <td>
                                <form action="#" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-success">
                                        <i class="bi bi-printer"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>