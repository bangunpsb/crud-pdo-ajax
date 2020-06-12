$(document).ready(function () {
    $('#myTable').DataTable({
        responsive: false
    });



    // simpan
    $("#simpan_data").click(function () {
        var simpan_data = $('#simpan_data').val();
        var nim = $('#nim').val();
        var nama = $('#nama').val();
        var email = $('#email').val();
        var password = $('#password').val();
        var level = $('#level').val();
        var no_hp = $('#no_hp').val();
        // gbr upload
        // ubah semua nilai ke form data
        var fd = new FormData();
        var files = $("#file")[0].files[0];

        fd.append('file', files);
        fd.append("simpan_data", simpan_data);
        fd.append("nim", nim);
        fd.append("nama", nama);
        fd.append("email", email);
        fd.append("password", password);
        fd.append("level", level);
        fd.append("no_hp", no_hp);

        $.ajax({
            type: 'post',
            url: 'proses/regis.php',
            data: fd,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                console.log(data);
                if (data = true) {
                    console.log(data);
                    window.location.reload();
                }
            }
        });

    });



    $(".delete").click(function () {
        var data = $(this).attr("value");
        var result = confirm('Are u sure delete nim ? ' + data);
        if (result == true) {
            $.ajax({
                type: 'post',
                url: 'proses/hapus.php',
                data: {
                    "hapus": data
                },
                success: function (data) {
                    if (data = true) {
                        window.location.reload();
                    }
                }
            });
        } else {
            alert("data user not delete ");
        }
    });



    // fungsi detail modal
    $(".detail").click(function () {
        var id_data = $(this).attr("value");
        $.ajax({
            type: 'post',
            url: 'proses/detail.php',
            data: {
                id_data: id_data
            },
            success: function (data) {
                $("#result_detail").html(data);
                $('#detailModal').modal('show');
            }
        });
    });


    // fungsi menampilkan data edit ke modal
    $(".edit").click(function () {
        var id_data = $(this).attr("value");
        $.ajax({
            type: 'post',
            url: 'proses/edit.php',
            data: {
                id_data: id_data
            },
            success: function (data) {
                $("#result_edit").html(data);
                $('#editModal').modal('show');
            }
        });
    });

    // mengedit data
    $('.edit_data').click(function () {
        var edit = 'edit_data';
        var nim = $('.editnim').val();
        var nama = $('.editnama').val();
        var email = $('.editemail').val();
        var level = $('.editlevel').val();
        var nohp = $('.editno_hp').val();
        $.ajax({
            type: 'post',
            url: 'proses/edit.php',
            data: {
                'edit': edit,
                'nim': nim,
                'nama': nama,
                'email': email,
                'level': level,
                'nohp': nohp
            },
            success: function (data) {
                $('#editModal').hide();
                location.reload();
            }
        });
    });




});



function viewimg() {
    var inputFile = document.getElementById('file');
    var pathFile = inputFile.value;
    var ekstensiOk = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if (!ekstensiOk.exec(pathFile)) {
        alert('Please select ekstension .jpeg/.jpg/.png/.gif');
        inputFile.value = '';
        return false;
    } else {
        //Pratinjau gambar
        if (inputFile.files && inputFile.files[0]) {
            var reader = new FileReader();
            reader.readAsDataURL(inputFile.files[0]);
        }
    }
}



(function ($) {
    $.fn.inputFilter = function (inputFilter) {
        return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function () {
            if (inputFilter(this.value)) {
                this.oldValue = this.value;
                this.oldSelectionStart = this.selectionStart;
                this.oldSelectionEnd = this.selectionEnd;
            } else if (this.hasOwnProperty("oldValue")) {
                this.value = this.oldValue;
                this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
            } else {
                this.value = "";
            }
        });
    };
}(jQuery));


$("#nim").inputFilter(function (value) {
    return /^\d*$/.test(value);
});
$("#nama").inputFilter(function (value) {
    return /^[a-z]*$/i.test(value);
});
$("#no_hp").inputFilter(function (value) {
    return /^\d*$/.test(value);
});