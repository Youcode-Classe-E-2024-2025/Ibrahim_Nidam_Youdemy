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
            <a href="#" class="text-foreground hover:text-primary">Courses</a>
            <a href="#" class="text-foreground hover:text-primary">Categories</a>
            <a href="#" class="text-foreground hover:text-primary">Teach</a>
        </div>
        <div class="flex items-center space-x-4">
            <button class="px-4 py-2 text-primary-foreground bg-primary rounded hover:bg-opacity-90">Sign In</button>
        </div>
    </div>
</nav>

<!-- Main Content -->
<main class="flex-1 overflow-auto p-8">
<div class="mb-8">
    <h2 class="text-heading font-heading text-foreground mb-4">Quick Insights</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
        <!-- Total Users Card -->
        <div class="bg-card p-6 rounded-sm shadow-sm border border-border">
            <h3 class="text-accent-foreground mb-2">Total Users</h3>
            <p class="text-3xl font-bold text-primary">15,687</p>
            <p class="text-muted-foreground mt-2">+12% from last month</p>
        </div>
        <!-- Total Courses Card -->
        <div class="bg-card p-6 rounded-sm shadow-sm border border-border">
            <h3 class="text-accent-foreground mb-2">Total Courses</h3>
            <p class="text-3xl font-bold text-chart-2">456</p>
            <p class="text-muted-foreground mt-2">+8% from last month</p>
        </div>
        <!-- Pending Requests Card -->
        <div class="bg-card p-6 rounded-sm shadow-sm border border-border">
            <h3 class="text-accent-foreground mb-2">Pending Requests</h3>
            <p class="text-3xl font-bold text-chart-4">23</p>
            <p class="text-muted-foreground mt-2">5 new this week</p>
        </div>
        <div class="bg-card p-6 rounded-sm shadow-sm border border-border">
            <h3 class="text-accent-foreground mb-2">Pending Requests</h3>
            <p class="text-3xl font-bold text-chart-4">23</p>
            <p class="text-muted-foreground mt-2">5 new this week</p>
        </div>
    </div>
</div>

<!-- Pending Teachers -->
<div class="bg-card p-6 rounded-sm shadow-sm mb-8">
    <h2 class="text-heading font-heading mb-6">Pending Teacher Applications</h2>
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
                    <tr class="border-b border-border">
                        <td class="py-4 px-4 w-1/4">John Doe</td>
                        <td class="py-4 px-4 w-1/4">john@example.com</td>
                        <td class="py-4 px-4 w-1/4">
                            <span class="bg-chart-4/20 text-chart-4 px-2 py-1 rounded-sm w-20 text-center block">Pending</span>
                        </td>
                        <td class="py-4 px-4 w-1/4">
                            <div>
                                <button class="bg-chart-2 text-white px-4 py-1 rounded-sm mb-2">Approve</button>
                                <button class="bg-destructive text-white px-4 py-1 rounded-sm">Reject</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- User Management -->
<div class="bg-card p-6 rounded-sm shadow-sm mb-8">
    <h2 class="text-heading font-heading mb-6">User Management</h2>
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
                    <!-- More rows for testing spread -->
                </tbody>
            </table>
        </div>
    </div>
</div>



<!-- User Management Section -->
<div class="bg-card p-6 rounded-sm shadow-sm mb-8">
    <h2 class="text-heading font-heading mb-6">Tags & Category Management</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
        <!-- Categories Table -->
        <div class="w-full">
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr>
                        <th class="border border-gray-300 px-4 py-2">Category</th>
                        <th class="border border-gray-300 px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">
                            <input type="text" placeholder="New Category" class="w-full text-black px-2 py-1 border border-gray-300">
                        </td>
                        <td class="border text-center border-gray-300 px-4 py-2">
                            <button class="bg-blue-500 text-white px-3 py-1 hover:bg-blue-600">Add</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">Programming</td>
                        <td class="border text-center border-gray-300 px-4 py-2">
                            <div class="flex gap-3 justify-center text-sm">
                                <a href="#" class="text-indigo-600 hover:text-indigo-400 transition-colors">Edit</a>
                                <a href="#" class="text-red-600 hover:text-red-400 transition-colors">Delete</a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Tags Table -->
        <div class="w-full">
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr>
                        <th class="border border-gray-300 px-4 py-2">Tag</th>
                        <th class="border border-gray-300 px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">
                            <input type="text" placeholder="New Tag" class="w-full text-black px-2 py-1 border border-gray-300">
                        </td>
                        <td class="border text-center border-gray-300 px-4 py-2">
                            <button class="bg-blue-500 text-white px-3 py-1 hover:bg-blue-600">Add</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">Python</td>
                        <td class="border text-center border-gray-300 px-4 py-2">
                            <div class="flex gap-3 justify-center text-sm">
                                <a href="#" class="text-indigo-600 hover:text-indigo-400 transition-colors">Edit</a>
                                <a href="#" class="text-red-600 hover:text-red-400 transition-colors">Delete</a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require_once realpath(__DIR__ . '/../layout/footer.php'); ?>
</body>
</html>