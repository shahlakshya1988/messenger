<section id="sidebar">
    <ul class="left-ul">
        <li><a href="javascript:void(0);"><span class="profile-img-span"><img src="assets/img/<?= $_SESSION["user_image"] ?>" alt="<?= ucfirst($_SESSION["user_name"]); ?>" class="profile-img"></span></a></li>
        <li><a href="index.php"><?= ucfirst($_SESSION["user_name"]); ?> <span class="cool-hover"></span></a></li>
        <li><a href="change_name.php">Change Name <span class="cool-hover"></span></a></li>
        <li><a href="change_password.php">Change Password <span class="cool-hover"></span></a></li>
        <li><a href="change_image.php">Change Image <span class="cool-hover"></span></a></li>
        <li><a href="#"> <span class="currently_active_users"></span> User Online <span class="cool-hover"></span></a></li>
        <li><a href="javascript:void(0);" class="delete_messages_a">Delete Messages<span class="cool-hover"></span></a></li>
        <li><a href="logout">Logout <span class="cool-hover"></span></a></li>
    </ul>
    <!-- ul.left-ul -->
</section>
<!-- section#sidebar -->