<?php
/**
Print the paging navigator.
Customizable each node.


// Test
$config[ "display_style" ] = CENTER;
$config[ "total_record" ] = 0;
$config[ "page_index" ] = $_REQUEST['page_index'];
$paging = new Customizable_Pagination_admin($config);
$paging->print_navigator();
*/
if( ! class_exists( "Customizable_Pagination_admin" ) ) :
define( 'NORMAL' , 'NORMAL' );
define( 'CENTER' , 'CENTER' );
class Customizable_Pagination_admin{
	
	public function Customizable_Pagination_admin( $params ) {
		$this->_init( $params );
		$this->_calculate();
	}
	
	public function print_navigator(){
		switch( $this->display_style ) {
			case NORMAL :
				$this->_navigator_normal_style();
				break;
			case CENTER: 
				$this->_navigator_center_style();
				break;
			default:
				$this->_navigator_normal_style();
				break;
			
		}
	}
	
	private function _navigator_normal_style(){
		if( $this->total_page < 1 ) 
				return;
			
		$html = "";
		if( $this->total_page > 1 ) 
		foreach( $this->display_section as $key => $val ) {
			$func = "_html_" . $val;
			$html .= $this->{ $func }();
		}
		
		if( $this->summay_included ) 
			echo sprintf( "%s%s%s%s" , $this->full_tag_open, $this->_html_summary(), $html, $this->full_tag_close );
		else 
			 echo sprintf( "%s%s%s" , $this->full_tag_open, $html, $this->full_tag_close );
	}
	
	private function _navigator_center_style(){
		$html = "";
		foreach( $this->display_section as $key => $val ) {
			$func = "_html_" . $val;
			$html .= $this->{ $func }();
		}
		
		if( $this->summay_included ) 
			echo sprintf( "%s%s%s%s" , $this->full_tag_open, $this->_html_summary(), $html, $this->full_tag_close );
		else 
			 echo sprintf( "%s%s%s" , $this->full_tag_open, $html, $this->full_tag_close );
	}
	
	private function _navigator_input_page_index_style(){
		$html = "";
		$html .= $this->_html_summary();
		$html .= $this->_html_first_page();
		$html .= $this->_html_previous_page();
		$html .= $this->_html_input_page_index();
		$html .= $this->_html_next_page();
		$html .= $this->_html_last_page();
	}
	
	private function _init( $params ) {
		$config = $this->_get_default_config();
		$params = array_merge( $this->_get_default_config() , $params );
		$params = $this->_replace_default_tag( $params );
		
		foreach( $params as $key => $val ) 
			$this->{$key} = $val;
	}
	
	private function _get_default_config(){
		$config["display_section"] = array( "first_page", "previous_page", "first_page_number", "previous_section", "number_list", "next_section", "last_page_number", "next_page", "last_page" );
		$config['display_style'] = NORMAL;
		$config['total_record'] = 0;
		$config['url_template'] = '?page_index=%s';
		
		$config['total_record'] = 0;
		$config['page_size'] = 20;
		$config['section_size'] = 10;
		$config['center_balance'] = 4; // Only for CENTER Mode
		$config['page_index'] = 1;
	
		$config["full_tag_open"] = "<ul>";
		$config["full_tag_close"] = "</ul>";
		
		$config[ "item_default_tag_open" ] = "<li>";
		$config[ "item_default_tag_close" ] = "</li>";
		
		$config["summary_text"] = "%s items";
		$config["summary_tag_open"] = "";
		$config["summary_tag_close"] = "";
	
		$config["prev_section_link"] = "...";
		$config["prev_section_link_class"] = "prev_section";
		$config["prev_section_tag_open"] = "";
		$config["prev_section_tag_close"] = "";
		
		$config['next_section_link'] = '...';
		$config['next_section_link_class'] = 'next_section';
		$config['next_section_tag_open'] = "";
		$config['next_section_tag_close'] = "";
	
		$config['first_page_number_link_class'] = 'first_page';
		$config["first_page_number_tag_open"] = "";
		$config["first_page_number_tag_close"] = "";
		
		$config['last_page_number_link_class'] = 'last_page';
		$config['last_page_number_tag_open'] = "";
		$config['last_page_number_tag_close'] = "";
		
		$config["first_link"] = "First";
		$config["first_link_class"] = "First";
		$config["first_tag_open"] = "";
		$config["first_tag_close"] = "";
		
		$config['last_link'] = 'Last';
		$config['last_link_class'] = 'last';
		$config['last_tag_open'] = "";
		$config['last_tag_close'] = "";
		
		$config['next_link'] = 'Next';
		$config['next_link_class'] = 'Next';
		$config['next_tag_open'] = "";
		$config['next_tag_close'] = "";
		
		$config['prev_link'] = 'Previous';
		$config['prev_link_class'] = 'previous';
		$config['prev_tag_open'] = "";
		$config['prev_tag_close'] = "";
		
		$config['cur_link_class'] = "selected";
		$config['cur_tag_open'] = "";
		$config['cur_tag_close'] = "";
		
		$config['num_link_class'] = "";
		$config['num_tag_open'] = "";
		$config['num_tag_close'] = "";
		
		return $config;
	}
	
