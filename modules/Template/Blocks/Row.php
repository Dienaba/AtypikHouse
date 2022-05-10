<?php
/**
* Project F2I / AtypikHouse 
* Vasylyshyn Roman
* Dienaba Camara
* Issa Barry
* Cedric HIHEGLO HODEWA
 */
namespace Modules\Template\Blocks;
class Row extends BaseBlock
{
    public function __construct()
    {
        $this->setOptions([
            'parent_of'    => ['column'],
            'is_container' => true,
            'component'    => 'RowBlock',
            'settings'     => []
        ]);
    }

    public function getName()
    {
        return __('Section');
    }
}