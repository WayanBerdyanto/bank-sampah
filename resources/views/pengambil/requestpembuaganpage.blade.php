@extends('pengambil.layouts.main')
@section('content')
    <main class="mt-5 pt-3">
        <div class="container-fluid">
            <div class="row">
                <h4 class="mx-4 my-3 text-center">Data Request buang Sampah</h4>
                <div class="col-md-12 mb-3">
                    <div class="card">
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
                                            <th>Lokasi Pembuangan</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($result as $idx => $item)
                                            <tr>
                                                <td> {{$loop->index + 1 }} </td>
                                                <td>{{$item->nama_lengkap}}</td>
                                                <td>
                                                    {{$item->jenis_sampah}}
                                                </td>
                                                <td class="text-center">
                                                    {{$item->berat}} Kg
                                                </td>
                                                <form action="" method="POST">
                                                    @csrf
                                                    <td hidden>
                                                        <input type="text" name="id_dtl_pengambilan" value="{{$item->id_dtl_pengambilan}}">
                                                    </td>
                                                    <td>
                                                        <select class="form-select" name="idbanksampah"
                                                            aria-label="Default select example" required>
                                                            <option selected>Pilih Lokasi Pembuangan</option>
                                                            @foreach ($getBank as $data)
                                                            
                                                                <option value="{{ $data->id }}">
                                                                    {{ $data->nama_lengkap }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <button type="submit" class="btn btn-primary">Request</button>
                                                    </td>
                                                </form>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <span class="mr-2 page-link pagination">
                                    {{ $result->onEachSide(10)->links() }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <h4 class="form-label fw-bold my-3">Lokasi Banksampah</h4>
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
                                map.setView([lat, lon], 10);
                                var userLocation = L.marker([lat, lon]).addTo(map);
                                userLocation.bindPopup('Lokasi Anda saat ini').openPopup();
                            });
                            var iconUrls = [
                                'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png',
                                'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
                                'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-gold.png',
                                'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-violet.png',
                                'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-purple.png',
                                'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-blue.png',
                            ];


                            var locations = <?php echo json_encode($getBank); ?>;
                            locations.forEach(e => {
                                var randomIconUrl = iconUrls[Math.floor(Math.random() * iconUrls.length)];

                                console.log(e.latitude);
                                console.log(e.longitude);
                                console.log(e.nama_lengkap);
                                console.log(e.kabupaten);

                                var greenIcon = new L.Icon({
                                    iconUrl: randomIconUrl,
                                    shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
                                    iconSize: [25, 41],
                                    iconAnchor: [12, 41],
                                    popupAnchor: [1, -34],
                                    shadowSize: [41, 41]
                                });

                                // Creating a marker for each bank sampah location with default icon and random color
                                var marker = L.marker([e.latitude, e.longitude], {
                                    icon: greenIcon
                                }).addTo(map);

                                // Creating a popup with information and attaching it to the marker
                                var popupContent = "<b>" + e.nama_lengkap + "</b><br>Penampungan: " + e.kapasitas + " Kg";
                                marker.bindPopup(popupContent).openPopup();
                            });
                        </script>

                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
