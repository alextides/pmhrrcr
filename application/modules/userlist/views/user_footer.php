<script src="<?= base_url() . "assets"; ?>/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() . "assets"; ?>/js/responsive.dataTables.min.js"></script>
<script type="text/javascript">

    // Users > Table
    $(document).ready(function(e) {
        var filter_user_type = "";
        var base_url = "<?php echo base_url(); ?>";
        var data_table = $('#user_datatable').DataTable({
            "pageLength": 10,
            "serverSide": true,
            "order": [
                [0, "asc"]
            ],
            "ajax": {
                url: base_url + 'userlist/get_userlist',
                type: 'POST',
            },
        });
    });

     //Users > Update
     $(document).on('click', '.edit-users', function(e) {
        e.preventDefault();

        var user_details_id = $(this).attr('user-id');
        $('#update_user_details_id').val(user_details_id);

        let new_array = [];
        let checker = '';

        var base_url = "<?php echo base_url(); ?>userlist/get_users/";
        $.ajax({
            type: "GET",
            url: base_url + user_details_id,
            success: function(data) {
                let result = JSON.parse(data);
                $('[name="first_name"]').val(result[0].first_name);
                $('[name="last_name"]').val(result[0].last_name);
                $('[name="username"]').val(result[0].username);
                $('[name="email"]').val(result[0].email);
                $('[name="phone_number"]').val(result[0].phone_number);
                $('[name="city"]').val(result[0].city);
                $('[name="state"]').val(result[0].state);
                $('[name="country"]').val(result[0].country);
                $('[name="zip_code"]').val(result[0].zip_code);
                $('#UpdateUsers').modal('show');
            },
            error: function(data) {
                alert(data);
            }
        });
    });

</script>