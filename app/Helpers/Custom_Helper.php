<?php


function lastUpdatedPost($datetime)
{
    $timestamp = strtotime($datetime);
    $diff = time() - $timestamp;
    
    if ($diff < 60) {
        return 'Last updated just now';
    } elseif ($diff < 3600) {
        $mins = floor($diff / 60);
        return "Last updated {$mins} mins ago";
    } elseif ($diff < 86400) {
        $hours = floor($diff / 3600);
        return "Last updated {$hours} hours ago";
    } else {
        $days = floor($diff / 86400);

        if ($days >= 5) {
            return 'Uploaded ' . date('d M Y', $timestamp);
        }

        return "Last updated {$days} days ago";
    }
}

/**
 * Kontak Helper
 * helper fungsi ini unuk mengambil data kontak dari database
 * @param string $kontak
 * @return string 
 */
function getKontak($kontak) 
{
    $db = \Config\Database::connect();

    $KontakModel = $db->table('kontak');
    $data = $KontakModel->where(['kontak' => $kontak])->get()->getRowArray();
    return $data['data'] ?? '';
}