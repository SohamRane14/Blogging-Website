<h2> <?= $title ?> </h2>

<?= validation_errors('<div class="alert alert-warning">', '</div>'); ?>

<?= form_open('categories/create') ?>
    <div class="form-group">
        <label for="name">Name</label>
        <input class="form-control"
            id="name"
            type="text"
            name="name"
            class="form-control">
    </div>

    <br>

    <input type="submit" class="btn btn-primary">
</form>