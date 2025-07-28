
(function() {
    'use strict';

    const CookieManager = {
        set: function(name, value, days) {
            let expires = "";
            if (days) {
                const date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + (value || "") + expires + "; path=/; SameSite=Lax";
        },

        get: function(name) {
            const nameEQ = name + "=";
            const ca = document.cookie.split(';');
            for (let i = 0; i < ca.length; i++) {
                let c = ca[i];
                while (c.charAt(0) === ' ') c = c.substring(1, c.length);
                if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
            }
            return null;
        },

        delete: function(name) {
            document.cookie = name + "=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT; SameSite=Lax";
        }
    };

    const CookieBanner = {
        banner: null,
        cookieName: 'quantalflix_cookie_consent',
        cookieValue: 'accepted',
        cookieExpiry: 365, 

        init: function() {
            if (CookieManager.get(this.cookieName)) {
                return; 
            }

            this.createBanner();
            this.showBanner();
            this.bindEvents();
        },

        createBanner: function() {
            const bannerHTML = `
                <div id="cookieBanner" class="cookie-banner">
                    <div class="cookie-content">
                        <div class="cookie-text">
                            <h6><i class="fas fa-cookie-bite me-2"></i>Çerez Kullanımı</h6>
                            <p>Bu site deneyiminizi geliştirmek için çerezler kullanmaktadır. Sitemizi kullanmaya devam ederek çerez kullanımını kabul etmiş olursunuz. 
                            <a href="privacy-policy.html" target="_blank">Gizlilik Politikası</a> sayfamızdan detaylı bilgi alabilirsiniz.</p>
                        </div>
                        <div class="cookie-buttons">
                            <button type="button" class="btn-cookie btn-accept" id="acceptCookies">
                                <i class="fas fa-check me-1"></i>Kabul Et
                            </button>
                            <button type="button" class="btn-cookie btn-decline" id="declineCookies">
                                <i class="fas fa-times me-1"></i>Reddet
                            </button>
                        </div>
                    </div>
                </div>
            `;

            document.body.insertAdjacentHTML('beforeend', bannerHTML);
            this.banner = document.getElementById('cookieBanner');
        },

        showBanner: function() {
            if (this.banner) {
                setTimeout(() => {
                    this.banner.classList.add('show');
                }, 100);
            }
        },

        hideBanner: function() {
            if (this.banner) {
                this.banner.classList.remove('show');
                this.banner.classList.add('hide');
                
                setTimeout(() => {
                    if (this.banner && this.banner.parentNode) {
                        this.banner.parentNode.removeChild(this.banner);
                    }
                }, 300);
            }
        },

        bindEvents: function() {
            if (!this.banner) return;

            const acceptBtn = this.banner.querySelector('#acceptCookies');
            if (acceptBtn) {
                acceptBtn.addEventListener('click', () => {
                    this.acceptCookies();
                });
            }

            const declineBtn = this.banner.querySelector('#declineCookies');
            if (declineBtn) {
                declineBtn.addEventListener('click', () => {
                    this.declineCookies();
                });
            }

            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && this.banner.classList.contains('show')) {
                    this.declineCookies();
                }
            });
        },

        acceptCookies: function() {
            CookieManager.set(this.cookieName, this.cookieValue, this.cookieExpiry);
            
            this.hideBanner();

            this.triggerConsentEvent('accepted');
            
            console.log('QuantalFlix: Cookies accepted by user');
        },

        declineCookies: function() {
            CookieManager.set(this.cookieName, 'declined', 7); 
            
            this.hideBanner();

            this.clearTrackingCookies();

            this.triggerConsentEvent('declined');
            
            console.log('QuantalFlix: Cookies declined by user');
        },

        clearTrackingCookies: function() {
            const trackingCookies = [
                '_ga', '_gid', '_gat', '_gtag_GA_', '_fbp', '_fbc', 
                'fr', 'tr', 'AnalyticsSyncHistory', 'loglevel'
            ];

            trackingCookies.forEach(cookieName => {
                CookieManager.delete(cookieName);
            });
        },

        triggerConsentEvent: function(status) {
            const event = new CustomEvent('cookieConsent', {
                detail: {
                    status: status,
                    timestamp: new Date().toISOString()
                }
            });
            document.dispatchEvent(event);
        },

        hasConsent: function() {
            const consent = CookieManager.get(this.cookieName);
            return consent === this.cookieValue;
        },

        resetConsent: function() {
            CookieManager.delete(this.cookieName);
            console.log('QuantalFlix: Cookie consent reset');
        }
    };

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', function() {
            CookieBanner.init();
        });
    } else {
        CookieBanner.init();
    }

    window.QuantalFlixCookies = {
        hasConsent: CookieBanner.hasConsent.bind(CookieBanner),
        resetConsent: CookieBanner.resetConsent.bind(CookieBanner),
        manager: CookieManager
    };

})(); 