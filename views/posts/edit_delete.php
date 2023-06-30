<?php if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] === TRUE) {
$getid = isset($_GET['ID']) ? $_GET['ID'] : '';

$pdo = Db::getInstance();

// Retrieve the specific post with the matching ID
$post = $pdo->prepare("SELECT * FROM posts WHERE id = :id");
$post->bindParam(':id', $getid);
$post->execute();
$postRow = $post->fetch();
?>
<!--    Display the post in a table before editing or deleting it-->
<!--    desktop version-->
    <div id="computerView" class="lg:block container hidden m-auto mt-5">
    <table class="w-full">
        <thead>
        <tr>
            <th class="py-2 px-4">ID</th>
            <th class="py-2 px-4">Author</th>
            <th class="py-2 px-4">Title</th>
            <th class="py-2 px-4">Content</th>
            <th class="py-2 px-4">Slug</th>
            <th class="py-2 px-4">Date</th>
            <th class="py-2 px-4">Edit/Delete</th>
        </tr>
        </thead>
        <tbody class="text-center">
        <?php if ($postRow) { // Only render the row if the post exists ?>
            <tr>
<!--                Display the post in a table before editing or deleting it-->
                <td class="py-2 px-4"><?php echo $postRow["ID"]; ?></td>
                <td class="py-2 px-4"><?php echo $postRow["Author"]; ?></td>
                <td class="py-2 px-4"><?php echo $postRow["Title"]; ?></td>
                <td class="py-2 px-4"><?php echo $postRow["Content"]; ?></td>
                <td class="py-2 px-4"><?php echo $postRow["Slug"]; ?></td>
                <td class="py-2 px-4"><?php echo $postRow["Date"]; ?></td>
                <td class="py-2 px-4">
                    <form method="post">
                        <input type="hidden" name="ID" value="<?php echo $postRow["ID"]; ?>">
                        <input type="hidden" name="Author" value="<?php echo $postRow["Author"]; ?>">
                        <input type="hidden" name="Title" value="<?php echo $postRow["Title"]; ?>">
                        <input type="hidden" name="Content" value="<?php echo $postRow["Content"]; ?>">
                        <input type="hidden" name="Slug" value="<?php echo $postRow["Slug"]; ?>">
                        <input type="hidden" name="Date" value="<?php echo $postRow["Date"]; ?>">
<!--                        opens edit form-->
                        <input id="submitPC" value="Edit" type="submit" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">
                    </form>
<!--                Add a form to delete the post there is also a delete function on the post index page-->
                    <form action="?controller=posts&action=deletePost" method="post">
                        <input type="hidden" name="ID" value="<?php echo $postRow["ID"]; ?>">
                        <input value="Delete" type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    </form>
                </td>
            </tr>
        <?php }
        // If the post doesn't exist, display a message
        else { ?>
            <tr>
                <td class="py-2 px-4" colspan="6">No post found.</td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    </div>

<!--        mobile version-->
        <!--    Display the post in a table before editing or deleting it-->
        <div class="container lg:hidden m-auto mt-5">
            <?php if ($postRow) { // Only render the row if the post exists ?>
                <div class="text-center px-5 gap-4">
                    <div>
                    <div class="py-2 px-4">
                        <strong>ID:</strong>
                    </div>
                    <div class="py-4 border-2 px-4">
                        <?php echo $postRow["ID"]; ?>
                    </div>
                    <div class="py-2 px-4">
                        <strong>Author:</strong>
                    </div>
                    <div class="py-4 border-2 px-4">
                        <?php echo $postRow["Author"]; ?>
                    </div>
                    <div class="py-2 px-4">
                        <strong>Title:</strong>
                    </div>
                    <div class="py-4 border-2 px-4">
                        <?php echo $postRow["Title"]; ?>
                    </div>
                    <div class="py-2 px-4">
                        <strong>Content:</strong>
                    </div>
                    <div class="py-4 border-2 px-4">
                        <?php echo $postRow["Content"]; ?>
                    </div>
                    <div class="py-2 px-4">
                        <strong>Slug:</strong>
                    </div>
                    <div class="py-4 border-2 px-4">
                        <?php echo $postRow["Slug"]; ?>
                    </div>
                    <div class="py-2 px-4">
                        <strong>Date:</strong>
                    </div>
                    <div class="py-4 border-2 px-4">
                        <?php echo $postRow["Date"]; ?>
                    </div>
                    </div>
                    <div class="col-span-2 flex justify-center py-4 px-4">
                        <form method="post">
                            <input type="hidden" name="ID" value="<?php echo $postRow["ID"]; ?>">
                            <input type="hidden" name="Author" value="<?php echo $postRow["Author"]; ?>">
                            <input type="hidden" name="Title" value="<?php echo $postRow["Title"]; ?>">
                            <input type="hidden" name="Content" value="<?php echo $postRow["Content"]; ?>">
                            <input type="hidden" name="Slug" value="<?php echo $postRow["Slug"]; ?>">
                            <input type="hidden" name="Date" value="<?php echo $postRow["Date"]; ?>">
                            <input value="Edit" type="submit" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-4 px-4 mx-10 rounded">
                        </form>
                        <form action="?controller=posts&action=deletePost" method="post">
                            <input type="hidden" name="ID" value="<?php echo $postRow["ID"]; ?>">
                            <input value="Delete" type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-4 px-4 mx-10 rounded">
                        </form>
                    </div>
                </div>
            <?php } ?>
        </div>


<!--check if the form has been submitted and if so, retrieve the values from the form-->
    <?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $postId = isset($_POST["ID"]) ? $_POST["ID"] : '';
        $postAuthor = isset($_POST["Author"]) ? $_POST["Author"] : '';
        $postTitle = isset($_POST["Title"]) ? $_POST["Title"] : '';
        $postContent = isset($_POST["Content"]) ? $_POST["Content"] : '';
        $postSlug = isset($_POST["Slug"]) ? $_POST["Slug"] : '';
        $postDate = isset($_POST["Date"]) ? $_POST["Date"] : '';
        ?>

<!--        Add a form to edit the post-->
        <div class="m-auto px-5 sm:px-20">
            <form action="?controller=posts&action=editPost" method="POST">
                <input type="hidden" name="ID" value="<?php echo $postId; ?>">
                <div class="mb-3">
                    <label for="author" class="block mb-2">Author</label>
                    <input name="Author" id="author" class="w-full border border-gray-300 rounded py-2 px-4 mb-2" type="text" value="<?php echo $postAuthor; ?>">
                </div>
                <div class="mb-3">
                    <label for="title" class="block mb-2">Title</label>
                    <input name="Title" id="title" class="w-full border border-gray-300 rounded py-2 px-4 mb-2" type="text" value="<?php echo $postTitle; ?>">
                </div>
                <div class="mb-3">
                    <label for="slug" class="block mb-2">Slug</label>
                    <input name="Slug" id="slug" class="w-full border border-gray-300 rounded py-2 px-4 mb-2" type="text" value="<?php echo $postSlug; ?>">
                </div>
                <div class="mb-3">
                    <label for="content" class="block mb-2">Content</label>
                    <textarea name="Content" id="content" class="w-full border border-gray-300 rounded py-2 px-4 mb-2"><?php echo $postContent; ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="date" class="block mb-2">Date</label>
                    <input name="Date" id="date" class="w-full border border-gray-300 rounded py-2 px-4 mb-2" type="text" value="<?php echo date("Y-m-d G:i:s") ?>">
                </div>
                <div class="mb-3">
                    <input type="submit" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded" value="Update">
                </div>
            </form>
        </div>
    <?php } ?>
<?php } else echo "<h1 class='text-3xl text-center text-purple-900'>You are not logged in so you can't edit posts.</h1>"; ?>