<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/tailwind.css" rel="stylesheet">
    <link href="src/assets/style.css" rel="stylesheet">
    <title>Projet intermédiaire</title>
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

    <div class="article-section p-16 flex flex-col items-center">
        <section class="article bg-gray-100 p-6 w-1/2">
            <h2 class="text-3xl font-bold mb-4">Un article avec une image</h2>
            <p class="mb-1">Écrit par : <span class="italic">Jean Pierre</span></p>
            <p class="mb-6">Le <span class="italic">01/12/21</span> à <span class="italic">11:17</span></p>
            <img src="https://images.unsplash.com/photo-1508013861974-9f6347163ebe?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1176&q=80"
                alt="Mon image" class="w-full mb-6">
            <p>Voici un super article</p>
            <button class="px-4 py-2 bg-red-200 mt-6"
                    type="submit">
                Delete article
            </button>
            <button class="ml-3 px-4 py-2 bg-yellow-200 mt-6"
                    type="submit">
                Update article
            </button>
        </section>

        <section class="comments bg-gray-100 p-6 w-1/2">
            <h3 class="text-xl font-bold mb-4">Les commentaires</h3>
            <div class="comments-item p-6 bg-white">
                <p class="mb-1">Écrit par : <span class="italic">Jean Pierre</span></p>
                <p class="mb-6">Le <span class="italic">01/12/21</span> à <span class="italic">11:17</span></p>
                <p>Voici un très joli commentaire !</p>
                <button class="px-4 py-2 bg-red-200 mt-6"
                        type="submit">
                    Delete comment
                </button>
            </div>
        </section>

        <section class="add-comments bg-gray-100 p-6 w-1/2 flex flex-col">
            <h3 class="text-xl font-bold mb-4">Écrire un commentaire</h3>
            <div class="comments-item p-6 bg-white">
                <form>
                    <div class="add-comments-item flex flex-col mb-4">
                        <label for="author" class="mb-2">Auteur</label>
                        <input type="text" id="author" name="author" />
                    </div>
                    <div class="add-comments-item flex flex-col">
                        <label for="comment" class="mb-2">Commentaire</label>
                        <textarea id="comment" name="comment" rows="4" cols="20"></textarea>
                    </div>
                    
                    <button class="px-4 py-2 bg-blue-200 mt-6"
                            type="submit">
                        Post comment
                    </button>
                </form>
            </div>
        </section>
    </div>

    <div class="add-article-section p-16 flex flex-col items-center">
        <section class="add-article bg-gray-100 p-6 w-1/2 flex flex-col">
            <h3 class="text-xl font-bold mb-4">Écrire un article</h3>
            <div class="add-article-item p-6 bg-white">
                <form>
                    <div class="add-comments-item flex flex-col mb-4">
                        <label for="title" class="mb-2">Titre</label>
                        <input type="text" id="title" name="title" />
                    </div>
                    <div class="add-comments-item flex flex-col mb-4">
                        <label for="content" class="mb-2">Contenu de l'article / Description</label>
                        <textarea id="content" name="content" rows="5" cols="20"></textarea>
                    </div>
                    
                    <div class="add-comments-item flex flex-col">
                        <label for="image" class="mb-2">Image de l'article</label>
                        <input class="bg-white" type="file" id="image" name="image">
                    </div>
                    
                    <button class="px-4 py-2 bg-blue-200 mt-6"
                            type="sumbit">
                        Post article
                    </button>
                </form>
            </div>
        </section>
    </div>

    <div class="extract-section p-16 flex flex-col items-center">
        <h1 class="text-3xl font-bold mb-4">Home Page</h1>
        <section class="extract bg-gray-100 p-6 w-1/2">
            <div class="extract-item bg-white border-solid border-black p-4 mb-6">
                <h2 class="text-xl font-bold mb-4">Titre de mon article</h2>
                <p>Voici un très joli article, où vous pouvez découvrir beaucoup de nouvelles choses...</p>
                <button class="px-4 py-2 bg-blue-200 mt-6"
                    type="button">
                Read more
                </button>
            </div>
            <div class="extract-item bg-white border-solid border-black p-4 mb-6">
                <h2 class="text-xl font-bold mb-4">Titre de mon article</h2>
                <p>Voici un très joli article, où vous pouvez découvrir beaucoup de nouvelles choses...</p>
                <button class="px-4 py-2 bg-blue-200 mt-6"
                    type="button">
                Read more
                </button>
            </div>
            <div class="extract-item bg-white border-solid border-black p-4">
                <h2 class="text-xl font-bold mb-4">Titre de mon article</h2>
                <p>Voici un très joli article, où vous pouvez découvrir beaucoup de nouvelles choses...</p>
                <button class="px-4 py-2 bg-blue-200 mt-6"
                    type="button">
                Read more
                </button>
            </div>
        </section>
    </div>

    <div class="admin-section p-16">
        <h1 class="text-3xl font-bold mb-4">Admin Page</h1>
        <section class="w-full">
            <ul class="admin-list">
                <li class="flex justify-between font-bold">
                    <p class="flex-1">First Name</p>
                    <p class="flex-1">Last Name</p>
                    <p class="flex-1">Email</p>
                    <p class="flex-1">Is Admin</p>
                    <p class="flex-1">Action</p>
                </li>
                <li class="flex justify-between">
                    <p class="w-1/5">MyFirstName</p>
                    <p class="w-1/5">MyLastName</p>
                    <p class="w-1/5">MyEmail</p>
                    <div class="w-1/5">
                        <input type="checkbox" id="isadmin" name="isadmin" checked>
                    </div>
                    <a href="" class="w-1/5 underline">Delete user</a>
                </li>
                <li class="flex justify-between">
                    <p class="w-1/5">First Name</p>
                    <p class="w-1/5">Last Name</p>
                    <p class="w-1/5">Email</p>
                    <div class="w-1/5">
                        <input type="checkbox" id="isadmin" name="isadmin">
                    </div>
                    <a href="" class="w-1/5 underline">Delete user</a>
                </li>
                <li class="flex justify-between">
                    <p class="w-1/5">MyFirstName</p>
                    <p class="w-1/5">MyLastName</p>
                    <p class="w-1/5">MyEmail</p>
                    <div class="w-1/5">
                        <input type="checkbox" id="isadmin" name="isadmin">
                    </div>
                    <a href="" class="w-1/5 underline">Delete user</a>
                </li>
            </ul>
        </section>
    </div>

    <div class="account-section p-16 flex flex-col items-center">
        <h1 class="text-3xl font-bold mb-4">My account</h1>
        <section class="account bg-gray-100 p-6 w-1/2">
            <form action="" class="bg-white p-4">
                <div class="add-comments-item flex flex-col mb-4">
                    <label for="firstname" class="mb-2">First Name</label>
                    <input type="text" id="firstname" name="firstname" />
                </div>
                <div class="add-comments-item flex flex-col mb-4">
                    <label for="lastname" class="mb-2">Last Name</label>
                    <input type="text" id="lastname" name="lastname" />
                </div>
                <div class="add-comments-item flex flex-col mb-4">
                    <label for="email" class="mb-2">Email</label>
                    <input type="text" id="email" name="email" />
                </div>
                <div class="add-comments-item flex flex-col mb-4">
                    <label for="isadmin" class="mb-2">Is Admin ?</label>
                    <input type="checkbox" id="isadmin" name="isadmin">
                </div>
                <div class="add-comments-item flex flex-col mb-4">
                    <label for="password" class="mb-2">Password</label>
                    <input type="password" id="password" name="password" />
                </div>
                <div class="add-comments-item flex flex-col mb-4">
                    <label for="passwordverified" class="mb-2">Verify Password</label>
                    <input type="password" id="passwordverified" name="passwordverified" />
                </div>
            </form>
            <button class="px-4 py-2 bg-blue-200 mt-6"
                type="submit">
            Update infos
            </button>
        </section>
    </div>

</body>

</html>