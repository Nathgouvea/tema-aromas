# Requirements - Tema Aromas WordPress

## Contexto

Gerar um tema WordPress chamado tema_aromas pronto para WooCommerce em pt_BR, moeda BRL e formatação brasileira. Loja de aromas com paleta preto, branco e roxo #6B4FC4, com design **luxuoso, amigável e moderno**. O tema NÃO deve reimplementar lógica de loja. Todas as funcionalidades de catálogo, carrinho, checkout, conta e pedidos serão providas pelo WooCommerce usando páginas e shortcodes oficiais. O foco é estilo visual sofisticado, acessibilidade e SEO.

## Navbar

Itens do menu principal em desktop e mobile:

1. **INÍCIO** - link para a homepage
2. **COMPRAR** - dropdown com as 6 categorias:
   - AROMATIZADORES
   - HOME SPRAY
   - VELAS AROMÁTICAS
   - KITS ESPECIAIS
   - LEMBRANCINHAS
   - ACESSÓRIOS
3. **SOBRE OS AROMAS** - link para a página sobre
4. **FALE CONOSCO** - link para a página de contato

Ícones à direita: Busca, Minha Conta e Carrinho com contador. Em desktop COMPRAR abre ao hover. Em mobile expande ao toque. Dropdown acessível com teclado e aria.

## Objetivos

1. Entregar um tema completo e leve com **design luxuoso, amigável e moderno**, estilizando WooCommerce via CSS e pequenos ajustes de markup apenas quando inevitável. Evitar PHP complexo.
2. Incluir páginas estáticas Home, Sobre Aromas, Categorias, Fale Conosco e páginas legais com visual sofisticado e elegante. Todas as páginas de loja usarão páginas e shortcodes do WooCommerce.
3. Garantir acessibilidade e SEO conforme diretrizes do WordPress e WCAG. Alto desempenho em mobile com experiência visual premium.

## Uso de WooCommerce sem lógica custom

• **NÃO** duplicar nem substituir fluxos de WooCommerce.
• Usar as páginas padrão configuradas no WooCommerce e shortcodes oficiais:

- **Loja** - página definida no WooCommerce Settings sem shortcode
- **Carrinho** - usar shortcode `[woocommerce_cart]`
- **Finalizar compra** - usar shortcode `[woocommerce_checkout]`
- **Minha conta** - usar shortcode `[woocommerce_my_account]`
- **Rastreamento de pedido** - usar shortcode `[woocommerce_order_tracking]`
- **Busca de produtos** - usar bloco de busca de produto ou shortcode `[woocommerce_product_search]` quando aplicável
- **Listas simples** - quando necessário, usar `[products]` e `[product_categories]` apenas em seções decorativas
  • Single de produto deve usar o template padrão do WooCommerce sem alterar lógica. Estilo aplicado via CSS e classes utilitárias.
  • **Mini cart** - usar bloco ou widget Mini Cart do WooCommerce. Se não disponível, usar o widget padrão. Comportamento de abrir e fechar pode ter JS mínimo apenas para acessibilidade e foco.

## Integrações

• Mercado Pago e Melhor Envio serão integrados por plugins. O tema apenas estiliza botões, avisos e componentes visuais destes plugins, sem alterar lógica.
• Exibir selos de confiança e mensagens abaixo do botão comprar usando hooks somente se necessário, sem lógica própria de pagamento.

## Requisitos técnicos

• **style.css** com headers e **theme.json** com paleta luxuosa, tipografia elegante e espaçamentos sofisticados. Variáveis CSS:

- `--cor-primaria: #6B4FC4` (roxo sofisticado)
- `--cor-texto: #000000` (preto elegante)
- `--cor-fundo: #FFFFFF` (branco premium)
- `--cor-borda: #E6E6E6` (cinza suave)
- `--cor-accent: #8B5FD6` (roxo claro para hover)
- `--cor-gold: #D4AF37` (dourado para elementos premium)
- `--sombra-luxo: 0 8px 32px rgba(107, 79, 196, 0.12)` (sombra sofisticada)
  • **functions.php** deve: registrar menus header e footer, suportar title-tag, post-thumbnails, HTML5, WooCommerce, carregar textdomain tema_aromas, enfileirar assets minificados, registrar sidebars de filtros e rodapé, habilitar padrões de bloco
  • Localização pt_BR, moeda BRL, separadores brasileiros. Máscara visual de CEP e telefone via JS leve apenas se necessário
  • **Assets**:
