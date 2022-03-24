/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';

// You can specify which plugins you need

// start the Stimulus application
// import 'bootstrap';

// You can specify which plugins you need
// import { Tooltip, Toast, Popover, Modal  } from 'bootstrap';

// window.Popper = require('popper.js').default;

window.bootstrap = require('bootstrap/dist/js/bootstrap.bundle.js');


$(document).ready(function () {

    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })

    $('#accept_cookies').click(function () {
        $('#cookies-bloc').removeClass("appeared").addClass("disappeared")
    })


    $("[data-ajax='ajaxCall']").click(function (event) {
            event.preventDefault();
            $.ajax({url: $(this).attr('href') + "?ajaxCall=true"});
        }
    )
})


$(document).ajaxSuccess(function (event, request, settings) {
    let response = JSON.parse(request.responseText);
    console.log(response, response['type']);

    if (response['type'] === "info") {
        $('#ajaxReceive')
            .toggleClass("noDisplay")
            .html(response['message']);

    }

    if (response['type'] === "cookies") {
        if (response['info'] === "allready_accepted") {
            $('#cookies-bloc').removeClass("appeared").addClass("disappeared")
        }
    }

});