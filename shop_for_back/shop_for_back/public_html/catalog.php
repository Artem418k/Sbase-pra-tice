<?php
session_start();
$user = $_SESSION['user'];
include("tools/db.php");
$products = $mysql->query("SELECT * FROM catalog LIMIT 32");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Інтернет магазин 'ФОКУС' | Головна сторінка</title>
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/catalog.css">
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
                <span><a class="active" href="catalog.php">Каталог товарів</a></span>
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
    <div class="wrap-content-goods">
        <div class="title-goods">
            <h2>Всі товари</h2>
            <div class="vb">
                <select id="sort">
                    <option value="all" selected>Всі товари</option>
                    <option value="laptop">Ноутбуки</option>
                    <option value="mobile">Телефони</option>
                </select>
            </div>
        </div>
        <div class="content-goods">
            <?php if($products->fetch_array()!=null){
                mysqli_data_seek($products, 0);?>
            <?php while($product = $products->fetch_array()){?>
                <div class="goods">
                <img src="./products/<?= $product['image']?>" alt="image">
                <h3><?= $product['title']?></h3>
                <a href="product.php?id=<?= $product['id']?>">Детальніше</a>
                <p><?= $product['price']?> &#8372;</p>
                <button class="btn add-to-basket" data-id="<?= $product['id']?>">Додати до корзини</button>
            </div>
            <?php }}else{?>
                <h2>В магазині відсутні товари</h2>
            <?php }?>
        </div>
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
        $('#sort').on("change",function () {
            var data = {"category":$("#sort").val()};
            $.ajax({
                type: "POST",
                url: "tools/catalog_sort.php",
                data: data,
                success: function(response) {
                    let products = JSON.parse(response);
                    $(".content-goods").html("");
                    for(var i=0; i<products.length;i++){
                        let html =`<div class="goods">
                <img src="./products/${products[i].image}" alt="image">
                <h3>${products[i].title}</h3>
                <a href="product.php?id=${products[i].id}">Детальніше</a>
                <p>${products[i].price} &#8372;</p>
                <button class="btn add-to-basket" data-id="${products[i].id}">Додати до корзини</button>
            </div>`;
                        $(".content-goods").append(html);

                    }
                },
            });
        }); 


        $(".add-to-basket").click(function(){
            var data = {"action":"add","id":$(this).data("id")};
            $.ajax({
                type: "POST",
                url: "tools/basket_processor.php",
                data: data,
                success: function(response) {
                    console.log(response);
                    alert("Товар додано до корзини");
                },
            });
        });
    </script>
</body>

</html>