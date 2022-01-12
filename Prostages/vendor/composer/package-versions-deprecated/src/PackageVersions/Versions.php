<?php

declare(strict_types=1);

namespace PackageVersions;

use Composer\InstalledVersions;
use OutOfBoundsException;

class_exists(InstalledVersions::class);

/**
 * This class is generated by composer/package-versions-deprecated, specifically by
 * @see \PackageVersions\Installer
 *
 * This file is overwritten at every run of `composer install` or `composer update`.
 *
 * @deprecated in favor of the Composer\InstalledVersions class provided by Composer 2. Require composer-runtime-api:^2 to ensure it is present.
 */
final class Versions
{
    /**
     * @deprecated please use {@see self::rootPackageName()} instead.
     *             This constant will be removed in version 2.0.0.
     */
    const ROOT_PACKAGE_NAME = '__root__';

    /**
     * Array of all available composer packages.
     * Dont read this array from your calling code, but use the \PackageVersions\Versions::getVersion() method instead.
     *
     * @var array<string, string>
     * @internal
     */
    const VERSIONS          = array (
  'composer/package-versions-deprecated' => '1.11.99.4@b174585d1fe49ceed21928a945138948cb394600',
  'doctrine/annotations' => '1.13.2@5b668aef16090008790395c02c893b1ba13f7e08',
  'doctrine/cache' => '2.1.1@331b4d5dbaeab3827976273e9356b3b453c300ce',
  'doctrine/collections' => '1.6.8@1958a744696c6bb3bb0d28db2611dc11610e78af',
  'doctrine/common' => '3.2.1@e927fc2410c8723d053b8032e591cdff76587cdb',
  'doctrine/dbal' => '3.2.1@4caf37acf14b513a91dd4f087f7eda424fa25542',
  'doctrine/deprecations' => 'v0.5.3@9504165960a1f83cc1480e2be1dd0a0478561314',
  'doctrine/doctrine-bundle' => '2.5.5@5c086cbbe5327937dd6f90da075f7d421b0f28bc',
  'doctrine/doctrine-migrations-bundle' => '3.2.1@c1b10bc1466e08bba82640e49c7bbcce0c9853c2',
  'doctrine/event-manager' => '1.1.1@41370af6a30faa9dc0368c4a6814d596e81aba7f',
  'doctrine/inflector' => '2.0.4@8b7ff3e4b7de6b2c84da85637b59fd2880ecaa89',
  'doctrine/instantiator' => '1.4.0@d56bf6102915de5702778fe20f2de3b2fe570b5b',
  'doctrine/lexer' => '1.2.2@9c50f840f257bbb941e6f4a0e94ccf5db5c3f76c',
  'doctrine/migrations' => '3.3.2@b6e43bb5815f4dbb88c79a0fef1c669dfba52d58',
  'doctrine/orm' => '2.11.0@bfed8cb6ed448f4ab1ea3fff06e4d6c44439e4ef',
  'doctrine/persistence' => '2.3.0@f8af155c1e7963f3d2b4415097d55757bbaa53d8',
  'doctrine/sql-formatter' => '1.1.2@20c39c2de286a9d3262cc8ed282a4ae60e265894',
  'egulias/email-validator' => '3.1.2@ee0db30118f661fb166bcffbf5d82032df484697',
  'friendsofphp/proxy-manager-lts' => 'v1.0.5@006aa5d32f887a4db4353b13b5b5095613e0611f',
  'laminas/laminas-code' => '4.5.1@6fd96d4d913571a2cd056a27b123fa28cb90ac4e',
  'monolog/monolog' => '1.26.1@c6b00f05152ae2c9b04a448f99c7590beb6042f5',
  'phpdocumentor/reflection-common' => '2.2.0@1d01c49d4ed62f25aa84a747ad35d5a16924662b',
  'phpdocumentor/reflection-docblock' => '5.3.0@622548b623e81ca6d78b721c5e029f4ce664f170',
  'phpdocumentor/type-resolver' => '1.6.0@93ebd0014cab80c4ea9f5e297ea48672f1b87706',
  'psr/cache' => '2.0.0@213f9dbc5b9bfbc4f8db86d2838dc968752ce13b',
  'psr/container' => '1.1.2@513e0666f7216c7459170d56df27dfcefe1689ea',
  'psr/link' => '1.1.1@846c25f58a1f02b93a00f2404e3626b6bf9b7807',
  'psr/log' => '1.1.4@d49695b909c3b7628b6289db5479a1c204601f11',
  'sensio/framework-extra-bundle' => 'v5.6.1@430d14c01836b77c28092883d195a43ce413ee32',
  'symfony/asset' => 'v4.4.27@1910a978dbe03503d9ee72408e2fef7c4041d97d',
  'symfony/cache' => 'v4.4.36@1caa6c63f0ebf3022b88263a2b90260cff33f6dc',
  'symfony/cache-contracts' => 'v2.5.0@ac2e168102a2e06a2624f0379bde94cd5854ced2',
  'symfony/config' => 'v4.4.36@03218ffbd5faeda5e6a97f9109acebf7973ff385',
  'symfony/console' => 'v4.4.36@621379b62bb19af213b569b60013200b11dd576f',
  'symfony/debug' => 'v4.4.36@346e1507eeb3f566dcc7a116fefaa407ee84691b',
  'symfony/dependency-injection' => 'v4.4.36@24e802b4973d3a60c01fd77bdaac8a66944202e1',
  'symfony/deprecation-contracts' => 'v2.5.0@6f981ee24cf69ee7ce9736146d1c57c2780598a8',
  'symfony/doctrine-bridge' => 'v4.4.36@5fa7d1d10879f0028aec98a24a9a649377fe0a5b',
  'symfony/dotenv' => 'v4.4.36@15a389dd8d1764565543ca063db2857940d3f00d',
  'symfony/error-handler' => 'v4.4.36@1fa841189eae3d59c7a29c3751fd9ed8ab65ca5c',
  'symfony/event-dispatcher' => 'v4.4.34@1a024b45369c9d55d76b6b8a241bd20c9ea1cbd8',
  'symfony/event-dispatcher-contracts' => 'v1.1.11@01e9a4efac0ee33a05dfdf93b346f62e7d0e998c',
  'symfony/expression-language' => 'v4.4.34@6331d834d364cce857e5a83368ce19141d5147bd',
  'symfony/filesystem' => 'v4.4.27@517fb795794faf29086a77d99eb8f35e457837a7',
  'symfony/finder' => 'v4.4.36@1fef05633cd61b629e963e5d8200fb6b67ecf42c',
  'symfony/flex' => 'v1.17.6@7a79135e1dc66b30042b4d968ecba0908f9374bc',
  'symfony/form' => 'v4.4.36@384c0be0f33d2b166b2188194aaf57b0f1c54f77',
  'symfony/framework-bundle' => 'v4.4.36@c2d12e37719fc066739e579c09dd1772e7db6d5a',
  'symfony/http-client' => 'v4.4.36@35e2cd1862b9ec2b46ebf050fbb13e285944b6a3',
  'symfony/http-client-contracts' => 'v2.5.0@ec82e57b5b714dbb69300d348bd840b345e24166',
  'symfony/http-foundation' => 'v4.4.36@0948e99457615ddb05380adde3584484ffd951d4',
  'symfony/http-kernel' => 'v4.4.36@dfb65dcad12ef433d45ad1c97f632cd52c7faa68',
  'symfony/inflector' => 'v4.4.34@cbbde60aa3aa2e7ea51830fd590b6151615c57bc',
  'symfony/intl' => 'v4.4.36@5a7fa2fab0f25b24c5cd0b8fd09f9dcb0dac8e40',
  'symfony/mailer' => 'v4.4.36@7c58943257767a0a031758e6507b5e2bff8ed3c9',
  'symfony/mime' => 'v4.4.36@fee42d10c8920b2308f466269cbf924ddc4fce94',
  'symfony/monolog-bridge' => 'v4.4.27@9882c03d4c237d77ba5b2845639700653dcd9a84',
  'symfony/monolog-bundle' => 'v3.7.1@fde12fc628162787a4e53877abadc30047fd868b',
  'symfony/options-resolver' => 'v4.4.30@fa0b12a3a47ed25749d47d6b4f61412fd5ca1554',
  'symfony/polyfill-intl-icu' => 'v1.24.0@c023a439b8551e320cc3c8433b198e408a623af1',
  'symfony/polyfill-intl-idn' => 'v1.24.0@749045c69efb97c70d25d7463abba812e91f3a44',
  'symfony/polyfill-intl-normalizer' => 'v1.24.0@8590a5f561694770bdcd3f9b5c69dde6945028e8',
  'symfony/polyfill-mbstring' => 'v1.24.0@0abb51d2f102e00a4eefcf46ba7fec406d245825',
  'symfony/polyfill-php72' => 'v1.24.0@9a142215a36a3888e30d0a9eeea9766764e96976',
  'symfony/polyfill-php73' => 'v1.24.0@cc5db0e22b3cb4111010e48785a97f670b350ca5',
  'symfony/polyfill-php80' => 'v1.24.0@57b712b08eddb97c762a8caa32c84e037892d2e9',
  'symfony/polyfill-php81' => 'v1.24.0@5de4ba2d41b15f9bd0e19b2ab9674135813ec98f',
  'symfony/process' => 'v4.4.36@a35d6b8f82e2272504f23a267de49b8717ca0028',
  'symfony/property-access' => 'v4.4.36@21c6c7a887e5b514c3decaa42d406a1f9ed92641',
  'symfony/property-info' => 'v4.4.31@b9955daf3605753c6054ef1dc3ddee993c7ccb5b',
  'symfony/proxy-manager-bridge' => 'v4.4.36@24abdc45251f76b55ed4d487714aeb91bf06228f',
  'symfony/routing' => 'v4.4.34@fc9dda0c8496f8ef0a89805c2eabfc43b8cef366',
  'symfony/security-bundle' => 'v4.4.36@ea53c7fc357a330e7d865ed1bf2d3583f462e3f5',
  'symfony/security-core' => 'v4.4.36@642c0dd4f56b0618ac3ead44f4576fd908456661',
  'symfony/security-csrf' => 'v4.4.27@e5bba6497d2f1178e23615d5ca01933a29b65a45',
  'symfony/security-guard' => 'v4.4.27@68d4be4fe90f4eccbbf379d478f2067550a25469',
  'symfony/security-http' => 'v4.4.36@7807f29d6bee69a40ca8f37b5d7e2b286d5af3b0',
  'symfony/serializer' => 'v4.4.36@46809cc4694007c09b3134d6da76e508d8b72e46',
  'symfony/service-contracts' => 'v2.5.0@1ab11b933cd6bc5464b08e81e2c5b07dec58b0fc',
  'symfony/stopwatch' => 'v4.4.27@c85d997af06a58ba83e2d2538e335b894c24523d',
  'symfony/translation' => 'v4.4.34@26d330720627b234803595ecfc0191eeabc65190',
  'symfony/translation-contracts' => 'v2.5.0@d28150f0f44ce854e942b671fc2620a98aae1b1e',
  'symfony/twig-bridge' => 'v4.4.36@9ca8db38f34058b4e94fb540a18dca1a9cd77111',
  'symfony/twig-bundle' => 'v4.4.36@3f6dd82ad6707dc647dd8d8e01c0931a4378c1ff',
  'symfony/validator' => 'v4.4.36@dba84cf8f0f26bdf76057235b3cdc881c476a282',
  'symfony/var-dumper' => 'v4.4.36@02685c62fcbc4262235cc72a54fbd45ab719ce3c',
  'symfony/var-exporter' => 'v4.4.34@75a297f25a87ce9343d39241679578886f3fd458',
  'symfony/web-link' => 'v4.4.27@a55c3a0a5da44965f39cf5f770a2e5a4a95c2c68',
  'symfony/yaml' => 'v4.4.36@a19f7c44ba665fa9d9d415cc4493361381b93f9b',
  'twig/extra-bundle' => 'v3.3.7@e0cc9c35a0650006b0da232a3f749cc060c65d3b',
  'twig/twig' => 'v3.3.7@8f168c6ffa3ce76d1786b3cd52275424a3fc675b',
  'webmozart/assert' => '1.10.0@6964c76c7804814a842473e0c8fd15bab0f18e25',
  'myclabs/deep-copy' => '1.10.2@776f831124e9c62e1a2c601ecc52e776d8bb7220',
  'nikic/php-parser' => 'v4.13.2@210577fe3cf7badcc5814d99455df46564f3c077',
  'phar-io/manifest' => '2.0.3@97803eca37d319dfa7826cc2437fc020857acb53',
  'phar-io/version' => '3.1.0@bae7c545bef187884426f042434e561ab1ddb182',
  'phpspec/prophecy' => 'v1.15.0@bbcd7380b0ebf3961ee21409db7b38bc31d69a13',
  'phpunit/php-code-coverage' => '9.2.10@d5850aaf931743067f4bfc1ae4cbd06468400687',
  'phpunit/php-file-iterator' => '3.0.6@cf1c2e7c203ac650e352f4cc675a7021e7d1b3cf',
  'phpunit/php-invoker' => '3.1.1@5a10147d0aaf65b58940a0b72f71c9ac0423cc67',
  'phpunit/php-text-template' => '2.0.4@5da5f67fc95621df9ff4c4e5a84d6a8a2acf7c28',
  'phpunit/php-timer' => '5.0.3@5a63ce20ed1b5bf577850e2c4e87f4aa902afbd2',
  'phpunit/phpunit' => '9.5.11@2406855036db1102126125537adb1406f7242fdd',
  'sebastian/cli-parser' => '1.0.1@442e7c7e687e42adc03470c7b668bc4b2402c0b2',
  'sebastian/code-unit' => '1.0.8@1fc9f64c0927627ef78ba436c9b17d967e68e120',
  'sebastian/code-unit-reverse-lookup' => '2.0.3@ac91f01ccec49fb77bdc6fd1e548bc70f7faa3e5',
  'sebastian/comparator' => '4.0.6@55f4261989e546dc112258c7a75935a81a7ce382',
  'sebastian/complexity' => '2.0.2@739b35e53379900cc9ac327b2147867b8b6efd88',
  'sebastian/diff' => '4.0.4@3461e3fccc7cfdfc2720be910d3bd73c69be590d',
  'sebastian/environment' => '5.1.3@388b6ced16caa751030f6a69e588299fa09200ac',
  'sebastian/exporter' => '4.0.4@65e8b7db476c5dd267e65eea9cab77584d3cfff9',
  'sebastian/global-state' => '5.0.3@23bd5951f7ff26f12d4e3242864df3e08dec4e49',
  'sebastian/lines-of-code' => '1.0.3@c1c2e997aa3146983ed888ad08b15470a2e22ecc',
  'sebastian/object-enumerator' => '4.0.4@5c9eeac41b290a3712d88851518825ad78f45c71',
  'sebastian/object-reflector' => '2.0.4@b4f479ebdbf63ac605d183ece17d8d7fe49c15c7',
  'sebastian/recursion-context' => '4.0.4@cd9d8cf3c5804de4341c283ed787f099f5506172',
  'sebastian/resource-operations' => '3.0.3@0f4443cb3a1d92ce809899753bc0d5d5a8dd19a8',
  'sebastian/type' => '2.3.4@b8cd8a1c753c90bc1a0f5372170e3e489136f914',
  'sebastian/version' => '3.0.2@c6c1022351a901512170118436c764e473f6de8c',
  'symfony/browser-kit' => 'v4.4.27@9629d1524d8ced5a4ec3e94abdbd638b4ec8319b',
  'symfony/css-selector' => 'v4.4.27@5194f18bd80d106f11efa8f7cd0fbdcc3af96ce6',
  'symfony/debug-bundle' => 'v4.4.36@94d96888b6b572cbdb10b4fde9dc0d15c259b88f',
  'symfony/dom-crawler' => 'v4.4.36@42de12bee3b5e594977209bcdf58ec4fef8dde39',
  'symfony/maker-bundle' => 'v1.36.4@716eee9c8b10b33e682df1b7d80b9061887e9691',
  'symfony/phpunit-bridge' => 'v6.0.0@5d6cc6720085084f504d2482fc4a2f268784006b',
  'symfony/web-profiler-bundle' => 'v4.4.31@24227617a4ddbdf78f8ab12ce2b76dfb54a7d851',
  'symfony/web-server-bundle' => 'v4.4.27@c283d46b40b1c9dee20771433a19fa7f4a9bb97a',
  'theseer/tokenizer' => '1.2.1@34a41e998c2183e22995f158c581e7b5e755ab9e',
  'paragonie/random_compat' => '2.*@',
  'symfony/polyfill-ctype' => '*@',
  'symfony/polyfill-iconv' => '*@',
  'symfony/polyfill-php71' => '*@',
  'symfony/polyfill-php70' => '*@',
  'symfony/polyfill-php56' => '*@',
  '__root__' => '1.0.0+no-version-set@',
);

