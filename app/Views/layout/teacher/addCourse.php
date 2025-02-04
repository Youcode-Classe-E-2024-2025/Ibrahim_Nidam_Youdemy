<!-- Add Course Form -->
<div id="addCourseForm" class="bg-card p-6 rounded-sm shadow-sm mb-8">
    <h2 class="text-heading font-heading mb-6">Add New Course</h2>
    <form class="bg-muted p-6 rounded shadow-sm" method="POST" action="<?php echo url('/users/TeacherDash'); ?>" enctype="multipart/form-data">
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
            <select name="category_id" class="w-full px-4 py-2 border border-border rounded-sm" required>
                <?php foreach ($categories as $category): ?>
                    <option value="<?= htmlspecialchars($category['id']) ?>"><?= htmlspecialchars($category['name']) ?></option>
                <?php endforeach; ?>
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
            <label class="block text-sm font-medium mb-1">Upload Content</label>
            <input 
                type="file" 
                name="content_path" 
                id="contentPathInput" 
                class="w-full px-4 py-2 border border-border rounded-sm" 
                accept=".mp4,.pdf" 
                required
            >
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Tags</label>
            <select name="tags[]" class="chosen-select w-full px-4 py-2 border border-border rounded-sm" multiple>
                <?php foreach ($tags as $tag): ?>
                    <option value="<?= htmlspecialchars($tag['name']) ?>"><?= htmlspecialchars($tag['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="bg-primary text-white px-6 py-2 rounded-sm">Add Course</button>
    </form>
</div>

<!-- Edit Course Form (Initially Hidden) -->
<div id="editCourseForm" class="bg-card p-6 rounded-sm shadow-sm mb-8" style="display: none;">
    <h2 class="text-heading font-heading mb-6">Edit Course</h2>
    <form class="bg-muted p-6 rounded shadow-sm" method="POST" action="<?php echo url('/users/TeacherDash/update-course'); ?>" enctype="multipart/form-data">
        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrf_token); ?>">
        <input type="hidden" name="id" id="editCourseId">
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Title</label>
            <input type="text" name="title" id="editCourseTitle" class="w-full px-4 py-2 border border-border rounded-sm" required>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Description</label>
            <textarea name="description" id="editCourseDescription" class="w-full px-4 py-2 border border-border rounded-sm" required></textarea>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Category</label>
            <select name="category_id" id="editCourseCategory" class="w-full px-4 py-2 border border-border rounded-sm" required>
                <?php foreach ($categories as $category): ?>
                    <option value="<?= htmlspecialchars($category['id']) ?>"><?= htmlspecialchars($category['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Content Type</label>
            <select name="content_type" id="editCourseContentType" class="w-full px-4 py-2 border border-border rounded-sm" required>
                <option value="video">Video</option>
                <option value="document">Document</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Upload New Content (Optional)</label>
            <input type="file" name="content_path" class="w-full px-4 py-2 border border-border rounded-sm" accept=".mp4,.pdf">
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Tags</label>
            <select name="tags[]" id="editCourseTags" class="chosen-select w-full px-4 py-2 border border-border rounded-sm" multiple>
                <?php foreach ($tags as $tag): ?>
                    <option value="<?= htmlspecialchars($tag['name']) ?>"><?= htmlspecialchars($tag['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="bg-primary text-white px-6 py-2 rounded-sm">Update Course</button>
        <button type="button" onclick="cancelEdit()" class="bg-gray-500 text-white px-6 py-2 rounded-sm ml-2">Cancel</button>
    </form>
</div>