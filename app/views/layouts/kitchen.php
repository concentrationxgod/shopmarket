
<!DOCTYPE html>
<html>
<head>
    <base href="/">
    <link rel="shortcut icon" href="images/star.png" type="image/png" />
    <?=$this->getMeta();?>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="megamenu/css/ionicons.min.css" rel="stylesheet" type="text/css" media="all" />
    <link href="megamenu/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
    <!--theme-style-->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!--//theme-style-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<!--top-header-->
<div class="top-header">
    <div class="container">
        <div class="top-header-main">
            <div class="col-md-12 col-xs-12 top-header-left">
                
                
               
                
                
                <!-- Классы navbar и navbar-default -->
<nav class="navbar navbar-default">
  <!-- Контейнер -->
  <div class="container-fluid">
    <!-- Заголовок -->
    <div class="navbar-header">
      <!-- Кнопка «Гамбургер» -->
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-main" aria-expanded="false">
        <span class=sr-only>Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!-- Бренд или название сайта -->
      
    </div>
    <!-- Основная часть меню -->
    <div class="collapse navbar-collapse" id="navbar-main">
    
      <!-- Содержимое основной части -->
      <ul class="nav navbar-nav navbar-left">
    <li><a href="<?=PATH;?>">Главная</a></li>
      <li><a href="pages/company">О нас</a></li>
      <li><a href="pages/delivery">Доставка</a></li>
        <li><a href="pages/paymentinfo">Оплата</a></li>
        <li><a href="pages/help">Помощь</a></li>
       
        
        <!-- Выпадающий список -->
   
      </ul>
        <ul class="nav navbar-nav navbar-right">
             <li>    <a class="dropdown-toggle" data-toggle="dropdown">Кабинет </a>
                        <ul class="dropdown-menu">
                            <?php if(!empty($_SESSION['user'])): ?>
                                <li><a href="user/cabinet">Добро пожаловать, <?=h($_SESSION['user']['name']);?></a></li>
                                <li><a href="user/logout">Выход</a></li>
                            <?php else: ?>
                                <li><a href="user/login">Вход</a></li>
                                <li><a href="user/signup">Регистрация</a></li>
                            <?php endif; ?>
                        </ul></li>
             <li><a href="cart/show" onclick="getCart(); return false;">
                        
                            <img src="images/cart-2.png" alt="" />
                            <?php if(!empty($_SESSION['cart'])): ?>
                                <span class="simpleCart_total"><?=$_SESSION['cart.currency']['symbol_left'] . $_SESSION['cart.sum'] . $_SESSION['cart.currency']['symbol_right'];?></span>
                            <?php else: ?>
                                <span class="simpleCart_total">Корзина</span>
                            <?php endif; ?>
                        
                    </a>
                  
                </li>
     
    </ul>
      
    </div>
  </div>
</nav>
                
                
                
                
                
                
                
                
                
                
         
                
                
                
                
                
                
                
                
                
                
                
               
            </div>
      
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--top-header-->
<!--start-logo-->
    <div class="container">
        <div class="row row-flex">
        <div class="col-md-6 col-sm-12  col-xs-12">
<div class="logo">
     
          <img class="mainlogo" src="public/images/mainlogo.png" alt="">
       
    <a href="<?=PATH;?>"><h1>Интернет-магазин</h1><br><h1>Посуда-маркет</h1><br><p>Здесь только лучшая посуда для вашей кухни</p></a>
  
</div>
    </div>
            <div class="col-md-6 hidden-sm  menupos hidden-xs">
                
          <div class="logo">
              <h4>Наши контакты</h4><br>
                <a>Оформление заказа на сайте - круглосуточно</a>
              <a href="">
            +792405553535</a><br>
                <a href="">posudamarketykt@yandex.ru</a>
            </div>
                </div>
    </div>
</div>
<!--start-logo-->
<!--bottom-header-->
<div class="header-bottom">
    <div class="container">
        <div class="header">
            <div class="col-md-9 col-sm-10 header-left">
                <div class="menu-container">
                    <div class="menu">
                        <?php new \app\widgets\menu\Menu([
                            'tpl' => WWW . '/menu/menu.php',
                        ]); ?>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="col-md-3 col-sm-2 header-right">
                <div class="search-bar">
                    <form action="search" method="get" autocomplete="off">
                        <input type="text" class="typeahead" id="typeahead" name="s">
                        <input type="submit" value="">
                    </form>
                    <!--<input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
                    <input type="submit" value="">-->
                </div>
            </div> 
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!--bottom-header-->

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <?php if(isset($_SESSION['error'])): ?>
                    <div class="alert alert-danger">
                        <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
                    </div>
                <?php endif; ?>
                <?php if(isset($_SESSION['success'])): ?>
                    <div class="alert alert-success">
                        <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?=$content;?>
</div>

