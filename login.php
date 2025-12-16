<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="public/output.css">
</head>

<body>
    <?php require_once "includes/header.php" ?>
    <article class="messag">
        <div class="good" id="good"></div>
        <div class="bad" id="bad"></div>
    </article>
    <main class="min-h-screen flex items-center justify-center bg-white">
        <div class="w-full max-w-md p-8 border border-green-200 rounded-2xl shadow-sm">

            <h1 class="text-2xl font-semibold text-green-700 text-center mb-6">
                Log in
            </h1>

            <form class="space-y-4" id="from">

                <div>
                    <label class="block text-green-700 mb-1">Email</label>
                    <input type="email" id="email" name="email"
                        class="w-full px-4 py-2 border border-green-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>

                <div>
                    <label class="block text-green-700 mb-1">Password</label>
                    <input type="password" id="password" name="password"
                        class="w-full px-4 py-2 border border-green-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>

                <input type="submit" value="submit"
                    class="w-full mt-4 bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 transition duration-200 cursor-pointer">
            </form>
        </div>
    </main>

    <?php require_once "includes/footer.php" ?>
    <script src="public/login.js"></script>
</body>

</html>