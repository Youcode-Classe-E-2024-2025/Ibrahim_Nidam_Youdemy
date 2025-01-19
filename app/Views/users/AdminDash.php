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

<!-- Pending Teachers -->
<div class="bg-card p-6 rounded-sm shadow-sm mb-8">
    <h2 class="text-heading font-heading underline mb-6">Pending Teacher Applications</h2>
    <div class="overflow-x-auto">
        <table class="w-full table-fixed">
            <thead>
                <tr class="border-b border-border">
                    <th class="text-left py-4 px-4 font-heading w-1/4">Name</th>
                    <th class="text-left py-4 px-4 font-heading w-1/4">Email</th>
                    <th class="text-left py-4 px-4 font-heading w-1/4">Status</th>
                    <th class="text-left py-4 px-4 font-heading w-1/4">Actions</th>
                </tr>
            </thead>
        </table>
        <!-- Scrollable tbody -->
        <div class="max-h-64 overflow-y-auto">
            <table class="w-full table-fixed">
                <tbody>
                    <?php foreach ($pendingTeachers as $teacher): ?>
                    <tr class="border-b border-border">
                        <td class="py-4 px-4 w-1/4"><?= htmlspecialchars($teacher['name']) ?></td>
                        <td class="py-4 px-4 w-1/4"><?= htmlspecialchars($teacher['email']) ?></td>
                        <td class="py-4 px-4 w-1/4">
                            <span class="bg-chart-4/20 text-chart-4 px-2 py-1 rounded-sm w-20 text-center block">Pending</span>
                        </td>
                        <td class="py-4 px-4 w-1/4">
                            <form method="POST" action="<?php echo url('/users/AdminDash'); ?>">
                                <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
                                <input type="hidden" name="id" value="<?= $teacher['id'] ?>">
                                <button type="submit" name="action" value="approve_teacher" class="bg-chart-2 text-white px-4 py-1 rounded-sm mb-2">Approve</button>
                                <button type="submit" name="action" value="reject_teacher" class="bg-destructive text-white px-4 py-1 rounded-sm">Reject</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Pending Courses -->
<div class="bg-card p-6 rounded-sm shadow-sm mb-8">
    <h2 class="text-heading font-heading underline mb-6">Pending Courses Applications</h2>
    <div class="overflow-x-auto">
        <table class="w-full table-fixed">
            <thead>
                <tr class="border-b border-border">
                    <th class="text-left py-4 px-4 font-heading w-1/4">Course Title</th>
                    <th class="text-left py-4 px-4 font-heading w-1/4">Teacher Email</th>
                    <th class="text-left py-4 px-4 font-heading w-1/4">Status</th>
                    <th class="text-left py-4 px-4 font-heading w-1/4">Actions</th>
                </tr>
            </thead>
        </table>
        <!-- Scrollable tbody -->
        <div class="max-h-64 overflow-y-auto">
            <table class="w-full table-fixed">
                <tbody>
                    <?php foreach ($pendingCourses as $course): ?>
                    <tr class="border-b border-border">
                        <td class="py-4 px-4 w-1/4"><?= htmlspecialchars($course['title']) ?></td>
                        <td class="py-4 px-4 w-1/4"><?= htmlspecialchars($course['teacher_email']) ?></td>
                        <td class="py-4 px-4 w-1/4">
                            <span class="bg-chart-4/20 text-chart-4 px-2 py-1 rounded-sm w-20 text-center block">Pending</span>
                        </td>
                        <td class="py-4 px-4 w-1/4">
                            <form method="POST" action="<?php echo url('/users/AdminDash'); ?>">
                                <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
                                <input type="hidden" name="id" value="<?= $course['id'] ?>">
                                <button type="submit" name="action" value="approve_course" class="bg-chart-2 text-white px-4 py-1 rounded-sm mb-2">Approve</button>
                                <button type="submit" name="action" value="reject_course" class="bg-destructive text-white px-4 py-1 rounded-sm">Reject</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- User Management -->
<div class="bg-card p-6 rounded-sm shadow-sm mb-8">
    <h2 class="text-heading font-heading underline mb-6">User Management</h2>
    <div class="overflow-x-auto">
        <table class="w-full table-fixed">
            <thead>
                <tr class="border-b border-border">
                    <th class="text-left py-4 px-4 font-heading w-1/4">User</th>
                    <th class="text-left py-4 px-4 font-heading w-1/4">Role</th>
                    <th class="text-left py-4 px-4 font-heading w-1/4">Status</th>
                    <th class="text-left py-4 px-4 font-heading w-1/4">Actions</th>
                </tr>
            </thead>
        </table>
        <!-- Scrollable tbody -->
        <div class="max-h-64 overflow-y-auto">
            <table class="w-full table-fixed">
                <tbody>
                    <tr class="border-b border-border">
                        <td class="py-4 px-4 w-1/4">
                            <div class="flex items-center justify-between">
                                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e" alt="User" class="w-8 h-8 rounded-full mr-3">
                                <span class="w-full">Sarah Wilson</span>
                            </div>
                        </td>
                        <td class="py-4 px-4 w-1/4 text-left">Student</td>
                        <td class="py-4 px-4 w-1/4">
                            <span class="bg-chart-2/20 text-chart-2 px-2 py-1 rounded-sm w-full">Active</span>
                        </td>
                        <td class="py-4 px-4 w-1/4">
                            <div >
                                <button class="text-chart-4 hover:text-chart-4/80 mr-4">Suspend</button>
                                <button class="text-destructive hover:text-destructive/80">Delete</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php require_once realpath(__DIR__ . '/../layout/admin/tags&cats.php'); ?>





<?php require_once realpath(__DIR__ . '/../layout/footer.php'); ?>
</body>
</html>