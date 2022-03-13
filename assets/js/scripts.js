const form = document.querySelector('form');
const button_dormir = document.querySelector('button#dormir');
const button_voar = document.querySelector('button#voar');
const action = form.getAttribute('action');

let data_papagaio = new FormData();
form.addEventListener('submit', async (event) => {
    event.preventDefault();
    data_papagaio = new FormData(form);
    await fetch(action, {
        method: "POST",
        body: data_papagaio
    })
})


button_dormir.addEventListener('click', async () => {
    data_papagaio.append('acao', 'dormir')
    await fetch(action, {
        method: "POST",
        body: data_papagaio
    })
})

button_voar.addEventListener('click', async () => {
    data_papagaio.append('acao', 'voar')
    await fetch(action, {
        method: "POST",
        body: data_papagaio
    })
})

