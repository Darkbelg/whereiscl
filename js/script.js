window.onload = function () {
    googleAnalytics();
    youtubeLoader();
};

function googleAnalytics() {
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-109821873-1');
    console.log("Analytics loading done");
}
function youtubeLoader() {
    var tag = document.createElement('script');

    tag.src = "https://www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
    console.log("Youtube loading done");
}
function onYouTubeIframeAPIReady() {
    fancamvideos();
    console.log("Youtube frame Api triggerd");
}