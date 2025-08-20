# Zen Secrets - UX/UI Design Project Plan

## Redesign para Loja Online Premium de Produtos Aromáticos

---

## 📋 Resumo Executivo

### Situação Atual

A loja online Zen Secrets possui uma estrutura técnica sólida baseada em WordPress/WooCommerce, mas apresenta problemas significativos de design e experiência do usuário que afetam as conversões e a percepção de marca premium. Como uma loja especializada em produtos aromáticos naturais focados no bem-estar, é essencial transmitir luxo e confiança.

### Objetivos do Projeto

1. **Transformar** a experiência visual em um design luxuoso e moderno
2. **Otimizar** a jornada do usuário para aumentar conversões
3. **Fortalecer** a identidade de marca premium
4. **Melhorar** indicadores de confiança e credibilidade
5. **Implementar** design responsivo de alta qualidade

### Modelo de Negócio

**Zen Secrets é uma loja online premium** que vende produtos físicos de aromaterapia focados no bem-estar. Nossa missão é proporcionar uma experiência de compra luxuosa e confiável para clientes que buscam produtos aromáticos naturais de alta qualidade.

### Produtos Principais

- **Aromatizadores** (difusores ultrassônicos e elétricos)
- **Home Spray** (sprays aromáticos instantâneos)
- **Velas Aromáticas** (velas artesanais premium)

### Aromas Disponíveis

- Chá Branco
- Flor de Figo
- Bamboo
- Marinho
- Palo Santo

---

## 🎯 Análise UX/UI - Problemas Identificados

### Problemas Críticos de Design

1. **Ausência de hierarquia visual clara**

   - Falta de foco visual nas seções principais
   - Elementos competindo por atenção
   - Contraste insuficiente em elementos importantes

2. **Experiência visual genérica**

   - Não transmite luxo ou sofisticação
   - Ausência de elementos visuais de produto
   - Falta de personalidade da marca

3. **Indicadores de confiança fracos**

   - Falta de elementos que transmitam segurança
   - Ausência de contato direto visível
   - Processo de compra não transparente

4. **Problemas de conversão**
   - CTAs (Call-to-Actions) pouco evidentes
   - Jornada do usuário confusa
   - Falta de senso de urgência ou benefícios claros

### Oportunidades de Melhoria

1. **Hero section impactante** com imagem real dos produtos
2. **Trust indicators** estrategicamente posicionados
3. **Showcase visual** das categorias principais
4. **Integração** de elementos de contato direto
5. **Design system** consistente e premium

---

## 🎨 Estratégia de Design

### Identidade Visual Premium

```css
/* Paleta de Cores Luxuosa */
--cor-primaria: #6b4fc4; /* Roxo sofisticado */
--cor-texto: #000000; /* Preto elegante */
--cor-fundo: #ffffff; /* Branco premium */
--cor-borda: #e6e6e6; /* Cinza suave */
--cor-accent: #8b5fd6; /* Roxo claro hover */
--cor-gold: #d4af37; /* Dourado premium */
--sombra-luxo: 0 8px 32px rgba(107, 79, 196, 0.12);
```

### Princípios de Design

1. **Minimalismo Luxuoso**: Espaço em branco generoso, elementos refinados
2. **Hierarquia Clara**: Tipografia bem definida, contrastes adequados
3. **Consistência**: Design system unificado em todas as páginas
4. **Acessibilidade**: WCAG 2.1 AA compliance obrigatória
5. **Performance**: Otimização para Core Web Vitals

### Elementos Visuais Principais

- **Gradientes sutis** para profundidade
- **Sombras elegantes** para hierarquia
- **Animações suaves** para interações
- **Imagens reais** dos produtos
- **Ícones consistentes** e profissionais

---

## 🏗️ Plano de Implementação

### Fase 1: Hero Section Redesign

**Prioridade: ALTA | Tempo: 2-3 dias**

#### Problemas Atuais

- Hero genérico com ícones SVG simples
- Falta de impacto visual
- CTAs pouco evidentes
- Ausência de produtos reais

#### Solução Proposta

1. **Imagem principal**: `/assets/img/Foto-tela-inicial-.webp` como hero background
2. **Altura otimizada**: 70vh para desktop, 60vh para mobile
3. **Posicionamento da imagem**: Alinhada do centro inferior (center bottom)
4. **Overlay elegante** com gradiente sutil
5. **Tipografia impactante** com hierarchy clara
6. **CTAs prominentes** com design luxury
7. **Elementos flutuantes** com produtos reais

#### Implementação

