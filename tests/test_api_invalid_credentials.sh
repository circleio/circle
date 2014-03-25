export QUERY_STRING="username=admin&password=adm" ; \
    php -e -r 'parse_str($_SERVER["QUERY_STRING"], $_GET); include "../api/validate_login.php";'
