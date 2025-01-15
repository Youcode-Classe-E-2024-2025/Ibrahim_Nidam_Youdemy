<?php 
$pageTitle = "Youdemy - Learn Anything, Anytime";
require_once realpath(__DIR__ . '/layout/header.php');
?>

<body class="bg-background font-sans m-0">

<!-- Navbar -->
<nav class="bg-card shadow-sm fixed w-full z-50">
    <div class="container mx-auto px-4 py-3 flex items-center justify-between">
        <div class="text-2xl font-bold text-primary">Youdemy</div>
        <div class="hidden md:flex space-x-6">
            <input type="hidden" name="">
            <a href="coursesPage" class="text-foreground hover:text-primary">Courses</a>
            <a href="404" class="text-foreground hover:text-primary">Categories</a>
            <a href="users/AdminDash" class="text-foreground hover:text-primary">Categories</a>
        </div>
        <?php require_once "layout/login_signup_forms.php" ?>
    </div>
</nav>

<!-- Hero Section -->
<section class="relative h-screen flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 bg-foreground bg-opacity-60"></div>
    <div class="relative text-center px-4">
        <h1 class="text-6xl md:text-7xl font-bold text-primary-foreground mb-6">Learn Without Limits</h1>
        <p class="text-xl md:text-2xl text-primary-foreground mb-8">Start, switch, or advance your career with thousands of courses</p>
        <button class="px-8 py-4 bg-primary text-primary-foreground rounded-lg text-lg font-semibold hover:bg-opacity-90 transform hover:scale-105 transition">Explore Courses</button>
    </div>
</section>

<!-- Trending Courses -->
<section class="py-16 bg-card">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-foreground mb-8">Trending Courses</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-card rounded-lg shadow-sm overflow-hidden hover:shadow-lg transition">
                <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085" alt="Web Development" class="w-full h-48 object-cover">
                <div class="p-4">
                    <span class="bg-destructive text-destructive-foreground text-sm px-2 py-1 rounded">HOT</span>
                    <h3 class="text-lg font-semibold mt-2">Complete Web Development 2024</h3>
                    <p class="text-accent mt-1">Learn modern web development from scratch</p>
                    <div class="mt-4 flex items-center justify-between">
                        <span class="text-primary font-semibold">$89.99</span>
                        <div class="flex items-center">
                            <span class="text-chart-4">4.8</span>
                            <span class="text-chart-4 ml-1">★★★★★</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="bg-card rounded-lg shadow-sm overflow-hidden hover:shadow-lg transition">
                <img src="https://images.unsplash.com/photo-1542831371-29b0f74f9713" alt="Data Science" class="w-full h-48 object-cover">
                <div class="p-4">
                    <span class="bg-chart-3 text-primary-foreground text-sm px-2 py-1 rounded">NEW</span>
                    <h3 class="text-lg font-semibold mt-2">Data Science Masterclass</h3>
                    <p class="text-accent mt-1">Master data science and machine learning</p>
                    <div class="mt-4 flex items-center justify-between">
                        <span class="text-primary font-semibold">$99.99</span>
                        <div class="flex items-center">
                            <span class="text-chart-4">4.9</span>
                            <span class="text-chart-4 ml-1">★★★★★</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-card rounded-lg shadow-sm overflow-hidden hover:shadow-lg transition">
                <img src="https://images.unsplash.com/photo-1551434678-e076c223a692" alt="UX Design" class="w-full h-48 object-cover">
                <div class="p-4">
                    <span class="bg-chart-2 text-primary-foreground text-sm px-2 py-1 rounded">TRENDING</span>
                    <h3 class="text-lg font-semibold mt-2">UX Design Fundamentals</h3>
                    <p class="text-accent mt-1">Create amazing user experiences</p>
                    <div class="mt-4 flex items-center justify-between">
                        <span class="text-primary font-semibold">$79.99</span>
                        <div class="flex items-center">
                            <span class="text-chart-4">4.7</span>
                            <span class="text-chart-4 ml-1">★★★★★</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once "layout/home/staticContent.php" ?>

<?php require_once "layout/footer.php" ?>
</body>
</html>