<div class="page-wrapper" id="">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor page-title-text">Manage Users</h3>
            </div>
            <div class="col-md-7 align-self-center text-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#adduser"><i class="fa fa-plus-circle"></i> Add Users </button>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-12-no-padding">
                <div class="card">
                    <div class="card-body">
                        <!-- Training Materials -->
                        <div class="table-responsive">
                            <table id="user_datatable" class="table table-striped jambo_table bulk_action dt-responsive" style="width: 100% !important;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>City</th>
                                        <th>State</th>
                                        <th>Country</th>
                                        <th>Zip Code</th>
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
<!-- Modal -->
<div class="modal fade" id="adduser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="form-horizontal form-material" id="adduser" method="post" action="<?= base_url("userlist/adduser"); ?>">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"><i class="icon-User"></i> Add User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>            
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="first_name">First Name</label>
                                    <input id="first_name" class="form-control" type="text"  name="first_name" value="" required/>
                                </div>
                                <div class="col-md-6">
                                    <label for="last_name">Last Name</label>
                                    <input id="last_name" class="form-control" type="text"  name="last_name" value="" required/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="username">Username</label>
                                    <input id="username" class="form-control" type="text"  name="username" value="" required />
                                </div>
                                <div class="col-md-6">
                                    <label for="password">Password</label>
                                    <input id="password" class="form-control" type="password" name="password" value="" required/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="email">Email Address</label>
                                    <input id="email" class="form-control" type="email"  name="email" value="" required/>
                                </div>
                                <div class="col-md-6">
                                    <label for="phone_number">Phone</label>
                                    <input id="phone_number" class="form-control" type="number"  name="phone_number" value="" required />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="city">City</label>
                                    <input id="city" class="form-control" type="text" name="city" value="" required/>
                                </div>
                                <div class="col-md-6">
                                    <label for="state">State</label>
                                    <input id="state" class="form-control" type="text" name="state" value="" required/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="country">Country</label>
                                    <input id="country" class="form-control" type="text"  name="country" value="" required/>
                                </div>
                                <div class="col-md-6">
                                    <label for="zip_code">Zip Code</label>
                                    <input id="zip_code" class="form-control" type="text" name="zip_code" value="" required/>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Update Users-->
<div class="modal fade" id="UpdateUsers" tabindex="-1" role="dialog" aria-labelledby="UpdateUsersTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-scrollable" role="document">
   <div class="modal-content">
      <form method="post" enctype="multipart/form-data" action="<?= base_url("userlist/update_users"); ?>" id="update_users">
         <div class="modal-header">
            <h4 class="modal-title" id="UpdateUsersLabel"><i class="icon-User"></i> Update User</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </button>
         </div>
         <div class="modal-body">
         <input type="hidden" class="form-control" id="fk_user_id" name="fk_user_id">
         <input type="hidden" class="form-control" id="user_id" name="user_id">
            <div class="modal-body">
               <div class="form-group">
                  <div class="row">
                     <div class="col-md-6">
                        <label for="first_name">First Name</label>
                        <input id="first_name" class="form-control" type="text"  name="first_name" value="" required/>
                     </div>
                     <div class="col-md-6">
                        <label for="last_name">Last Name</label>
                        <input id="last_name" class="form-control" type="text"  name="last_name" value="" required/>
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <div class="row">
                     <div class="col-md-6">
                        <label for="username">Username</label>
                        <input id="username" class="form-control" type="text"  name="username" value="" required />
                     </div>
                     <div class="col-md-6">
                        <label for="email">Email Address</label>
                        <input id="email" class="form-control" type="email" name="email" value="" required/>
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <div class="row">
                     <div class="col-md-6">
                        <label for="phone_number">Phone</label>
                        <input id="phone_number" class="form-control" type="number"  name="phone_number" value="" required />
                     </div>
                     <div class="col-md-6">
                        <label for="city">City</label>
                        <input id="city" class="form-control" type="text" name="city" value="" required/>
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <div class="row">
                     <div class="col-md-6">
                        <label for="state">State</label>
                        <input id="state" class="form-control" type="text" name="state" value="" required/>
                     </div>
                     <div class="col-md-6">
                        <label for="country">Country</label>
                        <input id="country" class="form-control" type="text"  name="country" value="" required/>
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <div class="row">
                     <div class="col-md-6">
                        <label for="zip_code">Zip Code</label>
                        <input id="zip_code" class="form-control" type="text" name="zip_code" value="" required/>
                     </div>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn atm-close" data-dismiss="modal">Close</button>
               <button type="submit" class="btn atm-submit"><i class="fa fa-check-circle"></i> Update User</button>
            </div>
         </div>
      </form>
   </div>
</div>
