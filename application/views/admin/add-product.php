<div class="card mt-5">
    <div class="card-body">
        <?= form_open_multipart('admin/add_product')?>
        <div class="mb-3">
            <label for="inputTitle" class="form-label">Title</label>
            <input name="title" type="text" class="form-control" id="inputTitle">
        </div>
        <div class="mb-3">
            <label for="inputCategory" class="form-label">Category</label>
            <select id="menu" class="form-select" aria-label="Default select example">

            </select>
        </div>
        <div class="mb-3">
            <label for="inputSubCategory" class="form-label">SubCategory</label>
            <select id="category" name="category" class="form-select" aria-label="Default select example">
            </select>
        </div>
        <div class="mb-3">
            <label for="formFileSm" class="form-label">Image Blog</label>
            <input onchange="loadFile(event)" name="image" class="form-control form-control-sm" id="formFileSm"
                type="file" accept="image/gif, image/jpeg, image/png">
            <img id="output" class="img-thumbnail" style="width:200px;height:200px;object-fit:cover">
        </div>
        <div class="mb-3">
            <label for="formFileSm" class="form-label">Content</label>
            <textarea name="content" id="summernote"></textarea>
        </div>
        <div class="mb-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="is_active" value="1" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Active
                </label>
            </div>
        </div>
        <input type="submit" class="btn btn-primary" value="Save">
        </form>
    </div>
</div>
