<?php
declare(strict_types=1);
?>
<div class="card">
    <h4><i class="fas fa-chart-line"></i> Marks Report</h4>
    
    <?php if (empty($rows)): ?>
        <div style="text-align: center; padding: 40px; color: #6b7280;">
            <i class="fas fa-chart-line" style="font-size: 3rem; margin-bottom: 15px; display: block;"></i>
            <h5>No marks data available</h5>
            <p>Add marks for students to see the report.</p>
        </div>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Student</th>
                    <th>Average %</th>
                    <th>Performance</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($rows as $r): ?>
                <?php 
                $avgPercent = $r['avg_percent'] !== null ? (float)$r['avg_percent'] : null;
                $performanceClass = $avgPercent !== null ? 
                    ($avgPercent >= 80 ? 'badge-success' : ($avgPercent >= 60 ? 'badge-warning' : 'badge-danger')) : '';
                $performanceIcon = $avgPercent !== null ? 
                    ($avgPercent >= 80 ? 'fas fa-star' : ($avgPercent >= 60 ? 'fas fa-exclamation-triangle' : 'fas fa-times-circle')) : '';
                ?>
                <tr>
                    <td><strong><?php echo htmlspecialchars($r['name']); ?></strong></td>
                    <td>
                        <?php if ($avgPercent !== null): ?>
                            <strong><?php echo round($avgPercent, 2); ?>%</strong>
                        <?php else: ?>
                            <span style="color: #6b7280;">—</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if ($avgPercent !== null): ?>
                            <span class="badge <?php echo $performanceClass; ?>">
                                <i class="<?php echo $performanceIcon; ?>"></i>
                                <?php 
                                if ($avgPercent >= 80) echo 'Excellent';
                                elseif ($avgPercent >= 60) echo 'Good';
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


