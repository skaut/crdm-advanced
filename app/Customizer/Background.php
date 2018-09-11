<?php declare( strict_types=1 );

namespace Crdm\Customizer;

use Kirki;

class Background {

	protected $configId = '';
	protected $panelId = '';
	protected $sectionId = '';

	public function __construct( string $configId, string $panelId ) {
		$this->configId  = $configId;
		$this->panelId   = $panelId;
		$this->sectionId = $panelId . '_background';

		$this->initSection();
		$this->initControls();
	}

	protected function initSection() {
		Kirki::add_section( $this->sectionId, [
			'title' => esc_attr__( 'Pozadí', 'crdm-advanced' ),
			'panel' => $this->panelId
		] );
	}

	protected function initControls() {
		Kirki::add_field( $this->configId, [
			'type'      => 'background',
			'settings'  => 'webBg',
			'label'     => esc_attr__( 'Pozadí webu', 'crdm-advanced' ),
			'section'   => $this->sectionId,
			'default'   => [
				'background-color'      => '#fdfdfd',
				'background-image'      => CRDM_ADVANCED_TEMPLATE_URL . 'assets/img/bg.png',
				'background-repeat'     => 'repeat',
				'background-position'   => 'left top',
				'background-size'       => '33px auto',
				'background-attachment' => 'scroll'
			],
			'output'    => [
				[
					'element' => 'body'
				]
			],
			'transport' => 'auto'
		] );

		Kirki::add_field( $this->configId, [
			'type'      => 'background',
			'settings'  => 'menuBg',
			'label'     => esc_attr__( 'Pozadí hlavičky', 'crdm-advanced' ),
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
					'element' => '.site-header, .main-navigation, .main-navigation .main-nav ul li[class*="current-menu-"] > a, .main-navigation .main-nav ul li[class*="current-menu-"] > a:hover, .main-navigation .main-nav ul li[class*="current-menu-"].sfHover > a',
				]
			],
			'transport' => 'auto'
		] );

		Kirki::add_field( $this->configId, [
			'type'      => 'background',
			'settings'  => 'ribbon',
			'label'     => esc_attr__( 'Barevná linka', 'crdm-advanced' ),
			'section'   => $this->sectionId,
			'default'   => [
				'background-color'      => 'rgba(255, 255, 255, 0)',
				'background-image'      => CRDM_ADVANCED_TEMPLATE_URL . 'assets/img/linka.jpg',
				'background-repeat'     => 'no-repeat',
				'background-position'   => 'center center',
				'background-size'       => '100% 3px',
				'background-attachment' => 'scroll'
			],
			'output'    => [
				[
					'element' => '.crdm_linka'
				]
			],
			'transport' => 'auto'
		] );
	}

}