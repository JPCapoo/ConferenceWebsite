$(document).ready(function(){
    $('#crear-admin').on('submit', function(e){
        e.preventDefault();

        var datos = $(this).serializeArray();

        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url:  $(this).attr('action'),
            dataType: 'json',
            success: function(data){
                var resultado = data;
                if(resultado.respuesta === 'exito'){
                    Swal.fire(
                        'Correcto',
                        'El administrador se creó correctamente',
                        'success'
                    )
                } else {
                    Swal.fire(
                        'Error',
                        'Hubo un error',
                        'error'
                    )
                }
            }
        })
    });

    $('#login-admin').on('submit', function(e){
        e.preventDefault();
        
        var datos = $(this).serializeArray();

        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url:  $(this).attr('action'),
            dataType: 'json',
            success: function(data){
                console.log(data);
                var resultado = data;
                if(resultado.respuesta === 'exitoso'){
                    Swal.fire(
                        'Login Correcto',
                        'Bienvenid@ '+resultado.respuesta+' !!',
                        'success'
                    )
                    setTimeout(function() {
                        window.location.href('admin-area.php');
                    }, 2000)
                } else {
                    Swal.fire(
                        'Error',
                        'Password o Usuario incorrectos',
                        'error'
                    )
                }
            }   
        })
    });
});