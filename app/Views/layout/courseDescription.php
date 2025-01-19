<?php
$pageTitle ="Youdemy - Course Description"; 
require_once "header.php" ?>

<nav class="bg-card shadow-sm w-full z-50">
    <div class="container mx-auto px-4 py-3 flex items-center justify-between">
        <div class="text-2xl font-bold text-primary">Youdemy</div>
        <div class="hidden md:flex space-x-6">
            <input type="hidden" name="">
            <a href="<?= BASE_URL ?>" class="text-foreground hover:text-primary">Home</a>
            <a href="<?= BASE_URL ?>coursesPage" class="text-foreground hover:text-primary">Courses</a>
        </div>
        <?php if(!isset($_SESSION["id"])): ?>
            <?php require_once "login_signup_forms.php" ?>
            <?php else:?>
                <div class="flex items-center space-x-4">
                    <a href="../../logout" class="px-4 py-2 text-primary-foreground bg-primary rounded hover:bg-opacity-90">Logout</a>
                </div>
                <?php endif; ?>
        </div>
    </div>
</nav>

<!-- courseDescription.php -->
<div class="container mx-auto p-6 max-w-4xl">
    <!-- Course Title -->
    <h1 class="text-4xl font-bold mb-6 text-gray-800"><?php echo htmlspecialchars($course['course_title'] ?? 'N/A'); ?></h1>

    <!-- Course Description -->
    <div class="bg-white p-6 rounded-lg shadow-md mb-6">
        <p class="text-gray-700 leading-relaxed"><?php echo htmlspecialchars($course['course_description'] ?? 'No description available.'); ?></p>
    </div>

    <!-- Course Details Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <!-- Category -->
        <div class="bg-white p-4 rounded-lg shadow-sm">
            <span class="text-lg font-semibold text-primary">Category:</span>
            <span class="text-gray-600 ml-2"><?php echo htmlspecialchars($course['category_name'] ?? 'N/A'); ?></span>
        </div>

        <!-- Content Type -->
        <div class="bg-white p-4 rounded-lg shadow-sm">
            <span class="text-lg font-semibold text-primary">Content Type:</span>
            <span class="text-gray-600 ml-2"><?php echo htmlspecialchars($course['course_content_type'] ?? 'N/A'); ?></span>
        </div>

        <!-- Rating -->
    <div class="bg-white p-4 rounded-lg shadow-sm">
        <span class="text-lg font-semibold text-primary">Rating:</span>
        <span class="text-gray-600 ml-2">
            <?php echo htmlspecialchars($course['course_rating'] ?? '0'); ?> / 5
            <span class="text-yellow-400">
                <?php echo generateStars($course['course_rating'] ?? 0); ?>
            </span>
        </span>
    </div>

        <!-- Instructor -->
        <div class="bg-white p-4 rounded-lg shadow-sm">
            <span class="text-lg font-semibold text-primary">Instructor:</span>
            <span class="text-gray-600 ml-2"><?php echo htmlspecialchars($course['instructor_name'] ?? 'N/A'); ?></span>
        </div>

        <!-- Tags -->
        <div class="bg-white p-4 rounded-lg shadow-sm">
            <span class="text-lg font-semibold text-primary">Tags:</span>
            <span class="text-gray-600 ml-2"><?php echo htmlspecialchars($course['tags'] ?? 'No tags available.'); ?></span>
        </div>
    </div>

    <!-- Download Button -->
    <div class="text-center mt-8">
        <a href="#" class="inline-flex items-center bg-primary text-white px-6 py-3 rounded-lg hover:bg-primary-dark transition transform hover:scale-105">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
            </svg>
            Download Resources
        </a>
    </div>

    <!-- Additional Resources Section -->
    <div class="mt-12">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Additional Resources</h2>
        <div class="space-y-4">
            <div class="bg-white p-4 rounded-lg shadow-sm hover:shadow-md transition">
                <h3 class="text-lg font-semibold text-primary">Resource 1</h3>
                <p class="text-gray-600">A detailed guide to mastering this course.</p>
            </div>
            <div class="bg-white p-4 rounded-lg shadow-sm hover:shadow-md transition">
                <h3 class="text-lg font-semibold text-primary">Resource 2</h3>
                <p class="text-gray-600">Cheat sheets and quick references.</p>
            </div>
        </div>
    </div>
</div>

<?php require_once "footer.php" ?>