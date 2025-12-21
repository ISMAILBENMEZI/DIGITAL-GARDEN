<?php
$page = 'dashboard';
include "includes/auth.php";

session_start();
if (!isset($_SESSION['username'])) {
    header("location: includes/auth.php?logout=1");
    exit();
}

$themes = affichaeTheTheme($conn);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="public/output.css">
    <style>
        .My_themes {
            background: #fff;
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            min-width: 280px;
            max-width: 400px;
            flex: 1;
            height: 100vh;
            overflow-y: auto;
        }

        .My_themes h2 {
            color: #58628d;
            margin-bottom: 20px;
            font-size: 24px;
            text-align: center;
        }

        .add_theme_btn {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 5px;
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #00FF00 0%, #025904 100%);
            color: white;
            border: none;
            border-radius: 20px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            margin-bottom: 20px;
            transition: all 0.3s;
        }

        .add_theme_btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 20px rgba(6, 99, 6, 0.4);
        }

        .the_myThemes {
            max-width: 600px;
        }

        .card-body {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .card-title {
            font-size: 17px;
            font-weight: 700;
            color: #374151;
            text-transform: capitalize;
        }

        .theme {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            padding: 15px;
            border-radius: 12px;
            margin-bottom: 12px;
            transition: all 0.3s;
            position: relative;
        }

        .theme:hover {
            transform: translateX(5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .theme .buttons {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
        }

        .theme input[type="submit"][value="modify"],
        .theme input[type="submit"][value="delete"],
        .theme input[type="submit"][value="View Note"] {
            background-color: #2563eb;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .theme input[type="submit"][value="delete"] {
            background-color: #FF0000;
        }

        .theme input[type="submit"][value="View Note"] {
            background-color: #8800FF;
        }

        .Add_Note_btn {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 5px;
            background: linear-gradient(135deg, #00FF00 0%, #025904 100%);
            color: white;
            font-size: 14px;
            font-weight: 500;
            font-weight: bold;
            transition: all 0.3s;
            padding: 7px;
            border-radius: 10px;
        }
    </style>
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
        <!-- 
            <div class="flex justify-center">
                <div class="modal">
                    <div class="modal_log">
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
        -->

        <aside class="My_themes">
            <h2>
                My Theme
            </h2>
            <a href="themes.php" class="add_theme_btn">
                <img src="IMG/add_14360946.png" alt="" width="20px">
                Add New Theme
            </a>
            <div class="the_myThemes">
                <?php if (empty($themes)): ?>
                    <div class="flex justify-center items-center h-32 bg-gray-100 rounded-lg shadow-md">
                        <p class="text-gray-500 text-lg font-medium">No themes present so far!</p>
                    </div>
                <?php endif ?>
                <?php foreach ($themes as $theme): ?>
                    <div class="theme" style="background: linear-gradient(135deg, #fff 0%, <?= $theme['Color'] ?> 100%);">
                        <div class="card-body">
                            <h5 class="card-title text-black">Title:<?= $theme['Title'] ?></h5>
                            <form method="post" action="">
                                <input name="id" value="<?= $theme['id'] ?>" type="hidden" />
                                <input value="View Note" name="action" type="submit" />
                            </form>
                        </div>
                        <div class="buttons">
                            <form method="post" action="includes/auth.php">
                                <input name="id" value="<?= $theme['id'] ?>" type="hidden" />
                                <input value="modify" name="modify" type="submit" />
                            </form>

                            <form method="post" action="includes/auth.php">
                                <input name="id" value="<?= $theme['id'] ?>" type="hidden" />
                                <input value="delete" name="delete" type="submit" />
                            </form>

                            <div><a href="#?<?= $theme['id'] ?>" class="Add_Note_btn"><img src="IMG/add_14360946.png" alt="" width="20px">Add New Note</a></div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </aside>
    </main>


    <?php require_once "includes/footer.php" ?>
    <script src="public/dashboard.js"></script>
</body>

</html>