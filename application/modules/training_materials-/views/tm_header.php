<link href="<?= base_url() . "assets"; ?>/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="<?= base_url() . "assets"; ?>/css/responsive.dataTables.min.css" rel="stylesheet">
<style media="screen">
    .modal-lg {
        /* margin-top: 10%; */
        max-width: 1200px !important;
        width: 100%;
    }

    #myModalLabel {
        font-size: 30px;
        text-align: center;
    }

    .select2-wrapper {
        width: 70%;
        margin: auto;
        margin-bottom: 20px;
    }

    .modal-footer {
        text-align: center;
    }

    .modal-header {
        background: #bdc2bc;
    }

    #ViewOrderModalLabel {
        color: #fff;
    }

    .t-title {
        background: #155163;
        color: white;
        padding: 20px;
        font-weight: bold;
    }

    #admin_tracking_notes_wrapper,
    #pickup_datatable_wrapper {
        border: 1px solid #1f7893;
        padding: 2px;
        border-bottom-left-radius: 25px;
        border-bottom-right-radius: 25px;
    }

    #admin_pickup_btn,
    #admin_delivery_btn {
        background: #155163;
        border-color: #155163;
        border-radius: 100%;
    }

    .pickup-d .form-control:disabled,
    .form-control[readonly] {
        background: none;
    }

    .pickup-d label {
        font-weight: bold;
        /* color: #000; */
    }

    .pickup-d .form-group {
        margin-bottom: 0px;
    }

    .pickup-d #instructions {
        border: 0px;
    }

    .form-row.pickup-d {
        border: 1px solid #155163;
        margin-left: 0px;
        margin-right: 0px;
        border-bottom-left-radius: 25px;
        border-bottom-right-radius: 25px;
    }

    .col-4.personal-info .form-control:disabled,
    .form-control[readonly] {
        background: #e4e7e4;
        border: 1px solid #e4e7e4;
        border-radius: 0px;
    }

    .col-4.personal-info input {
        color: #313531;
    }

    thead {
        background: #1f7893;
        color: #fff;
    }

    .table-striped tbody tr:nth-of-type(2n+1) {
        background: #f2f3f2;
    }

    .btn.btn-success.btn-sm.submit-mop-note {
        background: #155163;
        border: 1px;
    }

    .btn.btn-primary.btn-sm.cancel-mop-note {
        background: #cfd3ce;
        border: 1px;
        color: #155163;
    }

    #mo_add_note {
        border: 1px solid #155163;
        border-radius: 0px;
    }

    .mop-addnote-btn {
        background: #1f7893;
        border: 1px;
        color: #fff;
    }

    .mop-addnote-btn:hover {
        background: #cfd3ce;
        border: 1px;
        color: #1f7893;
    }

    .nav-item #pickup-tab {
        border-top-left-radius: 20px !important;
        border-bottom-left-radius: 20px !important;
        border: 1px solid #155163;
        color: #155163;
    }

    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        background-color: #155163;
        color: #fff !important;
    }

    .nav-item #delivery-tab {
        border-top-right-radius: 20px !important;
        border-bottom-right-radius: 20px !important;
        border: 1px solid #155163;
        color: #155163;
    }

    .text-themecolor.page-title-text {
        color: #155163 !important;
    }

    .personal-info input {
        border: 1px solid #155163;
    }

    .form-control:disabled,
    .form-control[readonly] {
        background: none;
    }

    #view_user_btn,
    #del_user_btn {
        background: #155163;
        border-color: #155163;
        border-radius: 100%;
    }

    .btn.save_user_btn {
        border-color: #155163;
        background: #155163;
        color: #fff;
    }

    .btn.add_user_btn {
        background: #fff;
        color: #155163;
        border: 1px solid #155163;
    }
</style>