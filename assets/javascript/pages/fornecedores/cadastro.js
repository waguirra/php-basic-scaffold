jQuery(function ($) {
    
    const elEstados = $('#estado');
    const elCidades = $('#cidade');

    // Carregar os estados brasileiros da API publica do IBGE
    fetch('https://servicodados.ibge.gov.br/api/v1/localidades/estados?orderBy=nome')
        .then(response => response.json())
        .then(estados => {
            estados.forEach(estado => {
                elEstados
                    .append(`<option value="${estado.sigla}">${estado.nome}</option>`)
                    .removeAttr('disabled');
            });
        });

    elEstados.on('change', () => {
        let UF = elEstados.val();

        // Carregar as cidades do estado selecionado
        fetch(`https://servicodados.ibge.gov.br/api/v1/localidades/estados/${UF}/distritos?orderBy=nome`)
        .then(response => response.json())
        .then(cidades => {
            cidades.forEach(cidade => {
                elCidades
                    .append(`<option value="${cidade.nome}">${cidade.nome}</option>`)
                    .removeAttr('disabled');
            });
        });
    });

});