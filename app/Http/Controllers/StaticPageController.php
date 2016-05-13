<?php
/* test3 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\RunsiteController;
use App\Runsite\Nodes;
use App\Runsite\Libraries\Node;

class StaticPageController extends RunsiteController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Node::getList('static_page', $this->currentNode->id);
        return view('pages.page', [
          'currentNode' => $this->currentNode,
          'currentFields' => $this->currentFields,
          'pages' => $pages,
        ]);
    }

}
