<?php
declare(strict_types=1);
?>
<div style="display: flex; justify-content: center; align-items: center; min-height: 60vh;">
    <div class="card" style="max-width: 400px; width: 100%; margin: 0 auto;">
        <div style="text-align: center; margin-bottom: 30px;">
            <i class="fas fa-graduation-cap" style="font-size: 3rem; color: var(--primary); margin-bottom: 15px; display: block;"></i>
            <h4 style="margin: 0; color: var(--primary);">Student Management System</h4>
            <p style="margin: 10px 0 0 0; color: #6b7280; font-size: 0.9rem;">Please sign in to continue</p>
        </div>
        
        <?php if (!empty($error)): ?>
            <mark style="background: #fee2e2; color: #991b1b; padding: 10px; border-radius: 6px; display: block; margin-bottom: 20px; text-align: center;">
                <i class="fas fa-exclamation-triangle"></i> <?php echo htmlspecialchars((string)$error); ?>
            </mark>
        <?php endif; ?>
        
        <form method="post" action="/login">
            <label>
                <i class="fas fa-user"></i> Username
                <input name="username" required placeholder="Enter your username">
            </label>
            <label>
                <i class="fas fa-lock"></i> Password
                <input name="password" type="password" required placeholder="Enter your password">
            </label>
            <button type="submit" class="btn btn-primary" style="width: 100%; margin-top: 10px;">
                <i class="fas fa-sign-in-alt"></i> Sign In
            </button>
        </form>
        
        <div style="margin-top: 25px; padding: 15px; background: #f8fafc; border-radius: 6px; text-align: center;">
            <p style="margin: 0; font-size: 0.85rem; color: #6b7280;">
                <i class="fas fa-info-circle"></i> 
                <strong>Demo Credentials:</strong><br>
                <code style="background: #e5e7eb; padding: 2px 6px; border-radius: 3px;">admin / admin123</code>
            </p>
        </div>
    </div>
</div>


