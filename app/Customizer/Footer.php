<?php declare( strict_types=1 );

namespace Crdm\Customizer;

use Kirki;

class Footer {

	protected $configId = '';
	protected $panelId = '';
	protected $sectionId = '';

	public function __construct( string $configId, string $panelId ) {
		$this->configId  = $configId;
		$this->panelId   = $panelId;
		$this->sectionId = $panelId . '_footer';

		$this->initSection();
		$this->initControls();
	}

	protected function initSection() {
		Kirki::add_section( $this->sectionId, [
			'title' => esc_attr__( 'Patička', 'crdm-advanced' ),
			'panel' => $this->panelId
		] );
	}

	protected function initControls() {
		Kirki::add_field( $this->configId, [
			'type'      => 'background',
			'settings'  => 'footerBg',
			'label'     => esc_attr__( 'Pozadí', 'crdm-advanced' ),
			'section'   => $this->sectionId,
			'default'   => [
				'background-color'      => '#495052',
				'background-image'      => '',
				'background-repeat'     => 'repeat',
				'background-position'   => 'left top',
				'background-size'       => 'auto',
				'background-attachment' => 'scroll'
			],
			'output'    => [
				[
					'element' => '.footer-widgets'
				]
			],
			'transport' => 'auto'
		] );

		Kirki::add_field( $this->configId, [
			'type'      => 'typography',
			'settings'  => 'footerTitlesFont',
			'label'     => esc_attr__( 'Nadpisy (H2)', 'crdm-advanced' ),
			'section'   => $this->sectionId,
			'default'   => [
				'font-family'    => 'Open Sans',
				'variant'        => 'regular',
				'font-size'      => '21px',
				'line-height'    => '1.5',
				'letter-spacing' => 'inherit',
				'color'          => '#ffffff',
				'text-transform' => 'none'
			],
			'output'    => [
				[
					'element' => '.footer-widgets .widget-title'
				]
			],
			'transport' => 'auto'
		] );

		Kirki::add_field( $this->configId, [
			'type'      => 'typography',
			'settings'  => 'footerFont',
			'label'     => esc_attr__( 'Běžný text', 'crdm-advanced' ),
			'section'   => $this->sectionId,
			'default'   => [
				'font-family'    => 'Open Sans',
				'variant'        => 'regular',
				'font-size'      => '19px',
				'line-height'    => '1.5',
				'letter-spacing' => 'inherit',
				'color'          => '#ffffff'
			],
			'output'    => [
				[
					'element' => '.footer-widgets'
				]
			],
			'transport' => 'auto'
		] );

		Kirki::add_field( $this->configId, [
			'type'      => 'color',
			'settings'  => 'footerLinksColor',
			'label'     => esc_attr__( 'Barva odkazů', 'crdm-advanced' ),
			'section'   => $this->sectionId,
			'default'   => '#4aafbc',
			'output'    => [
				[
					'element'  => '.footer-widgets a, .footer-widgets a:visited, .footer-widgets a:hover',
					'property' => 'color'
				]
			],
			'transport' => 'auto'
		] );
	}

}