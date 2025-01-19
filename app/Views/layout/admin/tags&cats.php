<div class="bg-card p-6 rounded-sm shadow-sm mb-8">
    <h2 class="text-heading font-heading underline mb-6">Tags & Category Management</h2>

    <!-- 1. If we are editing a category, show the edit form at the top -->
    <?php  if (!empty($editingCategory)): ?>
        <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-6">
            <h3 class="font-bold mb-2">Edit Category</h3>
            <form method="POST" action="<?php echo url('/users/AdminDash'); ?>">
                <input type="hidden" name="action" value="update_category">
                <input type="hidden" name="id" value="<?php echo $editingCategory[0]['id']; ?>">
                <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">

                <label class="block text-sm font-medium text-gray-700 mb-1">Category Name:</label>
                <input 
                    type="text" 
                    name="name"
                    value="<?php echo htmlspecialchars($editingCategory[0]['name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                    class="w-full text-black px-2 py-1 border border-gray-300 mb-2"
                />

                <button type="submit" class="bg-blue-500 text-white px-3 py-1 hover:bg-blue-600">Update</button>
            </form>
        </div>
    <?php endif; ?>

    <!-- 2. If we are editing a tag, show the edit form at the top -->
    <?php if (!empty($editingTag)): ?>
        <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-6">
            <h3 class="font-bold mb-2">Edit Tag</h3>
            <form method="POST" action="<?php echo url('/users/AdminDash'); ?>">
                <input type="hidden" name="action" value="update_tag">
                <input type="hidden" name="id" value="<?php echo $editingTag[0]['id']; ?>">
                <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">

                <label class="block text-sm font-medium text-gray-700 mb-1">Tag Name:</label>
                <input
                    type="text"
                    name="name"
                    value="<?php echo htmlspecialchars($editingTag[0]['name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                    class="w-full text-black px-2 py-1 border border-gray-300 mb-2"
                />

                <button type="submit" class="bg-blue-500 text-white px-3 py-1 hover:bg-blue-600">Update</button>
            </form>
        </div>
    <?php endif; ?>

    <!-- 3. Tables for Listing & Adding Categories/Tags -->
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
                    <!-- Add New Category Form -->
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">
                            <form method="POST" action="<?php echo url('/users/AdminDash'); ?>" id="addCategoryForm">
                                <input type="hidden" name="action" value="add_category">
                                <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
                                <input 
                                    type="text" 
                                    name="name" 
                                    placeholder="New Category" 
                                    class="w-full text-black px-2 py-1 border border-gray-300"
                                >
                            </form>
                        </td>
                        <td class="border text-center border-gray-300 px-4 py-2">
                            <button 
                                type="submit" 
                                form="addCategoryForm" 
                                class="bg-blue-500 text-white px-3 py-1 hover:bg-blue-600"
                            >
                                Add
                            </button>
                        </td>
                    </tr>

                    <!-- Display Existing Categories -->
                    <?php if (!empty($categories)): ?>
                        <?php foreach ($categories as $category): ?>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">
                                    <?php echo htmlspecialchars($category["name"], ENT_QUOTES, 'UTF-8'); ?>
                                </td>
                                <td class="border text-center border-gray-300 px-4 py-2">
                                    <div class="flex gap-3 justify-center text-sm">
                                        <!-- Edit Category -->
                                        <a 
                                            href="<?php echo url('/users/AdminDash'); ?>?action=edit_category&id=<?php echo $category['id']; ?>" 
                                            class="text-indigo-600 hover:text-indigo-400 transition-colors"
                                        >
                                            Edit
                                        </a>

                                        <!-- Delete Category -->
                                        <form 
                                            method="POST" 
                                            action="<?php echo url('/users/AdminDash'); ?>" 
                                            class="inline"
                                        >
                                            <input type="hidden" name="action" value="delete_category">
                                            <input type="hidden" name="id" value="<?php echo $category['id']; ?>">
                                            <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
                                            <button 
                                                type="submit" 
                                                class="text-red-600 hover:text-red-400 transition-colors"
                                            >
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="2" class="border border-gray-300 px-4 py-2 text-center">
                                No categories found.
                            </td>
                        </tr>
                    <?php endif; ?>
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
                    <!-- Add New Tag Form -->
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">
                            <form method="POST" action="<?php echo url('/users/AdminDash'); ?>" id="addTagForm">
                                <input type="hidden" name="action" value="add_tag">
                                <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
                                <input 
                                    type="text" 
                                    name="tags" 
                                    placeholder="New Tags (comma-separated)" 
                                    class="w-full text-black px-2 py-1 border border-gray-300"
                                >
                            </form>
                        </td>
                        <td class="border text-center border-gray-300 px-4 py-2">
                            <button 
                                type="submit" 
                                form="addTagForm" 
                                class="bg-blue-500 text-white px-3 py-1 hover:bg-blue-600"
                            >
                                Add
                            </button>
                        </td>
                    </tr>

                    <!-- Display Existing Tags -->
                    <?php if (!empty($tags)): ?>
                        <?php foreach ($tags as $tag): ?>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">
                                    <?php echo htmlspecialchars($tag["name"], ENT_QUOTES, 'UTF-8'); ?>
                                </td>
                                <td class="border text-center border-gray-300 px-4 py-2">
                                    <div class="flex gap-3 justify-center text-sm">
                                        <!-- Edit Tag -->
                                        <a 
                                            href="<?php echo url('/users/AdminDash'); ?>?action=edit_tag&id=<?php echo $tag['id']; ?>" 
                                            class="text-indigo-600 hover:text-indigo-400 transition-colors"
                                        >
                                            Edit
                                        </a>

                                        <!-- Delete Tag -->
                                        <form 
                                            method="POST" 
                                            action="<?php echo url('/users/AdminDash'); ?>" 
                                            class="inline"
                                        >
                                            <input type="hidden" name="action" value="delete_tag">
                                            <input type="hidden" name="id" value="<?php echo $tag['id']; ?>">
                                            <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
                                            <button 
                                                type="submit" 
                                                class="text-red-600 hover:text-red-400 transition-colors"
                                            >
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="2" class="border border-gray-300 px-4 py-2 text-center">
                                No tags found.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>