<!--views/layout.php-->
<DOCTYPE HTML>
    <html>
    <head>
    <link rel="stylesheet" href="dist/output.css">
    </head>
     <body>
     <header class="px-20 bg-purple-900 flex items-center justify-between">
         <div class="flex">
             <img class="w-[10%]" src="images/Alfa_ict.svg">
             <div class="py-10 ml-10 flex gap-x-20 items-center">
             <a class="text-white text-2xl lg:text-3xl" href="/php_mvc_blog">Home</a>
             <a class="text-white text-2xl lg:text-3xl" href="?controller=posts&action=index">Posts</a>
            </div>
         </div>
         <?php
         session_start();
         if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] === TRUE) {
        echo "<a href='?controller=user&action=showSignOut' class='text-white text-2xl lg:text-3xl'>Logout</a>";
         } else {echo "<a href='?controller=user&action=showLogin' class='text-white text-2xl lg:text-3xl'>Login</a>";} ?>
     </header>
     <section class="py-20">
        <?php
        require_once "routes.php";
        ?>
        </section>
        <footer class="py-10 flex justify-center bg-purple-900">
            <footer class="text-xl text-white">©AMP-IT™ <?php echo date("Y"); ?></footer>
        </footer>
     </body>
    </html>