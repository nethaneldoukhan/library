import * as views from "./modules/views.js";


function formSearch(mainForm, val) {
    console.log('PASS val: ', val);
    const form = views.getFormSearch(val);
    console.log(form);
    $(mainForm).html(form);
}

function formAdd(mainForm, val) {
    console.log('PASS val: ', val);
    const form = views.getFormAdd(val);
    console.log(form);
    $(mainForm).html(form);
}

function formDelete(mainForm, val) {
    console.log('PASS val: ', val);
    const form = views.getFormDelete(val);
    console.log(form);
    $(mainForm).html(form);
}

export {
    formSearch,
    formAdd,
    formDelete
}