<div class="container m-auto px-20">
    <div class="pb-10">
<p class="text-purple-900 border-b-2 text-center font-bold text-4xl">This is the requested post</p>
<p class="text-purple-900 font-bold mt-20 text-4xl"><?php echo $post->Title ?></p>
        <ul class="flex">
            <li class="text-lg text-gray-500"><?php echo $post->Author; ?>&nbsp;&nbsp;</li><br>
            <li class="text-gray-500 text-lg"><?php echo $post->Date ?></li>
            <ul>
    </div>
<p class="text-xl border-b-2"><?php echo $post->Content; ?></p>
</div>