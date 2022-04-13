<div class="blog">
    <div class="container">
        <h3 class="title"><span style="color:red">Red</span><span style="color: #ae973b;">Levl</span> Blog</h3>
        <p class="desc"><span class="badge bg-dark">Our Internship</span></p>
        <div class="row row-cols-1 row-cols-md-2 g-4" id="list-blog">
		<?php foreach($internship as $b):?>
            <div class="col">
                <a class="blog-card" href="<?= base_url('internship/').$b['slug']?>">
                    <div class="card">
                        <img src="<?= base_url('assets/internship/').$b['image']?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text"><span class="badge bg-success">Internship</p>
                            <h5 class="card-title"><?= $b['title']?></h5>
                        </div>
                    </div>
                </a>
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
