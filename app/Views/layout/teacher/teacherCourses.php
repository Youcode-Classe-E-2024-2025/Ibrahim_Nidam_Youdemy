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
                            <button class="text-blue-600 hover:text-blue-400 mr-2">Edit</button>
                            <button type="submit" name="action" value="delete_course" class="text-destructive hover:text-destructive/80">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>