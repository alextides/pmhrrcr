<div class="page-wrapper">
<div class="container-fluid">
<div class="row page-titles">
   <div class="col-md-12 align-self-center">
      <h3 class="text-themecolor">Profile</h3>
   </div>
</div>
<div class="row">
<div class="col-md-12">
   <div class="card">
      <div class="card-body">
       <form method="post" id="update_users" action="<?=base_url();?>update/update_users">
         <div class="form-row">
            <body>
               <input type="hidden" class="form-control" id="fk_user_id" name="fk_user_id" value="<?php echo $user_prof[0]['fk_user_id']; ?>">
               <input type="hidden" class="form-control" id="user_id" name="user_id" value="<?php echo $user_prof[0]['user_id'];  ?>">
               <div class="form-group">
                  <div class="row">
                     <div class="col-md-4">
                        <div class="form-group">
                           <label>First Name</label>
                           <input id="first_name" class="form-control" type="text"  name="first_name" value="<?php echo $user_prof[0]['first_name']; ?>" required/>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label>Last Name</label>
                           <input id="last_name" class="form-control" type="text"  name="last_name" value="<?php echo $user_prof[0]['last_name']; ?>" required/>
                        </div>
                     </div>
                     <div class="col-md-4"> </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label>Username</label>
                           <input id="username" class="form-control" type="text"  name="username" value="<?php echo $user_prof[0]['username']; ?>" required />
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="email">Email Address</label>
                           <input id="email" class="form-control" type="email" name="email" value="<?php echo $user_prof[0]['email']; ?>" required/>
                        </div>
                     </div>
                     <div class="col-md-4"></div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label>Phone</label>
                           <input id="phone_number" class="form-control" type="number"  name="phone_number" value="<?php echo $user_prof[0]['phone_number']; ?>" required />
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label>City</label>
                           <input id="city" class="form-control" type="text" name="city" value="<?php echo $user_prof[0]['city']; ?>" required/>
                        </div>
                     </div>
                     <div class="col-md-4"></div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label>State</label>
                           <input id="state" class="form-control" type="text" name="state" value="<?php echo $user_prof[0]['state']; ?>" required/>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label>Country</label>
                           <input id="country" class="form-control" type="text"  name="country" value="<?php echo $user_prof[0]['country']; ?>" required/>
                        </div>
                     </div>
                     <div class="col-md-4"></div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label>Zip Code</label>
                           <input id="zip_code" class="form-control" type="text" name="zip_code" value="<?php echo $user_prof[0]['zip_code']; ?>" required/>
                        </div>
                     </div>
                     <div class="col-md-12">
                        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Update</button>
                     </div>
                  </div>
            </body>
            </html>
         </div>
      </div>
      </form>
   </div>
</div>