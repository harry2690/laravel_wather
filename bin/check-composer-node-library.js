let shell = require('shelljs');

if (!shell.which('git')) {
    shell.echo('Sorry, this script requires git');
    shell.exit(1);
}

shell.cd(__dirname + '/..');
let diff = shell.exec('git diff --name-only HEAD@{1} HEAD',{silent:true}).stdout;

console.log('Checking node modules update');
if (diff.indexOf('package-lock.json') !== -1) {
    console.log('Updating node modules');
    shell.exec('npm install');
} else {
    console.log('There is no update for node modules');
}

console.log('Checking composer update');
if (diff.indexOf('composer.lock') !== -1) {
    console.log('Updating composer');
    shell.exec('composer install');
} else {
    console.log('There is no update for composer');
}

console.log('Checking lang update');
if (diff.indexOf('resources/lang/en/common.php') !== -1 || diff.indexOf('resources/lang/cn/common.php') !== -1) {
    console.log('Create language json file');
    shell.cd(__dirname + '/../docker');
    shell.exec('docker-compose -f app.yml exec workspace php artisan make:lang');

    console.log('Create a symbolic link from "public/storage" to "storage/app/public"');
    shell.cd(__dirname + '/../docker');
    shell.exec('docker-compose -f app.yml exec workspace php artisan storage:link');
} else {
    console.log('There is no update for lang');
}
