function read() {
    var dots = document.getElementById("dots");
    var moreText = document.getElementById("more");
    var btnText = document.getElementById("myBtn");
  
    if (dots.style.display === "none") {
        dots.style.display = "inline";
        btnText.innerHTML = "Read more"; 
        moreText.style.display = "none";
    } else {
        dots.style.display = "none";
        btnText.innerHTML = "Read less"; 
        moreText.style.display = "inline";
    }
}


// console.log("CAN YOU SEE MEEEEEEEEEEEE");
function openClose(){
    if(document.getElementById("myNav").style.height != "100%"){
        document.getElementById("myNav").style.height = "100%";
    } else{
        document.getElementById("myNav").style.height = "0%";
    }
    console.log("LOOK AT ME");
}

function searchFaq(){
    var question, answer, input, filter, faqs, qNa;
    input = document.getElementById('search');
    // console.log(input);//grabs the input element of the search bar, however it is returning undefined

    filter = input.value.toUpperCase();
    // console.log(filter);//prints the typed words in caps

    faqs = document.getElementById('faqs');
    // console.log(faqs);//grabs the faq element

    questions = faqs.getElementsByClassName("question");
    // console.log(questions);//successfully grabs everyone of the questions

    qNa = document.getElementsByClassName('question-box');
    // console.log(qNa);//successfully grabs every one of the question boxes

    for(let i = 0; i < questions.length; i++){
        answer = qNa[i].getElementsByClassName("answer")[0];
        console.log(answer);//grabbed only the first answer
        if(answer.innerHTML.toUpperCase().indexOf(filter) > -1){
            qNa[i].style.display = '';
            console.log(qNa[i].style.display);
        } else {
            qNa[i].style.display = "none";
            console.log(qNa[i].style.display);

        }
    }

}

//function runs on page load
window.onload = highlightPageTitle;

function highlightPageTitle(){
    //get the overlay content element and 
    //iterate through the li elements
    //if the title matches the content in the navbar, chang the color of the element

    // console.log(document.title);//prints the title of the document
    var title = document.title;
    console.log(title);//PRINTS title of the page
    //targets all of the links in the overaly-content(navbar)
    console.log(document.querySelectorAll(".overlay-content > li > a")); //PRINTS nodeList
    var navLinks = document.querySelectorAll(".overlay-content > li > a");
    //iterate through, if the title matches any of the elements in the overlay, highlight it
    for(let i = 0; i < navLinks.length; i++){
        // console.log(navLinks[i].innerHTML);
        navTitle = navLinks[i].innerHTML;
        console.log("TITLE: " + title);
        console.log("NavLink: " + navLinks[i].innerHTML);
        console.log(navTitle == title);
        // console.log("\n\n\n");
        if(title == navTitle){
            // alert(navTitle + " = " + title);
            // target the element, not the innerHTML
            navLinks[i].style.textDecoration = "underline overline whitesmoke";
            console.log(navLinks[i]);
        }
    }

}



// function submitForm(){
//     //means that the user cannot press the button to send data over and over again; after they hit the button the first time, we disable it
//     _("mybtn").disabled = true;
//     //target the status element, and we tell them to please wait so they are todl that the data is bein gprocessesd is happening
//     _("status").innerHTML = 'please wait ...';
//     //formdata creates a new data set once it is sent once it is transmitted to PHP
//     var formdata = new FormData();
//     //sending a key value pair for the subject
//     // s is picked up as a posted variable in the php script, the other is the value which will be whatever the user typed in the subject field, and we passed in the value propery(what was typed in)
//     formdata.append("s", _("s").value);
//     //key value pair for first name
//     formdata.append("fn", _("fn").value);
//     formdata.append("ln", _("ln").value);
//     formdata.append("m", _("m").value);
//     formdata.append("p", _("p").value);
//     formdata.append("e", _("e").value);
//     formdata.append("pPref", _("pPref").value);
//     formdata.append("ePref", _("ePref").value);


//     // _________________
//     // create a new XMLHttpRequest object 
//     var ajax = new XMLHttpRequest();
//     //run the open method, and post the data to the php script named "form_response";
//     ajax.open("POST", "form_response.php");
//     //when the ajax ready state changes the following runs
//     ajax.onreadystatechange = function(){
//         //check if the data is finished processing by PHP and returned data to the AJAX object
//         if(ajax.readyState == 4 && ajax.status == 200){
//             //if the response from PHP is successessful, we target the form and alter the html 
//             if(ajax.responseText == "success"){
//                 ("contactMak").innerHTML = `<h2> Thanks ${_("fn").value } your message was successfully sent</h2>`;
//                 ("contactMak").innerHTML = "<h2>Thank you "+ _("fn").value + "your message was successfully sent</h2>";

//             }else{
//                 _("status").innerHTML = ajax.responseText;//response text from php
//                 _("mybtn").disabled = false;//in the event of data processing failure re-enables the button so the user can try to send their message again
//             }
//         }
//     }
//     //run the send method on the ajax method and send the formdata
//     ajax.send(formdata);

// }