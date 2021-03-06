<?php
/**
* Project F2I / AtypikHouse 
* Vasylyshyn Roman
* Dienaba Camara
* Issa Barry
* Cedric HIHEGLO HODEWA
 */
namespace Modules\Core\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Modules\AdminController;
use Modules\Core\Models\Settings;

class ToolsController extends AdminController
{
    public function index()
    {
        $this->setActiveMenu(route('core.admin.tool.index'));
        return view('Core::admin.tools.index');
    }
}
