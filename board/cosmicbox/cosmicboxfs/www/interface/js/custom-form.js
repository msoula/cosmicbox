$(document).ready(function(){
	
	/*$('#custom-tools').animate( {width :'380px'}, 500, function(){ $('#custom-tools *').animate({opacity :'1'}, 500); } );*/
	/*$('header.custom, section.custom').animate({marginLeft :'380px'}, 500);*/
	
    $('#discover, #advance').click(function()  { $('#custom-tools .welcome, #custom-tools button.choice').hide(); });
    $('#discover').click(function()            { $('#step1, #next').show();                                       });
    $('#advance').click(function()             { $('#custom-tools fieldset, #valid, #valid-info').show();         });
    
    
    $('#background').change(function()          { hexa = $(this).val(); $('#hexa-background').val(hexa); $('header').css('background-color', hexa); });
    $('#font').change(function()                { hexa = $(this).val(); $('#hexa-font').val(hexa);       $('header').css('color', hexa);            });
    $('#hexa-background').change(function()     { hexa = $(this).val(); $('#background').val(hexa);      $('header').css('background-color', hexa); });
    $('#hexa-font').change(function()           { hexa = $(this).val(); $('#font').val(hexa);            $('header').css('color', hexa);            });
    
    $('#ban').change(function()                 { if ($(this).val() != null ) { $('#userban').val('yes');  $('#cover, #contain').removeAttr('disabled'); } else { $('#userban').val('no'); }  		});

    $('#cover').click(function()                { $(this).addClass('select'); $('#contain').removeClass(); $('#size').val('cover');   $('section').css('background-size', 'cover'  ); });
    $('#contain').click(function()              { $(this).addClass('select'); $('#cover').removeClass();   $('#size').val('contain'); $('section').css('background-size', 'contain'); });
    
    $('#dark').click(function()                 { $(this).addClass('select'); $('#light').removeClass();   $('#explorer-theme').val('light'); $('#explorer-header, #explorer-body').removeClass('light-theme').addClass('dark-theme'); });
    $('#light').click(function()                { $(this).addClass('select'); $('#dark').removeClass();    $('#explorer-theme').val('dark');  $('#explorer-header, #explorer-body').removeClass('dark-theme').addClass('light-theme'); });

    $('#next').click(function()                 { if($(this).hasClass('goto2')){
                                                    $(this).removeClass().addClass('goto3'); $('#step1').hide(); $('#step2').show();
                                                    }  
                                                else{
                                                    $(this).hide();  $('#step2').hide(); $('#step3, #valid, #valid-info').show();
                                                    }
                                                });

});