<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youdemy - Learn Anything, Anytime</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>

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
    <nav class="bg-card shadow-sm fixed w-full z-50">
        <div class="container mx-auto px-4 py-3 flex items-center justify-between">
            <div class="text-2xl font-bold text-primary">Youdemy</div>
            <div class="hidden md:flex space-x-6">
                <a href="#" class="text-foreground hover:text-primary">Courses</a>
                <a href="#" class="text-foreground hover:text-primary">Categories</a>
                <a href="#" class="text-foreground hover:text-primary">Teach</a>
            </div>
            <div class="flex items-center space-x-4">
                <button class="px-4 py-2 text-primary-foreground bg-primary rounded hover:bg-opacity-90">Sign In</button>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative h-screen flex items-center justify-center overflow-hidden">
        <video autoplay loop muted class="absolute w-full h-full object-cover">
            <source src="https://player.vimeo.com/external/434045526.sd.mp4?s=c27ebe7ec1c6bab198895f2e66a3d4fc29e2ae75&profile_id=164" type="video/mp4">
        </video>
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

    <!-- Categories -->
    <section class="py-16 bg-background">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-foreground mb-8">Popular Categories</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="bg-chart-1 bg-opacity-10 p-6 rounded-lg hover:bg-opacity-20 transition cursor-pointer">
                    <h3 class="text-xl font-semibold text-foreground">Programming</h3>
                    <p class="text-accent mt-2">10,000+ courses</p>
                </div>
                <div class="bg-chart-2 bg-opacity-10 p-6 rounded-lg hover:bg-opacity-20 transition cursor-pointer">
                    <h3 class="text-xl font-semibold text-foreground">Design</h3>
                    <p class="text-accent mt-2">5,000+ courses</p>
                </div>
                <div class="bg-chart-3 bg-opacity-10 p-6 rounded-lg hover:bg-opacity-20 transition cursor-pointer">
                    <h3 class="text-xl font-semibold text-foreground">Business</h3>
                    <p class="text-accent mt-2">8,000+ courses</p>
                </div>
                <div class="bg-chart-4 bg-opacity-10 p-6 rounded-lg hover:bg-opacity-20 transition cursor-pointer">
                    <h3 class="text-xl font-semibold text-foreground">Marketing</h3>
                    <p class="text-accent mt-2">6,000+ courses</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Section -->
    <section class="py-16 bg-card">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-foreground mb-12 text-center">Why Choose Youdemy?</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="text-5xl font-bold text-primary mb-4">50K+</div>
                    <h3 class="text-xl font-semibold mb-2">Expert Instructors</h3>
                    <p class="text-accent">Learn from industry experts</p>
                </div>
                <div class="text-center">
                    <div class="text-5xl font-bold text-primary mb-4">1M+</div>
                    <h3 class="text-xl font-semibold mb-2">Active Students</h3>
                    <p class="text-accent">Join our learning community</p>
                </div>
                <div class="text-center">
                    <div class="text-5xl font-bold text-primary mb-4">100K+</div>
                    <h3 class="text-xl font-semibold mb-2">Course Library</h3>
                    <p class="text-accent">Find the perfect course</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Become a Teacher -->
    <section class="py-16 bg-primary">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold text-primary-foreground mb-6">Become an Instructor</h2>
            <p class="text-xl text-primary-foreground mb-8">Share your knowledge and earn while teaching thousands of students worldwide</p>
            <button class="px-8 py-4 bg-card text-foreground rounded-lg text-lg font-semibold hover:bg-opacity-90 transform hover:scale-105 transition">Start Teaching Today</button>
        </div>
    </section>

    <!-- Newsletter -->
    <section class="py-16 bg-background">
        <div class="container mx-auto px-4 max-w-xl text-center">
            <h2 class="text-3xl font-bold text-foreground mb-6">Get Learning Tips & Tricks</h2>
            <p class="text-accent mb-8">Subscribe to our newsletter and receive a free learning guide!</p>
            <form class="flex flex-col md:flex-row gap-4">
                <input type="email" placeholder="Enter your email" class="flex-1 px-4 py-3 rounded-lg border border-input focus:outline-none focus:border-primary">
                <button class="px-6 py-3 bg-primary text-primary-foreground rounded-lg font-semibold hover:bg-opacity-90">Subscribe</button>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-card py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-lg font-semibold mb-4">About</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-accent hover:text-primary">About Us</a></li>
                        <li><a href="#" class="text-accent hover:text-primary">Careers</a></li>
                        <li><a href="#" class="text-accent hover:text-primary">Press</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Support</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-accent hover:text-primary">Help Center</a></li>
                        <li><a href="#" class="text-accent hover:text-primary">Contact Us</a></li>
                        <li><a href="#" class="text-accent hover:text-primary">FAQ</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Legal</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-accent hover:text-primary">Terms</a></li>
                        <li><a href="#" class="text-accent hover:text-primary">Privacy</a></li>
                        <li><a href="#" class="text-accent hover:text-primary">Cookie Policy</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Follow Us</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="text-accent hover:text-primary">Facebook</a>
                        <a href="#" class="text-accent hover:text-primary">Twitter</a>
                        <a href="#" class="text-accent hover:text-primary">LinkedIn</a>
                    </div>
                </div>
            </div>
            <div class="mt-12 pt-8 border-t border-border text-center text-accent">
                <p>© 1998 - <?= date("Y")?> Youdemy. All rights reserved.</p>
            </div>
        </div>
        <button onclick="window.scrollTo({top: 0, behavior: 'smooth'})" class="fixed bottom-8 right-8 bg-primary text-primary-foreground p-4 rounded-full shadow-lg hover:bg-opacity-90 transition">↑</button>
    </footer>
</body>
</html>