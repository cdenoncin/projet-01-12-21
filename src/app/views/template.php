<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/assets/tailwind.css" rel="stylesheet">
    <link href="/assets/style.css" rel="stylesheet">
    <title><?= $title ?></title>
</head>
<body>
<header>
        <div class="menu flex justify-between items-center flex-wrap">
            <ul class="flex">
                <li class="mr-6">
                    <a class="text-white hover:text-yellow" href="#">Home</a>
                </li>
                <li class="mr-6">
                    <a class="text-white hover:text-yellow" href="#">Write article</a>
                </li>
                <li class="mr-6">
                    <a class="text-white hover:text-yellow" href="#">Post API</a>
                </li>
                <li class="mr-6">
                    <a class="text-white hover:text-yellow" href="#">Comments API</a>
                </li>
                <li class="mr-6">
                    <a class="text-white hover:text-yellow" href="#">User list</a>
                </li>
            </ul>
            <div class="flex">
                <input class="mr-4 searchbar" type="text" id="searchbar" name="searchbar" placeholder="Search..." />

                <button class="px-4 py-2 border-solid border-2 border-white text-white"
                        type="button">
                    Admin
                </button>
                <button class="ml-4 px-4 py-2 bg-yellow-200"
                        type="button">
                    Logout
                </button>
            </div>
    </header>
<?= $content ?>
</body>
</html>
