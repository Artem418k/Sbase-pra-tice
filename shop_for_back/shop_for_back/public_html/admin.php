<?php
session_start();
$user = $_SESSION['user'];
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
                <?php if($user!=null){
                    if($user['admin']==1){?>
                        <span><a href="admin.php">Адмін-панель</a></span>
                    <?php }?>
                        <span><a href="tools/exit.php">Вийти</a></span>
                    
                <?php }else{?>
                    <span><a href="login.php">авторизація</a></span>
                <?php } ?>
            </div>
            <div class="header-icon">
                <a href="basket.php">
                    <img src="./images/icon-basket.png" alt="">
                </a>
            </div>
        </header>
    </div>
    <div class="chat">
        <form action="tools/add_product.php" method="POST" class="avt" enctype="multipart/form-data">
            <h2>Форма адміністратора</h2>
            <p>Додайте декілька фото</p>
            <input type="file" required name="image">
            <p>Додайте назву товара</p>
            <input type="text" placeholder="Lenovo a-53" required name="title">
            <p>Виберіть категорію товара</p>
            <select name="category" required>
                <option value="none" disabled>Виберіть категорію товару</option>
                <option value="laptop">Ноутбуки</option>
                <option value="mobile">Телефони</option>
            </select>
            <p>Додайте опис товара</p>
            <textarea name="description" id="" cols="30" rows="10"></textarea>
            <p>Додайте ціну товара</p>
            <input type="number" name="price" placeholder="123123">
            <button>Додати товар</button>
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
</body>

</html>