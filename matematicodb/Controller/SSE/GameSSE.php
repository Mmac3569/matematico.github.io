<?php
include_once "../../inc/bootstrap.php";
header("Content-Type: text/event-stream");
sendUpdatesFromQueue();

function sendUpdatesFromQueue() {
    if(file_get_contents(ROOT_PATH . "/Controller/SSE/eventqueue.txt") != "") {
        header("HTTP/1.1 200 OK");
        echo file_get_contents(ROOT_PATH . "/Controller/SSE/eventqueue.txt");
        file_put_contents(ROOT_PATH . "/Controller/SSE/eventqueue.txt", "");
    } else {
        header("HTTP/1.1 255 No update");
    }
    exit;
}