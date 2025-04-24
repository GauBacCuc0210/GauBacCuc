<?php 
include WEB_ROOT .'/views/layout/header.php';

?>

<main>
        <section id="section-breadcrumb">
            <div class="breadcrumb-center">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item"><a href="#">Library</a></li>
                  <li class="breadcrumb-item active">Data</li>
                </ul>
            </div>
        </section>

        <section id="section-banner-blog">
            <div class="banner-blog">
                <img src="<?= DOMAINS .'public/image/background-home.png'?>" alt="">
            </div>
        </section>

        <section id="section-blog-content">
            <div class="container">
                <div class="form-search-blog">
                    <form action="">
                        <input type="text" class="form-control" id="" placeholder="Tìm kiếm bài viết">
                    </form>
                </div>

                <div class="main-blog">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8 col-12 main-blog-left">
                            <div class="main-blog-left-item">
                                <div class="main-blog-left-item-img">
                                    <a href="<?= WEB_ROOT .'/views/news/detailnews.php'?>"><img src="<?= DOMAINS .'public/image/blognews.png'?>" alt=""></a>
                                </div>
    
                                <div class="main-blog-left-item-meta">
                                    <div class="meta-date">
                                        <span>2 ngày trước</span>
                                    </div>
    
                                    <div class="meata-category">
                                        <span>Bumas care</span>
                                    </div>
                                </div>
    
                                <div class="main-blog-left-title">
                                    <a href="<?= WEB_ROOT .'/views/news/detailnews.php'?>">3 Mẹo sử dụng máy massage cổ vai gáy M3 hiệu quả?</a>
                                </div>
    
                                <div class="main-blog-left-description">
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut
                                </div>
                            </div>
                        </div>
    
                        <div class="col-lg-4 col-md-4 col-sm-4 col-12 main-blog-right">
                            <div class="main-blog-right-list">
                                <div class="main-blog-right-heading">
                                    <p>Xem nhiều nhất</p>
                                </div>
    
                                <div class="main-blog-right-item">
                                    <div class="row">
                                        <div class="main-blog-right-img col-5">
                                            <a href=""><img src="<?= DOMAINS .'/public/image/newssub.png'?>" alt=""></a>
                                        </div>
    
                                        <div class="main-blog-right-text col-7">
                                            <div class="main-blog-right-category">
                                                <span>Bumas care</span>
                                            </div>
                                            <div class="main-blog-right-title">
                                                <a href="">Đánh giá chi tiết về máy massage đầu gối mới nhất của nhà Bumas</a>
                                            </div>
                                            <div class="main-blog-right-meta">
                                                <span>2 ngày</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="main-blog-right-item">
                                    <div class="row">
                                        <div class="main-blog-right-img col-5">
                                            <a href=""><img src="<?= DOMAINS .'/public/image/newssub.png'?>" alt=""></a>
                                        </div>
    
                                        <div class="main-blog-right-text col-7">
                                            <div class="main-blog-right-category">
                                                <span>Bumas care</span>
                                            </div>
                                            <div class="main-blog-right-title">
                                                <a href="">Đánh giá chi tiết về máy massage đầu gối mới nhất của nhà Bumas</a>
                                            </div>
                                            <div class="main-blog-right-meta">
                                                <span>2 ngày</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="main-blog-right-item">
                                    <div class="row">
                                        <div class="main-blog-right-img col-5">
                                            <a href=""><img src="<?= DOMAINS .'/public/image/newssub.png'?>" alt=""></a>
                                        </div>
    
                                        <div class="main-blog-right-text col-7">
                                            <div class="main-blog-right-category">
                                                <span>Bumas care</span>
                                            </div>
                                            <div class="main-blog-right-title">
                                                <a href="">Đánh giá chi tiết về máy massage đầu gối mới nhất của nhà Bumas</a>
                                            </div>
                                            <div class="main-blog-right-meta">
                                                <span>2 ngày</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="main-blog-right-item">
                                    <div class="row">
                                        <div class="main-blog-right-img col-5">
                                            <a href=""><img src="<?= DOMAINS .'/public/image/newssub.png'?>" alt=""></a>
                                        </div>
    
                                        <div class="main-blog-right-text col-7">
                                            <div class="main-blog-right-category">
                                                <span>Bumas care</span>
                                            </div>
                                            <div class="main-blog-right-title">
                                                <a href="">Đánh giá chi tiết về máy massage đầu gối mới nhất của nhà Bumas</a>
                                            </div>
                                            <div class="main-blog-right-meta">
                                                <span>2 ngày</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="section-blog-new">
            <div class="container">
                <div class="section-blog-new-inner">
                    <div class="title-section">
                        <p>Bài viết mới nhất</p>
                    </div>
                    <div class="blog-new-slide">
                        <div class="blog-slide-item">
                            <div class="blog-slide-title">
                                <a href="">Căng cơ khi chạy bộ</a>
                            </div>
    
                            <div class="blog-slide-meta">
                                <p class="blog-slide-date">2 ngày</p>
                                <p class="blog-slide-category">Bumas care</p>
                            </div>
    
                            <div class="blog-slide-image">
                                <a href=""><a href=""><img src="<?= DOMAINS .'public/image/blognews.png'?>" alt=""></a></a>
                            </div>
                        </div>

                        <div class="blog-slide-item">
                            <div class="blog-slide-title">
                                <a href="">Căng cơ khi chạy bộ</a>
                            </div>
    
                            <div class="blog-slide-meta">
                                <p class="blog-slide-date">2 ngày</p>
                                <p class="blog-slide-category">Bumas care</p>
                            </div>
    
                            <div class="blog-slide-image">
                                <a href=""><a href=""><img src="<?= DOMAINS .'public/image/blognews.png'?>" alt=""></a></a>
                            </div>
                        </div>

                        <div class="blog-slide-item">
                            <div class="blog-slide-title">
                                <a href="">Mách bạn 8 cách giúp bạn gái giảm đau bụng kinh</a>
                            </div>
    
                            <div class="blog-slide-meta">
                                <p class="blog-slide-date">2 ngày</p>
                                <p class="blog-slide-category">Bumas care</p>
                            </div>
    
                            <div class="blog-slide-image">
                                <a href=""><a href=""><img src="<?= DOMAINS .'public/image/blognews.png'?>" alt=""></a></a>
                            </div>
                        </div>

                        <div class="blog-slide-item">
                            <div class="blog-slide-title">
                                <a href="">Đánh giá tri tiết về máy massage đầu gối mới nhất của nhà Bumas</a>
                            </div>
    
                            <div class="blog-slide-meta">
                                <p class="blog-slide-date">2 ngày</p>
                                <p class="blog-slide-category">Bumas care</p>
                            </div>
    
                            <div class="blog-slide-image">
                                <a href=""><a href=""><img src="<?= DOMAINS .'public/image/blognews.png'?>" alt=""></a></a>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>

        <section id="section-blog-col">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 blog-col-item blog-col-item-left">
                        <div class="title-section">
                            <p>Làm đẹp cùng Bumas</p>
                        </div>
    
                        <div class="list-blog-col">
                            <div class="list-blog-item">
                                <div class="row">
                                    <div class="list-blog-col-img col-6">
                                        <div class="list-blog-col-img-inner">
                                            <a href=""><img src="<?= DOMAINS .'/public/image/newssub.png'?>" alt=""></a>
                                        </div>
                                    </div>
        
                                    <div class="list-blog-col-text col-6">
                                        <div class="list-blog-col-category">
                                            <span>Bumas care</span>
                                        </div>
                                        <div class="list-blog-col-title">
                                            <a href="">Đánh giá tri tiết về máy massage đầu gối mới nhất của nhà Bumas</a>
                                        </div>
                                        <div class="list-blog-col-meta">
                                            <span>2 ngày</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="list-blog-item">
                                <div class="row">
                                    <div class="list-blog-col-img col-6">
                                        <div class="list-blog-col-img-inner">
                                            <a href=""><img src="<?= DOMAINS .'/public/image/newssub.png'?>" alt=""></a>
                                        </div>
                                    </div>
        
                                    <div class="list-blog-col-text col-6">
                                        <div class="list-blog-col-category">
                                            <span>Bumas care</span>
                                        </div>
                                        <div class="list-blog-col-title">
                                            <a href="">Đánh giá tri tiết về máy massage đầu gối mới nhất của nhà Bumas</a>
                                        </div>
                                        <div class="list-blog-col-meta">
                                            <span>2 ngày</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="list-blog-item">
                                <div class="row">
                                    <div class="list-blog-col-img col-6">
                                        <div class="list-blog-col-img-inner">
                                            <a href=""><img src="<?= DOMAINS .'/public/image/newssub.png'?>" alt=""></a>
                                        </div>
                                    </div>
        
                                    <div class="list-blog-col-text col-6">
                                        <div class="list-blog-col-category">
                                            <span>Bumas care</span>
                                        </div>
                                        <div class="list-blog-col-title">
                                            <a href="">Đánh giá tri tiết về máy massage đầu gối mới nhất của nhà Bumas</a>
                                        </div>
                                        <div class="list-blog-col-meta">
                                            <span>2 ngày</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 blog-col-item blog-col-item-right">
                        <div class="title-section">
                            <p>Làm đẹp cùng Bumas</p>
                        </div>
    
                        <div class="list-blog-col">
                            <div class="list-blog-item">
                                <div class="row">
                                    <div class="list-blog-col-img col-6">
                                        <div class="list-blog-col-img-inner">
                                            <a href=""><img src="<?= DOMAINS .'/public/image/newssub.png'?>" alt=""></a>
                                        </div>
                                    </div>
        
                                    <div class="list-blog-col-text col-6">
                                        <div class="list-blog-col-category">
                                            <span>Bumas care</span>
                                        </div>
                                        <div class="list-blog-col-title">
                                            <a href="">Đánh giá tri tiết về máy massage đầu gối mới nhất của nhà Bumas</a>
                                        </div>
                                        <div class="list-blog-col-meta">
                                            <span>2 ngày</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="list-blog-item">
                                <div class="row">
                                    <div class="list-blog-col-img col-6">
                                        <div class="list-blog-col-img-inner">
                                            <a href=""><img src="<?= DOMAINS .'/public/image/newssub.png'?>" alt=""></a>
                                        </div>
                                    </div>
        
                                    <div class="list-blog-col-text col-6">
                                        <div class="list-blog-col-category">
                                            <span>Bumas care</span>
                                        </div>
                                        <div class="list-blog-col-title">
                                            <a href="">Đánh giá tri tiết về máy massage đầu gối mới nhất của nhà Bumas</a>
                                        </div>
                                        <div class="list-blog-col-meta">
                                            <span>2 ngày</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="list-blog-item">
                                <div class="row">
                                    <div class="list-blog-col-img col-6">
                                        <div class="list-blog-col-img-inner">
                                            <a href=""><img src="<?= DOMAINS .'/public/image/newssub.png'?>" alt=""></a>
                                        </div>
                                    </div>
        
                                    <div class="list-blog-col-text col-6">
                                        <div class="list-blog-col-category">
                                            <span>Bumas care</span>
                                        </div>
                                        <div class="list-blog-col-title">
                                            <a href="">Đánh giá tri tiết về máy massage đầu gối mới nhất của nhà Bumas</a>
                                        </div>
                                        <div class="list-blog-col-meta">
                                            <span>2 ngày</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="section-blog-last">
            <div class="blog-last-inner">
                <div class="container">
                    <div class="row">
                        <div class="blog-last-item col-lg-4 col-md-4 col-sm-4 col-12">
                            <div class="blog-last-title">
                                <a href="">Căng cơ khi chạy bộ</a>
                            </div>

                            <div class="blog-last-meta">
                                <p class="blog-last-date">2 ngày</p>
                                <p class="blog-last-category">Bumas care</p>
                            </div>

                            <div class="blog-last-image">
                                <a href=""><a href=""><img src="<?= DOMAINS .'public/image/blognews.png'?>" alt=""></a></a>
                            </div>
                        </div>

                        <div class="blog-last-item col-lg-4 col-md-4 col-sm-4 col-12">
                            <div class="blog-last-title">
                                <a href="">Căng cơ khi chạy bộ</a>
                            </div>

                            <div class="blog-last-meta">
                                <p class="blog-last-date">2 ngày</p>
                                <p class="blog-last-category">Bumas care</p>
                            </div>

                            <div class="blog-last-image">
                                <a href=""><a href=""><img src="<?= DOMAINS .'public/image/blognews.png'?>" alt=""></a></a>
                            </div>
                        </div>

                        <div class="blog-last-item col-lg-4 col-md-4 col-sm-4 col-12">
                            <div class="blog-last-title">
                                <a href="">Căng cơ khi chạy bộ</a>
                            </div>

                            <div class="blog-last-meta">
                                <p class="blog-last-date">2 ngày</p>
                                <p class="blog-last-category">Bumas care</p>
                            </div>

                            <div class="blog-last-image">
                                <a href=""><a href=""><img src="<?= DOMAINS .'public/image/blognews.png'?>" alt=""></a></a>
                            </div>
                        </div>

                        <div class="blog-last-item col-lg-4 col-md-4 col-sm-4 col-12">
                            <div class="blog-last-title">
                                <a href="">Căng cơ khi chạy bộ</a>
                            </div>

                            <div class="blog-last-meta">
                                <p class="blog-last-date">2 ngày</p>
                                <p class="blog-last-category">Bumas care</p>
                            </div>

                            <div class="blog-last-image">
                                <a href=""><a href=""><img src="<?= DOMAINS .'public/image/blognews.png'?>" alt=""></a></a>
                            </div>
                        </div>

                        <div class="blog-last-item col-lg-4 col-md-4 col-sm-4 col-12">
                            <div class="blog-last-title">
                                <a href="">Căng cơ khi chạy bộ</a>
                            </div>

                            <div class="blog-last-meta">
                                <p class="blog-last-date">2 ngày</p>
                                <p class="blog-last-category">Bumas care</p>
                            </div>

                            <div class="blog-last-image">
                                <a href=""><a href=""><img src="<?= DOMAINS .'public/image/blognews.png'?>" alt=""></a></a>
                            </div>
                        </div>

                        <div class="blog-last-item col-lg-4 col-md-4 col-sm-4 col-12">
                            <div class="blog-last-title">
                                <a href="">Căng cơ khi chạy bộ</a>
                            </div>

                            <div class="blog-last-meta">
                                <p class="blog-last-date">2 ngày</p>
                                <p class="blog-last-category">Bumas care</p>
                            </div>

                            <div class="blog-last-image">
                                <a href=""><a href=""><img src="<?= DOMAINS .'public/image/blognews.png'?>" alt=""></a></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="section-blog-contact">
            <div class="container">
                <div class="title-section">
                    <h2>Đăng ký để nhận bản tin</h2>
                </div>

                <div class="title-section-sub">
                    <p>Để cập nhập những tin tức về sức khỏe, làm đẹp,.. và những ưu đãi đặc biệt sớm nhất</p>
                </div>

                <div class="form-blog-contact">
                    <form action="">
                        <div class="input-blog-contact">
                            <input type="email" class="form-control" placeholder="Nhập email của bạn" required>
                            <button type="submit" class="btn btn-primary">Đăng ký</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
</main>

<?php 
include WEB_ROOT . "/views/layout/footer.php";

?>