<div class="card">
	<div class="card-body">
		<table id="datatablesSimple" class="table table-striped">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Logo</th>
					<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1;foreach($carousel as $item):?>
				<tr>
					<th scope="row"><?= $no ?></th>
					<td><img src="<?= base_url('assets/img/').$item['image']?>" style="width:100px" alt=""></td>
					<td>
						<a href="<?= base_url('admin/update_carousel/').$item['id']?>" class="btn btn-warning btn-sm">Edit</a>
						<a href="<?= base_url('admin/delete_carousel/').$item['id']?>" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</a>
					</td>
				</tr>
				<?php $no++; endforeach;?>
			</tbody>
		</table>
	</div>
</div>
