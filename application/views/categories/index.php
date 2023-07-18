<h1> <?= $title ?> </h1>

<ul class="list-group">
<?php foreach($categories as $category): ?>
    <li class="list-group-item">
        <a href="<?= 'categories/posts/'.$category['id']?>" >
            <?= $category['name'] ?>
        </a>

        <?php if($this->session->userdata('user_id') == $category['user_id']): ?>
            <?= form_open('categories/delete/' . $category['id'], ["class" => "d-inline ms-2"])  ?>
                <input type="submit" class="btn btn-danger" value="[X]">
            </form>
        <?php endif ?>
    </li>

<?php endforeach ?>
</ul>