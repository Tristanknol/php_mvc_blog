<style>section {padding: 0!important;}</style>
<div class="py-10">
    <div class="lg:w-8/12 rounded-2xl m-auto bg-purple-200 py-10">
        <h1 class="text-4xl text-center font-bold py-5 text-purple-800">Login</h1>
        <form action="<?php $_SERVER["PHP_SELF"]?>" method="POST" class="w-6/12 m-auto">
            <label class="text-2xl text-blue-800">Email</label>
            <input class="w-full px-3 text-white bg-blue-800 rounded-xl my-5 py-3" name="email" type="email">
            <label class="text-2xl text-blue-800">Wachtwoord</label>
            <input class="w-full px-3 text-white bg-blue-800 rounded-xl my-5 py-3" name="wachtwoord" type="text">
            <input class="text-white px-10 py-2 bg-green-800 rounded-full" value="Login" type="submit">
        </form>
    </div>
</div>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    echo $username;
}
?>