(function($) {
    "use strict";
    var mainApp = {

            main_fun: function() {
                /*====================================
                METIS MENU 
                ======================================*/
                $('#main-menu').metisMenu();

                /*====================================
              LOAD APPROPRIATE MENU BAR
           ======================================*/
                $(window).bind("load resize", function() {
                    if ($(this).width() < 768) {
                        $('div.sidebar-collapse').addClass('collapse')
                    } else {
                        $('div.sidebar-collapse').removeClass('collapse')
                    }
                });



            },

            initialization: function() {
                mainApp.main_fun();

            }

        }
        // Initializing ///

    $(document).ready(function() {
        mainApp.main_fun();
    });

}(jQuery));

// method Jquery para remover aluno de tabela
$(".table_ativos").on('click', '.deleteAluno', function() {
    if (confirm("Tem certeza que deseja remover o cadastro desse aluno?")) {
        var id = $(this).closest('tr').attr('id');
        $(this).closest('tr').remove();
        window.location.href = "delete_bdaluno.php?id=" + id;
    }
});

$(".table_ativos").on('click', '.deleteInstrutor', function() {
    if (confirm("Tem certeza que deseja remover o cadastro desse Instrutor?")) {
        var id = $(this).closest('tr').attr('id');
        $(this).closest('tr').remove();
        window.location.href = "delete_bdInstrutor.php?id=" + id;
    }
});

$(".table_ativos").on('click', '.delete_avaliacao', function() {
    if (confirm("Tem certeza que deseja remover a avaliação desse aluno?")) {
        var id = $(this).closest('tr').attr('id');
        $(this).closest('tr').remove();
        window.location.href = "delete_bdavaliacao.php?id=" + id;
    }
});

document.querySelector("#Logout").addEventListener('click', e => {
    e.preventDefault();
    window.location.href = "login.php";
});