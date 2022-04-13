<div class="card">
    <div class="card-body">
        <?= form_open_multipart('admin/update_banner/'.$banner['id'])?>
        <div class="mb-3">
            <label for="formFileSm" class="form-label">Image Blog</label>
            <input onchange="loadFile(event)" name="image" class="form-control form-control-sm" id="formFileSm"
                type="file" accept="image/gif, image/jpeg, image/png">
            <img id="output" src="<?= base_url('assets/img/').$banner['image']?>" class="img-thumbnail"
                style="width:200px;height:200px;object-fit:cover" alt="...">
        </div>
        <input type="submit" class="btn btn-primary" value="Save">
        </form>
    </div>
</div>
