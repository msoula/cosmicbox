$(document).ready(function(){
	jQuery.fx.off = true;
    /*
    function calc(){
        /*    On calcule la valeur max de scrollLeft*
        explorerBody = $('#explorer-body.col');
        explorerBodyOl = $('#explorer-body.col ol');
        explorerBodyWidth = $(explorerBody).width();
        TOTAL = 0;
        $(explorerBodyOl).each(function(){
            olWidth = $(this).width();
            TOTAL = TOTAL + olWidth +1; 
        });
        max = TOTAL - explorerBodyWidth;
    }
    
    function scrollto (val){
        calc();
        if (TOTAL > explorerBodyWidth){
            $(explorerBody).scrollLeft(val);
            console.log('scrollto: '+val)
            if(val=0){
                $(this).hide; $('#scrolltoright').show();
            }
            else{
                $(this).hide; $('#scrolltoleft').show(); 
            }   
        }        
    }

    /*    On scroll à droite au maximum pour la vue en colonne*
    calc();
    scrollto(max);

    $('#scrolltoleft').click(function()   { scrollto( 0 ); return false; });
    $('#scrolltoright').click(function()  { scrollto(max); return false; });*/
    
    function replacehref(link, disp){
        $(link).each(function(){
            href = $(this).attr('href');
            subhref = href.split('&');
            newhref = '?disp='+disp+'&'+subhref[1];
            $(this).attr('href', newhref);
        });
    }
    
    $('.disp').click(function() { $('.disp').removeClass('active'); $('#explorer-body').removeClass('list grid col') });

    $('#list').click(function() { $( this ).addClass('active'); $('#explorer-body').addClass('list'); $('#explorer, #home').attr('href','?disp=list&dir');
                                 replacehref($('#back'), 'list'); replacehref($('#path a'), 'list'); replacehref($('#explorer-body .folder a'), 'list');
                                 return false; });

    $('#grid').click(function() { $( this ).addClass('active'); $('#explorer-body').addClass('grid'); $('#explorer, #home').attr('href','?disp=grid&dir');
                                 replacehref($('#back'), 'grid'); replacehref($('#path a'), 'grid'); replacehref($('#explorer-body .folder a'), 'grid');
                                 return false; });

    $('#col').click(function()  { $( this ).addClass('active'); $('#explorer-body').addClass('col');  $('#explorer, #home').attr('href','?disp=col&dir');
                                 replacehref($('#back'), 'col'); replacehref($('#path a'), 'col'); replacehref($('#explorer-body .folder a'), 'col');
                                 return false; });
});