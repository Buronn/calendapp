var user;
$.getJSON('https://api.db-ip.com/v2/free/self', function (data) {
    user = data["ipAddress"];
    for (var i = 0; i < 3; i++) {
        user = user.replace('.', '');
    }
});
var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
    return new bootstrap.Popover(popoverTriggerEl)
    
})
$(document).ready(function () {
    $('.d-inline-block').popover();
    $('#profile-pic').on('click', function () {
        $('#profile-image-upload').click();
        if ($('#profile-image-upload').get(0).files.length === 0) {
            console.log("No files selected.");
        }
    });
    $("#profile-image-upload").change(function (e) {
        var file = document.getElementById("profile-image-upload").files[0];
        document.getElementById("cargando").classList.remove("d-none");
        readFileAsArray(file);
        var form_data = new FormData();
        form_data.append('file', file);
        form_data.append('user', getCookie("PHPSESSID"));
        var location = "";
        $.ajax({
            url: '/log/ajaxupload.php',
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function (php_script_response) {
                if (php_script_response != "ERROR") {
                    location = php_script_response;
                    console.log(location);
                    document.getElementById("profile-pic").src = location;
                }else{
                    console.log("ERROR");
                }
                document.getElementById("cargando").classList.add("d-none");
            }
        });

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
            separator1 = "0x";
            separator2 = ", "

            for (i = 0; i < uint8View.length; i++) {
                var charVal = uint8View[i];
                hexText = hexText + separator1 + (charVal < 16 ? "0" : "") + dec2hex(charVal);
                if (i < uint8View.length - 1) {
                    hexText += separator2;
                }
                if ((i % 16) == 15) {
                    hexText += "\n";
                }

            }
            clean_hex(hexText, true);
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
        function clean_hex(input, remove_0x) {
            input = input.toUpperCase();

            if (remove_0x) {
                input = input.replace(/0x/gi, "");
            }
            input = input.replace(/[^A-Fa-f0-9]/g, "");
            return input;
        }
    });

});
//REGISTRO
function Register() {
    var email = document.getElementById("correo").value;
    var user = document.getElementById("usuario").value;
    var pass = document.getElementById("clave").value;
    var description = document.getElementById("description").value;
    var phpsession = getCookie("PHPSESSID");
    cursos = [];
    var cont = 0;
    $("#ListaCursos").children().each(function() {
        cursos[cont] = this.id;
        cont = cont+1;
      });

    $.ajax({
        url: './register.php',
        type: 'POST',
        dataType: 'html',
        data: {
            email: email,
            user: user,
            pass: pass,
            cursos: cursos,
            description: description,
            phpsession: phpsession
        }

    })
        .done(function (respuesta) {
            console.log(respuesta);
            $("#alerta").html(respuesta);
        })
        .fail(function () {
            console.log("Error: Not user found")
        });
}


//OBTENER COOKIES
function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}


//Borrar curso
function DelCurso(id) {
    id1 = id + "1";
    document.getElementById(id1).remove();
    document.getElementById(id).remove();
}

//login
function login() {
    var user = document.getElementById("user").value;
    var pass = document.getElementById("pass").value;
    $.ajax({
        url: './checklogin.php',
        type: 'POST',
        dataType: 'html',
        data: {
            user: user,
            pass: pass
        }

    })
        .done(function (respuesta) {
            $("#alerta").html(respuesta);
        })
        .fail(function () {
            console.log("Error: Not user found")
        });
};

//Publicar
function Publicar(){
    var post = $.trim($("#to-publish").val());
    console.log(post);
    $.ajax({
        url: './publicar.php',
        type: 'POST',
        dataType: 'html',
        data: {
            post: post
        }

    })
        .done(function (respuesta) {
            console.log(respuesta);
            location.reload();
        })
        .fail(function () {
            console.log("Error: Not user found")
        });
}

//LIKE
function Like(id,existe){
    console.log(id);
    console.log(existe);

    $.ajax({
        url: './likes.php',
        type: 'POST',
        dataType: 'html',
        data: {
            id: id,
            existe : existe
        }

    })
        .done(function (respuesta) {
            console.log(respuesta);
            location.reload();
        })
        .fail(function () {
            console.log("Error: Not user found")
        });
}

//MOSTRAR COMENTARIOS
function ShowComments(id){
    if($("#hide"+id).hasClass('hide')){
        $("#hide"+id).removeClass('hide');
    }else{
        $("#hide"+id).addClass('hide');
    }
}


//COMENTAR
function Comment(id){
    var comment = $("#text" + id).val();
    console.log(id);
    $.ajax({
        url: './comment.php',
        type: 'POST',
        dataType: 'html',
        data: {
            id: id,
            comment : comment,
        }

    })
        .done(function (respuesta) {
            console.log(respuesta);
            location.reload();
        })
        .fail(function () {
            console.log("Error: Not user found")
        });
}



//Añadir curso
function AddCurso() {
    var curso = document.getElementById("exampleDataList").value;
    var id = curso.replace(/\s/g, '_');
    if (document.getElementById(id) != null) {
        DelCurso(id);
    }
    var texto = document.getElementById("ListaCursos").outerHTML;
    if (curso != "") {
        document.getElementById("exampleDataList").value = "";
        $.ajax({
            url: '../log/listacursos.php',
            type: 'POST',
            dataType: 'html',
            data: {
                curso: curso,
                texto: texto
            }

        })
            .done(function (respuesta) {
                $("#ListaCursos").html(respuesta);
            })
            .fail(function () {
                console.log("Error: 404")
            });
    }

}

//LINK DIRECTO
function GoTo(url) {
    console.log(url)
    window.location.href = url;
}

function Cursos() {
    var hola = 'hola';
    $.ajax({
        url: '../log/cursos.php',
        type: 'POST',
        dataType: 'html',
        data: {
            hola: hola
        }

    })
        .done(function (respuesta) {
            $("#OpcionesCurso").html(respuesta);
        })
        .fail(function () {
            console.log("Error: 404")
        });
};

