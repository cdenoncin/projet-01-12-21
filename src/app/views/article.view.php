<!--
<div class="article-section p-16 flex flex-col items-center">
    <section class="article bg-gray-100 p-6 w-1/2">
        <h2 class="text-3xl font-bold mb-4"></h2>
        <p class="mb-1">Écrit par : <span class="italic">Jean Pierre</span></p>
        <p class="mb-6">Le <span class="italic">01/12/21</span> à <span class="italic">11:17</span></p>
        <img src="https://images.unsplash.com/photo-1508013861974-9f6347163ebe?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1176&q=80"
            alt="Mon image" class="w-full mb-6">
        <p>Voici un super article</p>
        <button class="px-4 py-2 bg-red-200 mt-6" type="submit">
            Delete article
        </button>
        <button class="ml-3 px-4 py-2 bg-yellow-200 mt-6" type="submit">
            Update article
        </button>
    </section>

    <section class="comments bg-gray-100 p-6 w-1/2">
        <h3 class="text-xl font-bold mb-4">Les commentaires</h3>
        <div class="comments-item p-6 bg-white">
            <p class="mb-1">Écrit par : <span class="italic">Jean Pierre</span></p>
            <p class="mb-6">Le <span class="italic">01/12/21</span> à <span class="italic">11:17</span></p>
            <p>Voici un très joli commentaire !</p>
            <button class="px-4 py-2 bg-red-200 mt-6" type="submit">
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

                <button class="px-4 py-2 bg-blue-200 mt-6" type="submit">
                    Post comment
                </button>
            </form>
        </div>
    </section>
</div>
-->

<?php $article = $args["articles"] ?>
<div class="article-section p-16 flex flex-col items-center">
    <section class="article bg-gray-100 p-6 w-1/2">
        <h2 class="text-3xl font-bold mb-4"><?= $article->getTitle()?></h2>
        <p class="mb-1">Écrit par : <span class="italic"><?= $article->getAuthorId()?></span></p>
        <p class="mb-6">Le <span class="italic"><?= $article->getPublicationDate()?></span> à <span
                class="italic"><?= $article->getPublicationDate()?></span></p>
        <img src="<?= $article->getThumbnailUrl()?>" alt="Mon image" class="w-full mb-6">
        <p><?= $article->getContent()?></p>
        <button class="px-4 py-2 bg-red-200 mt-6" type="submit">
            Delete article
        </button>
        <button class="ml-3 px-4 py-2 bg-yellow-200 mt-6" type="submit">
            Update article
        </button>
    </section>

    <section class="comments bg-gray-100 p-6 w-1/2">
        <h3 class="text-xl font-bold mb-4">Les commentaires</h3>
        <div class="comments-item p-6 bg-white">
            <p class="mb-1">Écrit par : <span class="italic"><?= $article->getAuthorId()?></span></p>
            <p class="mb-6">Le <span class="italic"><?= $args["comment-date"]?></span> à <span
                    class="italic"><?= $args["comment-time"]?></span></p>
            <p><?= $article->getContent()?></p>
            <button class="px-4 py-2 bg-red-200 mt-6" type="submit">
                Delete comment
            </button>
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

                <button class="px-4 py-2 bg-blue-200 mt-6" type="submit">
                    Post comment
                </button>
            </form>
        </div>
    </section>
</div>