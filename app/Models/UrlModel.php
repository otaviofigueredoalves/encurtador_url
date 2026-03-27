<?php
namespace App\Dev\Models;

use App\Dev\Core\Model;

class UrlModel extends Model
{
    public function getUrl($code)
    {
        $sql = "SELECT * FROM url_links WHERE code = :code";
        $params = ['code' => $code];
        return $this->db->fetch($sql, $params);
    }

    public function setUrl($url, $code)
    {
        $sql = "INSERT INTO url_links (code, url) VALUES (:code, :url)";
        $params = [
            'code' => $code,
            'url' => $url,
        ];
        // dd($params);
        if($this->db->query($sql, $params)){
            $this->getUrl($code);
        }
        return;
    }

    public function listUrl($code)
    {

    }
}