	private function _replace_default_tag( $params ) {
		// Bind default tag
		$item_default_tag_open = $params[ "item_default_tag_open" ];
		$item_default_tag_close = $params[ "item_default_tag_close" ];
		
		foreach( $params as $key => $val ) {
			if( strpos( $key , "_tag_open" ) !== false && empty( $val ) ) 
				$params[ $key ] = $item_default_tag_open;
			
			if( strpos( $key , "_tag_close" ) !== false && empty( $val ) ) 
				$params[ $key ] = $item_default_tag_close;
		}
		
		return $params;
	}
	
	private function _calculate() {
		$this->_calculate_total_page();
		$this->_calculate_total_section();
		$this->_calculate_page();
	}
	
	private function _calculate_total_page() {
		if( empty( $this->page_size ) )
			$this->page_size = 50;
		
		$this->total_page = ceil($this->total_record / $this->page_size );
		
		if( $this->page_index < 1 ) $this->page_index = 1;
		if( $this->page_index > $this->total_page ) $this->page_index = $this->total_page;
	}
	
	private function _calculate_total_section() {
		if( empty( $this->section_size ) ) 
			$this->section_size = 20;
		
		$this->total_section = ceil( $this->total_page / $this->section_size );
		$this->current_section = ceil( $this->page_index / $this->section_size ); // Current section
	}
	
	private function _calculate_page(){
		
		// Calculate first page
		$this->first_page = 1;
		
		// Calculate last page
		$this->last_page = $this->total_page;
		
		// Calculate previous page
		if( $this->page_index > 1 ) 
			$this->previous_page = $this->page_index - 1;
		else 
			$this->previous_page = 0;
			
		// Calculate next page
		if( $this->page_index > 0 && $this->page_index < $this->last_page ) 
			$this->next_page = $this->page_index + 1;
		else 
			$this->next_page = 0;
			
		if( $this->display_style == NORMAL ) {
			// Normal mode
			$this->index_from = ( $this->current_section - 1 ) * $this->section_size + 1;
			$this->index_to = min( $this->current_section * $this->section_size , $this->total_page );
			$this->previous_section_page = ( $this->index_from > $this->first_page ) ? $this->index_from - 1 : 0;
			$this->next_section_page = ( $this->index_to < $this->last_page ) ? $this->index_to + 1 : 0;
		} else { 
			// Center mode
			$index_form = $this->page_index - $this->center_balance;
			$index_to = $this->page_index + $this->center_balance;
			
			if( $index_form <= $this->first_page ) {
				$index_form = $this->first_page;
				$index_to = $this->first_page + ( ( $this->center_balance * 2 ) ) ;
				$index_to = min( $index_to , $this->last_page );
			}
			else if( $index_to > $this->last_page ) {				
				$index_to = $this->last_page;
				$index_form = $this->last_page - ( ( $this->center_balance * 2 ) );
			}
			
			$this->index_from = $index_form;
			$this->index_to = $index_to;
		}
	}
	
	private function _html_summary() {
		return sprintf( "%s%s%s" , $this->summary_tag_open, sprintf( $this->summary_text, $this->total_record ) , $this->summary_tag_close );
	}
	
	private function _html_previous_section() {
		if( empty( $this->previous_section_page ) ) 
			return "";
		 
		$link = $this->_build_link( $this->previous_section_page, $this->prev_section_link, $this->prev_section_link_class ) ;
		return sprintf( "%s%s%s" , $this->prev_section_tage_open, $link , $this->prev_section_tag_close );
	}
	
