<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses - Youdemy</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
            extend: {
                colors: {
                primary: {
                    DEFAULT: "#E11D48",
                    foreground: "#FFFFFF"
                },
                secondary: {
                    DEFAULT: "#F0F1F3",
                    foreground: "#020817"
                },
                accent: {
                    DEFAULT: "#6D7074",
                    foreground: "#020817"
                },
                background: "#FAFAFB",
                foreground: "#020817",
                card: {
                    DEFAULT: "#FFFFFF",
                    foreground: "#020817"
                },
                popover: {
                    DEFAULT: "#FFFFFF",
                    foreground: "#020817"
                },
                muted: {
                    DEFAULT: "#F0F1F3",
                    foreground: "#6D7074"
                },
                destructive: {
                    DEFAULT: "#FF4C4C",
                    foreground: "#FFFFFF"
                },
                border: "#E0E0E0",
                input: "#E0E0E0",
                ring: "#E11D48",
                chart: {
                    1: "#FF6F61",
                    2: "#4CAF50",
                    3: "#03A9F4",
                    4: "#FFC107",
                    5: "#8E44AD"
                }
                },
                fontFamily: {
                sans: ["Inter", "sans-serif"]
                },
                fontSize: {
                heading: "28px",
                body: "16px"
                },
                fontWeight: {
                heading: "600",
                body: "400"
                },
                borderRadius: {
                sm: "0.125rem"
                },
                boxShadow: {
                sm: "0 1px 2px 0 rgb(0 0 0 / 0.05)"
                }
            }
            },
            darkMode: "class"
        }
    </script>
</head>

<body class="bg-background font-sans">
    <!-- Navbar -->
    <nav class="bg-card shadow-sm w-full z-50">
        <div class="container mx-auto px-4 py-3 flex items-center justify-between">
            <a href="../Public" class="text-2xl font-bold text-primary">Youdemy</a>
            
            <div class="flex items-center space-x-4">
                <button class="px-4 py-2 text-primary-foreground bg-primary rounded hover:bg-opacity-90">Sign In</button>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="h-64 flex flex-col items-center justify-center bg-primary text-center">
        <h1 class="text-4xl font-bold text-primary-foreground">Explore Our Courses</h1>
        <p class="text-xl mt-2 text-primary-foreground">Find the perfect course for you</p>
    </section>

    <!-- Search Bar -->
    <div class="container mx-auto mt-8 px-4">
        <form class="relative w-full md:max-w-2xl mx-auto">
            <input type="text" placeholder="Search for courses..." class="w-full px-6 py-3 rounded-full border border-input focus:ring-2 focus:ring-primary focus:outline-none text-accent shadow-sm">
            <button type="submit" class="absolute right-3 top-2/4 -translate-y-2/4 bg-primary text-white px-6 py-2 rounded-full hover:bg-opacity-90">Search</button>
        </form>
    </div>

    <!-- Courses Grid -->
    <section class="py-12 container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Course Card -->
            <div class="bg-card rounded-lg shadow-sm overflow-hidden hover:shadow-lg transition">
                <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085" alt="Course Thumbnail" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-semibold">Complete Web Development</h3>
                    <p class="text-accent mt-2">Instructor: John Doe</p>
                    <p class="text-accent mt-2">Category: Programming</p>
                    <button class="mt-4 px-4 py-2 bg-primary text-primary-foreground rounded hover:bg-opacity-90">View Details</button>
                </div>
            </div>

            <!-- More course cards (repeat dynamically) -->
            <div class="bg-card rounded-lg shadow-sm overflow-hidden hover:shadow-lg transition">
                <img src="https://images.unsplash.com/photo-1542831371-29b0f74f9713" alt="Course Thumbnail" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-semibold">Data Science Masterclass</h3>
                    <p class="text-accent mt-2">Instructor: Jane Smith</p>
                    <p class="text-accent mt-2">Category: Data Science</p>
                    <button class="mt-4 px-4 py-2 bg-primary text-primary-foreground rounded hover:bg-opacity-90">View Details</button>
                </div>
            </div>

            <div class="bg-card rounded-lg shadow-sm overflow-hidden hover:shadow-lg transition">
                <img src="https://images.unsplash.com/photo-1551434678-e076c223a692" alt="Course Thumbnail" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-semibold">UX Design Fundamentals</h3>
                    <p class="text-accent mt-2">Instructor: Alex Brown</p>
                    <p class="text-accent mt-2">Category: Design</p>
                    <button class="mt-4 px-4 py-2 bg-primary text-primary-foreground rounded hover:bg-opacity-90">View Details</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Pagination -->
    <div class="container mx-auto px-4 flex justify-center mt-8">
        <nav class="inline-flex items-center space-x-2">
            <button class="px-4 py-2 bg-card border border-border text-accent rounded hover:bg-muted">Previous</button>
            <button class="px-4 py-2 bg-primary text-white rounded">1</button>
            <button class="px-4 py-2 bg-card border border-border text-accent rounded hover:bg-muted">2</button>
            <button class="px-4 py-2 bg-card border border-border text-accent rounded hover:bg-muted">3</button>
            <button class="px-4 py-2 bg-card border border-border text-accent rounded hover:bg-muted">Next</button>
        </nav>
    </div>

    <!-- Footer -->
    <footer class="bg-card py-12 mt-12">
        <div class="container mx-auto px-4 text-center text-accent">
            <p>© <?= date("Y") ?> Youdemy. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>
