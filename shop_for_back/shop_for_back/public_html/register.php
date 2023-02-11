<?php
session_start();
if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];
    if($user['admin']==1){
        header("Location: admin.php");
    }
    else{
        header("Location: catalog.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Інтернет магазин 'ФОКУС' | Головна сторінка</title>
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/avt.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
</head>

<body>
    <div class="wrap-header">
        <header>
            <div class="header-logo">
                <img src="./images/logo.png" alt="">
            </div>
            <div class="header-menu">
                <span><a href="index.php">Головна</a></span>
                <span><a href="catalog.php">Каталог товарів</a></span>
                <span><a href="chat.php">Клієнтський чат</a></span>
                <span><a class="active" href="login.php">авторизація</a></span>
            </div>
            <div class="header-icon">
                <a href="basket.php">
                    <img src="./images/icon-basket.png" alt="">
                </a>
            </div>
        </header>
    </div>
    <div class="chat">
        <form class="avt">
            <h2>Форма для реєстрації</h2>
            <p>Логін</p>
            <input type="text" placeholder="логін" name="login">
            <p>Прізвище</p>
            <input type="text" placeholder="Іванов" name="lastname">
            <p>Ім'я</p>
            <input type="text" placeholder="Іван" name="firstname">
            <p>Мобільний телефон</p>
            <input type="phone" placeholder="+3809593942342" name="phone">
            <p>Пароль</p>
            <input type="password" placeholder="1235" name="password">
            <button>зареєструватися</button>
            <span id="message"></span>
            <p>якщо ви зареєстровані - <a href="login.php">авторизуйтеся</a></p>
        </form>
    </div>
    <div class="wrap-footer">
        <footer>
            <div class="footer-block">
                <p>Графік роботи Call-центру</p>
            </div>
            <div class="footer-block">
                <p>Інформація про компанію</p>
                <span><a href="error.php">Про нас</a></span>
                <span><a href="error.php">Умови використання сайту</a></span>
                <span><a href="error.php">Вакансії</a></span>
                <span><a href="error.php">Контакти</a></span>
            </div>
            <div class="footer-block">
                <p>Допомога</p>
                <span><a href="error.php">Доставка та оплата</a></span>
                <span><a href="error.php">Кредит</a></span>
                <span><a href="error.php">Гарантія</a></span>
                <span><a href="error.php">Повернення товару</a></span>
                <span><a href="error.php">Сервісні центри</a></span>
            </div>
            <div class="footer-block">
                <p>Сервіси</p>
                <span><a href="error.php">Доставка та оплата</a></span>
                <span><a href="error.php">Кредит</a></span>
                <span><a href="error.php">Гарантія</a></span>
                <span><a href="error.php">Повернення товару</a></span>

            </div>
        </footer>
    </div>
    <script>
        $('form').submit(function (e) {
            e.preventDefault();
            var data = $('form').serializeArray();
            $.ajax({
                type: "POST",
                url: "tools/reg_user.php",
                data: data,
                success: function(response) {
                    if(response==777){
                        window.location.href = "login.php";
                    }
                    else{
                        $("#message").html(response);
                    }
                },
                error: function(response) {
                    $("#message").html("Помилка серверу.");
                }
            });
        }); 
    </script>
</body>

</html>