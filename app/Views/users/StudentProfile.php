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
                <a href="#catalog" class="text-foreground hover:text-primary">Course Catalog</a>
                <a href="#my-courses" class="text-foreground hover:text-primary">My Courses</a>
            </div>
            <div class="flex items-center space-x-4">
                <button class="px-4 py-2 text-primary-foreground bg-primary rounded hover:bg-opacity-90">Logout</button>
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
                <!-- Enrolled Course Card -->
                <div class="bg-card rounded-lg shadow-sm hover:shadow-lg overflow-hidden transition">
                    <img src="https://images.unsplash.com/photo-1551434678-e076c223a692" alt="Course Thumbnail" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-xl font-semibold">UX Design Basics</h3>
                        <p class="text-accent mt-2">Progress: 40%</p>
                        <button class="mt-4 px-4 py-2 bg-primary text-primary-foreground rounded hover:bg-opacity-90">Continue Course</button>
                    </div>
                </div>

                <div class="bg-card rounded-lg shadow-sm hover:shadow-lg overflow-hidden transition">
                    <img src="https://images.unsplash.com/photo-1506748686214-e9df14d4d9d0" alt="Course Thumbnail" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-xl font-semibold">Introduction to Python</h3>
                        <p class="text-accent mt-2">Progress: 75%</p>
                        <button class="mt-4 px-4 py-2 bg-primary text-primary-foreground rounded hover:bg-opacity-90">Continue Course</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php require_once realpath(__DIR__ . '/../layout/footer.php'); ?>


</body>

</html>
