/**
 * ========================================
 * LOADING SCREEN MANAGER
 * PositiveSense - Gerenciador de Carregamento
 * ========================================
 *
 * Controla fade in/out do loading screen
 * Com animações suaves e fluidas
 */

class LoadingScreenManager {
    constructor() {
        this.loadingScreen = null;
        this.initialized = false;
        this.hideDelay = 1000; // Tempo mínimo em tela (1s)
        this.init();
    }

    /**
     * Inicializa o loading screen
     */
    init() {
        if (this.initialized) return;

        // Cria o elemento do loading screen
        this.createLoadingScreen();

        // Inicia fade out quando página carrega
        window.addEventListener('load', () => {
            this.hideLoadingScreen();
        });

        // Backup: hide após um tempo máximo mesmo se não carregar
        setTimeout(() => {
            this.hideLoadingScreen();
        }, 5000); // 5 segundos máximo

        this.initialized = true;
    }

    /**
     * Cria a estrutura do loading screen
     */
    createLoadingScreen() {
        if (document.getElementById('loading-screen')) {
            this.loadingScreen = document.getElementById('loading-screen');
            return;
        }

        const html = `
            <div id="loading-screen">
                <div class="loading-content">
                    <div class="loading-mascote">
                        <img src="img/teladecarregamento.gif?v=${Date.now()}" alt="Carregando PositiveSense" class="mascote-gif">
                    </div>

                    <div class="loading-text">
                        Carregando
                        <div class="loading-dots">
                            <div class="dot"></div>
                            <div class="dot"></div>
                            <div class="dot"></div>
                        </div>
                    </div>

                    <div class="loading-subtext">
                        Preparando sua experiência inclusiva...
                    </div>

                    <div class="loading-progress-bar">
                        <div class="loading-progress-fill"></div>
                    </div>
                </div>
            </div>
        `;

        document.body.insertAdjacentHTML('afterbegin', html);
        this.loadingScreen = document.getElementById('loading-screen');
    }

    /**
     * Esconde o loading screen com fade out
     */
    hideLoadingScreen() {
        if (!this.loadingScreen) return;

        setTimeout(() => {
            this.loadingScreen.classList.add('fade-out');

            // Remove do DOM após a animação
            setTimeout(() => {
                if (this.loadingScreen && this.loadingScreen.parentNode) {
                    this.loadingScreen.parentNode.removeChild(this.loadingScreen);
                }
            }, 800); // Tempo da animação fade-out
        }, this.hideDelay);
    }

    /**
     * Mostra novamente o loading screen
     */
    showLoadingScreen() {
        if (this.loadingScreen) {
            this.loadingScreen.classList.remove('fade-out');
        }
    }
}

// Inicializa automaticamente quando o script carrega
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => {
        window.loadingScreenManager = new LoadingScreenManager();
    });
} else {
    window.loadingScreenManager = new LoadingScreenManager();
}
