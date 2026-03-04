/*!
 * Lembrancinhas Product Configurator
 * Cascading dropdowns and dynamic pricing
 */

(function () {
    'use strict';

    var config = window.lembranchinhasConfig || {};

    function init() {
        var tipoSelect = document.getElementById('lembrancinha-tipo');
        var aromaSelect = document.getElementById('lembrancinha-aroma');
        var qtdSelect = document.getElementById('lembrancinha-quantidade');
        var priceDisplay = document.getElementById('lembrancinhas-price-display');
        var priceAmount = document.getElementById('lembrancinhas-price-amount');
        var addToCartBtn = document.querySelector('.single_add_to_cart_button');

        if (!tipoSelect || !aromaSelect || !qtdSelect) {
            return;
        }

        // Disable add-to-cart until all fields are selected
        if (addToCartBtn) {
            addToCartBtn.disabled = true;
            addToCartBtn.classList.add('disabled');
        }

        // Tipo change: populate aromas, reset downstream, swap image
        tipoSelect.addEventListener('change', function () {
            var tipo = this.value;

            // Reset aroma
            aromaSelect.innerHTML = '<option value="">Selecione o aroma...</option>';
            aromaSelect.disabled = true;

            // Reset quantidade
            qtdSelect.value = '';
            qtdSelect.disabled = true;

            // Hide price
            priceDisplay.style.display = 'none';
            toggleAddToCart(false, addToCartBtn);

            // Swap product image
            swapProductImage(tipo);

            if (!tipo) {
                return;
            }

            // Populate aromas for selected tipo
            var aromas = config.aromas[tipo] || {};
            var slugs = Object.keys(aromas);
            for (var i = 0; i < slugs.length; i++) {
                var option = document.createElement('option');
                option.value = slugs[i];
                option.textContent = aromas[slugs[i]];
                aromaSelect.appendChild(option);
            }

            aromaSelect.disabled = false;
            qtdSelect.disabled = false;
        });

        // Aroma change: update price if all selected
        aromaSelect.addEventListener('change', function () {
            updatePrice(tipoSelect, aromaSelect, qtdSelect, priceDisplay, priceAmount, addToCartBtn);
        });

        // Quantidade change: update price if all selected
        qtdSelect.addEventListener('change', function () {
            updatePrice(tipoSelect, aromaSelect, qtdSelect, priceDisplay, priceAmount, addToCartBtn);
        });
    }

    function updatePrice(tipoSelect, aromaSelect, qtdSelect, priceDisplay, priceAmount, addToCartBtn) {
        var tipo = tipoSelect.value;
        var aroma = aromaSelect.value;
        var qtd = parseInt(qtdSelect.value, 10);

        if (!tipo || !aroma || !qtd) {
            priceDisplay.style.display = 'none';
            toggleAddToCart(false, addToCartBtn);
            return;
        }

        var prices = config.prices[tipo] || {};
        var price = prices[qtd];

        if (price !== undefined) {
            priceAmount.textContent = formatPrice(price);
            priceDisplay.style.display = 'flex';
            toggleAddToCart(true, addToCartBtn);
        } else {
            priceDisplay.style.display = 'none';
            toggleAddToCart(false, addToCartBtn);
        }
    }

    function swapProductImage(tipo) {
        var images = config.images || {};
        var src = tipo && images[tipo] ? images[tipo] : images['default'];

        if (!src) {
            return;
        }

        // Swap the main product image (WooCommerce single product gallery)
        var mainImg = document.querySelector('.woocommerce-product-gallery__wrapper .woocommerce-product-gallery__image img');
        if (mainImg) {
            mainImg.style.opacity = '0';
            mainImg.style.transition = 'opacity 0.3s ease';
            setTimeout(function () {
                mainImg.src = src;
                mainImg.srcset = src;
                // Update the zoom link too
                var zoomLink = mainImg.closest('a');
                if (zoomLink) {
                    zoomLink.href = src;
                }
                mainImg.style.opacity = '1';
            }, 150);
        }
    }

    function formatPrice(value) {
        var parts = value.toFixed(config.currencyDecimals).split('.');
        var intPart = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, config.thousandSeparator);
        return config.currencySymbol + '\u00a0' + intPart + config.decimalSeparator + parts[1];
    }

    function toggleAddToCart(enable, btn) {
        if (!btn) {
            return;
        }
        btn.disabled = !enable;
        if (enable) {
            btn.classList.remove('disabled');
        } else {
            btn.classList.add('disabled');
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
