// STECH ENGENHARIA — dark mode partilhado por todas as páginas.
// Carregar no <head>, SEM defer/async, para aplicar o tema antes da primeira pintura.
(function () {
    'use strict';

    var KEY = 'tema';              // valores guardados: 'claro' | 'escuro'
    var root = document.documentElement;
    var media = window.matchMedia ? window.matchMedia('(prefers-color-scheme: dark)') : null;

    function lerGuardado() {
        try {
            var v = localStorage.getItem(KEY);
            return (v === 'claro' || v === 'escuro') ? v : null;
        } catch (e) {
            return null; // localStorage indisponível
        }
    }

    function temaInicial() {
        return lerGuardado() || (media && media.matches ? 'escuro' : 'claro');
    }

    function aplicar(tema) {
        root.setAttribute('data-tema', tema);
        // Faz os componentes do Bootstrap 5.3 (bg-white, text-body, etc.) seguirem o tema.
        root.setAttribute('data-bs-theme', tema === 'escuro' ? 'dark' : 'light');

        var meta = document.querySelector('meta[name="theme-color"]');
        if (meta) meta.setAttribute('content', tema === 'escuro' ? '#0b1220' : '#ffffff');

        atualizarBotoes(tema);
    }

    function atualizarBotoes(tema) {
        var escuro = tema === 'escuro';
        var botoes = document.querySelectorAll('[data-theme-toggle]');
        for (var i = 0; i < botoes.length; i++) {
            var b = botoes[i];
            b.setAttribute('aria-pressed', escuro ? 'true' : 'false');
            var label = escuro ? b.getAttribute('data-label-to-light') : b.getAttribute('data-label-to-dark');
            if (label) b.setAttribute('aria-label', label);
        }
    }

    function guardar(tema) {
        try { localStorage.setItem(KEY, tema); } catch (e) { /* muda na mesma, só não persiste */ }
    }

    // 1) Aplica já (script síncrono no head → sem flash)
    aplicar(temaInicial());

    // 2) Liga os botões quando o DOM existir
    document.addEventListener('DOMContentLoaded', function () {
        atualizarBotoes(root.getAttribute('data-tema') || 'claro');

        document.addEventListener('click', function (e) {
            var btn = e.target.closest ? e.target.closest('[data-theme-toggle]') : null;
            if (!btn) return;
            var novo = root.getAttribute('data-tema') === 'escuro' ? 'claro' : 'escuro';
            aplicar(novo);
            guardar(novo);
        });
    });

    // 3) Sem escolha manual, acompanha o sistema operativo
    if (media) {
        var aoMudarSistema = function (e) {
            if (!lerGuardado()) aplicar(e.matches ? 'escuro' : 'claro');
        };
        if (media.addEventListener) media.addEventListener('change', aoMudarSistema);
        else if (media.addListener) media.addListener(aoMudarSistema);
    }

    // 4) Sincroniza entre separadores abertos
    window.addEventListener('storage', function (e) {
        if (e.key === KEY && (e.newValue === 'claro' || e.newValue === 'escuro')) {
            aplicar(e.newValue);
        }
    });
})();