```html
<!-- Hero Section Redesigned -->
<section class="hero-luxury-screenshot">
  <div class="hero-background">
    <img
      src="/assets/img/Foto-tela-inicial-.webp"
      alt="Zen Secrets - Aromas Premium"
      class="hero-image"
      loading="eager"
    />
    <div class="hero-overlay-left"></div>
  </div>

  <div class="hero-content">
    <div class="hero-text">
      <h1 class="hero-title">
        Desperte Seus Sentidos com
        <span class="highlight-luxury">Aromas Exclusivos</span>
      </h1>
      <p class="hero-subtitle">
        Transforme seu ambiente com nossa coleção premium de aromatizadores,
        velas e sprays artesanais
      </p>
      <div class="hero-ctas">
        <a href="/loja" class="btn-luxury primary-cta">
          <span>Explorar Produtos</span>
          <svg><!-- Shopping icon --></svg>
        </a>
        <a href="/sobre-os-aromas" class="btn-luxury secondary-cta">
          Conhecer Aromas
        </a>
      </div>
    </div>

    <div class="hero-visual">
      <div class="product-showcase">
        <!-- Floating product elements -->
      </div>
    </div>
  </div>
</section>
```

### Fase 2: Trust Indicators Enhancement

**Prioridade: ALTA | Tempo: 1-2 dias**

#### Nova Seção de Confiança

Implementar logo após o hero com os indicadores solicitados:

```html
<section class="trust-indicators-premium">
  <div class="trust-grid">
    <div class="trust-item">
      <div class="trust-icon payment">
        <svg><!-- Payment icon --></svg>
      </div>
      <h3>Pagamento Facilitado</h3>
      <p>Cartão, Pix e Boleto Bancário</p>
    </div>

    <div class="trust-item">
      <div class="trust-icon shipping">
        <svg><!-- Shipping icon --></svg>
      </div>
      <h3>Envio para todo Brasil</h3>
      <p>Rastreamento disponível</p>
    </div>

    <div class="trust-item">
      <div class="trust-icon security">
        <svg><!-- Security icon --></svg>
      </div>
      <h3>Compra Segura</h3>
      <p>Seus dados protegidos</p>
    </div>

    <div class="trust-item contact-highlight">
      <div class="trust-icon whatsapp">
        <svg><!-- WhatsApp icon --></svg>
      </div>
      <h3>Ficou em dúvida?</h3>
      <p>Chama no WhatsApp</p>
      <a href="https://wa.me/5516991626921" class="whatsapp-btn">
        (16) 99162-6921
      </a>
    </div>
  </div>
</section>
```

### Fase 3: Category Showcase Visual ✅ COMPLETED

**Prioridade: ALTA | Tempo: 2-3 dias | Status: ✅ IMPLEMENTADO**

#### Showcase das 3 Categorias Principais ✅ IMPLEMENTADO

Seção visual impactante implementada com as imagens fornecidas:

```html
<!-- Nossos Produtos Queridos -->
<section class="produtos-queridos-section">
  <div class="section-header">
    <h2 class="section-title luxury-heading">Nossos Produtos Queridos</h2>
    <p class="section-subtitle">
      Descubra nossa linha completa de produtos para harmonizar seu ambiente
    </p>
  </div>

  <div class="produtos-grid">
    <!-- Velas Aromáticas -->
    <div class="produto-card velas-card animate-fade-in-up">
      <div class="produto-image">
        <img
          src="/assets/img/all-candles.webp"
          alt="Velas Aromáticas Zen Secrets"
          loading="lazy"
        />
        <div class="produto-overlay"></div>
      </div>
      <div class="produto-content">
        <h3 class="produto-title">Velas Aromáticas</h3>
        <p class="produto-description">
          Fragrâncias exclusivas para criar momentos especiais em seu ambiente
        </p>
      </div>
    </div>

    <!-- Aromatizadores -->
    <div class="produto-card aromatizadores-card animate-fade-in-up">
      <div class="produto-image">
        <img
          src="/assets/img/all-aromatizadores.webp"
          alt="Aromatizadores Zen Secrets"
          loading="lazy"
        />
        <div class="produto-overlay"></div>
      </div>
      <div class="produto-content">
        <h3 class="produto-title">Aromatizadores</h3>
        <p class="produto-description">
          Perfume seu espaço com nossas essências naturais duradouras
        </p>
      </div>
    </div>

    <!-- Home Spray -->
    <div class="produto-card homespray-card animate-fade-in-up">
      <div class="produto-image">
        <img
          src="/assets/img/all-homespray.webp"
          alt="Home Spray Zen Secrets"
          loading="lazy"
        />
        <div class="produto-overlay"></div>
      </div>
      <div class="produto-content">
        <h3 class="produto-title">Home Spray</h3>
        <p class="produto-description">
          Fragrâncias refrescantes para uma atmosfera instantaneamente agradável
        </p>
      </div>
    </div>
  </div>
</section>
```

