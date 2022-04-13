<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?= base_url()?>assets/img/logo.jpg" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/')?>style.css">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />

    <script src="<?= base_url()?>assets/js/jquery.paginate.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

    <title><?= $title?> - Red Levl</title>
</head>

<body>
    <div class="header-1">
        <div class="container">
            <div class="icon">
                <a href="https://www.facebook.com/RedLevl/"><i class="fab fa-facebook"></i></a>
                <a href="https://www.instagram.com/redlevl/"><i class="fab fa-instagram"></i></a>
            </div>
            <div class="announ">

                <div class="runtext-container float-end">
                    <div class="main-runtext ">
                        <marquee direction="" onmouseover="this.stop();" onmouseout="this.start();">

                            <div class="holder">
								<?php
									$notice = $this->db->get('notice')->row_array();
								?>
                                <div class="text-container">
                                    &nbsp; &nbsp;<a href="#"><span style="color:red">Red</span><span
                                            style="color: #ae973b;">Levl</span> - <?= $notice['notice']?></a>
                                </div>


                            </div>

                        </marquee>
                    </div>
                </div>
                <div class="notice float-end">
                    <i class="fas fa-bullhorn"></i> Notice :
                </div>
            </div>
        </div>
    </div>



    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent">
        <div class="container d-flex justify-content-between">
            <div class="d-flex align-items-center">
                <a class="navbar-brand" href="<?= base_url('home')?>">
                    <img src="<?= base_url()?>assets/img/logo.jpg" alt="" width="100" height="100"
                        class="d-inline-block align-text-top">
                </a>
                <h2 style="color:red;font-weight:700" class="mt-lg-2">Red<span style="color:#ae973b">Levl</span></h2>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <form class="d-flex justify-content-between" method="GET" action="<?= base_url('users/search')?>">
                    <input class="form-control me-2" name="keyword" type="search" aria-label="Search" autocomplete="off">
                    <button type="submit" class="btn btn-primary" type="submit"><i class="fas fa-search"></i> Search</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="navigation collapse navbar-collapse" id="navbarSupportedContent">
        <div class="container">
            <div class="list-items">
				<?php
					$queryMenu = $this->db->query("SELECT * FROM menu ORDER BY name ASC")->result_array();
					foreach($queryMenu as $qm):
                        
				?>
                <div class="nav-items">
                    <a href="<?= ($qm['name'] == 'Blog' || $qm['name'] == 'Internship')? base_url($qm['url']):'#'.$qm['name']?>">
                        <div class="icon-items">
                            <img src="<?= base_url('assets/img/icon/').$qm['icon']?>" />
                        </div>
                        <h1 class="title"><?= $qm['name']?></h1>
                    </a>
					<?php
						$idMenu = $qm['id_menu'];
						$queryCategory = $this->db->query("SELECT * FROM category WHERE id_menu = $idMenu ORDER BY category ASC")->result_array();
						if($qm['name'] != 'Blog' && $qm['name'] != 'Internship'): 
					?>
                    <div class="sub-nav">
                        <div class="sub-nav-items ">
                            <?php foreach($queryCategory as $qc):?>
                            <a href="<?= base_url($qc['slug'])?>"><?= $qc['category']?></a>
							<?php endforeach?>
                        </div>
                    </div>
					<?php endif?>
                </div>
				<?php endforeach?>
            </div>
        </div>
    </div>

    <div class="dropdown-button">
        <div id="gallery">
            <div class="d-flex btn-gallery">
                <button><i class="svg-gallery"></i> Gallery</button>
            </div>
            <div class="list-item">
                <a href="<?= base_url('gallery-video')?>"><i class="fa fa-play me-2"></i> Gallery Video</a>
                <a href="<?= base_url('gallery-image')?>"><i class="fa fa-camera me-2"></i> Gallery Photo</a>
            </div>
        </div>
        <div id="contact">
            <div class="btn-contact">
                <button> <span class="svg-contact"></span> Contact</button>
            </div>
            <div class="list-item">
                <a href="https://wa.me/6281333153153"><i class="fab fa-whatsapp me-2"></i> +6281333153153</a>
                <a href="tel:6281333153153"><i class="fa fa-phone me-2"></i> +6281333153153</a>
                <!-- <a href="mailto:redlevlmediatama@gmail.com"><i class="fa fa-envelope me-2"></i>
                    redlevlmediatama@gmail.com</a> -->
            </div>
        </div>
    </div>

    <?= $contents?>
    <footer class="py-3 my-4">
        <p class="text-center text-muted">© 2021 <span style="color:red">Red</span><span
                style="color: #ae973b;">Levl</span></p>
    </footer>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script>
    $('.nav-items').on('click', function() {
        if ($(this).hasClass('active')) {
            $('.nav-items').removeClass('active')
        } else {
            $('.nav-items').removeClass('active')
            $(this).addClass('active')
        }

    })
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/gsap.min.js"></script>
    <script src="<?= base_url()?>assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
    var Tawk_API = Tawk_API || {},
        Tawk_LoadStart = new Date();
    (function() {
        var s1 = document.createElement("script"),
            s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = 'https://embed.tawk.to/613622dbd6e7610a49b3e685/1fetngb9c';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
    })();
    </script>
    <!--End of Tawk.to Script-->
</body>

</html>
