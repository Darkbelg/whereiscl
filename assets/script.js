window.onload = function () {
    googleAnalytics();
};

function googleAnalytics() {
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-109821873-1');
    console.log("Analytics loading done");
}
