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
