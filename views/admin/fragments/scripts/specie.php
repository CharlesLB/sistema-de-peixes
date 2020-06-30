<script>

    // ─── DATATABLE ──────────────────────────────────────────────────────────────────
    
    $(document).ready(function() {
        $('#dataTable').DataTable({
            "oLanguage": {
                "sEmptyTable": "Nenhum registro encontrado",
                "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                "sInfoPostFix": "",
                "sInfoThousands": ".",
                "sLengthMenu": "_MENU_ resultados por página",
                "sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...",
                "sZeroRecords": "Nenhum registro encontrado",
                "sSearch": "Pesquisar",
                "oPaginate": {
                    "sNext": "Próximo",
                    "sPrevious": "Anterior",
                    "sFirst": "Primeiro",
                    "sLast": "Último"
                },
                "oAria": {
                    "sSortAscending": ": Ordenar colunas de forma ascendente",
                    "sSortDescending": ": Ordenar colunas de forma descendente"
                },
                "select": {
                    "rows": {
                        "0": "Nenhuma linha selecionada",
                        "1": "Selecionado 1 linha",
                        "_": "Selecionado %d linhas"
                    }
                },
                "buttons": {
                    "copy": "Copiar para a área de transferência",
                    "copyTitle": "Cópia bem sucedida",
                    "copySuccess": {
                        "1": "Uma linha copiada com sucesso",
                        "_": "%d linhas copiadas com sucesso"
                    }
                }
            }
        });
    });

    $(function() {

        //
        // ─── SPECIE ──────────────────────────────────────────────────────
        //

        $(".edit-specie").submit(function(e) {
            e.preventDefault();

            var form = $(this);
            var alert = $(".alert-form-object");
            var title = $("#specieName")

            $.ajax({
                url: form.attr("action"),
                data: form.serialize(),
                type: "put",
                dataType: "json",
                success: function(callback) {
                    alert.html(callback.alert).fadeIn();

                    if (callback.success) {
                        title.html(callback.specieName);
                        $('.modal').modal('hide');
                    }
                }
            });
        });

        $(".delete-specie").submit(function(e) {
            e.preventDefault();

            var form = $(this);
            var alert = $(".alert-form-object");

            $.ajax({
                url: form.attr("action"),
                data: form.serialize(),
                type: "post",
                dataType: "json",
                success: function(callback) {
                    if (!callback.success) {
                        alert.html(callback.alert).fadeIn();
                    } else {
                        window.location.href = "<?= url("admin/projeto") ?>";
                    }
                }
            });
        });
        
        //
        // ─── FISH ────────────────────────────────────────────────────────
        //
        $(".create-fish").submit(function(e) {
            e.preventDefault();

            var fishes = $("#fishes");
            var form = $(this);
            var alert = $(".alert-form-object");
            var input = $(".create-fish-input");
            var select = $(".create-fish-select");

            $.ajax({
                url: form.attr("action"),
                data: form.serialize(),
                type: "post",
                dataType: "json",
                success: function(callback) {
                    alert.html(callback.alert).fadeIn();

                    if (callback.success) {
                        input.val("");

                        $("#totalFish").html(callback.totalFish);
                        $("#mediaWeight").html(callback.mediaWeight);
                        $("#mediaDefaultLength").html(callback.mediaDefaultLength);
                        $("#mediaTotalLength").html(callback.mediaTotalLength);

                        fishes.prepend(callback.fish).fadeIn();
                        $('.modal').modal('hide');
                    }
                }
            });
        });
    });
</script>