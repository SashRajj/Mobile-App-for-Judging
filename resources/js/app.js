import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

require('bootstrap');

$(document).ready(function() {
    $('.dropdown-toggle').dropdown();
});

