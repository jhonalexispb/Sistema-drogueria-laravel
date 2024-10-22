import 'selectize/dist/css/selectize.default.css';
import 'selectize';

// Inicializar Selectize una vez que el DOM esté listo
document.addEventListener('DOMContentLoaded', () => {
    const laboratorioSelect = document.getElementById('laboratorio');
    if (laboratorioSelect) {
        $(laboratorioSelect).selectize({
            placeholder: 'Choose one..',
            allowEmptyOption: true,
        });
    }
});