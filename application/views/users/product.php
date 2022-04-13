<div class="blog">
    <div class="container">
        <h3 class="title"><span style="color:red">Red</span><span style="color: #ae973b;">Levl</span> Product</h3>
        <p class="desc"><span class="badge bg-dark"><?= $category['category']?></span></p>
        <div class="row row-cols-1 row-cols-md-2 g-4" id="list-blog">
            <?php foreach($product as $p):?>
            <div class="col">
                <div class="card">
                    <img src="<?= base_url('assets/product/').$p['image']?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text"><span class="badge bg-danger"><?= $p['name']?> </span><span
                                class="badge bg-warning text-dark"><?= $p['category']?></p>
                        <h5 class="card-title"><?= $p['title']?>...<a href="<?= base_url('product/').$p['p_slug']?>">Read More</a></h5>
                    </div>
                </div>
            </div>
            <?php endforeach?>
        </div>
    </div>
</div>
<script>
$('#list-blog').paginate({
    perPage: 4
});
</script>
