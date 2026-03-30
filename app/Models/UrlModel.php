<?php
namespace App\Dev\Models;

use App\Dev\Core\Model;

class UrlModel extends Model
{
    private $domain;
    public function __construct()
    {
        parent::__construct();
        $this->domain = config('domain');
    }
    public function getUrl($code)
    {
        $sql = "SELECT * FROM url_links WHERE code = :code";
        $params = ['code' => $code];
        return $this->db->fetch($sql, $params);
    }

    public function setUrl($url, $code)
    {
        $sql = "INSERT INTO url_links (code, url, domain) VALUES (:code, :url, :domain)";        
        $params = [
            'code' => $code,
            'url' => $url,
            'domain' => $this->domain
        ];
        // dd($params);
        if($this->db->query($sql, $params)){
            if($this->checkUpd()){
                return $this->getUrl($code);
            } else {
                throw new \PDOException("URL já cadastrada");
            }
        } else {
            throw new \PDOException("Erro ao executar a query");
        }
        return;
    }

    public function checkUpd()
    {
        return ($this->db->rowCount()) > 0;
    }

    public function listAllUrls()
    {
        $sql = "SELECT * FROM url_links";
        $params = [];
        return $this->db->fetchAll($sql, $params);
    }
    
    public function setCount($id)
    {
        $sql = "UPDATE url_links SET click_count = click_count + 1 WHERE id = :id";
        $params = [
            'id' => $id,
        ];

        return $this->db->query($sql, $params);
    }
}