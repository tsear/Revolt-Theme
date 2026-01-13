<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php wp_title('|', true, 'right'); ?></title>

  <!-- 👇 Long-tail keywords for SEO -->
  <meta name="keywords"
        content="WordPress web development for self-publishing authors,
                 Custom WordPress themes for entrepreneurs,
                 WordPress developer for independent writers,
                 Revolt Strategies WordPress digital marketing,
                 Affordable WordPress website design for small businesses,
                 Remote WordPress development services,
                 WordPress SEO optimization for self-publishers,
                 Bespoke WordPress solutions for solopreneurs,
                 WordPress site maintenance by Revolt Strategies,
                 Professional WordPress development agency" />

  <!-- 👇 Tailwind CSS + Flowbite -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      prefix: 'tw-', // Prefix to avoid conflicts with existing styles
      corePlugins: {
        preflight: false, // Disable Tailwind's reset to preserve your existing styles
      },
      theme: {
        extend: {
          colors: {
            'revolt-yellow': '#FCB900',
            'revolt-amber': '#FFB300',
          },
          fontFamily: {
            'mono': ['Fira Code', 'monospace'],
          }
        }
      }
    }
  </script>
  <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />

  <!-- 👇 Inline JSON-LD structured data -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "WebSite",
    "url": "<?php echo esc_url( home_url() ); ?>",
    "name": "<?php echo esc_js( get_bloginfo('name') ); ?>",
    "description": "<?php echo esc_js( get_bloginfo('description') ); ?>",
    "keywords": [
      "WordPress web development for self-publishing authors",
      "Custom WordPress themes for entrepreneurs",
      "WordPress developer for independent writers",
      "Revolt Strategies WordPress digital marketing",
      "Affordable WordPress website design for small businesses",
      "Remote WordPress development services",
      "WordPress SEO optimization for self-publishers",
      "Bespoke WordPress solutions for solopreneurs",
      "WordPress site maintenance by Revolt Strategies",
      "Professional WordPress development agency"
    ]
  }
  </script>

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header id="site-header">
  <?php get_template_part('partials/custom-header'); ?>
</header>