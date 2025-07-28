self.addEventListener('fetch', event => {
  event.respondWith(
    (async () => {
      const preloadResponse = await event.preloadResponse;
      if (preloadResponse) {
        return preloadResponse;
      }

      try {
        const networkResponse = await fetch(event.request);
        return networkResponse;
      } catch (error) {
        throw error;
      }
    })()
  );
});

self.addEventListener('install', event => {
  self.skipWaiting();
});

self.addEventListener('activate', event => {
  event.waitUntil(clients.claim());
}); 