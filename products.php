<?php

$products = [
    ['name' => 'Áo thun VKU', 'price' => 150000, 'stock' => 20, 'icon' => '👕'],
    ['name' => 'Bình nước VKU', 'price' => 120000, 'stock' => 0, 'icon' => '🥤'],
    ['name' => 'Balo VKU', 'price' => 350000, 'stock' => 8, 'icon' => '🎒'],
    ['name' => 'Sổ tay VKU', 'price' => 50000, 'stock' => 35, 'icon' => '📒'],
    ['name' => 'Mũ lưỡi trai VKU', 'price' => 110000, 'stock' => 12, 'icon' => '🧢'],
    ['name' => 'Áo khoác VKU', 'price' => 420000, 'stock' => 5, 'icon' => '🧥'],
    ['name' => 'Túi tote VKU', 'price' => 90000, 'stock' => 18, 'icon' => '👜'],
    ['name' => 'Bộ quà tặng VKU', 'price' => 300000, 'stock' => 6, 'icon' => '🎁'],
];
 
$keyword = trim($_GET['keyword'] ?? '');
$minPrice = $_GET['min_price'] ?? '';
$maxPrice = $_GET['max_price'] ?? '';

$filteredProducts = [];

foreach ($products as $product) {
    $matchKeyword = $keyword === '' ||
        mb_stripos($product['name'], $keyword) !== false;

    $matchMinPrice = $minPrice === '' ||
        $product['price'] >= $minPrice;

    $matchMaxPrice = $maxPrice === '' ||
        $product['price'] <= $maxPrice;

    if ($matchKeyword && $matchMinPrice && $matchMaxPrice) {
        $filteredProducts[] = $product;
    }
}
// TODO 1: Đọc keyword từ query string bằng $_GET['keyword'] ?? ''.
// TODO 2: Tạo $filteredProducts và lọc theo keyword.
// CHALLENGE: Thêm lọc theo min_price và max_price.
?>
<!doctype html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sản phẩm - VKUShop</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <header class="site-header">
        <div class="header-inner"><a class="brand" href="index.php"><span
                    class="brand-mark">V</span><span>VKUShop</span></a>
            <nav class="main-nav"><a href="index.php">Trang chủ</a><a href="products.php">Sản phẩm</a></nav>
        </div>
    </header>
    <main class="main-container">
        <h1 class="page-heading">Sản phẩm VKUShop</h1>
        <p class="page-subtitle">Dữ liệu hiện đang nằm trong PHP array. Database sẽ xuất hiện ở các buổi sau.</p>
        <section class="search-box">
            <form class="search-form" method="GET" action="products.php">
                <input class="form-control" type="text" name="keyword" placeholder="Tìm sản phẩm..."
                    value="<?= htmlspecialchars($keyword, ENT_QUOTES, 'UTF-8') ?>">
                <input class="form-control" type="number" name="min_price" placeholder="Giá từ..."
                    value="<?= htmlspecialchars($minPrice, ENT_QUOTES, 'UTF-8') ?>">

                <input class="form-control" type="number" name="max_price" placeholder="Giá đến..."
                    value="<?= htmlspecialchars($maxPrice, ENT_QUOTES, 'UTF-8') ?>">
                <button class="btn" type="submit">Tìm kiếm</button>
            </form>
            <p class="search-note">Ví dụ: <strong>vku</strong>, <strong>áo</strong>, <strong>balo</strong>.</p>
        </section>

        <section class="product-grid">
            <?php foreach ($filteredProducts as $p): ?>
            <article class="product-card">
                <div class="product-thumb">
                    🎒
                </div>

                <div class="product-body">
                    <h2 class="product-name">
                        <?= htmlspecialchars($p['name'], ENT_QUOTES, 'UTF-8') ?>
                    </h2>

                    <p class="product-price">
                        <?= number_format($p['price']) ?>
                        <?php if ($p ['stock'] > 0): ?>
                        <span style=" color: green;"> ● Cao cấp</span>
                        <?php else: ?>
                        <span></span>
                        <?php endif; ?>
                    </p>

                    <div class="product-meta">
                        <span class="badge badge-in-stock">
                            <?php if ($p ['stock'] > 0): ?>
                            <span>Còn hàng</span>
                            <?php else: ?>
                            <span style=" color: red" ;>❌Hết hàng</span>
                            <?php endif; ?>
                        </span>

                        <span class=" badge badge-premium">
                            <?= $p['icon'] ?>
                        </span>
                    </div>
                </div>
            </article>
            <?php endforeach; ?>



            <!-- TODO 3: Dựa vào card HTML mẫu phía trên, dùng foreach để render toàn bộ $products. -->
            <!-- TODO 4:
             Thay giá hard-code bằng dữ liệu PHP
             và dùng number_format().
        -->

            <!-- TODO 5:
             stock > 0 => Còn hàng
             ngược lại => Hết hàng.
        -->

            <!-- TODO 6:
             price >= 300000 => thêm badge Cao cấp.
        -->

            <!-- TODO 7:
             Dùng htmlspecialchars() khi output dữ liệu phù hợp.
        -->
        </section>
    </main>
    <footer class="site-footer">
        <div class="footer-inner">VKUShop • Công nghệ và lập trình web • VKU</div>
    </footer>
</body>

</html>