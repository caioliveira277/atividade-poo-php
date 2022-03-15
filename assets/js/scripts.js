const formTipoAnimal = document.querySelector('form#tipoAnimal');
const formDados = document.querySelector('form#dados');
const alerta = document.querySelector('.alerta');
const acoes = document.querySelector('.acoes');
const acoesBotoes = acoes.querySelectorAll('button');
const acoesDados = acoes.querySelector('.dados');
const animal = acoes.querySelector('.animal');

/* manipulando form tipo do animal */
formTipoAnimal.addEventListener('submit', (event) => {
    event.preventDefault();
    const dados = new FormData(formTipoAnimal);
    alerta.textContent = '';

    fetch('/routes/tipo-animal.php', {
        method: "POST",
        body: dados
    }).then((resp) => {
        resp.json()
            .then((json) => {
                if(json.codigo == 200) {
                    formTipoAnimal.remove();
                    formDados.classList.add(dados.get('tipo'));
                    formDados.setAttribute('style', 'display: block;');
                } else {
                    alerta.textContent = json.mensagem;
                }
            })
    })
});

/* form dos dados do animal */
formDados.addEventListener('submit', (event) => {
    event.preventDefault();
    const dados = new FormData(formDados);
    alerta.textContent = '';

    fetch('/routes/definir-dados.php', {
        method: "POST",
        body: dados
    }).then((resp) => {
        resp.json()
            .then((json) => {
                if(json.codigo == 200) {
                    formDados.remove();
                    acoes.setAttribute('style', 'display: block;');
                    acoes.classList.add(json.tipo_animal);
                    
                    const svg = acoes.querySelector(`svg.${json.tipo_animal}`);
                    svg.querySelectorAll('.corPredominante').forEach((element) => {
                        element.setAttribute('fill', json.animal.corPredominante);
                    });
                    svg.querySelectorAll('.corSecundaria').forEach((element) => {
                        element.setAttribute('fill', json.animal.corSecundaria);
                    });

                    acoesDados.querySelectorAll('p').forEach(element => {
                        const tipo = element.getAttribute('tipo');
                        element.innerHTML += `<span>${json.animal[tipo]}</span>`;
                    });
                } else {
                    alerta.textContent = json.mensagem;
                }
            })
    })
})


acoesBotoes.forEach((button) => {
    button.addEventListener('click', () => {
        alerta.textContent = '';
        const acao = button.getAttribute('acao');
        const dados = new FormData();
        dados.append('acao', acao);

        fetch('./routes/acao.php', {
            method: "POST",
            body: dados
        }).then((resp) => {
            resp.json().then(json => {
                if(json.codigo == 200) {
                    acoesDados.querySelector('.saida').textContent = `${button.textContent}: ${json.acao_solicitada}`;
                    switch (acao) {
                        case 'voar':
                            animal.classList.add('animate__backOutUp')
                            break;                    
                        case 'dormir':
                            animal.classList.add('animate__rotateOutDownRight')
                            break;                    
                        case 'comer':
                            animal.classList.add('animate__headShake')
                            break;                    
                        case 'latir':
                        case 'falar':
                            animal.classList.add('animate__bounce')
                            break;                    
                        case 'rosnar':
                            animal.classList.add('animate__tada')
                            break;                    
                        default:
                            break;
                    }
                } else {
                    alerta.textContent = json.mensagem;
                }
            })
        })
    })
})

animal.addEventListener('animationend', () => {
    animal.classList.remove('animate__backOutUp', 'animate__rotateOutDownRight', 'animate__headShake', 'animate__bounce', 'animate__tada')
});