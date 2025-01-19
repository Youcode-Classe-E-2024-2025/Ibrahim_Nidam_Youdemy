<!-- Pending Teachers -->
<div class="bg-card p-6 rounded-sm shadow-sm mb-8">
    <h2 class="text-heading font-heading underline mb-6">Pending Teacher Applications</h2>
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
                    <?php foreach ($pendingTeachers as $teacher): ?>
                    <tr class="border-b border-border">
                        <td class="py-4 px-4 w-1/4"><?= htmlspecialchars($teacher['name']) ?></td>
                        <td class="py-4 px-4 w-1/4"><?= htmlspecialchars($teacher['email']) ?></td>
                        <td class="py-4 px-4 w-1/4">
                            <span class="bg-chart-4/20 text-chart-4 px-2 py-1 rounded-sm w-20 text-center block">Pending</span>
                        </td>
                        <td class="py-4 px-4 w-1/4">
                            <form method="POST" action="<?php echo url('/users/AdminDash'); ?>">
                                <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
                                <input type="hidden" name="id" value="<?= $teacher['id'] ?>">
                                <button type="submit" name="action" value="approve_teacher" class="bg-chart-2 text-white px-4 py-1 rounded-sm mb-2">Approve</button>
                                <button type="submit" name="action" value="reject_teacher" class="bg-destructive text-white px-4 py-1 rounded-sm">Reject</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>