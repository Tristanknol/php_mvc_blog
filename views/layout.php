<!--views/layout.php-->
<DOCTYPE HTML>
    <html>
    <head>
    <link rel="stylesheet" href="dist/output.css">
    </head>
     <body>
        <header class="py-5 px-20 bg-purple-900 gap-x-20 flex items-center flex-row">
            <img class="w-[5%]" src="images/Alfa_ict.svg">
            <a class="text-white text-2xl" href="/php_mvc_blog">Home</a>
            <a class="text-white text-2xl" href="?controller=posts&action=index">Posts</a>
        </header>
        <div class="py-20">
        <?php require_once "routes.php"; ?>
        </div>
        <footer class="py-10 flex justify-center bg-purple-900">
            <footer class="text-xl text-white">©AMP-IT™ <?php echo date("Y"); ?></footer>
        </footer>
     </body>
    </html>