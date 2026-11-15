<?php
declare(strict_types=1);

function jpm_request(): ?array
{
    $type = (string) ($_SERVER['CONTENT_TYPE'] ?? $_SERVER['HTTP_CONTENT_TYPE'] ?? '');
    if (stripos($type, 'application/json') !== false) {
        $raw = file_get_contents('php://input');
        $data = json_decode($raw === false ? '' : $raw, true);
        return is_array($data) ? $data : null;
    }
    if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST') {
        return $_POST;
    }
    return null;
}

function jpm_photos(array $data): array
{
    $photos = $data['photos'] ?? [];
    if (is_string($photos)) {
        $photos = [$photos];
    }
    if (!is_array($photos)) {
        return [];
    }
    $clean = [];
    foreach ($photos as $photo) {
        if (is_string($photo) && $photo !== '') {
            $clean[] = $photo;
        }
    }
    return $clean;
}

function jpm_chunk(string $binary): string
{
    return rtrim(chunk_split(base64_encode($binary), 76, "\r\n"));
}

function jpm_maybe_send(): void
{
    $data = jpm_request();
    if (!is_array($data) || (string) ($data['action'] ?? '') !== 'create_email') {
        return;
    }
    $to = trim((string) ($data['to'] ?? ''));
    $subject = trim((string) ($data['subject'] ?? ''));
    $body = (string) ($data['body'] ?? '');
    $html = "<div style='font-family:Aptos (Body), sans-serif; font-size:12pt;'>" . $body . "<br><br>Thanks,<br></div>";
    $boundary = '----=_NextPart_' . md5(uniqid('', true));
    $encoded_subject = '=?UTF-8?B?' . base64_encode($subject) . '?=';
    $parts = [];
    $parts[] = 'X-Unsent: 1';
    $parts[] = 'To: ' . $to;
    $parts[] = 'Subject: ' . $encoded_subject;
    $parts[] = 'MIME-Version: 1.0';
    $parts[] = 'Content-Type: multipart/related; boundary="' . $boundary . '"';
    $parts[] = '';
    $parts[] = '--' . $boundary;
    $parts[] = 'Content-Type: text/html; charset=UTF-8';
    $parts[] = 'Content-Transfer-Encoding: base64';
    $parts[] = '';
    $parts[] = jpm_chunk($html);
    $parts[] = '';
    foreach (jpm_photos($data) as $index => $data_url) {
        if (preg_match('#^data:(image/[\w.+-]+);base64,(.+)$#s', $data_url, $found) !== 1) {
            continue;
        }
        $raw = base64_decode(preg_replace('/\s+/', '', $found[2]) ?? '', true);
        if ($raw === false) {
            continue;
        }
        $parts[] = '--' . $boundary;
        $parts[] = 'Content-Type: ' . $found[1];
        $parts[] = 'Content-Transfer-Encoding: base64';
        $parts[] = 'Content-ID: <photo_' . $index . '>';
        $parts[] = 'Content-Disposition: inline';
        $parts[] = '';
        $parts[] = jpm_chunk($raw);
        $parts[] = '';
    }
    $parts[] = '--' . $boundary . '--';
    $parts[] = '';
    $eml = implode("\r\n", $parts);
    header('X-Generated-Email: true');
    header('Content-Type: message/rfc822');
    header('Content-Disposition: attachment; filename="Job_Draft_' . date('Y-m-d_Hi') . '.eml"');
    header('Content-Length: ' . strlen($eml));
    header('Cache-Control: no-store, no-cache, must-revalidate');
    header('Pragma: public');
    echo $eml;
    exit;
}
