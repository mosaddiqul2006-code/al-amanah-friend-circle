<?php
session_start();

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = trim($_POST["username"] ?? "");
    $password = $_POST["password"] ?? "";

    /*
     * Demo login
     * পরে Database-এর সাথে যুক্ত করা হবে।
     */
    $users = [
        "president" => [
            "password" => "123456",
            "name" => "President",
            "role" => "President"
        ],
        "secretary" => [
            "password" => "123456",
            "name" => "Secretary",
            "role" => "Secretary"
        ],
        "ict" => [
            "password" => "123456",
            "name" => "ICT Executive",
            "role" => "ICT Executive"
        ],
        "cashier" => [
            "password" => "123456",
            "name" => "Cashier",
            "role" => "Cashier"
        ]
    ];

    if (
        isset($users[$username]) &&
        $users[$username]["password"] === $password
    ) {

        $_SESSION["logged_in"] = true;
        $_SESSION["username"] = $username;
        $_SESSION["name"] = $users[$username]["name"];
        $_SESSION["role"] = $users[$username]["role"];

        header("Location: dashboard.php");
        exit;

    } else {
        $error = "Username অথবা Password ভুল!";
    }
}
?>

<!DOCTYPE html>
<html lang="bn">

<head>

<meta charset="UTF-8">

<meta name="viewport"
      content="width=device-width, initial-scale=1.0">

<title>Al Amanah Friend Circle</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    min-height:100vh;
    display:flex;
    align-items:center;
    justify-content:center;
    padding:20px;

    font-family:
        Arial,
        "Noto Sans Bengali",
        sans-serif;

    background:
        linear-gradient(
            135deg,
            #06172b,
            #0b3157,
            #071b32
        );
}

.login-container{
    width:100%;
    max-width:420px;

    background:#ffffff;

    border-radius:25px;

    padding:35px 25px;

    box-shadow:
        0 20px 60px
        rgba(0,0,0,.35);
}

.logo{
    width:85px;
    height:85px;

    margin:0 auto 18px;

    border-radius:50%;

    display:flex;
    align-items:center;
    justify-content:center;

    background:
        linear-gradient(
            135deg,
            #d4af37,
            #f6dc78
        );

    color:#09213d;

    font-size:38px;
    font-weight:bold;

    box-shadow:
        0 8px 20px
        rgba(0,0,0,.20);
}

h1{
    text-align:center;

    color:#09213d;

    font-size:25px;

    margin-bottom:8px;
}

.subtitle{
    text-align:center;

    color:#777;

    font-size:14px;

    margin-bottom:28px;
}

.error{
    background:#ffe5e5;

    color:#c62828;

    padding:12px;

    border-radius:10px;

    text-align:center;

    margin-bottom:18px;

    font-size:14px;
}

.input-group{
    margin-bottom:18px;
}

label{
    display:block;

    margin-bottom:7px;

    color:#09213d;

    font-weight:bold;

    font-size:14px;
}

input{
    width:100%;

    padding:14px;

    border:1px solid #ddd;

    border-radius:12px;

    outline:none;

    font-size:15px;

    transition:.2s;
}

input:focus{
    border-color:#d4af37;

    box-shadow:
        0 0 0 3px
        rgba(212,175,55,.15);
}

.login-btn{
    width:100%;

    padding:15px;

    border:0;

    border-radius:12px;

    background:
        linear-gradient(
            135deg,
            #09213d,
            #0d4b7a
        );

    color:white;

    font-size:16px;

    font-weight:bold;

    cursor:pointer;

    transition:.2s;
}

.login-btn:active{
    transform:scale(.98);
}

.footer{
    text-align:center;

    margin-top:25px;

    color:#999;

    font-size:12px;
}

</style>

</head>

<body>

<div class="login-container">

    <div class="logo">
        A
    </div>

    <h1>
        Al Amanah Friend Circle
    </h1>

    <div class="subtitle">
        Management System
    </div>

    <?php if ($error != ""): ?>

        <div class="error">
            <?= htmlspecialchars($error) ?>
        </div>

    <?php endif; ?>

    <form method="POST">

        <div class="input-group">

            <label>
                Username
            </label>

            <input
                type="text"
                name="username"
                placeholder="Username লিখুন"
                autocomplete="username"
                required
            >

        </div>


        <div class="input-group">

            <label>
                Password
            </label>

            <input
                type="password"
                name="password"
                placeholder="Password লিখুন"
                autocomplete="current-password"
                required
            >

        </div>


        <button
            type="submit"
            class="login-btn"
        >
            Login
        </button>

    </form>


    <div class="footer">

        © <?= date("Y") ?>
        Al Amanah Friend Circle

    </div>

</div>

</body>

</html>