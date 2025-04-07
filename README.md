# Desafio Loomi - Portal de Notícias WordPress

## Sobre o Projeto
Desenvolvimento de um portal de notícias com WordPress para o processo seletivo da Loomi, incluindo:
- Tema filho customizado
- Interface de publicação simplificada
- Alta performance (SEO, cache)

## Instalação
1. **Requisitos**:  
   - PHP 8.0+  
   - MySQL 5.7+  
   - WordPress 6.0+  

2. **Passos**:  
   - Baixe o WordPress manualmente [aqui](https://wordpress.org/download/)  
   - Copie a pasta `wp-content/themes/desafio-loomi/` deste repositório para o seu instalador WordPress  
   - Ative o tema no painel admin (`Aparência > Temas`)  

3. **Configuração**:  
   - Permalinks: `Configurações > Links Permanentes` (use "Nome do Post")  
   - Certifique-se de que o módulo `mod_rewrite` está ativo no Apache  

## Estrutura do Tema
/desafio-loomi/
├── assets/ # CSS/JS otimizados
├── templates/ # Arquivos de template customizados
├── functions.php # Funções customizadas
└── style.css # Estilos principais


## Plugins Recomendados (instale manualmente)
- Advanced Custom Fields
- Custom Post Type UI
- LiteSpeed Cache
- Wordfence Security
- Yoast SEO 

## Licença
Projeto desenvolvido para fins avaliativos.  