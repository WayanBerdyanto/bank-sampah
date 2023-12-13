<h4 class="my-3 text-center">Data Penerimaan Sampah Pengguna <i class="bi bi-receipt"></i></h4>
<div class="card mx-4">
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
                        <th class="text-center">Aksi</th>
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
                            @if (!empty($items->berat_sampah))
                                <td class="text-center">
                                    <button
                                        href="/banksampah/detailpenerimaan/{{ $items->id_dtl_pembuangan }}"
                                        class="btn btn-success" disabled>Timbang
                                    </button>
                                </td>
                            @else
                                <td class="text-center"><a
                                        href="/banksampah/detailpenerimaan/{{ $items->id_dtl_pembuangan }}"
                                        class="btn btn-primary">Timbang</a></td>
                            @endif

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>