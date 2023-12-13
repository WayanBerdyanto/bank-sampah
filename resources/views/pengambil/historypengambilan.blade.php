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
                        <th>Petugas Pengambil</th>
                        <th>Jenis Sampah</th>
                        <th>Jam Pengajuan</th>
                        <th>Hari Pengajuan</th>
                        <th>Tanggal Pengajuan</th>
                        <th class="text-center">Status Pengambilan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($result as $item)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $item->nama_lengkap }}</td>
                            <td>{{ $item->jenis_sampah }}</td>
                            <td>{{ $item->jam }}</td>
                            <td>{{ $item->hari }}</td>
                            <td>{{ $item->tanggal }}</td>
                            <td class="text-center">
                                <span class="fst-italic fw-bold">{{ $item->status_pengambilan }}</span>
                            </td>
                            <td>
                                <a class="btn btn-primary" href="/pengambil">
                                    <i class="bi bi-printer-fill"></i>
                                </a>
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
