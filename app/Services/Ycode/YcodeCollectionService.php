<?php

namespace App\Services\Ycode;

class YcodeCollectionService
{
    const PATH = 'collections';

    private YcodeService $ycodeService;

    public function __construct()
    {
        $this->ycodeService = new YcodeService();
    }

    public function list()
    {
        return $this->ycodeService->get(self::PATH);
    }

    public function find(string $collection_id)
    {
        return $this->ycodeService->get(self::PATH.'/'.$collection_id);
    }

    public function items(string $collection_id)
    {
        return (new YcodeItemService())->list($collection_id);
    }
}
