<?php
include "Service.php";
require_once "Model/Concert.php";

// $concerts = ["180210","171216","161031"];
 $concerts[0] = new Concert(180210,"LAFF");
 $concerts[1] = new Concert(171216,"Asian Fashion Award");
 $concerts[2] = new Concert(161031,"Hello Bitches Tour");

 $html = "";
foreach ($concerts as $key => $concert){
    $html .= '<div class="row">';
    $html .= '<div class="col-12"><h2>'. $concert->getName() .'</h2></div>';
    $progress = '<div class="progress">
            <div class="progress-bar progress-bar-animated progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="99" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
        </div>';
    for ($i = 0; $i<3;$i++) {
        $id = $concert->getDate() + $i;
        $html .= '<div class="col" id="' . $id . '">'.$progress.'</div>';
    }
    $html .= '</div>';
}
try{
  $service = Service::new();

 foreach ($concerts as $key => $concert) {
     $searchResponses[$key] = $service->search->listSearch('id,snippet', array(
         'q' => $concert->getDate().' cl '. $concert->getName(),
         'type' => 'video',
         'videoDuration' => 'medium',
         'maxResults' => '3',
     ));
     $searchResponses[$key]["date"]=$concert->getDate();
 }

    foreach ($searchResponses as $searchResponse) {
        foreach ($searchResponse["items"] as $key =>$searchResult) {
            $searchResponse[$key] = $searchResult['id']['videoId'];
        }
    }

    }catch (Google_Service_Exception $e) {
    $htmlBody .= sprintf('<p>A service error occurred: <code>%s</code></p>',
      htmlspecialchars($e->getMessage()));
  } catch (Google_Exception $e) {
    $htmlBody .= sprintf('<p>An client error occurred: <code>%s</code></p>',
      htmlspecialchars($e->getMessage()));
  }catch (Exception $e){
    $htmlBody .= sprintf('<p>An client error occurred: <code>%s</code></p>',
        htmlspecialchars($e->getMessage()));
}

include __DIR__."/presentation/search.phtml";
