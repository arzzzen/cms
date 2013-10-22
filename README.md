ArzzzenCms - cms bundle for use with Symfony2
========================================================

Installation
--------------

Put this in "require" section in composer.json

composer.json

```

"arzzzen/cms-bundle": "dev-master",
"sonata-project/doctrine-orm-admin-bundle": "dev-master",
"friendsofsymfony/user-bundle": "~2.0@dev",
"sonata-project/media-bundle": "dev-master",
"sonata-project/easy-extends-bundle": "dev-master"

```

And run following command:

...

composer update arzzzen/cms-bundle

...

Requirements
--------------

* [SonataAdminBundle](https://github.com/sonata-project/SonataAdminBundle)
* [SonataDoctrineORMAdminBundle](https://github.com/sonata-project/SonataDoctrineORMAdminBundle) 
: Integrates the admin bundle into with the Doctrine ORM project
* [SonataDoctrineMongoDBAdminBundle](https://github.com/sonata-project/SonataDoctrineMongoDBAdminBundle) 
: Integrates the admin bundle into with MongoDB (early stage)
* [SonataDoctrinePhpcrAdminBundle](https://github.com/sonata-project/SonataDoctrinePhpcrAdminBundle) 
: Integrates the admin bundle into with PHPCR (early stage)
* ["friendsofsymfony/user-bundle": "~2.0@dev"](https://github.com/FriendsOfSymfony/FOSUserBundle/blob/master/Resources/doc/index.md)
* ["sonata-project/media-bundle"](http://sonata-project.org/bundles/media/master/doc/reference/installation.html)


AppKernel.php

```
new Arzzzen\CmsBundle\ArzzzenCmsBundle(),
new Sonata\BlockBundle\SonataBlockBundle(),
new Sonata\jQueryBundle\SonatajQueryBundle(),
new Knp\Bundle\MenuBundle\KnpMenuBundle(),
new Sonata\DoctrineORMAdminBundle\SonataDoctrineORMAdminBundle(),
new Sonata\AdminBundle\SonataAdminBundle(),
new FOS\UserBundle\FOSUserBundle(),
new Sonata\MediaBundle\SonataMediaBundle(),
new Sonata\EasyExtendsBundle\SonataEasyExtendsBundle(),

```

roting.yml

```

fos_user_security:
    resource: "@FOSUserBundle/Resources/config/routing/security.xml"

fos_user_profile:
    resource: "@FOSUserBundle/Resources/config/routing/profile.xml"
    prefix: /profile

fos_user_register:
    resource: "@FOSUserBundle/Resources/config/routing/registration.xml"
    prefix: /register

fos_user_resetting:
    resource: "@FOSUserBundle/Resources/config/routing/resetting.xml"
    prefix: /resetting

fos_user_change_password:
    resource: "@FOSUserBundle/Resources/config/routing/change_password.xml"
    prefix: /profile

gallery:
    resource: '@SonataMediaBundle/Resources/config/routing/gallery.xml'
    prefix: /media/gallery

media:
    resource: '@SonataMediaBundle/Resources/config/routing/media.xml'
    prefix: /media

admin:
    resource: '@SonataAdminBundle/Resources/config/routing/sonata_admin.xml'
    prefix: /admin

_sonata_admin:
    resource: .
    type: sonata_admin
    prefix: /admin

```

Settings
--------------

config.yml:

```

# Sonata admin
sonata_block:
    default_contexts: [cms]
    blocks:
        # Enable the SonataAdminBundle block
        sonata.admin.block.admin_list:
            contexts:   [admin]
        # Your other blocks

# Arzzzen cms
arzzzen_cms: 
    layout: "AcmeDemoBundle:layout:layout.html.twig"

sonata_admin:
    templates:
        layout:  ArzzzenCmsBundle:Default:sonata_admin_base_layout.html.twig

fos_user:
    db_driver: orm # other valid values are 'mongodb', 'couchdb' and 'propel'
    firewall_name: main
    user_class: Arzzzen\CmsBundle\Entity\User

# Sonata Media
sonata_media:
    # if you don't use default namespace configuration
    #class:
    #    media: MyVendor\MediaBundle\Entity\Media
    #    gallery: MyVendor\MediaBundle\Entity\Gallery
    #    gallery_has_media: MyVendor\MediaBundle\Entity\GalleryHasMedia
    default_context: default
    db_driver: doctrine_orm # or doctrine_mongodb, doctrine_phpcr
    contexts:
        default:  # the default context is mandatory
            providers:
                - sonata.media.provider.dailymotion
                - sonata.media.provider.youtube
                - sonata.media.provider.image
                - sonata.media.provider.file

            formats:
                small: { width: 100 , quality: 70}
                big:   { width: 500 , quality: 70}

        news:
            providers:
                - sonata.media.provider.image
                - sonata.media.provider.file

            formats:
                small: { width: 270, height: 135, quality: 95}
                big:   { quality: 90}

        publication:
            providers:
                - sonata.media.provider.file

            formats:
                small: { width: 270, height: 135, quality: 95}
                big:   { quality: 90}

    cdn:
        server:
            path: /uploads/media # http://media.sonata-project.org/

    providers:
        file:
            service:    sonata.media.provider.file
            resizer:    false
            filesystem: sonata.media.filesystem.local
            cdn:        sonata.media.cdn.server
            generator:  sonata.media.generator.default
            thumbnail:  sonata.media.thumbnail.format
            allowed_extensions: ['pdf', 'txt', 'rtf', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pttx', 'odt', 'odg', 'odp', 'ods', 'odc', 'odf', 'odb', 'csv', 'xml', 'rar', 'zip']
            allowed_mime_types: ['application/octet-stream', 'application/pdf', 'application/x-pdf', 'application/rtf', 'text/html', 'text/rtf', 'text/plain', 'application/msword', 'application/x-rar-compressed', 'application/zip']
        image:
            service:    sonata.media.provider.image
            resizer:    sonata.media.resizer.simple # sonata.media.resizer.square
            filesystem: sonata.media.filesystem.local
            cdn:        sonata.media.cdn.server
            generator:  sonata.media.generator.default
            thumbnail:  sonata.media.thumbnail.format
            allowed_extensions: ['jpg', 'png', 'jpeg']
            allowed_mime_types: ['image/pjpeg', 'image/jpeg', 'image/png', 'image/x-png']

    filesystem:
        local:
            directory:  %kernel.root_dir%/../web/uploads/media
            create:     false

```

License
-------

This bundle is available under the [MIT license].