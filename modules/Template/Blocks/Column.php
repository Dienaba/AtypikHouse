<?php
/**
* Project F2I / AtypikHouse 
* Vasylyshyn Roman
* Dienaba Camara
* Issa Barry
* Cedric HIHEGLO HODEWA
 */
namespace Modules\Template\Blocks;
class Column extends BaseBlock
{
    public function __construct()
    {
        $this->setOptions([
            'child_of'     => ['row'],
            'is_container' => true,
            'component'    => 'ColumnBlock',
            'settings'     => [
                [
                    'size' => [
                        'type' => 'size'
                    ]
                ]
            ]
        ]);
    }

    public function getName()
    {
        return __('Column');
    }
}