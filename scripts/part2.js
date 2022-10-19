/**
 * author: Mafaz Abrar Jan Chowdhury
 * target: all html pages of assign2
 * purpose: assign part 2 js part
 * created: 20-4-2021
 * last updated: 20-4-2021
*/


"use strict";
var debug = true;

//////////////////////////////////// Enquire Functions //////////////////////////////////////////




// postcode validation depending on state
function validateEnquire() {
    // initialize error variables
    var errMsg = "";
    var result = true;
    
    // initialize user input from document
    var state = document.getElementById("state").value;
    var postCode = document.getElementById("code").value;

    // check against state
    switch (state) {
        case "vic":
            if (postCode[0] != 3 && postCode[0] != 8) {
                errMsg += "Post Code for VIC can only start with 3 or 8\n";
                result = false;
            }
            break;
        case "nsw":
            if (postCode[0] != 1 && postCode[0] != 2) {
                errMsg += "Post Code for NSW can only start with 1 or 2\n";
                result = false;
            }
            break;
        case "qld":
            if (postCode[0] != 4  && postCode[0] != 9) {
                errMsg += "Post Code for QLD can only start with 4 or 9\n";
                result = false;
            }
            break;
        case "nt":
            if (postCode[0] != 0) {
                errMsg += "Post Code for NT can only start with 0\n";
                result = false;
            }
            break;
        case "wa":
            if (postCode[0] != 6) {
                errMsg += "Post Code for WA can only start with 6\n";
                result = false;
            }
            break;
        case "sa":
            if (postCode[0] != 5) {
                errMsg += "Post Code for SA can only start with 5\n";
                result = false;
            }
            break;
        case "tas": 
            if (postCode[0] != 7) {
                errMsg += "Post Code for TAS can only start with 6\n";
                result = false;
            }
            break;
        case "act":
            if (postCode[0] != 0) {
                errMsg += "Post Code for ACT can only start with 0n";
                result = false;
            }
            break;
    }

    getSessionData();

    // display errors
    if (errMsg != "") {
        alert(errMsg);
    }

    return result;
}




// store input in sessionStorage
function getSessionData() {

    sessionStorage.firstname = document.getElementById("fname").value;
    sessionStorage.lastname = document.getElementById("lname").value;
    sessionStorage.email = document.getElementById("email").value;
    sessionStorage.phoneNumber = document.getElementById("phone").value;
    
    sessionStorage.street = document.getElementById("street").value;
    sessionStorage.suburb = document.getElementById("suburb").value;
    sessionStorage.state = document.getElementById("state").value;
    sessionStorage.code = document.getElementById("code").value;

    if (document.getElementById("contact_email").checked) {
        sessionStorage.preferredContact = "Email";
    } else if (document.getElementById("contact_post").checked) {
        sessionStorage.preferredContact = "Post";
    } else if (document.getElementById("contact_phone").checked) {
        sessionStorage.preferredContact = "Phone";
    }

    sessionStorage.product = document.getElementById("product").value;
    sessionStorage.quantity = document.getElementById("quantity").value;
    
    /* Create a new sessionStorage for each checkbox */
    if (document.getElementById("features_bodyguard").checked) {
        sessionStorage.bodyguards = "Bodyguards";
    } else {
        sessionStorage.bodyguards = "";
    }
    if (document.getElementById("features_drinks").checked) {
        sessionStorage.drinks = "Free-Drinks";
    } else {
        sessionStorage.drinks = "";
    }
    if (document.getElementById("features_wait").checked) {
        sessionStorage.wait = "Waiters";
    } else {
        sessionStorage.wait = "";
    }
    if (document.getElementById("features_open").checked) {
        sessionStorage.open = "Open-Air";
    } else {
        sessionStorage.open = "";
    }
    if (document.getElementById("features_violin").checked) {
        sessionStorage.violin = "Personal-Violinist";
    } else { 
        sessionStorage.violin = "";
    }
    if (document.getElementById("features_sword").checked) {
        sessionStorage.sword = "Free-Replica-Sword";
    } else {
        sessionStorage.sword = "";
    }

    sessionStorage.options = sessionStorage.bodyguards + " " + sessionStorage.drinks + " " + sessionStorage.wait + " " + sessionStorage.open + " " + sessionStorage.violin + " " + sessionStorage.sword;

    sessionStorage.comments = document.getElementById("comments").value;
    sessionStorage.total = calcTotal();

    return true;
}

// calculator function
function calcTotal() {
    var product = document.getElementById("product").value;
    var total = 0;
    var quantity = document.getElementById("quantity").value;

    switch (product) {
        case "super_premium":
            total = 50000 * quantity;
            break;
        case "premium":
            total = 49999 * quantity;
            break;
        case "elite":
            total  = 49998 * quantity;
            break;
        case "basic":
            total = 1999 * quantity;
            break;
        case "single_with_benefits":
            total = 2 * quantity;
            break;
        case "single":
            total = 1 * quantity;
            break;
    }

    if (document.getElementById("features_bodyguard").checked) {total += 40000;}
    if (document.getElementById("features_drinks").checked) {total += 35;}
    if (document.getElementById("features_wait").checked) {total += 60;}
    if (document.getElementById("features_open").checked) {total += 200;}
    if (document.getElementById("features_violin").checked) {total += 45000;}

    return total;
}




