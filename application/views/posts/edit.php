<h2><?= $title ?> </h2>
<?= validation_errors('<div class="alert alert-warning">', '</div>'); ?>

<?= form_open('posts/update')?>  
  <input type="hidden" name="id" value="<?= $post['id']?>"/>
  <div class="form-group">
    <label for="title">Title</label>
    <input name="title" 
           type="text" 
           class="form-control" 
           id="title" 
           value="<?= $post['title'] ?>" 
           placeholder="Add Title" 
           required>
  </div>

  <div class="form-group">
    <label for="body">Body</label>
    <textarea 
           name="body" 
           class="form-control" 
           id="editor" 
           placeholder="Add Body" 
           required>
        <?= $post['body'] ?>
    </textarea>
  </div>

  <br>
  <!-- <?php var_dump($post); ?> -->
  <button type="submit" class="btn btn-primary">Submit</button>

  <div class="form-group">
    <label for="category">Category</label>
    <select class="form-control" name="category_id" id="category_id">
      <?php foreach($categories as $category):?>
          <option value="<?= $category['id'] ?>" <?= $category['id'] === $post['category_id']? 'selected' : '' ?> >
          <?= $category['name'] ?>
        </option>
      <?php endforeach ?>
    </select>
  </div>

</form>
<script src="<?= base_url('assets/js/ckeditor/ckeditor.js') ?>"></script>
<script>
  ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
</script>
