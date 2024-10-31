// public/js/axiosHelper.js
/* import Swal from 'sweetalert2'; */

const tiempoEstandar = { timeout: 15000 };

const handleResponse = (response) => {
    return response.data;
};

const handleError = (error,nombre,formulario) => {
    let errorMessage = "¡Ups! Algo salió mal. Por favor, inténtalo de nuevo.";
    let errorIcon = "<lord-icon src='/media/gif/error de conexion.json' trigger='loop' style='width: 200px; height: 200px;'></lord-icon>";

    if (error.response) {
        switch (error.response.status) {
            case 400:
                errorMessage = `Error ${error.response.status}: Parece que hubo un error en la solicitud.`;
                errorIcon = "<lord-icon src='/media/gif/error 400.json' trigger='loop' style='width: 200px; height: 200px;'></lord-icon>";
                break;
            case 404:
                errorMessage = `Error ${error.response.status}: ¡Vaya! No encontramos lo que buscabas.`;
                errorIcon = "<lord-icon src='/media/gif/error 404.json' trigger='loop' style='width: 300px; height: 300px;'></lord-icon>";
                break;
            case 422: // Errores de validación
                clearErrors(formulario);
                const form = document.getElementById(formulario);
                const errors = error.response.data.errors;
                let errorMessages = [];
                
                for (const field in errors) {
                    const errorMessage = errors[field][0];
                    const input = form.querySelector(`[name="${field}"]`);
                    const errorDiv = document.createElement('span');
                    errorDiv.className = 'error text-danger';
                    errorDiv.textContent = errorMessage;
                    input.parentNode.insertBefore(errorDiv, input.nextSibling);
                }

                if (error.response.data.error) {
                    errorMessages.push(error.response.data.error);
                    errorMessage = `${nombre}, ${errorMessages.join(', ')}, verifica los datos por favor :)`;
                    errorIcon = "<lord-icon src='/media/gif/alerta.json' trigger='loop' style='width: 200px; height: 200px;'></lord-icon>";
                } else {
                    errorMessage = `${nombre}, encontramos errores en tu formulario, verifica los datos por favor :)`;
                    errorIcon = "<lord-icon src='/media/gif/formulario invalido.json' trigger='loop' style='width: 200px; height: 200px;'></lord-icon>";
                }
                break;
            case 401:
            case 419:
                window.location.href = '/login';
                return;
            case 500:
                errorMessage = "Hay un problema con el servidor. Estamos trabajando para solucionarlo.";
                errorIcon = "<lord-icon src='/media/gif/error 500.json' trigger='loop' style='width: 200px; height: 200px;'></lord-icon>";
                break;
            default:
                errorMessage = `Error ${error.response.status}: Ocurrió un problema inesperado.`;
                errorIcon = "<lord-icon src='/media/gif/error de conexion.json' trigger='loop' style='width: 200px; height: 200px;'></lord-icon>";
        }
    } else if (error.request) {
        errorMessage = "La conexión está tardando más de lo esperado. Por favor, verifica tu conexión a Internet.";
        errorIcon = "<lord-icon src='/media/gif/carga lenta.json' trigger='loop' style='width: 200px; height: 200px;'></lord-icon>";
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

function clearErrors(formulario) {
    const form = document.getElementById(formulario);
    const errorMessages = form.querySelectorAll('span.error');
    errorMessages.forEach((msg) => {
        msg.remove();
    });
}

export { handleResponse, handleError, tiempoEstandar, clearErrors};