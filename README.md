A simple example of elastic search.
----------------------------------

This example has some dependencies from:

> "symfony/assetic-bundle": "^2.8",<br>
> "friendsofsymfony/elastica-bundle": "dev-master#6206199"

we have to use ElasticaBundle "dev-master#6206199" for a bug in the last version.
 
then enable these bundles in the AppKernel: 

> new Symfony\Bundle\AsseticBundle\AsseticBundle()<br>
> new FOS\ElasticaBundle\FOSElasticaBundle()

Add the distro in composer require:
----------------------------------

> "tonish/Blog" : "dev-master"

and then set the repository where your git repo is pointing:
```
 "repositories" :  
    [{
        "type" : "git",
        "url" : "https://github.com/ToniTonish/BlogBundle.git"
    }],
    "minimum-stability" : "alpha"
```

Enable bundle in AppKernel
--------------------------

> new Tonish\BlogBundle\TonishBlogBundle(),

and add the routing in the main routing.yml file
```
tonish_blog:
    resource: "@TonishBlogBundle/Resources/config/routing.yml"
    prefix:   /
```


Basic Configuration:
-------------------

for assetic:

```
assetic:
    debug:          '%kernel.debug%'
    use_controller: '%kernel.debug%'
    filters:
        cssrewrite: ~
```

for elastica:
```
fos_elastica:
    clients:
        default: { host: localhost, port: 9200 }
    indexes:
        app:
            types:
                blog:
                    mappings:
                        title: ~
                        content: ~
                    persistence:
                        driver: orm
                        model: Tonish\BlogBundle\Entity\Blog
                        provider: ~
                        listener: ~
                        finder: ~
```

Run the following command:

> php bin/console doctrine:schema:update --force<br>
> php bin/console assets:install --symlink<br>
> php bin/console assetic:dump

if the DB is modified externally, run:

> php app/console fos:elastica:populate

ROUTING
-------

route to create blog's article is: 

> http://localhost:8000/blog/

route to search page is:

> http://localhost:8000/home/
