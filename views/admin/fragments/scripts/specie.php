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

        $(".edit-specie").on("submit",function(e) {
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

        $(".delete-specie").on("submit", function(e) {
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
        $(".create-fish").on("submit", function(e) {
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
        
        $(document).on("click",".edit-fish-button" ,function() {
            var id = $(this).data('id');
            var sex = $('#'+id).children('td[data-target=sex]').text();
            var weight = parseFloat($('#'+id).children('td[data-target=weight]').data("value"));
            var defaultLength = $('#'+id).children('td[data-target=defaultLength]').data("value");
            var totalLength = $('#'+id).children('td[data-target=totalLength]').data("value");

            $("#fish-id-edit-input").val(id);
            $("#fish-sex-edit-select").val(sex).change();
            $("#fish-weight-edit-input").val(weight);
            $("#fish-defaultLength-edit-input").val(defaultLength);
            $("#fish-totalLength-edit-input").val(totalLength);

            $("#edit-fish").modal('show');
        });

        $(document).on("submit",".edit-fish",function(e) {
            e.preventDefault();

            var fishes = $("#fishes");
            var form = $(this);
            var alert = $(".alert-form-object");
            var select = $(".create-fish-select");

            $.ajax({
                url: form.attr("action"),
                data: form.serialize(),
                type: "put",
                dataType: "json",
                success: function(callback) {
                    alert.html(callback.alert).fadeIn();

                    if (callback.success) {
                        $("#totalFish").html(callback.totalFish);
                        $("#mediaWeight").html(callback.mediaWeight);
                        $("#mediaDefaultLength").html(callback.mediaDefaultLength);
                        $("#mediaTotalLength").html(callback.mediaTotalLength);

                        $('#'+callback.id).remove();
                        fishes.prepend(callback.fish).fadeIn();

                        $('.modal').modal('hide');
                    }
                }
            });
        });

        $(document).on("click", ".delete-fish-button",function() {
            var id = $(this).data('id');
            $("#fish-id-delete-input").val(id);

            $('#delete-fish').modal('show');
        });
        
        $(document).on("submit", ".delete-fish",function(e) {
            e.preventDefault();

            var fishes = $("#fishes");
            var form = $(this);
            var alert = $(".alert-form-object");
            var select = $(".create-fish-select");

            $.ajax({
                url: form.attr("action"),
                data: form.serialize(),
                type: "post",
                dataType: "json",
                success: function(callback) {
                    alert.html(callback.alert).fadeIn();

                    if (callback.success) {
                        $("#totalFish").html(callback.totalFish);
                        $("#mediaWeight").html(callback.mediaWeight);
                        $("#mediaDefaultLength").html(callback.mediaDefaultLength);
                        $("#mediaTotalLength").html(callback.mediaTotalLength);

                        $('#'+callback.id).remove();

                        $('.modal').modal('hide');
                    }
                }
            });
        });
    });
</script>