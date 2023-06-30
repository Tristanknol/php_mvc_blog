<!--views/pages/home.php-->
<!--home page-->
<div class="px-5 lg:px-20 container">
<p class="text-xl sm:text-2xl lg:text-3xl">Hello there <?php if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] === TRUE) {echo $_SESSION["name"] . "!";} ?></p>

<p class="text-xl sm:text-2xl lg:text-3xl">You succesfully landed on the homepage. Congrats!</p>
</div>