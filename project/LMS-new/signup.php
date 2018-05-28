<?php
session_start();

//include("includes/db.php");

?>


<form  method ="post" enctype = "multipart/form-data" > <!-- Sign Up Modal Window -->
        <div class = "modal-dialog">
      
          <div class = "modal-content">
            <div class = "modal-header">
              <h4 class="modal-title" align="center">Sign Up - We Collaborate
            </div>
        
            <div class="modal-body">
              <span>Enter your name : <input ng-model="user.name" type = "text" placeholder = "Name" name = "c_name" class="form-control"  required="true" /></span>
              <span>Preferred username : <input ng-model="user.username" type = "text" placeholder = "Username" name = "c_username" class="form-control" required="true" /></span>
                  <span>Enter your email ID : <input ng-model="user.emailID" type = "text" placeholder = "alice@wonderland.com" name = "c_email" class="form-control"  required="true" /></span>
                  
              <span>Enter your password : <input ng-model="user.password" name ="c_password" type = "password" class="form-control" required="true"/></span>
              <span>Insert image : <input name = "customer_image" type= "file" class="form-control"/></span>
            </div>
        
            <div class="modal-footer">
              <button type = "submit" name="register" value = "register" class = "btn btn-primary">Sign Up</button>
              <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </form>



    