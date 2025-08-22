<?php
declare(strict_types=1);

session_start();

// Define base paths
define('BASE_PATH', dirname(__DIR__));
define('APP_PATH', BASE_PATH . '/app');
define('CONFIG_PATH', BASE_PATH . '/config');
define('BOOTSTRAP_PATH', BASE_PATH . '/bootstrap');

// Autoload
require_once APP_PATH . '/Core/Autoloader.php';
App\Core\Autoloader::register();

// Load config
$config = require CONFIG_PATH . '/config.php';

// Bootstrap (DB init on first run)
require_once BOOTSTRAP_PATH . '/init.php';

use App\Core\Router;

$router = new Router();

// Auth routes
$router->get('/', ['App\\Controllers\\AuthController', 'showLogin']);
$router->get('/login', ['App\\Controllers\\AuthController', 'showLogin']);
$router->post('/login', ['App\\Controllers\\AuthController', 'login']);
$router->get('/logout', ['App\\Controllers\\AuthController', 'logout']);

// Student routes
$router->get('/students', ['App\\Controllers\\StudentController', 'index']);
$router->get('/students/create', ['App\\Controllers\\StudentController', 'create']);
$router->post('/students/store', ['App\\Controllers\\StudentController', 'store']);
$router->get('/students/edit', ['App\\Controllers\\StudentController', 'edit']);
$router->post('/students/update', ['App\\Controllers\\StudentController', 'update']);
$router->post('/students/delete', ['App\\Controllers\\StudentController', 'delete']);

// Marks
$router->get('/students/marks', ['App\\Controllers\\StudentController', 'marks']);
$router->post('/students/marks/save', ['App\\Controllers\\StudentController', 'saveMarks']);

// Attendance
$router->get('/students/attendance', ['App\\Controllers\\StudentController', 'attendance']);
$router->post('/students/attendance/save', ['App\\Controllers\\StudentController', 'saveAttendance']);

// Reports
$router->get('/reports/marks', ['App\\Controllers\\ReportController', 'marksReport']);
$router->get('/reports/attendance', ['App\\Controllers\\ReportController', 'attendanceReport']);

// Dispatch
$router->dispatch($_SERVER['REQUEST_METHOD'], strtok($_SERVER['REQUEST_URI'], '?'));


