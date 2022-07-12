$(document).ready(function () {
    
    $('#tambah-bahan').on('click',function () {
        let kodeBahan = $('#kode_bahan').val();
        let namaBahan = $('#nama_bahan').val();
    
        $.ajax({
            type: "post",
            url: "/simpan_bahan",
            data: {
                'kodebahan':kodeBahan,
                'namabahan':namaBahan
            },
            dataType: "json",
            success: function (response) {
                
            }
        });
    });
});
