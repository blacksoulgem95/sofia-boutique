module.exports = {
    'resources/**/*.{css,js}': ['prettier --write'],
    '**/*.php': ['php ./vendor/bin/php-cs-fixer fix --config .php_cs --allow-risky=yes'],
};
