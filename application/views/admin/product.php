<div class="card">
    <div class="card-body">
        <table id="datatablesSimple" class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Image</th>
                    <th scope="col">Category</th>
                    <th scope="col">Is Active</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;foreach($product as $item):?>
                <tr>
                    <td id="id_product" style="display:none"><?= $item['id_product']?></td>
                    <th scope="row"><?= $no ?></th>
                    <td><?= $item['title']?></td>
                    <td><img src="<?= base_url('assets/product/').$item['image']?>" style="width:100px" alt=""></td>
                    <td><span class="badge bg-danger"><?= $item['name']?> </span><span
                            class="badge bg-warning text-dark"><?= $item['category']?></span></td>
                    <td>
					<?= ( $item['is_active'] == 1) ? '<span class="badge bg-success">Active</span>': '<span class="badge bg-danger">Non Active</span>';?>
                    </td>
                    <td>
                        <a href="<?= base_url('admin/update_product/').$item['id_product'].'/'.$item['slug']?>"
                            class="btn btn-warning btn-sm">Edit</a>
                        <a href="<?= base_url('admin/delete_product/').$item['id_product']?>"
                            onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                <?php $no++; endforeach;?>
            </tbody>
        </table>
    </div>
</div>
