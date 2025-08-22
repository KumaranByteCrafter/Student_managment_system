<?php
declare(strict_types=1);
?>
<div class="card">
    <div style="display:flex; justify-content: space-between; align-items:center; margin-bottom: 20px;">
        <h4><i class="fas fa-users"></i> Students</h4>
        <a href="/students/create" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add Student
        </a>
    </div>
    
    <?php if (empty($students)): ?>
        <div style="text-align: center; padding: 40px; color: #6b7280;">
            <i class="fas fa-users" style="font-size: 3rem; margin-bottom: 15px; display: block;"></i>
            <h5>No students found</h5>
            <p>Get started by adding your first student.</p>
            <a href="/students/create" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add First Student
            </a>
        </div>
    <?php else: ?>
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($students as $s): ?>
                <tr>
                    <td><?php echo (int)$s['id']; ?></td>
                    <td><strong><?php echo htmlspecialchars($s['name']); ?></strong></td>
                    <td><?php echo htmlspecialchars($s['email']); ?></td>
                    <td><?php echo htmlspecialchars((string)$s['phone']); ?></td>
                    <td>
                        <div class="actions">
                            <a href="/students/edit?id=<?php echo (int)$s['id']; ?>" class="btn btn-secondary" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="/students/marks?id=<?php echo (int)$s['id']; ?>" class="btn btn-success" title="Marks">
                                <i class="fas fa-chart-line"></i>
                            </a>
                            <a href="/students/attendance?id=<?php echo (int)$s['id']; ?>" class="btn btn-primary" title="Attendance">
                                <i class="fas fa-calendar-check"></i>
                            </a>
                            <form method="post" action="/students/delete" style="display:inline" onsubmit="return confirm('Are you sure you want to delete this student?');">
                                <input type="hidden" name="id" value="<?php echo (int)$s['id']; ?>">
                                <button type="submit" class="btn btn-danger" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>


