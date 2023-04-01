<?php

namespace App\Http\Controllers\DataMaster;

use App\Layer\Entity\DataMaster\IdeaStatus;
use App\Layer\Flow\DataMaster\IdeaStatusFlow;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class IdeaStatusController extends Controller
{
  private string $module_name = "Data Master";
  private string $domain = "Idea Status";
  private $idea_status_flow;

  public function __construct()
  {
      $this->idea_status_flow = new IdeaStatusFlow();
  }

  public function get(Request $request){
    $module = $this->module_name;
    $bread_crumb = [
      "Home" => route("home"),
      $this->module_name => "#",
      $this->domain => route("data-master.idea-status.get"),
    ];

    return view('data_master.idea_status.get', compact("bread_crumb", "module"));
  }

  public function insert(Request $request)
  {
    $bread_crumb = [
      "home" => route("home"),
      $this->module_name => "#",
      $this->domain => route("data-master.idea-status.get"),
    ];

    $idea_status = new IdeaStatus($request->status);
    $is_success = $this->idea_status_flow->insert($idea_status);

    return view('index', compact("bread_crumb", "is_success"));
  }
}
