window.onload =  function () {

     timeUp("08 22 2016 23:59:59",".lifted");

};

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
}

function timeUp(time,element) {
// Set the date we're counting down to
var countDownDate = new Date(time).getTime();

// Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();

    // Find the distance between now an the count down date
    var distance = now - countDownDate;

    // Time calculations for days, hours, minutes and seconds
    var time = calculateTime(distance);
    // var years = year(distance);
    // var months = month(distance);
    // var days = day(distance);
    // var hours = hour(distance);
    // var minutes = minute(distance);
    // var seconds = second(distance);

    output = "";
    // Display the result in the element with id="demo"
    if( time["years"]!==0){
        output += time["years"] + "y ";
    }
    if( time["months"]!==0){
        output += time["months"] + "m ";
    }
    if( time["days"]!==0){
        output += time["days"] + "d ";
    }
    if( time["hours"]!==0){
        output += time["hours"] + "h ";
    }
    if( time["minutes"]!==0){
        output += time["minutes"] + "m ";
    }
    if( time["seconds"]!==0){
        output += time["seconds"] + "s ";
    }
    document.querySelector(element).innerHTML = output;
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