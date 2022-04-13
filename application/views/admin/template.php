<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?= $title?> - Red Levl</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="<?= base_url('assets/')?>css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="<?= base_url('admin')?>">Red Levl</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="<?= base_url('admin/akun')?>">Akun</a></li>
                    <li><a class="dropdown-item" href="<?= base_url('admin/change_password')?>">Change Password</a></li>
                    <li><a class="dropdown-item" href="<?= base_url('auth/logout')?>">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="<?= base_url('admin')?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-blog"></i></div>
                            Blog
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="<?= base_url('admin/add_blog')?>">Add New Blog</a>
                                <a class="nav-link" href="<?= base_url('admin/blog')?>">List Blog</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#internship"
                            aria-expanded="false" aria-controls="internship">
                            <div class="sb-nav-link-icon"><i class="fas fa-blog"></i></div>
                            Internship
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="internship" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="<?= base_url('admin/add_internship')?>">Add New Internship</a>
                                <a class="nav-link" href="<?= base_url('admin/internship')?>">List Internship</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseGallery" aria-expanded="false" aria-controls="collapseGallery">
                            <div class="sb-nav-link-icon"><i class="fas fa-photo-video"></i></div>
                            Gallery
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseGallery" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="<?= base_url('admin/add_photo')?>">Add New Photo</a>
                                <a class="nav-link" href="<?= base_url('admin/photo')?>">Gallery Photo</a>
                                <a class="nav-link" href="<?= base_url('admin/add_video')?>">Add New Video</a>
                                <a class="nav-link" href="<?= base_url('admin/video')?>">Gallery Video</a>
                            </nav>
                        </div>
                        <a href="#" class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#product"
                            aria-expanded="false" aria-controls="product">
                            <div class="sb-nav-link-icon"><i class="fas fa-clone"></i></div>
                            Product
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="product" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="<?= base_url('admin/add_product')?>">Add New Product</a>
                                <a class="nav-link" href="<?= base_url('admin/product')?>">List Product</a>
                            </nav>
                        </div>
                        <a href="<?= base_url('admin/notice')?>" class="nav-link">
                            <div class="sb-nav-link-icon"><i class="fas fa-clone"></i></div>
                            Notice
                        </a>
                        <a href="<?= base_url('admin/banner')?>" class="nav-link ">
                            <div class="sb-nav-link-icon"><i class="fas fa-photo-video"></i></div>
                            Banner
                        </a>
                        <a href="#" class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#carousel"
                            aria-expanded="false" aria-controls="carousel">
                            <div class="sb-nav-link-icon"><i class="fas fa-photo-video"></i></div>
                            Carousel
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="carousel" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="<?= base_url('admin/add_carousel')?>">Add New Carousel</a>
                                <a class="nav-link" href="<?= base_url('admin/carousel')?>">List Carousel</a>
                            </nav>
                        </div>
                        <a href="#" class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#support"
                            aria-expanded="false" aria-controls="support">
                            <div class="sb-nav-link-icon"><i class="fas fa-photo-video"></i></div>
                            Support
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="support" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="<?= base_url('admin/add_support')?>">Add New Support</a>
                                <a class="nav-link" href="<?= base_url('admin/support')?>">List Support</a>
                            </nav>
                        </div>
                        <a href="<?= base_url('admin/description')?>" class="nav-link">
                            <div class="sb-nav-link-icon"><i class="fas fa-clone"></i></div>
                            Description
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    <?= $user['name']?>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4"><?= $title?></h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active"><?= $subtitle?></li>
                    </ol>
                    <?= $contents; ?>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2021</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="<?= base_url('assets/')?>js/scripts.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script> -->
    <!-- <script src="<?= base_url('assets/')?>demo/chart-area-demo.js"></script> -->
    <!-- <script src="<?= base_url('assets/')?>demo/chart-bar-demo.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/')?>js/datatables-simple-demo.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
    <script>
    $(document).ready(function() {
        $('#summernote').summernote({
            placeholder: 'This is content',
            tabsize: 2,
            height: 500,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link', 'picture']],
            ],
            callbacks: {
                onImageUpload: function(image) {
                    uploadImage(image[0]);
                },
                onMediaDelete: function(target) {
                    deleteImage(target[0].src);
					
                }
            }
        });

        function uploadImage(image) {
            var data = new FormData();
            data.append("image", image);
            $.ajax({
                url: "<?php echo base_url('posting/upload_image')?>",
                cache: false,
                contentType: false,
                processData: false,
                data: data,
                type: "POST",
                success: function(url) {
                    $('#summernote').summernote("insertImage", url);
                },
                error: function(data) {
                    console.log(image);
                }
            });
        }

        function deleteImage(src) {
            $.ajax({
                data: {
                    src: src
                },
                type: "POST",
                url: "<?php echo base_url('posting/delete_image')?>",
                cache: false,
                success: function(response) {
                    console.log(response);
                }
            });
        }

    });
    </script>
    <script>
    $('#product-content').summernote({
        placeholder: 'This is content',
        tabsize: 2,
        height: 500,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['link', 'picture']],
        ]
    });
    </script>
    <script>
    var loadFile = function(event) {
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
    };
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        var id = $('#menu').val();
        var category = $('#category').val();
        var app = {
            show: function() {
                $.ajax({
                    url: "<?= base_url('admin/selected_menu')?>",
                    method: "GET",
                    data: {
                        id: id,
                    },
                    success: function(data) {
                        $("#menu").html(data)
                    }
                })
            },
            tampil: function() {
                var menuId = $(this).val();
                $.ajax({
                    url: "<?= base_url('admin/selected_category')?>",
                    method: "POST",
                    data: {
                        menuId: menuId,
                        category: category
                    },
                    success: function(data) {
                        $("#category").html(data)
                    }
                })
            }
        }
        app.show();
        // app.tampil();
        console.log(category);
        $(document).on("change", "#menu", app.tampil)
        $(document).on("load", "#category", app.tampil)
    })
    </script>
</body>

</html>
