<script>
    $(function() {
        $(document).on("click",".makeAsRead" ,function() {
            var id = $(this).data('id');

            $("#id-makeAsRead-mail").val(id);

            $("#read-mail").modal('show');
        });

        $(document).on("submit","#read",function(e) {
            e.preventDefault();

            var form = $(this);
            var alert = $(".alert-form-object");
            var id = $("#id-makeAsRead-mail").val();

            $.ajax({
                url: form.attr("action"),
                data: form.serialize(),
                type: "post",
                dataType: "json",
                success: function(callback) {
                    alert.html(callback.alert).fadeIn();

                    if (callback.success) {
                        $('#'+id).remove();
                        $('.modal').modal('hide');
                    }
                }
            });
        });
        
        $(document).on("click",".makeAsUnread" ,function() {
            var id = $(this).data('id');

            $("#id-makeAsUnread-mail").val(id);

            $("#unread-mail").modal('show');
        });

        $(document).on("submit","#unread",function(e) {
            e.preventDefault();

            var form = $(this);
            var alert = $(".alert-form-object");
            var id = $("#id-makeAsUnread-mail").val();

            $.ajax({
                url: form.attr("action"),
                data: form.serialize(),
                type: "post",
                dataType: "json",
                success: function(callback) {
                    alert.html(callback.alert).fadeIn();

                    if (callback.success) {
                        $('#'+id).remove();
                        $('.modal').modal('hide');
                    }
                }
            });
        });

        
    });
</script>