<!--information-starts-->
<div class="information">
    <div class="container">
        <div class="infor-top">
            <div class="col-md-3 col-sm-3 infor-left">
                <h3>Подпишитесь на нас</h3>
                <ul>
                    <li><a href="#"><span class="fb"></span><h6>Facebook</h6></a></li>
                    <li><a href="#"><span class="twit"></span><h6>Twitter</h6></a></li>
                    <li><a href="#"><span class="google"></span><h6>Google+</h6></a></li>
                </ul>
            </div>
            <div class="col-md-3 col-sm-3 infor-left">
                <h3>Информация</h3>
                <ul>
                    <li><a href="#"><p>Specials</p></a></li>
                    <li><a href="#"><p>New Products</p></a></li>
                    <li><a href="#"><p>Our Stores</p></a></li>
                    <li><a href="contact.html"><p>Contact Us</p></a></li>
                    <li><a href="#"><p>Top Sellers</p></a></li>
                </ul>
            </div>
            <div class="col-md-3 col-sm-3 infor-left">
                <h3>Помощь</h3>
                <ul>
                    <li><a href="account.html"><p>My Account</p></a></li>
                    <li><a href="#"><p>My Credit slips</p></a></li>
                    <li><a href="#"><p>My Merchandise returns</p></a></li>
                    <li><a href="#"><p>My Personal info</p></a></li>
                    <li><a href="#"><p>My Addresses</p></a></li>
                </ul>
            </div>
            <div class="col-md-3 col-sm-3 infor-left">
                <h3>Мы находимся</h3>
                <h4>"Посуда-маркет",
                    <span>г.Якутск,</span>
                    Петровского 20, павильон 10.</h4>
                <h5>+89251533333</h5>
                <p><a href="mailto:posudamarketykt@yandex.ru">posudamarketykt@yandex.ru</a></p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--information-end-->
<!--footer-starts-->
<div class="footer">
    <div class="container">
        <div class="footer-top">
            <div class="col-md-6 footer-left">
                <form>
                    <input type="text" value="Enter Your Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter Your Email';}">
                    <input type="submit" value="Subscribe">
                </form>
            </div>
            <div class="col-md-6 footer-right">
                <p>© 2020 Посуда-маркет. | Создал  <a href="" target="_blank">Concentration</a> </p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--footer-end-->

<!-- Modal -->
<div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Корзина</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Продолжить покупки</button>
                <a href="cart/view" type="button" class="btn btn-primary">Оформить заказ</a>
                <button type="button" class="btn btn-danger" onclick="clearCart()">Очистить корзину</button>
            </div>
        </div>
    </div>
</div>

<div class="preloader"><img src="images/ring.svg" alt=""></div>

<?php $curr = \ishop\App::$app->getProperty('currency'); ?>
<script>
    var path = '<?=PATH;?>',
        course = <?=$curr['value'];?>,
        symboleLeft = '<?=$curr['symbol_left'];?>',
        symboleRight = '<?=$curr['symbol_right'];?>';
</script>

<script src="js/jquery-1.11.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/validator.js"></script>
<script src="js/typeahead.bundle.js"></script>
<!--dropdown-->
<script src="js/jquery.easydropdown.js"></script>
<!--Slider-Starts-Here-->
<script src="js/responsiveslides.min.js"></script>
<script>
    // You can also use "$(window).load(function() {"
    $(function () {
        // Slideshow 4
        $("#slider4").responsiveSlides({
            auto: true,
            pager: true,
            nav: true,
            speed: 500,
            namespace: "callbacks",
            before: function () {
                $('.events').append("<li>before event fired.</li>");
            },
            after: function () {
                $('.events').append("<li>after event fired.</li>");
            }
        });

    });
</script>
<script src="megamenu/js/megamenu.js"></script>
<script src="js/imagezoom.js"></script>
<script defer src="js/jquery.flexslider.js"></script>
<script>
    // Can also be used with $(document).ready()
    $(window).load(function() {
        $('.flexslider').flexslider({
            animation: "slide",
            controlNav: "thumbnails"
        });
    });
</script>
<script src="js/jquery.easydropdown.js"></script>
<script type="text/javascript">
    $(function() {

        var menu_ul = $('.menu_drop > li > ul'),
            menu_a  = $('.menu_drop > li > a');

        menu_ul.hide();

        menu_a.click(function(e) {
            e.preventDefault();
            if(!$(this).hasClass('active')) {
                menu_a.removeClass('active');
                menu_ul.filter(':visible').slideUp('normal');
                $(this).addClass('active').next().stop(true,true).slideDown('normal');
            } else {
                $(this).removeClass('active');
                $(this).next().stop(true,true).slideUp('normal');
            }
        });

    });
</script>
<script src="js/main.js"></script>
<!--End-slider-script-->

<?php
$logs = \R::getDatabaseAdapter()
    ->getDatabase()
    ->getLogger();


?>
</body>
</html>