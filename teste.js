document.getElementById('appointment-form').addEventListener('submit', function(event) {
    event.preventDefault();

    // Obter os valores dos campos do formulário
    const name = document.getElementById('name').value;
    const date = document.getElementById('date').value;
    const time = document.getElementById('time').value;
    const description = document.getElementById('description').value;

    // Mostrar os valores nos elementos de resultado
    document.getElementById('result-name').innerText = name;
    document.getElementById('result-date').innerText = date;
    document.getElementById('result-time').innerText = time;
    document.getElementById('result-description').innerText = description;

    // Ocultar o formulário e mostrar a tela de resultados
    document.getElementById('form-container').classList.remove('active');
    document.getElementById('result-container').classList.add('active');
});

// Mostrar o formulário no início
document.getElementById('form-container').classList.add('active');