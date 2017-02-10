$(document).ready(function(){
    //Alert Sliding
    $('div.alert').not('alert-important').delay(3000).slideUp(300);

    //Hapus select dengan empty Value dari url
    $("#form-pencarian").submit(function(){
        $("#id_kelas option[value='']").attr("disabled", "disabled");
        $("#jenis_kelamin option[value='']").attr("disabled", "disabled");

        return true;
    });
});