<div class="add-article-section p-16 flex flex-col items-center">
    <section class="add-article bg-gray-100 p-6 w-1/2 flex flex-col">
        <h3 class="text-xl font-bold mb-4">Écrire un article</h3>
        <div class="add-article-item p-6 bg-white">
            <form method="POST" action="createarticle" enctype="multipart/form-data">
                <div class="add-article-item flex flex-col mb-4">
                    <label for="title" class="mb-2">Titre</label>
                    <input required="required" type="text" id="title" name="title" />
                </div>
                <div class="add-article-item flex flex-col mb-4">
                    <label for="content" class="mb-2">Contenu de l'article / Description</label>
                    <textarea required="required" id="content" name="content" rows="20" cols="20"></textarea>
                </div>

                <div class="add-article-item flex flex-col">
                    <label for="image" class="mb-2">Image de l'article</label>
                    <input required="required" class="bg-white" type="file" id="image" name="thumbnail">
                </div>

                <button class="px-4 py-2 bg-blue-200 mt-6" type="submit">
                    Post article
                </button>
            </form>
        </div>
    </section>
</div>
