// public/js/axiosHelper.js
/* import Swal from 'sweetalert2'; */

const handleResponse = (response) => {
    return response.data;
};

const handleError = (error) => {
    let errorMessage = "¡Ups! Algo salió mal. Por favor, inténtalo de nuevo.";
    let errorIcon = "<lord-icon src='{{asset('media/gif/error de conexion.json') }}' trigger='loop' style='width: 200px; height: 200px;'></lord-icon>";

    if (error.response) {
        switch (error.response.status) {
            case 400:
                errorMessage = `Error ${error.response.status}: Parece que hubo un error en la solicitud.`;
                errorIcon = "<lord-icon src='media/gif/error 400.json' trigger='loop' style='width: 200px; height: 200px;'></lord-icon>";
                break;
            case 401:
            case 419:
                window.location.href = '/login';
                return;
            case 500:
                errorMessage = "Hay un problema con el servidor. Estamos trabajando para solucionarlo.";
                errorIcon = "<lord-icon src='media/gif/error 500.json' trigger='loop' style='width: 200px; height: 200px;'></lord-icon>";
                break;
            default:
                errorMessage = `Error ${error.response.status}: Ocurrió un problema inesperado.`;
                errorIcon = "<lord-icon src='media/gif/error de conexion.json' trigger='loop' style='width: 200px; height: 200px;'></lord-icon>";
        }
    } else if (error.request) {
        errorMessage = "La conexión está tardando más de lo esperado. Por favor, verifica tu conexión a Internet.";
        errorIcon = "<lord-icon src='media/gif/carga lenta.json' trigger='loop' style='width: 200px; height: 200px;'></lord-icon>";
    } else {
        errorMessage = "Hubo un problema al configurar la solicitud: " + error.message;
    }

    Swal.fire({
        title: "¡Oops!",
        html: `${errorIcon} <br> ${errorMessage}`,
        showCloseButton: true,
        backdrop: true,
    });
};

export { handleResponse, handleError };