**Características Implementadas:**

- ✅ **Título atualizado**: "Nossos Produtos Queridos"
- ✅ **Subtítulo atualizado**: "Descubra nossa linha completa de produtos para harmonizar seu ambiente"
- ✅ **Design exato do screenshot**: Cards com imagens em grayscale, overlay preto, texto branco centralizado
- ✅ **Imagens corretas**: all-candles.webp, all-aromatizadores.webp, all-homespray.webp
- ✅ **Layout responsivo**: Grid 3 colunas (desktop) → 2 colunas (tablet) → 1 coluna (mobile)
- ✅ **Efeitos hover**: Transição grayscale → colorido, overlay dinâmico
- ✅ **Tipografia premium**: Títulos e descrições em branco com text-shadow para legibilidade
- ✅ **Posicionamento correto**: Texto centralizado sobre a imagem com overlay preto semi-transparente
- ✅ **Filtro grayscale**: Imagens começam em preto e branco com transição suave de 0.6s

### Fase 4: Footer Premium Enhancement

**Prioridade: MÉDIA | Tempo: 1-2 dias**

#### Atualizar Formas de Pagamento e Entrega

Implementar as imagens fornecidas no footer:

```html
<div class="footer-payments-enhanced">
  <div class="payment-methods">
    <h5>Formas de Pagamento</h5>
    <div class="payment-icons-real">
      <img src="/assets/img/visa.png" alt="Visa" title="Visa" />
      <img
        src="/assets/img/mastercard.png"
        alt="Mastercard"
        title="Mastercard"
      />
      <img
        src="/assets/img/amex.png"
        alt="American Express"
        title="American Express"
      />
      <img src="/assets/img/elo.png" alt="Elo" title="Elo" />
      <img src="/assets/img/pix.png" alt="PIX" title="PIX" />
    </div>
  </div>

  <div class="delivery-methods">
    <h5>Entrega</h5>
    <div class="delivery-icon">
      <img
        src="/assets/img/melhorenvio.png"
        alt="Melhor Envio"
        title="Melhor Envio"
      />
    </div>
  </div>
</div>
```

### Fase 5: Typography & Visual Hierarchy

**Prioridade: MÉDIA | Tempo: 2-3 dias**

#### Sistema Tipográfico Premium

```css
/* Hierarchy tipográfica luxuosa */
h1 {
  font-size: clamp(2.5rem, 5vw, 4rem);
  font-weight: 800;
}
h2 {
  font-size: clamp(2rem, 4vw, 3rem);
  font-weight: 700;
}
h3 {
  font-size: clamp(1.5rem, 3vw, 2rem);
  font-weight: 600;
}

/* Luxury text styles */
.luxury-heading {
  background: var(--gradiente-luxo);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}

.subtitle-premium {
  font-size: 1.25rem;
  line-height: 1.6;
  color: var(--cor-texto);
  opacity: 0.8;
  max-width: 65ch;
}
```

---

## 📱 Design Responsivo Premium

### Breakpoints Estratégicos

```css
/* Mobile First Approach */
/* Mobile: 320px - 767px */
/* Tablet: 768px - 1023px */
/* Desktop: 1024px+ */
/* Large Desktop: 1400px+ */
```

### Adaptações por Dispositivo

#### Mobile (320px - 767px)

- Hero com altura otimizada (70vh)
- Trust indicators em grid 2x2
- Categories em stack vertical
- **Products grid: 2 produtos por linha**
- CTAs full-width
- Navegação hamburger premium

#### Tablet (768px - 1023px)

- Hero com layout lado a lado
- Trust indicators em linha
- Categories em grid 2+1
- **Products grid: 3 produtos por linha**
- Sidebar condicional

#### Desktop (1024px+)

- Layout completo com todos elementos
- **Products grid: 4 produtos por linha**
- Animações e interações avançadas
- Hover states sofisticados
- Parallax sutil

### Product Grid System Specifications - COMPACT VERSION ✅

