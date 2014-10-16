# Concrete5 Bootstrap Autonav

This Concrete5 package adds a `bootstrap` template to the autonav block making it more compatible with bootstrap.

## Installation

+ Just drop put the c5-bootstrap-autonav folder into your packages directory.
+ Go to the Concrete5 Dashboard, then to Extend Concrete5 (normally `/dashboard/extend/install/`).
+ Install the `C5 Bootstrap Autonav` package.

## Use

This template still only outputs the simple unordered list of navigation items, but with bootstrap classes. Therefore you will still need to wrap it in bootstraps normal navigation wrappers. For example:

```HTML+PHP
    <nav class="navbar navbar-default" role="navigation">
        <div class="navbar-border"></div>
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button"
                        class="navbar-toggle collapsed"
                        data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/"></a>
            </div>

            <!-- This is an example of doing it programmatically.
                 One could still add a content editable area here. -->
            <?php
            $nav = BlockType::getByHandle('autonav');
            $nav->controller->orderBy = 'display_asc';
            $nav->controller->displayPages = 'top';
            $nav->controller->displaySubPages = 'all';
            $nav->controller->displaySubPageLevels = 'custom';
            $nav->controller->displaySubPageLevelsNum = 1;
            $nav->render('templates/bootstrap');
            ?>
        </div><!-- /.container-fluid -->
        <div class="navbar-border"></div>
    </nav>
```

## TODO

+ Make navbar classes more editable, right now it is just navbar-right unless edited in code.
