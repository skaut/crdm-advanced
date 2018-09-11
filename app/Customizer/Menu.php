<?php declare( strict_types=1 );

namespace Crdm\Customizer;

use Kirki;

class Menu {

	protected $configId = '';
	protected $panelId = '';
	protected $sectionId = '';

	public function __construct( string $configId, string $panelId ) {
		$this->configId  = $configId;
		$this->panelId   = $panelId;
		$this->sectionId = $panelId . '_menu';

		$this->initSection();
		$this->initControls();
	}

	protected function initSection() {
		Kirki::add_section( $this->sectionId, [
			'title' => esc_attr__( 'Menu', 'crdm-advanced' ),
			'panel' => $this->panelId
		] );
	}

	protected function initControls() {
		Kirki::add_field( $this->configId, [
			'type'      => 'typography',
			'settings'  => 'menuFont',
			'label'     => esc_attr__( 'Položky menu', 'crdm-advanced' ),
			'section'   => $this->sectionId,
			'default'   => [
				'font-family'    => 'PT Sans',
				'variant'        => 'regular',
				'font-size'      => '17px',
				'line-height'    => '64px',
				'letter-spacing' => 'inherit',
				'color'          => '#6f7475',
				'text-transform' => 'none'
			],
			'output'    => [
				[
					'element' => '.main-navigation .main-nav > ul > li > a, .main-navigation .main-nav ul li[class*="current-menu-"] > a, .main-navigation .main-nav ul li[class*="current-menu-"] > a:hover, .main-navigation .main-nav ul li[class*="current-menu-"].sfHover > a, .main-navigation .main-nav ul li:hover > a, .main-navigation .main-nav ul li:focus > a, .main-navigation .main-nav ul li.sfHover > a'
				],
				[
					'choice'   => 'color',
					'element'  => '.dropdown-menu-toggle:before',
					'property' => 'color'
				]
			],
			'transport' => 'auto'
		] );

		Kirki::add_field( $this->configId, [
			'type'      => 'color',
			'settings'  => 'menuSeparatorColor',
			'label'     => esc_attr__( 'Barva oddělovače položek menu', 'crdm-advanced' ),
			'section'   => $this->sectionId,
			'default'   => '#3b969f',
			'output'    => [
				[
					'element'  => '.main-nav > ul > li > a:after',
					'property' => 'background-color'
				]
			],
			'transport' => 'auto'
		] );

		Kirki::add_field( $this->configId, [
			'type'      => 'background',
			'settings'  => 'submenuBg',
			'label'     => esc_attr__( 'Pozadí vysouvacího menu', 'crdm-advanced' ),
			'section'   => $this->sectionId,
			'default'   => [
				'background-color'      => '#f9f9f9',
				'background-image'      => '',
				'background-repeat'     => 'repeat',
				'background-position'   => 'center center',
				'background-size'       => 'cover',
				'background-attachment' => 'scroll'
			],
			'output'    => [
				[
					'element' => '.main-navigation .main-nav .sub-menu li a, .main-navigation .main-nav ul ul li:hover > a, .main-navigation .main-nav ul ul li:focus > a',
				]
			],
			'transport' => 'auto'
		] );

		Kirki::add_field( $this->configId, [
			'type'      => 'typography',
			'settings'  => 'submenuFont',
			'label'     => esc_attr__( 'Položky submenu', 'crdm-advanced' ),
			'section'   => $this->sectionId,
			'default'   => [
				'font-family'    => 'PT Sans',
				'variant'        => 'regular',
				'font-size'      => '14px',
				'line-height'    => 'normal',
				'letter-spacing' => 'inherit',
				'color'          => '#6f7475',
				'text-transform' => 'none'
			],
			'output'    => [
				[
					'element' => '.main-navigation .main-nav .sub-menu li a, .main-navigation .main-nav ul ul li:hover > a, .main-navigation .main-nav ul ul li:focus > a, .main-navigation .main-nav ul ul li.sfHover > a'
				]
			],
			'transport' => 'auto'
		] );

		Kirki::add_field( $this->configId, [
			'type'      => 'color',
			'settings'  => 'submenuSeparatorColor',
			'label'     => esc_attr__( 'Barva oddělovače položek submenu', 'crdm-advanced' ),
			'section'   => $this->sectionId,
			'default'   => '#ffffff',
			'output'    => [
				[
					'element'  => '.main-navigation .main-nav ul ul li a',
					'property' => 'border-top-color'
				]
			],
			'transport' => 'auto'
		] );
	}

}