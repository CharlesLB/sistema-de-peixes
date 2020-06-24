<?php $v->layout('admin/_theme'); ?>

<div id="header">
    <?php $v->insert("admin/fragments/widgets/specie/header", ["specie" => $specie]) ?>
</div>

<?php $v->start("scripts"); ?>
<script>
    $(function() {
        $(".search").submit(function(e) {
            e.preventDefault();

            var species = $(".species");
            var form = $(this);

            $.ajax({
                url: form.attr("action"),
                data: form.serialize(),
                type: "post",
                dataType: "json",
                success: function(callback) {

                    if (callback.message) {
                        species.html(callback.message).fadeIn();
                    } else {
                        species.html(callback.species).fadeIn();
                    }
                }
            });
        });

        $(".edit-specie").submit(function(e) {
            e.preventDefault();

            var form = $(this);
            var alert = $(".alert-form-object");
            var header = $("#header")

            $.ajax({
                url: form.attr("action"),
                data: form.serialize(),
                type: "put",
                dataType: "json",
                success: function(callback) {
                    alert.html(callback.alert).fadeIn();

                    if (callback.success) {
                        $('.modal').modal('hide');
                    }
                },
                complete: function(){
                    if (callback.success) {
                        header.html(callback.header);
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
                    }else{
                        window.location.href = "<?= url("admin/projeto")?>";
                    }
                }
            });
        });
    });
</script>
<?php $v->end(); ?>