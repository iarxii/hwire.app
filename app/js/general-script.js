//author: Mr. Thabang Mposula 

function openNav() {
    const vw = Math.max(document.documentElement.clientWidth || 0, window.innerWidth || 0);
    const vh = Math.max(document.documentElement.clientHeight || 0, window.innerHeight || 0);
    //alert("Width: " + vw + " | Height: " + vh);

    if (vw <= 770) {
        document.getElementById("activities-navigation-sidebar").style.width = "250px";
        document.getElementById("main").style.marginLeft = "0px";
        document.getElementById("footer").style.marginBottom = "-90px";
    } else {
        document.getElementById("activities-navigation-sidebar").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
        document.getElementById("footer").style.marginBottom = "-90px";
    }
}

function closeNav() {
    document.getElementById("activities-navigation-sidebar").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
    document.getElementById("footer").style.marginBottom = "0px";
}
