<!--views/pages/home.php-->
<div class="px-20 container">
<p class="text-2xl">Hello there <?php if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] === TRUE) {echo $_SESSION["name"] . "!";} ?></p>

<p class="text-2xl">You succesfully landed on the homepage. Congrats!</p>
</div>