- `assets/css`: base.css, woocommerce.css, emails.css, utilities.css
- `assets/js`: main.js, accessibility.js, menu_dropdown.js, minicart.js - somente para interação do menu, foco acessível e mini cart. Evitar JS para lógica de loja

## Cabeçalho e rodapé

• **Cabeçalho luxuoso e sticky** com busca expansível elegante, tipografia sofisticada e micro-animações suaves. Busca pode usar bloco de busca de produto ou shortcode, sem lógica custom complexa
• **Rodapé premium** com menus úteis estilizados, selos de pagamento Mercado Pago com visual elegante, contact com design moderno, links legais e redes sociais com ícones sofisticados

## Páginas e shortcodes da loja

• **Loja** - usar a página Loja do WooCommerce definida nas configurações
• **Carrinho** - criar página Carrinho com `[woocommerce_cart]`
• **Finalizar compra** - criar página Finalizar compra com `[woocommerce_checkout]`
• **Minha conta** - criar página Minha conta com `[woocommerce_my_account]`
• **Rastreamento de pedido** - criar página Rastrear pedido com `[woocommerce_order_tracking]`
• **Thank You Page (Obrigado)** - usar template padrão `woocommerce/checkout/thankyou.php` apenas para estilização, sem lógica custom
• **Resultados de busca** - search.php estilizado priorizando produtos. Sem queries custom fora do loop padrão quando possível

### Páginas WooCommerce Essenciais (auto-criadas pelo plugin):

• **Single Product** - template padrão do WooCommerce estilizado via CSS
• **Category Archive** - páginas de categoria usando template padrão
• **Tag Archive** - páginas de tag de produtos
• **Lost Password** - página de recuperação de senha (parte do `[woocommerce_my_account]`)
• **Terms & Conditions** - vinculada ao checkout (criar como página legal)

## Páginas estáticas

• **front-page.php** com seções na ordem: hero, indicadores de confiança, bloco sobre aromas com CTA, três produtos destaque (velas, aromatizadores, home spray), bloco lembrancinhas com CTA, carrossel de produtos. Para grids, preferir blocos nativos ou shortcodes `[product_categories]` e `[products]` quando apropriado
• **page-categorias.php** com grade dos seis cartões linkando para as categorias do WooCommerce: Aromatizadores, Home Spray, Velas Aromáticas, Kits Especiais, Lembrancinhas, Acessórios
• **page-sobre-aromas.php** com blocos: O que são, Ingredientes, Como usar, Cuidados e Segurança, FAQ em acordeão e CTA final
• **page-fale-conosco.php** com formulário simples via wp_mail e nonce: nome, e-mail, telefone, assunto, mensagem e link para WhatsApp
• **Páginas legais**: Política de Privacidade, Termos e Condições, Trocas e Devoluções, Envio e Entrega, FAQ

## Acessibilidade e SEO

• H1 único por página, hierarquia correta, skip to main, foco visível, aria em dropdown do menu e mini cart, labels e estados de erro visíveis no checkout
• Títulos dinâmicos e meta description quando disponível, breadcrumbs padrão do WooCommerce, schema de produto do Woo habilitado, Open Graph básico

## Performance e Design Visual

• **Design luxuoso e moderno**: tipografia elegante (Google Fonts premium), espaçamentos generosos, micro-animações suaves, gradientes sofisticados, sombras delicadas
• **Experiência amigável**: navegação intuitiva, feedback visual claro, mensagens acolhedoras, processo de compra simplificado e convidativo
• **CSS crítico** para o hero premium, defer para scripts não essenciais, imagens com srcset e lazy load nativo, fontes elegantes com fallback do sistema. Evitar dependências pesadas

