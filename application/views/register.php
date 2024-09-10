<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fc;
        }
        .card {
            margin-top: 20px;
        }
        .logo {
            text-align: center;
            margin-top: 50px;
            margin-bottom: -20px;
        }
        .logo img {
            width: 50px;
            height: 50px;
        }
        .logo div {
            font-size: 24px;
            font-weight: bold;
            color: #4e73df;
            margin-top: 10px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="logo">
                <img src="<?= base_url('assets/img/inventory.png'); ?>" alt="Logo">
            </div>
            <br>
            <div class="card shadow">
                <div class="card-header text-center">
                    <h4>Register</h4>
                </div>
                <div class="card-body">
                    <?= validation_errors('<div class="alert alert-danger">', '</div>'); ?>

                    <?= form_open('register'); ?>
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="password_confirm">Confirm Password:</label>
                            <input type="password" class="form-control" name="password_confirm" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    <?= form_close(); ?>
                </div>
                <div class="card-footer text-center">
                    <p>Already have an account? <a href="<?= site_url('login'); ?>">Login here</a>.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
