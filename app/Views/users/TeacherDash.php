
<?php 
$pageTitle = "Teacher's Dashboard - Youdemy";
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
<main class="p-8">
    
<div class="mb-8">
    <h1 class="text-heading font-bold text-foreground mb-6">Teacher Dashboard</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
        <!-- Total Courses Card -->
        <div class="bg-card p-6 rounded-sm shadow-sm border border-border">
            <h3 class="text-accent-foreground mb-2">Total Courses</h3>
            <p class="text-3xl font-bold text-chart-1"><?php echo $total_courses; ?></p>
        </div>
        <!-- Total Students Card -->
        <div class="bg-card p-6 rounded-sm shadow-sm border border-border">
            <h3 class="text-accent-foreground mb-2">Total Students</h3>
            <p class="text-3xl font-bold text-chart-3"><?php echo $total_students; ?></p>
        </div>
        <!-- Pending Courses Card -->
        <div class="bg-card p-6 rounded-sm shadow-sm border border-border">
            <h3 class="text-accent-foreground mb-2">Pending Courses</h3>
            <p class="text-3xl font-bold text-chart-4"><?php echo $pending_courses; ?></p>
        </div>
    </div>
</div>

<?php require_once realpath(__DIR__ . '/../layout/teacher/addCourse.php'); ?>
<?php require_once realpath(__DIR__ . '/../layout/teacher/teacherCourses.php'); ?>

</main>

<?php require_once realpath(__DIR__ . '/../layout/footer.php'); ?>



<script src="../../Public/assets/js/teacherDash.js"></script>
</body>
</html>