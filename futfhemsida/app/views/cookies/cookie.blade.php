<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FUTF:s cookies</title>
</head>
<body>
</body>
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js"></script>
<script>
    window.addEventListener("load", function(){
        window.cookieconsent.initialise({
            "palette": {
                "popup": {
                    "background": "#000"
                },
                "button": {
                    "background": "#f1b424"
                }
            },
            "theme": "edgeless",
            "content": {
                "message": "FUTF:s hemsida använder sig av cookies för att förbättra din upplevelse.",
                "dismiss": "Jag förstår",
                "link": "Läs mer",
                "href": "cookiepolicy"
            }
        })});
</script>
</html>