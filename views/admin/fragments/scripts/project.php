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

        $(".create-specie").submit(function(e) {
            e.preventDefault();

            var species = $(".species");
            var form = $(this);
            var alert = $(".alert-form-object");
            var input = $("#specie-name-input");

            $.ajax({
                url: form.attr("action"),
                data: form.serialize(),
                type: "post",
                dataType: "json",
                success: function(callback) {
                    alert.html(callback.alert).fadeIn();

                    if (callback.success) {
                        input.val("");
                        species.prepend(callback.specie).fadeIn();
                        $('.modal').modal('hide');
                    }
                }
            });
        });
    });
</script>