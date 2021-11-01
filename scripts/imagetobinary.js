var hD = '0123456789ABCDEF';
function dec2hex(d) {
    var h = hD.substr(d & 15, 1);
    while (d > 15) {
        d >>= 4;
        h = hD.substr(d & 15, 1) + h;
    }
    return h;
}

var uint8View;

function Convert() {
    var hexText = "";
    var separator1 = "", separator2 = "";
    var newline = document.frmConvert.chbNewline.checked;
    if (document.frmConvert.chbSeparator.checked) {
        separator1 = "0x";
        separator2 = ", "
    }
    for (i = 0; i < uint8View.length; i++) {
        var charVal = uint8View[i];
        hexText = hexText + separator1 + (charVal < 16 ? "0" : "") + dec2hex(charVal);
        if (i < uint8View.length - 1) {
            hexText += separator2;
        }
        if (newline) {
            if ((i % 16) == 15) {
                hexText += "\n";
            }
        }
    }
}


function readFileAsArray(file) {
    var reader = new FileReader();
    reader.onload = function () {
        //var text = reader.result;
        var arr = reader.result;
        uint8View = new Uint8Array(arr);
        Convert();
    };
    reader.readAsArrayBuffer(file);
}


var openFile = function (event) {
    var input = event.target;
    readFileAsArray(input.files[0]);
};

