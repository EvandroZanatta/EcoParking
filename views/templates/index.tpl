<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>{$page_name} - {$site_name}</title>
    <link rel="stylesheet" href="https://bootswatch.com/united/bootstrap.min.css" type="text/css" />
</head>
<body>
    
    <div class="block-top">
        {include 'header.tpl'}
    </div>
    
    <section class="middle">
        <div class="container">
            {include file="$page.tpl"}
        </div>
    </section>
    
    <div class="block-bottom">
        {include 'bottom.tpl'}
    </div>
</body>
</html>