
import ConfigChart from './Classes/skillsClasses';

let testElements = document.getElementsByClassName('jauge');


Array.from(testElements).forEach(function (elem){

    const jauge = new ConfigChart(elem);
    jauge.generate();

});


$(document).ready(function() {

    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    })

    // $('[data-toggle="tooltip"]').tooltip();
    // $('.surrounder').mouseenter(function (e) {
    //
    //     if (e.clientX > window.innerWidth - 200) {
    //         $(this).children('.hoverDescription').addClass("shiftLeft");
    //     } else {
    //         $(this).children('.hoverDescription').removeClass("shiftLeft");
    //
    //     }
    //
    //     if (e.clientX <  200) {
    //         $(this).children('.hoverDescription').addClass("shiftRight");
    //     } else {
    //         $(this).children('.hoverDescription').removeClass("shiftRight");
    //
    //     }
    //
    //     if (e.clientY > window.innerHeight - 500) {
    //         $(this).children('.hoverDescription').addClass("shiftUp");
    //     } else {
    //         $(this).children('.hoverDescription').removeClass("shiftUp");
    //
    //     }
    //     $(this).children('.hoverDescription').addClass('activated');
    // }).mouseleave(function () {
    //     $(this).children('.hoverDescription').removeClass('activated');
    // })



})