```css
/* Responsive Product Grid - COMPACT DESIGN */
.products-grid,
.woocommerce ul.products {
  display: grid;
  gap: var(--espacamento-md);
  padding: var(--espacamento-md);
}

/* Mobile: 2 products per row - COMPACT */
@media (max-width: 767px) {
  .products-grid,
  .woocommerce ul.products {
    grid-template-columns: repeat(2, 1fr);
    gap: var(--espacamento-sm);
  }
}

/* Tablet: 3 products per row - COMPACT */
@media (min-width: 768px) and (max-width: 1023px) {
  .products-grid,
  .woocommerce ul.products {
    grid-template-columns: repeat(3, 1fr);
    gap: var(--espacamento-md);
  }
}

/* Desktop: 4 products per row - COMPACT */
@media (min-width: 1024px) {
  .products-grid,
  .woocommerce ul.products {
    grid-template-columns: repeat(4, 1fr);
    gap: var(--espacamento-lg);
  }
}

/* Large Desktop: 4 products per row with more spacing */
@media (min-width: 1200px) {
  .products-grid,
  .woocommerce ul.products {
    grid-template-columns: repeat(4, 1fr);
    gap: var(--espacamento-xl);
  }
}
```

### Product Card Improvements ✅

**Compact Design Features:**

- **Smaller Cards**: Max-width 280px for better grid fit
- **Compact Images**: Fixed height 200px (150px on mobile)
- **Reduced Padding**: More content, less empty space
- **Optimized Typography**: Smaller fonts with better hierarchy
- **Full-width Buttons**: Better call-to-action prominence
- **Text Truncation**: Ellipsis for long product names

---

## 🎯 Design Consistency Across All Pages

### Global Design System Application

Para garantir uma experiência premium e consistente, **TODAS** as páginas devem seguir o mesmo design system:

#### 📄 **Homepage** (front-page.php)

- ✅ **Hero section** com Foto-tela-inicial-.webp
- ✅ **Trust indicators** customizados
- ✅ **Product grid** 4-3-2 responsivo COMPACT
- ✅ **Category showcase** visual premium ✅ **ATUALIZADO PARA "Nossos Produtos Queridos"**

#### 🛍️ **WooCommerce Shop Pages**

- **Shop Page** (archive-product.php) ✅ UPDATED
  - Header consistente com filtros elegantes
  - Product grid 4-3-2 COMPACT com cards premium
  - Pagination luxuosa
  - Sidebar com filtros estilizados

#### 📦 **Single Product Page** (single-product.php)

- **Layout premium** com imagens grandes
- **Typography consistency** nos títulos e descrições
- **Buttons** seguindo design system (.btn-luxury)
- **Trust badges** próximo ao botão comprar
- **Related products** em grid 4-3-2 COMPACT

#### 🛒 **Cart Page** (page-carrinho.php)

- **Header section** com breadcrumbs elegantes
- **Table styling** premium com borders sutis
- **Quantity inputs** estilizados
- **Buttons** consistency (.btn-luxury primary/secondary)
- **Trust indicators** na sidebar

#### 💳 **Checkout Page** (page-checkout.php)

- **Two-column layout** (desktop) / stacked (mobile)
- **Form inputs** com styling luxury (.luxury-form-input)
- **Progress indicator** visual
- **Payment methods** com ícones reais
- **Security badges** prominentes
- **Error states** elegantes

#### ✅ **Thank You Page** (checkout/thankyou.php)

- **Success message** com design celebration
- **Order details** em layout card premium
- **Next steps** com CTAs claros
- **Social proof** e review request
- **Related products** suggestion

#### 👤 **My Account Pages** (page-minha-conta.php)

- **Dashboard** com navigation sidebar elegante
- **Account sections** em cards premium
- **Forms** seguindo design system
- **Order history** em table luxury
- **Profile settings** com visual feedback

#### 📧 **Email Templates** (WooCommerce emails)

- **Header** com logo e cores da marca
- **Typography** consistente
- **Buttons** seguindo design system
- **Footer** com informações de contato
- **Responsive** email design

#### 📞 **Contact Page** (page-fale-conosco.php)

- **Contact form** premium styling
- **Contact info** com ícones elegantes
- **Map integration** (se aplicável)
- **WhatsApp** CTA prominente
- **Social links** estilizados

#### ℹ️ **About Page** (page-sobre-aromas.php)

- **Content sections** com spacing generoso
- **FAQ accordion** elegante
- **Typography hierarchy** clara
- **Image galleries** estilizadas
- **CTA sections** integradas

#### 🔍 **Search Results** (search.php)

- **Search bar** premium styling
- **Results layout** em grid consistente
- **Filters** sidebar elegante
- **Empty state** design
- **Pagination** luxury

#### ❌ **404 Error Page** (404.php)

