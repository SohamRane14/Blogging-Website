<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/css/flatify/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <link rel="shortcut icon" href="<?= base_url('assets/favicon.ico') ?>" type="image/x-icon">
    <title>Blog</title>
</head>
<body>
    <nav class="navbar navbar-dark navbar-expand-lg bg-primary">
        <div class="container">
            <a href="<?= base_url() ?>" class="navbar-brand">Blog</a>

            <div id="navbar" class="navbar-collapse"> 
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="<?= base_url() ?>" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('about') ?>" class="nav-link">About</a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= base_url('posts') ?>" class="nav-link">Posts </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= base_url('categories') ?>" class="nav-link">Categories </a>
                    </li>
                </ul>


                <ul class="navbar-nav ms-auto">
                    <?php if(! $this->session->userdata('logged_in')): ?>
                    <li class="nav-item">
                        <a href="<?= base_url('users/login')?>" class="btn btn-primary">Login</a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= base_url('users/register')?>" class="btn btn-primary">Register</a>
                    </li>
                    <?php endif ?>

                    <?php if($this->session->userdata('logged_in')): ?>
                    <li class="nav-item">
                        <a href="<?= base_url('posts/create')?>" class="btn btn-primary">Create Post</a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= base_url('categories/create')?>" class="btn btn-primary">Create Category</a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= base_url('users/logout')?>" class="btn btn-primary">Logout</a>
                    </li>
                    <?php endif ?>
                </ul>

            </div>
        </div>
    </nav>
    
    <div class="container">

    <!-- FLASH MESSAGE -->
    <?php 
    $flashes = [
        'user_registered', 
        'post_created',
        'post_updated',
        'category_created',
        'category_deleted',
        'post_deleted',
        'user_logged_in',
        'user_logged_out',
        'login_fail',
    ];

    foreach($flashes as $flash){
        if($this->session->flashdata($flash)){
            echo <<<END
            <p class="alert alert-success">
            {$this->session->flashdata($flash)}
            </p>
            END;

            unset($_SESSION[$flash]);
        }

    }
    
    ?>