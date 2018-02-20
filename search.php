<?php
include "Service.php";
require_once "Model/Concert.php";
require_once "Model/Fancam.php";

// $concerts = ["180210","171216","161031"];
$concerts[0] = new Concert(180210, "LAFF");
$concerts[1] = new Concert(171216, "Asian Fashion Award");
$concerts[2] = new Concert(161031, "Hello Bitches Tour");


try {
    $service = Service::new();
    foreach ($concerts as $key => $concert) {

        $searchResults = $service->search->listSearch('id,snippet', array(
            'q' => $concert->getDate() . ' cl ' . $concert->getName(),
            'type' => 'video',
            'videoDuration' => 'medium',
            'maxResults' => '3',
        ));
        $fancams = array();
        foreach ($searchResults as $searchResult) {
            $fancam = new Fancam();
            $fancam->setVideoId($searchResult['id']['videoId']);
            $fancam->setVideoTitle($searchResult['snippet']['title']);
            array_push($fancams, $fancam);
        }
        $concert->setFancams($fancams);
    }

} catch (Google_Service_Exception $e) {
    $htmlBody .= sprintf('<p>A service error occurred: <code>%s</code></p>',
        htmlspecialchars($e->getMessage()));
} catch (Google_Exception $e) {
    $htmlBody .= sprintf('<p>An client error occurred: <code>%s</code></p>',
        htmlspecialchars($e->getMessage()));
} catch (Exception $e) {
    $htmlBody .= sprintf('<p>An client error occurred: <code>%s</code></p>',
        htmlspecialchars($e->getMessage()));
}

include __DIR__ . "/presentation/search.phtml";
