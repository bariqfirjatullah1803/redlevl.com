<div class="card">
    <div class="card-body">
        <?= form_open_multipart('admin/edit_product')?>
        <input type="hidden" name="id"  value="<?= $sb['id_product']?>">
        <div class="mb-3">
            <label for="inputTitle" class="form-label">Title</label>
            <input name="title" type="text" class="form-control" id="inputTitle" value="<?= $sb['title']?>">
        </div>
        <div class="mb-3">
            <label for="inputCategory" class="form-label">Category</label>
            <select id="menu" class="form-select" aria-label="Default select example">
                <option value="<?= $sb['id_menu']?>"><?= $sb['name']?></option>
            </select>
        </div>
        <div class="mb-3">
            <label for="inputSubCategory" class="form-label">SubCategory</label>
            <select id="category" name="category" class="form-select" aria-label="Default select example">
                <option value="<?= $sb['id_category']?>"><?= $sb['category']?></option>
            </select>
        </div>
        <div class="mb-3">
            <label for="formFileSm" class="form-label">Image Blog</label>
			<input type="hidden" name="old_image" value="<?= $sb['image']?>">
            <input onchange="loadFile(event)" name="image" class="form-control form-control-sm" id="formFileSm"
                type="file" accept="image/gif, image/jpeg, image/png">
            <img id="output" src="<?= base_url('assets/product/').$sb['image']?>" class="img-thumbnail"
                style="width:200px;height:200px;object-fit:cover">
        </div>
        <div class="mb-3">
            <label for="formFileSm" class="form-label">Content</label>
            <textarea name="content" id="summernote"><?= $sb['content']?></textarea>
        </div>
        <div class="ms-4 mb-3">
            <div class="form-check form-switch">
                <input class="form-check-input" name="is_active" type="checkbox"  <?= ($sb['is_active'] == 1)?'value="1" checked':''?> id="flexSwitchCheckChecked" onclick="$(this).attr('value', this.checked ? 1 : 0)">
                <label class="form-check-label" for="flexSwitchCheckChecked">Active</label>
        </div>
    </div>
    <input type="submit" class="btn btn-primary" value="Save">
    </form>
</div>
</div>
