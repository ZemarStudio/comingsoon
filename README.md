comingsoon
==========

Welcome to ZAZ project!

Changes Needed!

1 - Open the .htaccess file and changed this line to your specific project directory:

RewriteRule ^(.*)$ bloggers/zazblog/index.php/$1 [L]

to this for example:

RewriteRule ^(.*)$ myexampledirectory/zazblog/index.php/$1 [L]

2 - Open the zazblog/application/config/config.php and changed the BASE URL to your specific directory structure.

Thanks.
ZAZ Team
