<script src="<?= base_url() . "assets"; ?>/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() . "assets"; ?>/js/responsive.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(e) {
        $(".add-uf").click(function() {
            $("#file_upload").append("<div class='more-files'><input type='file' class='form-control' id='book_file' name='book_file[]' value='' required></div>")
        });
        $('#add_training').on('click', '.remove-uf', function() {
            $('.more-files').remove()
        });
    })

    $(document).ready(function(e) {
        $(".display-book-btn").click(function() {
            $('.view-book').show();
            $('.hide-book-btn').show();
            $('.display-book-btn').hide();
        });

        $(".hide-book-btn").click(function() {
            $('.view-book').hide();
            $('.hide-book-btn').hide();
            $('.display-book-btn').show();
        });

    })

    //Training Materials List
    $(document).ready(function(e) {
        var filter_user_type = "";
        var base_url = "<?php echo base_url(); ?>";
        var data_table = $('#training_materials_datatable').DataTable({
            "pageLength": 10,
            "serverSide": true,
            "processing": true,
            "order": [
                [0, "asc"]
            ],
            "ajax": {
                url: base_url + 'training_materials/get_training_materials',
                type: 'POST',
            },
        });
    });

    //Training Materials List > View
    $(document).on('click', '.view-training', function(e) {
        e.preventDefault();

        var training_id = $(this).attr('training-id');
        $('#view_training_id').val(training_id);

        let new_array = [];
        let checker = '';

        var base_url = "<?php echo base_url(); ?>training_materials/get_training/";
        $.ajax({
            type: "GET",
            url: base_url + training_id,
            success: function(data) {
                let result = JSON.parse(data);
                $('[name="view_book_name"]').val(result[0].book_name);
                // $('[name="view_book_image"]').val(result[0].book_image);
                $('[name="view_subs_price"]').val(result[0].subscription_price);

                var book = '<?php echo base_url(); ?>assets/uploads/files/' + result[0].book_image;
                $("#view_book_image").attr("src", book);

                $('[name="view_book_desc"]').val(result[0].book_description);
                $('#ViewTrainingModal').modal('show');
            },
            error: function(data) {
                alert(data);
            }
        });
    });

    //Training Materials List > Update
    $(document).on('click', '.edit-training', function(e) {
        e.preventDefault();

        var training_id = $(this).attr('training-id');
        $('#update_training_id').val(training_id);

        let new_array = [];
        let checker = '';

        var base_url = "<?php echo base_url(); ?>training_materials/get_training/";
        $.ajax({
            type: "GET",
            url: base_url + training_id,
            success: function(data) {
                let result = JSON.parse(data);
                $('[name="update_book_name"]').val(result[0].book_name);
                $('[name="haha"]').val(result[0].files);
                $('[name="update_subs_price"]').val(result[0].subscription_price);

                var book = '<?php echo base_url(); ?>assets/uploads/files/' + result[0].book_image;
                $("#up_book_image").attr("src", book);

                // $('[name="view_book_desc"]').val(result[0].book_description);
                $('#UpdateTrainingModal').modal('show');
            },
            error: function(data) {
                alert(data);
            }
        });
    });
</script>