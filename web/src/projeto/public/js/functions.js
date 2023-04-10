function applyCepMask() { applyMask('cep',document.querySelector('#cep')); }
function applyHorarioMask(id) { applyMask('horario',document.querySelector('#' + id)); }
function applyTelMask(id) { applyMask('tel',document.querySelector('#' + id)); }
function applyDataMask(id) { applyMask('data',document.querySelector('#' + id)); }
function telMaskCondicional(id) {
    e = document.querySelector('#' + id)
    if (e) {
        applyMask('tel',e);
    }
}

function inputHandler(masks, max, event) {
    var c = event.target;
    var v = c.value.replace(/\D/g, '');
    var m = c.value.length > max ? 1 : 0;
    VMasker(c).unMask();
    VMasker(c).maskPattern(masks[m]);
    c.value = VMasker.toPattern(v, masks[m]);
}

function applyMask(op,e) {
    var mask = {
        'tel' : ['(99) 9999-99999', '(99) 99999-9999'],
        'cnpj' : ['99.999.999/9999-99','99.999.999/9999-99'],
        'cpf' : ['999.999.999-99', '999.999.999-99'],
        'cep' : ['99999-999', '99999-999'],
        'data' : ['99/99/9999', '99/99/9999'],
        'mesAno' : ['99/9999', '99/9999'],
        'numero' : ['99999999', '99999999'],
        'horario' : ['99:99:99', '99:99:99'],
        'conta' : ['999999-9', '999999-9'],
    }

    e.addEventListener('input', inputHandler.bind(undefined, mask[op], 14), false);
}

