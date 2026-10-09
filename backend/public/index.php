<?php
// Dev stub (TASK-028 baseline): serve health without full Laravel boot.
// Full Laravel controllers in app/Http/Controllers/Api/* wired when vendor installed.
$path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
header('Content-Type: application/json');
if ($path === '/api/health' || $path === '/health' || $path === '/') {
  echo json_encode(['ok' => true, 'service' => 'faizen-dev-api-stub']);
  return;
}
http_response_code(404);
echo json_encode(['message' => 'Not found (stub)']);
