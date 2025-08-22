<?php
declare(strict_types=1);
?>
<div class="card">
    <h4><i class="fas fa-calendar-check"></i> Attendance - <?php echo htmlspecialchars($student['name'] ?? ''); ?></h4>
    
    <form method="post" action="/students/attendance/save" class="form-grid" style="margin-bottom: 30px;">
        <input type="hidden" name="student_id" value="<?php echo (int)($student['id'] ?? 0); ?>">
        <label>
            <i class="fas fa-calendar"></i> Date
            <input name="date" type="date" required value="<?php echo date('Y-m-d'); ?>">
        </label>
        <label>
            <i class="fas fa-user-check"></i> Status
            <select name="status">
                <option value="Present">Present</option>
                <option value="Absent">Absent</option>
            </select>
        </label>
        <div style="display: flex; align-items: end;">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Save Attendance
            </button>
        </div>
    </form>
    
    <div style="margin-bottom: 20px;">
        <a href="/students" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back to Students
        </a>
    </div>
    
    <?php if (empty($attendance)): ?>
        <div style="text-align: center; padding: 40px; color: #6b7280;">
            <i class="fas fa-calendar-check" style="font-size: 3rem; margin-bottom: 15px; display: block;"></i>
            <h5>No attendance records</h5>
            <p>Add the first attendance record for this student above.</p>
        </div>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Recorded</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($attendance as $a): ?>
                <tr>
                    <td><strong><?php echo htmlspecialchars($a['date']); ?></strong></td>
                    <td>
                        <span class="badge <?php echo $a['status'] === 'Present' ? 'badge-success' : 'badge-danger'; ?>">
                            <i class="fas fa-<?php echo $a['status'] === 'Present' ? 'check' : 'times'; ?>"></i>
                            <?php echo htmlspecialchars($a['status']); ?>
                        </span>
                    </td>
                    <td><?php echo htmlspecialchars($a['created_at']); ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>


