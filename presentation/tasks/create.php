<h2 class="h4 mb-4">Create New Task</h2>

<form action="index.php?action=store" method="POST">
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" name="description" id="description"></textarea>
    </div>
    <div class="mb-3">
        <div class="col-md-6">
            <label for="due_date" class="form-label">Due Date</label>
            <input type="date" class="form-control" id="due_date" name="due_date" required>
        </div>
        <div class="col-md-6">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select">
                <option value="pending">Pending</option>
                <option value="in_progress">In Progress</option>
                <option value="completed">Completed</option>
            </select>
        </div>
    </div>
    <div class="d-flex justify-content-between">
        <a href="" class="btn btn-outline-secondary">
            Back</a>
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save me-1"></i>Save Task</button>
    </div>
</form>