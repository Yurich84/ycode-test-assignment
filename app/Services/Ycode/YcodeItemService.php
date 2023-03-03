<?php

namespace App\Services\Ycode;

class YcodeItemService
{
    const PATH = 'items';

    private YcodeService $ycodeService;

    public function __construct()
    {
        $this->ycodeService = new YcodeService();
    }

    public function list(string $collection_id)
    {
        return $this->ycodeService->get(YcodeCollectionService::PATH.'/'.$collection_id.'/'.self::PATH);
    }

    public function find(string $collection_id, string $item_id)
    {
        return $this->ycodeService->get(YcodeCollectionService::PATH.'/'.$collection_id.'/'.self::PATH.'/'.$item_id);
    }

    public function create(string $collection_id, array $data)
    {
        return $this->ycodeService->post(YcodeCollectionService::PATH.'/'.$collection_id.'/'.self::PATH, $data);
    }

    public function update(string $collection_id, string $item_id, array $data)
    {
        return $this->ycodeService->put(YcodeCollectionService::PATH.'/'.$collection_id.'/'.self::PATH.'/'.$item_id, $data);
    }

    public function patch(string $collection_id, string $item_id, array $data)
    {
        return $this->ycodeService->patch(YcodeCollectionService::PATH.'/'.$collection_id.'/'.self::PATH.'/'.$item_id, $data);
    }

    public function delete(string $collection_id, string $item_id)
    {
        return $this->ycodeService->delete(YcodeCollectionService::PATH.'/'.$collection_id.'/'.self::PATH.'/'.$item_id);
    }
}
