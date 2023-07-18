<?= validation_errors('<div class="alert alert-warning">', '</div>'); ?>

<?= form_open('users/register') ?>
<div class="row">
    <div class="col-md-4 col-md-offset-4 m-auto">
        <h2 class="text-center"> 
            <?= $title ?>
        </h2>

        <div class="form-group">
            <label for="username">Name</label>
            <input id="name" name="name" type="text" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="username">Username</label>
            <input id="username" name="username" type="text" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="zipcode">Zipcode</label>
            <input name="zipcode" id="zipcode" type="text" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input name="email" id="email" type="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="password">password</label>
            <input type="password" name="password" id="password" type="text" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="password2">Confirm password</label>
            <input type="password" name="password2" id="password2" type="text" class="form-control" required>
        </div>

        <br>
        <div class="d-grid gap-2">
            <input type="submit" class="btn btn-primary">
            </div>
    </div>
</div>

</form>