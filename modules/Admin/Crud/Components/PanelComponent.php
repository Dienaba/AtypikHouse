<?php

/**
* Project F2I / AtypikHouse 
* Vasylyshyn Roman
* Dienaba Camara
* Issa Barry
* Cedric HIHEGLO HODEWA
 */

namespace Modules\Admin\Crud\Components;


class PanelComponent extends BaseComponent
{
    public function render()
    {
        view('Admin::admin.crud.components.panel')->render();
    }
}
