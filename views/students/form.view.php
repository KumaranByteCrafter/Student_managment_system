<?php
declare(strict_types=1);
?>
<div class="card">
    <h4><i class="fas fa-<?php echo $student['id'] ? 'edit' : 'plus'; ?>"></i> <?php echo $student['id'] ? 'Edit Student' : 'Add Student'; ?></h4>
    
    <form method="post" action="<?php echo $student['id'] ? '/students/update' : '/students/store'; ?>">
        <input type="hidden" name="id" value="<?php echo (int)($student['id'] ?? 0); ?>">
        
        <div class="form-grid">
            <label>
                <i class="fas fa-user"></i> Name
                <input name="name" value="<?php echo htmlspecialchars((string)$student['name']); ?>" required placeholder="Enter student name">
            </label>
            <label>
                <i class="fas fa-envelope"></i> Email
                <input name="email" type="email" value="<?php echo htmlspecialchars((string)$student['email']); ?>" required placeholder="Enter email address">
            </label>
        </div>
        
        <div class="form-grid">
            <label>
                <i class="fas fa-phone"></i> Phone
                <input name="phone" value="<?php echo htmlspecialchars((string)$student['phone']); ?>" placeholder="Enter phone number">
            </label>
            <label>
                <i class="fas fa-map-marker-alt"></i> Address
                <textarea name="address" placeholder="Enter address"><?php echo htmlspecialchars((string)$student['address']); ?></textarea>
            </label>
        </div>
        
        <div style="margin-top: 20px;">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Save Student
            </button>
            <a href="/students" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Cancel
            </a>
        </div>
    </form>
    
    <?php if ($student['id']): ?>
        <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #e2e8f0;">
            <h5>Quick Actions</h5>
            <div class="actions">
                <a href="/students/marks?id=<?php echo (int)$student['id']; ?>" class="btn btn-success">
                    <i class="fas fa-chart-line"></i> Manage Marks
                </a>
                <a href="/students/attendance?id=<?php echo (int)$student['id']; ?>" class="btn btn-primary">
                    <i class="fas fa-calendar-check"></i> Manage Attendance
                </a>
            </div>
        </div>
    <?php endif; ?>
</div>


