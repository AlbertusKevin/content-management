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

    $list_of_idea_status = $this->idea_status_flow->get();

    return view('data_master.idea_status.get', compact("bread_crumb", "module", "list_of_idea_status"));
  }

  public function find(Request $request, int $idea_status_id){
    $module = $this->module_name;
    $bread_crumb = [
      "Home" => route("home"),
      $this->module_name => "#",
      $this->domain => route("data-master.idea-status.get"),
    ];

    $idea_status = $this->idea_status_flow->find($idea_status_id);


    return response()->json([
      'status' => 'Berhasil',
      'message' => 'Berhasil mencari data.',
      'data' => $idea_status
    ],200);

  }

  public function insert(Request $request)
  {
    $idea_status = new IdeaStatus(0, $request->status);
    $is_success = $this->idea_status_flow->insert($idea_status);

    return redirect(route('data-master.idea-status.get'));
  }

  public function update(Request $request, int $idea_status_id)
  {
    $idea_status = new IdeaStatus($idea_status_id, $request["edit-idea-status"]);
    $is_success = $this->idea_status_flow->update($idea_status);

    return redirect(route('data-master.idea-status.get'));
  }

  public function delete(Request $request, int $idea_status_id)
  {
    $is_success = $this->idea_status_flow->delete($idea_status_id);

    return redirect(route('data-master.idea-status.get'));
  }
}
