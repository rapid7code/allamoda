<?php
/**
 *
 * List data.
 * @author Vũ Bắc
 * @since 2014-05-12
 * @version 1.0
 */
 
require_once( "class.pagination.admin.php" );
require_once( "class.export.php" );

if( !class_exists( 'contact_list' ) ){
	
class contact_list {
	// Page name
	var $page_name;
	
	// Page title
	var $page_title = "Contact Page";

	var $message;
	
	// Display mode
	var $mode;
	
	//Class Functions
	/**
	* PHP 4 Compatible Constructor
	*/
	function contact_list(){
		$this->_init(); 
	}
		
	function _init() {
		// Get page name.
		$this->page_name = $_REQUEST[ 'page' ] ;
		
		// Add admin submit handling.
		$this->_handle_admin_submit();
	}

	
	/**
	 * Drive diplay mode
	 * @name display_mode
	 * @access public
	 * @return void
	 * @author Vu Bac
	 * @since 2012-12-06
	 * @version 1.0
	 */
	public function show_page(){
		$mode = $_GET['mode'] ;
		switch( $mode ){
			default: 
				$this->_show_normal_page();
				break;
		}
	}
	
	/**
	 * Display data list as a table
	 * @name display_mode
	 * @access public
	 * @return void
	 * @author Vu Bac
	 * @since 2012-12-06
	 * @version 1.0
	 */
	function _show_normal_page(){
		global $wpdb;		
	
		// Get search data
		$accept_vars = array( "action", "keyword", "order_by", "from_date", "to_date", "page_index" );
		$params = filter_array($_REQUEST,$accept_vars);
		$params = trim_array($params);
		foreach($params as $key => $value)${$key} = $value;
		
		$query = $params;
		unset( $query[ "page_index" ] );
 		$url_query = http_build_query( $query, '' , '&' );
		
		$params[ "page_size" ] = 20;		
		$data = $this->_get_member_search( $params );
		
		$total_record = $data["total_record"];
		$page_index = $data["page_index"];
		$page_size = $data["page_size"];
		
		
		$list = $data["list"];
		$datalist_header = array('id', 'fullname', 'email', 'message', 'created');
		$colspan = 0;
		
		
	?>
		<div class="wrap">
		<h2><?php echo $this->page_title;?></h2>
		
		<?php if( ! empty( $this->message ) ):?>
		<div id="message" class="updated fade">
			<p><strong><?php echo $this->message;?></strong></p>
		</div>
		<?php endif;?>
		
		
		<form action="<?php echo $_SERVER['PHP_SELF'];?>?page=<?php echo $this->page_name;?><?php echo ( ! empty( $this->mode ) ) ? "&mode=" . $this->mode : "" ;?>" id="search_form" name="search_form" method="post">
			<input type="hidden" name="action" value="search" />			
			
			<?php $this->_print_search_panel_html();?>
			<?php $this->_print_action_panel_html( '1' , array( "total_record" => $total_record , "page_index" => $page_index , "page_size" => $page_size , 'url_query' => $url_query ) );?>
			
			<table class="widefat" cellspacing="0">
				<thead>
					<?php $datalist_header = $this->_datalist_thead( $datalist_header ); ?>
				</thead>
				<tfoot>
					<?php $datalist_header = $this->_datalist_thead( $datalist_header ); ?>
				</tfoot> 
				<tbody id="items-list" class="list:items items-list">
					<?php
            $count = 0;
            $class = '';
						foreach ($list as $item) {
							$count++;
							$class = ($class == 'alternate') ? '' : 'alternate';
							echo sprintf( '<tr id="%1$d" class="%2$s">', $item[ "id" ], $class );
							echo sprintf( '<th scope="row" class="check-column"><input type="checkbox" name="selected[]" id="selected_%1$d" value="%1$d" /></th>', $item[ "id" ] );
							
							foreach( $datalist_header as $key => $val ) {	
								switch( $val ) {
									default :
										$content = 	$item[ $val ];
										break;
								}
								
								echo sprintf( '<td class="name column-name">%s</td>', $content );
							}
							
							echo "</tr>";
						}
						if ( empty( $count ) ) { echo '<tr><td colspan="' . sizeof( $datalist_header ) . '">'; _e('No data', 'blank'); echo "</td></tr>"; } 
					?>
				</tbody>
			</table>
			<?php $this->_print_action_panel_html( '2' , array( "total_record" => $total_record , "page_index" => $page_index , "page_size" => $page_size , 'url_query' => $url_query ) );?>
		</form>
		</div>
	
		<?php
	} // End tbl_list
	
	/**
	 * Build table header for data list.
	 * @name _datalist_thead
	 * @access public
	 * @return void
	 * @author Vu Bac
	 * @since 2012-12-06
	 * @version 1.0
	 */
	private function _datalist_thead( $header = array() ){
		$default_header = array();
		$header = array_merge( $header, $default_header );
	?>
		<tr class="thead">
		<th scope="col" class="manage-column column-cb check-column" style=""><input type="checkbox" /></th>
		<?php foreach ( $header as $key => $header_title ) : ?>
		<th scope="col" class="manage-column" style=""><?php echo ucwords( str_replace('_' , ' ' , $header_title ) );?></th>
		<?php endforeach;?>
		</tr>
		<?php 
		return $header;
	}
	
	/**
	 * Ouput search panel html.
	 * @name _print_search_panel_html
	 * @access public
	 * @return void
	 * @author Vu Bac
	 * @since 2012-12-06
	 * @version 1.0
	 */
	public function _print_search_panel_html($suffix = ''){
		// Defind action with selected rows.
		//$actions = array( 'resend-activation' => 'Resend Activation', 'block' => 'Block' );
	?>
		<div class="tablenav">
		
			<div class="alignleft actions">
				
				<table class="fixed" cellspacing="0">
				
					<tbody id="items-list" class="list:items items-list">
						
						<tr>
							<td>Keyword: </td>
							<td><input type="text" name="keyword" value="<?php echo $_REQUEST[ "keyword" ] ;?>" /></td>

						</tr>
						
						<tr>
							<td>From date: </td> 
							<td><input id="from_date" name="from_date" value="<?php echo $_REQUEST[ "from_date" ] ?>" type="text" class="date_picker"></td> 
							<td>To date: </td> 
							<td><input id="to_date" name="to_date" value="<?php echo $_REQUEST[ "to_date" ] ?>" type="text" class="date_picker"></td> 							
						</tr>

						
					</tbody>
				</table>
				<input type="submit" value="Search" name="search" id="search" onclick="submit_search_form('search');" class="button-secondary action" />
			</div>
			<br class="clear" />
		</div>
        <script language="javascript" type="text/javascript">
			jQuery(document).ready(function() {
				jQuery('.date_picker').datepicker({
					dateFormat : 'dd-mm-yy'
				});
			});
		</script>
	<?php 		
	} 


	/**
	 * Ouput actions panel html for selected rows.
	 * @name _print_action_panel_html
	 * @access public
	 * @return void
	 * @author Vu Bac
	 * @since 2012-12-06
	 * @version 1.0
	 */
	public function _print_action_panel_html( $suffix = '' , $params ) { 
		extract( $params , EXTR_OVERWRITE );
		global $current_user;
		// Defind action with selected rows.		
		$actions = array();
		if( ! in_array( $current_user->user_login, array( "viewer" ) ) ) {
			$actions[ 'export' ] = 'Export To Excel';
		}
	?>
	
		<div class="tablenav">
			<?php if( ! empty( $actions ) ) :?>		
			<div class="alignleft actions">
				<select id="action<?php echo $suffix;?>" name="action<?php echo $suffix; ?>">
					<option value="" selected="selected">Bulk Actions</option>
					<?php foreach( $actions as $key => $val ):?>
					<option value="<?php echo $key;?>"><?php echo $val;?></option>
					<?php endforeach;?>
				</select>
				<input type="button" value="Apply" name="doaction" id="doaction" onclick="submit_search_form( jQuery('#action<?php echo $suffix;?>').val() );" class="button-secondary action" />				
			</div>
			<?php endif;?>		
			<div class="tablenav-pages">
				<span class="displaying-num"><?php echo $total_record;?> items</span>
				<span class="pagination-links">
				<?php 
				$config = array();
				$config[ "total_record" ] = $total_record;
				$config[ "page_index" ] = $_REQUEST[ 'page_index' ];
				$config[ "page_size" ] = $_REQUEST[ 'page_size' ];
				$config[ "full_tag_open" ] = '<span class="pagination-links">';
				$config[ "full_tag_close" ] = '</span>';
				$config[ "item_default_tag_open" ] = '';
				$config[ "item_default_tag_close" ] = '';
				$config[ "url_template" ] = sprintf( "?page=%s" , $_REQUEST[ "page" ] );
				$config[ "url_template" ] .= ( ! empty( $url_query ) ) ? '&' . $url_query : '' ;
				$config[ "url_template" ] .= "&page_index=%s" ;
				$config[ "first_link" ] = "«";
				$config[ 'last_link' ] = '»';
				$config[ 'next_link' ] = '›';
				$config[ 'prev_link' ] = '‹';
				$config = array_merge( $config , $params );
				$paging = new Customizable_Pagination_admin($config);
				$paging->print_navigator();
				?>
				</span>
			</div>
			<br class="clear" />
		</div>
	<?php 		
	}
	
	// Handle admin submit
	function _handle_admin_submit() {
		global $wpdb;
		$action = strtolower( trim( $_REQUEST[ 'action' ] ) );
		$page = strtolower( trim( $_REQUEST[ 'page' ] ) );
		
		if( $_SERVER['REQUEST_METHOD'] == "POST" && $page == PROJECT_BACKEND_ADMIN_PAGE_CONTACT ) {
			if( $action == "export" ) {
				
				$accept_vars = array( "action", "keyword", "order_by", "from_date", "to_date", "page_index" );
				$params = filter_array($_REQUEST,$accept_vars);
				$params = trim_array($params);
				
				$results = $this->_get_member_search( $params , true);
				$data = array();				
				$datalist_header = array('id', 'fullname', 'email', 'message', 'created');
				foreach( $results[ 'list' ] as $item ) {
					foreach( $datalist_header as $field ) {
						$header_text = ucwords( str_replace( "_"," ", $field ) ) ;
						$value = "";
						
						switch( $field ) {

							default:
								$value = $item[ $field ];
								break;
						}
						
						$row[ $header_text ] = $value ;
					}
					
					$data[] = $row;
				}
				
				$exporter = new Exporter();
				$exporter->export_excel( $data, 'contact-list-'.date( "YmdHis" ) );
				exit;
			}

			
		}
	}

	
	private function _get_member_search( $params, $get_all=0){
		global $wpdb;
    $sql_where= '';
    $from_date= '';
    $to_date= '';

		$result = array();
		foreach($params as $key => $value)${$key} = $value;
		
		//build search condition.
		if( ! empty( $keyword ) ){
			$sql_where .= " AND (1=0";
			$sql_where .= " or fullname like N'%%$keyword%%'";
			$sql_where .= " or email like N'%%$keyword%%'";
			$sql_where .= " 	)";
		}

		if( $from_date <> '' ) {
			$from_date = date( "Y-m-d", strtotime( $from_date  ) );
			$sql_where .= " AND created >= '$from_date 00:00:00' ";
		}
		
		if( $to_date <> '' ) {
			$to_date = date( "Y-m-d", strtotime($to_date) );
			$sql_where .= " AND created <= '$to_date 23:59:59' ";
		}

		$order_by = "id desc";
		
		$sql_order_by = " order by $order_by ";
				
		//get total record
		$sql = "select count(id) total_record
				from {$wpdb->prefix}contacts
				where 1 = 1 
				$sql_where
				";
				
		$total_record = $wpdb->get_var( $sql, 0 );
		
		//Paging
		$page_size = ( ! empty( $page_size ) ) ? $page_size : 20;
		$total_page = ceil( $total_record / $page_size ); 
		$page_index = intval( trim( $_REQUEST[ "page_index" ] ) ); 
		$page_index = ( $page_index <= 0) ? 1 : $page_index;
		$page_index = ( $page_index >= $total_page && $total_page > 0 ) ? $total_page : $page_index;
		$limit_from = ( $page_index - 1 ) * $page_size;
		
		$sql_limit = ($get_all)?"":"limit $limit_from, $page_size";
		
		$xml_string = ""; 		
		
		//Get list		
		$sql = "select *
				from {$wpdb->prefix}contacts
				where 1 = 1 
				$sql_where
				$sql_order_by
				$sql_limit";
				
		$list = $wpdb->get_results( $sql , ARRAY_A);
		$result["total_record"] = $total_record;
		$result["total_page"] = $total_page;
		$result["page_index"] = $page_index;
		$result["page_size"] = $page_size;
		$result["list"] = $list;
		
		return $result;
	}

	
}


}