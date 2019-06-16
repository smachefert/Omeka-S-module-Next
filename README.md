Next (module for Omeka S)
=========================

[Next] is a module for [Omeka S] that brings together various features too small
to be a full module. They may be integrated in the next release of Omeka S, or
not.

Features
--------

### Public

#### Simple page

Allow to use a page as a block, so the same page can be use in multiple sites,
for example the page "About" or "Privacy". Of course, the page is a standard
page and can be more complex with multiple blocks. May be fun.
This is an equivalent for the [shortcode as a page] in Omeka classic too.

#### Direct links in user bar

Display direct links to the current resource in the public user bar in order to
simplify edition and management of resources (fix [#1283], included in Omeka S 1.4).
The revert links are available too. They display the resource in the default
site, or in the first one (fix [#1259]).

#### Random order of resources

Display resources in a random order, for example for a carousel or a featured
resource. Simply add `sort_by=random` to the query when needed, in particular
in the page block `Browse preview` (fix [#1281]).

#### Advanced search by start with, end with, or in list

Allow to do more advanced search in public or admin board on values of the
properties: start with, end with, in list (fix [#1274], [#1276]).

#### Citation

Since 3.1.2.7, this feature has moved to module [Citation], that uses a partial
view to easily customize it. The view helper doesn’t change.

#### Is home page

Allow to check if the current page is the home page of the site, like in Omeka Classic.

#### Previous/Next resources

Allow to get the previous or the next resources, that simplifies browsing like
in Omeka Classic. Set by default in admin board for items.

#### Last browse page

Add a button in admin resources pages to go back to the last list of results. It
allows to browse inside item sets, items or media after a search without losing
the search results. A helper allows to get the same feature in public front-end.

#### Current site

Allow to get the current site in public view, that may be missing in some cases.

#### Block "search form"

Allow to add a search form in any page, typically in the home page.

### Admin

#### Trim property values

Remove leading and trailing whitespaces preventively on any resource creation or
update, or curatively via the batch edit, so values will be easier to find and
to compare exactly (fix [#1258]).

#### Deduplicate property values

Remove exact duplicated values on any new or updated resource preventively.
Note: preventive deduplication is case sensitive, but curative deduplication is
case insensitive (it uses a direct query and the Omeka database is case
insensitive by default).

#### New links

- From the site permissions to the user page (fix [#1301]).
- From the list of jobs to each log (fix [#1156]).

### Backend

#### Cron tasks

A script allows to run jobs from the command line, even if they are not
initialized. It’s useful to run cron tasks. See required and optional arguments:

```
php /path/to/omeka/modules/Next/data/scripts/task.php --help
```

In your cron tab, you can add a task like that:

```
/bin/su - www-data -C "php /var/www/omeka/modules/Next/data/scripts/task.php --task MyTask --user-id 1
```

Note: since there is no job id, the job should not require it (for example,
method `shouldStop()` should not be called. The use of the abstract class `AbstractTask`,
that extends `AbstractJob`, is recommended, as it takes care of this point.

#### Loop items task

A task (job) allows to update all items, so all the modules that uses api events
are triggered. This job can be use as a one-time task that help to process
existing items when a new feature is added in a module.

```
php /path/to/omeka/modules/Next/data/scripts/task.php --task LoopItems --user-id 1
```

#### Logger in view

Allow to use `$this->logger()` in the views (fix [#1371], included in Omeka S 1.4).

#### AbstractGenericModule

A class to simplify management of generic methods of the module (install and
settings). This part is now managed in module [Generic] more simply.


Installation
------------

Uncompress files and rename module folder `Next`. Then install it like any
other Omeka module and follow the config instructions.

See general end user documentation for [Installing a module].


Warning
-------

Use it at your own risk.

It’s always recommended to backup your files and your databases and to check
your archives regularly so you can roll back if needed.


Troubleshooting
---------------

See online issues on the [module issues] page on GitHub.


License
-------

This module is published under the [CeCILL v2.1] licence, compatible with
[GNU/GPL] and approved by [FSF] and [OSI].

In consideration of access to the source code and the rights to copy, modify and
redistribute granted by the license, users are provided only with a limited
warranty and the software’s author, the holder of the economic rights, and the
successive licensors only have limited liability.

In this respect, the risks associated with loading, using, modifying and/or
developing or reproducing the software by the user are brought to the user’s
attention, given its Free Software status, which may make it complicated to use,
with the result that its use is reserved for developers and experienced
professionals having in-depth computer knowledge. Users are therefore encouraged
to load and test the suitability of the software as regards their requirements
in conditions enabling the security of their systems and/or data to be ensured
and, more generally, to use and operate it in the same conditions of security.
This Agreement may be freely reproduced and published, provided it is not
altered, and that no provisions are either added or removed herefrom.


Copyright
---------

* Copyright Daniel Berthereau, 2018 (see [Daniel-KM] on GitHub)


[Omeka S]: https://omeka.org/s
[Next]: https://github.com/Daniel-KM/Omeka-S-module-Next
[shortcode as a page]: https://github.com/omeka/plugin-SimplePages/pull/24
[#1156]: https://github.com/omeka/omeka-s/issues/1156
[#1258]: https://github.com/omeka/omeka-s/issues/1258
[#1259]: https://github.com/omeka/omeka-s/issues/1259
[#1274]: https://github.com/omeka/omeka-s/issues/1274
[#1276]: https://github.com/omeka/omeka-s/issues/1276
[#1281]: https://github.com/omeka/omeka-s/issues/1281
[#1283]: https://github.com/omeka/omeka-s/issues/1283
[#1301]: https://github.com/omeka/omeka-s/issues/1301
[#1371]: https://github.com/omeka/omeka-s/issues/1371
[Citation]: https://github.com/Daniel-KM/Omeka-S-module-Citation
[Generic]: https://github.com/Daniel-KM/Omeka-S-module-Generic
[Installing a module]: http://dev.omeka.org/docs/s/user-manual/modules/#installing-modules
[module issues]: https://github.com/Daniel-KM/Omeka-S-module-Next/issues
[CeCILL v2.1]: https://www.cecill.info/licences/Licence_CeCILL_V2.1-en.html
[GNU/GPL]: https://www.gnu.org/licenses/gpl-3.0.html
[FSF]: https://www.fsf.org
[OSI]: http://opensource.org
[MIT]: http://http://opensource.org/licenses/MIT
[Daniel-KM]: https://github.com/Daniel-KM "Daniel Berthereau"
