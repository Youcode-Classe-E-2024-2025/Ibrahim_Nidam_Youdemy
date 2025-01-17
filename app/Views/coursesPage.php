<?php 
$pageTitle = isset($keyword) && !empty($keyword) ? "Search Results - Youdemy" : "Courses - Youdemy";
require_once realpath(__DIR__ . '/layout/header.php');
?>

<body class="bg-background font-sans">
    <!-- Navbar -->
<nav class="bg-card shadow-sm w-full z-50">
    <div class="container mx-auto px-4 py-3 flex items-center justify-between">
        <div class="text-2xl font-bold text-primary">Youdemy</div>
        <div class="hidden md:flex space-x-6">
            <input type="hidden" name="">
            <a href="../Public" class="text-foreground hover:text-primary">Home</a>
            <?php if (isset($keyword) && !empty($keyword)): ?>
                <a href="coursesPage" class="text-foreground hover:text-primary">Courses</a>
            <?php endif; ?>
            <a href="404" class="text-foreground hover:text-primary">Categories</a>
            <?php if(isset($_SESSION["id"])): ?>
                <a href="users/<?= $_SESSION["role"] == "admin" ? "AdminDash" : ($_SESSION["role"] == "teacher" ? "TeacherDash" : "StudentProfile") ?>" class="text-foreground hover:text-primary">Dashboard</a>
            <?php endif; ?>
        </div>
        <?php if(!isset($_SESSION["id"])): ?>
        <?php require_once "layout/login_signup_forms.php" ?>
        <?php else:?>
            <div class="flex items-center space-x-4">
                <a href="logout" class="px-4 py-2 text-primary-foreground bg-primary rounded hover:bg-opacity-90">Logout</a>
            </div>
        <?php endif; ?>
    </div>
</nav>

    <!-- Hero Section -->
    <section class="h-64 flex flex-col items-center justify-center bg-primary text-center">
        <?php if (isset($keyword) && !empty($keyword)): ?>
            <h1 class="text-4xl font-bold text-primary-foreground">Search Results for "<?php echo htmlspecialchars($keyword); ?>"</h1>
        <?php else: ?>
            <h1 class="text-4xl font-bold text-primary-foreground">Explore Our Courses</h1>
            <p class="text-xl mt-2 text-primary-foreground">Find the perfect course for you</p>
        <?php endif; ?>
    </section>

<!-- Search Bar -->
<div class="container mx-auto mt-8 px-4">
    <form action="search" method="GET" class="relative w-full md:max-w-2xl mx-auto">
        <input 
            type="text" 
            name="keyword" 
            value="<?php echo isset($keyword) ? htmlspecialchars($keyword) : ''; ?>"
            placeholder="Search for courses..." 
            class="w-full px-6 py-3 rounded-full border border-input focus:ring-2 focus:ring-primary focus:outline-none text-accent shadow-sm">
        <button type="submit" class="absolute right-3 top-2/4 -translate-y-2/4 bg-primary text-white px-6 py-2 rounded-full hover:bg-opacity-90">Search</button>
    </form>
</div>

<!-- Courses Grid -->
<?php require_once realpath(__DIR__ . '/layout/cards.php'); ?>
<section class="py-12 container mx-auto px-4">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php if (!empty($courses)): ?>
            <?php foreach ($courses as $course): ?>
                <?= renderCard($course); ?>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-center col-span-full text-accent">No courses found.</p>
        <?php endif; ?>
    </div>
</section>

<!-- Pagination -->
<?php if (!isset($keyword) || empty($keyword)): ?>
<div class="container mx-auto px-4 flex justify-center my-12">
    <?= renderPagination($currentPage, $totalPages); ?>
</div>
<?php endif; ?>

<?php require_once "layout/footer.php" ?>

</body>

</html>