- **Branded error page** com personalidade
- **Navigation suggestions** úteis
- **Search integration** premium
- **Popular products** showcase
- **Return home** CTA claro

### 🎨 **Global Design Components Library**

#### Core Button System

```css
/* Primary Button - Main CTAs */
.btn-luxury.primary {
  background: var(--gradiente-luxo);
  color: var(--cor-fundo);
  border: none;
  padding: var(--espacamento-md) var(--espacamento-xl);
  border-radius: 12px;
  font-weight: 600;
  font-size: 1.1rem;
  box-shadow: var(--sombra-luxo);
  transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.btn-luxury.primary:hover {
  transform: translateY(-3px);
  box-shadow: 0 12px 48px rgba(107, 79, 196, 0.25);
}

/* Secondary Button - Support CTAs */
.btn-luxury.secondary {
  background: transparent;
  color: var(--cor-primaria);
  border: 2px solid var(--cor-primaria);
  padding: var(--espacamento-md) var(--espacamento-xl);
  border-radius: 12px;
  font-weight: 600;
  transition: all 0.3s ease;
}

.btn-luxury.secondary:hover {
  background: var(--cor-primaria);
  color: var(--cor-fundo);
  transform: translateY(-2px);
}

/* WhatsApp Button - Special CTA */
.btn-whatsapp {
  background: #25d366;
  color: white;
  border: none;
  padding: var(--espacamento-md) var(--espacamento-lg);
  border-radius: 25px;
  font-weight: 600;
  display: inline-flex;
  align-items: center;
  gap: var(--espacamento-sm);
  transition: all 0.3s ease;
}

.btn-whatsapp:hover {
  background: #128c7e;
  transform: translateY(-2px);
  box-shadow: 0 8px 24px rgba(37, 211, 102, 0.3);
}
```

#### Form Components

```css
/* Luxury Form Inputs */
.luxury-form-input {
  background: rgba(255, 255, 255, 0.9);
  border: 2px solid var(--cor-borda);
  border-radius: 12px;
  padding: var(--espacamento-md) var(--espacamento-lg);
  font-size: 1rem;
  transition: all 0.3s ease;
  width: 100%;
}

.luxury-form-input:focus {
  border-color: var(--cor-primaria);
  box-shadow: 0 0 0 4px rgba(107, 79, 196, 0.1);
  outline: none;
  background: var(--cor-fundo);
}

.luxury-form-input:invalid {
  border-color: #e74c3c;
  box-shadow: 0 0 0 4px rgba(231, 76, 60, 0.1);
}

/* Form Groups */
.form-group {
  margin-bottom: var(--espacamento-lg);
}

.form-label {
  display: block;
  font-weight: 600;
  color: var(--cor-texto);
  margin-bottom: var(--espacamento-sm);
}
```

#### Card Components

```css
/* Premium Product Cards */
.product-card-luxury {
  background: var(--cor-fundo);
  border-radius: 20px;
  overflow: hidden;
  box-shadow: var(--sombra-sutil);
  border: 1px solid var(--cor-borda);
  transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  position: relative;
}

.product-card-luxury:hover {
  transform: translateY(-8px);
  box-shadow: var(--sombra-luxo);
  border-color: var(--cor-primaria);
}

.product-card-luxury::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: var(--gradiente-luxo);
  transform: scaleX(0);
  transition: transform 0.3s ease;
}

.product-card-luxury:hover::before {
  transform: scaleX(1);
}

/* Content Cards */
.content-card-luxury {
  background: var(--cor-fundo);
  padding: var(--espacamento-xl);
  border-radius: 16px;
  box-shadow: var(--sombra-sutil);
  border: 1px solid var(--cor-borda);
  margin-bottom: var(--espacamento-lg);
}
```

#### Typography System

```css
/* Heading Hierarchy */
.luxury-heading {
  background: var(--gradiente-luxo);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  font-weight: 700;
  line-height: 1.2;
  margin-bottom: var(--espacamento-md);
}

.section-title {
  font-size: clamp(2rem, 4vw, 3rem);
  font-weight: 700;
  color: var(--cor-primaria);
  text-align: center;
  margin-bottom: var(--espacamento-md);
}

.section-subtitle {
  font-size: 1.25rem;
  line-height: 1.6;
  color: var(--cor-texto);
  opacity: 0.8;
  text-align: center;
  max-width: 65ch;
  margin: 0 auto var(--espacamento-xl);
}

.page-title {
  font-size: clamp(2.5rem, 5vw, 4rem);
  font-weight: 800;
  color: var(--cor-primaria);
  margin-bottom: var(--espacamento-lg);
  text-align: center;
}
```

