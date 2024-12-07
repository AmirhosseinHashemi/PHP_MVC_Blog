<form method="post" action="/blogs/create" enctype="multipart/form-data">
    <div class="form-floating mt-2">
        <input type="text" class="form-control" name="title" id="title" placeholder="عنوان">
        <label for="title">عنوان</label>
        <p class="text-danger text-err d-none">یک نمونه ارور</p>
    </div>

    <div class="form-floating mt-2">
        <input type="text" class="form-control" name="text" id="text" placeholder="متن">
        <label for="text">متن</label>
        <p class="text-danger text-err d-none">یک نمونه ارور</p>
    </div>

    <select class="form-select mt-2" name="category" aria-label="Default select example">
        <option selected>انتخاب دسته بندی</option>
        <?php foreach ($categories as $category) : ?>
            <option value="<?= $category['id'] ?>"><?= $category["category_name"] ?></option>
        <?php endforeach; ?>
    </select>
    <p class="text-danger text-err d-none">یک نمونه ارور</p>

    <div class="mt-3">
        <label for="formFile" class="form-label">یک عکس برای مقاله انتخاب کنید</label>
        <input class="form-control" name="image" type="file" id="formFile">
        <p class="text-danger text-err d-none">یک نمونه ارور</p>
    </div>

    <button class="btn btn-primary mt-5 w-100 py-2" type="submit">ثبت</button>
</form>