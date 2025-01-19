
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

        <!-- Course Management Form -->
        <div class="bg-card p-6 rounded-sm shadow-sm mb-8">
            <h2 class="text-heading font-heading mb-6">Add New Course</h2>
            <form class="bg-muted p-6 rounded shadow-sm" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrf_token); ?>">
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Title</label>
                    <input type="text" name="title" class="w-full px-4 py-2 border border-border rounded-sm" placeholder="Course Title" required>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Description</label>
                    <textarea name="description" class="w-full px-4 py-2 border border-border rounded-sm" placeholder="Course Description"></textarea>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Category</label>
                    <select name="category_id" class="w-full px-4 py-2 border border-border rounded-sm">
                        <option value="1">Programming</option>
                        <option value="2">Data Science</option>
                        <option value="3">Business</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block mb-4">
                        <span class="text-gray-600 mr-4">Content Type:</span>
                        <div id="contentTypeToggle" class="inline-flex mt-2 select-none">
                            <button
                                id="videoBtn"
                                type="button"
                                class="px-4 py-2 text-white mr-2 bg-primary text-white"
                                onclick="toggleContentType('video')"
                            >
                                Video
                            </button>
                            <button
                                id="documentBtn"
                                type="button"
                                class="px-4 py-2 bg-gray-200 text-gray-800"
                                onclick="toggleContentType('document')"
                            >
                                Document
                            </button>
                        </div>
                        <input type="hidden" name="content_type" id="contentTypeInput" value="video" />
                    </label>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Upload Content (MP4/PDF)</label>
                    <input type="file" name="content_path" class="w-full px-4 py-2 border border-border rounded-sm" accept=".mp4,.pdf" required>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Tags</label>
                    <select name="tags[]" class="chosen-select w-full px-4 py-2 border border-border rounded-sm" multiple>
                        <option value="JavaScript">JavaScript</option>
                        <option value="Python">Python</option>
                        <option value="HTML">HTML</option>
                        <option value="CSS">CSS</option>
                        <option value="SQL">SQL</option>
                    </select>
                </div>
                <button type="submit" class="bg-primary text-white px-6 py-2 rounded-sm">Add Course</button>
            </form>
        </div>

        <!-- Course List -->
<div class="bg-card p-6 rounded-sm shadow-sm mb-8">
    <h2 class="text-heading font-heading mb-6">Manage Courses</h2>
    <div class="overflow-x-auto max-h-96 overflow-y-auto border border-border rounded-sm">
        <table class="w-full border-collapse">
            <thead class="bg-muted sticky top-0">
                <tr>
                    <th class="px-4 py-2 text-left">Title</th>
                    <th class="px-4 py-2 text-left">Category</th>
                    <th class="px-4 py-2 text-left">Content Type</th>
                    <th class="px-4 py-2 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($courses as $course): ?>
                <tr class="border-b border-border">
                    <td class="px-4 py-2"><?= htmlspecialchars($course['title']) ?></td>
                    <td class="px-4 py-2"><?= htmlspecialchars($course['category_name']) ?></td>
                    <td class="px-4 py-2"><?= htmlspecialchars($course['content_type']) ?></td>
                    <td class="px-4 py-2 flex gap-4">
                        <form method="POST" action="<?php echo url('/users/TeacherDash'); ?>">
                            <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
                            <input type="hidden" name="id" value="<?= $course['id'] ?>">
                            <button class="text-blue-600 hover:text-blue-400">Edit</button>
                            <button type="submit" name="action" value="delete_course" class="text-destructive hover:text-destructive/80">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

    </main>
    
    <?php require_once realpath(__DIR__ . '/../layout/footer.php'); ?>



    <script src="../../Public/assets/js/teacherDash.js"></script>
</body>
</html>