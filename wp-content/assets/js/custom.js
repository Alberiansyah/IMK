$(document).ready(function(){

    // Side
    $(document).ready(function(){
        let urlRaw = window.location.pathname;
        let urlFinal = urlRaw.split('/').pop();

        if(urlFinal == 'home'){
            $("#dashboard").addClass("active-page");
        }else if(urlFinal == 'data-dokter'){
            $("#data-dokter").addClass("active-page");    
        }else if(urlFinal == 'tambah-dokter'){
            $("#data-dokter").addClass("active-page");    
        }else if(urlFinal == 'data-obat'){
            $("#data-obat").addClass("active-page");   
        }else if(urlFinal == 'data-resep'){
            $("#data-resep").addClass("active-page"); 
        }else if(urlFinal == 'data-pasien'){
            $("#data-pasien").addClass("active-page");
        }else if(urlFinal == 'laporan'){
            $("#laporan").addClass("active-page");
        }
    });

    // Search Shortcut
    $(document).keydown(function(event) {
        if (event.ctrlKey && event.which == 13){
            $("a#search-button").trigger("click"); 
            event.preventDefault();
        }
    });

    $(document).on("click", "#btnHapusDokter", function(e){    
        e.preventDefault()
        const nama = $(this).data("nama");
        console.log(nama)
        const href = $(this).find("#hapusDokter").attr('href');
        Swal.fire({
            title: 'Apakah anda yakin menghapus pengguna ' + '<span class="text-danger">' + nama + '</span>' + '?',
            text: "Tindakan ini tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            customClass: 'swal-hapus-dokter',
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Hapus!',
            cancelButtonText : 'Batalkan.'
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = href;
            }
        });
    
    })
    
});

const alert = $(".alert").data("tambah");
if(alert){
    Swal.fire(
        'Berhasil!',
        alert,
        'success'
    )
}

const alertGagal = $(".alertGagal").data("tambah");
if(alertGagal){
    Swal.fire(
        'Gagal!',
        alertGagal,
        'error'
    )
}