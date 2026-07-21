// Proteção contra inspeção de código
(function() {
    'use strict';

    // Elementos que NUNCA devem ser bloqueados (campos de formulário)
    function isFormField(el) {
        if (!el) return false;
        const tag = el.tagName;
        return (
            tag === 'INPUT' ||
            tag === 'TEXTAREA' ||
            tag === 'SELECT' ||
            tag === 'OPTION' ||
            tag === 'LABEL' ||
            tag === 'BUTTON' ||
            el.isContentEditable
        );
    }

    // ─────────────────────────────────────────────
    // Desabilitar clique direito (exceto em campos)
    // ─────────────────────────────────────────────
    document.addEventListener('contextmenu', function(e) {
        if (isFormField(e.target)) return;
        e.preventDefault();
        return false;
    });

    // ─────────────────────────────────────────────
    // Desabilitar teclas de desenvolvedor
    // (isto pode ficar global, não afeta digitação normal)
    // ─────────────────────────────────────────────
    document.addEventListener('keydown', function(e) {
        if (e.keyCode === 123 || // F12
            (e.ctrlKey && e.shiftKey && (e.keyCode === 73 || e.keyCode === 74)) || // Ctrl+Shift+I/J
            (e.ctrlKey && e.keyCode === 85) || // Ctrl+U
            (e.ctrlKey && e.shiftKey && e.keyCode === 67)) { // Ctrl+Shift+C
            e.preventDefault();
            return false;
        }
    });

    // ─────────────────────────────────────────────
    // Desabilitar seleção de texto (exceto em campos)
    // ─────────────────────────────────────────────
    document.addEventListener('selectstart', function(e) {
        if (isFormField(e.target)) return;
        e.preventDefault();
        return false;
    });

    // ─────────────────────────────────────────────
    // REMOVIDO: document.onmousedown = () => false;
    // Este era o responsável por impedir foco em
    // qualquer campo do site. O selectstart acima já
    // cobre o objetivo de impedir seleção de texto,
    // sem bloquear cliques/foco.
    // ─────────────────────────────────────────────

    // ─────────────────────────────────────────────
    // Desabilitar arrastar (exceto em campos)
    // ─────────────────────────────────────────────
    document.addEventListener('dragstart', function(e) {
        if (isFormField(e.target)) return;
        e.preventDefault();
        return false;
    });

    // ─────────────────────────────────────────────
    // Limpar console periodicamente
    // (reduzido para 5s em vez de 1s — desnecessário
    // ser tão agressivo e consome recursos)
    // ─────────────────────────────────────────────
    setInterval(function() {
        console.clear();
        console.log('%cSTOP!', 'color: red; font-size: 50px; font-weight: bold;');
        console.log(
            '%cEsta é uma funcionalidade do navegador destinada a desenvolvedores. Se alguém disse para você copiar e colar algo aqui para habilitar uma funcionalidade ou "hackear" a conta de alguém, isso é uma farsa e dará a essa pessoa acesso à sua conta.',
            'color: red; font-size: 16px;'
        );
    }, 5000);

    // ─────────────────────────────────────────────
    // REMOVIDO: deteção de DevTools por diferença de
    // outerHeight/innerHeight e o teste "debugger" por
    // timing. Ambos geram falsos positivos em zoom,
    // escala de ecrã, monitores ultra-wide e mobile,
    // bloqueando utilizadores legítimos sem DevTools
    // aberto. Se quiseres manter algum tipo de deteção
    // de DevTools, o ideal é uma abordagem menos
    // agressiva — falamos sobre isso, se quiseres.
    // ─────────────────────────────────────────────

    // ─────────────────────────────────────────────
    // Ofuscar código fonte de scripts inline
    // ─────────────────────────────────────────────
    setTimeout(function() {
        let scripts = document.getElementsByTagName('script');
        for (let i = 0; i < scripts.length; i++) {
            if (scripts[i].src === '') {
                scripts[i].innerHTML = '';
            }
        }
    }, 1000);

    // ─────────────────────────────────────────────
    // Detectar mudanças no DOM (iframes/debug injetados)
    // ─────────────────────────────────────────────
    const observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            if (mutation.type === 'childList') {
                mutation.addedNodes.forEach(function(node) {
                    if (node.nodeType === 1) {
                        if (node.classList && (node.classList.contains('debug') ||
                            node.id === 'debug' ||
                            node.tagName === 'IFRAME')) {
                            node.remove();
                        }
                    }
                });
            }
        });
    });

    observer.observe(document.body, {
        childList: true,
        subtree: true
    });

    // ─────────────────────────────────────────────
    // Proteção contra view-source
    // ─────────────────────────────────────────────
    if (window.location.protocol === 'view-source:') {
        window.location.href = 'about:blank';
    }

})();

// Minificar e ofuscar este arquivo em produção
// Adicionar mais camadas de proteção conforme necessário