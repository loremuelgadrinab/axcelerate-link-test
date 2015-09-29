<?php
/*
Plugin Name: Test List Table Example
*/
include_once 'axcelerate-link-dbdata.php';
if( ! class_exists( 'WP_List_Table' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

class My_Example_List_Table extends WP_List_Table {

    var $example_data = array();
		
    function __construct(){
	 $this->example_data = getContactAttachmentList();
    global $status, $page;

        parent::__construct( array(
            'singular'  => __( 'book', 'mylisttable' ),     //singular name of the listed records
            'plural'    => __( 'books', 'mylisttable' ),   //plural name of the listed records
            'ajax'      => false        //does this table support ajax?

    ) );

    add_action( 'admin_head', array( &$this, 'admin_header' ) );            

    }

  function admin_header() {
    $page = ( isset($_GET['page'] ) ) ? esc_attr( $_GET['page'] ) : false;
    if( 'my_list_test' != $page )
    return;
    echo '<style type="text/css">';
   // echo '.wp-list-table .column-id { width: 5%; }';
    echo '.wp-list-table .column-fullname { width: 40%; }';
    echo '.wp-list-table .column-email { width: 20%; }';
    echo '.wp-list-table .column-driver { width: 20%;}';
    echo '.wp-list-table .column-medic { width: 20%;}';

    echo '</style>';
  }

  function no_items() {
    _e( 'No data found.. please correct the spelling or capitalized the name!' );
  }

  function column_default( $item, $column_name ) {
    switch( $column_name ) { 
        case 'fullname':
        case 'email':
        case 'driver':
        case 'medic':
        default:
            return print_r( $item, true ) ; //Show the whole array for troubleshooting purposes
    }
  }

function get_sortable_columns() {
  $sortable_columns = array(
    'fullname'  => array('fullname',false),
    'email' => array('email',false),
    'driver'   => array('driver',false),
    'medic'   => array('medic',false)
  );
  return $sortable_columns;
}

function get_columns(){
        $columns = array(
           // 'cb'        => '<input type="checkbox" />',
            'fullname' => __( 'Name', 'mylisttable' ),
            'email'    => __( 'Email', 'mylisttable' ),
            'driver'      => __( 'Driver\'s Liscense', 'mylisttable' ),
            'medic'      => __( 'Medical Certificate', 'mylisttable' )
        );
         return $columns;
    }

function usort_reorder( $a, $b ) {
  // If no sort, default to title
  $orderby = ( ! empty( $_GET['orderby'] ) ) ? $_GET['orderby'] : 'fullname';
  // If no order, default to asc
  $order = ( ! empty($_GET['order'] ) ) ? $_GET['order'] : 'asc';
  // Determine sort order
  $result = strcmp( $a[$orderby], $b[$orderby] );
  // Send final sort direction to usort
  return ( $order === 'asc' ) ? $result : -$result;
}

function column_fullname($item){
  return $item['fullname'];
}

function column_email($item){
  return $item['email'];
}
function column_driver($item){
  return $item['driver'];
}
function column_medic($item){
  return $item['medic'];
}

function get_bulk_actions() {
  $actions = array(
    // 'delete'    => 'Delete'
  );
  return $actions;
}

function column_cb($item) {
        return sprintf(
            '<input type="checkbox" name="book[]" value="%s" />', $item['ID']
        );    
    }

function prepare_items() {
  $columns  = $this->get_columns();
  $hidden   = array();
  $sortable = $this->get_sortable_columns();
  $this->_column_headers = array( $columns, $hidden, $sortable );
  usort( $this->example_data, array( &$this, 'usort_reorder' ) );
  
  $per_page = 30;
  $current_page = $this->get_pagenum();
  $total_items = count( $this->example_data );

  // only ncessary because we have sample data
  $this->found_data = array_slice( $this->example_data,( ( $current_page-1 )* $per_page ), $per_page );

  $this->set_pagination_args( array(
    'total_items' => $total_items,                  //WE have to calculate the total number of items
    'per_page'    => $per_page                     //WE have to determine how many items to show on a page
  ) );
  $this->items = $this->found_data;
}



} //class



function my_add_menu_items(){
  $hook = add_menu_page( 'My Plugin List Table', 'My List Table Example', 'activate_plugins', 'my_list_test', 'my_render_list_page' );
  add_action( "load-$hook", 'add_options' );
}

function add_options() {
  global $myListTable;
  $option = 'per_page';
  $args = array(
         'label' => 'Books',
         'default' => 20,
         'option' => 'books_per_page'
         );
  add_screen_option( $option, $args );
  $myListTable = new My_Example_List_Table();
}
add_action( 'admin_menu', 'my_add_menu_items' );



function my_render_list_page(){
  global $myListTable;
  echo '</pre><div class="wrap"><h2>My List Table Test</h2>'; 
  $myListTable->prepare_items(); 
?>
  <form method="post">
    <input type="hidden" name="page" value="ttest_list_table">
    <?php
    $myListTable->search_box( 'search', 'search_id' );

  $myListTable->display(); 
  echo '</form></div>'; 
}



$exampleListTable = new My_Example_List_Table();
$exampleListTable->prepare_items();
// my_render_list_page();
        ?>
<div class="wrap">
    <div id="icon-users" class="icon32"></div>
    <h2>Contact Attachment Lists</h2>
<form method="post">
    <input type="hidden" name="page" value="ttest_list_table">

  <?php $exampleListTable->search_box( 'search', 'search_id' ); ?>

     
    <?php $exampleListTable->display(); ?>
    </form>
</div>


