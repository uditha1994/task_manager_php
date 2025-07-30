<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="h4 mb=0">My Tasks</h2>
    <div class="btn-group">
        <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
            <i class="fas fa-filter me-1"></i>Filter
        </button>
        <ul class="dropdown-menu">
            <li><a href="#" class="dropdown-item">All Tasks</a></li>
            <li><a href="#" class="dropdown-item">Pending</a></li>
            <li><a href="#" class="dropdown-item">In Progress</a></li>
            <li><a href="#" class="dropdown-item">Completed</a></li>
        </ul>
    </div>
</div>

<?php if ($tasks->rowCount() > 0): ?>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th>Title</th>
                    <th>Due Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($task = $tasks->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <td>
                            <strong><?= htmlspecialchars($task['title']) ?></strong>
                            <div class="text-muted small"><?= htmlspecialchars(substr($task['description'], 0, 50)) ?>...</div>
                        </td>
                        <td>
                            <?= date('M d,Y', strtotime($task['due_date'])) ?>
                            <?php if (date('Y-m-d') > $task['due_date'] && $task['status'] != 'completed'): ?>
                                <span class="badge bg-danger ms-2">Overdue</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <span class="badge
                            <?= $task['status'] == 'completed' ? 'bg-success' :
                                ($task['status'] == 'in_progress' ? 'bg-warning text-dark' : 'bg-secondary') ?>
                            ">
                                <?= ucfirst(str_replace('_', '', $task['status'])) ?>
                            </span>
                        </td>
                        <td>
                            <div class="btn-group btn-group sm">
                                <a href="#" class="btn btn-outline-primary">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="index.php?action=delete&id=<?= $task['id'] ?>" class="btn btn-outline-danger" onclick="return confirm('Are you sure??')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <div class="text-center py-5">
        <i class="fas fa-tasks fa-4x text-muted mb-3"></i>
        <h3 class="h5">No tasks found</h3>
        <p class="text-muted">Get started by creating
            a new task</p>
        <a href="index.php?action=create" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i>
            Create Task</a>
    </div>
<?php endif; ?>