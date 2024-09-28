<?php
    include("header.php");
?>

<div class="rounded-[0.25em] bg-slate-800 lg:w-[65%] w-[95%] mt-8 m-auto p-2">
    <h1 class="text-center text-3xl text-white">
        Make a post!
    </h1>
    <form action="insert.php" method="post">
    <p class="text-white p-2">
        <label for="userName" class="text-1xl">Username:</label>
        <input type="text" name="user_name" id="userName" class="bg-slate-700 p-1 rounded-[0.25em]">
    </p>
    <p class="text-white p-2">
        <label for="userName" class="text-1xl">Password:</label>
        <input type="password" name="password" id="Password" class="bg-slate-700 p-1 rounded-[0.25em]">
    </p>
    <p class="text-white p-2">
        <label for="postContent" class="text-1xl">Content:</label>
        <input type="text" name="post_content" id="postContent" class="bg-slate-700 p-1 rounded-[0.25em]">
    </p>
    <p class="text-white p-2 hidden" id="addImg">
        <label for="imageUrl" class="text-1xl">Insert image URL:</label>
        <input type="text" name="image_url" id="imageUrl" class="bg-slate-700 p-1 rounded-[0.25em]">
    </p>
        <input type="submit" value="Submit" class="mt-4 rounded-[0.25em] text-white bg-slate-700 p-2 float-right m-2">
    </form>
    <button class="text-white bg-slate-700 p-2 rounded-[0.25em] mt-4 float-right m-2" id="addImgBtn" onclick="addImg()">Attach Image</button>
</div>

<?php
    include("footer.php");
?>