<?php
include "Service.php";

try{
  $service = Service::new();

    $searchResponse = $service->search->listSearch('id,snippet', array(
        'q' => 'cl 171216',
        'type' => 'video',
        'videoDuration' => 'medium',
        'maxResults' => '3',
      ));

      foreach($searchResponse["items"] as $searchResult){
          $fancam[$searchResult['snippet']['title']] =  $searchResult['id']['videoId'];
      }
    }catch (Google_Service_Exception $e) {
    $htmlBody .= sprintf('<p>A service error occurred: <code>%s</code></p>',
      htmlspecialchars($e->getMessage()));
  } catch (Google_Exception $e) {
    $htmlBody .= sprintf('<p>An client error occurred: <code>%s</code></p>',
      htmlspecialchars($e->getMessage()));
  }

include __DIR__."/presentation/search.phtml";