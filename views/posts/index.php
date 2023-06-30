<div class="container grid lg:grid-cols-2 px-10 lg:px-20">
    <div>
    <p class="text-4xl pb-10 text-purple-900">Here is a list of posts</p>
    <?php
//    Make sure there are only 3 posts for not logged-in users by adding a counter and an if statement to the foreach loop
    $i = 1;
    echo "<table class='table leading-10'><thead><tr><th class='pr-4'>Author</th>"; if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] === TRUE) {echo "<th class='pr-4'>Edit</th> <th class='pr-4 hidden lg:block'>Delete</th>";} echo "<th>Post</th></tr></thead><tbody>";
    foreach ($posts as $post) {
        if ($i <= 3 || (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] === TRUE)) {
        echo "<tr>";
        echo "<td class='text-xl lg:text-2xl pr-4'>" . $post->Author . "</td>";
//        make sure the user is logged in before displaying the edit and delete buttons
        if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] === TRUE) {
            echo "<td><a class='text-lg lg:text-xl text-purple-900 underline' href='?controller=posts&action=viewEdit&ID=" . $post->ID . "'>Edit</a></td>";
//            Delete button only appears on large screens (lg) there is also a delete button in the edit tab
        echo "<td class='hidden lg:block'><a class='text-purple-900 text-lg lg:text-xl underline' href='?controller=posts&action=deletePost&ID=" . $post->ID . "'>Delete</a></td>";}
        echo "<td><a class='text-purple-900 text-lg lg:text-xl underline' href='?controller=posts&action=show&ID=" . $post->ID . "'>View</a></td>";
        echo "</tr>";
        echo "<tr><td colspan='4'><hr></td></tr>";
        $i ++;
    }}
    echo "</tbody></table>";
    ?>
    </div>
<!--    Only show the create button if the user is logged in-->
<?php if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] === TRUE) { ?>
    <div>
        <h1 class="text-4xl pb-10 text-purple-900">Create a post</h1>
        <a class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded" href="?controller=posts&action=viewCreate">Create</a>
    </div>
</div>
    <?php } ?>
