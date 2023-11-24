$(document).ready(function() {
    $('.statusTarefa').click(function() {
        var idTarefa = $(this).prop("id");
        var titulo = $(this).prop("title");

        if (titulo === "Concluído") {
            $(this).html('<i class="bi bi-square"></i>').prop("title","Não Concluído");
            $.getJSON('./paginas/tarefas/atualizaStatusTarefa.php?idTarefa='+idTarefa+'&statusTarefa=0');
        } else {
            $(this).html('<i class="bi bi-check-square"></i>').prop("title","Concluído");
            $.getJSON('./paginas/tarefas/atualizaStatusTarefa.php?idTarefa='+idTarefa+'&statusTarefa=1');
        }
    });

    // Atualiza flag Favorito Sim Ou Não
    $('.flagFavoritoContato').click(function() {
        var idContato = $(this).prop("id");
        var titulo = $(this).prop("title");
        
        if (titulo === "Não Favorito") {
            $(this).html('<i class="bi bi-star-fill"></i>').prop("title","Favorito");
            $.getJSON('./paginas/contatos/atualizaFavoritoContato.php?idContato='+idContato+'&flagFavoritoContato=1');
        } else {
            $(this).html('<i class="bi bi-star"></i>').prop("title","Não Favorito");
            $.getJSON('./paginas/contatos/atualizaFavoritoContato.php?idContato='+idContato+'&flagFavoritoContato=0');
        }
    });

    $('.statusEvento').click(function() {
        var idEvento = $(this).prop("id");
        var titulo = $(this).prop("title");

        if (titulo === "Concluído") {
            $(this).html('<i class="bi bi-square"></i>').prop("title","Não Concluído");
            $.getJSON('./paginas/eventos/atualizaStatusEvento.php?idEvento='+idEvento+'&statusEvento=0');
        } else {
            $(this).html('<i class="bi bi-check-square"></i>').prop("title","Concluído");
            $.getJSON('./paginas/eventos/atualizaStatusEvento.php?idEvento='+idEvento+'&statusEvento=1');
        }
    });
})