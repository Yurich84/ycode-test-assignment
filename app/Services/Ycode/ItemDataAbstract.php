<?php

namespace App\Services\Ycode;

abstract class ItemDataAbstract
{
    public string $collection_id;

    public YcodeItemService $ycodeItemService;

    public function __construct()
    {
        $this->ycodeItemService = new YcodeItemService();
    }

    public function list()
    {
        return $this->ycodeItemService->list($this->collection_id);
    }

    public function find(string $item_id)
    {
        return $this->ycodeItemService->find($this->collection_id, $item_id);
    }

    public function create(array $data)
    {
        return $this->ycodeItemService->create($this->collection_id, $data);
    }

    public function update(string $item_id, array $data)
    {
        return $this->ycodeItemService->put($this->collection_id, $item_id, $data);
    }

    public function patch(string $item_id, array $data)
    {
        return $this->ycodeItemService->patch($this->collection_id, $item_id, $data);
    }

    public function delete(string $item_id)
    {
        return $this->ycodeItemService->delete($item_id);
    }
}
