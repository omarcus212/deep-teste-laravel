
var MAX_TIMEOUT = 30000; // 30 segundos
var loadingElement = null; // Vai guardar o elemento HTML do loading
var timeoutId = null;      // Vai guardar o ID do timeout


document.addEventListener('DOMContentLoaded', function () {

    loadingElement = document.getElementById('loading-overlay');

    if (!loadingElement) {
        console.log('Loading element not found!');
        return;
    }

    document.addEventListener('submit', handleFormSubmit);

});

function handleFormSubmit(event) {
    var form = event.target;

    // Se o formulário tem a classe 'no-loading', NÃO mostra o loading
    if (form.classList.contains('no-loading')) {
        return;
    }

    // Mostra o loading na tela
    showLoading();

    // Desabilita o botão para evitar cliques duplicados
    disableButton(form);

    // Inicia o contador de tempo (timeout)
    startTimeout();
}

function showLoading() {
    if (loadingElement) {
        loadingElement.classList.add('show');
    }
}

function hideLoading() {
    if (loadingElement) {
        loadingElement.classList.remove('show');
    }
    clearTheTimeout();
}

function disableButton(form) {
    // Procura o botão de submit dentro do formulário
    var button = form.querySelector('button[type="submit"]');

    if (button) {
        // Guarda o texto original do botão (para restaurar depois)
        button.setAttribute('data-original-text', button.innerHTML);

        button.disabled = true;

        button.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Enviando...';
    }
}

function enableButtons() {
    // Pega TODOS os botões de submit da página
    var buttons = document.querySelectorAll('button[type="submit"]');

    // Para cada botão encontrado
    buttons.forEach(function (button) {
        // Reabilita o botão
        button.disabled = false;

        // Pega o texto original que guardamos
        var originalText = button.getAttribute('data-original-text');

        // Se tinha um texto original, restaura ele
        if (originalText) {
            button.innerHTML = originalText;
            button.removeAttribute('data-original-text');
        }
    });
}

function startTimeout() {
    clearTheTimeout(); // Primeiro para qualquer temporizador anterior

    timeoutId = setTimeout(function () {
        handleTimeout();
    }, MAX_TIMEOUT);
}

function clearTheTimeout() {

    if (timeoutId) {
        clearTimeout(timeoutId);
        timeoutId = null;
    }
}

function handleTimeout() {
    // Esconde o loading
    hideLoading();

    // Reabilita todos os botões
    enableButtons();

    // Mostra mensagem de erro
    showTimeoutError();
}

function showTimeoutError() {
    // Se tem SweetAlert na página, usa ele (mais bonito)
    if (typeof Swal !== 'undefined') {
        Swal.fire({
            icon: 'error',
            title: 'Demorou muito!',
            text: 'A operação demorou mais de 30 segundos. Tente novamente.',
            confirmButtonColor: '#0d6efd'
        });
    }
}

window.addEventListener('pageshow', function () {
    // Esconde o loading
    hideLoading();

    // Reabilita todos os botões
    enableButtons();
});

