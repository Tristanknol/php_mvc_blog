<div class="container px-20">
    <p class="text-4xl pb-10 text-purple-900">Here is a list of all posts</p>
    <?php
    echo "<table class='table leading-10'><thead><tr><th class='pr-4'>Author</th><th class='pr-4'>Edit</th><th>Post</th></tr></thead><tbody>";
    foreach ($posts as $post) {
        echo "<tr>";
        echo "<td class='text-2xl pr-4'>" . $post->Author . "</td>";
        echo "<td><a class='text-xl text-purple-900 underline' href='?controller=posts&action=crud&ID=" . $post->ID . "'>Edit</a></td>";
        echo "<td><a class='text-purple-900 text-xl underline' href='?controller=posts&action=show&ID=" . $post->ID . "'>See content</a></td>";
        echo "</tr>";
        echo "<tr><td colspan='3'><hr></td></tr>";
    }
    echo "</tbody></table>";
    ?>
</div>
