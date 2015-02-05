Sixteen Hundred
======================
Sixteen Hundred is a SASS framework inspired by bootstrap and foundation
to be used across sites independent of theme.

The purpose of this framework is to provide
- module reuse
- scalable front-end architecture.
- easy to maintain front-end.
- encourages reuse of front-end elements.
- try to not violate the dry principle (do not repeat yourself)
- provide consistent look and feel across sites (Drupal 6-8,
  or any other tool that uses CSS)
- support style-guide driven development.
- provide a common language between designers and front-end developers

In large enterprise sites front-end SASS and CSS is often thought of as an
afterthought.  It is coded as needed and grows organically. 1600 was designed to
leverage SASS to elevate front-end development from an afterthought to a
programming environment held to the same standards as any other.



Collaboration Framework
-------------
One of the drivers for creating 1600 was a perceived breakdown in communication
between developers and designers*. Often designers deliver comps without
any CSS specification.  In those cases developers guesstimate things like
fonts and colors.  This creates extra work for the developer, extra
redundant css, and probably isn't what the designer intended.

A slightly better situation is that the designer delivers the comp with some
basic CSS values.  Developers are slow.  We don't always connect the dots.  If
the comp had a style which already existed the developer would probably
duplicate it.  The designer needs to help call out patterns of reuse to the
developer in a way the developer understands.   This is where the breakdown of
communication happens.

The solution in this framework is to create reusable, semantic blocks of CSS
which are backed by interactive style guides. Semantic means a normal human
being can read and understand  A designer coming up with a new comp can browse
the style guide and label the comp in-terms of the existing styles. This
translates directly into framework elements that a developer
understands.

The framework creates a common language for collaboration!

* Note to the designers we've worked with:  we love you.  These issues are
inherent to any project of any complexity.  We have seen these problems across
many projects, not just one.  The problems here represent our failures as
developers to put the pieces together.  The idea here is to encourage fast paced
precise collaboration!



Architecture
------------
1600 is made up of a series of layers.  These layer can be thought of as legos.
Each layer is made up of ever more complex arrangements. This allows us to keep
each section of the framework manageable and understandable.

The goal of this framework is to create a tiered architecture:
- L1: variables
- L2: mixins
- L3: mappings
- L4: components

###L1: variables
In sass variables are the simplest most atomic constructs.  They can be fonts,
colors, numbers, pretty much anything that could be a CSS value.  Any site will
need to reuse common variables over and over.

However, a common problem in a large site is failing to realize when a variable
has already been used or redefining a duplicate value that's close but not quite
the original. This can lead to a problem we can call "50 Shades of Grey".
One site audit revealed 50 shades of grey!

In 1600 we avoid this problem by grouping all our variables in one place.


###L2: mixins
Mixins are small sass macros. This layer is made up of your swiss armyknife
functions. The mixins that appear in L2 are the ones we intend to reuse.  What
are good examples:
- clearfix
- inline-block w/ie fixes
- visuallyhidden


Single use mixins should be placed in L4 as they represent final output.


###L3: mappings
Mappings represent a layer of abstraction between variables and their
instantiation in L4 or outside the framework.  The mapping layer is a mental
exercise designed to help you identify patterns of reuse.  For example lets say
a site has 3 accent colors:
- amber
- apricot
- rust

Simply using $amber or $apricot assumes doesn't convey any information about the
context.  It assumes that the reader understands that these colors are accents.
Inevitably the use of the colors directly results in the loss of intention in
the markup. How do we solve this loss of information? We use the mapping layer
to capture this:
- amber  --> accent-color-one
- apricot --> accent-color-two
- rust  -->  accent-color-three

Now a reader can understand what the author was thinking!  This principle can be
applied to variables, colors, fonts, mixins, and even styles!



###L4: components
Components are the final level of the architecture and the primary output
of the framework.  Each component represents a single standalone functional
part of a webpage.  For example a header, footer, sidebar-widget, banner are all
examples of components.

Ideally components should be a wrapped in a single mixin which is responsible
for generating the final output.  Why bother wrapping in a mixin?  This prevents
the framework from outputting itself in it's entirety in your project.  In SASS
when you include a file with normal styles those styles are output into your
final CSS file.  However, mixins only generate CSS when called.  This means you
get only the CSS you want and not the entire framework!

(Note: Many other SASS documents may call these modules.  Due to
the origin of this in a Drupal based system we will avoid that term to prevent
confusion with Drupal modules).



