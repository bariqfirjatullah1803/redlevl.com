<?= $this->session->flashdata('message');
?>
<div class="card mt-5">
    <div class="card-body">
        <form action="<?= base_url('admin/update_description/').$description['id']?>" method="POST">
            <div class="mb-3">
                <label for="inputdescription" class="form-label">Description</label>
				<textarea name="description" id="description" cols="30" rows="10" class="form-control"><?= $description['desc']?></textarea>
            </div>
            <button class="btn btn-primary" type="submit">Save</button>
        </form>
    </div>
</div>
