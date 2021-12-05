<?php $article = $args["article"] ?>

<div class="update-article-section p-16 flex flex-col items-center">
    <section class="update-article bg-gray-100 p-6 w-1/2 flex flex-col">
        <h3 class="text-xl font-bold mb-4">Modifier mon article</h3>
        <div class="update-article-item p-6 bg-white">
            <form action="/result-updatearticle/<?= $article->getId()?>" method="POST" enctype="multipart/form-data">
                <div class="update-article-item flex flex-col mb-4">
                    <label for="title" class="mb-2">Titre</label>
                    <input type="text" id="title" name="title" value="<?= $article->getTitle()?>" />
                </div>
                <div class="update-article-item flex flex-col mb-4">
                    <label for="content" class="mb-2">Contenu de l'article / Description</label>
                    <textarea id="content" name="content" rows="5" cols="20"><?= $article->getContent()?></textarea>
                </div>

                <div class="update-article-item flex flex-col">
                    <label for="image" class="mb-2">Image de l'article</label>
                    <input  class="bg-white" type="file" id="image" name="thumbnail">
                </div>

                <button class="px-4 py-2 bg-blue-200 mt-6" type="submit">
                    Update article
                </button>
            </form>
        </div>
    </section>
</div>
