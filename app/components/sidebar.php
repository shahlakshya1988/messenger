<section id="sidebar">
    <ul class="left-ul">
        <li><a href="#"><span class="profile-img-span"><img src="assets/img/<?= $_SESSION["user_image"] ?>" alt="<?= ucfirst($_SESSION["user_name"]); ?>" class="profile-img"></span></a></li>
        <li><a href="index.php"><?= ucfirst($_SESSION["user_name"]); ?> <span class="cool-hover"></span></a></li>
       <li><a href="change_name.php">Change Name <span class="cool-hover"></span></a></li>
        <li><a href="change_password.php">Change Password <span class="cool-hover"></span></a></li>
        <li><a href="#">110 User Online <span class="cool-hover"></span></a></li>
        <li><a href="logout">Logout <span class="cool-hover"></span></a></li>
    </ul>
    <!-- ul.left-ul -->
</section>
<!-- section#sidebar -->