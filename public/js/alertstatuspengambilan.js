function showSweetAlertStatus() {
    Swal.fire({
        title: 'Status',
        text: 'Sudah Diambil',
        icon: 'success',
        confirmButtonText: 'Okay'
    });
}

function showSweetAlertNoStatus() {
    Swal.fire({
        title: 'Status',
        html: 'Status Belum Diambil',
        icon: 'warning',
        confirmButtonText: 'Okay'
    });

    document.getElementById('langgananLink').addEventListener('click', function() {
        window.location.href = "/pengguna/langganan";
    });
}
