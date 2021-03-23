<script src="<?= base_url() . "assets"; ?>/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() . "assets"; ?>/js/responsive.dataTables.min.js"></script>
<script type="text/javascript">
    //Training Materials List
    $(document).ready(function(e) {
        var filter_user_type = "";
        var base_url = "<?php echo base_url(); ?>";
        var data_table = $('#training_materials_datatable').DataTable({
            "pageLength": 10,
            "serverSide": true,
            "order": [
                [0, "asc"]
            ],
            "ajax": {
                url: base_url + '',
                type: 'POST',
            },
        });
    });
</script>