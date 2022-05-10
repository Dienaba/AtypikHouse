<?php

/**
* Project F2I / AtypikHouse 
* Vasylyshyn Roman
* Dienaba Camara
* Issa Barry
* Cedric HIHEGLO HODEWA
 */

namespace Modules\Admin;


use Modules\Page\Models\Page;

class TestCrud extends BaseCrudModule
{
    public $model = Page::class;

    public function index(){
        return [
          "permission"=>"xxx",
          "layouts"=>[

          ]
        ];
    }
    public function create(){
        return [
          "permission"=>"page_create",
          "layouts"=>[
                "div"=>[
                    "class"=>"xxx",
                    "text"=>"xxx"
                ],
              "span"=>[
                  "text"=>"Stand with Ukraine"
              ]
          ]
        ];
    }
}
