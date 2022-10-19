/**
 * author: Mafaz Abrar Jan Chowdhury
 * target: all html pages of assign2
 * purpose: assign part 2 js part
 * created: 20-4-2021
 * last updated: 20-4-2021
*/

"use strict";

/* shows prices and specific elements when user picks product and options selected */
// this function is called when the user clicks on the div containing the options
function showPricesAndOptions() {
    var checks = document.getElementsByClassName("features"); // gets all the option inputs
    var prices = document.getElementsByClassName("prices"); // gets all the price spans
    var product = document.getElementById("product").value; // gets the product inputs
    var total = document.getElementById("total"); // gets the total cost span
    var labels = document.querySelectorAll("li label"); // gets all the labels
    // the following vars are used in hiding and displaying options
    var start = 0;
    var end = 0;

    // inits all the option inputs to default "available", and updates the price spans depending on checked boxes
    for (var i = 0; i < checks.length; i++) {

        checks[i].type = "checkbox";
        labels[i].className = "none";
        
        if (checks[i].checked) {
            prices[i].style.display = "initial";
        } else {
            prices[i].style.display = "none";
        }
    }

   
    // once the user clicks on the div, the estimate field is displayed
    document.getElementById("estimate").style.visibility = "initial";

    // depending on the product chosen, start and end values are set
    if (product == "superpremium") {
        start = 4;
        end = 6;
    } else if (product == "premium") {
        start = 2;
        end = 6;
    } else if (product == "elite") {
        start = 1;
        end = 3;
    } else if (product == "basic") {
        start = 0;
        end = 6;
    } else if (product == "single_with_benefits") {
        start = 0;
        end = 6;
    } else if (product == "single") {
        start = 0;
        end = 6;
    }

    // depending on start and end values, we work through the input array and the labels array to scratch out unavailable options and set those option values to false and inputs to  hidden
    for (var c = start; c < end; c++) {
        checks[c].checked = false;
        checks[c].type = "hidden";
        labels[c].className = "struck";
        // originally: document.getElementById("violin_label").className ---> this did not have intended effect. Whenever user clicks on div, all checkboxes should first refresh, then new restrictions should apply. However, the restriction applied using ById did not refresh, since the Id rule overrides the class rule
    }
   
    // calculates, stores and displays a dynamically changing estimate
    sessionStorage.total = calcTotal();
    total.innerHTML = "$" + sessionStorage.total;   
}

/*********************************** timing function ********************************/

// create a global time out
var timeOut = 600;

// triggers when time runs out
function cancelForm2() {
    alert("All input will now be cleared.");
    sessionStorage.clear();
    window.location = "index.html";
}

// timer function
function showTimer() {
    timeOut = timeOut - 1; // decrement time

    if (timeOut > 0) { // as long as time is greater than 0, display time in X min X sec format
        document.getElementById("timeOut").innerHTML = Math.floor(timeOut / 60) + " mins " + Math.round((timeOut / 60 - Math.floor(timeOut / 60))*60) + " sec";
    } else { // when time is 0, kick user to home page
        document.getElementById("timeOut").innerHTML = "0 mins 0 sec";
        cancelForm2();
    }

}
