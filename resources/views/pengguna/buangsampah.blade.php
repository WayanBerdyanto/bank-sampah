@extends('pengguna.layouts.main')
@section('content')
    <main class="mt-5 pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <i class="bi bi-info-circle"></i>
                        Anda Belum Berlangganan Berat Max <strong>5 kg</strong>!
                        <a href="/pengguna/langganan" class="text-primary">
                            <ins>Langganan</ins>
                        </a>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <form action="/pengguna/postbuangsampah" method="POST">
                        @csrf
                        <h4 class="mb-3 fs-4 fw-bold">Input Buang sampah</h4>
                        <div class="mb-3 row">
                            <label for="jenis" class="col-sm-2 col-form-label">Jenis Sampah</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="jenis_sampah" aria-label="Default select example"
                                    required>
                                    <option selected>Pilih Jenis Sampah</option>
                                    <option value="organik">Sampah Basah (Organik)</option>
                                    <option value="anorganik">Sampah Padat (Anorganik) </option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="jenis" class="col-sm-2 col-form-label">Lokasi Pembuangan</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="idbanksampah" aria-label="Default select example"
                                    required>
                                    <option selected>Pilih Lokasi Pembuangan</option>
                                    @foreach ($banksampah as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama_lengkap }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row" hidden>
                            <label for="tgl" class="col-sm-2 col-form-label">Pilih Jam</label>
                            <div class="col-sm-10">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="text" name="tgl_pengajuan" id="tgl"
                                        value="">
                                </div>
                            </div>
                        </div>
                        <script>
                            var currentDate = new Date();
                            var formattedDate = currentDate.toISOString().slice(0, 16).replace("T", " ");

                            document.getElementById("tgl").value = formattedDate;
                        </script>
                        <div class="mb-3 row" hidden>
                            <label for="jam" class="col-sm-2 col-form-label">Pilih Jam</label>
                            <div class="col-sm-10">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="text" name="jam_pengajuan" id="jam"
                                        value="">
                                </div>
                            </div>
                        </div>
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                var jamInput = document.getElementById('jam');

                                var currentTime = new Date();

                                var formattedTime = currentTime.getHours() + ':' + currentTime.getMinutes() + ':' + currentTime
                                    .getSeconds();

                                jamInput.value = formattedTime;
                            });
                        </script>
                        <input type="text" name="id_dtl_pembuangan" hidden>
                        <input type="text" name="id_master_pembuangan" hidden>
                        <input type="text" name="status" value="Belum Bayar" hidden>

                        <div class="col-md-12 px-4 text-end mb-4">
                            <button type="submit" class="btn btn-primary px-4">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <h3 class="form-label fw-bold">Lokasi Pembuangan Sampah</h3>
                        <div id="userLabel" data-user-label="{{ $user }}"></div>
                        <div class="card-body" id="mapss" style="height: 400px"></div>
                        <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

                        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
                            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
                        <script>
                            var map = L.map('mapss').setView([0, 0], 30);
                            // Add a basemap (e.g., OpenStreetMap)
                            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                maxZoom: 19,
                                attribution: '&copy; <ahref = "http://www.openstreetmap.org/copyright" > OpenStreetMap < /a>'
                            }).addTo(map);

                            // Get the user's geolocation and add a marker
                            navigator.geolocation.getCurrentPosition(function(position) {
                                var lat = position.coords.latitude;
                                var lon = position.coords.longitude;
                                map.setView([lat, lon], 18);
                                var userLocation = L.marker([lat, lon]).addTo(map);
                                userLocation.bindPopup('You are here!').openPopup();
                            });
                            var iconUrls = [
                                'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png',
                                'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
                                'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-gold.png',
                                'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-violet.png',

                                // Tambahkan lebih banyak link ikon sesuai kebutuhan Anda
                            ];


                            var locations = <?php echo json_encode($banksampah); ?>;
                            // console.log(locations);
                            // looping for create marker per location
                            locations.forEach(e => {
                                var randomIconUrl = iconUrls[Math.floor(Math.random() * iconUrls.length)];

                                var greenIcon = new L.Icon({
                                    iconUrl: randomIconUrl,
                                    shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
                                    iconSize: [25, 41],
                                    iconAnchor: [12, 41],
                                    popupAnchor: [1, -34],
                                    shadowSize: [41, 41]
                                });
                                // Creating a marker for each bank sampah location with default icon and random color
                                L.marker([e.latitude,
                                    e.longitude
                                ], {
                                    icon: greenIcon
                                }).addTo(map).bindPopup(e.nama_lengkap).openPopup();
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
