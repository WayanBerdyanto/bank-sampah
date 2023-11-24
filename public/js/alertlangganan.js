function showSweetAlertLangganan() {
    Swal.fire({
        title: 'Status',
        text: 'Anda Berlangganan',
        icon: 'success',
        confirmButtonText: 'Okay'
    });
}
function showSweetAlertNoLangganan() {
    Swal.fire({
        title: 'Status',
        html: 'Anda Belum Langganan <br> <a id="langgananLink" class="text-primary" href="/pengguna/langganan">Klik Untuk Langganan</a>',
        icon: 'warning',
        confirmButtonText: 'Okay'
    });

    document.getElementById('langgananLink').addEventListener('click', function() {
        window.location.href = "/pengguna/langganan";
    });
}