document.getElementById('formagenda').addEventListener('submit', function(event) {
    event.preventDefault();

    const nomecliente = document.getElementById('nomecliente').value;
    const dataentrada = document.getElementById('dataentrada').value;
    const hrentrada = document.getElementById('hrentrada').value;
    const dataentrega = document.getElementById('dataentrega').value;
    const desc = document.getElementById('desc').value;


    document.getElementById('resnomecliente').innerText = nomecliente;
    document.getElementById('resdataentrada').innerText = dataentrada;
    document.getElementById('reshoraentrada').innerText = hrentrada;
    document.getElementById('resprevisaodeentrega').innerText = dataentrega;
    document.getElementById('resdesc').innerText = desc;

    
    document.getElementById('agenda').classList.remove('active');
    document.getElementById('agendaresultado').classList.add('active');
});

document.getElementById('agenda').classList.add('active');