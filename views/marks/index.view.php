<?php
declare(strict_types=1);
?>
<div class="card">
    <h4><i class="fas fa-chart-line"></i> Marks - <?php echo htmlspecialchars($student['name'] ?? ''); ?></h4>
    
    <form method="post" action="/students/marks/save" class="form-grid" style="margin-bottom: 30px;">
        <input type="hidden" name="student_id" value="<?php echo (int)($student['id'] ?? 0); ?>">
        <label>
            <i class="fas fa-book"></i> Subject
            <input name="subject" required placeholder="Enter subject name">
        </label>
        <label>
            <i class="fas fa-star"></i> Score
            <input name="score" type="number" min="0" max="100" required placeholder="Enter score">
        </label>
        <label>
            <i class="fas fa-trophy"></i> Max Score
            <input name="max_score" type="number" min="1" value="100" required>
        </label>
        <div style="display: flex; align-items: end;">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add Mark
            </button>
        </div>
    </form>
    
    <div style="margin-bottom: 20px;">
        <a href="/students" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back to Students
        </a>
    </div>
    
    <?php if (empty($marks)): ?>
        <div style="text-align: center; padding: 40px; color: #6b7280;">
            <i class="fas fa-chart-line" style="font-size: 3rem; margin-bottom: 15px; display: block;"></i>
            <h5>No marks recorded</h5>
            <p>Add the first mark for this student above.</p>
        </div>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Subject</th>
                    <th>Score</th>
                    <th>Percentage</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($marks as $m): ?>
                <?php $percentage = round(((int)$m['score'] / max(1,(int)$m['max_score'])) * 100, 2); ?>
                <tr>
                    <td><strong><?php echo htmlspecialchars($m['subject']); ?></strong></td>
                    <td>
                        <span class="badge <?php echo $percentage >= 80 ? 'badge-success' : ($percentage >= 60 ? 'badge-warning' : 'badge-danger'); ?>">
                            <?php echo (int)$m['score']; ?>/<?php echo (int)$m['max_score']; ?>
                        </span>
                    </td>
                    <td>
                        <strong><?php echo $percentage; ?>%</strong>
                        <?php if ($percentage >= 80): ?>
                            <i class="fas fa-star" style="color: #fbbf24; margin-left: 5px;"></i>
                        <?php endif; ?>
                    </td>
                    <td><?php echo htmlspecialchars($m['created_at']); ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>


