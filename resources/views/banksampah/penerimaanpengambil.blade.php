<h4 class="my-3 text-center">Data Penerimaan Sampah Pengambil <i class="bi bi-receipt"></i></h4>
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
                        <th>Nama Pengambil</th>
                        <th>Jenis Sampah</th>
                        <th class="text-center">Berat Sampah</th>
                        <th class="text-center">Status Konfirmasi</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($result_pengambilan as $idx=> $item)
                        <tr>
                            <td>
                                {{$result_pengambilan->firstItem() + $idx}}
                            </td>
                            <td>
                                {{$item->nama_lengkap}}
                            </td>
                            <td>
                                {{$item->jenis_sampah}}
                            </td>
                            <td class="text-center">
                                {{$item->berat}} Kg
                            </td>
                            <td class="text-center">
                                {{$item->confirm}}
                            </td>
                            <td colspan="2" class="text-center">
                                <a href="/banksampah/terimaambil/{{$item->id_penerimaan_sampah}}" class="btn btn-primary">
                                    <i class="bi bi-check-square-fill"></i>
                                </a>
                                <a href="/banksampah/tolakambil/{{$item->id_penerimaan_sampah}}"class="btn btn-danger">
                                    <i class="bi bi-x-square-fill"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
