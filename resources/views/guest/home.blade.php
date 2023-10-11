@extends('guest.layouts.main')
@section('home')
    <section id="home" class="mb-4">
        <div class="container-fluid d-flex position-relative mt-2">
            <div class="container d-flex align-items-center">
                <div class="kontex">
                    <h1 class="fw-bold mb-3">Peduli Lingkungan</h1>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolores quibusdam ipsum ipsam. <span>dengan
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Expedita ex tempora dolores!</span>
                    </p>
                    <a href="https://github.com/" target="_blank" class="btn btn-outline-primary px-4">Kunjungi
                        <i class="bi bi-instagram mx-2"></i>
                    </a>
                </div>
            </div>
            <img src="{{ asset('image/hero/hero_image.jpg') }}" class="hero-image" alt="">
        </div>
    </section>

    <section id="tentang" class="mt-4 bg-tentang p-4 mb-4 text-light">
        <div class="container w-75 p-4">
            <h3 class="text-center fw-bold mt-4">Tentang Kami</h3>
            <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit dicta voluptatum laboriosam maiores quibusdam
                praesentium velit, architecto inventore eos officia.</p>
        </div>
        <div class="w-100 justify-content-center d-flex p-2 flex-wrap text-center">
            <div class="container w-50">
                <h4>Judul 1</h4>
                <p class="fst-normal">Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus ad animi cumque quaerat placeat laborum non.</p>
            </div>
            <div class="container w-50">
                <h4>Judul 2</h4>
                <p class="fst-normal">Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus ad animi cumque quaerat placeat laborum non.</p>
            </div>
        </div>
    </section>
    
    <section id="berita" class="bg-berita p-4">
        <div class="container w-75">
            <h3 class="text-center fw-bold">Berita Kami</h3>
            <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit dicta voluptatum laboriosam maiores quibusdam
                praesentium velit, architecto inventore eos officia.</p>
        </div>
        <div class="w-100 justify-content-center d-flex p-2 flex-wrap">
            <div class="card m-4" style="width: 14rem;">
                <img src="{{ asset('image/hero/hero_image.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                </div>
            </div>

            <div class="card m-4" style="width: 14rem;">
                <img src="{{ asset('image/hero/hero_image.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                </div>
            </div>

            <div class="card m-4" style="width: 14rem;">
                <img src="{{ asset('image/hero/hero_image.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                </div>
            </div>

            <div class="card m-4" style="width: 14rem;">
                <img src="{{ asset('image/hero/hero_image.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                </div>
            </div>

            <div class="card m-4" style="width: 14rem;">
                <img src="{{ asset('image/hero/hero_image.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                </div>
            </div>

            <div class="card m-4" style="width: 14rem;">
                <img src="{{ asset('image/hero/hero_image.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
