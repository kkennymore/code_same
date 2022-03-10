let deferredPrompt;
const addBtn = document.getElementById("add_button");
addBtn.style.display = "none";
window.addEventListener("beforeinstallprompt", (e) => {
    // Prevent Chrome 67 and earlier from automatically showing the prompt
    e.preventDefault();
    // Stash the event so it can be triggered later.
    deferredPrompt = e;
    // Update UI to notify the user they can add to home screen
    addBtn.style.display = "block";
    addBtn.addEventListener("click", (e) => {
        // hide our user interface that shows our A2HS button
        addBtn.style.display = "none";
        // Show the prompt
        deferredPrompt.prompt();
        // Wait for the user to respond to the prompt
        deferredPrompt.userChoice.then((choiceResult) => {
            if (choiceResult.outcome === "accepted") {
                console.log("User accepted the A2HS prompt");
            } else {
                console.log("User dismissed the A2HS prompt");
            }
            deferredPrompt = null;
        });
    });

});



window.addEventListener("appinstalled", () => {
    // Hide the app-provided install promotion
    hideInstallPromotion();
    // Clear the deferredPrompt so it can be garbage collected
    deferredPrompt = null;
    // Optionally, send analytics event to indicate successful install
    //alert("PWA was installed");
});



//===========TRACK HOW YOUR APP IS USED==============//
function getPWADisplayMode() {
    const isStandalone = window.matchMedia("(display-mode: standalone)").matches;
    if (document.referrer.startsWith("android-app://")) {
        return "twa";
    } else if (navigator.standalone || isStandalone) {
        //console.log("Standalone Launched");
        return "standalone";
    }
    //console.log("Browser Launched");
    return "browser";
}

window.matchMedia("(display-mode: standalone)").addEventListener("change", (event) => {
    var metatag = document.createElement('meta');
    if (event.matches) {
        // alert("Standalone");
    } else {
        //alert("Website");
    }
    // Log display mode change to analytics
    //console.log("DISPLAY_MODE_CHANGED", displayMode);
});