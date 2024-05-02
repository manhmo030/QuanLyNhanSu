$(document).ready(function () {
    var radio1 = $('#inlineRadio1');
    var radio2 = $('#inlineRadio2');

    radio1.on('click', function () {
        if (radio2.prop('checked')) {
            radio2.prop('checked', false);
        }
        $('#vaora').html(radio1Content());
    });

    radio2.on('click', function () {
        if (radio1.prop('checked')) {
            radio1.prop('checked', false);
        }
        $('#vaora').html('');
    });
});

function radio1Content() {
    var html = '<div class="form-floating mb-3">\n' +
        '    <input type="time" class="form-control" id="floatingInput" name="nhanvien" style="width:150px" cursorshover="true">\n' +
        '    <label for="floatingInput">Vào</label>\n' +
        '</div>\n' +
        '<div class="form-floating mb-3">\n' +
        '    <input type="time" class="form-control" id="floatingInput" name="nhanvien" style="width:150px">\n' +
        '    <label for="floatingInput">Ra</label>\n' +
        '</div>';
    return html;
}
