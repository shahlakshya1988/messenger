<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,shrink-to-fit=no">
	<title>Home</title>
	<link rel="stylesheet" href="assets/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
	<!-- font-family: 'Poppins', sans-serif; -->	
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <nav id="nav">
    
    </nav>
    <!-- nav#nav -->
    <div class="chat-container">
        <section id="sidebar">
            <ul class="left-ul">
                <li><a href="#"><span class="profile-img-span"><img src="assets/img/pro4.jpg" alt="Profile Image" class="profile-img"></span></a></li>
                <li><a href="#">User Name <span class="cool-hover"></span></a></li>
                <li><a href="change_name.php">Change Name <span class="cool-hover"></span></a></li>
                <li><a href="change_password.php">Change Password <span class="cool-hover"></span></a></li>
                <li><a href="#">110 User Online <span class="cool-hover"></span></a></li>
            </ul>
            <!-- ul.left-ul -->
        </section>
        <!-- section#sidebar -->
        <section id="right-area">
            <div class="form-section">
                <div class="form-grid">
                    <div class="form-area">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="group">
                                <h2 class="form-heading">Update Password</h2>
                            </div>
                            <!-- div.group -->
                            
                            <div class="group">
                                <input type="password" name="current_password" id="current_password" class="control" placeholder="Enter Current Password">
                            </div>
                            <!-- div.group -->
                            <div class="group">
                                <input type="password" name="new_password" id="new_password" class="control" placeholder="Enter New Password">
                            </div>
                            <!-- div.group -->
                            <div class="group">
                                <input type="password" name="retype_new_password" id="retype_new_password" class="control" placeholder="Retype New Password">
                            </div>
                            <!-- div.group -->
                            <div class="group">
                                <input type="submit" name="change_password" id="change_password" class="btn account-btn" value="Save Changes">
                            </div>
                            <!-- div.group -->
                            
                        </form>
                    </div>
                    <!-- div.form-area -->
                </div>
                <!-- div.form-grid -->
            </div>
            <!-- div.form-section -->
        </section>
        <!-- section#right-area -->
    </div>
    <!-- div.chat container -->
</body>
</html>