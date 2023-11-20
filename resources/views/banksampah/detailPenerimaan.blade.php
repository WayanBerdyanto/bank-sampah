@extends('banksampah.layouts.main')
@section('content')
    <main class="mt-5 pt-3">
        <div class="container-fluid">
            <div class="card">
                <h5 class="card-header">Request Pembuangan dari $Username</h5>
                <div class="card-body">
                    <h5 class="card-title">Data Pembuangan</h5>
                    <ul class="list-group">
                        <li class="list-group-item" hidden>Id pembuangan</li>
                        <li class="list-group-item">Banyak sampah : 5 Kg</li>
                        <li class="list-group-item">Jenis sampah : Organik</li>
                        <li class="list-group-item">Pembuangan pada jam : 9:30</li>
                      </ul>
                    <a href="#" class="btn btn-success mt-4">Terima</a>
                    <a href="#" class="btn btn-danger mt-4" >Tolak</a>
                </div>
            </div>
        </div>
    </main>
@endsection
