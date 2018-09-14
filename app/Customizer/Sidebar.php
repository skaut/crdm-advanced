<?php declare( strict_types=1 );

namespace Crdm\Customizer;

use Kirki;

class Sidebar {

	protected $configId = '';
	protected $panelId = '';
	protected $sectionId = '';

	public function __construct( string $configId, string $panelId ) {
		$this->configId  = $configId;
		$this->panelId   = $panelId;
		$this->sectionId = $panelId . '_sidebar';

		$this->initSection();
		$this->initControls();
	}

	protected function initSection() {
		Kirki::add_section( $this->sectionId, [
			'title' => esc_attr__( 'Postranní panely', 'crdm-advanced' ),
			'panel' => $this->panelId
		] );
	}

	protected function initControls() {
		Kirki::add_field( $this->configId, [
			'type'      => 'background',
			'settings'  => 'sidebarBg',
			'label'     => esc_attr__( 'Pozadí', 'crdm-advanced' ),
			'section'   => $this->sectionId,
			'default'   => [
				'background-color'      => '#ffffff',
				'background-image'      => '',
				'background-repeat'     => 'repeat',
				'background-position'   => 'left top',
				'background-size'       => 'auto',
				'background-attachment' => 'scroll'
			],
			'output'    => [
				[
					'element' => '.sidebar .widget, .site-main .widget'
				]
			],
			'transport' => 'auto'
		] );

		Kirki::add_field( $this->configId, [
			'type'      => 'typography',
			'settings'  => 'sidebarTitlesFont',
			'label'     => esc_attr__( 'Nadpisy (H2)', 'crdm-advanced' ),
			'section'   => $this->sectionId,
			'default'   => [
				'font-family'    => 'Open Sans',
				'variant'        => 'regular',
				'font-size'      => '20px',
				'line-height'    => '1.5',
				'letter-spacing' => 'inherit',
				'color'          => '#000000',
				'text-transform' => 'none'
			],
			'output'    => [
				[
					'element' => '.sidebar .widget .widget-title, .site-main .widget .widget-title'
				]
			],
			'transport' => 'auto'
		] );

		Kirki::add_field( $this->configId, [
			'type'      => 'typography',
			'settings'  => 'sidebarFont',
			'label'     => esc_attr__( 'Běžný text', 'crdm-advanced' ),
			'section'   => $this->sectionId,
			'default'   => [
				'font-family'    => 'Open Sans',
				'variant'        => 'regular',
				'font-size'      => '17px',
				'line-height'    => '1.5',
				'letter-spacing' => 'inherit',
				'color'          => '#3a3a3a'
			],
			'output'    => [
				[
					'element' => '.sidebar .widget, .site-main .widget'
				]
			],
			'transport' => 'auto'
		] );

		Kirki::add_field( $this->configId, [
			'type'      => 'color',
			'settings'  => 'sidebarLinksColor',
			'label'     => esc_attr__( 'Barva odkazů', 'crdm-advanced' ),
			'section'   => $this->sectionId,
			'default'   => '#f58053',
			'output'    => [
				[
					'element'  => '.sidebar .widget a, .sidebar .widget a:visited, .sidebar .widget a:hover, .site-main .widget a, .site-main .widget a:visited, .site-main .widget a:hover',
					'property' => 'color'
				]
			],
			'transport' => 'auto'
		] );
	}

}