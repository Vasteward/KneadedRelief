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

var meta = document.getElementsByTagName("meta");

console.log("I am meta data!" + meta);

console.log(meta["page-title"].content);
var metaTitle = meta["page-title"].content;
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
        console.log("MetaTitle: "+ metaTitle);
        console.log(navTitle == title);
        // console.log("\n\n\n");
        if(metaTitle == navTitle){
            // alert(navTitle + " = " + title);
            // target the element, not the innerHTML
            navLinks[i].style.textDecoration = "underline overline whitesmoke";
            console.log(navLinks[i]);
        }
    }

}
