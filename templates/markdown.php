<?php

    require_once 'views.php';
    require_once 'db.php';    
    require_once 'log.php';

    require_once 'Parsedown.php';
    

    // Markdown Text
    $markdown = '
# Markdown Cheatsheet

## Formatting Styles
    
Normal 

*Italic*

**Bold**

***This***


## Lists and Paragraphs

### Bullet Lists

* List item 1
* List item 2

### Numbered Lists

1. Milk
2. Cookies


### Paragraphs

Paragraph 1

Paragraph 2


## Preformatted

```
def function():
    try_this()
```

    ';


    // Convert the Markdown into HTML
    $Parsedown = new Parsedown();
    $content = $Parsedown->text($markdown);
    

    // Create main part of page content
    $settings = array(
        "site_title" => "BACS 350 Projects",
        "page_title" => "Markdown Parser", 
        "logo"       => "Bear.png",
        "style"      => 'style.css',
        'user'       => '',
        "content"    => $content);

    echo render_page($settings);

?>
