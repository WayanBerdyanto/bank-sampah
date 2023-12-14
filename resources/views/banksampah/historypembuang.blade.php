<a href="/history/pengambil/download" class="btn btn-primary ml-2 mt-2" target="blank">
                            <i class="bi bi-printer-fill"></i>
                            Cetak Semua</a>
<div class="card mx-4 mt-2">
    <div class="card-header">
        <span><i class="bi bi-table me-2"></i></span> Data Penerimaan Sampah Pengambil
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped data-table" style="width: 100%">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pengambil</th>
                        <th>Jenis Sampah</th>
                        <th>Tgl Pengajuan</th>
                        <th>Jam Pengajuan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach ($result_pengambilan as $idx => $items)
                        <tr>
                            <td>{{ $result_master->firstItem() + $idx }}</td>
                            <td>{{ $items->nama_lengkap }}</td>
                            <td>{{ $items->jenis_sampah }}</td>
                            <td>{{ $items->tanggal }}</td>
                            <td>{{ $items->jam }}</td>
                            <td>{{ $items->confirm }}</td>
                             <td>
                                <a href="/banksampah/history/pengambil/download/{{ $items->id_dtl_pengambilan }}" class="btn btn-primary" target="blank">
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
