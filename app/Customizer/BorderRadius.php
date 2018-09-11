<?php declare( strict_types=1 );

namespace Crdm\Customizer;

use Kirki;

class BorderRadius {

	protected $configId = '';
	protected $panelId = '';
	protected $sectionId = '';

	public function __construct( string $configId, string $panelId ) {
		$this->configId  = $configId;
		$this->panelId   = $panelId;
		$this->sectionId = $panelId . '_borderRadius';

		$this->initSection();
		$this->initControls();
	}

	protected function initSection() {
		Kirki::add_section( $this->sectionId, [
			'title' => esc_attr__( 'Zaoblení', 'crdm-advanced' ),
			'panel' => $this->panelId
		] );
	}

	protected function initControls() {
		Kirki::add_field( $this->configId, [
			'type'        => 'dimension',
			'settings'    => 'borderRadius',
			'label'       => esc_attr__( 'Zaoblení prvků', 'crdm-advanced' ),
			'description' => esc_attr__( 'Zadejte včetně jednotky, např.: 10px', 'crdm-advanced' ),
			'section'     => $this->sectionId,
			'default'     => '0px',
			'css_vars'    => [
				[ '--main-border-radius' ],
			],
			'transport' => 'auto'
		] );
	}

}