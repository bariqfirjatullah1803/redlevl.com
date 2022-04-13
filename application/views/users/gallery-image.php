<div class="bg-white">
    <div class="container">
        <div class="gallery">
            <h3><span style="color:red">Red</span><span style="color: #ae973b;">Levl</span> Gallery</h3>
            <p><span class="badge bg-dark">Our Project</span></p>
            <div class="row mt-5" id="list-gallery">
                <?php $no = 1;foreach($photo as $item):?>
                <div class="col-lg-4 mb-4 gallery-box">
                    <a data-fancybox="gallery" data-caption="<b><?=$item['desc']?></b>"
                        href="<?= base_url('assets/photo/').$item['image']?>">
                        <div class="box" style="background-image: url(<?= base_url('assets/photo/').$item['image']?>);">
                            <div class="deskripsi">
                                <div class="search-icon"></div>
                                <h1><?=$item['desc']?></h1>
                            </div>
                        </div>
                    </a>
                </div>
                <?php endforeach?>
            </div>

        </div>
    </div>
</div>

<script>
$('#list-gallery').paginate({
    perPage: 9
});
</script>
