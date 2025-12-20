<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location: includes/auth.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="public/output.css">

</head>

<body>
    <?php
    $page = "dashboard";
    require_once "includes/header.php";
    ?>

    <article class="php_messag">
        <?php if (isset($_SESSION['success'])): ?>
            <div class="php_bad" id="flash_message" style="color: rgb(4, 255, 0);"><?= htmlspecialchars($_SESSION['success']) ?></div>
            <?php unset($_SESSION['success']); ?>
        <?php endif; ?>
    </article>

    <main class="dash_main px-6 py-6">
        <div class="flex justify-between ">

            <div class="My_themes">
                <input type="text" name="" id="">
            </div>

            <div class="add_theme" style="margin-top: 10px;">
                <a href="themes.php"
                    class="flex items-center gap-2 text-white font-medium bg-green-600 hover:bg-green-800 transition p-2 rounded" style="border-radius: 10px; padding: 10px;">
                    <img src="IMG/add_14360946.png" alt="" width="20px">
                    Add New Theme
                </a>
            </div>
        </div>
        <div class="flex justify-center ">
            <div class="modal">
                <div class="modal_log" >
                    <h1>Digital Garden</h1>
                    <div>
                        Create themes, organize your thoughts, and start building ideas that grow over time. Add notes, connect concepts, and manage your projects in a calm and structured space. Everything you need to stay focused and productive is right here.
                    </div>
                </div>
                <div>
                    <img src="./IMG/Gemini_Generated_Image_69qsfj69qsfj69qs.png" alt="">
                </div>
            </div>
        </div>
    </main>


    <?php require_once "includes/footer.php" ?>
    <script src="public/dashboard.js"></script>
</body>

</html>