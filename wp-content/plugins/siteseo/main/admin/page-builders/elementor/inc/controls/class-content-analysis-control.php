<?php
/*
* SiteSEO
* https://siteseo.io/
* (c) SiteSEO Team <support@siteseo.io>
*/

/*
Copyright 2016 - 2024 - Benjamin Denis  (email : contact@seopress.org)
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

namespace SiteSeoElementorAddon\Controls;

if ( ! defined('ABSPATH')) {
	exit();
}

class Content_Analysis_Control extends \Elementor\Base_Control {
	public function get_type() {
		return 'siteseo-content-analysis';
	}

	public function enqueue() {
		wp_enqueue_style(
			'siteseo-el-content-analysis-style',
			SITESEO_ELEMENTOR_ADDON_URL . 'assets/css/content-analysis.css'
		);

		wp_enqueue_script(
			'siteseo-el-content-analysis-script',
			SITESEO_ELEMENTOR_ADDON_URL . 'assets/js/content-analysis.js',
			['siteseo-elementor-base-script', 'jquery-ui-tabs', 'jquery-ui-accordion'],
			SITESEO_VERSION,
			true
		);
	}

	protected function get_default_settings() {
		global $post;

		return [
			'post_id'	 => isset($post) ? $post->ID : '',
			'post_type'   => isset($post) ? $post->post_type : '',
			'loading'	 => __('Analysis in progress...', 'siteseo'),
			'description' => '',
		];
	}

	public function content_template() {
		?>
<div class="elementor-control-field siteseo-content-analyses">
	<button id="siteseo_launch_analysis" type="button"
		class="btn btnSecondary elementor-button elementor-button-default" data_id="{{ data.post_id }}"
		data_post_type="{{ data.post_type }}">
		<?php esc_html_e('Refresh analysis', 'siteseo'); ?>
	</button>

	<# if ( data.description ) { #>
		<div class="elementor-control-field-description">{{{ data.description }}}</div>
		<# } #>
			<div id="siteseo-analysis-tabs">
				<div class="analysis-score">
					<p class="notgood loading">
						<svg role="img" aria-hidden="true" focusable="false" width="100%" height="100%"
							viewBox="0 0 200 200" version="1.1" xmlns="http://www.w3.org/2000/svg">
							<circle r="90" cx="100" cy="100" fill="transparent" stroke-dasharray="565.48"
								stroke-dashoffset="0"></circle>
							<circle id="bar" r="90" cx="100" cy="100" fill="transparent" stroke-dasharray="565.48"
								stroke-dashoffset="0" style="stroke-dashoffset: 101.788px;"></circle>
						</svg>
						<span>{{{ data.loading }}}</span>
					</p>
				</div>
			</div>
</div>
<?php
	}
}
