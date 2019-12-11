
function toggleMenu() {
    if ($('.sidemenu').hasClass('open')) {
        $('.sidemenu').removeClass('open')
        $('.header').css('padding-left','20px')
    } else {
        $('.sidemenu').addClass('open')
        $('.header').css('padding-left','350px')
    }
}

$( function() {
    $( ".disciplina" ).draggable({
        revert: true,
        cursor: "grabbing",
        cursorAt: { top: -5, left: -5 },
    }
    
    );
    // $( ".lista-disciplinas" ).sortable({
    //     appendTo: $(".grade")
    //   });
    $(".celula").droppable({
        
        over: function(event, ui) {
            // se pode ser dropado
            var attr = $(this).attr('id');
            if (typeof attr !== typeof undefined && attr !== false) {

                if (typeof $(this).has('.disciplina')[0] == typeof undefined) {
                    var data = {
                        'p':$(ui.draggable).attr('idProfessor'),
                        'h':$(event.target).attr('id'),
                    };
                    var url = "/verificaBloqueados.php";

                    $.ajax({
                        url : url,
                        type: 'GET',
                        dataType: "text",
                        contentType: "text/plain; charset=utf-8",
                        data : data,
                        success: function(response) {
                            // window.location.replace('/index.php')
                            if (response == "true") {
                                $(event.target).addClass('allowed'); 
                            }
                            else {
                                $(event.target).addClass('blocked'); 
                            }
                        },
                        error: function(e) {
                            console.log(e);
                        }
                    });
                } else {
                    $(event.target).addClass('blocked'); 
                }
            }
        },
        out: function (event, ui) {
            // limpa o que pode ser dropada para nao bugar
            if ($(event.target).hasClass('allowed')) {
                $(event.target).removeClass('allowed');
            }
            if ($(event.target).hasClass('blocked')) {
                $(event.target).removeClass('blocked');
            }
        },
        drop: function( event, ui ) {
                if ($(event.target).hasClass('allowed')) {
                    

                    // $( this )
                    // .find( "p" )
                    // .html( "Dropped!" );
                    
                    // Move draggable into droppable
                    ui.draggable.appendTo($(this));
                    $(ui.draggable).css('left',0);
                    $(ui.draggable).css('top',0);
                } else {
                    if ($(event.target).hasClass('blocked')) {
                        $(event.target).removeClass('blocked');
                    }
                    $(ui.draggable).css( {left: 'initial', top: 'initial'})
                }
            
        }
    });
  } );