<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - MVC</title>
    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- fontfamily -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@100..900&display=swap" rel="stylesheet">
    <!-- custom style -->
    <link href="/app.css" rel="stylesheet">
</head>

<body dir="rtl" class="bg-light">
    <header class="z-3 d-flex justify-content-center py-3 position-sticky top-0 start-0 end-0 bg-white shadow-sm">
        <ul class="nav nav-pills">
            <li class="nav-item"><a href="/blogs/create" class="nav-link <?= $route === "/blogs/create" ? "active" : "" ?>">ایجاد بلاگ</a></li>
            <li class="nav-item"><a href="/" class="nav-link <?= $route === "/" ? "active" : "" ?>">بلاگ ها</a></li>
        </ul>
    </header>
    <div class="container">
        <main class="d-flex justify-content-center align-items-center mt-3">
            <?= $content ?>
        </main>
    </div>
</body>

</html>