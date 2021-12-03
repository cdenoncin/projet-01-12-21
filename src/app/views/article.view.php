<?php $article = $args["articles"] ?>
<?php 

$postDate = $article->getPublicationDate(); 
$sqldate=date('d/m/Y',strtotime($postDate)); 

?>
<div class="article-section p-16 flex flex-col items-center">
    <section class="article bg-gray-100 p-6 w-1/2">
        <h2 class="text-3xl font-bold mb-4"><?= $article->getTitle()?></h2>
        <p class="mb-1">Écrit par : <span class="italic"><?= $article->getAuthor()->getFirstName()?> <?= $article->getAuthor()->getLastName()?></span></p>
        <p class="mb-6">Le <span class="italic"><?= $sqldate ?></span></p>
        <img src="<?= $article->getThumbnailUrl()?>" alt="Mon image" class="w-full mb-6">
        <p><?= $article->getContent()?></p>
        <!-- TODO : Dynamiser le bouton delete / Le bouton doit supprimer la ligne de la bdd -->
        <button class="px-4 py-2 bg-red-200 mt-6" type="submit">
            Delete article
        </button>
        <!-- TODO : Dynamiser le bouton update / Le bouton doit éditer la ligne de la bdd / Ramener vers la view updatearticle-->
        <button class="ml-3 px-4 py-2 bg-yellow-200 mt-6" type="submit">
            Update article
        </button>
    </section>

    <section class="comments bg-gray-100 p-6 w-1/2">
        <h3 class="text-xl font-bold mb-4">Les commentaires</h3>
        <?php foreach( $args["comments"] as $comment ) { ?>
        <div class="comments-item p-6 bg-white">
            <p class="mb-1">Écrit par : <span class="italic"><?= $comment->getAuthor()->getFirstName() ?> <?= $comment->getAuthor()->getLastName() ?></span></p>
            <p><?= $comment->getContent()?></p>
            <!-- TODO : Dynamiser le bouton delete / Le bouton doit supprimer la ligne de la bdd -->
            <button class="px-4 py-2 bg-red-200 mt-6" type="submit">
                Delete comment
            </button>
        </div>
        <?php } ?>
    </section>

    <section class="add-comments bg-gray-100 p-6 w-1/2 flex flex-col">
        <h3 class="text-xl font-bold mb-4">Écrire un commentaire</h3>
        <div class="comments-item p-6 bg-white">
            <form>
                <div class="add-comments-item flex flex-col mb-4">
                    <!-- TODO : Dynamiser les auteurs / commentaires à ajouter : si log prend automatiquement le nom du user, sinon renvoie à la page de login -->
                    <label for="author" class="mb-2">Auteur</label>
                    <input type="text" id="author" name="author" />
                </div>
                <div class="add-comments-item flex flex-col">
                    <label for="comment" class="mb-2">Commentaire</label>
                    <textarea id="comment" name="comment" rows="4" cols="20"></textarea>
                </div>
                <!-- TODO : Dynamiser le bouton post / Le bouton doit ajouter la ligne dans la bdd -->
                <button class="px-4 py-2 bg-blue-200 mt-6" type="submit">
                    Post comment
                </button>
            </form>
        </div>
    </section>
</div>