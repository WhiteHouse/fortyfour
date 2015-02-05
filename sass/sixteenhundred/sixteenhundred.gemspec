Gem::Specification.new do |s|
  # Release Specific Information
  s.version = "0.1.alpha.1"
  s.date = "2014-07-10"

  # Gem Details
  s.name = "sixteenhundred"
  s.authors = ["Whitehouse"]
  s.summary = %q{a SASS base library used in the forall drupal distro}
  s.description = %q{For All Foundation is designed to be a common variable and mixin library to keep for all front end development DRY}
  s.email = "admin@whitehouse.gov"
  s.homepage = "http://www.whitehouse.gov"

  # Gem Files
  s.files = %w(README.md)
  s.files += Dir.glob("lib/**/*.*")
  s.files += Dir.glob("stylesheets/**/*.*")
  s.files += Dir.glob("templates/**/*.*")

  # Gem Bookkeeping
  s.rubygems_version = %q{1.3.6}
  s.add_dependency("compass", [">= 0.11"])
end