#### Navigation Components

```css
/* Breadcrumbs */
.breadcrumbs-luxury {
  display: flex;
  align-items: center;
  gap: var(--espacamento-sm);
  margin-bottom: var(--espacamento-lg);
  padding: var(--espacamento-md) 0;
  font-size: 0.9rem;
}

.breadcrumbs-luxury a {
  color: var(--cor-primaria);
  text-decoration: none;
  transition: color 0.3s ease;
}

.breadcrumbs-luxury a:hover {
  color: var(--cor-accent);
}

.breadcrumb-separator {
  color: var(--cor-borda);
  margin: 0 var(--espacamento-xs);
}

/* Pagination */
.pagination-luxury {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: var(--espacamento-sm);
  margin: var(--espacamento-xl) 0;
}

.pagination-luxury .page-link {
  background: var(--cor-fundo);
  border: 2px solid var(--cor-borda);
  color: var(--cor-primaria);
  padding: var(--espacamento-sm) var(--espacamento-md);
  border-radius: 8px;
  text-decoration: none;
  transition: all 0.3s ease;
}

.pagination-luxury .page-link:hover,
.pagination-luxury .page-link.current {
  background: var(--cor-primaria);
  color: var(--cor-fundo);
  border-color: var(--cor-primaria);
}
```

#### Trust Elements

```css
/* Trust Badges */
.trust-badge {
  display: inline-flex;
  align-items: center;
  gap: var(--espacamento-xs);
  background: rgba(107, 79, 196, 0.05);
  border: 1px solid rgba(107, 79, 196, 0.1);
  padding: var(--espacamento-sm) var(--espacamento-md);
  border-radius: 8px;
  font-size: 0.9rem;
  color: var(--cor-primaria);
  font-weight: 500;
}

/* Security Indicators */
.security-indicator {
  display: flex;
  align-items: center;
  gap: var(--espacamento-sm);
  color: var(--cor-gold);
  font-weight: 600;
  margin: var(--espacamento-md) 0;
}

.security-indicator svg {
  width: 20px;
  height: 20px;
}
```

---

## 🎨 Elementos de Design Premium

### Micro-interações

1. **Hover effects** suaves em botões e cards
2. **Loading states** elegantes
3. **Scroll animations** sutis
4. **Form feedback** visual imediato
5. **Image zoom** em produtos

### Animações CSS

```css
/* Entrance animations */
@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Luxury hover effects */
.luxury-card:hover {
  transform: translateY(-8px);
  box-shadow: var(--sombra-luxo);
  transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}
```

### Sistema de Ícones

- **SVG inline** para performance
- **Ícones consistentes** em todo o site
- **Estados diferentes** (normal, hover, active)
- **Acessibilidade** com aria-labels

---

## 🔗 Informações de Contato e Social

### Dados de Contato

```html
<!-- Informações integradas no design -->
<div class="contact-integration">
  <div class="email-contact">
    <svg><!-- Email icon --></svg>
    <a href="mailto:secretszen888@gmail.com">secretszen888@gmail.com</a>
  </div>

  <div class="whatsapp-contact prominent">
    <svg><!-- WhatsApp icon --></svg>
    <a href="https://wa.me/5516991626921">(16) 99162-6921</a>
  </div>

  <div class="instagram-contact">
    <svg><!-- Instagram icon --></svg>
    <a href="https://www.instagram.com/secretszen">@secretszen</a>
  </div>
</div>
```

### Floating WhatsApp Button

```html
<!-- Botão flutuante para contato direto -->
<div class="whatsapp-float">
  <a
    href="https://wa.me/5516991626921?text=Olá! Tenho interesse nos produtos Zen Secrets"
    class="whatsapp-btn-float"
    aria-label="Falar no WhatsApp"
  >
    <svg><!-- WhatsApp icon --></svg>
    <span class="tooltip">Fale conosco!</span>
  </a>
</div>
```

### Complete Product Images Library

**Hero Section:**

- Hero Background: `/assets/img/Foto-tela-inicial-.webp`

**Category Collection Images:**

- Aromatizadores: `/assets/img/all-aromatizadores.webp`
- Home Spray: `/assets/img/all-homespray.webp`
- Velas Aromáticas: `/assets/img/all-candles.webp`
- Chá Branco Collection: `/assets/img/all-chabranco.webp`
- Flor de Figo Collection: `/assets/img/all-flordefigo.webp`

**Individual Product Images by Category:**

#### Aromatizadores:

