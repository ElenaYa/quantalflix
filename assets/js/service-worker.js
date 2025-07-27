self.addEventListener('fetch', event => {
  event.respondWith(
    (async () => {
      // Попробуем использовать предзагрузку, если она доступна
      const preloadResponse = await event.preloadResponse;
      if (preloadResponse) {
        return preloadResponse;
      }

      try {
        // В противном случае используем сетевой запрос
        const networkResponse = await fetch(event.request);
        return networkResponse;
      } catch (error) {
        // При ошибке сети возвращаем ошибку
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