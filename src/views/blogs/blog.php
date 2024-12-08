<article class="blog-post">
    <h2 class="display-5 link-body-emphasis mb-1 fw-normal"><?= $blog["title"] ?></h2>
    <p class="blog-post-meta">December 14, 2020 by <a href="#"><?= $blog["first_name"] ?></a></p>
    <p><?= $blog["text"] ?></p>

    <nav class="blog-pagination" aria-label="Pagination">
        <a class="btn btn-outline-primary" href="/blogs/update?id=<?= $blog["id"] ?>">ویرایش</a>
        <a class="btn btn-outline-danger" href="/blogs/delete?id=<?= $blog["id"] ?>">حذف</a>
    </nav>
</article>