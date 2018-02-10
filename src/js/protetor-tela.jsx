$(function () { //onload
    setEvent();

});

$(document).on('mousemove', function () { //mouse move
    if (timeout !== null) {
        $(document.body).text('');
        clearTimeout(timeout); //clear no timer
    }
    setEvent(); //seta ele novamente para caso aja inatividade faça o evento
});

function setEvent() {
    timeout = setTimeout(function () {
        $(document.body).text('Mouse idle for 3 sec'); //Teu evento após terminar o timer
    }, 3000);
}