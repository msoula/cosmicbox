$(document).ready(function() {
    header = $('header');
    explorerheader = $('#explorer-header');
    explorer = $('#explorer-header, #explorer-body');
	// Calcul de la marge entre le haut du document et section
    fixedLimit = explorerheader.offset().top;
    
    $(window).scroll(function(event){
        // Valeur de defilement
        windowScroll = $(window).scrollTop();
        
        if (windowScroll >= fixedLimit){
            header.height('0').addClass('reduce');
            explorer.addClass('top');
        }
        else if (windowScroll >= fixedLimit-10){
            header.height('5').addClass('reduce');
            explorer.removeClass('top');
        }
        else if (windowScroll >= fixedLimit-15){
            header.height('15').addClass('reduce');
            explorer.removeClass('top');
        }
        else if (windowScroll >= fixedLimit-20){
            header.height('20').addClass('reduce');
            explorer.removeClass('top');
        }
        else if (windowScroll >= fixedLimit-25){
            header.height('25').addClass('reduce');
            explorer.removeClass('top');
        }
        else if (windowScroll >= fixedLimit-30){
            header.height('30').addClass('reduce');
            explorer.removeClass('top');
        }
        else if (windowScroll >= fixedLimit-35){
            header.height('35').addClass('reduce');
            explorer.removeClass('top');
        }
        else if (windowScroll >= fixedLimit-40){
            header.height('40').addClass('reduce');
            explorer.removeClass('top');
        }
        else if (windowScroll >= fixedLimit-45){
            header.height('45').addClass('reduce');
            explorer.removeClass('top');
        }
        else if (windowScroll >= fixedLimit-50){
            header.height('50').addClass('reduce');
            explorer.removeClass('top');
        }
        else if (windowScroll >= fixedLimit-55){
            header.height('55').addClass('reduce');
            explorer.removeClass('top');
        }    
        else if (windowScroll >= fixedLimit-60){
            header.height('60').addClass('reduce');
            explorer.removeClass('top');
        }    
        else if (windowScroll >= fixedLimit-65){
            header.height('65').addClass('reduce');
            explorer.removeClass('top');
        }    
        else if (windowScroll >= fixedLimit-70){
            header.height('70').removeClass('reduce');
            explorer.removeClass('top');
        }    
        else if (windowScroll >= fixedLimit-75){
            header.height('75').removeClass('reduce');
            explorer.removeClass('top');
        }
        
        else{
            header.height('80').removeClass('reduce');
            explorer.removeClass('top');
        }
    });
});