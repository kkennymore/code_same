//======Check if SW is supported=============//
if ("serviceWorker" in navigator) {
    window.addEventListener("load", (e) => {
        navigator.serviceWorker
            .register("../../../serviceWorker.js")
            .then((reg) => console.log("Service Worker Registered"))
            .catch((err) => console.log(`Service Worker: Error ${err}`));
    });
}