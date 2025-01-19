<!-- User Management -->
<div class="bg-card p-6 rounded-sm shadow-sm mb-8">
    <h2 class="text-heading font-heading underline mb-6">User Management</h2>

    <!-- Admins -->
    <h3 class="text-heading font-heading mb-4">Admins</h3>
    <div class="overflow-x-auto mb-8">
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
                    <?php foreach ($groupedUsers['admin'] as $user): ?>
                    <tr class="border-b border-border">
                        <td class="py-4 px-4 w-1/4">
                            <div class="flex items-center justify-between">
                                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e" alt="User" class="w-8 h-8 rounded-full mr-3">
                                <span class="w-full"><?= htmlspecialchars($user['name']) ?></span>
                            </div>
                        </td>
                        <td class="py-4 px-4 w-1/4 text-left"><?= htmlspecialchars($user['role']) ?></td>
                        <td class="py-4 px-4 w-1/4">
                            <span class="px-2 py-1 rounded-sm w-full <?= $user['is_active'] ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' ?>">
                                <?= htmlspecialchars($user['is_active'] ? 'Active' : 'Suspended') ?>
                            </span>
                        </td>
                        <td class="py-4 px-4 w-1/4">
                            <form method="POST" action="<?php echo url('/users/AdminDash'); ?>">
                                <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
                                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                <?php if ($user['is_active']): ?>
                                    <button type="submit" name="action" value="suspend_user" class="text-chart-4 hover:text-chart-4/80 mr-4">Suspend</button>
                                <?php else: ?>
                                    <button type="submit" name="action" value="activate_user" class="text-chart-2 hover:text-chart-2/80 mr-4">Activate</button>
                                <?php endif; ?>
                                <button type="submit" name="action" value="delete_user" class="text-destructive hover:text-destructive/80">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Teachers -->
    <h3 class="text-heading font-heading mb-4">Teachers</h3>
    <div class="overflow-x-auto mb-8">
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
                    <?php foreach ($groupedUsers['teacher'] as $user): ?>
                    <tr class="border-b border-border">
                        <td class="py-4 px-4 w-1/4">
                            <div class="flex items-center justify-between">
                                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e" alt="User" class="w-8 h-8 rounded-full mr-3">
                                <span class="w-full"><?= htmlspecialchars($user['name']) ?></span>
                            </div>
                        </td>
                        <td class="py-4 px-4 w-1/4 text-left"><?= htmlspecialchars($user['role']) ?></td>
                        <td class="py-4 px-4 w-1/4">
                            <span class="px-2 py-1 rounded-sm w-full <?= $user['is_active'] ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' ?>">
                                <?= htmlspecialchars($user['is_active'] ? 'Active' : 'Suspended') ?>
                            </span>
                        </td>
                        <td class="py-4 px-4 w-1/4">
                            <form method="POST" action="<?php echo url('/users/AdminDash'); ?>">
                                <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
                                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                <?php if ($user['is_active']): ?>
                                    <button type="submit" name="action" value="suspend_user" class="text-chart-4 hover:text-chart-4/80 mr-4">Suspend</button>
                                <?php else: ?>
                                    <button type="submit" name="action" value="activate_user" class="text-chart-2 hover:text-chart-2/80 mr-4">Activate</button>
                                <?php endif; ?>
                                <button type="submit" name="action" value="delete_user" class="text-destructive hover:text-destructive/80">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Students -->
    <h3 class="text-heading font-heading mb-4">Students</h3>
    <div class="overflow-x-auto mb-8">
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
                    <?php foreach ($groupedUsers['student'] as $user): ?>
                    <tr class="border-b border-border">
                        <td class="py-4 px-4 w-1/4">
                            <div class="flex items-center justify-between">
                                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e" alt="User" class="w-8 h-8 rounded-full mr-3">
                                <span class="w-full"><?= htmlspecialchars($user['name']) ?></span>
                            </div>
                        </td>
                        <td class="py-4 px-4 w-1/4 text-left"><?= htmlspecialchars($user['role']) ?></td>
                        <td class="py-4 px-4 w-1/4">
                            <span class="px-2 py-1 rounded-sm w-full <?= $user['is_active'] ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' ?>">
                                <?= htmlspecialchars($user['is_active'] ? 'Active' : 'Suspended') ?>
                            </span>
                        </td>
                        <td class="py-4 px-4 w-1/4">
                            <form method="POST" action="<?php echo url('/users/AdminDash'); ?>">
                                <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
                                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                <?php if ($user['is_active']): ?>
                                    <button type="submit" name="action" value="suspend_user" class="text-chart-4 hover:text-chart-4/80 mr-4">Suspend</button>
                                <?php else: ?>
                                    <button type="submit" name="action" value="activate_user" class="text-chart-2 hover:text-chart-2/80 mr-4">Activate</button>
                                <?php endif; ?>
                                <button type="submit" name="action" value="delete_user" class="text-destructive hover:text-destructive/80">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>