$(document).ready(function () {
    
    //evento para cargar formulario de crear registro
    $(document).on('click', '#addForm', function() {
        let url = $(this).attr('path');
        $("#modalLabel").text("Creando Registro");
        $("#loadForm").load(url);//realizar peticion
    });

    //evento para cargar el formulario de editar registro
    $(document).on('click', '.edit', function() {
        let url = $(this).attr('path');
        $("#modalLabel").text("Actualizando Registro");
        $("#loadForm").load(url);//realizar peticion
    });

    //evento para eliminar 
    $(document).on('click', '.delete', function() {
        let url = $(this).attr('path');
        Swal.fire({
            title: "Estas seguro?",
            text: "Si continuas, no podras revertir la accion!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si, eliminar!"
            }).then((result) => {
                if (result.isConfirmed) {
                    //peticion para eliminar registro
                }
            });
    });
});