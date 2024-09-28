<?php
    include("header.php");
?>

<div class="rounded-[0.25em] bg-slate-800 lg:w-[65%] w-[95%] mt-8 m-auto p-2">
    <h1 class="text-center text-3xl text-white">
        Create an account!
    </h1>
    <form action="create.php" method="post">
    <p class="text-white p-2">
        <label for="userName" class="text-1xl">Username:</label>
        <input type="text" name="user_name" id="userName" class="bg-slate-700 p-1 rounded-[0.25em]">
    </p>
    <p class="text-white p-2">
        <label for="userName" class="text-1xl">Password:</label>
        <input type="password" name="password" id="Password" class="bg-slate-700 p-1 rounded-[0.25em]">
    </p>
        <input type="submit" value="Submit" class="mt-4 rounded-[0.25em] text-white bg-slate-700 p-2">
    </form>
</div>

<?php
    include("footer.php");
?>