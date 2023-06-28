<h1 class="text-center text-2xl text-purple-900 lg:text-4xl">Your profile</h1>
<div class="p-5 lg:p-10">
<?php
echo "<h2 class='text-center text-xl lg:text-2xl'>Name " . $_SESSION["name"] . "</h2><br>";
echo "<h2 class='text-center text-xl lg:text-2xl'>Email " . $_SESSION["email"] . "</h2>";
?>

    <form class="my-20" action="?controller=user&action=editUser" method="POST">
        <div class="m-auto w-5/6">
            <div>
                <label class="text-center text-xl lg:text-2xl" for="RegisterName">Name</label>
                <input value="<?php echo $_SESSION["name"] ?>" class="w-full border border-gray-300 rounded py-2 px-4 mb-2" type="text" name="RegisterName" id="RegisterName" placeholder="Name">
            </div>
            <div>
                <label class="text-center text-xl lg:text-2xl" for="RegisterEmail">Email</label>
                <input value="<?php echo $_SESSION["email"] ?>" class="w-full border border-gray-300 rounded py-2 px-4 mb-2" type="email" name="RegisterEmail" id="RegisterEmail" placeholder="Email">
            </div>
            <div>
                <label class="text-center text-xl lg:text-2xl" for="RegisterPassword">Password</label>
                <input class="w-full border border-gray-300 rounded py-2 px-4 mb-2" type="password" name="RegisterPassword" id="RegisterPassword" placeholder="Password">
            </div>
            <input class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded" type="submit" value="Edit">
        </div>
    </form>
</div>

<div class="px-20 flex justify-center">
    <a class="rounded-full text-2xl text-white bg-red-500 py-3 px-20 text-center" href="?controller=user&action=signOut">Logout</a>
</div>