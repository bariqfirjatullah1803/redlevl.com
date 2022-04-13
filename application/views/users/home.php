<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
	<?php 
		$minC = $this->db->query("SELECT min(id) as minId FROM carousel")->row_array();
		$no = 0;
		foreach($carousel as $c):?>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?= $no?>" class="<?= ($c['id'] == $minC['minId'])?'active':''?>""
            aria-current="true" aria-label="Slide <?= $no?>"></button>
        <?php $no++; endforeach?>
        
    </div>
    <div class="carousel-inner">
        <?php 
		foreach($carousel as $c):?>
        <div class="carousel-item <?= ($c['id'] == $minC['minId'])?'active':''?>">
            <img src="<?= base_url('assets/img/').$c['image']?>" class="d-block w-100" alt="...">
        </div>
        <?php endforeach?>
    </div>
</div>
<div class="container">
    <div class="banner">
        <img src="<?= base_url('assets/img/').$banner['image']?>" alt="">
    </div>
    <div class="content">
        <div class="row">
            <div class="col-lg-4 pt-3">
                <div class="box-content">
                    <h3>Products Sugggest</h3>
                    <hr>
                    <div class="slider">
                        <?php foreach($product as $p):?>
                        <div>
                            <div class="product-suggest">

                                <div class="card" style="width: 100%;">
                                    <img src="<?= base_url('assets/product/').$p['image']?>" class="card-img-top">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $p['title']?>...<a
                                                href="<?= base_url('product/').$p['p_slug']?>">Read More</a></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach?>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 pt-3">
                <div class="box-content">
                    <h3>Supported By</h3>
                    <hr>
                    <?php
                    $no = 1; 
                     foreach ($support as $s ) {
                        $image_support[$no] = $s['image'];
                        $no++;
                     }
                     $a = 1;
                     $b = 1;
                     for ($i=1; $i <= count($image_support); $i++) { 
                        if($i%2 == 0){
                            $image_support_genap[$a] = $image_support[$i];
                            $a++;
                        }else{
                            $image_support_ganjil[$b] = $image_support[$i];
                            $b++;
                        } 
                    }
                    $total_arr =ceil((count($image_support_ganjil)+count($image_support_genap))/2);
                    ?>
                    <div class="slider">
                        <?php for($i = 1; $i <= $total_arr;$i++):?>
                        <div>
                            <div class="row mt-5">
                            <?php if(!empty($image_support_ganjil[$i])):?>
                                <div class="col-6">
                                    <img style="width:100% !important"
                                        src="<?= base_url('assets/img/supported/')?><?= $image_support_ganjil[$i]?>" alt="">
                                </div>
                                <?php endif?>
                                <?php if(!empty($image_support_genap[$i])):?>
                                <div class="col-6">
                                    <img style="width:100% !important"
                                        src="<?= base_url('assets/img/supported/')?><?= $image_support_genap[$i]?>" alt="">
                                </div>
                                <?php endif?>
                            </div>
                        </div>
                        <?php endfor?>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 pt-3">
                <div class="box-content">
                    <h3>About Us</h3>
                    <hr>
                    <div class="slider">
                        <div>
                            <p><?= $description['desc']?></p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
