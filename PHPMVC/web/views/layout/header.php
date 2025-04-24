<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= DOMAINS.'public/css/main.css'?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- boostrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- slick -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <script
        type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
    ></script>
    <script
        type="text/javascript"
        src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"
    ></script>
    <script
        type="text/javascript"
        src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"
    ></script>
</head>
<body>
    <header>
        <div class="header-inner">
            <div class="topbar">
                <div class="container-fluid">
                    <div class="row">
                    <?php foreach ($getHeader as $header): ?>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-12 topbar-phone">
                            <img src="<?= $header['image'] ?>" alt="">&nbsp;
                            <span><?= $header['phone'] ?></span>
                        </div>
                       
                    <?php endforeach; ?>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-12 topbar-group-button">
                            <div class="topbar-button">
                                <img src="<?= DOMAINS .'/public/image/user.png'?>" alt="">
                                <a href="">Tài khoản của tôi</a>
                            </div>

                            <div class="topbar-button">
                                <img src="<?= DOMAINS .'/public/image/cartitem.png'?>" alt="">
                                <a href="">Giỏ hàng</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mneu-desktop">
                <nav class="navbar-header navbar navbar-expand-lg ">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <?php foreach ($menuWithSubmenus as $menu): ?>
                                <?php if (count($menu['submenus']) > 0): ?>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="<?= $menu['link'] ?>" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <?= $menu['name'] ?>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <?php foreach ($menu['submenus'] as $submenu): ?>
                                                <a class="dropdown-item" href="<?= $submenu['link'] ?>"><?= $submenu['name'] ?></a>
                                            <?php endforeach; ?>
                                        </div>
                                    </li>
                                <?php else: ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?= $menu['link'] ?>"><?= $menu['name'] ?></a>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                      
                        <form class="menu-form-search d-flex" role="search">
                            <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success button-search" type="submit"><img src="/public/image/iconsearch.png" alt=""></button>
                        </form>
                        </div>
                    </div>
                </nav>
            </div>
            <!-- mobile -->
            <!-- <div class="menu-mobile">
                <div class="menu-mobile-inner">
                    <div class="menu-mobile-box">
                        <ul>
                            <li>
                                <a href=""><img src="/public/image/cartitem.png" alt=""></a>
                            </li>
                            
                            <li>
                                <a href=""><img src="/public/image/cartitem.png" alt=""></a>
                            </li>

                            <li>
                                <a href=""><img src="/public/image/user.png" alt=""></a>
                            </li>

                            <li>
                                <a href=""><img src="/public/image/user.png" alt=""></a>
                            </li>

                            <li>
                                <a href=""><img src="/public/image/cartitem.png" alt=""></a>
                            </li>

                            <li>
                                <a href=""><img src="/public/image/cartitem.png" alt=""></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> -->
        </div>
    </header>