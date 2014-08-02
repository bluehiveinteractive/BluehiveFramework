require 'bootstrap-sass'

# Require any additional compass plugins here.


# Set this to the root of your project when deployed:
http_path = "/"
css_dir = "assets/css/build"
sass_dir = "assets/css/sass"
images_dir = "assets/img"
javascripts_dir = "assets/js/build"

# Output
# output_style = :expanded or :nested or :compact or :compressed
output_style = :expanded
environment = :development

config.assets.debug = true
config.sass.debug_info = true
config.sass.line_comments = false # source maps don't get output if this is true

# To enable relative paths to assets via compass helper functions. Uncomment:
# relative_assets = true

# To disable debugging comments that display the original location of your selectors. Uncomment:
# line_comments = false


# If you prefer the indented syntax, you might want to regenerate this
# project again passing --syntax sass, or you can uncomment this:
# preferred_syntax = :sass
# and then run:
# sass-convert -R --from scss --to sass sass scss && rm -rf sass && mv scss sass
