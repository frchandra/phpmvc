// JavaScript source code
$(function () {

    $('.tombolTambahData').on('click', function () {
        $('#judulModal').html('tambah data mahasiswa');
        $('.modal-footer button[type=submit]').html('tambah data');
    });



    $('.tampilModalUbah').on('click', function () {
        $('#judulModal').html('ubah data mahasiswa');
        $('.modal-footer button[type=submit]').html('ubah data');
        $('.modal-body form').attr('action', 'http://127.0.0.1/phpmvc/public/mahasiswa/ubah');
        const id = $(this).data('id');
        
        $.ajax({
            url: 'http://127.0.0.1/phpmvc/public/mahasiswa/getUbah',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#nama').val(data.nama);
                $('#no').val(data.no);
                $('#email').val(data.email);
                $('#jurusan').val(data.jurusan);
                $('#id').val(data.id);
            }

        });

    });

});