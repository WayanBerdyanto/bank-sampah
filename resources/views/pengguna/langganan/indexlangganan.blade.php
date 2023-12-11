@extends('pengguna.layouts.main')
@section('content')
    <main class="mt-5 pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @if (Auth::User()->provinsi == null && Auth::User()->kabupaten == null)
                        <div class="alert alert-warning" role="alert">
                            Anda Belum Melengkapi Profile <a href="/pengguna/profilesetting" class="text-primary">Lengkapi</a>
                        </div>
                    @endif
                    @if (Auth::User()->status_langganan == 'Sudah Langganan')
                        <div class="d-flex justify-content-end">
                            <div id="countdown">
                                <h4 class="mx-2 fw-bold fs-4">Masa Langganan Berakhir</h4>
                                <ul class="d-flex">
                                    <li class="mx-2">
                                        <span id="days">Hari</span>
                                    </li>

                                    <li class="mx-2">
                                        <span id="hours">Jam</span>
                                    </li>

                                    <li class="mx-2">
                                        <span id="minute">Menit</span>
                                    </li>

                                    <li class="mx-2">
                                        <span id="seconds">Detik</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <script>
                            // Fungsi untuk menghitung sisa waktu
                            function calculateTimeRemaining(endTime) {
                                const currentTime = new Date();
                                const difference = new Date(endTime) - currentTime;
                        
                                const days = Math.floor(difference / (1000 * 60 * 60 * 24));
                                const hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                const minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
                                const seconds = Math.floor((difference % (1000 * 60)) / 1000);
                        
                                return {
                                    'total': difference,
                                    'days': days,
                                    'hours': hours,
                                    'minutes': minutes,
                                    'seconds': seconds
                                };
                            }
                        
                            // Fungsi untuk memperbarui tampilan countdown
                            function updateCountdown() {
                                const countdownElement = document.getElementById('countdown');
                                const daysElement = document.getElementById('days');
                                const hoursElement = document.getElementById('hours');
                                const minuteElement = document.getElementById('minute');
                                const secondsElement = document.getElementById('seconds');
                        
                                const endTime = '{{ $date->toDateTimeString() }}'; // Ambil waktu dari Controller
                        
                                const timeRemaining = calculateTimeRemaining(endTime);
                        
                                daysElement.innerText = timeRemaining.days + ' Hari';
                                hoursElement.innerText = timeRemaining.hours + ' Jam';
                                minuteElement.innerText = timeRemaining.minutes + ' Menit';
                                secondsElement.innerText = timeRemaining.seconds + ' Detik';
                        
                                // Jika waktu sudah habis, lakukan sesuatu (misalnya, munculkan pesan)
                                if (timeRemaining.total <= 0) {
                                    clearInterval(countdownInterval);
                                    countdownElement.innerHTML = '<h4>Masa Langganan Telah Berakhir</h4>';
                                }
                            }
                        
                            // Perbarui setiap detik
                            const countdownInterval = setInterval(updateCountdown, 1000);
                        
                            // Panggil fungsi pertama kali agar countdown tidak menunggu satu detik pertama
                            updateCountdown();
                        </script>
                        
                    @endif
                    <h2 class="mt-2 mb-4 text-center fw-bold fs-2">Dashboard Pengguna</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="card bg-warning text-dark" style="height: 280px">
                        <div class="card-header text-center fw-bold">
                            Grafik Jenis Sampah Disetiap Hari
                        </div>
                        <div class="card-body px-4">
                            {!! $linechart->container() !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="card bg-success text-light" style="height: 280px">
                        <div class="card-header text-center fw-bold mb-1">
                            Jenis Sampah
                        </div>
                        <div class="card-body px-4">
                            {!! $chart->container() !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="card">
                        <div class="card-header">
                            <span><i class="bi bi-table me-2"></i></span> Data History Pembuangan
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped data-table" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Banksampah</th>
                                            <th>Jenis Sampah</th>
                                            <th>Tanggal Pengajuan</th>
                                            <th>Jam Pengajuan</th>
                                            <th class="text-center">Status</th>
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
                                                <td class="text-center">
                                                    <span>{{ $items->status_terima }}</span>
                                                </td>
                                                <td class="text-center">
                                                    @if ($items->status_terima == 'Ditolak')
                                                        <a href="/pengguna/hapusmasterbuang/{{ $items->id_master_pembuangan }}"
                                                            class="btn btn-danger">Hapus</a>'
                                                    @endif
                                                    @if ($items->status_terima == 'Diterima')
                                                        <a href="/pengguna/detailbuangsampah/{{ $items->id_master_pembuangan }}"
                                                            class="btn btn-success">Detail</a>
                                                    @endif
                                                    @if ($items->status_terima == 'menunggu')
                                                        <a href="/pengguna/detailbuangsampah/{{ $items->id_master_pembuangan }}"
                                                            class="btn btn-primary">Detail</a>
                                                    @endif

                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                <span class="mr-2 page-link pagination">
                                    {{ $result_master->onEachSide(5)->links() }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-12">
                    <div class="mb-3">
                        <h3 class="form-label fw-bold">Lokasi Rumah</h3>
                        <div class="card-body mb-4" id="maps" style="height: 400px">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

<div class="modal fade" id="modallogout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="exampleModalLabel">
                    <i class="bi bi-exclamation-circle-fill mr-2 text-danger"></i>
                    Logout
                </h5>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Anda Yakin Logout dari <strong>{{ Auth::user()->nama_lengkap }}</strong> ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a class="btn btn-danger" href="/pengguna/logout">Logout</a>
            </div>
        </div>
    </div>
</div>
@section('charts')
    <script src="{{ $chart->cdn() }}"></script>
    {{ $chart->script() }}
    <script src="{{ $linechart->cdn() }}"></script>
    {{ $linechart->script() }}
@endsection
