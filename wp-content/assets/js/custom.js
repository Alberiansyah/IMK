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
        }else if(urlFinal == 'edit-data-dokter'){
            $("#data-dokter").addClass("active-page");    
        }else if(urlFinal == 'data-obat'){
            $("#data-obat").addClass("active-page");   
        }else if(urlFinal == 'tambah-obat'){
            $("#data-obat").addClass("active-page");   
        }else if(urlFinal == 'edit-data-obat'){
            $("#data-obat").addClass("active-page");   
        }else if(urlFinal == 'data-resep'){
            $("#data-resep").addClass("active-page"); 
        }else if(urlFinal == 'tambah-resep'){
            $("#data-resep").addClass("active-page"); 
        }else if(urlFinal == 'edit-data-resep'){
            $("#data-resep").addClass("active-page"); 
        }else if(urlFinal == 'data-pasien'){
            $("#data-pasien").addClass("active-page");
        }else if(urlFinal == 'tambah-pasien'){
            $("#data-pasien").addClass("active-page");
        }else if(urlFinal == 'edit-data-pasien'){
            $("#data-pasien").addClass("active-page");
        }else if(urlFinal == 'data-diagnosa'){
            $("#data-pasien").addClass("active-page");
        }else if(urlFinal == 'laporan'){
            $("#laporan").addClass("active-page");
        }else if(urlFinal == 'tambah-transaksi'){
            $("#laporan").addClass("active-page");
        }else if(urlFinal == 'info-transaksi'){
            $("#laporan").addClass("active-page");
        }else if(urlFinal == 'tambah-diagnosa'){
            $("#data-pasien").addClass("active-page");
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
            confirmButtonText: '<i class="fa fa-trash"></i> Hapus!',
            cancelButtonText : '<i class="fa fa-window-close"></i> Batalkan.'
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = href;
            }
        });
    
    });

    $(document).on("click", "#btnHapusObat", function(e){    
        e.preventDefault()
        const nama = $(this).data("nama");
        console.log(nama)
        const href = $(this).find("#hapusObat").attr('href');
        Swal.fire({
            title: 'Apakah anda yakin menghapus obat ' + '<span class="text-danger">' + nama + '</span>' + '?',
            text: "Tindakan ini tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            customClass: 'swal-hapus-dokter',
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: '<i class="fa fa-trash"></i> Hapus!',
            cancelButtonText : '<i class="fa fa-window-close"></i> Batalkan.'
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = href;
            }
        });
    
    });

    $(document).on("click", "#btnHapusResep", function(e){    
        e.preventDefault()
        const nama = $(this).data("nama");
        console.log(nama)
        const href = $(this).find("#hapusResep").attr('href');
        Swal.fire({
            title: 'Apakah anda yakin menghapus resep obat ' + '<span class="text-danger">' + nama + '</span>' + '?',
            text: "Tindakan ini tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            customClass: 'swal-hapus-dokter',
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: '<i class="fa fa-trash"></i> Hapus!',
            cancelButtonText : '<i class="fa fa-window-close"></i> Batalkan.'
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = href;
            }
        });
    
    });

    $(document).on("click", "#btnHapusPasien", function(e){    
        e.preventDefault()
        const nama = $(this).data("nama");
        console.log(nama)
        const href = $(this).find("#hapusPasien").attr('href');
        Swal.fire({
            title: 'Apakah anda yakin menghapus pengguna ' + '<span class="text-danger">' + nama + '</span>' + '?',
            text: "Tindakan ini tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            customClass: 'swal-hapus-dokter',
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: '<i class="fa fa-trash"></i> Hapus!',
            cancelButtonText : '<i class="fa fa-window-close"></i> Batalkan.'
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = href;
            }
        });
    
    });

    $(document).on("click", "#dataObatList", function(e){    
        const idObat = $(this).data("idobat")
        const namaObat = $(this).data("namaobat")
        const hargaObar = $(this).data("hargaobat")

        $(".obatTerpilih").append(`
            <input type="hidden" name="idObat[]" value="`+idObat+`" class="form-control">
            <input type="hidden" name="hargaObat[]" value="`+hargaObar+`" class="form-control">
            <span style="font-size:15px; background-color:#000;" class="text-white">`+namaObat+`<span>,
        `);
    });
    
});

$("#resetObat").click(function(){
    $(".obatTerpilih").load(location.href+" .obatTerpilih>*","");
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