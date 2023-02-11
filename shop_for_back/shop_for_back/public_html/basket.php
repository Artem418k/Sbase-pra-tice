<?php
session_start();
$user = $_SESSION['user'];
if($user!=null){
    include("tools/db.php");
    $id = $user['id'];
    $basket = $mysql->query("SELECT * FROM basket WHERE user_id='$id'");
}
$suma = 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Інтернет магазин 'ФОКУС' | Головна сторінка</title>
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/basket.css">
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
    <div class="basket">
        <h2>Корзина</h2>
        <?php if($basket->fetch_array()!=null){
                mysqli_data_seek($basket, 0);
                ?>
        <?php while($product = $basket->fetch_assoc()){
            $productId = $product['product_id'];
            $p = $mysql->query("SELECT * FROM catalog WHERE id='$productId'")->fetch_array();
            $suma+=$p['price']*$product['count'];
            ?>
            <div class="block-goods-basket">
            <img src="./products/<?= $p['image']?>" alt="">
            <h2><?= $p['title']?></h2>
            <p><?= $p['price']?> &#8372;</p>
            <p class="delete" data-id="<?= $p['id']?>">&#10006;</p>
        </div>
        <?php }}else{?>
            <h2>Корзина пуста</h2>
        <?php } ?>
        <h3>Загальна сума : <?= $suma?> &#8372;</h3>
        <button class="btn-basket" >Замовити</button>
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
        let btn = document.querySelector('.btn-basket');

        btn.onclick = function(){
            alert('Замовлення прийнято!\n Скоро ми з Вами звяжемося');
        }
        
        $(".delete").click(function(){
            var data = {"action":"remove","id":$(this).data("id")};
            $.ajax({
                type: "POST",
                url: "tools/basket_processor.php",
                data: data,
                success: function(response) {
                    window.location.reload();
                },
            });
        });
    </script>
</body>

</html>