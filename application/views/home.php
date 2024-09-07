<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Home Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .home-container {
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 300px;
            text-align: center;
        }
        .home-container h2 {
            margin-bottom: 20px;
        }
        .home-container form {
            margin-top: 20px;
        }
        .home-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #d9534f;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="home-container">
        <h2>Welcome, <?php echo $this->session->userdata('username'); ?>!</h2>
        <form action="<?php echo site_url('login/logout'); ?>" method="post">
            <input type="submit" value="Log Out">
        </form>
    </div>
</body>
</html>
