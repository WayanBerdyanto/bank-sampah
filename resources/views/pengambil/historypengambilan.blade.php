<div class="w-100 d-flex mx-4">
    <a href="/pengambil/history/download" class="btn btn-primary mb-2" target="blank">
        <i class="bi bi-printer-fill"></i>
        Cetak Semua</a>
</div>
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
                        <th>Berat Sampah</th>
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
                            <td>{{ $item->berat }} kg</td>
                            <td>{{ $item->tanggal }}</td>
                            <td>{{ $item->jam }}</td>
                            <td>{{ $item->status_pengambilan }}</td>
                            <td>
                                
                            <td>
                                <a href="/pengambil/history/download/{{ $item->id_dtl_pengambilan }}"
                                    class="btn btn-primary" target="blank">
                                    <i class="bi bi-printer-fill"></i>
                                </a>
                            </td>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <span class="mr-2 page-link pagination">
                {{ $result->onEachSide(5)->links() }}
            </span>
        </div>
    </div>
</div>