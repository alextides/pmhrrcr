<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-12 align-self-center">
                <h3 class="text-themecolor">Dashboard</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-row">
                            <!DOCTYPE html>
                            <html>

                            <head>

                                <!-- Dropzone CSS & JS -->
                                <!-- <link href='<?= base_url() ?>resources/dropzone.css' type='text/css' rel='stylesheet'>
                                <script src='<?= base_url() ?>resources/dropzone.js' type='text/javascript'></script> -->

                                <!-- Dropzone CDN -->

                                <link href='https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.css' type='text/css' rel='stylesheet'>
                                <script src='https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js' type='text/javascript'></script>

                                <style>
                                    .content {
                                        width: 50%;
                                        padding: 5px;
                                        margin: 0 auto;
                                    }

                                    .content span {
                                        width: 250px;
                                    }

                                    .dz-message {
                                        text-align: center;
                                        font-size: 28px;
                                    }
                                </style>
                                <script>
                                    // Add restrictions
                                    Dropzone.options.fileupload = {
                                        acceptedFiles: 'jpg/*',
                                        maxFilesize: 500 // MB
                                    };
                                </script>
                            </head>

                            <body>
 <?php
    $data = array(
        'uploads/8/thumbs/8470177001370850253.png',
        'uploads/10/thumbs/967693821370850253.png',
        'uploads/9/thumbs/8470177001370850253.png',
        'uploads/11/thumbs/967693821370850253.png'
    );

    foreach ($data as $row) {
        $temparray = explode('/', $row);
        // $temparray[1] = 20;
        $haha = implode('/', $temparray);
        echo '<input type="text" value='. $haha.'>';
    }
 ?>
                            </body>

                            </html>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>