<!--views/layout.php-->
    <html>
    <head>
        <!--        favicon-->
        <link rel="icon" href="images/Alfa_ict.svg" type="image/x-icon">
        <!--        custom fonts-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Wix+Madefor+Display:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="dist/output.css">
        <title>AMP-IT™</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
     <body>
     <header class="px-4 lg:px-20 bg-purple-900 flex items-center justify-between">
         <div class="flex items-center">
             <img class="w-12 sm:w-16" src="images/Alfa_ict.svg" alt="Logo">
             <div class="py-8 pl-5 lg:pl-16 sm:py-10 flex gap-x-4 sm:gap-x-6 items-center">
                 <a class="text-white text-lg lg:text-2xl xl:text-3xl" href="/php_mvc_blog">Home</a>
                 <a class="text-white text-lg lg:text-2xl xl:text-3xl" href="?controller=posts&action=index">Posts</a>
             </div>
         </div>
         <?php
         // Start the session so we can check if the user is logged in
         session_start();
         if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] === TRUE) {
             echo "<a href='?controller=user&action=showProfile' class='text-white text-lg lg:text-2xl xl:text-3xl'>Profile</a>";
         } else {
             echo "<a href='?controller=user&action=showLogin' class='text-white text-lg lg:text-2xl xl:text-3xl'>Login</a>";
         }
         ?>
     </header>

     <section class="py-20">
        <?php
        require_once "routes.php";
        ?>
        </section>
        <footer class="py-10 flex justify-center bg-purple-900">
<!--            Best company in the world-->
            <footer class="text-xl text-white">©AMP-IT™ <?php echo date("Y"); ?></footer>
        </footer>
     </body>
    </html>