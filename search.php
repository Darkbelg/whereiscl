<?php
include "Service.php";
require_once "Model/Concert.php";
require_once "Model/Fancam.php";

// $concerts = ["180210","171216","161031"];
$concerts = array();

array_push($concerts, new Concert("180804", "Hyperplay"));
array_push($concerts, new Concert("180320", "99%"));
array_push($concerts, new Concert("180308", "Tory Burch"));
array_push($concerts, new Concert("180225", "Olympics"));
array_push($concerts, new Concert("180210", "LAFF"));
array_push($concerts, new Concert("171216", "Asian Fashion Award"));
array_push($concerts, new Concert("170416", "Not Hello Bitches Tour"));
array_push($concerts, new Concert("161031", "Hello Bitches Tour"));
array_push($concerts, new Concert("161029", "Hello Bitches Tour"));
array_push($concerts, new Concert("161101", "Hello Bitches Tour"));
array_push($concerts, new Concert("161103", "Hello Bitches Tour"));
array_push($concerts, new Concert("161104", "Hello Bitches Tour"));
//array_push($concerts, new Concert("161106", "Hello Bitches Tour"));
array_push($concerts, new Concert("161108", "Hello Bitches Tour"));
array_push($concerts, new Concert("161110", "Hello Bitches Tour"));
//array_push($concerts, new Concert("161114", "Hello Bitches Tour"));




try {
    $service = Service::new();
    foreach ($concerts as $key => $concert) {
        $timeConcertAfter = str_split ($concert->getDate());
        $timeConcertBefore = str_split ($concert->getDate());
        $timeAfter = new DateTime('20'.$timeConcertBefore[0].$timeConcertBefore[1]."-".$timeConcertBefore[2].$timeConcertBefore[3]."-".$timeConcertBefore[4].$timeConcertBefore[5]);
        $timeAdd = new DateInterval("P5D");
        $timeAfter->add($timeAdd);
        $timeBefore = new DateTime('20'.$timeConcertAfter[0].$timeConcertAfter[1]."-".$timeConcertAfter[2].$timeConcertAfter[3]."-".$timeConcertAfter[4].$timeConcertAfter[5]);
        $searchResults = $service->search->listSearch('id,snippet', array(
            'q' =>  'intitle:'.$concert->getDate().' intitle:cl ' . $concert->getName(),
            'type' => 'video',
            'videoDuration' => 'medium',
            'maxResults' => '3',
            'publishedAfter' => $timeBefore->format("Y-m-d\TH:i:sP"),
            'publishedBefore' => $timeAfter->format("Y-m-d\TH:i:sP"),
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
    echo sprintf('<p>A service error occurred: <code>%s</code></p>',
        htmlspecialchars($e->getMessage()));
} catch (Google_Exception $e) {
    echo sprintf('<p>An client error occurred: <code>%s</code></p>',
        htmlspecialchars($e->getMessage()));
} catch (Exception $e) {
    echo sprintf('<p>An client error occurred: <code>%s</code></p>',
        htmlspecialchars($e->getMessage()));
}

include __DIR__ . "/presentation/search.phtml";