## Estrutura de pastas

```
/tema_aromas
  style.css
  functions.php
  screenshot.png
  theme.json
  README.md
  QA_CHECKLIST.md
  /assets
    /css - base.css, woocommerce.css, emails.css, utilities.css
    /js  - main.js, accessibility.js, menu_dropdown.js, minicart.js
    /img - logos, placeholders
  /templates
    header.php
    footer.php
    index.php
    page.php
    singular.php
    archive.php
    search.php
    404.php
    parts/
      hero.php
      trust.php
      grid_categorias.php
      bloco_aromas.php
      bloco_tres_produtos.php
      bloco_lembrancinhas.php
  /page-templates
    template_fullwidth.php
    template_landing.php
  /woocommerce
    single-product.php       - opcional, apenas para ajustes de layout via CSS
    archive-product.php      - opcional, apenas para ajustes de layout via CSS
    content-single-product.php - opcional, estrutura do single product
    content-product.php      - opcional, card de produto nos loops
    checkout/
      thankyou.php           - opcional, somente para ajustes visuais sem lógica
      form-checkout.php      - opcional, apenas estilos CSS
    cart/
      cart.php               - opcional, apenas estilos CSS
      mini-cart.php          - opcional, estilização do widget caso o bloco não esteja disponível
    myaccount/
      navigation.php         - opcional, estilização da navegação da conta
      dashboard.php          - opcional, estilização do dashboard
    emails/
      email-styles.php       - apenas estilos de email se necessário
```

**Obs**: evitar overrides desnecessários. Priorizar CSS e blocos ou shortcodes

## Dados e conteúdo

• Criar as seis categorias e associar imagens placeholder
• CTAs curtos: Ver Loja, Ver Categoria, Encomendar, Continuar comprando

## Qualidade e critérios de aceite

• Todas as páginas de loja funcionam usando shortcodes oficiais do WooCommerce e a página Loja padrão das configurações
• Sem código custom de lógica de carrinho, checkout, conta ou pedidos
• Navbar igual ao definido: INÍCIO, COMPRAR com as 6 categorias, SOBRE OS AROMAS, FALE CONOSCO, com Busca, Minha Conta, Carrinho à direita
• Acessibilidade: foco visível, navegação por teclado, aria nos componentes interativos
• **Design visual premium**: aparência luxuosa, moderna e amigável em todas as páginas, com elementos sofisticados e experiência de usuário elegante
• SEO básico correto e Lighthouse acima de 90 em performance e acessibilidade na Home e no single de produto
• Integrações visuais com Mercado Pago e Melhor Envio estilizadas com design premium apenas por CSS

## Lista de Shortcodes WooCommerce a Implementar

### Páginas Obrigatórias com Shortcodes:

• **Carrinho**: `[woocommerce_cart]`
• **Checkout**: `[woocommerce_checkout]`
• **Minha Conta**: `[woocommerce_my_account]`
• **Rastreamento**: `[woocommerce_order_tracking]`

### Shortcodes Opcionais para Páginas Estáticas:

• **Lista de Produtos**: `[products limit="8" columns="4"]`
• **Categorias**: `[product_categories number="6" columns="3"]`
• **Produtos em Destaque**: `[products featured="true" limit="3"]`
• **Produtos Recentes**: `[recent_products limit="4"]`
• **Busca de Produtos**: `[woocommerce_product_search]`

### Widgets e Blocos WooCommerce:

• **Mini Cart**: usar bloco nativo "Mini-Carrinho WooCommerce"
• **Filtros**: usar widgets nativos de filtro por preço, categoria, etc.
• **Busca**: usar bloco "Busca de Produtos"

## Entregáveis

• Pasta tema_aromas pronta para zip
• README com passos de instalação e criação automática das páginas com os shortcodes listados
• QA_CHECKLIST com testes de navegação do menu, acessibilidade do dropdown COMPRAR, verificação de shortcodes e fluxo de checkout completo
• Script PHP para criação automática das páginas WooCommerce com shortcodes corretos
