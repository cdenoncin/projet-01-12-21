<div class="extract-section p-16 flex flex-col items-center">
    <h1 class="text-3xl font-bold mb-4">Home Page</h1>
    <section class="extract bg-gray-100 p-6 w-1/2">
        <?php foreach( $args["articles"] as $article ) { ?>
        var_dump($article);
        <div class="extract-item bg-white border-solid border-black p-4 mb-6">
            <h2 class="text-xl font-bold mb-4"><?= $article->getTitle()?></h2>
            <p><?= $article->getContent()?></p>
            <button class="px-4 py-2 bg-blue-200 mt-6" type="button">
                Read more
            </button>
        </div>
        <?php } ?>
    </section>
</div>