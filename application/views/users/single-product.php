<div class="single-blog">
    <div class="container">
        <h3 class="title"><?= $product['title']?></h3>
        <p class="desc" style="text-align:center"><span class="badge bg-danger"><?= $product['name']?> </span> <span class="badge bg-warning text-dark"><?= $product['category']?></p>
        <img class="img-single-blog" src="<?= base_url('assets/product/').$product['image']?>" alt="">
        <?= $product['content']?>
		<a href="https://wa.me/6281333153153" style="width:100% !important" class="btn btn-block btn-primary mt-3"><i class="fa fa-paper-plane me-2"></i> Order Product</a>
    </div>
</div>
