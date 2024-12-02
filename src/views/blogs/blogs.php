<svg xmlns="http://www.w3.org/2000/svg" class="d-none">
    <symbol id="aperture" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
        <circle cx="12" cy="12" r="10" />
        <path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94" />
    </symbol>
    <symbol id="cart" viewBox="0 0 16 16">
        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
    </symbol>
    <symbol id="chevron-right" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
    </symbol>
</svg>

<div class="row justify-content-between">
    <?php foreach ($blogs as $blog) : ?>
        <div class="col-5 g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="p-4 d-flex flex-column position-static">
                <strong class="d-inline-block mb-2 text-primary-emphasis"><?= $blog["category"] ?></strong>
                <h3 class="mb-0"><?= $blog["title"] ?></h3>
                <div class="mb-1 text-body-secondary">آذر</div>
                <p class="card-text mb-auto"><?= substr($blog["text"], 0, 150) . '...' ?></p>
                <a href="blog/<?= $blog["id"] ?>" class="btn btn-primary mt-3 align-self-end">
                    ادامه
                    <!-- <svg class="bi">
                        <use xlink:href="#chevron-right"></use>
                    </svg> -->
                </a>
            </div>
        </div>
    <?php endforeach; ?>
</div>