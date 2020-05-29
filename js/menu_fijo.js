posicionarMenu();
$(window).scroll(function() {    
    posicionarMenu();
});
function posicionarMenu() {
    var altura_del_menu = $(".menul").outerHeight(true);
    $('.menul').addClass('fixed');
    $('.contenedor').css('margin-top', (altura_del_menu) + 'px');
}