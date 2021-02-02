import * as model from "./model.js";
import * as view from "./view.js";

export function init() { };

console.log('hi');

$('#search_select').on('change', function() {
    console.log('changed');
    const mainForm = $('#mainFormSearch');
    const val = this.value;
    view.formSearch(mainForm, val);
});

$('#add_select').on('change', function() {
    console.log('changed');
    const mainForm = $('#mainFormAdd');
    const val = this.value;
    view.formAdd(mainForm, val);
});

$('#delete_select').on('change', function() {
    console.log('changed');
    const mainForm = $('#mainFormDelete');
    const val = this.value;
    view.formDelete(mainForm, val);
});