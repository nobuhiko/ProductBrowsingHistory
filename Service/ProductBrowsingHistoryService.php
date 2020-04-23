<?php

namespace Plugin\ProductBrowsingHistory\Service;

use Symfony\Component\HttpFoundation\Session\SessionInterface;

class ProductBrowsingHistoryService
{
    private $session;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
        $this->name = 'PluginProductBrowsingHistory';
    }

    public function set($value)
    {
        $ids = $this->get();
        $ids[] = $value;

        // todo 上限数を決めて削除する処理
        $this->session->set($this->name, array_unique($ids));
    }

    public function get()
    {
        $ids = $this->session->get($this->name);

        return $ids ? : [];
    }
}
