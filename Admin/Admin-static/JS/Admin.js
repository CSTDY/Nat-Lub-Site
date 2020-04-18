function readURL(input) {
    if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
        $('#prev').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
    }
}

function Show_block(id) {
    document.getElementById(id).style.display = "block";
}

function Hide_block(id) {
    document.getElementById(id).style.display = "none";
}

function Download_ID(id, target) {
    var val = document.getElementById(id).value;
    document.getElementById(target).value = val;
}