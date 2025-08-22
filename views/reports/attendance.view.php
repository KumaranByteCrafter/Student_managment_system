<?php
declare(strict_types=1);
?>
<div class="card">
    <h4><i class="fas fa-calendar-check"></i> Attendance Report</h4>
    
    <?php if (empty($rows)): ?>
        <div style="text-align: center; padding: 40px; color: #6b7280;">
            <i class="fas fa-calendar-check" style="font-size: 3rem; margin-bottom: 15px; display: block;"></i>
            <h5>No attendance data available</h5>
            <p>Add attendance records for students to see the report.</p>
        </div>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Student</th>
                    <th>Present Days</th>
                    <th>Total Days</th>
                    <th>Attendance %</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($rows as $r): ?>
                <?php 
                $presents = (int)$r['presents'];
                $total = (int)$r['total'];
                $percent = $total ? round(($presents / max(1, $total)) * 100, 2) : null;
                $statusClass = $percent !== null ? 
                    ($percent >= 90 ? 'badge-success' : ($percent >= 75 ? 'badge-warning' : 'badge-danger')) : '';
                $statusIcon = $percent !== null ? 
                    ($percent >= 90 ? 'fas fa-star' : ($percent >= 75 ? 'fas fa-exclamation-triangle' : 'fas fa-times-circle')) : '';
                ?>
                <tr>
                    <td><strong><?php echo htmlspecialchars($r['name']); ?></strong></td>
                    <td>
                        <span class="badge badge-success">
                            <i class="fas fa-check"></i> <?php echo $presents; ?>
                        </span>
                    </td>
                    <td>
                        <span class="badge badge-secondary">
                            <i class="fas fa-calendar"></i> <?php echo $total; ?>
                        </span>
                    </td>
                    <td>
                        <?php if ($percent !== null): ?>
                            <strong><?php echo $percent; ?>%</strong>
                        <?php else: ?>
                            <span style="color: #6b7280;">—</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if ($percent !== null): ?>
                            <span class="badge <?php echo $statusClass; ?>">
                                <i class="<?php echo $statusIcon; ?>"></i>
                                <?php 
                                if ($percent >= 90) echo 'Excellent';
                                elseif ($percent >= 75) echo 'Good';
                                else echo 'Needs Improvement';
                                ?>
                            </span>
                        <?php else: ?>
                            <span style="color: #6b7280;">No data</span>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>


