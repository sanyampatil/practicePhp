 
 //change from the main_menu.php 
 <!-- Update Profile -->
 <div class="col-auto mb-5 mx-auto">
                <div class="card text-center">
                    <img src="images/profile_picture.jpg" class="card-img-top" alt="Profile Picture">
                    <div class="card-body">
                        <h5 class="card-title">Update Profile</h5>
                        <p class="card-text">Highlight your latest professional achievements and relevant skills</p>
                    </div>
                    <div class="d-grid gap-2"> <a role="button" class="btn card-btn btn-primary fw-medium py-2" href="<?php echo 'update_profile.php?email='.htmlspecialchars($_SESSION['logged_account']['email'])?>">View Profile</a> </div>
                </div>
            </div>