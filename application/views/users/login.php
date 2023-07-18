<?= form_open('users/login') ?>
    <div class="row">
        <div class="col-md-4 col-md-offset-4 m-auto">
            <h1 class="text-center">
                <?= $title ?>
            </h1>

            <div class="form-group">
                <label for="username">Username</label>
                <input 
                    type="text"
                    id="username" 
                    name="username" 
                    class="form-control" 
                    placeholder="Enter Username"
                    required 
                    autofocus>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input 
                    type="password"
                    id="password"
                    name="password" 
                    class="form-control" 
                    placeholder="Enter Password"
                    required>
            </div>
            <br>
            <div class="d-grid gap-2">
            <input type="submit" class="btn btn-primary">
            </div>
        </div>
    </div>

</form>