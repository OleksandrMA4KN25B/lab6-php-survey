<?php
require_once __DIR__ . '/includes/auth.php';
require_login();

require_once __DIR__ . '/includes/db.php';

$rows = db()->query("SELECT * FROM responses ORDER BY created_at DESC")->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename="survey_export.csv"');

$out = fopen('php://output', 'w');
fputcsv($out, ['id','created_at','name','email','q1','q2','q3']);

foreach ($rows as $r) {
    fputcsv($out, [$r['id'], $r['created_at'], $r['name'], $r['email'], $r['q1'], $r['q2'], $r['q3']]);
}
fclose($out);
exit;