Coding Inside Components
------------------------
The focus of this framework is on the 4 layer architecture.  Less emphasis is
placed on the internals of each component since each has a limited scope.
However, we recommend following SMACSS and BEM philosophies here.  Don't know
what I am talking about?  Check out the bookshelf below for more info.



Installation
------------

Add the framework to your SASS project's config.rb:
    add_import_path "../../libraries/sixteenhundred"


In your scss file import the framework:
- @import "sixteenhundred_variables";
- @import "sixteenhundred_mixins";
- @import "sixteenhundred_mappings";
- @import "sixteenhundred";


Importing these 4 layers allows you to override settings in the variables
and mappings layer. Alternatively you can shotgun the import:
- @import "sixteenhundred_all";


Overriding the Framework Defaults
---------------------------------
Never hack core! If you want to use the framework but don't like a specific color or style you
can easily override by importing the framework the verbose way in 4 lines and
then injecting your own imports in between.  Your imports will override any
foundation variables previously imported. e.g:

- @import "sixteenhundred_variables";
- @import "sixteenhundred_mixins";
- @import "my_cool_overrides";   <--------------- your overrides go here
- @import "sixteenhundred_mappings";
- @import "sixteenhundred";



Say that the following is defined:

sixteenhundred_variables:
````SCSS
$color-red: #c90000;
````
sixteenhundred_mappings:
````SCSS
$color-emergency: $color-red;
````
your_awesome_scss:
````CSS
@import "sixteenhundred_all";
.emergency-text-two{
    color: $color-emergency;
}
````

we would get the following output after compiling our SCSS to CSS:
````CSS
.emergency-text{
    color:#c90000;
}
````

Let's pretend that you downloaded 1600 and don't like our choice of emergency
text color you can override it without hacking 1600.  First instead of importing
the framework in a single import we will import the four layers individually.
Then we can slip our own SASS in between the layers this allows us to override
any items defined in a previous import.

your_awesome_scss:
````SCSS
@import "sixteenhundred_variables";
@import "sixteenhundred_mixins";
@import "my_cool_overrides";   <--------------- your overrides go here
@import "sixteenhundred_mappings";
@import "sixteenhundred";
.emergency-text{
    color: $color-emergency;
}
````

my_cool_overrides:
````SCSS
@import "sixteenhundred_all";
$color-red: #880002;   //Redefine the color red
````



now would get the following output after compiling our SCSS to CSS:
````CSS
.emergency-text{
    color: #880002;
}
````

As you can see we have overridden variables from 1600 without touching any code
in 1600.  With this approach you can override variables, styles, or even mixins.


Best Practices For Framework Developers
---------------------------------------
- All font's, colors, and other base elements should be defined in variables.
  These variables should be declared in the variables folder.
- The variables should be mapped in the mappings folder to reusable variable
  names that mirror reusable concepts.
- Importing the lib should not create any css by default.
- To support the point above each file in the framework should be a SASS partial.
- Use semantic classes.
- Avoid nesting deeper than 3 levels.
- Limit files to 500 lines or less. No one can understand a thousand line SASS doc.
  When files exceed 500 lines break them up into several files each which covers
  a functional area of your requirement.  When the resulting files are tightly
  coupled to one another create a directory for them.
- Any time that a new piece of code is added to components it should have an
  accomodating style-guide example.
- Do not under any circumstances include SASS which is specific to a site, or
  a product.  Any product specific code should be built into your products
  theming layer.
- Don't slavishly follow these rules.  Use your common sense!


Best Practices For Users of the Framework
-------------------------------------------
- Don't hack CORE!  Override the file.






To Do
--------------
- Come up with a way to combine this with ODS styleguide.  This should probably
  be a drupal module that traverses this looking for examples and then displays.
- Figure out how to prevent the framework from emitting CSS.
  Thinking using placeholders/mixins which are called by a master mixin.
- PX vs EM: Do we have an opinion?
- Do we have a strong feeling about grid system?  Zen? Suzy? Singularity?
- Consider packaging as a GEM



Demos
---------------
- cd to /sites/all/themes/fourtyfour/
- bundle exec compass watch
- should add some basic examples that are bundled with the framework.
- demo showing how to import and use the framework.
- demo overriding each of the layers of the architecture.

Bookshelf
---------
Here are some articles regarding SASS

- http://sass-lang.com/guide
- http://thesassway.com/intermediate/understanding-placeholder-selectors

Ideas for structuring your sass components
- http://smacss.com/
- http://csswizardry.com/2013/01/mindbemding-getting-your-head-round-bem-syntax/
- http://patternlab.io/