- Aromatizador Chá Branco: `/assets/img/Aromatizador chá Branco .webp`
- Aromatizador Flor de Figo: `/assets/img/Aromatizador-F-Figo-.webp`
- Aromatizador Flor de Figo (alt): `/assets/img/aromatizador-flordefigo.webp`

#### Home Spray:

- Home Spray Marinho: `/assets/img/Home-spray-marinho-2.webp`
- Home Spray Chá Branco: `/assets/img/homespray-chabranco.webp`
- Home Spray Flor de Figo: `/assets/img/homespray-flordefigo.webp`

#### Velas Aromáticas:

- Vela Bamboo: `/assets/img/Vela bamboo .webp`
- Vela Flor de Figo: `/assets/img/Vela F Figo .webp`
- Vela Chá Branco: `/assets/img/Vela-chá-Branco-.webp`
- Vela Chá Branco (alt): `/assets/img/vela-chabranco.webp`
- Vela Flor de Figo (alt): `/assets/img/vela-flordefigo.webp`
- Vela Palo Santo: `/assets/img/Vela-palo-santo-2.webp`
- Vela Palo Santo (alt): `/assets/img/vela-palosanto.webp`

#### Kits Especiais:

- Kit Chá Branco: `/assets/img/Kit chá Branco .webp`
- Kit Flor de Figo: `/assets/img/Kit F Figo .webp`
- Kit Marinho: `/assets/img/Kit marinho .webp`

#### Lembrancinhas:

- Lembrancinha: `/assets/img/Lembrancinha.webp`
- Lembrancinhas Variadas: `/assets/img/lembrancinhas-11.webp`
- Lembrancinhas Collection: `/assets/img/lembrancinhas.webp`

#### Aromas Individuais:

- Marinho: `/assets/img/marinho.webp`

**Brand Assets:**

- Logo Zen: `/assets/img/logo-zen.svg`
- Logo PNG: `/assets/img/logo.png`
- Logo SVG: `/assets/img/logo.svg`

**Payment & Delivery:**

- Visa: `/assets/img/visa.png`
- Mastercard: `/assets/img/mastercard.png`
- American Express: `/assets/img/amex.png`
- Elo: `/assets/img/elo.png`
- PIX: `/assets/img/pix.png`
- Melhor Envio: `/assets/img/melhorenvio.png`

### Product Images Usage Guide

**For Homepage Category Showcase:**

```html
<!-- Use collection images for category cards -->
<img src="/assets/img/all-aromatizadores.webp" alt="Aromatizadores Premium" />
<img src="/assets/img/all-homespray.webp" alt="Home Spray Premium" />
<img src="/assets/img/all-candles.webp" alt="Velas Aromáticas Premium" />
```

**For Product Carousels:**

```html
<!-- Use individual product images for variety -->
<img
  src="/assets/img/Aromatizador chá Branco .webp"
  alt="Aromatizador Chá Branco"
/>
<img src="/assets/img/Home-spray-marinho-2.webp" alt="Home Spray Marinho" />
<img src="/assets/img/Vela bamboo .webp" alt="Vela Aromática Bamboo" />
```

**For Aroma Showcase (5 Available Aromas):**

1. **Chá Branco**: Available in Aromatizadores, Home Spray, Velas, and Kits
2. **Flor de Figo**: Available in Aromatizadores, Home Spray, Velas, and Kits
3. **Bamboo**: Available in Velas
4. **Marinho**: Available in Home Spray and Kits
5. **Palo Santo**: Available in Velas

---

## 📊 Métricas de Sucesso

### KPIs de Design

1. **Taxa de conversão**: +25% em 30 dias
2. **Tempo na página**: +40% na homepage
3. **Taxa de rejeição**: -20% geral
4. **Lighthouse Score**: 90+ em todas as páginas
5. **Cliques em CTAs**: +50% nos botões principais

### KPIs de UX

1. **Task completion rate**: 95%+ no checkout
2. **User satisfaction**: 4.5+ (escala 1-5)
3. **Mobile usability**: 100% sem erros
4. **Page load time**: <2s em mobile
5. **Contact conversions**: +30% via WhatsApp

### Ferramentas de Medição

- Google Analytics 4
- Google PageSpeed Insights
- Hotjar para heatmaps
- User testing sessions
- A/B testing para CTAs

---

## 🛠️ Cronograma de Implementação - Comprehensive

### Semana 1: Foundation & Core Pages

- **Dias 1-2**:
  - Setup do design system CSS completo
  - Global components library (buttons, forms, cards)
  - Responsive grid system (4-3-2)
