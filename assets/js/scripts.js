
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
            // if com ajax para o arquivo php que retorna isso.
                // o php deve verificar se a posicao de destino
                // esta em uma lista com todos os horarios bloqueados
            if( $(ui.draggable).attr('id') % 2 == 0) {
                $(event.target).addClass('allowed'); 
            } else {
                $(event.target).addClass('blocked'); 
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
                    /*
                     - fazer mais um if pra ver se não ta fora de uma celula
                     - adicionar sortable para mover mesmo os elementos na pagina
                    */

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