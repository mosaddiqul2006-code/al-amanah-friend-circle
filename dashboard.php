<?php
session_start();

if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
    header("Location: index.php");
    exit;
}

$name = $_SESSION["name"] ?? "Member";
$role = $_SESSION["role"] ?? "Member";
?>

<!DOCTYPE html>
<html lang="bn">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Dashboard - Al Amanah Friend Circle</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family:Arial,"Noto Sans Bengali",sans-serif;
    background:#f4f7fb;
    color:#172b4d;
}

/* Header */

.header{
    background:linear-gradient(135deg,#071b33,#0c4774);
    color:white;
    padding:22px 18px 30px;
    border-radius:0 0 25px 25px;
}

.header-top{
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.logo{
    width:48px;
    height:48px;
    border-radius:50%;
    background:linear-gradient(135deg,#d4af37,#f5dc78);
    color:#09213d;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:23px;
    font-weight:bold;
}

.logout{
    color:white;
    text-decoration:none;
    background:rgba(255,255,255,.15);
    padding:9px 13px;
    border-radius:10px;
    font-size:13px;
}

.header h1{
    margin-top:20px;
    font-size:23px;
}

.header p{
    margin-top:6px;
    color:#dce9f5;
    font-size:14px;
}

/* Main */

.container{
    max-width:700px;
    margin:auto;
    padding:20px 15px 35px;
}

/* Welcome */

.welcome{
    background:white;
    padding:20px;
    border-radius:18px;
    box-shadow:0 5px 20px rgba(0,0,0,.06);
    margin-bottom:18px;
}

.welcome h2{
    font-size:19px;
    margin-bottom:7px;
}

.welcome p{
    color:#777;
    font-size:14px;
}

/* Account */

.account-card{
    background:linear-gradient(135deg,#d4af37,#f1d66c);
    color:#10243d;
    padding:22px;
    border-radius:20px;
    margin-bottom:20px;
    box-shadow:0 8px 25px rgba(0,0,0,.12);
}

.account-card small{
    font-size:13px;
}

.balance{
    font-size:30px;
    font-weight:bold;
    margin:8px 0;
}

.account-note{
    font-size:12px;
}

/* Section */

.section-title{
    font-size:18px;
    margin:22px 3px 12px;
}

/* Menu */

.menu{
    display:grid;
    grid-template-columns:repeat(2,1fr);
    gap:13px;
}

.menu a{
    text-decoration:none;
    color:#172b4d;
}

.menu-card{
    background:white;
    padding:20px 14px;
    border-radius:17px;
    text-align:center;
    box-shadow:0 5px 18px rgba(0,0,0,.06);
    transition:.2s;
}

.menu-card:active{
    transform:scale(.96);
}

.icon{
    font-size:28px;
    margin-bottom:9px;
}

.menu-card h3{
    font-size:15px;
    margin-bottom:4px;
}

.menu-card p{
    font-size:11px;
    color:#888;
}

/* Role */

.role-box{
    margin-top:20px;
    background:#fff;
    padding:17px;
    border-radius:16px;
    box-shadow:0 5px 18px rgba(0,0,0,.05);
}

.role-box strong{
    color:#0b4774;
}

/* Footer */

.footer{
    text-align:center;
    margin-top:30px;
    color:#999;
    font-size:12px;
}

</style>

</head>

<body>


<!-- HEADER -->

<div class="header">

    <div class="header-top">

        <div class="logo">
            A
        </div>

        <a href="logout.php" class="logout">
            Logout
        </a>

    </div>

    <h1>
        Al Amanah Friend Circle
    </h1>

    <p>
        Management Dashboard
    </p>

</div>


<div class="container">


    <!-- WELCOME -->

    <div class="welcome">

        <h2>
            আসসালামু আলাইকুম, <?= htmlspecialchars($name) ?> 👋
        </h2>

        <p>
            Al Amanah Friend Circle Management System-এ আপনাকে স্বাগতম।
        </p>

    </div>


    <!-- ACCOUNT -->

    <div class="account-card">

        <small>
            মোট বর্তমান ফান্ড
        </small>

        <div class="balance">
            ৳ 0.00
        </div>

        <div class="account-note">
            Cashier কর্তৃক হিসাব আপডেট করা হবে
        </div>

    </div>


    <!-- MENU -->

    <div class="section-title">
        প্রধান মেনু
    </div>

    <div class="menu">


        <a href="profile.php">

            <div class="menu-card">

                <div class="icon">
                    👤
                </div>

                <h3>
                    My Profile
                </h3>

                <p>
                    নিজের তথ্য
                </p>

            </div>

        </a>


        <a href="members.php">

            <div class="menu-card">

                <div class="icon">
                    👥
                </div>

                <h3>
                    Members
                </h3>

                <p>
                    সদস্যদের তথ্য
                </p>

            </div>

        </a>


        <a href="projects.php">

            <div class="menu-card">

                <div class="icon">
                    📋
                </div>

                <h3>
                    Projects
                </h3>

                <p>
                    সকল Project
                </p>

            </div>

        </a>


        <a href="accounts.php">

            <div class="menu-card">

                <div class="icon">
                    💰
                </div>

                <h3>
                    Accounts
                </h3>

                <p>
                    আর্থিক হিসাব
                </p>

            </div>

        </a>


        <a href="reports.php">

            <div class="menu-card">

                <div class="icon">
                    📊
                </div>

                <h3>
                    Reports
                </h3>

                <p>
                    হিসাবের রিপোর্ট
                </p>

            </div>

        </a>


        <a href="settings.php">

            <div class="menu-card">

                <div class="icon">
                    ⚙️
                </div>

                <h3>
                    Settings
                </h3>

                <p>
                    System Settings
                </p>

            </div>

        </a>


    </div>


    <!-- ROLE -->

    <div class="role-box">

        আপনার Role:
        <strong>
            <?= htmlspecialchars($role) ?>
        </strong>

    </div>


    <div class="footer">

        © <?= date("Y") ?> Al Amanah Friend Circle

    </div>

</div>

</body>
</html>