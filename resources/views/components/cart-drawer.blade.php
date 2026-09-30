<div class="cart-overlay" id="cart-overlay" role="dialog" aria-modal="true" aria-label="Keranjang Belanja">
    <div class="cart-drawer" id="cart-drawer">
        <div class="cart-header">
            <h2 class="cart-title">Pesanan Saya</h2>
            <button class="cart-close" id="cart-close" aria-label="Tutup Keranjang">&times;</button>
        </div>
        <div class="cart-body" id="cart-body">
            <!-- Simulated Empty State -->
            <div class="cart-empty" style="text-align: center; padding: 3rem 1rem;">
                <div style="font-size: 3rem; color: var(--cream-dark); margin-bottom: 1rem;">🛒</div>
                <p style="color: var(--brown-light);">Keranjang Anda masih kosong.</p>
                <button type="button" class="btn-primary" style="margin-top: 1rem; padding: 0.5rem 1rem; border: none; background: var(--amber); cursor: pointer;" onclick="document.getElementById('cart-close').click();">Mulai Memilih Roti</button>
            </div>
            
            <!-- Simulated items could go here dynamically using JS -->
        </div>
        <div class="cart-footer">
            <div class="cart-total-row" style="display: flex; justify-content: space-between; font-weight: 700; font-size: 1.25rem; margin-bottom: 1rem;">
                <span>Total Estimasi</span>
                <span id="cart-total-amount">Rp 0</span>
            </div>
            <a href="https://wa.me/6281234567890" target="_blank" rel="noopener" class="btn-checkout" style="display: block; width: 100%; text-align: center; padding: 1rem; background: var(--brown-deep); color: var(--amber); font-weight: bold; text-transform: uppercase; text-decoration: none;">
                Checkout via WhatsApp
            </a>
        </div>
    </div>
</div>

<style>
    .cart-overlay {
        position: fixed;
        inset: 0;
        background: rgba(44, 26, 14, 0.5);
        backdrop-filter: blur(3px);
        z-index: 1000;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
    }
    .cart-overlay.open {
        opacity: 1;
        visibility: visible;
    }
    
    .cart-drawer {
        position: fixed;
        top: 0;
        right: -100%;
        width: 100%;
        max-width: 400px;
        height: 100%;
        background: var(--white);
        box-shadow: -5px 0 30px rgba(0,0,0,0.1);
        display: flex;
        flex-direction: column;
        transition: right 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        z-index: 1001;
    }
    .cart-overlay.open .cart-drawer {
        right: 0;
    }
    
    .cart-header {
        padding: 1.5rem;
        border-bottom: 1px solid var(--cream-dark);
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: var(--white);
    }
    .cart-title {
        font-family: var(--ff-serif);
        font-size: 1.5rem;
        color: var(--brown-deep);
        margin: 0;
    }
    .cart-close {
        background: none;
        border: none;
        font-size: 2rem;
        line-height: 1;
        color: var(--brown-light);
        cursor: pointer;
        padding: 0 0.5rem;
    }
    
    .cart-body {
        flex: 1;
        overflow-y: auto;
        padding: 1.5rem;
    }
    
    .cart-footer {
        padding: 1.5rem;
        border-top: 1px solid var(--cream-dark);
        background: var(--white);
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var overlay = document.getElementById('cart-overlay');
        var closeBtn = document.getElementById('cart-close');
        
        // This function can be called by clicking a cart icon in the header
        window.openCart = function() {
            overlay.classList.add('open');
            document.body.style.overflow = 'hidden';
        };
        
        window.closeCart = function() {
            overlay.classList.remove('open');
            document.body.style.overflow = '';
        };
        
        if(closeBtn) {
            closeBtn.addEventListener('click', closeCart);
        }
        
        if(overlay) {
            overlay.addEventListener('click', function(e) {
                if (e.target === overlay) {
                    closeCart();
                }
            });
        }
    });
</script>
