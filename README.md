# Zadanie rekrutacujne - Wersja EXTRA

Podgląd strony uruchomionej na serwerze: [Zobacz Podgląd](http://048659e3b7b8e73bcc6244c1f2962555.ipsumstudio.site/)

## Najważniejsze działania podjęte w celu zoptymalizowania prędkości ładowania strony:

### 1. Usunięcie blokujących renderowanie zapytań do plików css

Domyślnie w szablonie startowym zapytania do plików css były umiejscowione w headerze w sposób blokujący renderowanie:

```
function adrianbosacki_scripts() {
	wp_enqueue_style( 'adrianbosacki-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'adrianbosacki_scripts' );
```
W celu optymalizacji prędkości ładowania arkusz stylów wstawiany jest bezpośrednio w tagach <style></style> po wcześniejszym zminifikowaniu.

```
function criticalCSS_wp_head() {	
	echo '<style>';
	echo file_get_contents( get_template_directory_uri() . '/sass/style.min.css' );	
	echo '</style>';  
}
add_action( 'wp_head', 'criticalCSS_wp_head' );
```
### 3. Optymalizacja obrazków na stronie

Do najważniejszych zdjęć na stronie zostały dodane customowe rozmiary. 
Dzięki temu ładowane obrazy mają identyczne wymiary jak ich rzeczywisty rozmiar na stronie.

Dodatkowo zastosowana została intensywna kompresja.

```
add_image_size( 'header_top', 1040, 546, true ); 
add_image_size( 'main_list', 434, 297, true ); 		
add_image_size( 'see_also', 284, 174, true ); 
```
### 4. Odroczenie (defer) ładowania plików javascript

Dodanie atrybutu "defer" do niekrytycznych plików javasctipt.

Innym sposobem ładowania plików javascript w sposób nieblokujący renderowania jest dodanie atrybutu async.
Jednak nie zapewnia on kolejności ładowania, która w tym przypadku jest istotna.

```
<script src="/scripts/jquery-3.4.1.min.js" defer></script>
<script src="/scripts/ajax_call_lazy_load.js" defer></script>
```

### 5. Odroczenie ładowania niekrytycznych plików CSS:

```
<link rel="preload" href="https://fonts.googleapis.com/css?family=Playfair+Display|Ubuntu&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Ubuntu&display=swap"></noscript>

<link rel="preload" href="/wp-includes/css/dist/block-library/style.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="/wp-includes/css/dist/block-library/style.min.css"></noscript>
    
```
### 6. Dodanie opcji kompresji GZIP

W celu aktywacji kompresji GZIP do pliku .htaccess dodany został następujący kod:

```
<IfModule mod_deflate.c>
  # Compress HTML, CSS, JavaScript, Text, XML and fonts
  AddOutputFilterByType DEFLATE application/javascript
  AddOutputFilterByType DEFLATE application/rss+xml
  AddOutputFilterByType DEFLATE application/vnd.ms-fontobject
  AddOutputFilterByType DEFLATE application/x-font
  AddOutputFilterByType DEFLATE application/x-font-opentype
  AddOutputFilterByType DEFLATE application/x-font-otf
  AddOutputFilterByType DEFLATE application/x-font-truetype
  AddOutputFilterByType DEFLATE application/x-font-ttf
  AddOutputFilterByType DEFLATE application/x-javascript
  AddOutputFilterByType DEFLATE application/xhtml+xml
  AddOutputFilterByType DEFLATE application/xml
  AddOutputFilterByType DEFLATE font/opentype
  AddOutputFilterByType DEFLATE font/otf
  AddOutputFilterByType DEFLATE font/ttf
  AddOutputFilterByType DEFLATE image/svg+xml
  AddOutputFilterByType DEFLATE image/x-icon
  AddOutputFilterByType DEFLATE text/css
  AddOutputFilterByType DEFLATE text/html
  AddOutputFilterByType DEFLATE text/javascript
  AddOutputFilterByType DEFLATE text/plain
  AddOutputFilterByType DEFLATE text/xml

  # Remove browser bugs (only needed for really old browsers)
  BrowserMatch ^Mozilla/4 gzip-only-text/html
  BrowserMatch ^Mozilla/4\.0[678] no-gzip
  BrowserMatch \bMSIE !no-gzip !gzip-only-text/html
  Header append Vary User-Agent
</IfModule>
    
```

### 7. Dodanie opcji cache dla plików statycznych

```
<IfModule mod_expires.c>
  ExpiresActive On

  # Images
  ExpiresByType image/jpeg "access plus 1 year"
  ExpiresByType image/gif "access plus 1 year"
  ExpiresByType image/png "access plus 1 year"
  ExpiresByType image/webp "access plus 1 year"
  ExpiresByType image/svg+xml "access plus 1 year"
  ExpiresByType image/x-icon "access plus 1 year"

  # Video
  ExpiresByType video/mp4 "access plus 1 year"
  ExpiresByType video/mpeg "access plus 1 year"

  # CSS, JavaScript
  ExpiresByType text/css "access plus 1 month"
  ExpiresByType text/javascript "access plus 1 month"
  ExpiresByType application/javascript "access plus 1 month"

  # Others
  ExpiresByType application/pdf "access plus 1 month"
  ExpiresByType application/x-shockwave-flash "access plus 1 month"
</IfModule>
    
```

### 8. Leniwe ładowanie obrazków (Lazy loading)

Zastosowanie leniwego ładowania zmniejsza liczbę zapytań wysyłanych przy pierwszym renderowaniu strony.

```
 <img
 class="posts_list_image js-lazy-image"
 data-src="<?php the_post_thumbnail_url('main_list'); ?>"
 src="/images/resources/placeholder.jpg" 
 alt="<?php the_title(); ?> image" >
 ```
 
 ### 9. Usunięcie modułu wordpress emojis.
 
 W nowszych wersjach wordpressa domyślnie ładowany jest modół emojis.
 Nie jest on konieczny do funkcjonowania strony i spowalnia jej ładowanie.
 
 Kod usuwający ten moduł znajduje się na dole pliku functions.php
 
  ### 10. Zmiana sposobu ładowania arkusza stylów "wp-block-library".
 
 Domyślnie styl ten ładowany jest w nieefektywny sposób.
 Opcja domyślnego ładowania została wyłączona i zastosowany został sposób ładowania opisany w punkcie 5
 
``` 
function remove_block_css(){
	wp_dequeue_style( 'wp-block-library' );
	}
add_action( 'wp_enqueue_scripts', 'remove_block_css', 100 );
```

 ### 11. Zastąpienie małych obrazków plikami data URI
 Rozwiązanie takie zmniejsza liczbę zapytań przy renderowaniu strony.
 ```
 <img   
 src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAQAAAC1+jfqAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAmJLR0QA/4ePzL8AAAAJcEhZcwAADsQAAA7EAZUrDhsAAAAHdElNRQfjCBwXOyEfCSr5AAABF0lEQVQoz3XRIWtbcRQF8N/9k5lXWrERt+dKzfTE5CC2TE/UtB+g3yAhBOYqagejImLfIQQmJitH3FxLKtoOlvAiMsideKRQSM8xF87hcC4nzkZ5bt9uLOMyTv862CX5o9K1LDtlvvjgs3v7nZ3yxm93WPHc8M8t3nrlGIdeE6f5JN/EwBS9HKqloE1o/PDemxhsrgo2V0V+9ejaR3sFD9E3NzctWpqam0ffAwW5jXuGkLI1RC7M1HobLfXUZrkQbYewjnF+ylFhSunlSBPjXG8NlGqyGuYgv7lBrYlhNWnq7Rcpm9y7WP3KE+/wM8bVpMm2QweVI5ow048DcpHrppaOVHQsdX23EshMRHu3Y3XiMs91X577P03KbNTvBS1jAAAAJXRFWHRkYXRlOmNyZWF0ZQAyMDE5LTA4LTI4VDIzOjU5OjMzKzAwOjAwFB09lwAAACV0RVh0ZGF0ZTptb2RpZnkAMjAxOS0wOC0yOFQyMzo1OTozMyswMDowMGVAhSsAAAAASUVORK5CYII="
 />
 ```
