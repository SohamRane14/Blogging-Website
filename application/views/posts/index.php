<h1 class="pt-2">
<?= $title ?>
</h1>

<?php foreach($posts as $post) : ?>
    <article>
    <h3 class="mt-4"> <?= $post['title'] ?> </h3>
    
    <span class="d-block bg-light text-secondary"> posted on : 
        <time datetime="<?= $post['created_at'] ?>">      
            <?= $post['created_at'] ?> 
        </time> in <strong><?= $post['name'] ?></strong>
    </span>

    <br/>

    <p> 
        <?=word_limiter($post['body'], 60); ?>
        <br>
        <a class="btn-link" href="<?= base_url('posts/'. $post['slug']) ?>" class="btn">read more...</a>
    </p>
</article>

<?php endforeach ?>
<div class="text-center">
    <?= $this->pagination->create_links() ?>
</div>