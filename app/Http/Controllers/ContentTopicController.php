<?php

namespace App\Http\Controllers;

use App\Flow\ContentTopicFlow;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class ContentTopicController extends Controller
{
  private $content_topic_management_flow;

  public function __construct()
  {
      $this->content_topic_management_flow = new ContentTopicFlow();
  }

  public function get(Request $request)
  {
    $data = $this->content_topic_management_flow->get();
    return view('index', compact("data"));
  }
}
