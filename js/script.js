/**
 * Created by stijn on 30-Jun-17.
 */
//TODO clean up the code
//TODO Figure out when the last post happend for certain communities
//TODO clthebaddestfemale 9/10/2016
//TODO fy-cl.tumblr.com 4/2/2017
// I need to do something different.



window.onload =  function () {
    // var myVar = setInterval(myTimer,1000);

    // console.log();
    // $("#getting-started")
        // .countdown("2017/08/18", function(event) {
        //     $(this).text(
        //         event.strftime('%D days %H:%M:%S')
        //     );
        // });

    // date = Date('today');
    // console.log(date);
    // timeDown("Sep 21, 2015 06:06:06",".albumrelease",false);
    // timeUp("Jan 21, 2021 21:21:00",".bestalbumcomebacktime",true);
   // var lastpost = new Date(1498299013*1000);
   //  console.log(lastpost);

    // $.getJSON('https://www.instagram.com/chaelincl/media/', function(data) {
    //     //data is the JSON string
    //     console.log(data);
    // })


};

// function myTimer() {
//     var d = new Date();
//     document.getElementById("datecounter").innerHTML = d.toLocaleTimeString();
// }


function Counter(tijd,element,upOrDown) {
    if(upOrDown){
        timeUp(tijd);
        document.querySelector(".bestalbumcomebacktime").innerHTML =timeDown(tijd);
    }
}


function timeDown(time) {
    // Get todays date and time
    var now = new Date().getTime();
// Set the date we're counting down to
var countDownDate = new Date(time).getTime();
// Find the distance between now an the count down date
    var distance = now - countDownDate;
// Update the count down every 1 second
var x = setInterval( output(distance), 1000)
// console.log();


}

function output(distance) {
    // Time calculations for days, hours, minutes and seconds
    var years = Math.floor((distance / (1000 * 60 * 60 * 24 * 30 * 12)));
    var months = Math.floor((distance % (1000 * 60 * 60 * 24 * 30 * 12)) / (1000 * 60 * 60 * 24 * 30));
    var days = Math.floor((distance % (1000 * 60 * 60 * 24 * 30)) / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    // Display the result in the element with id="demo"
    var x= years + "y " + months + "m " + days + "d " + hours + "h "
        + minutes + "m " + seconds + "s ";
    // If the count down is finished, write some text
    // if (distance < 0) {
    //     clearInterval(x);
    //     document.getElementById("demo").innerHTML = "EXPIRED";
    // }
}

function timeUp(time) {


// Set the date we're counting down to
var countDownDate = new Date(time).getTime();

// Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();

    // Find the distance between now an the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    var time = calculateTime(distance);
    // var years = year(distance);
    // var months = month(distance);
    // var days = day(distance);
    // var hours = hour(distance);
    // var minutes = minute(distance);
    // var seconds = second(distance);

    // Display the result in the element with id="demo"
    document.querySelector(".albumrelease").innerHTML = time["years"] + "y " + time["months"] + "m " + time["days"] + "d " + time["hours"] + "h "
        + time["minutes"] + "m " + time["seconds"] + "s ";

    // If the count down is finished, write some text
    // if (distance < 0) {
    //     clearInterval(x);
    //     document.getElementById("demo").innerHTML = "EXPIRED";
    // }
}, 1000);
}

function calculateTime(distance) {
    var time = {};
    // Time calculations for days, hours, minutes and seconds
    time["years"] = year(distance);
     time["months"] = month(distance);
    time["days"] = day(distance);
    time["hours"] = hour(distance);
     time["minutes"] = minute(distance);
    time["seconds"] = second(distance);

    return time;
}


function year(distance) {
   return Math.floor((distance / (1000 * 60 * 60 * 24 * 30 * 12)));
}
function month(distance) {
   return Math.floor((distance % (1000 * 60 * 60 * 24 * 30 * 12)) / (1000 * 60 * 60 * 24 * 30));
}

function day(distance) {
   return Math.floor((distance % (1000 * 60 * 60 * 24 * 30)) /(1000 * 60 * 60 * 24));
}
function hour(distance) {
   return Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
}
function minute(distance) {
   return Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
}
function second(distance) {
   return Math.floor((distance % (1000 * 60)) / 1000);
}