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
         <div class="form-row">
            <body>
               <input type="hidden" class="form-control" id="fk_user_id" name="fk_user_id" value="<?=$user["fk_user_id"]?>">
               <input type="hidden" class="form-control" id="user_id" name="user_id" value="<?=$user["user_id"]?>">
               <div class="form-group">
                  <div class="row">
                     <div class="col-md-4">
                        <div class="form-group">
                           <label>First Name</label>
                           <input id="first_name" class="form-control" type="text"  name="first_name" value="<?=$user["first_name"]?>" required/>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label>Last Name</label>
                           <input id="last_name" class="form-control" type="text"  name="last_name" value="<?=$user["last_name"]?>" required/>
                        </div>
                     </div>
                     <div class="col-md-4"> </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label>Username</label>
                           <input id="username" class="form-control" type="text"  name="username" value="<?=$user["username"]?>" required />
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="email">Email Address</label>
                           <input id="email" class="form-control" type="email" name="email" value="<?=$user["email"]?>" required/>
                        </div>
                     </div>
                     <div class="col-md-4"></div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label>Phone</label>
                           <input id="phone_number" class="form-control" type="number"  name="phone_number" value="<?=$user["phone_number"]?>" required />
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label>City</label>
                           <input id="city" class="form-control" type="text" name="city" value="<?=$user["city"]?>" required/>
                        </div>
                     </div>
                     <div class="col-md-4"></div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label>State</label>
                           <input id="state" class="form-control" type="text" name="state" value="<?=$user["state"]?>" required/>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label>Country</label>
                           <input id="country" class="form-control" type="text"  name="country" value="<?=$user["country"]?>" required/>
                        </div>
                     </div>
                     <div class="col-md-4"></div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label>Zip Code</label>
                           <input id="zip_code" class="form-control" type="text" name="zip_code" value="<?=$user["zip_code"]?>" required/>
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
   </div>
</div>