<?php 
$pageTitle = "Student Profile - Youdemy";
require_once realpath(__DIR__ . '/../layout/header.php');
?>

<body class="bg-background font-sans">
    <!-- Navbar -->
    <nav class="bg-card shadow-sm w-full z-50">
        <div class="container mx-auto px-4 py-3 flex items-center justify-between">
            <div class="text-2xl font-bold text-primary">Youdemy</div>
            <div class="hidden md:flex space-x-6">
                <a href="../../Public" class="text-foreground hover:text-primary">Home</a>
                <a href="../coursesPage" class="text-foreground hover:text-primary">Courses</a>
            </div>
            <div class="flex items-center space-x-4">
                <a href="../logout" class="px-4 py-2 text-primary-foreground bg-primary rounded hover:bg-opacity-90">Logout</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="h-64 flex items-center justify-center bg-primary">
        <h1 class="text-4xl font-bold text-primary-foreground">Welcome to Your Learning Dashboard!</h1>
    </section>

    <!-- My Courses -->
    <section id="my-courses" class="py-16 bg-muted">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-foreground mb-6">My Courses</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php if (!empty($courses)): ?>
                    <?php foreach ($courses as $course): ?>
                        <div class="bg-card rounded-lg shadow-sm hover:shadow-lg overflow-hidden transition flex flex-col h-full">
                            <img src="https://picsum.photos/400/300?random=<?php echo rand(1, 1000); ?>" alt="<?php echo htmlspecialchars($course['title']); ?>" class="w-full h-48 object-cover">
                            <div class="p-4 flex-grow">
                                <h3 class="text-xl font-semibold"><?php echo htmlspecialchars($course['title']); ?></h3>
                                <p class="text-accent mt-2"><?php echo htmlspecialchars($course['description']); ?></p>
                            </div>
                            <a href="../layout/courseDescription/<?php echo urlencode($course['id']); ?>" 
                                class="w-full bg-primary text-primary-foreground px-4 py-2 text-center block hover:bg-primary-dark transition">
                                Continue Course
                            </a>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-gray-600">You have not enrolled in any courses yet.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <?php require_once realpath(__DIR__ . '/../layout/footer.php'); ?>

</body>
</html>
