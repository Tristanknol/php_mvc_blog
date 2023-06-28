<?php
if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] === TRUE) {
?>
    <div class="m-auto w-5/6 lg:w-8/12">
        <form action="?controller=posts&action=createPost" method="POST">
            <div class="mb-3">
                <label for="author" class="block mb-2">Author</label>
                <input value="<?php echo $_SESSION["name"] ?>" name="Author" id="author" class="w-full border border-gray-300 rounded py-2 px-4 mb-2" type="text">
            </div>
            <div class="mb-3">
                <label for="title" class="block mb-2">Title</label>
                <input name="Title" id="title" class="w-full border border-gray-300 rounded py-2 px-4 mb-2" type="text"">
            </div>
            <div class="mb-3">
                <label for="slug" class="block mb-2">Slug</label>
                <input name="Slug" id="slug" class="w-full border border-gray-300 rounded py-2 px-4 mb-2" type="text">
            </div>
            <div class="mb-3">
                <label for="content" class="block mb-2">Content</label>
                <textarea name="Content" id="content" class="w-full border border-gray-300 rounded py-2 px-4 mb-2"></textarea>
            </div>
            <div class="mb-3">
                <label for="date" class="block mb-2">Date</label>
                <input name="Date" id="date" class="w-full border border-gray-300 rounded py-2 px-4 mb-2" value="<?php echo date("Y-m-d G:i:s") ?>" type="text">
            </div>
            <div class="mb-3">
                <input name="createSubmit" type="submit" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded" value="Create">
            </div>
        </form>
    </div>
<?php }?>