/////////////////////////////// Payment Functions ///////////////////////////////////////////




function creditCardValidate() {
    // init error vars
    var errMsg = "";
    var result = true;
    var tempCount = 0; // used in MasterCard number validation

    // init user input from doc
    var creditCardNumber = document.getElementById("creditCardNumber").value; 

    // check against credit card
    if (document.getElementById("visaCard").checked) { 
        if (creditCardNumber.length != 16 || creditCardNumber[0] != 4) { // check length and 1st digit
            errMsg = "Visa cards must have 16 digits AND begin with 4\n";
            result = false;
        }
    } else if (document.getElementById("masterCard").checked) {
        if (creditCardNumber.length != 16 || creditCardNumber[0] != 5 ) { // check length and 1st digit
            errMsg = "Master cards must have 16 digits AND begin with 51 through 55 (1)\n";
            result = false;
        }
        for (var i = 1; i <= 5; i++) { // cycles from 1 to 5, checks if 2nd digit has a match
            if (creditCardNumber[1] == i) {
               tempCount = 1; 
            }
        }
        if (tempCount == 0) { // if no match, throw error
            errMsg = "Master cards must have 16 digits AND begin with 51 through 55 (2)\n";
            result = false;
        }
    } else if (document.getElementById("americanCard").checked) {
        if (creditCardNumber.length != 15 || creditCardNumber[0] != 3) { // check length and 1st digit
            errMsg = "AmEx cards must have 15 digits and begin with 34 or 37\n";
            result = false;
        }
        if (creditCardNumber[1] != 4 && creditCardNumber[1] != 7) { // check 2nd digit
            errMsg = "AmEx cards must have 15 digits and begin with 34 or 37\n";
            result = false;
        }
    }

    // display errors
    if (errMsg != "") {
        alert(errMsg);
    }

    return result;
}

function writeSessionData() {
    document.getElementById("buyerName").value = sessionStorage.firstname + " " + sessionStorage.lastname;

    document.getElementById("confirmName").innerHTML = sessionStorage.firstname + " " + sessionStorage.lastname;
    document.getElementById("confirmEmail").innerHTML = sessionStorage.email;
    document.getElementById("confirmPhone").innerHTML = sessionStorage.phoneNumber;
    document.getElementById("confirmAddress").innerHTML = sessionStorage.street + ", " + sessionStorage.suburb + ", " + sessionStorage.state + " " + sessionStorage.code;
    document.getElementById("confirmContactMethod").innerHTML = sessionStorage.preferredContact;
    document.getElementById("confirmProduct").innerHTML = sessionStorage.product;
    document.getElementById("confirmQuantity").innerHTML = sessionStorage.quantity;
    document.getElementById("confirmOptions").innerHTML = sessionStorage.options;
    document.getElementById("total").innerHTML = "$ " + sessionStorage.total;

    document.getElementById("fname").value = sessionStorage.firstname;
    document.getElementById("lname").value = sessionStorage.lastname;
    document.getElementById("email").value = sessionStorage.email;
    document.getElementById("phone").value = sessionStorage.phoneNumber;
    document.getElementById("street").value = sessionStorage.street;
    document.getElementById("suburb").value = sessionStorage.suburb;
    document.getElementById("state").value = sessionStorage.state;
    document.getElementById("code").value = sessionStorage.code;
    document.getElementById("contact").value = sessionStorage.preferredContact;
    document.getElementById("product").value = sessionStorage.product;
    document.getElementById("quantity").value = sessionStorage.quantity;
    document.getElementById("options").value = sessionStorage.options;
    document.getElementById("totalCost").value = sessionStorage.total;
    document.getElementById("comments").value = sessionStorage.comments;
}

function cancelForm() {
    alert("This action will clear all input.");
    sessionStorage.clear();
    window.location = "index.html";
}




/////////////////////////////////////// Init ////////////////////////////////////////////////////




function init() {
    // enquire has an id="current", payment does not
    var whichPage = document.getElementById("current");

    if (whichPage == undefined) {
        // init for payment page
        var cancelButton = document.getElementById("cancel");
        setInterval(showTimer, 1000); // calls showTimer once every second; check enhancements for more on timing functions

        alert("This is the payment page. Session will time out in 10 mins.");
        writeSessionData();
        cancelButton.onclick = cancelForm;
        if (!debug) {
            var formSubmit = document.getElementById("paymentFormForm");
            formSubmit.onsubmit = creditCardValidate;
        }   
        

    } else {
        // init for enquire page
        var formSubmit2 = document.getElementById("enquire");
        var checked = document.getElementById("productOrderDetails");
        alert("Please fill out ALL fields to continue");

        if (debug) {
            formSubmit2.onsubmit = getSessionData;
        } else {
            formSubmit2.onsubmit = validateEnquire;
        }
       
        checked.onclick = showPricesAndOptions;
    }
    
}

window.onload = init;