	private function _html_next_section() {
		if( empty( $this->next_section_page ) ) 
			return "";
			
		$link = $this->_build_link( $this->next_section_page, $this->next_section_link, $this->next_section_link_class ) ;
		return sprintf( "%s%s%s" , $this->next_section_tage_open, $link , $this->next_section_tag_close );
	}
	
	private function _html_first_page_number() {
		if( empty( $this->previous_section_page ) ) 
			return "";
			
		$link = $this->_build_link( $this->first_page, $this->first_page, $this->first_page_number_link_class ) ;
		return sprintf( "%s%s%s" , $this->first_page_number_tag_open, $link , $this->first_page_number_tag_close );
	}
	
	private function _html_last_page_number() {
		if( empty( $this->next_section_page ) ) 
			return "";
			
		$link = $this->_build_link( $this->last_page, $this->last_page, $this->last_page_number_link_class ) ;
		return sprintf( "%s%s%s" , $this->last_page_number_tag_open, $link , $this->last_page_number_tag_close );
	}
	
	private function _html_first_page() {
		$link = $this->_build_link( $this->first_page, $this->first_link, $this->first_link_class ) ;
		return sprintf( "%s%s%s" , $this->first_tag_open, $link , $this->first_tag_close ) ;
	}
	
	private function _html_last_page() {
		$link = $this->_build_link( $this->last_page, $this->last_link, $this->last_link_class ) ;
		return sprintf( "%s%s%s" , $this->last_tag_open, $link , $this->last_tag_close );
	}
	
	private function _html_previous_page() {
		$link = $this->_build_link( $this->previous_page, $this->prev_link, $this->prev_link_class ) ;
		return sprintf( "%s%s%s" , $this->prev_tag_open, $link , $this->prev_tag_close );
	}
	
	private function _html_next_page() {
		$link = $this->_build_link( $this->next_page, $this->next_link, $this->next_link_class ) ;
		return sprintf( "%s%s%s" , $this->next_tag_open, $link , $this->next_tag_close );
	}
	
	private function _html_number_list() {
		$html = "";		
		
		for( $i = $this->index_from; $i <= $this->index_to; $i++ ) {
			if( $i == $this->page_index ) { 
				$link = $this->_build_link( $i, $i, $this->cur_link_class ) ;
				$html .= sprintf( "%s%s%s" , $this->cur_tag_open, $link , $this->cur_tag_close );
			}
			else {
				$link = $this->_build_link( $i, $i, $this->num_link_class ) ;
				$html .= sprintf( "%s%s%s" , $this->num_tag_open, $link , $this->num_tag_close );
			}
		}
		
		return $html;
	}
	
	private function _html_input_page_index() {
		$html = "";
		$this->input_page_index_tag_open = '<span class="paging-input">';
		$this->input_page_index_tag_close = '</span>';
		$this->input_page_index_tag_input = '<input type="text" size="1" value="%s" name="page_index" title="Current page" class="current-page" onclick="return _redirect_input( this )">';
		$this->input_page_index_total_page_summary = ' of <span class="total-pages">2</span>';

		$html .= sprintf( $this->input_page_index_tag_open );
		$html .= sprintf( $this->input_page_index_tag_input , $this->page_index );
		$html .= sprintf( $this->input_page_index_total_page_summary , $this->tota_page );
		$html .= sprintf( $this->input_page_index_tag_close );
		
		return $html;
	}
	private function _build_url( $page_index ) {
		if( empty( $page_index ) || $this->page_index == $page_index ) 
			return "javascript:void(0);";
		else 
			return sprintf( $this->url_template , $page_index );
	}
	
	private function _build_link( $page_index, $link_text, $link_class = "" ) {
		$link = sprintf("<a href=\"%s\" class=\"%s\">%s</a>",$this->_build_url( $page_index ), $link_class, $link_text);
		return $link;
	}
	
	private function _jscript_redirect_input_functions() {
		$href_template = sprintf( $this->url_template , '" + page_index + "' );
		$html = '<script language="javascript" type="text/javascript">
			///Require jquery library
			function _redirect_input( objInput ) {
				var page_index = parseInt( $( objInput ).val() );
				if( ! isNaN( page_index ) ) 
					window.location.href = "%s";
				return false;
			}
		</script>';
		return sprintf( $html , $href_template );
	}
	
	private function _jscript_redirect_input_call() {
		$html = '_redirect_input( objInput )';
		return $html;
	}
}
endif;

