<a href="" class="btn btn-primary ml-2 mt-2" target="blank">
                            <i class="bi bi-printer-fill"></i>
                            Cetak Semua</a>
<div class="card mx-4 mt-2">
    <div class="card-header">
        <span><i class="bi bi-table me-2"></i></span> Data Penerimaan Sampah Pengguna
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
                    @foreach ($result_master as $idx => $items)
                        <tr>
                            <td>{{ $result_master->firstItem() + $idx }}</td>
                            <td>{{ $items->nama_lengkap }}</td>
                            <td>{{ $items->jenis_sampah }}</td>
                            <td>{{ $items->tgl_pengajuan }}</td>
                            <td>{{ $items->jam_pengajuan }}</td>
                            <td>{{ $items->status_terima }}</td>
                            <td>
                                <a href="" class="btn btn-primary" target="blank">
                                                        <i class="bi bi-printer-fill"></i>
                                                    </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
