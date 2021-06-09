Options -Multiviews

RewriteEngine On 
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f

# Rewrite for index.php to load views only page
RewriteRule ^([0-9a-zA-Z]+)$ index.php?page=$1 [L]
RewriteRule ^([0-9a-zA-Z]+)/$ index.php?page=$1 [L]

# Rewrite for index.php to load views only page+subPage
RewriteRule ^([0-9a-zA-Z]+)/([0-9a-zA-Z_-]+)$ index.php?page=$1&subPage=$2 [L]
RewriteRule ^([0-9a-zA-Z]+)/([0-9a-zA-Z_-]+)/$ index.php?page=$1&subPage=$2 [L]


# rewrite for index.php to load views only page+subPage+name
RewriteRule ^([0-9a-zA-Z]+)/([0-9a-zA-Z_-]+)/([0-9a-zA-Z_-]+)$ index.php?page=$1&subPage=$2&name=$3 [L]
RewriteRule ^([0-9a-zA-Z]+)/([0-9a-zA-Z_-]+)/([0-9a-zA-Z_-]+)/$ index.php?page=$1&subPage=$2&name=$3 [L]



RewriteRule /$1 index.php?page=$1
RewriteRule /$1/$2 index.php?page=$1


RewriteRule ^(.*)$ index.php?url=$1 [L]