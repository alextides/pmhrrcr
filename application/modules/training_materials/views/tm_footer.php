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

    // Admin -Training Materials List
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

    // User - Training Materials List
    $(document).ready(function(e) {
        var filter_user_type = "";
        var base_url = "<?php echo base_url(); ?>";
        var data_table = $('#subs_training_materials_datatable').DataTable({
            "pageLength": 10,
            "serverSide": true,
            "processing": true,
            "order": [
                [0, "asc"]
            ],
            "ajax": {
                url: base_url + 'training_materials/subs_training_materials',
                type: 'POST',
            },
        });
    });

    // User - Paid Training Materials List
    $(document).ready(function(e) {
        var filter_user_type = "";
        var base_url = "<?php echo base_url(); ?>";
        var data_table = $('#paid_training_materials_datatable').DataTable({
            "pageLength": 10,
            "serverSide": true,
            "processing": true,
            "order": [
                [0, "asc"]
            ],
            "ajax": {
                url: base_url + 'training_materials/paid_training_materials',
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

        // var file = $(this).attr('file');
        // $('#file').val(file);

        let new_array = [];
        let checker = '';

        var base_url = "<?php echo base_url(); ?>training_materials/get_training/";
        $.ajax({
            type: "GET",
            url: base_url + training_id,
            success: function(data) {
                let result = JSON.parse(data);
                var book = '<?php echo base_url(); ?>assets/uploads/files/' + result[0].book_image;
                $("#up_book_image").attr("src", book);
                $('[name="update_book_name"]').val(result[0].book_name);

                // var myStr = result[0].files;
                // var strArray = myStr.split(" ");
                // for (var i = 0; i < strArray.length; i++) {
                //     asd = document.write("<button class='btn btn-danger' download>" + strArray[i] + "</button>");
                // $('[name="update_files"]').attr("href", `assets/uploads/files/${strArray[i]}`);
                // }

                // var array_file = result[0].files;
                // var asdas = explode(",", array_file);
                // alert(asdas);

                // $asdas = $('[name="update_files"]').attr("href", `assets/uploads/files/${(result[0].files)}`);
                // var editor = CKEDITOR.replace('update_book_desc');
                // $(editor).val(result[0].editor);

                $('[name="update_subs_price"]').val(result[0].subscription_price);
                $('#UpdateTrainingModal').modal('show');
            },
            error: function(data) {
                alert(data);
            }
        });
    });

    $(document).on('click', '.edit-training', function(e) {
        var training_id = $(this).attr('training-id');
        var base_url = "<?php echo base_url(); ?>training_materials/get_materials/" + training_id;
        // window.open(base_url, '_blank');
    })

    $(document).on('click', '.pay-training', function(e) {
        var training_id = $(this).attr('training-id');
        var base_url = "<?php echo base_url(); ?>payment/subscription/" + training_id;
        window.open(base_url, '_blank');
    })

    //  View Training Materials Users 
    $(document).on('click', '.view-trainingmaterials', function(e) {
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

                $('#UserTraining').modal('show');
            },
            error: function(data) {
                alert(data);
            }
        });
    });

</script>