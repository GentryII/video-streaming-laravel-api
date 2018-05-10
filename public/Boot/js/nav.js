/**
 * Created by Therealisback on 24/08/2017.
 */
/* Set the width of the side navigation to 250px and the left margin of the page content to 250px and add a black background color to body */
//variables for menu items in the side navigation
var dashboard = "Dashboard";
var newSermon = "New Sermon";
var recentSermons = "Recent Sermons";
var allSermons = "All Sermons";
var churches = "Churches";
var users = "Users";
//variables for menu items in the side navigation

//opening the side navigation
function openNav() {
    document.getElementById("side_nav").style.width = "170px";
    document.getElementById("main").style.marginLeft = "170px";
    document.getElementById("new").innerHTML =  newSermon;
    document.getElementById("dash").innerHTML =  dashboard;
    document.getElementById("recent").innerHTML =  recentSermons;
    document.getElementById("all").innerHTML =  allSermons;
    document.getElementById("churches").innerHTML =  churches;
    document.getElementById("users").innerHTML =  users;
    //document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}
//opening the side navigation

/* Set the width of the side navigation to 0 and the left margin of the page content to 0, and the background color of body to white */
function closeNav() {
    var newSermon = "";
    var recentSermons = "";
    var allSermons = "";
    var churches = "";
    var users = "";
    document.getElementById("side_nav").style.width = "80px";
    document.getElementById("main").style.marginLeft = "80px";
    document.getElementById("new").innerHTML =  newSermon;
    document.getElementById("recent").innerHTML =  recentSermons;
    document.getElementById("all").innerHTML =  allSermons;
    document.getElementById("churches").innerHTML =  churches;
    document.getElementById("user").innerHTML =  users;
}


