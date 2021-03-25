<div class="page-wrapper" id="">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor page-title-text">Training Materials List</h3>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <button type="button" class="btn atm-button" data-toggle="modal" data-target="#trainingModal"><i class="fa fa-plus-circle"></i> Add Training Material</button>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-12-no-padding">
                <div class="card">
                    <div class="card-body">
                        <!-- Training Materials -->
                        <div class="table-responsive">
                            <table id="training_materials_datatable" class="table table-striped jambo_table bulk_action dt-responsive" style="width: 100% !important;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Book Name</th>
                                        <th>Subscription Price</th>
                                        <th>Date Created</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <!-- End Training Materials -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal - Add Training Material -->
<div class="modal fade" id="trainingModal" tabindex="-1" role="dialog" aria-labelledby="trainingModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="trainingModalTitle">Add Training Material</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" action="<?= base_url("training_materials/add_training_materials"); ?>" id="add_training">
                    <div class="form-body">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="fbold">Book Name:</label>
                                    <input type="text" class="form-control" id="book_name" name="book_name" value="" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="fbold">Upload Book Image:</label>
                                    <input type="file" class="form-control" id="book_image" name="book_image" value="" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6" id="file_upload">
                                    <label class="fbold">Upload Files:</label>
                                    <button type="button" class="btn btn-primary btn-sm atm-button add-uf"><i class="fa fa-plus-circle"></i> </button>
                                    <button type="button" class="btn btn-primary btn-sm atm-button remove-uf"><i class="fas fa-trash-alt"></i> </button>
                                    <input type="file" class="form-control" id="book_file" name="book_file[]" value="" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="fbold">Subscription Price:</label>
                                    <input type="number" min="0" class="form-control" id="subs_price" name="subs_price" value="" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3 col-lg-12">
                                    <div class="form-group">
                                        <label>Description: </label>
                                        <?php echo $this->ckeditor->editor("book_desc", "book_desc"); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn atm-close" data-dismiss="modal">Close</button>
                <button type="submit" class="btn atm-submit"><i class="fa fa-plus-circle"></i> Save Training Material</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal - View Training Material -->
<div class="modal fade" id="ViewTrainingModal" tabindex="-1" role="dialog" aria-labelledby="ViewTrainingModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ViewTrainingModalTitle">View Training Material</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="view_training">
                    <input type="hidden" class="form-control" id="view_training_id" name="view_training_id">
                    <div class="form-body">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <input type="text" class="form-control form-control-plaintext" id="view_book_name" name="view_book_name" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <div class="book-img">
                                        <img src="" id="view_book_image" name="view_book_image">
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend subs-div">
                                        <span class="input-group-text subs-span">Subscription Price: $</span>
                                    </div>
                                    <input type="text" class="form-control " id="view_subs_price" name="view_subs_price" aria-label="Amount (to the nearest dollar)" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3 col-lg-12">
                                    <div class="form-group">
                                        <label>Description: </label>
                                        <?php echo $this->ckeditor->editor("view_book_desc", "view_book_desc"); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <div class="input-group-append">
                    <button type="button" class="btn view-atm-close" data-dismiss="modal">Close</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal - Add Training Material -->
<div class="modal fade" id="UpdateTrainingModal" tabindex="-1" role="dialog" aria-labelledby="UpdateTrainingModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="UpdateTrainingModalTitle">Add Training Material</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" action="<?= base_url("training_materials/add_training_materials"); ?>" id="add_training">
                    <input type="hidden" class="form-control" id="update_training_id" name="update_training_id">
                    <div class="form-body">
                        <div class="card-body">
                            <div class="row view-book" style="display: none">
                                <div class="form-group col-md-12">
                                    <div class="book-img">
                                        <img src="" id="up_book_image" name="up_book_image">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="fbold">Book Name:</label>
                                    <input type="text" class="form-control" id="update_book_name" name="update_book_name" value="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="fbold">Book Image:</label>
                                    <!-- <input type="file" class="form-control" id="update_book_image" name="update_book_image" value=""> -->
                                    <div class="input-group book-div">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="update_book_image" name="update_book_image" aria-describedby="book-btn">
                                            <label class="custom-file-label form-control" for="inputGroupFile04">Update Book Image</label>
                                        </div>
                                        <div class="input-group-append">
                                            <button class="btn display-book-btn" type="button" id="book-btn" data-toggle='tooltip' data-placement='bottom' title='View Book'><i class='fa fa-eye'></i></button>
                                            <button class="btn hide-book-btn" type="button" id="book-btn" data-toggle='tooltip' data-placement='bottom' title='Hide Book' style="display: none"><i class='fa fa-eye'></i></button>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6" id="file_upload">
                                    <label class="fbold">Upload Files:</label>
                                    <!-- <button type="button" class="btn btn-primary btn-sm atm-button add-uf"><i class="fa fa-plus-circle"></i> </button>
                                    <button type="button" class="btn btn-primary btn-sm atm-button remove-uf"><i class="fas fa-trash-alt"></i> </button>
                                    <input type="file" class="form-control" id="book_file" name="book_file[]" value=""> -->
                                    <textarea type="text" class="form-control" id="haha" name="haha" value=""></textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="fbold">Subscription Price:</label>
                                    <input type="number" min="0" class="form-control" id="update_subs_price" name="update_subs_price" value="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3 col-lg-12">
                                    <div class="form-group">
                                        <label>Description: </label>
                                        <?php echo $this->ckeditor->editor("update_book_desc", "update_book_desc"); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn atm-close" data-dismiss="modal">Close</button>
                <button type="submit" class="btn atm-submit"><i class="fa fa-check-circle"></i> Update Training Material</button>
            </div>
            </form>
        </div>
    </div>
</div>