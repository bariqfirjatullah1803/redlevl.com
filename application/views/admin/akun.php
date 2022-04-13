<?= $this->session->flashdata('message');
?>
<div class="card mt-5">
    <div class="card-body">
        <form action="<?= base_url('admin/update_akun/').$user['id']?>" method="POST">
            <!-- <input type="hidden" name="id" value="<?= $user['id']?>"> -->
            <div class="mb-3">
                <label for="inputname" class="form-label">Name</label>
                <input name="name" type="text" class="form-control" id="inputname" value="<?= $user['name']?>">
            </div>
            <div class="mb-3">
                <label for="inputusername" class="form-label">Username</label>
                <input name="username" type="text" class="form-control" id="inputusername" value="<?= $user['username']?>">
            </div>
            <button class="btn btn-primary" type="submit">Save</button>
        </form>
    </div>
</div>