    private function __construct()
    {
    }

    /**
     * @psalm-pure
     *
     * @psalm-suppress ImpureMethodCall we know that {@see InstalledVersions} interaction does not
     *                                  cause any side effects here.
     */
    public static function rootPackageName() : string
    {
        if (!self::composer2ApiUsable()) {
            return self::ROOT_PACKAGE_NAME;
        }

        return InstalledVersions::getRootPackage()['name'];
    }

    /**
     * @throws OutOfBoundsException If a version cannot be located.
     *
     * @psalm-param key-of<self::VERSIONS> $packageName
     * @psalm-pure
     *
     * @psalm-suppress ImpureMethodCall we know that {@see InstalledVersions} interaction does not
     *                                  cause any side effects here.
     */
    public static function getVersion(string $packageName): string
    {
        if (self::composer2ApiUsable()) {
            return InstalledVersions::getPrettyVersion($packageName)
                . '@' . InstalledVersions::getReference($packageName);
        }

        if (isset(self::VERSIONS[$packageName])) {
            return self::VERSIONS[$packageName];
        }

        throw new OutOfBoundsException(
            'Required package "' . $packageName . '" is not installed: check your ./vendor/composer/installed.json and/or ./composer.lock files'
        );
    }

    private static function composer2ApiUsable(): bool
    {
        if (!class_exists(InstalledVersions::class, false)) {
            return false;
        }

        if (method_exists(InstalledVersions::class, 'getAllRawData')) {
            $rawData = InstalledVersions::getAllRawData();
            if (count($rawData) === 1 && count($rawData[0]) === 0) {
                return false;
            }
        } else {
            $rawData = InstalledVersions::getRawData();
            if ($rawData === null || $rawData === []) {
                return false;
            }
        }

        return true;
    }
}
