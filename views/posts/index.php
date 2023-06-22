<div class="container px-20">
<p class="text-4xl pb-10 text-purple-900">Here is a list of all posts</p>
<?php
foreach ($posts as $post) { ?>
    <p class="text-2xl leading-10">
        <?php echo $post->Author; ?>
        <a class="text-purple-900 underline" href="?controller=posts&action=show&ID=<?php echo $post->ID;?>">See content</a>
    </p>
    <?php
}
?>
</div>
