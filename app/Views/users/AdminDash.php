<?php 
$pageTitle = "Administrator - Youdemy";
require_once realpath(__DIR__ . '/../layout/header.php');
?>

<body class="bg-background font-sans">
    <!-- Navbar -->
<nav class="bg-card shadow-sm w-full">
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

<!-- Main Content -->
<main class="flex-1 overflow-auto p-8">
<div class="mb-8">
    <h2 class="text-heading font-heading text-foreground mb-4">Admin Dashboard</h2>

    <!-- Total Courses and Course with Most Students in the same line -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <!-- Total Courses Card -->
        <div class="bg-card p-6 rounded-sm shadow-sm border border-border">
            <h3 class="text-2xl underline font-bold mb-2">Total Courses</h3>
            <p class="text-3xl font-bold text-primary"><?php echo $total_courses; ?></p>
        </div>

        <!-- Course with Most Students Card -->
        <div class="bg-card p-6 rounded-sm shadow-sm border border-border">
            <h3 class="text-2xl underline font-bold mb-2">Course with Most Students</h3>
            <?php if (!empty($course_with_most_students)): ?>
                <h4 class="text-accent-foreground mb-2"><?php echo $course_with_most_students['title']; ?></h4>
                <p class="text-3xl font-bold text-chart-4"><?php echo $course_with_most_students['student_count']; ?></p>
            <?php else: ?>
                <p class="text-muted-foreground">No courses found.</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Courses by Category Section -->
    <div class="mb-8">
        <h3 class="text-heading font-heading text-foreground underline mb-4">Courses by Category</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($courses_by_category as $category): ?>
                <div class="bg-card p-6 rounded-sm shadow-sm border border-border">
                    <h4 class="text-accent-foreground mb-2"><?php echo $category['category_name']; ?></h4>
                    <p class="text-chart-5">Number of Courses: <?php echo $category['course_count']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Top 3 Teachers Section -->
    <div class="mb-8">
        <h3 class="text-heading font-heading text-foreground underline mb-4">Top 3 Teachers</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($top_teachers as $teacher): ?>
                <div class="bg-card p-6 rounded-sm shadow-sm border border-border">
                    <h4 class="text-accent-foreground mb-2"><?php echo $teacher['name']; ?></h4>
                    <p class="text-chart-3">Number of Courses: <?php echo $teacher['course_count']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php require_once realpath(__DIR__ . '/../layout/admin/teachers.php'); ?>
<?php require_once realpath(__DIR__ . '/../layout/admin/courses.php'); ?>
<?php require_once realpath(__DIR__ . '/../layout/admin/users.php'); ?>
<?php require_once realpath(__DIR__ . '/../layout/admin/tags&cats.php'); ?>


<?php require_once realpath(__DIR__ . '/../layout/footer.php'); ?>
</body>
</html>