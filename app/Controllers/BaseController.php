<?php
declare(strict_types=1);

namespace App\Controllers;

abstract class BaseController
{
    protected function render(string $viewPath, array $data = []): void
    {
        extract($data, EXTR_SKIP);
        ob_start();
        require dirname(__DIR__, 2) . '/views/' . $viewPath;
        $content = ob_get_clean();
        require dirname(__DIR__, 2) . '/views/layout.php';
    }
}


