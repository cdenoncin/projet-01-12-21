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
                <a class="text-white hover:text-yellow" href="/">Home</a>
            </li>

            <?php if ($isUserConnected) { ?>
                <li class="mr-6">
                    <a class="text-white hover:text-yellow" href="/writearticle">Write article</a>
                </li>
                <li class="mr-6">
                    <a class="text-white hover:text-yellow" href="/api/posts">Posts API</a>
                </li>
                <li class="mr-6">
                    <a class="text-white hover:text-yellow" href="/api/comments">Comments API</a>
                </li>
                <li class="mr-6">
                    <a class="text-white hover:text-yellow" href="/userlist">User list</a>
                </li>
            <?php } ?>
        </ul>
        <div class="flex">
            <input class="mr-4 searchbar" type="text" id="searchbar" name="searchbar" placeholder="Search..."/>


            <?php if (!$isUserConnected) { ?>
                <a class="ml-4 px-4 py-2 bg-yellow-200"
                   href="/login">
                    Login
                </a>
            <?php } else { ?>
                <a class="px-4 py-2 border-solid border-2 border-white text-white"
                   href="/admin">
                    Account
                </a>
                <a class="ml-4 px-4 py-2 bg-red-200"
                   href="/logout">
                    Logout
                </a>
            <?php } ?>
        </div>
</header>
<?= $content ?>
</body>
</html>
