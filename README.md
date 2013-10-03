ArzzzenCms - cms bundle for use with Symfony2
========================================================

Installation
--------------

composer update arzzen/cms

Requirements
--------------

* [SonataAdminBundle](https://github.com/sonata-project/SonataAdminBundle)
* [SonataDoctrineORMAdminBundle](https://github.com/sonata-project/SonataDoctrineORMAdminBundle) 
: Integrates the admin bundle into with the Doctrine ORM project
* [SonataDoctrineMongoDBAdminBundle](https://github.com/sonata-project/SonataDoctrineMongoDBAdminBundle) 
: Integrates the admin bundle into with MongoDB (early stage)
* [SonataDoctrinePhpcrAdminBundle](https://github.com/sonata-project/SonataDoctrinePhpcrAdminBundle) 
: Integrates the admin bundle into with PHPCR (early stage)

AppKernel.php

new Arzzzen\CmsBundle\ArzzzenCmsBundle(),
new Sonata\BlockBundle\SonataBlockBundle(),
new Sonata\jQueryBundle\SonatajQueryBundle(),
new Knp\Bundle\MenuBundle\KnpMenuBundle(),
new Sonata\DoctrineORMAdminBundle\SonataDoctrineORMAdminBundle(),
new Sonata\AdminBundle\SonataAdminBundle(),

roting.yml

admin:
    resource: '@SonataAdminBundle/Resources/config/routing/sonata_admin.xml'
    prefix: /admin

_sonata_admin:
    resource: .
    type: sonata_admin
    prefix: /admin

arzzzen_cms:
    resource: "@ArzzzenCmsBundle/Resources/config/routing.yml"
    prefix:   /


Settings
--------------

config.yml:

arzzzen_cms: 
    layout: "AcmeDemoBundle:layout:layout.html.twig"

sonata_admin:
    templates:
        layout:  ArzzzenCmsBundle:Default:sonata_admin_base_layout.html.twig


License
-------

This bundle is available under the [MIT license].