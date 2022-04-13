<?= $this->session->flashdata('message');
?>
<div class="card mt-5">
    <div class="card-body">
        <form action="<?= base_url('admin/update_notice/').$notice['id']?>" method="POST">
            <div class="mb-3">
                <label for="inputNotice" class="form-label">Notice</label>
				<textarea name="notice" id="notice" cols="30" rows="10" class="form-control"><?= $notice['notice']?></textarea>
            </div>
            <button class="btn btn-primary" type="submit">Save</button>
        </form>
    </div>
</div>
