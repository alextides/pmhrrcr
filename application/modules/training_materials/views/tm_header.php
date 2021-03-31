<link href="<?= base_url() . "assets"; ?>/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="<?= base_url() . "assets"; ?>/css/responsive.dataTables.min.css" rel="stylesheet">
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckfinder/ckfinder.js"></script>
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
      background: linear-gradient(to right, #10359A, #10359A);
   }

   .modal-header #trainingModalTitle,
   #ViewTrainingModalTitle,
   #UpdateTrainingModalTitle {
      color: #fff;
   }

   .atm-button {
      background: linear-gradient(to left, #0a205c, #10359A);
      border: 1px solid;
      border-radius: 30px;
      color: #fff;
   }

   .atm-button:hover {
      background: linear-gradient(to left, #0a205c, #10359A);
      border: 1px solid;
      color: #fff;
   }

   #book_file {
      margin-bottom: 8px;
   }

   #add_training input,
   #add_training textarea {
      border: 1px solid #184fe7;
      padding: 4px;
   }

   #add_training label {
      color: #000;
      font-weight: 500;
   }

   .atm-submit,
   .view-atm-close {
      background: linear-gradient(to right, #0a205c, #10359A);
      color: #fff;
   }

   .atm-submit:hover,
   .view-atm-close:hover {
      background: linear-gradient(to right, #0a205c, #10359A);
      color: #fff;
   }

   .atm-close {
      background: #1deef7;
      color: #fff;
   }

   .atm-close:hover {
      background: #1deef7;
      color: #fff;
   }

   .view-training,
   .edit-training,
   .trash-training {
      background: linear-gradient(to right, #0a205c, #10359A);
      color: #fff;
      border-radius: 100%;
   }

   .view-training:hover,
   .edit-training:hover,
   .trash-training:hover {
      background: linear-gradient(to right, #0a205c, #10359A);
      color: #fff;
      border-radius: 100%;
   }

   #view_book_name {
      text-align: center;
      font-weight: bold;
      color: #000;
      font-size: 30px;
   }

   .book-img img {
      display: block;
      margin-left: auto;
      margin-right: auto;
      width: 100%;
      max-width: 292px;
   }

   #view_training input,
   #view_subs_price {
      background: none;
   }

   #view_subs_price {
      padding: 20px;
      max-width: 70px;
   }

   .subs-div {
      border: 1px solid #0a205c;
   }

   .input-group-text.subs-span {
      background: linear-gradient(to right, #0a205c, #10359A);
      color: #fff;
   }

   #view_subs_price {
      color: #184fe7;
      border: 1px solid;
   }

   #book-btn {
      background: linear-gradient(to right, #0a205c, #10359A);
      color: #fff;
      height: 38px;
   }

   .book-div {
      border: 1px solid #184fe7;
      font-size: 1px;
   }
</style>