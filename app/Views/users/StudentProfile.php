<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile - Youdemy</title>
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

    <!-- Footer -->
    <footer class="bg-card py-12">
        <div class="container mx-auto px-4 text-center text-accent">
            <p>© <?= date("Y") ?> Youdemy. All rights reserved.</p>
        </div>
    </footer>

</body>

</html>
