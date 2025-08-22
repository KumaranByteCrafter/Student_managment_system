<?php
declare(strict_types=1);
?><!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Management System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #2563eb;
            --primary-hover: #1d4ed8;
        }
        
        .container { 
            max-width: 1200px; 
            margin: 0 auto; 
            padding: 20px;
        }
        
        .header { 
            background: var(--primary);
            color: white;
            padding: 20px 0;
            margin: -20px -20px 30px -20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        .header h3 {
            margin: 0;
            font-size: 1.5rem;
            font-weight: 600;
        }
        
        nav a { 
            margin-left: 15px;
            color: white;
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 6px;
            transition: all 0.2s;
        }
        
        nav a:hover {
            background: rgba(255, 255, 255, 0.1);
            color: white;
        }
        
        .card {
            background: white;
            border-radius: 8px;
            padding: 25px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        
        table { 
            width: 100%;
            border-collapse: collapse;
        }
        
        table th {
            background: #f8fafc;
            font-weight: 600;
            padding: 12px;
            text-align: left;
            border-bottom: 2px solid #e2e8f0;
        }
        
        table td {
            padding: 12px;
            border-bottom: 1px solid #e2e8f0;
        }
        
        table tr:hover {
            background: #f8fafc;
        }
        
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 16px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s;
            border: none;
            cursor: pointer;
        }
        
        .btn-primary {
            background: var(--primary);
            color: white;
        }
        
        .btn-primary:hover {
            background: var(--primary-hover);
            color: white;
        }
        
        .btn-secondary {
            background: #6b7280;
            color: white;
        }
        
        .btn-danger {
            background: #dc2626;
            color: white;
        }
        
        .btn-danger:hover {
            background: #b91c1c;
            color: white;
        }
        
        .btn-success {
            background: #059669;
            color: white;
        }
        
        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            align-items: end;
        }
        
        .actions {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }
        
        .badge {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 0.75rem;
            font-weight: 500;
        }
        
        .badge-success {
            background: #d1fae5;
            color: #065f46;
        }
        
        .badge-warning {
            background: #fef3c7;
            color: #92400e;
        }
        
        .badge-danger {
            background: #fee2e2;
            color: #991b1b;
        }
        
        .badge-secondary {
            background: #e5e7eb;
            color: #374151;
        }
    </style>
</head>
<body>
<div class="header">
    <div class="header-content">
        <h3><i class="fas fa-graduation-cap"></i> Student Management System</h3>
        <nav>
            <?php if (!empty($_SESSION['user_id'])): ?>
                <a href="/students"><i class="fas fa-users"></i> Students</a>
                <a href="/reports/marks"><i class="fas fa-chart-line"></i> Marks Report</a>
                <a href="/reports/attendance"><i class="fas fa-calendar-check"></i> Attendance Report</a>
                <a href="/logout"><i class="fas fa-sign-out-alt"></i> Logout (<?php echo htmlspecialchars($_SESSION['username'] ?? ''); ?>)</a>
            <?php else: ?>
                <a href="/login"><i class="fas fa-sign-in-alt"></i> Login</a>
            <?php endif; ?>
        </nav>
    </div>
</div>
<main class="container">
    <?php echo $content ?? ''; ?>
</main>
</body>
</html>


