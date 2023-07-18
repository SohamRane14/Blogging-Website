<h2>
    <?= $post['title'] ?>
</h2>
<span class="d-block bg-light text-secondary"> posted on : 
        <time datetime="<?= $post['created_at'] ?>">      
            <?= $post['created_at'] ?> 
        </time>
</span>

<main>
    <?= $post['body'] ?>
</main>

<?php if($this->session->userdata('user_id') == $post['user_id']): ?>
<hr>
<a class="btn btn-secondary" href="edit/<?= $post['slug'] ?>"> Edit </a>

<form action='<?= "delete/$post[id]" ?>' method="POST" class="d-inline">
    <button class="btn btn-danger float-right">Delete</button>
</form>
<?php endif ?>
<h3>Comments</h3>

<?php if($comments) :?>
    <?php foreach($comments as $comment) :?> 
    <div class="card card-body">
        <p> 
        <?= $comment['body'] ?> 
        </p>

        <strong> [ by  <?= $comment['name'] ?> ] </strong>
    </div>
    <?php endforeach ?>
<?php else: ?>
    <p>No comments to display</p>
<?php endif ?>
<hr>

<h3>Add Comment</h3>

<?= validation_errors('<div class="alert alert-warning">', '</div>'); ?>

<?= form_open('comments/create/'.$post['id']) ?>
    <div class="form-group">
        <label for="name">Name</label>
        <input name="name" type="text" class="form-control">
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input name="email" type="text" class="form-control">
    </div>

    <div class="form-group">
        <label for="body">Body</label>
        <textarea name="body" id="body" class="form-control"></textarea>
    </div>

    <input type="hidden" name="slug" value="<?= $post['slug'] ?>">
    <br>
    <input type="submit" class="btn btn-primary">
</form>