- **Dias 3-4**:
  - Hero section redesign com Foto-tela-inicial-.webp
  - Trust indicators implementation
- **Dias 5-7**:
  - Homepage complete redesign
  - Category showcase visual

### Semana 2: WooCommerce Pages

- **Dias 1-2**:
  - Shop page (archive-product.php) styling
  - Product cards luxury redesign
  - **Contact page redesign COMPLETED** ✅
    - Hero section with product background (Foto-tela-inicial-.webp)
    - Two-column layout: contact info cards + modern form
    - Updated contact details: secretszen888@gmail.com, (16) 99162-6921
    - Elegant form styling with icons and luxury design
    - Dancing Script typography for hero title
  - **Aromas page redesign COMPLETED** ✅
    - Hero section with "Nossos Aromas" title and product background
    - Interactive fragrance pills navigation (Flor de Figo, Chá Branco, Bamboo, Marinho, Palo Santo)
    - Accordion sections with fragrance details and notes
    - Professional fragrance notes layout (Topo, Coração, Fundo)
    - JavaScript functionality for pills and accordion interaction
    - Responsive design with product images
  - Filters and pagination
- **Dias 3-4**:
  - Single product page premium layout
  - Related products grid 4-3-2
  - Trust badges integration
- **Dias 5-7**:
  - Cart page redesign
  - Checkout page luxury styling
  - Thank you page enhancement

### Semana 3: Account & Content Pages

- **Dias 1-2**:
  - My Account dashboard redesign
  - Contact page premium styling
  - About page enhancement
- **Dias 3-4**:
  - Search results page
  - 404 error page branding
  - Footer premium enhancement (payment icons)
- **Dias 5-7**:
  - Email templates styling
  - All pages typography consistency
  - Navigation components

### Semana 4: Polish & Launch

- **Dias 1-2**:
  - Cross-browser testing all pages
  - Responsive adjustments
  - Performance optimization
- **Dias 3-4**:
  - Accessibility audit (WCAG 2.1 AA)
  - WhatsApp integration
  - Final visual polish
- **Dias 5-7**:
  - QA testing all user flows
  - Launch preparation
  - Metrics setup

---

## 🎯 Próximos Passos Imediatos

### Ações Prioritárias (Esta Semana)

1. ✅ **Aprovar o design plan comprehensive**
2. 🔄 **Setup global design system** (buttons, forms, cards, typography)
3. 🔄 **Implementar product grid 4-3-2** em todas as páginas
4. 🔄 **Hero section redesign** com Foto-tela-inicial-.webp
5. 🔄 **Trust indicators** com WhatsApp prominente
6. 🔄 **Footer payment methods** com imagens reais
7. 🔄 **WooCommerce pages consistency** (shop, single, cart, checkout)

### Recursos Necessários

- **Imagens já fornecidas**: ✅ Disponíveis (all-candles.webp, payment icons, etc.)
- **Conteúdo**: ✅ Estrutura existente em todas as páginas
- **Desenvolvimento**: ✅ Framework WordPress/WooCommerce pronto
- **Design System**: 🔄 CSS components library completa
- **Testing Environment**: 🔄 Setup para testar todas as páginas

### Riscos e Mitigações

1. **Risco**: Impacto na performance
   **Mitigação**: Otimização de imagens e lazy loading

2. **Risco**: Problemas de compatibilidade
   **Mitigação**: Testes cross-browser extensivos

3. **Risco**: Alterações no conteúdo
   **Mitigação**: Sistema flexível e componentizado

---

## 💡 Considerações Finais

Este plano de design foca em transformar a Zen Secrets em uma **loja online premium** que reflita a qualidade e sofisticação dos produtos oferecidos. Como uma e-commerce especializada em aromaterapia, é fundamental criar uma experiência de compra que inspire confiança e transmita o valor premium dos produtos naturais.

As mudanças propostas são baseadas em:

1. **Best practices de UX/UI** para e-commerce e conversão
2. **Pesquisa de mercado** no segmento de luxo e bem-estar
3. **Princípios de psicologia** do consumidor online
4. **Otimização para conversão** baseada em dados de vendas

O resultado esperado é uma **loja online** que não apenas apresente produtos, mas crie uma experiência sensorial digital que conecte emocionalmente com os clientes, inspire confiança na compra online, e reflita o valor premium da marca Zen Secrets como especialista em produtos aromáticos naturais.

---

**Status do Projeto**: 🚀 Pronto para implementação
**Próxima Revisão**: 7 dias após início da implementação
**Responsável UX/UI**: IA Design Assistant
**Aprovação**: Pendente aprovação do cliente
