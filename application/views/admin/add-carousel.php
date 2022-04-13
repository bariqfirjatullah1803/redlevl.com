<div class="card mt-5">
	<div class="card-body">
		<?= form_open_multipart('admin/add_carousel')?>
			<div class="mb-3">
				<label for="formFileSm" class="form-label">Image Carousel</label>
				<input onchange="loadFile(event)" name="image" class="form-control form-control-sm" id="formFileSm"
					type="file" accept="image/gif, image/jpeg, image/png">
				<img id="output" class="img-thumbnail"
					style="width:200px;height:200px;object-fit:cover" >
			</div>
			<input type="submit" class="btn btn-primary" value="Save">
		</form>
	</div>
</div>
