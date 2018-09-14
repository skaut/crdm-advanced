<?php declare( strict_types=1 );

namespace Crdm\Admin;

final class Init {

	public function __construct() {
		require CRDM_ADVANCED_APP_PATH . 'inc' . DIRECTORY_SEPARATOR . 'tgmpa' . DIRECTORY_SEPARATOR . 'class-tgm-plugin-activation.php'; // init TGMPA
		$this->initHooks();
	}

	private function initHooks() {
		add_action( 'tgmpa_register', [ $this, 'registerRecommendedPlugins' ] );
	}

	public function registerRecommendedPlugins() {

		$plugins = [
			[
				'name'     => 'AMO Team Showcase',
				'slug'     => 'amo-team-showcase',
				'required' => false,
			],
			[
				'name'     => 'amr shortcode any widget',
				'slug'     => 'amr-shortcode-any-widget',
				'required' => false,
			],
			[
				'name'     => 'Customizer Export/Import',
				'slug'     => 'customizer-export-import',
				'required' => false,
			],
			[
				'name'     => 'Simple Calendar',
				'slug'     => 'google-calendar-events',
				'required' => false,
			],
			[
				'name'     => 'WP Show Posts',
				'slug'     => 'wp-show-posts',
				'required' => false,
			]
		];

		$config = [
			'id'           => 'tgmpa',
			'default_path' => '',
			'menu'         => 'tgmpa-install-plugins',
			'parent_slug'  => 'themes.php',
			'capability'   => 'edit_theme_options',
			'has_notices'  => true,
			'dismissable'  => true,
			'dismiss_msg'  => '',
			'is_automatic' => false,
			'message'      => '',

			'strings' => [
				'page_title' => __( 'Instalace doporučených pluginů', 'crdm-advanced' ),
				'menu_title' => __( 'Doporučené pluginy', 'crdm-advanced' ),
				'nag_type'   => 'updated',
			]

		];

		tgmpa( $plugins, $config );
	}

}