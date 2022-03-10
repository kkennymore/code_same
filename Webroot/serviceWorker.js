const cacheName = "PayBuyMax_V1";
//=======INSTALL SW==============//
const preCache = "PayBuyMax_Offline_V1";
const assets = [
    //=======cache pages===================
    "/Apps/Views/default.phtml",
    "/Apps/Views/admin.phtml",
    "/Apps/Views/Home/index.phtml",
    "/offline/index/",
];
self.addEventListener("install", (e) => {
    console.log("Service Worker Installed");
    e.waitUntil(
        caches.open(preCache).then(cache => {
            cache.addAll(assets);
        })
    )
});
//=======ACTIVATE SW==============//
self.addEventListener("activate", (e) => {
    console.log("Service Worker Activated");
    //===REMOVED UNWANTED CACHES============//
    e.waitUntil(
        caches.keys().then((cacheName) => {
            return Promise.all(
                cacheName.map((cache) => {
                    if (cache !== cacheName && cache !== preCache) {
                        return caches.delete(cache);
                    }
                })

            );
        })
    );
});
//====FETCH THE CACHE ASSETS=============//
self.addEventListener("fetch", (e) => {
    //=====CHECK IF THE LIVE SERVER IS ON=======//
    e.respondWith(
        fetch(e.request)
        .then((res) => {
            //======CLONE THE SERVER=========//
            const cloneResponse = res.clone();
            caches.open(cacheName).then((cache) => {
                //add response to cache
                cache.put(e.request, cloneResponse);
            });

            return res;
        })
        .catch(() => caches.match('/en/offline/index/').then(res => res))
    );

});